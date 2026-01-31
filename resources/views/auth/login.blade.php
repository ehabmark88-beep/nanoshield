@extends('layouts.master2')
@section('css')
    <!-- Sidemenu-respoansive-tabs css -->
    <link href="{{URL::asset('assets/plugins/sidemenu-responsive-tabs/css/sidemenu-responsive-tabs.css')}}" rel="stylesheet">
<style>
    .row {
        display: flex !important;
        flex-wrap: wrap;
        margin-right: -0.75rem;
        margin-left: -0.75rem;
        justify-content: center !important;
    }
    .ht-40 {
        height: 120px !important;
    }
</style>
@endsection
@section('content')
    @php
        $direction = (App::getLocale() == 'en') ? 'ltr' : 'rtl';
        $textAlign = (App::getLocale() == 'en') ? 'left' : 'right';
    @endphp
    <div class="container-fluid">
        <div class="row no-gutter">
            <div class="col-md-6 col-lg-6 col-xl-5 bg-white">
                <div class="login d-flex align-items-center py-2">
                    <!-- Demo content-->
                    <div class="container p-0">
                        <div class="row">
                            <div class="col-md-10 col-lg-10 col-xl-9 mx-auto">
                                <div class="card-sigin">
                                    <div class="mb-5 d-flex"><a href="https://nanoshield.sa/"> <img src="{{URL::asset('assets/img/media/Logo.png')}}" class="sign-favicon ht-40" alt="logo"></a></div>
                                    <div class="card-sigin">
                                        <div class="main-signup-header">
                                            <h2  style="direction: {{ $direction }} !important; text-align: {{ $textAlign }}!important;">{{ __('messages.welcome') }}</h2>
                                            <h5 class="font-weight-semibold mb-4"  style="direction: {{ $direction }} !important; text-align: {{ $textAlign }}!important;">{{ __('messages.complete_your_data') }}</h5>

                                            <form method="POST" action="{{ route('login') }}">
                                                @csrf
                                                <div class="form-group">
                                                    @if(session('errorResponse'))
                                                        <div class="alert alert-danger">
                                                            <strong>{{session('errorResponse')}}</strong>
                                                        </div>
                                                    @endif
                                                    <label  style="direction: {{ $direction }} !important; text-align: {{ $textAlign }}!important;">{{ __('messages.email') }}</label>
                                                    <input  style="direction: {{ $direction }} !important; text-align: {{ $textAlign }}!important;" placeholder="{{ __('messages.email_placeholder') }}" id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                                                    @error('email')
                                                    <span class="invalid-feedback"  role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                    @enderror
                                                </div>

                                                <div class="form-group">
                                                    <label  style="direction: {{ $direction }} !important; text-align: {{ $textAlign }}!important;">{{ __('messages.password') }}</label>
                                                    <input  style="direction: {{ $direction }} !important; text-align: {{ $textAlign }}!important;" placeholder="{{ __('messages.password_placeholder') }}" id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
                                                    @error('password')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                    @enderror
                                                </div>

                                                <div class="row mb-3">
                                                    <div class="col-md-6 offset-md-4">
                                                        <div class="form-check">
                                                            <input  style="direction: {{ $direction }} !important; text-align: {{ $textAlign }}!important;" class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                                            <label class="form-check-label" for="remember">
                                                                <span  style="direction: {{ $direction }} !important; text-align: {{ $textAlign }}!important;">{{ __('messages.remember_me') }}</span>
                                                            </label>
                                                        </div>
                                                    </div>
                                                </div>

                                                <button type="submit" class="btn btn-main-primary btn-block">{{ __('messages.login') }}</button>
                                                <div class="del-acc">
                                                    @if (Route::has('password.request'))
                                                        <a class="btn btn-link" href="{{ route('password.request') }}">
                                                            {{ __('messages.forgot_password') }}
                                                        </a>
                                                    @endif
                                                    <p><a class="btn btn-link" style="color: black;" href="{{ route('register') }}">{{ __('messages.new_account') }}</a></p>
                                                </div>
                                            </form>
                                                                                                         <p>
                                                                        <a class="btn btn-link" style="color: black; text-decoration: none;" href="{{ route('welcome') }}">
                                                                            {{ __('messages.back_to_home') }}
                                                                        </a>
                                                                    </p>
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
