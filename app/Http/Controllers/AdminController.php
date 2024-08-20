<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function home()
    {
        return view("admin_penel.home");
    }


    /**
     * Show the form for creating a new resource.
     */
    public function login()
    {
        return view('admin_penel.auth.login');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function register(Request $request)
    {
        return view('admin_penel.auth.register');
    }

    public function loginStore(Request $request)
    {

        $request->validate([
            "email" => "required|email",
            "password" => "required"
        ]);


        if (Auth::guard('admin')->attempt($request->only('email', 'password'), $request->filled('remember'))) {
            return redirect()->route("newadmin.home");
        }


        return  redirect()->back()->with("done", "Cant use this Login");
        // return "test";
    }

    /**
     * Store a newly created resource in storage.
     */
    public function registerStore(Request $request)
    {
        $request->validate([
            'name' => "required|string",
            "email" => "required|email|unique:admins,email",
            "password" => "required|string|confirmed"
        ]);

        $admin = new Admin();

        $admin->name = $request->name;
        $admin->email = $request->email;
        $admin->password = Hash::make($request->password);
        $admin->save();


        return  redirect()->back()->with("done", 'Add Admin Successfilly ');
    }


    public function logout(){
        Auth::guard('admin')->logout();

        return redirect()->route('newadmin.login');
    }
}
