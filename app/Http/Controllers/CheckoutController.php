<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Helper\CartHelper;
use App\Models\Order;
use App\Models\OrderDetail;
use Illuminate\Support\Facades\Auth;

class CheckoutController extends Controller
{
    public function __construct()
    {
        //    $this->middleware('cus');
    }

    public function form()
    {
        return view('homepage.checkout');
    }
    public function success()
    {
        return view('homepage.checkout_success');
    }
    public function submit_form(Request $req, CartHelper $cart,$id)
    {
        $c_id = Auth::guard('cus')->user()->id;
        if($order = Order::create([
            'customer_id' => $id,
            'order_note' => $req->order_note,
        ])){
            $order_id = $order->id;
            foreach ($cart->items as $product_id => $item){
                $quantity = $item['quantity'];
                $price = $item['price'];
                OrderDetail::create([
                    'order_id'=>$order_id,
                    'product_id'=>$product_id,
                    'quantity'=>$price,
                    'price'=>$quantity,
                ]);
            }
            session(['cart'=>'']);
            return redirect()->route('checkout.success')->with('success','Đặt hàng thành công');
        }else{
            return redirect()->route('checkout.success')->with('success','Đặt hàng không thành công');
        }
    }
}
