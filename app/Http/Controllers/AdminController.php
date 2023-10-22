<?php

namespace App\Http\Controllers;

use App\Models\Product;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function admin(){
        if (request('search')) {
            $products = Product::where('name', 'like', '%' . request('search') . '%')->get()->paginate(20);
        } else {
            $products = Product::latest()->paginate(20);
        }
        return view('adminhome',compact('products'));
    }
    public function addproduct(){
        
        return view('addproduct');
    }
    public function product_submit(Request $request){
        $request->validate([

            'name' => 'required',
            'description' => 'required',
            'image' => 'required',
            'price' => 'required',

            
        ]);
        $image = $request->file('image')->getClientOriginalName();
        $request->file('image')->storeAs('public/images',$image);
        

        
        Product::create([
            'name' => $request->name,
            'description' => $request->description,
            'image' => $image,
            'price' =>$request->price,
            
        ]);
        return redirect()->route('admin')
        ->withSuccess('Product Added successfully!');
        
        
        
    }
    public function editproduct($id){
        $product = Product::find($id);
        return view('editproduct',compact('product'));
    }
    public function edit_submit(Request $request){
        $request->validate([

            'name' => 'required',
            'description' => 'required',
            'image' => 'required',
            'price' => 'required',

            
        ]);
        $product = Product::find($request->id);
        $image = $request->file('image')->getClientOriginalName();
        $request->file('image')->storeAs('public/images',$image);
        
        

        $product->update([

            'name' => $request->name,
            'description' => $request->description,
            'image' => $image,
            'price' =>$request->price,
            
        ]);
        return redirect()->route('admin')
        ->withSuccess('Product Updates successfully!');
        
        
        
    }

    public function deleteproduct($id){
        $product = Product::find($id);
        $product->delete();
        return redirect()->route('admin')
        ->withSuccess('Product Deleted successfully!');
    }

    public function logout(){
        Auth::logout();
        return redirect()->route('login');
    }
}
