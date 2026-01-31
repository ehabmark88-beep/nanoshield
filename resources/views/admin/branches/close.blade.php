@extends('admin.layouts.master3')

@section('css')
<style>
    .card {
        border-radius: 14px;
        border: 0;
        box-shadow: 0 6px 20px rgba(0,0,0,.08);
    }

    .card-header {
        background: #f8f9fa;
        font-weight: 600;
        border-bottom: 1px solid #eee;
    }

    .form-control {
        height: 46px;
        border-radius: 10px;
    }

    .btn {
        border-radius: 10px;
    }

    .badge-close {
        background: #dc3545;
        padding: 6px 12px;
        border-radius: 8px;
        font-size: 13px;
    }

    .badge-open {
        background: #28a745;
        padding: 6px 12px;
        border-radius: 8px;
        font-size: 13px;
    }

    table th {
        background: #f1f1f1;
        font-weight: 600;
    }
</style>
@endsection

@section('page-header')
<div class="breadcrumb-header justify-content-between align-items-center">
    <div>
        <h4 class="card-title mg-b-3">🚫 إدارة مواعيد الفرع</h4>
        <small class="text-muted">غلق وفتح المواعيد غير المتاحة للحجز</small>
    </div>
</div>
@endsection

@section('content')
<div class="row">

    <!-- غلق موعد -->
    <div class="col-lg-4 col-md-5">
        <div class="card">
            <div class="card-header">
                ⛔ غلق موعد جديد
            </div>

            <form action="{{ route('admin.dashboard.close_time') }}"
                  method="POST"
                  id="closeForm">
                @csrf

                <div class="card-body">

                    <div class="form-group">
                        <label>التاريخ</label>
                        <input type="date" class="form-control" name="date" required>
                    </div>

                    <input type="hidden" name="branch_id" value="{{ $branch_id }}">

                    <div class="form-group">
                        <label>الموعد</label>
                        <select class="form-control" name="time" required>
                            <option value="">اختر الموعد</option>
                            @foreach([
                                'PM 12:00','PM 1:00','PM 2:00','PM 3:00','PM 4:00',
                                'PM 5:00','PM 6:00','PM 7:00','PM 8:00','PM 9:00','PM 10:00'
                            ] as $time)
                                <option value="{{ $time }}">{{ $time }}</option>
                            @endforeach
                        </select>
                    </div>

                </div>

                <div class="card-footer text-right">
                    <button class="btn btn-danger">
                        <i class="mdi mdi-lock"></i> غلق الموعد
                    </button>
                </div>
            </form>
        </div>
    </div>

    <!-- المواعيد المغلقة -->
    <div class="col-lg-8 col-md-7">
        <div class="card">
            <div class="card-header">
                📋 المواعيد المغلقة
            </div>

            <div class="card-body p-0">
                @if($closedTimes->count())
                    <table class="table table-bordered text-center mb-0">
                        <thead>
                            <tr>
                                <th>التاريخ</th>
                                <th>الموعد</th>
                                <th>الحالة</th>
                                <th>الإجراء</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($closedTimes as $item)
                                <tr>
                                    <td>{{ $item->date }}</td>
                                    <td>{{ $item->time }}</td>
                                    <td>
                                        <span class="badge-close">مغلق</span>
                                    </td>
                                    <td>
                                        <form action="{{ route('admin.dashboard.open_time', $item->id) }}"
                                              method="POST"
                                              onsubmit="return confirm('هل تريد إلغاء غلق هذا الموعد؟');">
                                            @csrf
                                            @method('DELETE')

                                            <button class="btn btn-success btn-sm">
                                                🔓 فتح الموعد
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                @else
                    <div class="alert alert-info m-3 text-center">
                        لا توجد مواعيد مغلقة حالياً
                    </div>
                @endif
            </div>
        </div>
    </div>

</div>
@endsection

@section('js')
<script>
document.getElementById('closeForm').addEventListener('submit', function (e) {
    const ok = confirm(
        'هل أنت متأكد من غلق هذا الموعد؟\n\nلن يتمكن العملاء من الحجز في هذا الوقت.'
    );

    if (!ok) {
        e.preventDefault();
    }
});
</script>
@endsection
