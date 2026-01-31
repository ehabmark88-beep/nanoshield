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
    <h4 class="card-title">الأسئلة</h4>
</div>
@endsection

@section('content')
<div class="col-xl-12">
    <div class="card">

        {{-- Header --}}
        <div class="card-header pb-0 d-flex justify-content-between align-items-center">
            <h4 class="card-title mg-b-0">إدارة الأسئلة الشائعة</h4>

            <button class="btn btn-success btn-sm"
                    onclick="exportTableToExcel('faqsTable','faqs')">
                <i class="bx bx-download"></i>
                تصدير Excel
            </button>
        </div>

        {{-- Body --}}
        <div class="card-body">
            <div class="table-responsive">
                <table class="table text-md-nowrap dataTable no-footer"
                       id="faqsTable">

                    <thead>
                    <tr>
                        <th>ID</th>
                        <th>الاسم</th>
                        <th>رقم الهاتف</th>
                        <th>البريد الإلكتروني</th>
                        <th>الرسالة</th>
                        <th data-ignore>الإجراء</th>
                    </tr>
                    </thead>

                    <tbody>
                    @foreach($faqs as $faq)
                        <tr>
                            <td>{{ $faq->id }}</td>
                            <td>{{ $faq->name }}</td>
                            <td>{{ $faq->phone_number }}</td>
                            <td>{{ $faq->email }}</td>
                            <td style="white-space: pre-wrap;">
                                {{ $faq->message }}
                            </td>
                            <td data-ignore>
                                <form action="{{ route('admin.dashboard.form-faq.destroy', $faq->id) }}"
                                      method="post"
                                      onsubmit="return confirm('هل أنت متأكد من الحذف؟')"
                                      style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm">
                                        حذف
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

{{-- Floating Alert --}}
<div id="floatingAlert" class="floating-alert">
    <span id="floatingAlertMessage"></span>
    <span class="check-icon">&#10003;</span>
</div>
@endsection

@section('js')
<script>
/* ===== Export Table To Excel (No Libraries) ===== */
function exportTableToExcel(tableID, filename = 'export') {
    const table = document.getElementById(tableID);
    if (!table) return;

    const clone = table.cloneNode(true);

    // حذف الأعمدة اللي عليها data-ignore (الإجراء)
    clone.querySelectorAll('[data-ignore]').forEach(el => el.remove());

    // حذف أي أزرار أو فورم
    clone.querySelectorAll('button, form').forEach(el => el.remove());

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
                    vertical-align: middle;
                    white-space: pre-wrap;
                }
                th {
                    background: #f2f2f2;
                    font-weight: bold;
                }
            </style>
        </head>
        <body>
            ${clone.outerHTML}
        </body>
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

    showAlert('تم تصدير ملف Excel بنجاح');
}

/* ===== Floating Alert ===== */
function showAlert(message) {
    const alertBox = document.getElementById('floatingAlert');
    const alertMessage = document.getElementById('floatingAlertMessage');
    alertMessage.textContent = message;
    alertBox.style.display = 'flex';
    setTimeout(() => {
        alertBox.style.display = 'none';
    }, 3000);
}

@if (session('success'))
    showAlert("{{ session('success') }}");
@endif
</script>
@endsection
