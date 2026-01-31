@extends('admin.layouts.master2')
@section('css')
    <!-- Sidemenu-respoansive-tabs css -->
    <link href="{{URL::asset('assets/plugins/sidemenu-responsive-tabs/css/sidemenu-responsive-tabs.css')}}" rel="stylesheet">
@endsection
@section('content')
    <div class="container-fluid">
        <div class="row no-gutter">
            <!-- The image half -->
            <div class="col-md-6 col-lg-6 col-xl-7 d-none d-md-flex bg-primary-transparent">
                <div class="row wd-100p mx-auto text-center">
                    <div class="col-md-12 col-lg-12 col-xl-12 my-auto mx-auto wd-100p">
                        <img src="{{URL::asset('assets/img/media/Logo.png')}}" class="my-auto ht-xl-80p wd-md-100p wd-xl-80p mx-auto animate-logo" alt="logo">
                    </div>
                </div>
            </div>
            <!-- The content half -->
            <div class="col-md-6 col-lg-6 col-xl-5 bg-white">
                <div class="login d-flex align-items-center py-2">
                    <!-- Demo content-->
                    <div class="container p-0">
                        <div class="row">
                            <div class="col-md-10 col-lg-10 col-xl-9 mx-auto">
                                <div class="card-sigin">
                                    <div class="mb-5 d-flex"><img src="{{URL::asset('assets/img/media/Logo.png')}}" class="sign-favicon ht-40" alt="logo"></div>
                                    <div class="card-sigin">
                                        <div class="main-signup-header">
                                            <h2>مرحبا..</h2>
                                            <h5 class="font-weight-semibold mb-4">لوحة تحكم Nano </h5>

                                            <form method="POST" action="{{ route('admin.dashboard.check') }}">
                                                @csrf
                                                <div class="form-group">
                                                    @if(session('errorResponse'))
                                                        <div class="alert alert-danger">
                                                            <strong>{{session('errorResponse')}}</strong>
                                                        </div>
                                                    @endif
                                                    <label>البريد الالكتروني</label>
                                                    <input placeholder="البريد الالكتروني لحسابك" id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                                                    @error('email')
                                                    <span class="invalid-feedback"  role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                    @enderror
                                                </div>

                                                <div class="form-group">
                                                    <label>كلمة المرور</label>
                                                    <input placeholder="كلمة مرور حسابك" id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
                                                    @error('password')
                                                    <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                    @enderror
                                                </div>

                                                <div class="row mb-3">
                                                    <div class="col-md-6 offset-md-4">
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                                            <label class="form-check-label" for="remember">
                                                                <span>تذكرني</span>
                                                            </label>
                                                        </div>
                                                    </div>
                                                </div>

                                                <button type="submit" class="btn btn-main-primary btn-block">تجيل الدخول</button>
{{--                                                <div class="del-acc">--}}
{{--                                                    @if (Route::has('password.request'))--}}
{{--                                                        <a class="btn btn-link" href="{{ route('password.request') }}">--}}
{{--                                                            نسيت كلمة المرور--}}
{{--                                                        </a>--}}
{{--                                                    @endif--}}
{{--                                                    <p><a class="btn btn-link" style="color: black;" href="{{ route('admin.dashboard.register') }}">حساب جديد</a></p>--}}
{{--                                                </div>--}}
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div><!-- End -->
                </div>
            </div><!-- End -->
        </div>
    </div>
@endsection
@section('js')
@endsection
