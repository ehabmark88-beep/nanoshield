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

                                    <div class="main-signup-header">
                                        <h2 class="text-primary"  style="direction: {{ $direction }} !important; text-align: {{ $textAlign }}!important;">{{ __('messages.create_new_account') }}</h2>
                                        <form method="POST" action="{{ route('register') }}">
                                            @csrf

                                            <!-- الاسم -->
                                            <div class="form-group">
                                                <label  style="direction: {{ $direction }} !important; text-align: {{ $textAlign }}!important;">{{ __('messages.full_name') }}</label>
                                                <input  style="direction: {{ $direction }} !important; text-align: {{ $textAlign }}!important;" placeholder="{{ __('messages.name_placeholder') }}" id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
                                                @error('name')
                                                <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
                                                @enderror
                                            </div>

                                            <!-- الايميل -->
                                            <div class="form-group">
                                                <label  style="direction: {{ $direction }} !important; text-align: {{ $textAlign }}!important;">{{ __('messages.email') }}</label>
                                                <input  style="direction: {{ $direction }} !important; text-align: {{ $textAlign }}!important;" placeholder="{{ __('messages.email_placeholder') }}" id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">
                                                @error('email')
                                                <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
                                                @enderror
                                            </div>

                                            <!-- رقم الجوال -->
                                            <div class="form-group">
                                                <label  style="direction: {{ $direction }} !important; text-align: {{ $textAlign }}!important;">{{ __('messages.phone_number') }}</label>
                                                <input  style="direction: {{ $direction }} !important; text-align: {{ $textAlign }}!important;" placeholder="{{ __('messages.phone_placeholder') }}" id="phone_number" type="tel" class="form-control @error('phone_number') is-invalid @enderror" name="phone_number" value="{{ old('phone_number') }}" required>
                                                @error('phone_number')
                                                <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
                                                @enderror
                                            </div>

                                            <!-- كلمة السر -->
                                            <div class="form-group">
                                                <label  style="direction: {{ $direction }} !important; text-align: {{ $textAlign }}!important;">{{ __('messages.password') }}</label>
                                                <input  style="direction: {{ $direction }} !important; text-align: {{ $textAlign }}!important;" id="password" placeholder="{{ __('messages.password_placeholder') }}" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">
                                                @error('password')
                                                <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
                                                @enderror
                                            </div>

                                            <!-- تأكيد كلمة السر -->
                                            <div class="form-group">
                                                <label  style="direction: {{ $direction }} !important; text-align: {{ $textAlign }}!important;">{{ __('messages.password_confirmation') }}</label>
                                                <input  style="direction: {{ $direction }} !important; text-align: {{ $textAlign }}!important;" placeholder="{{ __('messages.password_confirmation_placeholder') }}" id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                                                @error('password')
                                                <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
                                                @enderror
                                            </div>

                                            <button type="submit" class="btn btn-main-primary btn-block">
                                                {{ __('messages.create_account') }}
                                            </button>
                                        </form>

                                        <div class="main-signup-footer mt-5"  style="direction: {{ $direction }} !important; text-align: {{ $textAlign }}!important;">
                                            <p>{{ __('messages.already_have_account') }} <a href="{{ route('login') }}">{{ __('messages.login') }}</a></p>
                                        </div>
                                        <div class="del-acc text-center mt-3">
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
