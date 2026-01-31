@extends('admin.layouts.master')
@section('css')
@endsection
@section('page-header')
    <!-- breadcrumb -->
    <div class="breadcrumb-header justify-content-between">
        <h4 class="content-title mb-0 my-auto">إدارة المقال</h4>
    </div>
    <!-- breadcrumb -->
@endsection
@section('content')
    <div class="col-xl-12">
        <div class="card">
            <div class="card-header pb-0">
                <div class="d-flex justify-content-between">
                    <h4 class="card-title mg-b-0">قائمة المقال</h4>
                    <i class="mdi mdi-dots-horizontal text-gray"></i>
                </div>
                <a href="{{ route('admin.dashboard.articles.create') }}">
                    <br>
                    <i class="typcn typcn-document-add">إضافة خبر جديد</i>
                    <br>
                </a>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table text-md-nowrap">
                        <thead>
                        <tr>
                            <th>ID</th>
                            <th>العنوان</th>
                            <th>التفاصيل</th>
{{--                            <th>المزيد من التفاصيل</th>--}}
                            <th>الصورة</th>
                            <th>الإجراءات</th>
                            <th>مسودة</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($newsItems as $news)
                            <tr>
                                <td>{{ $news->id }}</td>
                                <td>{{ $news->title_ar }}</td>
                                <td>{{ Str::limit($news->details_ar, 50) }}</td>
{{--                                <td>{{ Str::limit($news->more_details_ar, 50) }}</td>--}}
                                <td>
                                    @if($news->image)
                                        <img src="{{ asset('img/articles/' . $news->image) }}" alt="{{ $news->title }}" width="50">
                                    @else
                                        لا توجد صورة
                                    @endif
                                </td>
                                <td>
                                    <a href="{{ route('admin.dashboard.articles.edit', $news->id) }}" class="btn btn-sm btn-primary">تعديل</a>
                                    <form action="{{ route('admin.dashboard.articles.destroy', $news->id) }}" method="POST" style="display:inline-block;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-danger">حذف</button>
                                    </form>
                                </td>
                                
                                <td>
                                    <input type="checkbox" class="toggle-switch" data-id="{{ $news->id }}" {{ $news->active ? 'checked' : '' }}>
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
            alertBox.style.display = 'flex'; // عرض الرسالة كـ flexbox لمركز المحتوى عمودياً
            setTimeout(function() {
                alertBox.style.display = 'none';
            }, 5000);
        }

        function closeAlert() {
            document.getElementById('floatingAlert').style.display = 'none';
        }

        // إذا كانت هناك رسالة نجاح في الجلسة
        @if (session('success'))
        showAlert("{{ session('success') }}");
        @endif
    </script>
    
<script>
    $(document).ready(function () {
        $('.toggle-switch').on('change', function () {
            var articleId = $(this).data('id');  // تعديل هنا ليكون articleId
            var isActive = $(this).prop('checked') ? 1 : 0;

            $.ajax({
                url: "{{ route('admin.dashboard.articles.toggleActive') }}",  // تعديل هنا لتوجيه الطلب إلى المقالات
                type: "POST",
                data: {
                    _token: "{{ csrf_token() }}",
                    id: articleId,  // تعديل هنا ليكون articleId
                    active: isActive
                },
                success: function (response) {
                    showAlert(response.message);
                },
                error: function () {
                    showAlert("حدث خطأ أثناء التحديث!");
                }
            });
        });
    });
</script>

@endsection
