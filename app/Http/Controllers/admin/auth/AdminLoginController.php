<?php

namespace App\Http\Controllers\admin\auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Providers\RouteServiceProvider;

class AdminLoginController extends Controller
{

    protected $redirectTo = RouteServiceProvider::ِAdminHome;

    public function __construct()
    {
        $this->middleware('guest:admin')->except('logout');
    }

    public function login ()
    {
        return view('admin.auth.login');
    }

     public function checkLogin(Request $request)
    {
        // التحقق من صحة البيانات المدخلة
        $request->validate([
            'email' => ['required', 'string', 'email'], // إضافة التحقق من صحة البريد الإلكتروني
            'password' => ['required', 'string'],
        ]);

        // محاولة تسجيل الدخول باستخدام بيانات البريد الإلكتروني وكلمة المرور
        if (Auth::guard('admin')->attempt($request->only('email', 'password'), $request->filled('remember'))) {
            $admin = Auth::guard('admin')->user(); // الحصول على بيانات المستخدم

            // التحقق من الدور وتوجيهه إلى الصفحة المناسبة
            if ($admin->role === 'super_admin') {
 return view('admin.home');
 } elseif ($admin->role === 'branch_admin') {
                // توجيه إلى صفحة المشرف الفرعي الخاصة به
                // تأكد من وجود الفرع باستخدام branch_id
                if ($admin->branch_id) {
                    return redirect()->route('admin.dashboard.branch', ['branch_id' => $admin->branch_id]);
                } else {
                    return redirect()->route('admin.dashboard')->withErrors(['errorResponse' => 'لا يوجد فرع مرتبط بهذا المستخدم']);
                }
            }
        }

        // في حال فشل التحقق من البيانات، يتم إرجاع المستخدم مع رسالة الخطأ
        return redirect()->back()->withInput(['email' => $request->email])
            ->withErrors(['errorResponse' => 'بيانات الدخول غير صحيحة']);
    }


    public function logout ()
    {
        Auth::guard('admin')->logout();
        return redirect()->route('admin.dashboard.login');
    }
}
