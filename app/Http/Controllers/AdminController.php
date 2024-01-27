<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Catagory;
use App\Models\Product;

class AdminController extends Controller
{
    //
    public function view_catagory(){
        $item = Catagory::all();
        return view('admin.catagory',compact('item'));

    }


    public function add_catagory(Request $request){
        // dd($request);
        // $data = $request->validate([
        //     'catagory'=>'required']);

        //     $newCatagory = Catagory::create($data);

       $data=new catagory;
       $data->catagory_name=$request->catagory;
       $data->save();
       return redirect()->back()->with('success', 'Successfully added!');
    }

    public function delete_catagory($id) {
        $data=Catagory::find($id);
        $data->delete();
        return redirect()->back();
        
    }

    public function view_product() {
        $items = Catagory::all();
        return view('admin.product.addProduct',compact('items'));
        
    }

    public function add_product(Request $request) {
        // dd($request);
        $data= new Product();
        $data->title=$request->title;
        $data->description=$request->description;
        $data->catagory=$request->catagory;
        $data->quantity=$request->quantity;
        $data->price=$request->price;
        $data->discount_price=$request->discount_price;

        $image=$request->image;
        $imagename=time().'.'.$image->getClientOriginalExtension();
        $request->image->move('productImg',$imagename);
        $data->image=$imagename;

        $data->save();
        return redirect()->back()->with('success', 'Product added successfully!');

        
    }

    public function show_product(){
        $newProduct= Product::all();
        return view('admin.product.showProduct',compact('newProduct'));
        
    }
}
