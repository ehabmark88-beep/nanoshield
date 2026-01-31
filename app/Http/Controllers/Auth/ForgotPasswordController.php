<?php

namespace App\Http\Controllers\Auth;
use Illuminate\Http\Request;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\SendsPasswordResetEmails;
use Illuminate\Support\Facades\Password; // استيراد

class ForgotPasswordController extends Controller
{
    // إظهار نموذج "نسيت كلمة المرور"
    public function showLinkRequestForm()
    {
        return view('auth.passwords.email');
    }

    // إرسال رابط إعادة تعيين كلمة المرور
    public function sendResetLinkEmail(Request $request)
    {
        $request->validate(['email' => 'required|email']);

        $response = Password::sendResetLink(
            $request->only('email')
        );

        return $response == Password::RESET_LINK_SENT
            ? back()->with('status', __($response))
            : back()->withErrors(['email' => __($response)]);
    }

    use SendsPasswordResetEmails;
}
