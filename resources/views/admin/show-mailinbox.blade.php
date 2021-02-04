@extends('admin.layout.master')
 @section('title','Contact Message')
 @section('heading','Inbox')
 @section('content')


 <div class="container">
   <div class="row">
       <div class=" col-12 d-block mx-auto my-auto">
   <div class="card ">
       <h5 class="card-header">Products List</h5>

       <div class="card-body">
@if(@isset($msg)&& $msg->count()>0)
 <table id="product" class="table table-bordered" style="width:100%">
   <thead style="background-color: #343a40;color:white">
       <tr>
           <th> Customer Name</th>
           <th>Customer Mail</th>
           <th>Message</th>
           <th>Sent at</th>

       </tr>
   </thead>
   <tbody>
       @foreach ($msg as $msg)
       <tr>

           <td>{{$msg->customers->name}}</td>
           <td>{{$msg->customers->email}}</td>
           <td>{{$msg->m_body}}</td>
           <td>{{$msg->created_at}}</td>

       </tr>

       @endforeach
   </tbody>
   <tfoot>

   </tfoot>
</table>
@else
<span>No Contact Messages Available</span>

@endif

       </div>
   </div>
       </div>
   </div>
 @endsection
