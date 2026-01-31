@extends('admin.layouts.master')

@section('content')
    <div class="container-fluid">
        <h4 class="page-title">Edit Admin</h4> <!-- Updated Title -->
        <div class="card">
            <div class="card-body">
                <form action="{{ route('admin.dashboard.admins.update', $admin->id) }}" method="POST" enctype="multipart/form-data"> <!-- Updated route -->
                    @csrf
                    @method('PUT')
                    <div class="mb-3">
                        <label for="name" class="form-label">Name</label>
                        <input type="text" class="form-control" id="name" name="name" value="{{ $admin->name }}" required>
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label> <!-- Added Email Field -->
                        <input type="email" class="form-control" id="email" name="email" value="{{ $admin->email }}" required>
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">Password</label> <!-- Added Password Field -->
                        <input type="password" class="form-control" id="password" name="password" placeholder="Leave blank to keep current password">
                    </div>
                    <div class="mb-3">
                        <label for="role" class="form-label">Role</label> <!-- Added Role Field -->
                        <select class="form-select" id="role" name="role" required>
                            <option value="branch_admin" {{ $admin->role == 'branch_admin' ? 'selected' : '' }}>Branch Admin</option>
                            <option value="super_admin" {{ $admin->role == 'super_admin' ? 'selected' : '' }}>Super Admin</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="branch_id" class="form-label">Branch</label> <!-- Added Branch Selection Field -->
                        <select class="form-select" id="branch_id" name="branch_id">
                            <option value="">Select Branch</option>
                            @foreach($branches as $branch) <!-- Assuming you have a variable $branches passed from the controller -->
                            <option value="{{ $branch->id }}" {{ $admin->branch_id == $branch->id ? 'selected' : '' }}>{{ $branch->branch_name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary">Update</button>
                </form>
            </div>
        </div>
    </div>
@endsection
