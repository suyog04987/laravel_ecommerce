<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
Use Illuminate\Support\Facades\Auth;
use App\Models\Product;
use App\Models\Cart;
use App\Models\Order;
use Illuminate\Queue\Jobs\RedisJob;

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
            $user=User::all();
            // $product->withQueryString();
            return view('home.userpage',compact('products'),compact('user'));
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

    public function show_cart(){
        if(Auth::id())
        {
        $id = Auth::user()->id;
        $cart= Cart::where('user_id','=',$id)->get();

        return view('home.showCart',compact('cart'));
        }else{
        return redirect('login');
        }
    }    

    public function remove_cart($id){
        $remove=Cart::find($id);
        $remove->delete();
        return redirect()->back();

    }

    public function cash_pay(){
        $user = Auth::User()->id;
        $data=Cart::where('user_id','=',$user)->get();

        foreach($data as $data)
        {
            $order= new Order();
            $order->name=$data->name;
            $order->email=$data->email;
            $order->phone=$data->phone;
            $order->address=$data->address;
            $order->user_id=$data->user_id;
            $order->product_title=$data->product_title;
            $order->price=$data->price;
            $order->quantity=$data->quantity;
            $order->image=$data->image;
            $order->Product_id=$data->Product_id;

            $order->payment_status='cash on delivary';

            $order->delivery_status='processing';

            $order->save();
             
            $cart_id=$data->id;
            $cart= Cart::find($cart_id);
            $cart->delete();

           


        }
        return redirect()->back()->with('message','We have Received Your Order');
 
    }

}

