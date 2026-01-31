@extends('admin.layouts.master')
@section('css')
@endsection
@section('page-header')
    <!-- breadcrumb -->
    <div class="breadcrumb-header justify-content-between">
    </div>
    <!-- breadcrumb -->
@endsection
@section('content')
    <div class="col-xl-12">
        <div class="card">
            <div class="card-header pb-0">
                <div class="d-flex justify-content-between align-items-center">
                    <h4 class="card-title mg-b-0">الشراكات والعقود</h4>
                    <div>
                        <!-- 🔹 زر تصدير إلى Excel -->
                        <button class="btn btn-success btn-sm" onclick="exportTableToExcel('example1', 'الشراكات_والعقود')">
                            تصدير إلى Excel
                        </button>
                    </div>
                </div>
            </div>

            <div class="card-body">
                <div class="table-responsive">
                    <div id="example1_wrapper" class="dataTables_wrapper dt-bootstrap4 no-footer">
                        <div class="row">
                            <div class="col-sm-12">
                                <table class="table text-md-nowrap dataTable no-footer" id="example1" role="grid" aria-describedby="example1_info">
                                    <thead>
                                    <tr role="row">
                                        <th>رقم الشراكة</th>
                                        <th>اسم الجهة</th>
                                        <th>نوع الجهة</th>
                                        <th>مسؤول التواصل</th>
                                        <th>رقم الجوال</th>
                                        <th>البريد الإلكتروني</th>
                                        <th>نموذج الطلب</th>
                                        <th>التاريخ</th>
                                        <th>مرفقات الشراكة</th>
                                        <th>العمليات</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($partnerships as $partnership)
                                        <tr role="row" class="odd">
                                            <td>{{ $partnership->id }}</td>
                                            <td>{{ $partnership->organization_name }}</td>
                                            <td>{{ $partnership->organization_type }}</td>
                                            <td>{{ $partnership->contact_person }}</td>
                                            <td>{{ $partnership->phone_number }}</td>
                                            <td>{{ $partnership->email }}</td>
                                            <td>{{ $partnership->request_details }}</td>
                                            <td>{{ $partnership->created_at->format('Y-m-d H:i') }}</td>

                                            <td>
                                                @if($partnership->commercial_registry_files)
                                                    @foreach(json_decode($partnership->commercial_registry_files) as $attachment)
                                                        <a href="{{ asset('partnerships/commercial_registries/' . $attachment) }}"
                                                           download
                                                           class="btn btn-sm btn-primary mb-1">
                                                            تحميل الملف
                                                        </a>
                                                    @endforeach
                                                @else
                                                    <p>لا توجد مرفقات</p>
                                                @endif
                                            </td>

                                            <td>
                                                <form action="{{ route('admin.dashboard.partnerships.destroy', $partnership->id) }}" method="post">
                                                    @method('DELETE')
                                                    @csrf
                                                    <button class="dropdown-item" type="submit" title="حذف">
                                                        <i class="bx bx-trash me-1"></i>
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
            </div>

            <div id="floatingAlert" class="floating-alert">
                <span id="floatingAlertMessage"></span>
                <span class="check-icon">&#10003;</span>
            </div>

        </div>
    </div>
@endsection

@section('js')
    <script>
        // ✅ دالة تصدير الجدول إلى ملف Excel
        function exportTableToExcel(tableID, filename = '') {
            const table = document.getElementById(tableID);
            const tableHTML = table.outerHTML.replace(/ /g, '%20');
            filename = filename ? filename + '.xls' : 'data.xls';

            const downloadLink = document.createElement("a");
            document.body.appendChild(downloadLink);

            if (navigator.msSaveOrOpenBlob) {
                const blob = new Blob(['\ufeff', tableHTML], { type: 'application/vnd.ms-excel' });
                navigator.msSaveOrOpenBlob(blob, filename);
            } else {
                downloadLink.href = 'data:application/vnd.ms-excel,' + tableHTML;
                downloadLink.download = filename;
                downloadLink.click();
            }
        }

        // ✅ دالة عرض التنبيه
        function showAlert(message) {
            var alertBox = document.getElementById('floatingAlert');
            var alertMessage = document.getElementById('floatingAlertMessage');
            alertMessage.textContent = message;
            alertBox.style.display = 'flex';
            setTimeout(function() {
                alertBox.style.display = 'none';
            }, 5000);
        }

        function closeAlert() {
            document.getElementById('floatingAlert').style.display = 'none';
        }

        @if (session('success'))
        showAlert("{{ session('success') }}");
        @endif
    </script>
@endsection
