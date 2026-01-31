@extends('admin.layouts.master')

@section('css')
<style>
    .floating-alert {
        position: fixed;
        bottom: 20px;
        right: 20px;
        background: #28a745;
        color: #fff;
        padding: 12px 18px;
        border-radius: 8px;
        display: none;
        align-items: center;
        gap: 8px;
        box-shadow: 0 4px 10px rgba(0,0,0,0.2);
        z-index: 9999;
    }
    .check-icon {
        font-size: 20px;
    }
    .btn-download {
        font-size: 13px;
        padding: 5px 10px;
    }
</style>
@endsection

@section('page-header')
    <div class="breadcrumb-header justify-content-between">
        <h4 class="content-title mb-0">لوحة التحكم</h4>
        <span class="text-muted mt-1 tx-13 mr-2 mb-0">/ الامتياز التجاري</span>
    </div>
@endsection

@section('content')
<div class="col-xl-12">
    <div class="card">
        <div class="card-header pb-0 d-flex justify-content-between align-items-center">
            <h4 class="card-title mb-0">📋 طلبات الامتياز التجاري</h4>
            <button class="btn btn-success" onclick="exportTableToExcel('commercialTable', 'طلبات_الامتياز_التجاري')">
                <i class="bx bx-download"></i> تصدير إلى Excel
            </button>
        </div>

        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-striped table-hover text-center align-middle" id="commercialTable">
                    <thead class="bg-light">
                        <tr>
                            <th>#</th>
                            <th>الاسم</th>
                            <th>رقم الجوال</th>
                            <th>الجنسية</th>
                            <th>المدينة</th>
                            <th>الدولة</th>
                            <th>تاريخ التقديم</th>
                            <th>العمليات</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                            use Carbon\Carbon;
                        @endphp
                        @foreach($com_cons as $com_con)
                            <tr>
                                <td>{{ $com_con->id }}</td>
                                <td>{{ $com_con->name }}</td>
                                <td>{{ $com_con->phone_number }}</td>
                                <td>{{ $com_con->nationality }}</td>
                                <td>{{ $com_con->city }}</td>
                                <td>{{ $com_con->country }}</td>
                                <td>
                                    {{ Carbon::parse($com_con->created_at)
                                        ->locale('ar')
                                        ->translatedFormat('d F Y - h:i A') }}
                                </td>
                                <td>
                                    <form action="{{ route('admin.dashboard.commercial_concession.destroy', $com_con->id) }}" 
                                          method="post" 
                                          onsubmit="return confirm('هل أنت متأكد من حذف هذا الطلب؟')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-danger">
                                            <i class="bx bx-trash"></i>
                                        </button>
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

<!-- ✅ إشعار تأكيد -->
<div id="floatingAlert" class="floating-alert">
    <span id="floatingAlertMessage"></span>
    <span class="check-icon">&#10003;</span>
</div>
@endsection

@section('js')
@section('js')
<script>
function exportTableToExcel(tableID, filename = '') {
    // نحدد الجدول
    const table = document.getElementById(tableID);
    // نأخذ نسخة HTML من الجدول (بكل التنسيق)
    const tableHTML = `
        <html xmlns:o="urn:schemas-microsoft-com:office:office" 
              xmlns:x="urn:schemas-microsoft-com:office:excel" 
              xmlns="http://www.w3.org/TR/REC-html40">
        <head>
            <meta charset="UTF-8">
            <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
            <style>
                table, td, th {
                    border: 1px solid #000;
                    text-align: center;
                    direction: rtl;
                }
                th {
                    background: #f2f2f2;
                }
            </style>
        </head>
        <body>
            ${table.outerHTML}
        </body>
        </html>
    `;

    // نجهّز الملف باسم
    const blob = new Blob([tableHTML], { type: 'application/vnd.ms-excel' });
    const link = document.createElement('a');
    const url = URL.createObjectURL(blob);

    link.href = url;
    link.download = (filename ? filename : 'تقرير') + '.xls';
    document.body.appendChild(link);
    link.click();
    document.body.removeChild(link);
}
</script>
@endsection

@endsection
