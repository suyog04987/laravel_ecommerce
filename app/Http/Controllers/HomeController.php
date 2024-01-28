<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
Use Illuminate\Support\Facades\Auth;
use App\Models\Product;

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
}

