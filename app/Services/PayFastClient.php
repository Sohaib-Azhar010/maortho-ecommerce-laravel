<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;

class PayFastClient
{
    protected string $baseUrl;
    protected string $merchantId;
    protected string $securedKey;
    protected ?string $hashKey;
    protected string $merchantCategoryCode;

    public function __construct()
    {
        $this->baseUrl = rtrim(config('services.payfast.base_url'), '/');
        $this->merchantId = config('services.payfast.merchant_id');
        $this->securedKey = config('services.payfast.secured_key');
        $this->hashKey = config('services.payfast.hash_key');
        $this->merchantCategoryCode = config('services.payfast.merCatCode', '');
    }

    public function accountTypeId(): int
    {
        // Adjust according to your PayFast configuration (e.g. 3 for bank account)
        return 3;
    }

    public function getAccessToken(string $customerIp): string
    {
        // Cache token briefly to reduce calls
        $cacheKey = 'payfast_access_token';
        $cached = cache($cacheKey);
        if ($cached && isset($cached['token'], $cached['expires_at']) && $cached['expires_at'] > now()) {
            return $cached['token'];
        }

        $response = Http::asForm()
            ->withHeaders([
                'cache-control' => 'no-cache',
                'content-type' => 'application/x-www-form-urlencoded',
            ])
            ->post("{$this->baseUrl}/token", [
                'merchant_id' => $this->merchantId,
                'secured_key' => $this->securedKey,
                'grant_type' => 'client_credentials',
                'customer_ip' => $customerIp,
            ]);

        $data = $response->json();

        if (!$response->successful() || empty($data['token'])) {
            throw new \RuntimeException('Unable to obtain PayFast access token.');
        }

        $expirySeconds = (int) ($data['expiry'] ?? 300);
        cache([$cacheKey => [
            'token' => $data['token'],
            'expires_at' => now()->addSeconds($expirySeconds - 30),
        ]], $expirySeconds - 30);

        return $data['token'];
    }

    /**
     * Call customer/validate to trigger OTP.
     */
    public function customerValidate(array $payload, string $accessToken, string $customerIp): array
    {
        $body = array_merge($payload, [
            'merCatCode' => $this->merchantCategoryCode,
            'customer_ip' => $customerIp,
            'otp_required' => 'yes',
            'recurring_txn' => 'no',
        ]);

        $response = Http::asForm()
            ->withHeaders([
                'Content-Type' => 'application/x-www-form-urlencoded',
                'Authorization' => 'Bearer ' . $accessToken,
            ])
            ->post("{$this->baseUrl}/customer/validate", $body);

        $data = $response->json() ?? [];

        $success = $response->successful() && (($data['code'] ?? '00') === '00');

        return array_merge($data, ['success' => $success]);
    }

    /**
     * Initiate transaction with OTP.
     */
    public function initiateTransaction(array $payload, string $accessToken, string $customerIp): array
    {
        $body = array_merge($payload, [
            'merCatCode' => $this->merchantCategoryCode,
            'customer_ip' => $customerIp,
        ]);

        $response = Http::asForm()
            ->withHeaders([
                'Content-Type' => 'application/x-www-form-urlencoded',
                'Authorization' => 'Bearer ' . $accessToken,
            ])
            ->post("{$this->baseUrl}/transaction", $body);

        $data = $response->json() ?? [];

        $statusCode = $data['status_code'] ?? $data['code'] ?? null;
        $success = $response->successful() && in_array($statusCode, ['00', '79'], true);

        return array_merge($data, [
            'success' => $success,
            'status_code' => $statusCode,
        ]);
    }
}


