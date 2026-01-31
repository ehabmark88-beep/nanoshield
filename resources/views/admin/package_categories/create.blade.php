@extends('admin.layouts.master')

@section('content')
    <br><br>
    <div class="container-fluid">
        <h4 class="page-title">Add New Category</h4>
        <div class="card">
            <div class="card-body">
                <form action="{{ route('admin.dashboard.package_category.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3">
                        <label for="name" class="form-label">الاسم</label>
                        <input type="text" class="form-control" id="name_ar" name="name_ar" required>
                    </div>
                    <div class="mb-3">
                        <label for="name" class="form-label">الاسم الانجليزي</label>
                        <input type="text" class="form-control" id="name" name="name" required>
                    </div>
                    <div class="mb-3">
                        <label for="details" class="form-label">Details</label>
                        <textarea class="form-control" id="details" name="details" rows="3" required></textarea>
                    </div>
{{--                    <div class="mb-3">--}}
{{--                        <label for="image" class="form-label">Image</label>--}}
{{--                        <input type="file" class="form-control" id="image" name="image">--}}
{{--                    </div>--}}
                    <button type="submit" class="btn btn-primary">Save</button>
                </form>
            </div>
        </div>
    </div>
@endsection
