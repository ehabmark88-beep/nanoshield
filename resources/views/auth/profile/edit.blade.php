{{-- resources/views/profile/edit.blade.php --}}
@extends('layouts.pages.master')

@section('css')
    <style>

        .container {
            max-width: 600px;
            background-color: #ffffff;
            padding: 30px;
            border-radius: 15px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
            margin: auto;
        }

        h1 {
            color: #e27723;
            font-size: 2rem;
            margin-bottom: 20px;
            text-align: center;
        }

        .form-group {
            margin-bottom: 20px;
        }

        label {
            display: block;
            font-weight: bold;
            margin-bottom: 5px;
            color: #333;
        }

        input[type="text"],
        input[type="email"],
        input[type="password"] {
            width: 100%;
            padding: 10px;
            font-size: 1rem;
            color: #555;
            border: 1px solid #ddd;
            border-radius: 8px;
            transition: border-color 0.3s;
        }

        input:focus {
            border-color: #e27723;
            outline: none;
            box-shadow: 0 0 5px rgba(226, 119, 35, 0.2);
        }

        .btn-primary {
            background-color: #e27723;
            border: none;
            padding: 10px 20px;
            font-size: 1.2rem;
            color: #fff;
            border-radius: 8px;
            cursor: pointer;
            transition: background-color 0.3s;
            display: block;
            width: 100%;
            text-align: center;
        }

        .btn-primary:hover {
            background-color: #d5661f;
        }

        .alert {
            margin-top: 20px;
            padding: 10px;
            color: #155724;
            background-color: #d4edda;
            border-color: #c3e6cb;
            border-radius: 8px;
            text-align: center;
            font-size: 1rem;
        }
    </style>
    <style>
        .btn-save {
            display: inline-block;
            width: 100%; /* جعل الزر عريضاً */
            padding: 15px;
            font-size: 1.2rem;
            font-weight: bold;
            text-align: center;
            color: #fff;
            background: linear-gradient(to right, #f7971e, #ffd200); /* تأثير تدرج الألوان */
            border: none;
            border-radius: 50px; /* حدود مستديرة بالكامل */
            text-decoration: none;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2); /* ظل خفيف */
            cursor: pointer;
            transition: all 0.3s ease-in-out;
        }

        .btn-save:hover {
            background: linear-gradient(to right, #ffd200, #f7971e); /* انعكاس الألوان عند التمرير */
            box-shadow: 0 6px 12px rgba(0, 0, 0, 0.3); /* تكبير الظل */
            transform: translateY(-3px); /* تحريك الزر للأعلى */
        }

        .btn-save:active {
            transform: translateY(1px); /* تحريك الزر للأسفل عند الضغط */
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.2); /* تقليل الظل */
        }
    </style>

@endsection

@section('content')
    <br><br><br><br><br><br><br>
    <div class="container">
        <h1>{{ __('messages.edit_account') }}</h1>

        @if ($errors->any())
            <div class="alert alert-danger" style="background-color: red">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li style="color: white">{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <form action="{{ route('profile.update') }}" method="POST">
            @csrf
            @method('PUT')

            <!-- اسم المستخدم -->
            <div class="form-group">
                <label for="name">{{ __('messages.name') }}</label>
                <input type="text" name="name" id="name" class="form-control" value="{{ old('name', $user->name) }}" required>
            </div>

            <!-- البريد الإلكتروني -->
            <div class="form-group">
                <label for="email">{{ __('messages.email') }}</label>
                <input type="email" name="email" id="email" class="form-control" value="{{ old('email', $user->email) }}" required>
            </div>

            <!-- كلمة المرور القديمة -->
            <div class="form-group">
                <label for="current_password">{{ __('messages.current_password') }}</label>
                <input type="password" name="current_password" id="current_password" class="form-control">
            </div>

            <!-- كلمة المرور الجديدة -->
            <div class="form-group">
                <label for="password">{{ __('messages.new_password') }}</label>
                <input type="password" name="password" id="password" class="form-control">
            </div>

            <!-- تأكيد كلمة المرور الجديدة -->
            <div class="form-group">
                <label for="password_confirmation">{{ __('messages.confirm_new_password') }}</label>
                <input type="password" name="password_confirmation" id="password_confirmation" class="form-control">
            </div>

            <button type="submit" class="btn-save">{{ __('messages.save_changes') }}</button>
        </form>
    </div>
@endsection
