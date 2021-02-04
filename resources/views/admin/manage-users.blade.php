@extends('admin.layout.master')
@section('title','Manage Users')
@section('heading','Manage Users')




 @section('content')

 <div class="container">
   <div class="row">
       <div class=" col-12 d-block mx-auto my-auto">
   <div class="card ">
       <h5 class="card-header">Users List</h5>
       @if(Session()->has('success'))
       <div class="alert alert-success  alert-dismissible">
         <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
             {{Session()->get('success')}}
       </div>
       @endif
       <div class="card-body">
@if(@isset($users)&& $users->count()>0)
 <table id="product" class="table table-bordered" style="width:100%">
   <thead style="background-color: #343a40;color:white">
       <tr>
           <th>UserName</th>
           <th>Email</th>
           <th>Password</th>
           <th>Role</th>
           <th>Created at</th>
           <th>Updated at</th>
           <th>Operations</th>
       </tr>
   </thead>
   <tbody>
       @foreach ($users as $u)
       <tr>
           <td>  {{ Str::ucfirst($u->username)}}</td>
           <td>{{$u->email}}</td>
           <td>{{$u->password}}</td>
           <td>{{$u->role}}</td>
           <td>{{$u->created_at}}</td>
           <td>{{$u->updated_at}}</td>
           <td><a href="{{route('admin.edituser',$u->id)}}" class="btn btn-primary btn-sm my-2">Edit</a>
               <a href="{{route('admin.deleteuser',$u->id)}}" class="btn btn-danger btn-sm my-2">Delete</a>
           </td>
       </tr>

       @endforeach
   </tbody>
   <tfoot>

   </tfoot>
</table>
@else
<span>No Products Available</span>

@endif

       </div>
   </div>
       </div>
   </div>
 @endsection





