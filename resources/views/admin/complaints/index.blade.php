@extends('admin.layouts.master')

@section('css')
<style>
    :root {
        --card-bg: #ffffff;
        --muted: #6c757d;
        --success: #28a745;
        --table-header-bg: #f8f9fa;
    }

    body, .card, .table { direction: rtl; }

    .card {
        background: var(--card-bg);
        border: 1px solid #e9ecef;
        border-radius: 8px;
        box-shadow: 0 6px 18px rgba(17, 24, 39, 0.04);
    }

    .card-header {
        padding: 12px 18px;
        border-bottom: 1px solid #eef0f3;
        display: flex;
        justify-content: space-between;
        align-items: center;
    }

    .card-title {
        font-weight: 700;
        font-size: 1.05rem;
        display: flex;
        align-items: center;
        gap: 8px;
    }

    .table {
        margin-bottom: 0;
        border-collapse: separate;
        border-spacing: 0 8px;
    }

    .table thead th {
        background: var(--table-header-bg);
        text-align: center;
        padding: 12px 10px;
    }

    .table tbody tr {
        background: #fff;
        box-shadow: 0 1px 3px rgba(16,24,40,0.03);
    }

    .table tbody td {
        padding: 12px 10px;
        vertical-align: middle;
    }

    .images-grid {
        display: flex;
        gap: 6px;
        justify-content: center;
        flex-wrap: wrap;
    }

    .images-grid img {
        width: 80px;
        height: 70px;
        object-fit: cover;
        border-radius: 6px;
        border: 1px solid #e9ecef;
    }

    .msg-cell {
        max-width: 300px;
        white-space: pre-wrap;
        word-break: break-word;
        direction: ltr;
        text-align: left;
    }

    .floating-alert {
        position: fixed;
        bottom: 20px;
        right: 20px;
        background: var(--success);
        color: #fff;
        padding: 10px 14px;
        border-radius: 8px;
        display: none;
        gap: 8px;
        box-shadow: 0 6px 20px rgba(34,197,94,0.12);
        z-index: 1050;
    }

    @media print {
        .actions-group, .btn, .floating-alert, .breadcrumb-header { display: none !important; }
    }
</style>
@endsection

@section('page-header')
<div class="breadcrumb-header justify-content-between">
    <h4 class="content-title mb-0">لوحة التحكم</h4>
    <span class="text-muted mt-1 tx-13 mr-2 mb-0">/ الشكاوي</span>
</div>
@endsection

@section('content')
<div class="col-xl-12">
    <div class="card">

        {{-- Header --}}
        <div class="card-header">
            <div class="card-title">
                📋 قائمة الشكاوي
            </div>

            <div class="actions-group d-flex gap-2">
                <button class="btn btn-info btn-sm" onclick="window.print()">
                    <i class="bx bx-printer"></i> طباعة
                </button>

                <button class="btn btn-success btn-sm"
                        onclick="exportTableToExcel('complaintsTable','complaints_export')">
                    <i class="bx bx-download"></i> تصدير إلى Excel
                </button>
            </div>
        </div>

        {{-- Body --}}
        <div class="card-body">
            <div class="table-responsive" style="max-height:65vh; overflow:auto;">
                <table class="table table-hover text-center align-middle"
                       id="complaintsTable">

                    <thead>
                    <tr>
                        <th>#</th>
                        <th>نوع الشكوى</th>
                        <th>الفرع</th>
                        <th>الاسم</th>
                        <th>رقم الجوال</th>
                        <th>الإيميل</th>
                        <th>رقم الفاتورة</th>
                        <th data-ignore>الصور</th>
                        <th>الرسالة</th>
                        <th>تاريخ الإرسال</th>
                        <th data-ignore>العمليات</th>
                    </tr>
                    </thead>

                    <tbody>
                    @php use Carbon\Carbon; @endphp

                    @forelse($complaints as $complaint)
                        <tr>
                            <td>{{ $complaint->id }}</td>
                            <td>{{ $complaint->complaint_type }}</td>
                            <td>{{ optional($complaint->branch)->branch_name_ar ?? '-' }}</td>
                            <td>{{ $complaint->name }}</td>
                            <td>{{ $complaint->phone_number }}</td>
                            <td>{{ $complaint->email ?? '-' }}</td>
                            <td>{{ $complaint->invoice_number ?? '-' }}</td>

                            <td data-ignore>
                                @if(!empty($complaint->image))
                                    <div class="images-grid">
                                        @foreach(json_decode($complaint->image) as $image)
                                            <img src="{{ asset('complaints/images/'.$image) }}">
                                        @endforeach
                                    </div>
                                @else
                                    -
                                @endif
                            </td>

                            <td class="msg-cell">
                                {{ $complaint->message }}
                            </td>

                            <td>
                                {{ Carbon::parse($complaint->created_at)
                                    ->locale('ar')
                                    ->translatedFormat('d F Y - h:i A') }}
                            </td>

                            <td data-ignore>
                                <form action="{{ route('admin.dashboard.complaint.destroy', $complaint->id) }}"
                                      method="post"
                                      onsubmit="return confirm('هل أنت متأكد من الحذف؟')">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-sm btn-danger">
                                        <i class="bx bx-trash"></i>
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="11" class="text-muted">لا توجد شكاوي حالياً.</td>
                        </tr>
                    @endforelse
                    </tbody>

                </table>
            </div>
        </div>
    </div>
</div>

{{-- Floating Alert --}}
<div id="floatingAlert" class="floating-alert">
    <span id="floatingAlertMessage"></span>
    ✔
</div>
@endsection

@section('js')
<script>
function exportTableToExcel(tableID, filename = 'export') {
    const table = document.getElementById(tableID);
    if (!table) return;

    const clone = table.cloneNode(true);

    // حذف الأعمدة الممنوعة
    clone.querySelectorAll('[data-ignore]').forEach(el => el.remove());

    // حذف أي صور أو أزرار
    clone.querySelectorAll('img, a, button, form').forEach(el => el.remove());

    const html = `
        <html xmlns:o="urn:schemas-microsoft-com:office:office"
              xmlns:x="urn:schemas-microsoft-com:office:excel"
              xmlns="http://www.w3.org/TR/REC-html40" dir="rtl">
        <head>
            <meta charset="UTF-8">
            <style>
                table { border-collapse: collapse; width: 100%; direction: rtl; }
                th, td {
                    border: 1px solid #000;
                    padding: 6px;
                    text-align: center;
                    white-space: pre-wrap;
                }
                th { background: #f2f2f2; font-weight: bold; }
            </style>
        </head>
        <body>${clone.outerHTML}</body>
        </html>
    `;

    const blob = new Blob(['\uFEFF' + html], {
        type: 'application/vnd.ms-excel;charset=utf-8;'
    });

    const url = URL.createObjectURL(blob);
    const a = document.createElement('a');
    a.href = url;
    a.download = filename + '.xls';
    document.body.appendChild(a);
    a.click();
    document.body.removeChild(a);
    URL.revokeObjectURL(url);

    showFloatingAlert('تم تصدير ملف Excel بنجاح');
}

function showFloatingAlert(message) {
    const el = document.getElementById('floatingAlert');
    document.getElementById('floatingAlertMessage').textContent = message;
    el.style.display = 'flex';
    setTimeout(() => el.style.display = 'none', 2500);
}
</script>
@endsection
