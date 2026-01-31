@extends('admin.layouts.master')

@section('content')
    <br><br>
    <div class="container-fluid">
        <h4 class="page-title">Admin Dashboard</h4> <!-- Updated Title -->
        <div class="card">
            <div class="card-header pb-0">
                <div class="d-flex justify-content-between">
                    <h4 class="card-title mg-b-0">Admin Users</h4> <!-- Updated Sub-title -->
                    <a href="{{ route('admin.dashboard.admins.create') }}" class="btn btn-primary"> <!-- Update route to point to admins -->
                        <i class="typcn typcn-document-add"></i> Add New Admin
                    </a>
                </div>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table text-md-nowrap dataTable no-footer">
                        <thead>
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Email</th> <!-- Changed Details to Email -->
                            <th>Role</th> <!-- Added Role Column -->
                            <th>branch</th> <!-- Added Role Column -->
                            <th>Actions</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($admins as $admin) <!-- Updated to loop through $admins -->
                        <tr>
                            <td>{{ $admin->id }}</td>
                            <td>{{ $admin->name }}</td>
                            <td>{{ $admin->email }}</td> <!-- Display Admin Email -->
                            <td>{{ $admin->role }}</td> <!-- Display Admin Role -->
                            <td>{{ $admin->branch ? $admin->branch->branch_name : 'N/A' }}</td> <!-- Display Branch Name -->
                            <td>
                                <a href="{{ route('admin.dashboard.admins.edit', $admin->id) }}" class="btn btn-warning btn-sm">Edit</a>
                                <form action="{{ route('admin.dashboard.admins.destroy', $admin->id) }}" method="POST" style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <div id="floatingAlert" class="floating-alert">
        <span id="floatingAlertMessage"></span>
        <span class="check-icon">&#10003;</span> <!-- علامة صح -->
    </div>

@endsection

@section('js')
    <script>
        function showAlert(message) {
            var alertBox = document.getElementById('floatingAlert');
            var alertMessage = document.getElementById('floatingAlertMessage');
            alertMessage.textContent = message;
            alertBox.style.display = 'flex'; // Show alert as flexbox to center content vertically
            setTimeout(function() {
                alertBox.style.display = 'none';
            }, 5000);
        }

        function closeAlert() {
            document.getElementById('floatingAlert').style.display = 'none';
        }

        @if (session('success'))
        showAlert("{{ session('success') }}");
        @endif
    </script>
@endsection
