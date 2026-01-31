<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::all();
        return view('admin.users.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dash.users.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
//        $request->validate([
//            'name' => 'required',
//            'email' => 'required|email|unique:users,email',
//            'password' => 'required|min:8',
//            'church_name' => 'required'
//        ]);

        User::create([
            'name' => $request->name,
            'email'  => $request->email,
            'password' => $request->password,
            'church_name' => $request->church_name
        ]);
        return redirect()->route('users.index')->with('success', 'تمت الإضافة بنجاح!');

    }


    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $user = User::findOrFail($id);
        return view('dash.users.edit',compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $users = User::findOrFail($id);
        $users->update([
            'name' => $request->name,
            'email' => $request->email,
            'church_name' => $request->church_name
        ]);
        if (isset($request->password)) {
            $users->update([
                'password' => $request->password
            ]);
        }else{
            return redirect()->route('users.index');
        }
        return redirect()->route('users.index')->with('success', 'تم التعديل بنجاح!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $users = User::findOrFail($id)->delete();
        return redirect()->route('admin.dashboard.users.index')->with('success', 'تم الحذف بنجاح!');
    }

    public function addPoints(Request $request, $id)
    {
        $user = User::findOrFail($id);
        $points = $request->input('points');
        $description = $request->input('description', null);

        $user->addPoints($points, $description);

        return response()->json(['message' => 'Points added successfully!', 'user' => $user]);
    }

    // استرداد نقاط من المستخدم
    public function redeemPoints(Request $request, $id)
    {
        $user = User::findOrFail($id);
        $points = $request->input('points');
        $description = $request->input('description', null);

        try {
            $user->redeemPoints($points, $description);
            return response()->json(['message' => 'Points redeemed successfully!', 'user' => $user]);
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 400);
        }
    }
}
