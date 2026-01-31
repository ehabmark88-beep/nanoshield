@extends('admin.layouts.master')

@section('css')
<style>
    /* ===== تحسين شكل الجدول ===== */
    .orders-table {
        font-size: 12px;
    }

    .orders-table th,
    .orders-table td {
        padding: 6px 8px;
        vertical-align: middle;
        white-space: normal;
    }

    .status-badge {
        padding: 2px 6px;
        font-size: 10px;
        border-radius: 6px;
        font-weight: bold;
    }

    .product-item {
        font-size: 11px;
        line-height: 1.4;
    }

    /* ===== موبايل ===== */
    @media (max-width: 768px) {
        .orders-table {
            font-size: 11px;
        }

        .orders-table th {
            font-size: 11px;
        }

        .btn {
            font-size: 11px;
            padding: 3px 6px;
        }
    }
</style>
@endsection

@section('page-header')
<div class="breadcrumb-header justify-content-between">
    <h4 class="card-title mg-b-0">قائمة الطلبات</h4>
</div>
@endsection

@section('content')
<div class="col-xl-12">
    <div class="card">
        <div class="card-header pb-0">
            <div class="d-flex justify-content-between align-items-center">
                <h4 class="card-title mg-b-0">جميع الطلبات</h4>
                <i class="mdi mdi-dots-horizontal text-gray"></i>
            </div>
        </div>

        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered table-hover text-md-nowrap orders-table" id="example1">
                    <thead class="bg-light">
                        <tr>
                            <th>#</th>
                            <th>العميل</th>
                            <th>الإيميل</th>
                            <th>الهاتف</th>
                            <th>العنوان</th>
                            <th>التاريخ</th>
                            <th>المنتجات</th>
                            <th>الإجمالي</th>
                            <th>الدفع</th>
                            <th>الحالة</th>
                            <th>إجراء</th>
                        </tr>
                    </thead>

                    <tbody>
                    @foreach($orders as $order)
                        <tr>
                            <td>#{{ $order->id }}</td>
                            <td>{{ $order->name }}</td>
                            <td>{{ $order->email }}</td>
                            <td>{{ $order->phone_number }}</td>

                            {{-- العنوان --}}
                            <td>
                                <small class="text-muted">
                                    {{ $order->address ?? '—' }}
                                </small>
                            </td>

                            <td>{{ $order->created_at->format('Y-m-d') }}</td>

                            {{-- المنتجات --}}
                            <td>
                                @foreach($order->product_names as $product)
                                    <div class="product-item">
                                        • {{ $product['name'] }}
                                        <small class="text-muted">(× {{ $product['quantity'] }})</small>
                                    </div>
                                @endforeach
                            </td>

                            {{-- السعر --}}
                            <td>
                                <strong>{{ number_format($order->final_price, 2) }}</strong>
                                {{ __('messages.currency') }}
                            </td>

                            {{-- الدفع --}}
                            <td>
                                @if($order->payment_method === 'payBranch')
                                    <span class="badge badge-danger">بالفرع</span>
                                @else
                                    <span class="badge badge-success">أونلاين</span>
                                @endif
                            </td>

                            {{-- الحالة --}}
                            <td>
                                @if($order->status === 'pending')
                                    <span class="badge badge-warning status-badge">في الانتظار</span>
                                @elseif($order->status === 'in_progress')
                                    <span class="badge badge-info status-badge">قيد التنفيذ</span>
                                @elseif($order->status === 'completed')
                                    <span class="badge badge-success status-badge">مكتمل</span>
                                @elseif($order->status === 'cancelled')
                                    <span class="badge badge-danger status-badge">ملغي</span>
                                @else
                                    <span class="badge badge-secondary status-badge">—</span>
                                @endif
                            </td>

                            {{-- الإجراءات --}}
                            <td>
                                <a href="{{ route('admin.dashboard.orders.edit', $order->id) }}"
                                   class="btn btn-sm btn-warning">
                                    تعديل
                                </a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>

                </table>
            </div>
        </div>
    </div>
</div>

{{-- تحديث تلقائي --}}
<script>
    setInterval(() => {
        location.reload();
    }, 60000);
</script>
@endsection

@section('js')
@endsection
