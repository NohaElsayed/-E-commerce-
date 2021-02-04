<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Product;

class CategoryController extends Controller
{
    public function add_category(){
        return view('admin.add-category');
    }
   //show categories
    public function manage_category(){

        $categories=Category::get();
        $product=Product::get();
        return view('admin.manage-category',compact('categories','product'));


    }

    public function store_category(Request $request){
      //Begin Validation
        $v=Validator::make($request->all(),
        ['name'=>'required|unique:categories,name'],
        ['name.required'=>'Name Field is required','name.unique'=>'Category Name already exist']
        );
        if($v->fails()){
        return redirect()->back()->withErrors($v)->withInputs($request->all());
        }
     //End Validation
        Category::create(['name'=>$request->name
        ]);
       $request->session()->flash('success','Data Saved Successfully');
       return redirect()->route('admin.addcategory');

        }

        public function delete_category($id){

            $row=Category::find($id);
            $row->delete();//delete category
            $row->products()->delete();//delete products related to category
            return redirect()->back()->with('deleted','Category deleted successfully');
        }

        public function edit_category($id){
           $row= Category::find($id);
            $arr=array('category'=>$row);
           return view('admin.edit-category',$arr);
        }
        public function update_Category($id,Request $request){
           $row=Category::find($id);
           $row->name=$request->name;
           $row->save();
           return redirect()->back()->with('success','Category Updated Successfully');

        }

        public function show_product_category($id){

            $category=Category::find($id);
            $arr1=array('category'=>$category);
            return view('admin.show-product-category',$arr1);

        }

}

