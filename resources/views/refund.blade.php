@extends('layouts.shop')

@section('content')
    <!-- Breadcrumb -->
    <div class="bg-light py-3">
        <div class="container">
            <div class="row">
                <div class="col-md-12 mb-0">
                    <a href="{{ url('/') }}" class="breadcrumb-link">Home</a> <span class="mx-2 mb-0">/</span> <strong class="text-black">Refund or Return Policy</strong>
                </div>
            </div>
        </div>
    </div>

    <!-- Refund Policy Section -->
    <div class="site-section bg-white py-5">
        <div class="container">
            <div class="row">
                <div class="col-md-12 mb-5">
                    <h2 class="h3 mb-4 text-black">Refund or Return Policy</h2>
                    <p class="text-muted mb-4">Last updated: {{ date('F d, Y') }}</p>
                </div>
            </div>

            <div class="row">
                <div class="col-md-12">
                    <div class="mb-4">
                        <h4 class="h5 text-black mb-3">1. Return Eligibility</h4>
                        <p class="text-muted">
                            At MAORTHO, we want you to be completely satisfied with your purchase. You may return most items within <strong>7 days</strong> of delivery, provided they are in their original condition, unused, and in the original packaging with all tags and labels attached.
                        </p>
                    </div>

                    <div class="mb-4">
                        <h4 class="h5 text-black mb-3">2. Items Eligible for Return</h4>
                        <p class="text-muted">The following items are eligible for return:</p>
                        <ul class="text-muted">
                            <li>Products that are defective or damaged upon arrival</li>
                            <li>Products that do not match the description on our website</li>
                            <li>Products that are in original, unopened packaging</li>
                            <li>Products that have not been used or worn</li>
                        </ul>
                    </div>

                    <div class="mb-4">
                        <h4 class="h5 text-black mb-3">3. Items Not Eligible for Return</h4>
                        <p class="text-muted">The following items cannot be returned:</p>
                        <ul class="text-muted">
                            <li>Items that have been used, worn, or damaged by the customer</li>
                            <li>Items without original packaging or tags</li>
                            <li>Custom-made or personalized items</li>
                            <li>Items returned after the 7-day return period</li>
                            <li>Hygiene-sensitive items that have been opened</li>
                        </ul>
                    </div>

                    <div class="mb-4">
                        <h4 class="h5 text-black mb-3">4. Return Process</h4>
                        <p class="text-muted">To initiate a return, please follow these steps:</p>
                        <ol class="text-muted">
                            <li>Contact our customer service team at <strong>+92 344 8261083</strong> or email us at <strong>maorthoimplants65@gmail.com</strong> within 7 days of receiving your order</li>
                            <li>Provide your order number and reason for return</li>
                            <li>Our team will provide you with a Return Authorization (RA) number</li>
                            <li>Package the item securely in its original packaging</li>
                            <li>Ship the item back to our address: <strong>97 C Hhajvary Scheme, Near Hurbanspura, Lahore</strong></li>
                            <li>Include the RA number in the package</li>
                        </ol>
                    </div>

                    <div class="mb-4">
                        <h4 class="h5 text-black mb-3">5. Refund Processing</h4>
                        <p class="text-muted">
                            Once we receive and inspect your returned item, we will process your refund within <strong>5-7 business days</strong>. Refunds will be issued to the original payment method used for the purchase. Please note that shipping charges are non-refundable unless the return is due to our error.
                        </p>
                    </div>

                    <div class="mb-4">
                        <h4 class="h5 text-black mb-3">6. Exchanges</h4>
                        <p class="text-muted">
                            We currently do not offer direct exchanges. If you need a different size or product, please return the original item and place a new order. We will process your return refund once the item is received and inspected.
                        </p>
                    </div>

                    <div class="mb-4">
                        <h4 class="h5 text-black mb-3">7. Damaged or Defective Items</h4>
                        <p class="text-muted">
                            If you receive a damaged or defective item, please contact us immediately at <strong>+92 344 8261083</strong> or <strong>maorthoimplants65@gmail.com</strong>. We will arrange for a replacement or full refund, including return shipping costs, at no charge to you.
                        </p>
                    </div>

                    <div class="mb-4">
                        <h4 class="h5 text-black mb-3">8. Contact Us</h4>
                        <p class="text-muted">
                            If you have any questions about our Refund or Return Policy, please contact us:
                        </p>
                        <p class="text-muted mb-0">
                            <strong>Email:</strong> maorthoimplants65@gmail.com<br>
                            <strong>Phone:</strong> +92 344 8261083<br>
                            <strong>Address:</strong> 97 C Hhajvary Scheme, Near Hurbanspura, Lahore
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

