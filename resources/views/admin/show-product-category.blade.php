@extends('admin.layout.master')
@section('title','Show Products')
@section('heading')
{{Str::ucfirst($category->name)}}
@stop

 @section('content')


     <!-- card code  -->
     <div class="container card-style">
        <div class=" row ">
           @foreach ($category->products()->get() as $p)
               <div class="col-lg-4 col-md-6 col-12  d-flex align-items-stretch mb-3 mx-auto">
                    <div class="card h-auto" style="width: 18rem;" >

                           <img src="/images-uploaded/products/{{$p->photo}}" class="card-img-top img-fluid  " alt="product-pic" width="300px" height="300px" >

                        <div class="card-body flex-fill text-center ">
                           <h5 class="card-header  "> Name</h5>
                              <p class="card-text ellipsis ">{{$p->name}}</p>
                            <h5 class="card-header"> Description</h5>
                              <p class="card-text ellipsis ">{{$p->description}}</p>
                            <h5 class="card-header "> Price</h5>
                              <p class="card-text ellipsis ">{{$p->price}}</p>

                        </div>
                    </div>
                </div>
           @endforeach

       </div>
       </div>
    @endsection
