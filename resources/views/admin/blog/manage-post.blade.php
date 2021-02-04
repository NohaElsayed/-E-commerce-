@extends('admin.layout.master')
@section('title','Manage Post')
@section('heading','Manage Post')



 @section('content')

 <div class="container">
   <div class="row">
       <div class=" col-12 d-block mx-auto my-auto">
   <div class="card ">
       <h5 class="card-header">Posts List</h5>
       @if(Session()->has('failed'))
       <div class="alert alert-danger  alert-dismissible">
         <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
             {{Session()->get('failed')}}
       </div>
       @endif
       <div class="card-body">
@if(@isset($post)&& $post->count()>0)
 <table id="product" class="table table-bordered" style="width:100%">
   <thead style="background-color: #343a40;color:white">
       <tr>
           <th>Title</th>
           <th>Photo</th>
           <th>Post</th>
           <th>Post Category</th>
           <th>Created at</th>
           <th>Updated at</th>
           <th>Operations</th>
       </tr>
   </thead>
   <tbody>
       @foreach ($post as $p)
       <tr>

           <td>{{Str::limit($p->header,10,' ... ')}}</td>
           @if($p->photo ==NULL)
             {{'   Not Available'}}
           @else
               <td><img src="/images-uploaded/blog/{{$p->photo}}" width="80" height="80"></td>
           @endif
           <td>{{ Str::limit($p->post_body,10,' ... ')}}</td>
           <td>{{$p->titles->name}}</td>
           <td>{{$p->created_at}}</td>
           <td>{{$p->updated_at}}</td>
           <td><a href="{{route('admin.editpost',$p->id)}}" class="btn btn-primary btn-sm my-2">Edit</a>
               <a href="{{route('admin.deletepost',$p->id)}}" class="btn btn-danger btn-sm my-2">Delete</a>
           </td>
       </tr>

       @endforeach
   </tbody>
   <tfoot>

   </tfoot>
</table>
@else
<span>No Posts Available</span>

@endif

       </div>
   </div>
       </div>
   </div>
 @endsection





