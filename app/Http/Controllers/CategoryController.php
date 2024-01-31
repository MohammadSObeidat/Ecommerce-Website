<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;

class CategoryController extends Controller
{
    public function index()
    {
        $allCategory = Category::all();
        return view('admin.category.allcategory',['categories'=>$allCategory]);
    }

    //Add category ......................................

    public function create()
    {
        return view('admin.category.createcategory');
    }

    public function store(Request  $request)
    {
        //validation
        $request->validate([
            'name'=>['required'],
            'photo'=>['required'],
        ]);
        //store data in database
        $newCategory = new Category();
        $newCategory->name = $request->name;
        $newCategory->description = $request->description;

        $path = $request->photo->move('uploads',$request->photo->getClientOriginalName());
        $newCategory->imagepath = $path;

        $newCategory->save();
        //return message
        return redirect(route('allcategory'))->with('success','Category has been create successfully');
    }

    //Delete Category .......................................

    public function destroy($id)
    {
        $deleteCategory = Category::find($id);
        $deleteCategory->delete();

        return redirect(route('allcategory'))->with('success','Category has been delete successfully');
    }

    //Edit Category ..........................................
    
    public function edit($id)
    {
        $editCategory = Category::find($id);
        return view('admin.category.editcategory',['category'=>$editCategory]);
    }

    public function update(Request $request,Category $category)
    {
        $request->validate([
            'name'=>['required'],
            'photo'=>['required'],
        ]);
        $path = $request->photo->move('uploads',$request->photo->getClientOriginalName());
        $category->update([
            'name' => $request->name,
            'description' => $request->description,
            'imagepath' => $path
        ]);
        //return message
        return redirect(route('allcategory'))->with('success','Category has been update successfully');
    }
}
