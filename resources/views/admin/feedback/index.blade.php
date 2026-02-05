@extends('layouts.admin')

@section('content')
<div class="row">
    <div class="col-lg-12 grid-margin stretch-card">
        <div class="card shadow-sm border-0">
            <div class="card-body p-4">
                <div class="d-flex justify-content-between align-items-center mb-4 border-bottom pb-3">
                    <h5 class="card-title mb-0 d-flex align-items-center text-theme">
                        <i class="fa fa-comments me-2"></i> Feedback Management
                    </h5>
                </div>

                @if (session('success'))
                    <div class="alert alert-success alert-dismissible fade show shadow-sm" role="alert">
                        <i class="fa fa-check-circle me-2"></i> {{ session('success') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif

                <div class="table-responsive">
                    <table class="table table-hover align-middle">
                        <thead class="bg-light">
                            <tr>
                                <th style="width: 20%;">Name</th>
                                <th style="width: 40%;">Feedback</th>
                                <th style="width: 10%;">Rating</th>
                                <th style="width: 15%;">Created At</th>
                                <th style="width: 15%;" class="text-center">Show on Website</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($feedback as $item)
                                <tr>
                                    <td>{{ $item->name }}</td>
                                    <td>{{ Str::limit($item->description, 120) }}</td>
                                    <td>
                                        @for($i = 1; $i <= 5; $i++)
                                            <span class="{{ $i <= $item->rating ? 'text-warning' : 'text-muted' }}">★</span>
                                        @endfor
                                    </td>
                                    <td>{{ $item->created_at->format('d M Y') }}</td>
                                    <td class="text-center">
                                        <form method="POST" action="{{ route('admin.feedback.update', $item) }}">
                                            @csrf
                                            @method('PUT')
                                            <div class="form-check form-switch d-inline-block">
                                                <input class="form-check-input" type="checkbox" role="switch"
                                                       id="show_on_site_{{ $item->id }}"
                                                       name="show_on_site"
                                                       value="1"
                                                       onchange="this.form.submit()"
                                                       {{ $item->show_on_site ? 'checked' : '' }}>
                                            </div>
                                        </form>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="5" class="text-center py-5">
                                        <p class="text-muted mb-0">No feedback submitted yet.</p>
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>

                <div class="mt-3">
                    {{ $feedback->links() }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection


