@extends('admin.layouts.master')

@section('css')
<style>
    .preview-img {
        width: 120px;
        height: 120px;
        object-fit: cover;
        border-radius: 8px;
        border: 1px solid #ddd;
        margin-top: 8px;
    }
</style>
@endsection

@section('page-header')
<!-- breadcrumb -->
<div class="breadcrumb-header justify-content-between"></div>
<!-- breadcrumb -->
@endsection

@section('content')

<div class="row">
    <div class="col-lg-12 col-md-12">
        <div class="card">
            <div class="card-body">

                <h4 class="mb-4">تعديل رأي عميل</h4>

                <form action="{{ route('admin.dashboard.reviews.update', $review->id) }}"
                      method="POST"
                      enctype="multipart/form-data">
                    @csrf
                    @method('PATCH')

                    {{-- الاسم عربي --}}
                    <div class="form-group">
                        <label class="form-label">الاسم (عربي)</label>
                        <input type="text"
                               class="form-control"
                               name="name_ar"
                               value="{{ $review->name_ar }}"
                               required>
                    </div>

                    {{-- الاسم إنجليزي --}}
                    <div class="form-group">
                        <label class="form-label">الاسم (إنجليزي)</label>
                        <input type="text"
                               class="form-control"
                               name="name"
                               value="{{ $review->name }}"
                               required>
                    </div>

                    {{-- الرأي عربي --}}
                    <div class="form-group">
                        <label class="form-label">الرأي (عربي)</label>
                        <textarea class="form-control"
                                  name="review_ar"
                                  rows="3"
                                  required>{{ $review->review_ar }}</textarea>
                    </div>

                    {{-- الرأي إنجليزي --}}
                    <div class="form-group">
                        <label class="form-label">الرأي (إنجليزي)</label>
                        <textarea class="form-control"
                                  name="review"
                                  rows="3"
                                  required>{{ $review->review }}</textarea>
                    </div>

                    {{-- صورة الريفيو العربي --}}
                    <div class="form-group">
                        <label class="form-label">صورة الريفيو (عربي)</label>
                        <input type="file"
                               class="form-control"
                               name="arabic_review_image"
                               accept="image/*">

                        @if($review->arabic_review_images)
                            <img src="{{ asset('uploads/reviews/'.$review->arabic_review_images) }}"
                                 class="preview-img"
                                 alt="Arabic Review Image">
                        @endif
                    </div>

                    {{-- صورة الريفيو الإنجليزي --}}
                    <div class="form-group">
                        <label class="form-label">صورة الريفيو (إنجليزي)</label>
                        <input type="file"
                               class="form-control"
                               name="english_review_image"
                               accept="image/*">

                        @if($review->english_review_images)
                            <img src="{{ asset('uploads/reviews/'.$review->english_review_images) }}"
                                 class="preview-img"
                                 alt="English Review Image">
                        @endif
                    </div>

                    {{-- زر الحفظ --}}
                    <div class="text-end mt-4">
                        <button type="submit" class="btn btn-success">
                            <i class="bx bx-save"></i> حفظ التعديلات
                        </button>
                    </div>

                </form>

            </div>
        </div>
    </div>
</div>

@endsection

@section('js')
@endsection
