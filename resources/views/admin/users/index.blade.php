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
    <h4 class="content-title mb-0">المستخدمين</h4>
</div>
@endsection

@section('content')
<div class="col-xl-12">
    <div class="card">

        {{-- Header --}}
        <div class="card-header pb-0">
            <div class="d-flex justify-content-between align-items-center">
                <h4 class="card-title mg-b-0">المستخدمين</h4>

                <button class="btn btn-success btn-sm"
                        onclick="exportTableToExcel('usersTable','users')">
                    <i class="bx bx-download"></i>
                    تصدير Excel
                </button>
            </div>
        </div>

        {{-- Body --}}
        <div class="card-body">
            <div class="table-responsive">

                <table class="table text-md-nowrap dataTable no-footer"
                       id="usersTable">

                    <thead>
                    <tr>
                        <th>Id</th>
                        <th>الاسم</th>
                        <th>E-mail</th>
                        <th>رقم الجوال</th>
                        <th data-ignore>Action</th>
                    </tr>
                    </thead>

                    <tbody>
                    @foreach($users as $user)
                        <tr>
                            <td>{{ $user->id }}</td>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->email }}</td>
                            <td>{{ $user->phone_number }}</td>
                            <td data-ignore>
                                <form action="{{ route('admin.dashboard.users.destroy', $user->id) }}"
                                      method="post"
                                      onsubmit="return confirm('هل أنت متأكد من الحذف؟')">
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

    // حذف الأعمدة اللي عليها data-ignore
    clone.querySelectorAll('[data-ignore]').forEach(el => el.remove());

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

/* ===== Floating Alert ===== */
function showAlert(message) {
    const alertBox = document.getElementById('floatingAlert');
    const alertMessage = document.getElementById('floatingAlertMessage');
    alertMessage.textContent = message;
    alertBox.style.display = 'flex';
    setTimeout(() => {
        alertBox.style.display = 'none';
    }, 5000);
}

@if (session('success'))
    showAlert("{{ session('success') }}");
@endif
</script>
@endsection
