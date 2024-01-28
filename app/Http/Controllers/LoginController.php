<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Product;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function login()
    {
        return view('auth.login', [
            'title' => 'Login Page'
        ]);
    }

    public function auth(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required',
            'password' => 'required'
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            Alert::success('Success', 'Login Success');
            $products = Product::all();
            return view('products.index', [
                'title' => 'Products Page',
                'products' => $products,
            ]);
        }

        Alert::error('Failed', 'Email or Password Incorrect');
        return back();
    }
    public function register()
    {
        return view('auth.register', [
            'title' => 'Register Page'
        ]);
    }

    public function store(Request $request)
    {
        // return $request;
        $validatedData = $request->validate([
            'name' => 'required|min:3|max:255',
            'email' => 'required|unique:users|max:255',
            'password' => 'required|min:5',
            'city' => 'required|min:2|max:255',
            'province' => 'max:255',
        ]);

        User::create($validatedData);
        Alert::success('Register Success', 'Please Login');
        return view('auth.login', [
            'title' => 'Login Page'
        ]);
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        Alert::success('Success', 'Logout Success');
        return view('welcome', [
            'title' => 'Home Page'
        ]);
    }
}
