@extends('layouts.admin')

@section('content')

<div class="row">
    <div class="col-lg-12 grid-margin stretch-card">
        <div class="card shadow-sm border-0">
            <div class="card-body p-4">
                
                <!-- Header with Title and Add Button -->
                <div class="d-flex justify-content-between align-items-center mb-4 border-bottom pb-3">
                    <h5 class="card-title mb-0 d-flex align-items-center text-theme">
                        <i class="fa fa-list me-2"></i> Category Management
                    </h5>
                    <button type="button" class="btn btn-theme rounded-pill fw-bold shadow-sm" data-bs-toggle="modal" data-bs-target="#categoryModal" onclick="openAddModal()">
                        <i class="fa fa-plus me-1"></i> Add
                    </button>
                </div>

                <!-- Alerts inside the white container -->
                @if (session('success'))
                <div class="alert alert-success alert-dismissible fade show shadow-sm" role="alert">
                    <i class="fa fa-check-circle me-2"></i> {{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
                @endif

                @if ($errors->any())
                <div class="alert alert-danger alert-dismissible fade show shadow-sm" role="alert">
                    <ul class="mb-0 ps-3">
                        @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
                @endif

                <div class="table-responsive">
                    <table class="table table-hover align-middle">
                        <thead class="bg-light">
                            <tr>
                                <th class="text-secondary text-uppercase text-xxs font-weight-bolder opacity-7" style="width: 10%;">ID</th>
                                <th class="text-secondary text-uppercase text-xxs font-weight-bolder opacity-7" style="width: 50%;">Category Name</th>
                                <th class="text-secondary text-uppercase text-xxs font-weight-bolder opacity-7" style="width: 20%;">Created At</th>
                                <th class="text-secondary text-uppercase text-xxs font-weight-bolder opacity-7 text-center" style="width: 20%;">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($categories as $category)
                            <tr>
                                <td><span class="text-muted fw-bold">#{{ $category->id }}</span></td>
                                <td><span class="fw-bold text-dark">{{ $category->name }}</span></td>
                                <td><span class="text-muted">{{ $category->created_at->format('d M Y') }}</span></td>
                                <td class="text-center">
                                    <button type="button" class="btn btn-inverse-info btn-icon btn-sm" 
                                        onclick="openEditModal({{ $category->id }}, '{{ addslashes($category->name) }}')" title="Edit">
                                        <i class="fa fa-edit"></i>
                                    </button>
                                    
                                    <form action="{{ route('admin.categories.destroy', $category->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Are you sure you want to delete this category?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-inverse-danger btn-icon btn-sm ms-2" title="Delete">
                                            <i class="fa fa-trash"></i>
                                        </button>
                                    </form>
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="4" class="text-center py-5">
                                    <div class="d-flex flex-column align-items-center justify-content-center">
                                        <i class="fa fa-folder-open text-muted fa-3x mb-3"></i>
                                        <h5 class="text-muted">No categories found</h5>
                                        <p class="text-muted mb-0">Get started by creating a new category.</p>
                                    </div>
                                </td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Category Modal -->
<div class="modal fade" id="categoryModal" tabindex="-1" aria-labelledby="categoryModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form id="categoryForm" action="{{ route('admin.categories.store') }}" method="POST">
                @csrf
                <div id="methodField"></div>
                
                <div class="modal-header">
                    <h5 class="modal-title" id="categoryModalLabel">Add Category</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="name" class="form-label">Category Name</label>
                        <input type="text" class="form-control" id="name" name="name" required placeholder="Enter category name">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-theme">Save changes</button>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
    function openAddModal() {
        document.getElementById('categoryModalLabel').innerText = 'Add Category';
        document.getElementById('categoryForm').action = "{{ route('admin.categories.store') }}";
        document.getElementById('methodField').innerHTML = ''; // Remove PUT method
        document.getElementById('name').value = '';
    }

    function openEditModal(id, name) {
        document.getElementById('categoryModalLabel').innerText = 'Edit Category';
        let actionUrl = "{{ route('admin.categories.update', ':id') }}";
        actionUrl = actionUrl.replace(':id', id);
        document.getElementById('categoryForm').action = actionUrl;
        document.getElementById('methodField').innerHTML = '<input type="hidden" name="_method" value="PUT">';
        document.getElementById('name').value = name;
        
        var myModal = new bootstrap.Modal(document.getElementById('categoryModal'));
        myModal.show();
    }
</script>
@endsection
