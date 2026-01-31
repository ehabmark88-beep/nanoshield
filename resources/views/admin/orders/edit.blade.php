@extends('admin.layouts.master')

@section('css')
<style>
    .form-group label {
        font-weight: 600;
    }
</style>
@endsection

@section('page-header')
<div class="breadcrumb-header justify-content-between">
    <h4 class="card-title mg-b-0">
        تعديل الطلب #{{ $order->id }}
    </h4>
</div>
@endsection

@section('content')
<div class="row">
    <div class="col-lg-8 col-md-10">
        <div class="card">
            <form action="{{ route('admin.dashboard.orders.update', $order->id) }}" method="POST">
                @csrf
                @method('PATCH')

                <div class="card-body">

                    {{-- اسم العميل --}}
                    <div class="form-group">
                        <label for="name">اسم العميل</label>
                        <input type="text"
                               class="form-control"
                               id="name"
                               name="name"
                               value="{{ $order->name }}"
                               required>
                    </div>

                    {{-- البريد الإلكتروني --}}
                    <div class="form-group">
                        <label for="email">البريد الإلكتروني</label>
                        <input type="email"
                               class="form-control"
                               id="email"
                               name="email"
                               value="{{ $order->email }}"
                               required>
                    </div>

                    {{-- رقم الهاتف --}}
                    <div class="form-group">
                        <label for="phone_number">رقم الهاتف</label>
                        <input type="text"
                               class="form-control"
                               id="phone_number"
                               name="phone_number"
                               value="{{ $order->phone_number }}"
                               required>
                    </div>

                    {{-- حالة الطلب --}}
                    <div class="form-group">
                        <label for="status">حالة الطلب</label>
                        <select class="form-control" id="status" name="status" required>
                            <option value="pending"
                                {{ $order->status === 'pending' ? 'selected' : '' }}>
                                في الانتظار
                            </option>

                            <option value="in_progress"
                                {{ $order->status === 'in_progress' ? 'selected' : '' }}>
                                قيد التنفيذ
                            </option>

                            <option value="completed"
                                {{ $order->status === 'completed' ? 'selected' : '' }}>
                                مكتمل
                            </option>

                            <option value="cancelled"
                                {{ $order->status === 'cancelled' ? 'selected' : '' }}>
                                ملغي
                            </option>
                        </select>
                    </div>

                    {{-- طريقة الدفع --}}
                    <div class="form-group">
                        <label for="payment_method">طريقة الدفع</label>
                        <select class="form-control" id="payment_method" name="payment_method" required>
                            <option value="payBranch"
                                {{ $order->payment_method === 'payBranch' ? 'selected' : '' }}>
                                تم الدفع في الفرع
                            </option>

                            <option value="online"
                                {{ $order->payment_method === 'online' ? 'selected' : '' }}>
                                تم الدفع أونلاين
                            </option>
                        </select>
                    </div>

                    {{-- زر الحفظ --}}
                    <div class="text-end">
                        <button type="submit" class="btn btn-primary">
                            تحديث الطلب
                        </button>

                        <a href="{{ route('admin.dashboard.orders.index') }}"
                           class="btn btn-light">
                            رجوع
                        </a>
                    </div>

                </div>
            </form>
        </div>
    </div>
</div>
@endsection

@section('js')
@endsection
