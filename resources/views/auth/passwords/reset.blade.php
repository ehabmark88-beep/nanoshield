@extends('layouts.master2')
@section('css')
    <!-- Sidemenu-respoansive-tabs css -->
    <link href="{{URL::asset('assets/plugins/sidemenu-responsive-tabs/css/sidemenu-responsive-tabs.css')}}" rel="stylesheet">
<style>
input {
    background-color: black !important;
}
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
    .card-body {
    background-color: black;
}
.card-header {
    color: black;
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
 <div class="card-header">{{ __('messages.reset_password_title') }}</div>

        <div class="card-body">
            <form method="POST" action="{{ route('password.update') }}">
                @csrf
                <input type="hidden" name="token" value="{{ $token }}">

                <div class="mb-3">
                    <label for="email" class="form-label">{{ __('messages.email') }}</label>
                    <input id="email" type="email"
                           class="form-control @error('email') is-invalid @enderror"
                           name="email" value="{{ $email ?? old('email') }}"
                           placeholder="{{ __('messages.email_placeholder') }}" required autocomplete="email" autofocus>
                    @error('email')
                        <span class="invalid-feedback d-block"><strong>{{ $message }}</strong></span>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="password" class="form-label">{{ __('messages.password') }}</label>
                    <input id="password" type="password"
                           class="form-control @error('password') is-invalid @enderror"
                           name="password" placeholder="{{ __('messages.password_placeholder') }}" required autocomplete="new-password">
                    @error('password')
                        <span class="invalid-feedback d-block"><strong>{{ $message }}</strong></span>
                    @enderror
                </div>

                <div class="mb-4">
                    <label for="password-confirm" class="form-label">{{ __('messages.confirm_password') }}</label>
                    <input id="password-confirm" type="password" class="form-control"
                           name="password_confirmation" placeholder="{{ __('messages.confirm_password_placeholder') }}" required autocomplete="new-password">
                </div>

                <div class="d-flex justify-content-center">
                    <button type="submit" class="btn btn-primary w-50">
                        {{ __('messages.reset_password_button') }}
                    </button>
                </div>
            </form>

            <div class="del-acc text-center mt-3">
                <p><a href="{{ route('welcome') }}">{{ __('messages.back_to_home') }}</a></p>
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
