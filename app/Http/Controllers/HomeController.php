<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
Use Illuminate\Support\Facades\Auth;
use App\Models\Product;
use App\Models\Cart;

class HomeController extends Controller
{


    public function index(){
        $products=product::paginate(6);
        // $product->withQueryString();
        return view ('home.userpage',compact('products'));
    }

    public function redirect(){
        $usertype=Auth::user()->usertype;
        if ($usertype== 1)
        {
            return view('admin.home');
        }
        else{
            $products=product::paginate(6);
            // $product->withQueryString();
            return view('home.userpage',compact('products'));
        }

    }

    public function product_detail($id) {
        $detail = Product::find($id);
        return view('home.product-detail',compact('detail'));
        
    }
    public function add_cart(Request $request,$id){
        if(Auth::id())
        {
            $user=Auth::user();
            $product=Product::find($id);
            $cart= new Cart();
            $cart->name=$user->name;
            $cart->email=$user->email;
            $cart->address=$user->address;
            $cart->phone=$user->phone;
            $cart->user_id=$user->id;
            $cart->product_title=$product->title;

            if($product->discount_price!=null){
                $cart->price=$product->discount_price * $request->quantity;
            }else{

                $cart->price=$product->price * $request->quantity;
            }


            
            $cart->image=$product->image;
            $cart->Product_id=$product->id;

            $cart->quantity=$request->quantity;

            $cart->save();

            return redirect()->back();
        }
        else{
            return redirect('login');
        }
    }
}

