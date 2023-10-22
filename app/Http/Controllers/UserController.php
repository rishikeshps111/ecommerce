<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\User;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function homepage(){
        if (request('search')) {
            $products = Product::where('name', 'like', '%' . request('search') . '%')->paginate(12);
        } else {
            $products = Product::latest()->paginate(12);
        }
        return view('homepage',compact('products'));
    }
    public function contact(){
        return view('contact');
    }
    public function register(){
        return view('register');
    }
    public function user_register(Request $request){
        
        $request->validate([

            'name' => 'required|string|max:250',
            'email' => 'required|email|max:250|unique:users',
            'phone' => 'required|min:10|numeric',
            'password' => 'required|min:8'
        ]);

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'phone_number' => $request->phone,
            'user_type' =>$request->user_type,
            'password' => Hash::make($request->password)
        ]);
        return redirect()->route('register')
        ->withSuccess('You have successfully registered');

       
    }
    public function login(){
        return view('login');
    }
    public function user_login(Request $request){
        $credentials = $request->validate([
            'email' => 'required',
            'password' => 'required'
        ]);
        if(Auth::attempt($credentials))
        {
            if(Auth::user()->user_type == 'Admin'){
                $request->session()->regenerate();
                return redirect()->route('admin')
                    ->withSuccess('You have successfully logged in!');  
            }else{
                $request->session()->regenerate();
            return redirect()->route('homepage')
                ->withSuccess('You have successfully logged in!');
            }
            
        }

        return redirect()->route('login')
        ->withSuccess('Invalid User!');

        
    }
    public function logout(){
        Auth::logout();
        return redirect()->route('homepage');
    }

    public function detail($id){
        $product = Product::find($id);
        return view('details',compact('product')); 
    }
    public function cart_submit(Request $request){
        $request->validate([

            'size' => 'required',
            'color' => 'required',
            'count' => 'required',
            
        ]);

        $user_id = Auth::user()->id;
        Cart::create([
            'user_id' =>$user_id,
            'product_id' => $request->product_id,
            'size' => $request->size,
            'color' => $request->color,
            'count' =>$request->count,
            
        ]);
        return redirect()->route('homepage')
                ->withSuccess('Item Added!'); 
    }

    public function cart_detail(){
        $user = Auth::user()->id;
        $items = Cart::where('user_id', '=', $user)->get();
        return view('cart',compact('items'));
    }

    public function delete_cart($id){
        $item = Cart::find($id);
        $item->delete();

        return redirect()->route('cart_detail')
                ->withSuccess('Item Removed!');

        
    }

}
