@extends('admin.layouts.master')

@section('css')
<style>
    :root{
        --card-bg: #fff;
        --muted: #6c757d;
        --accent: #0d6efd;
        --success: #28a745;
        --danger: #dc3545;
        --table-header-bg: #f8f9fa;
        --border: #e9ecef;
    }

    /* RTL */
    body, .card, .table { direction: rtl; }

    .card {
        background: var(--card-bg);
        border: 1px solid var(--border);
        border-radius: 10px;
        box-shadow: 0 8px 24px rgba(20,24,40,0.04);
    }

    .card-header { padding: 12px 18px; border-bottom: 1px solid #eef0f3; }
    .card-title { font-weight: 700; font-size: 1.1rem; display:flex; align-items:center; gap:8px; }

    .actions-group button { margin-left: 8px; border-radius: 6px; padding: 7px 10px; }
    .btn-download { padding: 6px 10px; }

    .table {
        border-collapse: separate;
        border-spacing: 0 8px;
        margin-bottom: 0;
        width: 100%;
    }
    .table thead th {
        background: var(--table-header-bg);
        position: sticky;
        top: 0;
        z-index: 3;
        padding: 12px 10px;
        text-align: center;
        vertical-align: middle;
    }
    .table tbody tr {
        background: #fff;
        border-radius: 8px;
        box-shadow: 0 1px 3px rgba(16,24,40,0.03);
    }
    .table tbody td { padding: 12px 10px; vertical-align: middle; text-align: center; }

    /* صور ومرفقات */
    .images-grid { display:flex; gap:8px; flex-wrap:wrap; justify-content:center; }
    .images-grid img { width:90px; height:70px; object-fit:cover; border-radius:6px; border:1px solid var(--border); }
    .attachments-grid { display:flex; gap:8px; flex-wrap:wrap; justify-content:center; }
    .attachments-grid a { display:inline-block; padding:6px 10px; border-radius:6px; border:1px solid var(--border); background:#f7f9fc; font-size:13px; text-decoration:none; color:inherit; }

    .msg-cell { max-width:320px; white-space:pre-wrap; word-break:break-word; direction:ltr; text-align:left; }

    .floating-alert {
        position: fixed;
        bottom: 20px;
        right: 20px;
        background: var(--success);
        color: #fff;
        padding: 10px 14px;
        border-radius: 8px;
        display: none;
        align-items: center;
        gap: 8px;
        box-shadow: 0 8px 20px rgba(34,197,94,0.12);
        z-index: 1050;
    }

    @media print {
        .actions-group, .floating-alert, .breadcrumb-header { display: none !important; }
        .table thead th { position: static !important; }
        .msg-cell { direction: rtl; text-align: right; }
    }

    @media (max-width:900px) {
        .card-header { flex-direction: column; align-items: flex-start; gap:8px; }
        .table thead th, .table tbody td { font-size:13px; padding:8px 6px; }
        .msg-cell { max-width:180px; }
        .images-grid img { width:70px; height:55px; }
    }
</style>
@endsection

@section('page-header')
    <div class="breadcrumb-header justify-content-between">
        <!-- يمكنك إضافة breadcrumb هنا -->
    </div>
@endsection

@section('content')
<div class="col-xl-12">
    <div class="card">
        <div class="card-header pb-0">
            <div class="d-flex justify-content-between align-items-center w-100">
                <div class="card-title">
                    <span style="font-size:1.25rem;">🏗️</span>
                    <span>حجوزات المقاولات</span>
                </div>

                <div class="actions-group">
                    <button class="btn btn-info btn-sm" onclick="window.print();" title="طباعة">
                        <i class="bx bx-printer"></i> طباعة
                    </button>
                    <button class="btn btn-success btn-sm btn-download" onclick="exportTableToExcel('bookingsTable','construction_bookings')" title="تصدير إلى Excel">
                        <i class="bx bx-download"></i> تصدير إلى Excel
                    </button>
                </div>
            </div>
        </div>

        <div class="card-body">
            <div class="table-responsive" style="max-height:65vh; overflow:auto; padding-right:6px;">
                <!-- debug: uploaded file local path (للرجوع للصورة المرفوعة محلياً) -->
                <!-- Uploaded file local path: /mnt/data/ae29811b-766e-497a-b332-046e13323b14.png -->

                <div id="example1_wrapper" class="dataTables_wrapper dt-bootstrap4 no-footer">
                    <div class="row mb-2">
                        <div class="col-sm-12 col-md-6">
                            <div id="example1_filter" class="dataTables_filter">
                                <label>
                                    <input type="search" class="form-control form-control-sm" placeholder="بحث..." aria-controls="example1">
                                </label>
                            </div>
                        </div>
                        <div class="col-sm-12 col-md-6 text-left">
                            <!-- أزرار إضافية ممكن توضع هنا -->
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-sm-12">
                            <table class="table text-md-nowrap dataTable no-footer" id="bookingsTable" role="grid">
                                <thead>
                                    <tr role="row">
                                        <th class="wd-15p border-bottom-0">ID</th>
                                        <th class="wd-15p border-bottom-0">اسم العميل</th>
                                        <th class="wd-15p border-bottom-0">نوع الحجز</th>
                                        <th class="wd-15p border-bottom-0">المساحة التقريبية</th>
                                        <th class="wd-15p border-bottom-0">رقم الجوال</th>
                                        <th class="wd-15p border-bottom-0">الحالة</th>
                                        <th class="wd-15p border-bottom-0">التاريخ</th>
                                        <th class="wd-25p border-bottom-0">الإجراءات</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach($bookings as $booking)
                                    <tr role="row" class="odd">
                                        <td>{{ $booking->id }}</td>
                                        <td>{{ $booking->name }}</td>
                                        <td>{{ $booking->service ? $booking->service->name : 'الخدمة غير موجودة' }}</td>
                                        <td>{{ $booking->approximate_area }}</td>
                                        <td>{{ $booking->phone_number }}</td>
                                        <td>{{ $booking->status }}</td>
        <td>
            {{ \Carbon\Carbon::parse($booking->created_at)->locale('ar')->translatedFormat('d F Y - h:i A') }}
        </td>
                                        <td style="text-align: left;">
                                            {{-- صور الموقع --}}
                                            @if(!empty($booking->image))
                                                @php
                                                    $imgs = json_decode($booking->image);
                                                @endphp

                                                @if(is_array($imgs) && count($imgs))
                                                    <div style="margin-bottom:8px;">
                                                        <strong>صور الموقع:</strong>
                                                        <div class="images-grid" style="margin-top:6px;">
                                                            @foreach($imgs as $img)
                                                                @if($img)
                                                                    <a href="{{ asset('construction_bookings/img/' . $img) }}" target="_blank" title="عرض الصورة">
                                                                        <img src="{{ asset('construction_bookings/img/' . $img) }}" alt="صورة الحجز">
                                                                    </a>
                                                                @endif
                                                            @endforeach
                                                        </div>
                                                    </div>
                                                @else
                                                    <p class="text-muted">لا توجد صور</p>
                                                @endif
                                            @else
                                                <p class="text-muted">لا توجد صور</p>
                                            @endif

                                            {{-- ملفات السجل التجاري --}}
                                            @if(!empty($booking->commercial_registry_files))
                                                @php
                                                    $files = json_decode($booking->commercial_registry_files);
                                                @endphp

                                                @if(is_array($files) && count($files))
                                                    <div style="margin-top:8px;">
                                                        <strong>ملفات السجل التجاري:</strong>
                                                        <div class="attachments-grid" style="margin-top:6px;">
                                                            @foreach($files as $file)
                                                                @if($file)
                                                                    <a href="{{ asset('commercial_registries/img/' . $file) }}" target="_blank" download title="تحميل {{ $file }}">
                                                                        <i class="bx bx-cloud-download"></i> تحميل
                                                                    </a>
                                                                @endif
                                                            @endforeach
                                                        </div>
                                                    </div>
                                                @else
                                                    <p class="text-muted">لا توجد ملفات</p>
                                                @endif
                                            @else
                                                <p class="text-muted">لا توجد ملفات</p>
                                            @endif

                                            {{-- حذف --}}
                                            <div style="margin-top:10px;">
                                                <form action="{{ route('admin.dashboard.construction_booking.destroy', $booking->id) }}" method="post" onsubmit="return confirm('هل تريد حذف هذا الحجز؟');">
                                                    @method('DELETE')
                                                    @csrf
                                                    <button class="btn btn-sm btn-danger" type="submit">
                                                        <i class="bx bx-trash me-1"></i> حذف
                                                    </button>
                                                </form>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach

                                @if($bookings->isEmpty())
                                    <tr>
                                        <td colspan="7" class="text-muted" style="padding:30px 0; text-align:center;">لا توجد حجوزات حالياً.</td>
                                    </tr>
                                @endif
                                </tbody>
                            </table>
                        </div>
                    </div>

                    <div class="row mt-2">
                        <div class="col-sm-12 col-md-5"></div>
                        <div class="col-sm-12 col-md-7 text-end">
                            <!-- مكان للـ pagination إن رغبت -->
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- إشعار عائم -->
        <div id="floatingAlert" class="floating-alert" role="status" aria-live="polite">
            <span id="floatingAlertMessage"></span>
            <span class="check-icon" aria-hidden="true">&#10003;</span>
        </div>
    </div>
</div>
@endsection

@section('js')
<script>
    // تصدير الجدول إلى Excel مع BOM لدعم العربية
    function exportTableToExcel(tableID, filename = '') {
        var table = document.getElementById(tableID);
        if(!table) return showAlert('الجدول غير موجود');

        var html = table.outerHTML;
        var bom = '\uFEFF';
        var uri = 'data:application/vnd.ms-excel;charset=utf-8,' + encodeURIComponent(bom + html);
        var link = document.createElement('a');
        link.href = uri;
        link.download = filename ? filename + '.xls' : 'export.xls';

        document.body.appendChild(link);
        link.click();
        document.body.removeChild(link);

        showAlert('تم تصدير الملف بنجاح');
    }

    function showAlert(message) {
        var el = document.getElementById('floatingAlert');
        var msg = document.getElementById('floatingAlertMessage');
        msg.textContent = message;
        el.style.display = 'flex';
        setTimeout(function(){ el.style.display = 'none'; }, 3000);
    }

    @if(session('success'))
    showAlert("{{ session('success') }}");
    @endif
</script>
@endsection
