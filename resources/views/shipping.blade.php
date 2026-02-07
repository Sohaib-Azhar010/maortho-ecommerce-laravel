@extends('layouts.shop')

@section('content')
    <!-- Breadcrumb -->
    <div class="bg-light py-3">
        <div class="container">
            <div class="row">
                <div class="col-md-12 mb-0">
                    <a href="{{ url('/') }}" class="breadcrumb-link">Home</a> <span class="mx-2 mb-0">/</span> <strong class="text-black">Shipping Policy</strong>
                </div>
            </div>
        </div>
    </div>

    <!-- Shipping Policy Section -->
    <div class="site-section bg-white py-5">
        <div class="container">
            <div class="row">
                <div class="col-md-12 mb-5">
                    <h2 class="h3 mb-4 text-black">Shipping Policy</h2>
                    <p class="text-muted mb-4">Last updated: {{ date('F d, Y') }}</p>
                </div>
            </div>

            <div class="row">
                <div class="col-md-12">
                    <div class="mb-4">
                        <h4 class="h5 text-black mb-3">1. Shipping Areas</h4>
                        <p class="text-muted">
                            MAORTHO currently ships to all major cities and areas within Pakistan. We are committed to expanding our shipping coverage to serve more customers across the country.
                        </p>
                    </div>

                    <div class="mb-4">
                        <h4 class="h5 text-black mb-3">2. Processing Time</h4>
                        <p class="text-muted">
                            Orders are typically processed within <strong>1-2 business days</strong> after payment confirmation. Processing time may be longer during peak seasons, holidays, or special promotions. You will receive an email notification once your order has been processed and shipped.
                        </p>
                    </div>

                    <div class="mb-4">
                        <h4 class="h5 text-black mb-3">3. Shipping Methods and Delivery Time</h4>
                        <p class="text-muted">We offer the following shipping options:</p>
                        <ul class="text-muted">
                            <li><strong>Standard Shipping:</strong> 5-7 business days</li>
                            <li><strong>Express Shipping:</strong> 2-3 business days (available for select areas)</li>
                        </ul>
                        <p class="text-muted">
                            Delivery times are estimates and may vary based on your location, weather conditions, and carrier delays. We are not responsible for delays caused by the shipping carrier.
                        </p>
                    </div>

                    <div class="mb-4">
                        <h4 class="h5 text-black mb-3">4. Shipping Costs</h4>
                        <p class="text-muted">
                            Shipping costs are calculated at checkout based on your delivery address, order weight, and selected shipping method. We offer <strong>free shipping</strong> on orders above a certain amount (check our current promotions for details). Shipping charges are clearly displayed before you complete your purchase.
                        </p>
                    </div>

                    <div class="mb-4">
                        <h4 class="h5 text-black mb-3">5. Order Tracking</h4>
                        <p class="text-muted">
                            Once your order has been shipped, you will receive a tracking number via email. You can use this tracking number to monitor your package's progress through our shipping partner's website or by contacting our customer service team.
                        </p>
                    </div>

                    <div class="mb-4">
                        <h4 class="h5 text-black mb-3">6. Delivery Address</h4>
                        <p class="text-muted">
                            Please ensure that your delivery address is complete and accurate. We are not responsible for orders shipped to incorrect addresses provided by the customer. If you need to change your delivery address, please contact us immediately at <strong>+92 344 8261083</strong> or <strong>email@yourdomain.com</strong> before your order is processed.
                        </p>
                    </div>

                    <div class="mb-4">
                        <h4 class="h5 text-black mb-3">7. Failed Delivery Attempts</h4>
                        <p class="text-muted">
                            If delivery is attempted but unsuccessful due to an incorrect address, recipient not available, or refusal to accept the package, additional shipping charges may apply for re-delivery. We recommend providing a contact number where you can be reached during delivery hours.
                        </p>
                    </div>

                    <div class="mb-4">
                        <h4 class="h5 text-black mb-3">8. International Shipping</h4>
                        <p class="text-muted">
                            Currently, we only ship within Pakistan. International shipping may be available in the future. Please check back or contact us for updates.
                        </p>
                    </div>

                    <div class="mb-4">
                        <h4 class="h5 text-black mb-3">9. Damaged or Lost Shipments</h4>
                        <p class="text-muted">
                            If your package arrives damaged or is lost in transit, please contact us immediately at <strong>+92 344 8261083</strong> or <strong>email@yourdomain.com</strong> with your order number. We will investigate and work with the shipping carrier to resolve the issue. We will replace or refund your order as appropriate.
                        </p>
                    </div>

                    <div class="mb-4">
                        <h4 class="h5 text-black mb-3">10. Contact Us</h4>
                        <p class="text-muted">
                            If you have any questions about our Shipping Policy, please contact us:
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

