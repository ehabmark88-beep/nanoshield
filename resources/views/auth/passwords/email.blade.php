@extends('layouts.master2')

@section('css')
    <!-- Sidemenu-responsive-tabs css -->
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
            <!-- The content half -->
            <div class="col-md-6 col-lg-6 col-xl-5 bg-white">
                <div class="login d-flex align-items-center py-2">
                    <div class="container p-0">
                        <div class="row">
                            <div class="col-md-10 col-lg-10 col-xl-9 mx-auto">
                                <div class="card-sigin">
                                    <div class="mb-5 d-flex"><a href="https://nanoshield.sa/"> <img src="{{URL::asset('assets/img/media/Logo.png')}}" class="sign-favicon ht-40" alt="logo"></a></div>

                                    <div class="card-sigin">
                                        <div class="main-signup-header">
                                            <h2 style="direction: {{ $direction }} !important; text-align: {{ $textAlign }}!important;">{{ __('messages.reset_password') }}</h2>
                                            <h5 class="font-weight-semibold mb-4" style="direction: {{ $direction }} !important; text-align: {{ $textAlign }}!important;">{{ __('messages.enter_email_for_reset') }}</h5>

                                            <form method="POST" action="{{ route('password.email') }}">
                                                @csrf

                                                <div class="form-group">
                                                    @if(session('status'))
                                                        <div class="alert alert-success" style="direction: {{ $direction }} !important; text-align: {{ $textAlign }}!important;">
                                                            <strong>{{ session('status') }}</strong>
                                                        </div>
                                                    @endif

                                                    <label style="direction: {{ $direction }} !important; text-align: {{ $textAlign }}!important;">{{ __('messages.email_address') }}</label>
                                                    <input style="direction: {{ $direction }} !important; text-align: {{ $textAlign }}!important;" placeholder="{{ __('messages.email_placeholder') }}" id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                                                    @error('email')
                                                    <span class="invalid-feedback" role="alert" style="direction: {{ $direction }} !important; text-align: {{ $textAlign }}!important;">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                    @enderror
                                                </div>

                                                <button type="submit" class="btn btn-main-primary btn-block" >{{ __('messages.send_reset_link') }}</button>

                                                <div class="del-acc">
                                                    <p><a class="btn btn-link" style="color: black;" href="{{ route('login') }}">{{ __('messages.back_to_login') }}</a></p>
                                                </div>
                                                            <div class="del-acc text-center mt-3">
                                                                    <p>
                                                                        <a class="btn btn-link" style="color: black; text-decoration: none;" href="{{ route('welcome') }}">
                                                                            {{ __('messages.back_to_home') }}
                                                                        </a>
                                                                    </p>
                                                                </div>

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
