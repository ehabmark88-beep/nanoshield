@extends('admin.layouts.master')

@section('css')
<style>
    .btn, .sp-container button {
        border-width: 0;
        line-height: 1.538;
        padding: 9px 20px;
        transition: 0.3s ease;
        margin: 2px;
    }

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
        z-index: 1000;
    }

    .check-icon {
        font-size: 20px;
    }

    table th, table td {
        text-align: center;
        vertical-align: middle;
    }
</style>
@endsection

@section('page-header')
<div class="breadcrumb-header justify-content-between">
    <h4 class="content-title mb-0">لوحة التحكم</h4>
    <span class="text-muted mt-1 tx-13 mr-2 mb-0">/ التوظيف</span>
</div>
@endsection

@section('content')
<div class="col-xl-12">
    <div class="card">
        <div class="card-header pb-0 d-flex justify-content-between align-items-center">
            <h4 class="card-title mb-0">🧾 طلبات التوظيف</h4>

            <!-- ✅ زر تصدير -->
            <button class="btn btn-success" onclick="exportTableToExcel('recruitmentsTable', 'طلبات_التوظيف')">
                <i class="bx bx-download"></i> تصدير إلى Excel
            </button>
        </div>

        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-striped table-hover text-center align-middle" id="recruitmentsTable">
                    <thead class="bg-light">
                        <tr>
                            <th>#</th>
                            <th>الاسم</th>
                            <th>تاريخ الميلاد</th>
                            <th>البريد الإلكتروني</th>
                            <th>رقم الجوال</th>
                            <th>الجنس</th>
                            <th>الوظيفة</th>
                            <th>المدينة</th>
                            <th>الدورات التدريبية</th>
                            <th>السيرة الذاتية</th>
                            <th>العمليات</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php use Carbon\Carbon; @endphp
                        @foreach($recruitments as $recruitment)
                            <tr>
                                <td>{{ $recruitment->id }}</td>
                                <td>{{ $recruitment->name }}</td>
                                <td>
                                    {{ $recruitment->date_of_birth 
                                        ? Carbon::parse($recruitment->date_of_birth)->locale('ar')->translatedFormat('d F Y') 
                                        : '-' }}
                                </td>
                                <td>{{ $recruitment->email }}</td>
                                <td>{{ $recruitment->phone_number ?? '-' }}</td>
                                <td>{{ $recruitment->gender == 'male' ? 'ذكر' : ($recruitment->gender == 'female' ? 'أنثى' : '-') }}</td>
                                <td>{{ $recruitment->job_position ?? '-' }}</td>
                                <td>{{ $recruitment->city ?? '-' }}</td>
                                <td>{{ $recruitment->training_courses ?? '-' }}</td>
                                <td>
                                    @if($recruitment->cv)
                                        @php $cvs = json_decode($recruitment->cv, true); @endphp
                                        @foreach ($cvs as $cv)
                                            <a href="{{ asset('recruitment/cv/' . $cv) }}" target="_blank" class="btn btn-sm btn-primary">
                                                عرض CV
                                            </a><br>
                                        @endforeach
                                    @else
                                        <span class="text-muted">لا توجد سير ذاتية</span>
                                    @endif
                                </td>
                                <td>
                                    <form action="{{ route('admin.dashboard.recruitments.destroy', $recruitment->id) }}" 
                                          method="POST"
                                          onsubmit="return confirm('هل أنت متأكد من حذف هذا الطلب؟')">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-sm btn-danger" type="submit">
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

<!-- ✅ إشعار نجاح -->
<div id="floatingAlert" class="floating-alert">
    <span id="floatingAlertMessage"></span>
    <span class="check-icon">&#10003;</span>
</div>
@endsection

@section('js')
<script>
    // ✅ دالة تصدير إلى Excel بصيغة .xls تدعم العربية
    function exportTableToExcel(tableID, filename = '') {
        const table = document.getElementById(tableID);
        const tableClone = table.cloneNode(true);

        // إزالة عمود "العمليات" من النسخة
        tableClone.querySelectorAll('tr').forEach(row => {
            row.removeChild(row.lastElementChild);
        });

        // إنشاء HTML خاص بـ Excel
        const html = `
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
                        font-family: "Segoe UI", sans-serif;
                    }
                    th {
                        background: #f2f2f2;
                        font-weight: bold;
                    }
                </style>
            </head>
            <body>${tableClone.outerHTML}</body>
            </html>
        `;

        // حفظ كملف Excel
        const blob = new Blob([html], { type: 'application/vnd.ms-excel' });
        const link = document.createElement('a');
        const url = URL.createObjectURL(blob);
        link.href = url;
        link.download = (filename || 'تقرير_التوظيف') + '.xls';
        document.body.appendChild(link);
        link.click();
        document.body.removeChild(link);
    }

    // 🔹 دالة عرض التنبيه
    function showAlert(message) {
        const alertBox = document.getElementById('floatingAlert');
        const alertMessage = document.getElementById('floatingAlertMessage');
        alertMessage.textContent = message;
        alertBox.style.display = 'flex';
        setTimeout(() => { alertBox.style.display = 'none'; }, 4000);
    }

    // 🔹 تشغيل التنبيه لو فيه رسالة نجاح من الجلسة
    @if (session('success'))
        showAlert("{{ session('success') }}");
    @endif
</script>
@endsection
