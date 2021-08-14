<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Support\Facades\Auth;
class HomeController extends Controller
{
    public function __construct()
    {
        //    $this->middleware('cus');
    }
  public function index(){
      $category = Category::where('status',1)->orderBy('name', 'ASC')->get();
      $top_product = Product::limit(8)->orderBy('id', 'DESC')->get();
      $sale_product = Product::where('sale_price', '>',0)->limit(8)->orderBy('id', 'DESC')->get();

      return view('homepage.home', compact('category', 'top_product', 'sale_product'));
  }
  public function shop(){
      return view('homepage.shop');
  }
  public function logout(){
      return redirect()->route('homepage.home');
  }
  public function login(){
    return view('homepage.login');

}
public function post_login(Request $req){
    $this->validate($req,[
        'email'=> 'required',
        'password'=> 'required',
    ]);
    dd($req->only('email', 'password'));
    if(Auth::guard('cus')->Auth::attempt($req->only('email','password'),$req->has('remember'))){
      return redirect()->route('homepage.home');
    }else{
      return redirect()->back();
    }

}
  public function view($id){
    $model = Category::where('id',$id)->first();
     $category = Category::where('status',1)->orderBy('name', 'ASC')->get();
     if($model){
        return view('homepage.product',['model'=> $model, 'category'=> $category]);
     }

  }
  public function detail($id){
    $product = Product::where('id',$id)->first();
    if($product){
        return view('homepage.product-detail',['model'=> $product]);
     }
  }

  public function search(){
      $key = request()->key;
      $newProduct = Product::orderBy('id', 'DESC')->where('name','LIKE', '%' .$key.'%')->paginate(2);
      return view('homepage.search',compact('newProduct'));
  }
}
