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
        z-index: 1000;
    }
    .check-icon {
        font-size: 20px;
    }
</style>
@endsection

@section('page-header')
    <div class="breadcrumb-header justify-content-between">
        <h4 class="content-title mb-0">لوحة التحكم</h4>
        <span class="text-muted mt-1 tx-13 mr-2 mb-0">/ التواصل</span>
    </div>
@endsection

@section('content')
<div class="col-xl-12">
    <div class="card">
        <div class="card-header pb-0 d-flex justify-content-between align-items-center">
            <h4 class="card-title mb-0">📬 رسائل التواصل</h4>
<button class="btn btn-success"
        onclick="exportTableToExcel('contactsTable', 'contacts_messages')">
    <i class="bx bx-download"></i> تصدير إلى Excel
</button>

        </div>

        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-striped table-hover text-center align-middle" id="contactsTable">
                    <thead class="bg-light">
                        <tr>
                            <th>#</th>
                            <th>الاسم</th>
                            <th>رقم الجوال</th>
                            <th>البريد الإلكتروني</th>
                            <th>عنوان الرسالة</th>
                            <th>الرسالة</th>
                            <th>تاريخ الإرسال</th>
                            <th>العمليات</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php use Carbon\Carbon; @endphp
                        @foreach($contacts as $contact)
                            <tr>
                                <td>{{ $contact->id }}</td>
                                <td>{{ $contact->name }}</td>
                                <td>{{ $contact->phone_number }}</td>
                                <td>{{ $contact->email }}</td>
                                <td>{{ $contact->subject }}</td>
                                <td>{{ $contact->message }}</td>

                                {{-- 🕓 التاريخ والوقت بالعربي --}}
                                <td>
                                    {{ Carbon::parse($contact->created_at)
                                        ->locale('ar')
                                        ->translatedFormat('d F Y - h:i A') }}
                                </td>

                                <td>
                                    <form action="{{ route('admin.dashboard.contact_us.destroy', $contact->id) }}" 
                                          method="post"
                                          onsubmit="return confirm('هل أنت متأكد من حذف هذه الرسالة؟')">
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

<!-- ✅ إشعار عائم -->
<div id="floatingAlert" class="floating-alert">
    <span id="floatingAlertMessage"></span>
    <span class="check-icon">&#10003;</span>
</div>
@endsection

@section('js')
<script>
function exportTableToExcel(tableID, filename = 'export') {
    const table = document.getElementById(tableID);
    if (!table) return;

    // 🔹 ننسخ الجدول علشان نعدل عليه بدون ما نلمس الأصلي
    const clone = table.cloneNode(true);

    // 🔹 حذف عمود العمليات (آخر عمود)
    clone.querySelectorAll('tr').forEach(row => {
        if (row.cells.length) {
            row.deleteCell(row.cells.length - 1);
        }
    });

    // 🔹 قالب Excel سليم بترميز UTF-8
    const html = `
        <html xmlns:o="urn:schemas-microsoft-com:office:office"
              xmlns:x="urn:schemas-microsoft-com:office:excel"
              xmlns="http://www.w3.org/TR/REC-html40">
        <head>
            <meta charset="UTF-8">
            <style>
                table { border-collapse: collapse; width: 100%; }
                th, td {
                    border: 1px solid #000;
                    padding: 6px;
                    text-align: center;
                    vertical-align: middle;
                }
                th { background: #f2f2f2; font-weight: bold; }
                td { white-space: pre-wrap; }
            </style>
        </head>
        <body>
            ${clone.outerHTML}
        </body>
        </html>
    `;

    const blob = new Blob([html], {
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
}
</script>

@endsection
