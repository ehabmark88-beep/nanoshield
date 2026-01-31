@extends('admin.layouts.master')

@section('content')
    <br><br>
    <div class="container-fluid">
        <h4 class="page-title">Package Categories</h4>
        <div class="card">
            <div class="card-header pb-0">
                <div class="d-flex justify-content-between">
                    <h4 class="card-title mg-b-0">Categories</h4>
                    <a href="{{ route('admin.dashboard.package_category.create') }}" class="btn btn-primary">
                        <i class="typcn typcn-document-add"></i> Add New
                    </a>
                </div>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table text-md-nowrap dataTable no-footer">
                        <thead>
                        <tr>
                            <th>ID</th>
                            <th>الاسم</th>
                            <th>الاسم الانجليزي</th>
                            <th>الايكون</th>
{{--                            <th>Image</th>--}}
                            <th>Actions</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($categories as $category)
                            <tr>
                                <td>{{ $category->id }}</td>
                                <td>{{ $category->name_ar }}</td>
                                <td>{{ $category->name }}</td>
                                <td>{{ $category->details }}</td>
{{--                                <td>--}}
{{--                                    @if($category->image)--}}
{{--                                        <img src="{{ asset('img/package_categories/' . $category->image) }}" alt="Category Image" width="80" height="70">--}}
{{--                                    @endif--}}
{{--                                </td>--}}
                                <td>
                                    <a href="{{ route('admin.dashboard.package_category.edit', $category->id) }}" class="btn btn-warning btn-sm">Edit</a>
                                    <form action="{{ route('admin.dashboard.package_category.destroy', $category->id) }}" method="POST" style="display:inline;">
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
@endsection

@section('js')
    <script>
        function showAlert(message) {
            var alertBox = document.getElementById('floatingAlert');
            var alertMessage = document.getElementById('floatingAlertMessage');
            alertMessage.textContent = message;
            alertBox.style.display = 'flex'; // عرض الرسالة كـ flexbox لمركز المحتوى عمودياً
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
