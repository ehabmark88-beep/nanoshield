<?php

namespace App\Http\Controllers\admin\auth;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use function Laravel\Prompts\password;

class AdminRegisterController extends Controller
{
    public function register ()
    {
        return view('admin.auth.register');
    }

    public function store (Request $request)
    {
        $adminKey = "adminKey1";

        if($request->admin_key == $adminKey ){

            $request->validate([
                'name' => ["required","string"],
                'email' => ["required","string"],
                'admin_key' => ["required","string"],
                'password' => ["required","string","confirmed"],
                'password_confirmation' => ["required","string"],
            ]);

            $data = $request->except(['password_confirmation','_token', 'admin_key']);

            $data['password'] = Hash::make($request->password);

            Admin::create($data);
            return redirect()->route('admin.dashboard.login');

        }else{
            return redirect()->back()->with('errorResponse', 'something went wrong');
        }
    }
}
