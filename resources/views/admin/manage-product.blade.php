 @extends('admin.layout.master')
 @section('title','Manage Product')
 @section('heading','Manage Product')

<style>

   a.product-link:hover{
        text-decoration: underline;

    }
</style>


  @section('content')

  <div class="container">
    <div class="row">
        <div class=" col-12 d-block mx-auto my-auto">
    <div class="card ">
        <h5 class="card-header">Products List</h5>
        @if(Session()->has('success'))
        <div class="alert alert-success  alert-dismissible">
          <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
              {{Session()->get('success')}}
        </div>
        @endif
        <div class="card-body">
@if(@isset($products)&& $products->count()>0)
  <table id="product" class="table table-bordered" style="width:100%">
    <thead style="background-color: #343a40;color:white">
        <tr>
            <th>Name</th>
            <th>Price</th>
            <th>Photo</th>
            <th>Category</th>
            <th>Created at</th>
            <th>Updated at</th>
            <th>Operations</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($products as $p)
        <tr>
            <td><a href="{{route('admin.showproduct',$p->id)}}" class="product-link">  {{ Str::ucfirst($p->name)}}</a></td>
            <td>${{$p->price}}</td>
            @if($p->photo ==NULL)
              {{'   Not Available'}}
            @else
                <td><img src="/images-uploaded/products/{{$p->photo}}" width="80" height="80"></td>
            @endif
            <td>{{$p->categories->name}}</td>
            <td>{{$p->created_at}}</td>
            <td>{{$p->updated_at}}</td>
            <td><a href="{{route('admin.editproduct',$p->id)}}" class="btn btn-primary btn-sm my-2">Edit</a>
                <a href="{{route('admin.deleteproduct',$p->id)}}" class="btn btn-danger btn-sm my-2">Delete</a>
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





