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
        display: none;
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

                <h4 class="mb-4">إضافة رأي عميل</h4>

                <form action="{{ route('admin.dashboard.reviews.store') }}"
                      method="POST"
                      enctype="multipart/form-data">
                    @csrf

                    {{-- الاسم عربي --}}
                    <div class="form-group">
                        <label class="form-label">الاسم (عربي)</label>
                        <input type="text"
                               class="form-control"
                               name="name_ar"
                               value="{{ old('name_ar') }}"
                               required>
                    </div>

                    {{-- الاسم إنجليزي --}}
                    <div class="form-group">
                        <label class="form-label">الاسم (إنجليزي)</label>
                        <input type="text"
                               class="form-control"
                               name="name"
                               value="{{ old('name') }}"
                               required>
                    </div>

                    {{-- الرأي عربي --}}
                    <div class="form-group">
                        <label class="form-label">الرأي (عربي)</label>
                        <textarea class="form-control"
                                  name="review_ar"
                                  rows="3"
                                  required>{{ old('review_ar') }}</textarea>
                    </div>

                    {{-- الرأي إنجليزي --}}
                    <div class="form-group">
                        <label class="form-label">الرأي (إنجليزي)</label>
                        <textarea class="form-control"
                                  name="review"
                                  rows="3"
                                  required>{{ old('review') }}</textarea>
                    </div>

                    {{-- صورة الريفيو العربي --}}
                    <div class="form-group">
                        <label class="form-label">صورة الريفيو (عربي)</label>
                        <input type="file"
                               class="form-control"
                               name="arabic_review_image"
                               accept="image/*"
                               onchange="previewImage(this, 'arabicPreview')">

                        <img id="arabicPreview" class="preview-img">
                    </div>

                    {{-- صورة الريفيو الإنجليزي --}}
                    <div class="form-group">
                        <label class="form-label">صورة الريفيو (إنجليزي)</label>
                        <input type="file"
                               class="form-control"
                               name="english_review_image"
                               accept="image/*"
                               onchange="previewImage(this, 'englishPreview')">

                        <img id="englishPreview" class="preview-img">
                    </div>

                    {{-- زر الحفظ --}}
                    <div class="text-end mt-4">
                        <button type="submit" class="btn btn-success">
                            <i class="bx bx-save"></i> حفظ
                        </button>
                    </div>

                </form>

            </div>
        </div>
    </div>
</div>

@endsection

@section('js')
<script>
    function previewImage(input, previewId) {
        const preview = document.getElementById(previewId);
        if (input.files && input.files[0]) {
            const reader = new FileReader();
            reader.onload = function (e) {
                preview.src = e.target.result;
                preview.style.display = 'block';
            }
            reader.readAsDataURL(input.files[0]);
        }
    }
</script>
@endsection
