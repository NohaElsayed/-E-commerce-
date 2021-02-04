<?php

namespace App\Http\Controllers\frontend;

use App\Mail\signupEmail;
use App\Http\Controllers\Controller;
use App\Http\Requests\CustomerRequest;
use App\Http\Requests\MessageRequest;
use Illuminate\Http\Request;
use App\Models\Customer;
use App\Models\Message;
use Illuminate\Support\Facades\Mail;
use App\Notifications\CustomerCreated as NotificationsCustomerCreated;


use Illuminate\Support\Facades\Notification;
use App\Notifications\CustomerCreated;
class CustomerController extends Controller
{
    //Customer Registeration
     public function register_customer(CustomerRequest $request){
        $customer= Customer::create([
            'name'=>$request->name,
             'email'=>$request->email,
             'password'=>$request->password,
             'confirm_pass'=>$request->confirm_pass
         ]);
         Notification::send($customer,new CustomerCreated($customer));

         return redirect()->back()->with('record_added','Please Check your email for verification link');

     }
     //Customer Login
     public function sign_in_customer(Request $request){
         $email=$request->email;
         $password=$request->password;

         $login=Customer::select('id','email','password','name','orders')->where('email',$email)->where('password',$password)->get();
         if($login->count()==1){
             foreach($login as $l){
                $request->Session()->put('id',$l->id);
                 $request->Session()->put('name',$l->name);
                 $request->Session()->put('email',$l->email);
                 $request->Session()->put('orders',$l->orders);
                 return redirect()->route('check-out');
             }

         }
         else{
             return redirect()->back()->with('failed','Invalid Login');
         }
     }
     //customer logout
     public function logout_customer(Request $request){
         $request->Session()->flush();
         return redirect()->route('login');

     }



   // customer sending message
    public function sending_message($id){

      $id=Session()->get('name');
      if($id == NULL){

          return redirect()->back()->with('failed-msg','You Must log in');
      }


    }
    public function store_message(MessageRequest $request){

        $message=$request->message;
        $id=$request->id;
        $cust=Session()->get('id');
      //  $savedata= Customer::select('id')->where('email',$email)->get();
        $id=Session()->get('id');


       // Message::select('m_body','customer_id')->where('customer_id',$id);
      //  $msg=$savedata->messages->get();

        if($cust != NULL){
            Message::create([
            'm_body'=>$message,
            'customer_id'=>$id
        ]);
        return redirect()->back()->with('message-sent','We will contact you soon');
   }
   else{
         return redirect()->back()->with('failed-msg','You Must log in');
   }
 }



    }






