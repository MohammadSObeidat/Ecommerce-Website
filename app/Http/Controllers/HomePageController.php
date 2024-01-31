<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Category;
use App\Models\Product;
use App\Models\ContactUs;
use App\Models\User;
use App\Models\Cart;
use App\Models\Order;
use App\Models\OrderDetails;

class HomePageController extends Controller
{
    public function index()
    {
        $categories = Category::all();
        $product = Product::take(4)->get();
        return view('user.layout.template',['categories'=>$categories , 'products'=>$product]);
    }

    // Contact Us ...............................................

    public function contact()
    {
        return view('user.contact');
    }

    public function store(Request $request)
    {
        //validation
        $request->validate([
            'name'=>['required'],
            'email'=>['required','email'],
            'subject'=>['required'],
            'number'=>['required'],
            'message'=>['required']
        ]);
        //store data in database
        $storeData = new ContactUs();
        $storeData->name = $request->name;
        $storeData->email = $request->email;
        $storeData->subject = $request->subject;
        $storeData->number = $request->number;
        $storeData->message = $request->message;

        $storeData->save();
        //return message
        return redirect(route('contactus'))->with('success','Thank you for contacting us!');
    }

    // About US .............................................

    public function About()
    {
        return view('user.about');
    }

    // Category ..............................................

    public function Category()
    {
        $allCategory = Category::all();
        return view('user.singlecategory',compact('allCategory'));
    }

    // All Product .............................................

    public function Product() 
    {
        $allProduct = Product::all();
        return view('user.allproduct',compact('allProduct'));
    }

    // Register ...................................................
    
    public function register()
    {
        return view('register');
    }

    public function signup(Request $request)
    {
        //validation
        $request->validate([
            'name' => ['required'],
            'email' => ['required','email'],
            'password' => ['required']
        ]);
        //store data in database
        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => $request->password
        ]);
        //return message
        return redirect(route('login'))->with('success','User has been registered successfully');
    }

    // SubCategory .............................................

    public function subcategory($id)
    {
        $products = Product::where('category_id',$id)->get();
        return view('user.product',compact('products'));
    }

    // single Prodact ..........................................

    public function singleproduct($id)
    {
        $product = Product::find($id);
        return view('user.singleproduct',compact('product'));
    }

    // Search Product ...........................................

    public function Search(Request $request) 
    {
        $allProduct = Product::where('name','like',"%$request->search%")->get();
        return view('user.allproduct',['allProduct'=>$allProduct]);
    }



    // ............................................................................
    // ............................................................................
    


    public function user()
    {
        $categories = Category::all();
        $product = Product::take(4)->get();
        return view('user.layout.template',['categories'=>$categories , 'products'=>$product]);
    }

    public function userlogout()
    {
        Auth::logout();
        return redirect(route('homepage'));
    }

    public function cart()
    {
        $userId = Auth::user()->id;
        $cart = Cart::with('Product')->where('user_id',$userId)->latest()->get();
        return view('user.cart',compact('cart'));
    }

    public function AddToCart(Request $request,$id)
    {
        $userId = Auth::user()->id;
        $quantity = $request->qty;

        $result = Cart::where('user_id',$userId)->where('product_id',$id)->get();
        if (count($result)>0) {
            $result->first()->quantity += $quantity;
            $result->first()->save();
        }
        else {
            $addToCart = new Cart();
            $addToCart->user_id = $userId;
            $addToCart->quantity = $quantity;
            $addToCart->product_id = $id;

            $addToCart->save();
        }
        return redirect(route('cart'));
    }

    public function BuyNow($id)
    {
        $userId = Auth::user()->id;
        
        $result = Cart::where('user_id',$userId)->where('product_id',$id)->get();
        if (count($result)>0) {
            $result->first()->quantity += 1;
            $result->first()->save();
        }
        else {
            $addToCart = new Cart();
            $addToCart->user_id = $userId;
            $addToCart->quantity = 1;
            $addToCart->product_id = $id;

            $addToCart->save();
        }
        return redirect(route('cart'));   
    }

    public function RemoveFromCart($id)
    {
        $RemoveFromCart = Cart::find($id);
        $RemoveFromCart->delete();

        return redirect(route('cart'))->with('success','The product has been successfully deleted');
    }

    public function GetShippingAddress()
    {
        $userId = Auth::user()->id;
        $cart = Cart::with('Product')->where('user_id',$userId)->latest()->get();
        return view('user.shippingaddress',compact('cart'));
    }

    public function StoreOrder(Request $request) 
    {
        //validation
        $request->validate([
            'name'=>['required'],
            'email'=>['required','email'],
            'address'=>['required'],
            'phone'=>['required'],
        ]);
        //store in database
        $newOrder = new Order();
        $userId = Auth::user()->id;

        $newOrder->user_id = $userId;
        $newOrder->name = $request->name;
        $newOrder->email = $request->email;
        $newOrder->address = $request->address;
        $newOrder->phone = $request->phone;
        $newOrder->message = $request->message;

        $newOrder->save();

        $cart = Cart::with('Product')->where('user_id',$userId)->latest()->get();
        foreach ($cart as $item){
            $newOrderDetails = new OrderDetails();
            $newOrderDetails->quantity = $item->quantity;
            $newOrderDetails->price = $item->Product->price;
            $newOrderDetails->product_id = $item->product_id;
            $newOrderDetails->order_id = $newOrder->id;
            $newOrderDetails->save();
        }
        Cart::where('user_id',$userId)->delete();

        return redirect(route('shippingaddress'))->with('sucsses','The order has been successfully');
    }

}
