@extends('admin.layout.master')
@section('title','Add Product')
@section('heading','Add Product')
@section('content')
<div class="container">
<div class="row">
<div class="col-sm-8 col-12  d-block mx-auto my-auto">
    <div class="card ">
        <h5 class="card-header">Add New Product</h5>
        <div class="card-body">

          <form style="padding: 20px" action="{{route('admin.storeproduct')}}" method="POST" enctype="multipart/form-data" >
           @csrf
            <div class="form-group ">
                <label for="exampleInputEmail1">Category</label>
                <select name="category" class="form-control">
                    <option>Select Category</option>
                  @foreach ($categories as $c)
                      <option value="{{$c->id}}">{{Str::ucfirst($c->name)}}</option>
                  @endforeach
                </select>
                @error('category')
                <span class="text-danger">{{$message}}</span>
                @enderror
              </div>
              <div class="form-group ">
                <label for="exampleInputEmail1">Name</label>
                <input type="text"name="name" value="{{old('name')}}" class="form-control"  aria-describedby="emailHelp">
                @error('name')
                    <span class="text-danger">{{$message}}</span>
                @enderror
              </div>
              <div class="form-group">
                <label for="exampleInputEmail1">Price </label>
                <input type="text" name="oldprice" value="{{old('price')}}" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                @error('oldprice')
                    <span class="text-danger">{{$message}}</span>
                @enderror
              </div>

              <div class="form-group">
                <label for="exampleInputEmail1">Price After Sale</label>
                <input type="text" name="price" value="{{old('price')}}" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                @error('price')
                    <span class="text-danger">{{$message}}</span>
                @enderror
              </div>
              <div class="form-group">
                  <label for="exampleFormControlTextarea1">Description</label>
                  <textarea class="form-control" name="description"  id="exampleFormControlTextarea1" rows="3"></textarea>
                  @error('description')
                      <span class="text-danger">{{$message}}</span>
                  @enderror
                </div>
              <div class="form-group ">
                  <input type="file"name="photo" class="form-control" id="inputGroupFile01" aria-describedby="inputGroupFileAddon01" >
                  <label  for="inputGroupFile01">Choose Photo</label>
                  @error('photo')
                  <span class="text-danger">{{$message}}</span>
                 @enderror
                </div>

                <button type="button" class="btn btn-danger my-2 px-5">Clear</button>
              <button type="submit" class="btn btn-primary my-2 px-5">Add</button>
            </form>
      </div>
</div>
</div>
</div>

@endsection
