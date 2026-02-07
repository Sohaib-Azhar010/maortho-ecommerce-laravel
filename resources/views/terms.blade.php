@extends('layouts.shop')

@section('content')
    <!-- Breadcrumb -->
    <div class="bg-light py-3">
        <div class="container">
            <div class="row">
                <div class="col-md-12 mb-0">
                    <a href="{{ url('/') }}" class="breadcrumb-link">Home</a> <span class="mx-2 mb-0">/</span> <strong class="text-black">Terms and Conditions</strong>
                </div>
            </div>
        </div>
    </div>

    <!-- Terms Section -->
    <div class="site-section bg-white py-5">
        <div class="container">
            <div class="row">
                <div class="col-md-12 mb-5">
                    <h2 class="h3 mb-4 text-black">Terms and Conditions</h2>
                    <p class="text-muted mb-4">Last updated: {{ date('F d, Y') }}</p>
                </div>
            </div>

            <div class="row">
                <div class="col-md-12">
                    <div class="mb-4">
                        <h4 class="h5 text-black mb-3">1. Acceptance of Terms</h4>
                        <p class="text-muted">
                            By accessing and using MAORTHO's website and services, you accept and agree to be bound by the terms and provision of this agreement. If you do not agree to abide by the above, please do not use this service.
                        </p>
                    </div>

                    <div class="mb-4">
                        <h4 class="h5 text-black mb-3">2. Use License</h4>
                        <p class="text-muted">
                            Permission is granted to temporarily download one copy of the materials on MAORTHO's website for personal, non-commercial transitory viewing only. This is the grant of a license, not a transfer of title, and under this license you may not:
                        </p>
                        <ul class="text-muted">
                            <li>Modify or copy the materials</li>
                            <li>Use the materials for any commercial purpose or for any public display</li>
                            <li>Attempt to reverse engineer any software contained on MAORTHO's website</li>
                            <li>Remove any copyright or other proprietary notations from the materials</li>
                        </ul>
                    </div>

                    <div class="mb-4">
                        <h4 class="h5 text-black mb-3">3. Product Information</h4>
                        <p class="text-muted">
                            We strive to provide accurate product descriptions and images. However, we do not warrant that product descriptions or other content on this site is accurate, complete, reliable, current, or error-free. If a product offered by MAORTHO is not as described, your sole remedy is to return it in unused condition.
                        </p>
                    </div>

                    <div class="mb-4">
                        <h4 class="h5 text-black mb-3">4. Pricing and Payment</h4>
                        <p class="text-muted">
                            All prices are displayed in PKR (Pakistani Rupees). We reserve the right to change prices at any time without prior notice. Payment must be made through our secure payment gateway. We accept payments through PayFast and other approved payment methods.
                        </p>
                    </div>

                    <div class="mb-4">
                        <h4 class="h5 text-black mb-3">5. Limitation of Liability</h4>
                        <p class="text-muted">
                            In no event shall MAORTHO or its suppliers be liable for any damages (including, without limitation, damages for loss of data or profit, or due to business interruption) arising out of the use or inability to use the materials on MAORTHO's website, even if MAORTHO or a MAORTHO authorized representative has been notified orally or in writing of the possibility of such damage.
                        </p>
                    </div>

                    <div class="mb-4">
                        <h4 class="h5 text-black mb-3">6. Revisions and Errata</h4>
                        <p class="text-muted">
                            The materials appearing on MAORTHO's website could include technical, typographical, or photographic errors. MAORTHO does not warrant that any of the materials on its website are accurate, complete, or current. MAORTHO may make changes to the materials contained on its website at any time without notice.
                        </p>
                    </div>

                    <div class="mb-4">
                        <h4 class="h5 text-black mb-3">7. Contact Information</h4>
                        <p class="text-muted">
                            If you have any questions about these Terms and Conditions, please contact us at:
                        </p>
                        <p class="text-muted mb-0">
                            <strong>Email:</strong> email@yourdomain.com<br>
                            <strong>Phone:</strong> +92 344 8261083<br>
                            <strong>Address:</strong> 97 C Hhajvary Scheme, Near Hurbanspura, Lahore
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

