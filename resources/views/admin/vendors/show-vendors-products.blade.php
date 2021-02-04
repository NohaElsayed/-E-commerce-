@extends('admin.layout.master')
@section('title','Show Vendor Products')
@section('heading',' Vendor Products')




 @section('content')

 @if(Session()->has('success'))
 <div class="alert alert-success  alert-dismissible">
    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
      {{Session()->get('success')}}
 </div>
  @endif

 <div class="container">
   <div class="row">
       <div class=" col-12 d-block mx-auto my-auto">
   <div class="card ">
       <h5 class="card-header">{{$vendor->name}}</h5>

       <div class="card-body">
@if(@isset($products)&& $products->count()>0)
 <table id="example" class="table table-bordered" style="width:100%">
   <thead style="background-color: #343a40;color:white">
       <tr>
           <th>Name</th>
           <th>Price</th>
           <th>Photo</th>
           <th>Category</th>
           <th>Created at</th>
           <th>Updated at</th>

       </tr>
   </thead>
   <tbody>
       @foreach ($products as $p)
       <tr>
           <td> {{ Str::ucfirst($p->name)}}</td>
           <td>${{$p->price}}</td>
           @if($p->photo ==NULL)
             {{'   Not Available'}}
           @else
               <td><img src="/images-uploaded/products/{{$p->photo}}" width="80" height="80"></td>
           @endif
           <td>{{$p->categories->name}}</td>
           <td>{{$p->created_at}}</td>
           <td>{{$p->updated_at}}</td>

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
 </div>


<div class="container">
    <div class="row">
   <div class=" col-12 d-block mx-auto my-auto">
       <div class="card ">
        <p>
            <a class="btn btn-primary" data-toggle="collapse" href="#collapseExample" role="button" aria-expanded="false" aria-controls="collapseExample">
              Add products
            </a>
        </p>
          <div class="collapse" id="collapseExample">
            <div class=" card card-body">
               <form action="{{route('admin.addvendorproducts')}}" method="post" >
                @csrf
                   <input type="text" name="vendor" value="{{$vendor->id}}" class="form-control my-2">
                   <select name="all_products[]" class="form-control my-2" style="width: 300px" multiple>
                       <option>Choose Product(s)</option>
                       @foreach ($all_products as $p)
                       <option value="{{$p->id}}">{{$p->name}}</option>

                       @endforeach
                   </select>
                   <button type="submit" class="btn btn-warning my-2 ">Save</button>
               </form>
          </div>
        </div>
   </div>

 </div>
</div>
</div>





 @endsection





