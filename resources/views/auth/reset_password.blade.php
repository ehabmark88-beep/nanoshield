@extends('admin.layouts.master2')

@section('css')
    <!-- Sidemenu-responsive-tabs css -->
    <link href="{{URL::asset('assets/plugins/sidemenu-responsive-tabs/css/sidemenu-responsive-tabs.css')}}" rel="stylesheet">
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row no-gutter">
            <!-- The image half -->
            <div class="col-md-6 col-lg-6 col-xl-7 d-none d-md-flex bg-primary-transparent">
                <div class="row wd-100p mx-auto text-center">
                                    <div class="mb-5 d-flex"><a href="https://nanoshield.sa/"> <img src="{{URL::asset('assets/img/media/Logo.png')}}" class="sign-favicon ht-40" alt="logo"></a></div>

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
                                    <div class="mb-5 d-flex">
                                        <img src="{{URL::asset('assets/img/media/Logo.png')}}" class="sign-favicon ht-40" alt="logo">
                                    </div>
                                    <div class="main-signup-header">
                                        <h2 class="text-primary">Forgot Password</h2>
                                        <h5 class="font-weight-normal mb-4">Enter your email address to receive a password reset link.</h5>

                                        <form method="POST" action="{{ route('password.request') }}">
                                            @csrf

                                            <div class="form-group">
                                                <label for="email">Email Address</label>
                                                <input placeholder="Enter your email" id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                                                @error('email')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                                @enderror
                                            </div>

                                            <button type="submit" class="btn btn-main-primary btn-block">
                                                {{ __('Send Password Reset Link') }}
                                            </button>
                                        </form>

                                        <div class="main-signup-footer mt-5">
                                            <p>Remembered your password? <a href="{{ route('login') }}">Sign In</a></p>
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
