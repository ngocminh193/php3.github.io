<?php

namespace App\Http\Controllers;
use App\Http\Requests\Auth\LoginRequest;
use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Support\Facades\Auth;
use App\Models\Product;
use App\Models\Category;
use App\Models\User;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function dashboard(){
        $product_count = Product::count();
        $user_count = User::count();
        $category_count = Category::count();
        $order_count = 12;
        $cus_count = 12;
        $orders = Order::where('status',0)->get();
        if (request()->date_form && request()->date_to){
            $orders = Order::where('status',0)->whereBetween('created_at',
            [request()->date_form, request()->date_to])->get();

        }
        return view('admin.dashboard', compact('product_count','user_count','category_count', 'order_count', 'cus_count','orders'));
    }
    public function login(){
        return view('Auth.login');
    }
    public function post_login(LoginRequest $request){
        //   dd($request->only('email', 'password'));
        if (Auth::attempt($request->only('email', 'password'),$request->has('remember'))){
            return redirect()->route('admin.dashboard');
        }else{
             return redirect()->back();
        }
}
    public function logout(){
        Auth::logout();
        return redirect()->route('login');
    }
}
