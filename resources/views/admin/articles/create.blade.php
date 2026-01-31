@extends('admin.layouts.master')
@section('css')
@endsection
@section('page-header')
    <!-- breadcrumb -->
    <div class="breadcrumb-header justify-content-between">
        <h4 class="content-title mb-0 my-auto">إضافة مقال جديد</h4>
    </div>
    <!-- breadcrumb -->
@endsection
@section('content')
    <div class="col-xl-12">
        <div class="card">
            <div class="card-body">
                <form action="{{ route('admin.dashboard.articles.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf

                    <div class="form-group">
                        <label for="title_ar">العنوان (بالعربي)</label>
                        <input type="text" name="title_ar" class="form-control" id="title_ar" required>
                    </div>
                    <div class="form-group">
                        <label for="title">العنوان (بالإنجليزي)</label>
                        <input type="text" name="title" class="form-control" id="title" required>
                    </div>

                    <div class="form-group">
                        <label for="details_ar">التفاصيل (بالعربي)</label>
                        <textarea name="details_ar" class="form-control" id="details_ar" required></textarea>
                    </div>
                    <div class="form-group">
                        <label for="details">التفاصيل (بالإنجليزي)</label>
                        <textarea name="details" class="form-control" id="details" required></textarea>
                    </div>

                    <div class="form-group">
                        <label for="more_details_ar">المزيد من التفاصيل (بالعربي)</label>
                        <textarea name="more_details_ar" class="form-control rich-text-editor" id="more_details_ar" ></textarea>
                    </div>
                    <div class="form-group">
                        <label for="more_details">المزيد من التفاصيل (بالإنجليزي)</label>
                        <textarea name="more_details" class="form-control rich-text-editor" id="more_details" ></textarea>
                    </div>

                    <div class="form-group">
                        <label for="image">الصورة</label>
                        <input type="file" name="image" class="form-control" id="image" required>
                    </div>

                    <!-- حقول الميتا -->
                    <div class="form-group">
                        <label for="article_title_ar">عنوان المقال (بالعربي)</label>
                        <input type="text" name="article_title_ar" class="form-control" id="article_title_ar" required>
                    </div>
                    <div class="form-group">
                        <label for="article_title_en">عنوان المقال (بالإنجليزي)</label>
                        <input type="text" name="article_title_en" class="form-control" id="article_title_en" required>
                    </div>
                    <div class="form-group">
                        <label for="article_meta_ar">ميتا الوصف (بالعربي)</label>
                        <textarea name="article_meta_ar" class="form-control" id="article_meta_ar" required></textarea>
                    </div>
                    <div class="form-group">
                        <label for="article_meta_en">ميتا الوصف (بالإنجليزي)</label>
                        <textarea name="article_meta_en" class="form-control" id="article_meta_en" required></textarea>
                    </div>
                    <div class="form-group">
                        <label for="article_meta_keyword_ar">كلمات الميتا (بالعربي)</label>
                        <input type="text" name="article_meta_keyword_ar" class="form-control" id="article_meta_keyword_ar" required>
                    </div>
                    <div class="form-group">
                        <label for="article_meta_keyword_en">كلمات الميتا (بالإنجليزي)</label>
                        <input type="text" name="article_meta_keyword_en" class="form-control" id="article_meta_keyword_en" required>
                    </div>
                    <div class="form-group">
                        <label for="article_url_ar">رابط المقال (بالعربي)</label>
                        <input type="text" name="article_url_ar" class="form-control" id="article_url_ar"  required>
                    </div>
                    <div class="form-group">
                        <label for="article_url_en">رابط المقال (بالإنجليزي)</label>
                        <input type="text" name="article_url_en" class="form-control" id="article_url_en" required>
                    </div>

                    <button type="submit" class="btn btn-primary mt-3">حفظ المقال</button>
                </form>
            </div>
        </div>
    </div>
@endsection



@section('js')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/tinymce/6.7.1/tinymce.min.js"></script>
    <script>
    tinymce.init({
        selector: '.rich-text-editor',
        height: 500,
        menubar: true,
        plugins: [
            'advlist autolink lists link image charmap print preview anchor',
            'searchreplace visualblocks code fullscreen',
            'insertdatetime media table paste code help wordcount',
            'code', 'table', 'image', 'media', 'emoticons',
            'textcolor', 'fullscreen', 'hr', 'visualchars'
        ],
        toolbar: 'undo redo | styles | bold italic underline strikethrough | ' +
                 'alignleft aligncenter alignright alignjustify | ' +
                 'bullist numlist outdent indent | forecolor backcolor | ' +
                 'fontsize fontfamily | table | image media | ' +
                 'code fullscreen preview | removeformat help',

        // إعدادات خاصة بتعطيل الرفع والسماح فقط بروابط الصور
        automatic_uploads: false,
        paste_data_images: false,
        file_picker_types: 'image', // للسماح بواجهة إدخال رابط الصورة
        image_uploadtab: false,     // إخفاء تبويب الرفع من الجهاز
        image_title: true,

        // إضافة الكود الخاص بإدخال رابط الصورة يدويًا
        file_picker_callback: function(callback, value, meta) {
            if (meta.filetype == 'image') {
                var url = prompt("Please enter the image URL:");
                if (url) {
                    callback(url); // إرجاع الرابط الذي أدخله المستخدم
                }
            }
        },

        content_style: 'body { font-family: Arial, sans-serif; font-size: 14px; direction: rtl; }', // تأكيد الكتابة من اليمين لليسار
    });
    </script>
@endsection

