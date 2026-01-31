@extends('admin.layouts.master')

@section('css')
<style>
    .review-img {
        width: 60px;
        height: 60px;
        object-fit: cover;
        border-radius: 6px;
        border: 1px solid #ddd;
    }
    .table td {
        vertical-align: middle;
    }
</style>
@endsection

@section('page-header')
<div class="breadcrumb-header justify-content-between"></div>
@endsection

@section('content')
<div class="col-xl-12">
    <div class="card">
        <div class="card-header pb-0">
            <div class="d-flex justify-content-between align-items-center">
                <h4 class="card-title mg-b-0">آراء العملاء</h4>
                <a href="{{ route('admin.dashboard.reviews.create') }}" class="btn btn-sm btn-primary">
                    <i class="typcn typcn-document-add"></i> إضافة
                </a>
            </div>
        </div>

        <div class="card-body">
            <div class="table-responsive">
                <table class="table text-md-nowrap dataTable">
                    <thead class="thead-light">
                        <tr>
                            <th>ID</th>
                            <th>الاسم</th>
                            <th>الرأي</th>
                            <th>صورة عربي</th>
                            <th>صورة إنجليزي</th>
                            <th>الحالة</th>
                            <th class="text-center">الإجراءات</th>
                        </tr>
                    </thead>

                    <tbody>
                    @foreach($reviews as $review)
                        <tr>
                            <td>{{ $review->id }}</td>

                            <td>
                                <strong>{{ $review->name_ar }}</strong>
                            </td>

                            <td style="max-width: 250px;">
                                {{ Str::limit($review->review, 60) }}
                            </td>

                            {{-- صورة الريفيو العربي --}}
                            <td>
                                @if($review->arabic_review_images)
                                    <img
                                        src="{{ asset('uploads/reviews/'.$review->arabic_review_images) }}"
                                        class="review-img"
                                        alt="Arabic Review Image">
                                @else
                                    <span class="badge badge-secondary">لا يوجد</span>
                                @endif
                            </td>

                            {{-- صورة الريفيو الإنجليزي --}}
                            <td>
                                @if($review->english_review_images)
                                    <img
                                        src="{{ asset('uploads/reviews/'.$review->english_review_images) }}"
                                        class="review-img"
                                        alt="English Review Image">
                                @else
                                    <span class="badge badge-secondary">لا يوجد</span>
                                @endif
                            </td>

                            {{-- الحالة --}}
                            <td>
                                @if($review->active)
                                    <span class="badge badge-success">ظاهر</span>
                                @else
                                    <span class="badge badge-danger">مخفي</span>
                                @endif
                            </td>

                            {{-- الأكشن --}}
                            <td class="text-center">
                                <a href="{{ route('admin.dashboard.reviews.edit', $review->id) }}"
                                   class="btn btn-sm btn-info">
                                    <i class="bx bx-edit-alt"></i>
                                </a>

                                <form action="{{ route('admin.dashboard.reviews.destroy', $review->id) }}"
                                      method="POST"
                                      style="display:inline-block"
                                      onsubmit="return confirm('هل أنت متأكد من الحذف؟')">
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
@endsection

@section('js')
@endsection
