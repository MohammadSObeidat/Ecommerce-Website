<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Product;
use App\Models\Order;
class ProductController extends Controller
{
    public function index()
    {
        $allProduct = Product::paginate(5);
        return view('admin.product.allproduct',['products'=>$allProduct]);
    }

    //Add Product ......................................

    public function create()
    {
        $allCategory = Category::all();
        return view('admin.product.createproduct',['categories'=>$allCategory]);
    }

    public function store(Request $request)
    {
        //validation
        $request->validate([
            'name'=>['required'],
            'price'=>['required'],
            'qty'=>['required'],
            'category_id'=>['required'],
            'photo'=>['required'],
        ]);
        //store data in database
        $path = $request->photo->move('uploads',$request->photo->getClientOriginalName());
        Product::create([
            'name' => $request->name,
            'qty' => $request->qty,
            'price' => $request->price,
            'description' => $request->description,
            'imagepath' => $path,
            'category_id' =>$request->category_id
        ]);
        //return message
        return redirect(route('allproduct'))->with('success','Product has been create successfully');
    }

    //Delete Product  .........................................

    public function destroy($id)
    {
        $deleteProduct = Product::find($id);
        $deleteProduct->delete();
        
        return redirect(route('allproduct'))->with('success','Product has been delete successfully');
    }

    //Edit product ............................................

    public function edit($id)
    {
        $editProduct = Product::find($id);
        $allCategory = Category::all();
        return view('admin.product.editproduct',['product'=>$editProduct,'categories'=>$allCategory]);
    }

    public function update(Request $request,Product $product)
    {
        //validation
        $request->validate([
            'name'=>['required'],
            'price'=>['required'],
            'qty'=>['required'],
            'category_id'=>['required'],
            'photo'=>['required'],
        ]);
        //update data
        $path = $request->photo->move('uploads',$request->photo->getClientOriginalName());
        $product->update([
            'name' => $request->name,
            'qty' => $request->qty,
            'price' => $request->price,
            'description' => $request->description,
            'imagepath' => $path,
            'category_id' => $request->category_id
        ]);
        //return message
        return redirect(route('allproduct'))->with('success','Product has been update successfully');
    }

    // Search ................................................
    
    public function search(Request $request)
    {
        $allProduct = Product::where('name','like',"%$request->search%")->paginate(5);
        return view('admin.product.allproduct',['products'=>$allProduct]);
    }

}
