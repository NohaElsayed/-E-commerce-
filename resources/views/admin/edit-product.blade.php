@extends('admin.layout.master')
@section('title','Edit Product')
@section('heading','Edit Product')
@section('content')
<div class="container">
<div class="row">
<div class="col-sm-8 col-12  d-block mx-auto my-auto">
    <div class="card ">
        <h5 class="card-header">Edit Product</h5>
        <div class="card-body">
            @if(Session()->has('success'))
            <div class="alert alert-success  alert-dismissible">
                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                   {{Session()->get('success')}}
            </div>
            @endif
          <form style="padding: 20px" action="{{route('admin.updateproduct',$product->id)}}" method="POST" enctype="multipart/form-data" >
           @csrf
            <div class="form-group ">
                <label for="exampleInputEmail1">Category</label>
                <select name="category" class="form-control">

                     @foreach ($all_category as $c)
                     <option value="{{$c->id}}"
                        @if($product->category_id==$c->id){
                            selected
                        } @endif >
                        {{$c->name}}
                    </option>
                     @endforeach


                </select>

              </div>
              <div class="form-group ">
                <label for="exampleInputEmail1">Name</label>
                <input type="text"name="name" value="{{$product->name}}" class="form-control"  aria-describedby="emailHelp">

              </div>
              <div class="form-group">
                <label for="exampleInputEmail1">Price</label>
                <input type="text" name="price" value="{{$product->price}}" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">

              </div>
              <div class="form-group">
                  <label for="exampleFormControlTextarea1">Description</label>
                  <textarea class="form-control" name="description" value="{{$product->description}}" id="exampleFormControlTextarea1" rows="3">{{$product->description}}</textarea>

                </div>
              <div class="form-group ">
                  <input type="file" name="photo" value="{{$product->photo}}" class=" form-control" id="inputGroupFile01" aria-describedby="inputGroupFileAddon01" >
                  <label for="inputGroupFile01">{{$product->photo}}</label>

                </div>

              <button type="submit" name="submit" class="btn btn-primary my-2 px-5">Add</button>
            </form>
      </div>
</div>
</div>
</div>

@endsection
