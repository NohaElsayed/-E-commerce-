<?php

namespace App\Http\Controllers\Admin;

use App\Models\Admin;
use App\Models\Message;
use App\Http\Controllers\Controller;
use App\Http\Requests\AdminRequest;
use App\Http\Requests\PostRequest;
use App\Http\Requests\UserRequest;
use App\Models\Post;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function login(){
        return view('admin.index');
    }
    public function index(){

        return view('admin.dashboard');
    }

    //Pass data to Login Admin
   public function logindata(Request $request){
       $email=$request->email;
       $pass=$request->password;
       $login=Admin::select('email','password','username','id','photo','role')->where('email',$email)->where('password',$pass)->get();
       if($login->count()==1){
           foreach($login as $l){
               $request->Session()->put('role',$l->role);
               $request->Session()->put('username',$l->username);
               $request->Session()->put('id',$l->id);
               $request->Session()->put('photo',$l->photo);
               $request->Session()->put('email',$l->email);


             return redirect()->route('admin.dashboard');
           }
        }else{
               return redirect()->back()->with('failed','Email or Password Incorrect');
           }

       }
       //Logout Admin
       public function logout(Request $request){
           $request->Session()->flush();
           return redirect()->route('admin.index');

       }
       //Show Add users Form
       public function show_add_user(){
           $data=Admin::get();
           return view('admin.add-user',compact('data'));
       }

       //Add users
       public function add_user(UserRequest $request){


           Admin::create([
               'email'=>$request->email,
               'username'=>$request->name,
               'password'=>$request->password,
               'role'=>$request->role,

           ]);
           return redirect()->back()->with('success','User created successfully')->withInputs($request->flash());

       }
       //manage users
       public function manage_users(){
           //show users and admins only (not included vendors)
           $users=Admin::whereIn('role',[1,2])->get();
           return view('admin.manage-users',compact('users'));
       }
       //Edit users
       public function edit_user($id){
           $user=Admin::find($id);
           $arr=array('user'=>$user);

          return view('admin.edit-user',$arr);

       }
       //Update user
       public function update_user($id,UserRequest $request){
           $admin=Admin::find($id);
           $admin->username=$request->name;
           $admin->email=$request->email;
           $admin->password=$request->password;
           $admin->role=$request->role;
           $admin->save();
           return redirect()->back()->with('success','Admin/user updated successfully');
       }
      //delete users
      public function delete_user($id){
          $user_row=Admin::find($id);
          $user_row->delete();
          unlink("images-uploaded/Users/$user_row->photo");
          return redirect()->back()->with('success','User/Admin deletes successfully');

      }


    //Edit Admin Profile
       public function edit_admin_profile($id){
          $admin= Admin::find($id);
          $arr=array('profile'=>$admin);
          return view('admin.admin-profile',$arr);
       }

       //Update Admin profile
       public function update_admin_profile($id,AdminRequest $request){

            $row= Admin::find($id);

            if(isset($request->photo)){
                if($row->photo !=Null){
                    unlink("images-uploaded/Users/$row->photo");

                }
                $ext=$request->photo->getClientOriginalExtension();
                $file_name=time().'.'.$ext;
                $path='images-uploaded/Users';
                $request->photo->move($path,$file_name);
                $row->photo= $file_name;

                 }


            $row->username=$request->username;
            $row->email=$request->email;
            $row->save();
            return redirect()->back()->with('success','Your profile updated successfully');
       }
       public function show_mailbox(){
          $msg= Message::get();

           return view('admin.show-mailinbox',compact('msg'));
       }



   }


