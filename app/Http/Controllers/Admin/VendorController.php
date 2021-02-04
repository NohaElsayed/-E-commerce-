<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\VendorRequest;
use App\Models\Vendor;
use App\Models\Product;
use Illuminate\Http\Request;
use App\Notifications\VendorCreated;
//use Illuminate\Notifications\Notification;
use Illuminate\Support\Facades\Notification;

class VendorController extends Controller
{

    public function manage_vendors_products(){
        $vendors=Vendor::get();
        return view('admin.vendors.manage-vendors-products',compact('vendors'));
    }
   //show vendor products
    public function show_vendors_products($id){
      $vendor=Vendor::find($id);
      $products=$vendor->products;
      $all_products=Product::with('categories')->get();

      return view('admin.vendors.show-vendors-products',compact('vendor','products','all_products'));
    }
    // add vendor products
    public function add_vendor_products(Request $request){

        $vendor=Vendor::find($request->vendor);
        $vendor->products()->syncWithoutDetaching($request->all_products);
        return redirect()->back()->with('success','Products Added Successfully');

    }
    //add vendor
    public function add_vendor(VendorRequest $request){
        $vendor=Vendor::create([
            'name'=>$request->name,
            'phone'=>$request->phone,
            'email'=>$request->email,
            'password'=>$request->password
        ]);
        Notification::send($vendor,new VendorCreated($vendor));
        return redirect()->back()->with('success','Vendor Created Successfully');
    }
    //Edit vendor
    public function edit_vendor($id){
       $vendor= Vendor::find($id);
       $arr=array('vendor'=>$vendor);
       return view('admin.vendors.edit-vendor',$arr);
    }
    //update Vendor
    public function update_vendor($id,VendorRequest $request){
        $vendor=Vendor::find($id);
        $vendor->name=$request->name;
        $vendor->email=$request->email;
        $vendor->phone=$request->phone;
        $vendor->password=$request->password;
        $vendor->save();
        return redirect()->back()->with('success','Vendor Updated successfully');

    }
    //delete vendor (Many to Many relation)
    public function delete_vendor($id){
        $vendor=Vendor::find($id);
         $vendor->delete();
         $vendor->products()->detach($vendor);



        return redirect()->back()->with('success','Vendor deleted successfully');
    }
}
