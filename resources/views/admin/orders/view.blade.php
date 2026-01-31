<!-- resources/views/admin/branches/index.blade.php -->
@extends('admin.layouts.master3')

@section('css')
@endsection

@section('page-header')
    <!-- breadcrumb -->
    <div class="breadcrumb-header justify-content-between">
        <h4 class="card-title mg-b-0"> فرع {{ $branchName }}  </h4>
        <a href="{{ route('admin.dashboard.close', $branch_id) }}" class="btn btn-primary">اغلاق مواعيد</a>
    </div>
    <!-- breadcrumb -->
@endsection

@section('content')
    <div class="col-xl-12">
        <div class="card">
            <div class="card-header pb-0">
                <div class="d-flex justify-content-between">
                    <h4 class="card-title mg-b-0"> قائمة الحجوزات لفرع {{ $branchName }}</h4>
                    <i class="mdi mdi-dots-horizontal text-gray"></i>
                </div>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table text-md-nowrap dataTable no-footer" id="example1">
                        <thead>
                        <tr>
                            <th>رقم الحجز</th>
                            <th>اسم العميل</th>
                            <th>رقم الهاتف</th>
                            <th>الخدامات</th>
                            <th>الخدمات الإضافية</th>

                            <th>تاريخ الحجز</th>
                            <th>وقت الحجز</th>
                            <th>حالة الدفع</th>
                            <th>حالة العمل</th>
                            <th>الإجراءات</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($bookings as $booking)
                            <tr>
                                <td>{{ $booking->id }}#</td>
                                <td>{{ $booking->name }}</td>
                                <td>{{ $booking->phone_number }}</td>
                                <td>
                                    @foreach($booking->package_names as $package_name)
                                        <span>{{ $package_name }}</span><br>
                                    @endforeach
                                </td>
                                <td>
                                    @foreach($booking->service_names as $service_name)
                                        <span>{{ $service_name }}</span><br> <!-- عرض أسماء الخدمات الإضافية -->
                                    @endforeach
                                </td>
                                <td>{{ $booking->date }}</td>
                                <td>{{ $booking->time }}</td>
                                <td>
                                    @if($booking->payment_method == 'payBranch')
                                        <span class="badge badge-danger">غير مدفوع</span>
                                    @elseif($booking->payment_method == '1')
                                        <span class="badge badge-success">تم الدفع بالفرع</span>
                                    @else
                                        <span class="badge badge-success">تم الدفع اونلاين</span>
                                    @endif
                                </td>
                                <td>
                                    @if($booking->status == 0)
                                        <span class="badge badge-info">لم يتم البدء</span>
                                    @elseif($booking->status == 1)
                                        <span class="badge badge-success">تم الانتهاء</span>
                                    @elseif($booking->status == 'pending')
                                        <span class="badge badge-warning">جاري العمل</span>
                                    @endif
                                </td>
                                <td>
                                    <a href="{{ route('admin.dashboard.edit_booking', ['id' => $booking->id, 'branch_id' => $branch_id]) }}" class="btn btn-warning">تعديل</a>
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
    <script>
        // تحديث الصفحة كل دقيقة (60000 ملي ثانية)
        setInterval(() => {
            location.reload();
        }, 60000); // 60000 = 1 دقيقة
    </script>
@endsection

@section('js')
@endsection
