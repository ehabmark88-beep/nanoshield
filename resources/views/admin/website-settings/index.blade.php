@extends('admin.layouts.master')

@section('css')
@endsection

@section('page-header')
    <!-- breadcrumb -->
    <div class="breadcrumb-header justify-content-between">
        <h4 class="card-title mg-b-0">إعدادات الموقع</h4>
        <a href="{{ route('admin.dashboard.website-settings.edit', 1) }}" class="btn btn-primary">
            تعديل الإعدادات
        </a>
    </div>
    <!-- breadcrumb -->
@endsection

@section('content')
    <div class="col-xl-12">
        <div class="card">
            <div class="card-header pb-0">
                <div class="d-flex justify-content-between">
                    <h4 class="card-title mg-b-0">عرض إعدادات الموقع</h4>
                    <i class="mdi mdi-dots-horizontal text-gray"></i>
                </div>
            </div>

            <div class="card-body">
                <div class="table-responsive">
                    <table class="table text-md-nowrap">
                        <tbody>

                        {{-- الألوان --}}
                        <tr>
                            <th>اللون الأساسي</th>
                            <td>
                                <span style="background: {{ $setting->primary_color }};
                                             padding: 5px 15px;
                                             color: #fff;
                                             border-radius: 5px;">
                                    {{ $setting->primary_color }}
                                </span>
                            </td>
                        </tr>

                        <tr>
                            <th>اللون الثانوي</th>
                            <td>
                                <span style="background: {{ $setting->secondary_color }};
                                             padding: 5px 15px;
                                             color: #fff;
                                             border-radius: 5px;">
                                    {{ $setting->secondary_color }}
                                </span>
                            </td>
                        </tr>

                        <tr>
                            <th>اللون الثالث</th>
                            <td>
                                <span style="background: {{ $setting->third_color }};
                                             padding: 5px 15px;
                                             color: #fff;
                                             border-radius: 5px;">
                                    {{ $setting->third_color }}
                                </span>
                            </td>
                        </tr>

                        {{-- السوشيال --}}
                        <tr>
                            <th>فيسبوك</th>
                            <td><a href="{{ $setting->facebook_url }}" target="_blank">{{ $setting->facebook_url }}</a></td>
                        </tr>

                        <tr>
                            <th>إنستجرام</th>
                            <td><a href="{{ $setting->instagram_url }}" target="_blank">{{ $setting->instagram_url }}</a></td>
                        </tr>

                        <tr>
                            <th>سناب شات</th>
                            <td><a href="{{ $setting->snapchat_url }}" target="_blank">{{ $setting->snapchat_url }}</a></td>
                        </tr>

                        <tr>
                            <th>تيك توك</th>
                            <td><a href="{{ $setting->tiktok_url }}" target="_blank">{{ $setting->tiktok_url }}</a></td>
                        </tr>

                        <tr>
                            <th>يوتيوب</th>
                            <td><a href="{{ $setting->youtube_url }}" target="_blank">{{ $setting->youtube_url }}</a></td>
                        </tr>

                        <tr>
                            <th>منصة X</th>
                            <td><a href="{{ $setting->x_platform_url }}" target="_blank">{{ $setting->x_platform_url }}</a></td>
                        </tr>

{{-- الولاء --}}
<tr>
    <th>عدد أيام صلاحية نقاط الولاء</th>
    <td>{{ $setting->loyalty_points_days }} يوم</td>
</tr>

<tr>
    <th>قيمة نقاط الولاء</th>
    <td>
        مقابل كل
        <strong>1000 ريال</strong>
        يحصل العميل على
        <span class="badge badge-info">
            {{ $setting->loyalty_points_conversion }}
        </span>
        نقطة
    </td>
</tr>




                        {{-- 🔥 الحقول الجديدة --}}
                        <tr>
                            <th>عنوان العرض (عربي)</th>
                            <td>
                                {{ $setting->offer_title ?? '-' }}
                            </td>
                        </tr>

                        <tr>
                            <th>اسم العرض (إنجليزي)</th>
                            <td>
                                {{ $setting->offer_title_en ?? '-' }}
                            </td>
                        </tr>

                        <tr>
                            <th>كود العرض</th>
                            <td>
                                <span class="badge badge-success">
                                    {{ $setting->offer_code ?? '-' }}
                                </span>
                            </td>
                        </tr>

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('js')
@endsection
