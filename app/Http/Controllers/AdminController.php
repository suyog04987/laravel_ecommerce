<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Catagory;
use App\Models\Product;
use App\Models\Order;

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

    public function delete_product($id){
        $data=Product::find($id);
        $data->delete();
        return redirect()->back();
        
    }

    public function edit_product(Product $product){
        $catagory=Catagory::all();
        return view('admin.product.editProduct',['product'=>$product],compact('catagory'));
    }

    public function update_product( Request $request,$id){
        // dd($request);
        $update=Product::find($id);
        $update->title=$request->title;
        $update->description=$request->description;
        $update->catagory=$request->catagory;
        $update->quantity=$request->quantity;
        $update->price=$request->price;
        $update->discount_price=$request->discount_price;

        $image=$request->image;
        if($image)
        {
            $imagename=time().'.'.$image->getClientOriginalExtension();
            $request->image->move('productImg',$imagename);
            $update->image=$imagename;
        }
        

        $update->save();
        return redirect()->back()->with('success', 'Product updated successfully!');
        // return view('admin.product.showProduct');


    }

    public function view_order() {
        $order=Order::all();
        return view('admin.viewOrder', compact('order'));
        
    }
    public function remove_order($id){
        $remove=Order::find($id);
        $remove->delete();
        return redirect()->back();

    }

    public function delivery_status($id){
        $status=Order::find($id);
        if($status){
            $status->delivery_status = 'delivered';
            $status->payment_status='paid';
            $status->save();
        }else{
            return response()->json(['message' => 'Order not found'], 404);
        }

        return redirect()->back();
    }
}
