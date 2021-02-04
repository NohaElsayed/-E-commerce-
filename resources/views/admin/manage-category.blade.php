@extends('admin.layout.master')
@section('title','Manage Category')
@section('heading','Manage Category')

 @section('content')


 <div class="container">
    <div class="row">
        <div class=" col-12 d-block mx-auto my-auto">
    <div class="card ">
        <h5 class="card-header">Products List</h5>

        @if(Session()->has('deleted'))
        <div class="alert alert-danger  alert-dismissible">
          <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
        {{Session()->get('deleted')}}
        </div>
        @endif

        <div class="card-body">
@if(@isset($categories) && $categories->count()>0)
  <table id="category" class="table table-bordered" style="width:100%">
    <thead style="background-color: #343a40;color:white">
        <tr>
            <th>Name</th>
            <th>Number of Products</th>
            <th>Operations</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($categories as $c)

        <tr>
            <td>{{ Str::ucfirst($c->name)}}</td>
            <!--The Number of products in a category-->
              <td>{{$c->products()->count()}}</td>

            <td><a href="{{route('admin.editcategory',$c->id)}}" class="btn btn-primary btn-sm my-2">Edit</a>
                <a href="{{route('admin.deletecategory',$c->id)}}" class="btn btn-danger btn-sm my-2">Delete</a>
                <a href="{{route('admin.showproductcategory',$c->id)}}" class="btn btn-success btn-sm my-2">Show Products</a>
            </td>
        </tr>

        @endforeach
    </tbody>
    <tfoot>

    </tfoot>
</table>
@else
<span>No Categories Available</span>
@endif
        </div>
    </div>
        </div>
    </div>
 </div>
 @endsection
