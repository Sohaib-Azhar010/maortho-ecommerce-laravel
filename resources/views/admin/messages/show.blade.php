@extends('layouts.admin')

@section('content')
<div class="row">
    <div class="col-lg-12">
        <div class="card shadow-sm border-0">
            <div class="card-body p-4">
                <div class="d-flex justify-content-between align-items-center mb-4 border-bottom pb-3">
                    <h5 class="card-title mb-0 d-flex align-items-center text-theme">
                        <i class="fa fa-envelope me-2"></i> Message Details
                    </h5>
                    <div>
                        @if($message->is_read)
                            <a href="{{ route('admin.messages.unread', $message) }}" 
                               class="btn btn-sm btn-warning">
                                <i class="fa fa-envelope"></i> Mark as Unread
                            </a>
                        @else
                            <a href="{{ route('admin.messages.read', $message) }}" 
                               class="btn btn-sm btn-success">
                                <i class="fa fa-check"></i> Mark as Read
                            </a>
                        @endif
                        <a href="{{ route('admin.messages.index') }}" class="btn btn-sm btn-secondary">
                            <i class="fa fa-arrow-left"></i> Back to List
                        </a>
                    </div>
                </div>

                @if (session('success'))
                    <div class="alert alert-success alert-dismissible fade show shadow-sm" role="alert">
                        <i class="fa fa-check-circle me-2"></i> {{ session('success') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif

                <div class="row">
                    <div class="col-md-8">
                        <!-- Message Details -->
                        <div class="card mb-4">
                            <div class="card-header bg-light">
                                <h6 class="mb-0">
                                    <i class="fa fa-info-circle me-2"></i>Message Information
                                </h6>
                            </div>
                            <div class="card-body">
                                <div class="row mb-3">
                                    <div class="col-md-6">
                                        <strong>Name:</strong>
                                        <p class="mb-0">{{ $message->first_name }} {{ $message->last_name }}</p>
                                    </div>
                                    <div class="col-md-6">
                                        <strong>Email:</strong>
                                        <p class="mb-0">
                                            <a href="mailto:{{ $message->email }}">{{ $message->email }}</a>
                                        </p>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-md-6">
                                        <strong>Subject:</strong>
                                        <p class="mb-0">{{ $message->subject ?? '(No Subject)' }}</p>
                                    </div>
                                    <div class="col-md-6">
                                        <strong>Date:</strong>
                                        <p class="mb-0">{{ $message->created_at->format('d M Y, h:i A') }}</p>
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <strong>Message:</strong>
                                    <div class="border rounded p-3 bg-light mt-2">
                                        {{ $message->message }}
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Reply Section -->
                        <div class="card">
                            <div class="card-header bg-light">
                                <h6 class="mb-0">
                                    <i class="fa fa-reply me-2"></i>Reply to Message
                                </h6>
                            </div>
                            <div class="card-body">
                                @if($message->reply)
                                    <div class="alert alert-info mb-3">
                                        <strong>Previous Reply ({{ $message->replied_at->format('d M Y, h:i A') }}):</strong>
                                        <div class="border rounded p-3 bg-white mt-2">
                                            {{ $message->reply }}
                                        </div>
                                    </div>
                                @endif

                                <form action="{{ route('admin.messages.update', $message) }}" method="POST">
                                    @csrf
                                    @method('PUT')
                                    <div class="mb-3">
                                        <label for="reply" class="form-label">Reply Message</label>
                                        <textarea name="reply" id="reply" rows="6" class="form-control" required>{{ old('reply', $message->reply) }}</textarea>
                                        @error('reply')
                                            <div class="text-danger small mt-1">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <button type="submit" class="btn btn-primary">
                                        <i class="fa fa-paper-plane me-2"></i>Send Reply
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-4">
                        <!-- Quick Actions -->
                        <div class="card mb-4">
                            <div class="card-header bg-light">
                                <h6 class="mb-0">
                                    <i class="fa fa-cog me-2"></i>Quick Actions
                                </h6>
                            </div>
                            <div class="card-body">
                                <div class="d-grid gap-2">
                                    <a href="mailto:{{ $message->email }}?subject=Re: {{ $message->subject ?? 'Your Message' }}" 
                                       class="btn btn-outline-primary">
                                        <i class="fa fa-envelope me-2"></i>Open in Email Client
                                    </a>
                                    <form action="{{ route('admin.messages.destroy', $message) }}" 
                                          method="POST" 
                                          onsubmit="return confirm('Are you sure you want to delete this message?');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-outline-danger w-100">
                                            <i class="fa fa-trash me-2"></i>Delete Message
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </div>

                        <!-- Status Info -->
                        <div class="card">
                            <div class="card-header bg-light">
                                <h6 class="mb-0">
                                    <i class="fa fa-info-circle me-2"></i>Status
                                </h6>
                            </div>
                            <div class="card-body">
                                <div class="mb-2">
                                    <strong>Read Status:</strong>
                                    @if($message->is_read)
                                        <span class="badge bg-success ms-2">Read</span>
                                    @else
                                        <span class="badge bg-danger ms-2">Unread</span>
                                    @endif
                                </div>
                                @if($message->replied_at)
                                    <div class="mb-2">
                                        <strong>Replied:</strong>
                                        <p class="mb-0 small">{{ $message->replied_at->format('d M Y, h:i A') }}</p>
                                    </div>
                                @endif
                                <div>
                                    <strong>Received:</strong>
                                    <p class="mb-0 small">{{ $message->created_at->format('d M Y, h:i A') }}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

