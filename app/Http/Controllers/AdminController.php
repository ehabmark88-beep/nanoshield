<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use App\Models\Branch;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    public function index()
    {
        // Retrieve all admin users
        $admins = Admin::all();
        return view('admin.admins.index', compact('admins'));
    }

    /**
     * Show the form for creating a new admin user.
     */
    public function create()
    {
        $branches = Branch::all();
        return view('admin.admins.create',compact('branches'));
    }

    /**
     * Store a newly created admin user in the database.
     */
    public function store(Request $request)
    {

        // Create the new admin user
        Admin::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => $request->role,
            'branch_id' => $request->branch_id,
        ]);

        return redirect()->route('admin.dashboard.admins.index')->with('success', 'تم إضافة المسؤول بنجاح!');
    }

    /**
     * Show the form for editing the specified admin user.
     */
    public function edit($id)
    {
        $branches = Branch::all();
        $admin = Admin::findOrFail($id);
        return view('admin.admins.edit', compact('admin','branches'));
    }

    /**
     * Update the specified admin user in the database.
     */
    public function update(Request $request, $id)
    {
        $admin = Admin::findOrFail($id);

        // Update the admin user details
        $admin->name = $request->name;
        $admin->email = $request->email;
        if ($request->filled('password')) {
            $admin->password = Hash::make($request->password); // Hash the new password if provided
        }
        $admin->role = $request->role;
        $admin->branch_id = $request->branch_id;

        $admin->save(); // Save changes to the database

        return redirect()->route('admin.dashboard.admins.index')->with('success', 'تم تعديل المسؤول بنجاح!');
    }

    /**
     * Remove the specified admin user from the database.
     */
    public function destroy($id)
    {
        $admin = Admin::findOrFail($id);
        $admin->delete();

        return back()->with('success', 'تم حذف المسؤول بنجاح!');
    }
}
