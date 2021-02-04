<?php

namespace App\Http\Controllers\Admin;


use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;
use App\Http\Requests\ProductRequest;


class ProductController extends Controller
{
    public function manage_product(){
        $products=Product::get();


        return view('admin.manage-product',compact('products'));
    }
    //Start Read product from db
    public function add_product(){

        $categories= Category::get();
        return view('admin.add-product',compact('categories'));
    }
    //End Read product from db

    //Start Show product
    public function show_product($id){
        $product=Product::find($id);
        return view('admin.show-product',compact('product'));
    }
    //End Show product

    //Create Method & Validation

    public function store_product(ProductRequest $request){
     // Input Validation in ProductRequest

     //Start Adding products to database
        $ext=$request->photo->getClientOriginalExtension();
        $file_name=time().'.'.$ext;
        $path='images-uploaded/products';
        $request->photo->move($path,$file_name);

        Product::create(['name'=>$request->name,
                          'price'=>$request->price,
                          'pricebefore_sale'=>$request->oldprice,
                          'description'=>$request->description,
                          'photo'=>$file_name,
                          'category_id'=>$request->category]);
                return redirect()->back()->with('success','Product Added Successfuly');
    }
    //End Adding products to database

   //Start Edit Product
   public function edit_product($id){
       $row=Product::find($id);  // Find the row of product with this id(name,price,description,photo,category_id) we need this to show product fields values
       $arr=array('product'=>$row); // divide the row so we have ( name,price,description,photo,category_id )

       $all_category=Category::get(); //select * from category

       return view('admin.edit-product',$arr,compact('all_category'));

   }
   //End Edit Product

   // Start Update product in database
   public function update_product($id,Request $request){

       $row=Product::find($id);

     //if(isset($_FILES['photo'])){
         if(isset($request->photo)){
                unlink("images-uploaded/products/$row->photo");
                $ext=$request->photo->getClientOriginalExtension();
                $file_name=time().'.'.$ext;
                $path='images-uploaded/products';
                $request->photo->move($path,$file_name);
                $row->photo= $file_name;
       }
   // }
       else{
        $row->photo= $row->photo;
       }


      $row->name=$request->name;
      $row->price=$request->price;
      $row->description=$request->description;
      $row->category_id=$request->category;
      $row->save();
       return redirect()->back()->with('success','Product Updated Successfully');
   }
   //End Update product in database

   //Start delete product
   public function delete_product($id){
       $row=Product::find($id);
       $row->delete();
       unlink("images-uploaded/products/$row->photo");
      return redirect()->back()->with('success','Product deleted successfully');
   }
   //End delete product


   //Begin Search Products//
    public function search_products(Request $request){

        $data='%'.$request->k.'%';
        $products=Product::where('name','like',$data)->get();
        if(isset($products) && $products->count()>0){
            foreach($products as $product){
                echo "<p><a href='/admin/product-details/$product->id'class='plink'>$product->name</a></p>";
            }

        }
        else{
            echo "No Result";
        }
    }
   //End search products

   // Begin show product-details
   public function product_details($id){
       $product=Product::find($id);
       return view('admin.product-details',compact('product'));
   }
   //End show product details

}
