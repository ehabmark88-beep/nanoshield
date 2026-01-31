@extends('admin.layouts.master')

@section('content')
    <div class="container-fluid">
        <h4 class="page-title">Edit Category</h4>
        <div class="card">
            <div class="card-body">
                <form action="{{ route('admin.dashboard.package_category.update', $category->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="mb-3">
                        <label for="name" class="form-label">الاسم</label>
                        <input type="text" class="form-control" id="name_ar" name="name_ar" value="{{ $category->name_ar }}" required>
                    </div>
                    <div class="mb-3">
                        <label for="name" class="form-label">الاسم الانجليزي</label>
                        <input type="text" class="form-control" id="name" name="name" value="{{ $category->name }}" required>
                    </div>
                    <div class="mb-3">
                        <label for="details" class="form-label">Details</label>
                        <textarea class="form-control" id="details" name="details" rows="3" required>{{ $category->details }}</textarea>
                    </div>
{{--                    <div class="mb-3">--}}
{{--                        <label for="image" class="form-label">Image</label>--}}
{{--                        <input type="file" class="form-control" id="image" name="image">--}}
{{--                        @if($category->image)--}}
{{--                            <img src="{{ asset('img/package_categories/' . $category->image) }}" alt="Category Image" width="100" height="100" class="mt-2">--}}
{{--                        @endif--}}
{{--                        <input type="hidden" name="old_image" value="{{ $category->image }}">--}}
{{--                    </div>--}}
                    <button type="submit" class="btn btn-primary">Update</button>
                </form>
            </div>
        </div>
    </div>
@endsection
