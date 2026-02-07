@extends('layouts.admin')

@section('content')
<div class="row">
    <div class="col-lg-12 grid-margin stretch-card">
        <div class="card shadow-sm border-0">
            <div class="card-body p-4">
                <div class="d-flex justify-content-between align-items-center mb-4 border-bottom pb-3">
                    <h5 class="card-title mb-0 d-flex align-items-center text-theme">
                        <i class="fa fa-envelope me-2"></i> Messages
                        @if($unreadCount > 0)
                            <span class="badge bg-danger ms-2">{{ $unreadCount }} New</span>
                        @endif
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
                                <th style="width: 5%;">Status</th>
                                <th style="width: 20%;">Name</th>
                                <th style="width: 20%;">Email</th>
                                <th style="width: 20%;">Subject</th>
                                <th style="width: 15%;">Date</th>
                                <th style="width: 20%;" class="text-center">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($messages as $message)
                                <tr class="{{ !$message->is_read ? 'table-warning' : '' }}">
                                    <td>
                                        @if($message->is_read)
                                            <span class="badge bg-success">Read</span>
                                        @else
                                            <span class="badge bg-danger">New</span>
                                        @endif
                                    </td>
                                    <td>
                                        <strong>{{ $message->first_name }} {{ $message->last_name }}</strong>
                                    </td>
                                    <td>{{ $message->email }}</td>
                                    <td>{{ $message->subject ?? '(No Subject)' }}</td>
                                    <td>{{ $message->created_at->format('d M Y, h:i A') }}</td>
                                    <td class="text-center">
                                        <a href="{{ route('admin.messages.show', $message) }}" 
                                           class="btn btn-sm btn-primary">
                                            <i class="fa fa-eye"></i> View
                                        </a>
                                        <form action="{{ route('admin.messages.destroy', $message) }}" 
                                              method="POST" 
                                              class="d-inline"
                                              onsubmit="return confirm('Are you sure you want to delete this message?');">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-danger">
                                                <i class="fa fa-trash"></i> Delete
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="6" class="text-center py-5">
                                        <p class="text-muted mb-0">No messages yet.</p>
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>

                <div class="mt-3">
                    {{ $messages->links() }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

