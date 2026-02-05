@extends('layouts.shop')

@section('content')
    <div class="bg-light py-3">
        <div class="container">
            <div class="row">
                <div class="col-md-12 mb-0">
                    <a href="{{ url('/') }}">Home</a> <span class="mx-2 mb-0">/</span> <strong class="text-black">Feedback</strong>
                </div>
            </div>
        </div>
    </div>

    <div class="site-section py-5">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="p-4 p-lg-5 border bg-white rounded shadow-sm">
                        <h2 class="h3 mb-4 text-black text-center">We value your feedback</h2>

                        @if(session('success'))
                            <div class="alert alert-success">
                                {{ session('success') }}
                            </div>
                        @endif

                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul class="mb-0">
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        <form method="POST" action="{{ route('feedback.store') }}">
                            @csrf
                            <div class="form-group mb-4">
                                <label for="name" class="text-black">Your Name <span class="text-danger">*</span></label>
                                <input type="text" id="name" name="name" class="form-control" value="{{ old('name') }}" required>
                            </div>

                            <div class="form-group mb-4">
                                <label for="description" class="text-black">Feedback <span class="text-danger">*</span></label>
                                <textarea id="description" name="description" rows="5" class="form-control" required>{{ old('description') }}</textarea>
                            </div>

                            <div class="form-group mb-4">
                                <label class="text-black d-block mb-2">Rating <span class="text-danger">*</span></label>
                                <div class="feedback-stars" data-current="{{ old('rating', 5) }}">
                                    @for($i = 1; $i <= 5; $i++)
                                        <span class="feedback-star" data-value="{{ $i }}">★</span>
                                    @endfor
                                </div>
                                <input type="hidden" name="rating" id="rating" value="{{ old('rating', 5) }}">
                            </div>

                            <button type="submit" class="btn btn-hero btn-square btn-lg w-100 text-uppercase fw-bold">
                                Submit Feedback
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const container = document.querySelector('.feedback-stars');
            if (!container) return;

            const stars = Array.from(container.querySelectorAll('.feedback-star'));
            const input = document.getElementById('rating');

            const setRating = (value) => {
                input.value = value;
                stars.forEach(star => {
                    const v = parseInt(star.dataset.value, 10);
                    star.classList.toggle('active', v <= value);
                });
            };

            const initial = parseInt(container.dataset.current || '5', 10) || 5;
            setRating(initial);

            stars.forEach(star => {
                star.addEventListener('click', () => {
                    const value = parseInt(star.dataset.value, 10);
                    setRating(value);
                });

                star.addEventListener('mouseenter', () => {
                    const value = parseInt(star.dataset.value, 10);
                    stars.forEach(s => {
                        const v = parseInt(s.dataset.value, 10);
                        s.classList.toggle('hover', v <= value);
                    });
                });

                star.addEventListener('mouseleave', () => {
                    stars.forEach(s => s.classList.remove('hover'));
                });
            });
        });
    </script>
@endpush
