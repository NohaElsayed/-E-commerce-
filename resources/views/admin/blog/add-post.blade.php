@extends('admin.layout.master')
@section('title','Add Post')
@section('heading','Add Post')
@section('content')

<div class="container">
    <div class="row">
    <div class=" col-sm-6 col-12 d-block mx-auto my-auto">
        <div class="card ">
            <h5 class="card-header">Add New Post</h5>
            <div class="card-body">

              <form action="{{route('admin.storepost')}}" method="post" style="padding: 20px" enctype="multipart/form-data">
                @csrf

                <div class="form-group ">
                    <label for="exampleInputEmail1">Blog Category</label>
                    <select name="category" class="form-control">
                        <option>Select Blog Category</option>
                      @foreach ($blog_cat as $c)
                          <option value="{{$c->id}}">{{Str::ucfirst($c->name)}}</option>
                      @endforeach
                    </select>
                    @error('category')
                    <span class="text-danger">{{$message}}</span>
                    @enderror
                  </div>

                  <div class="form-group ">
                    <label for="exampleInputEmail1">Title</label>
                    <input type="text" class="form-control" name="header" value="{{old('header')}}" aria-describedby="emailHelp">
                    @error('header')

                    <span class="text-danger">{{$message}}</span>

                    @enderror
                  </div>

                  <div class="form-group ">
                    <div class="form-floating">
                        <label for="floatingTextarea2">Post</label>
                        <textarea class="form-control" name="post_body"   placeholder="Write a post here" id="floatingTextarea2" style="height: 100px"></textarea>
                        @error('post_body')
                        <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>
                  </div>

                  <div class="form-group ">

                    <input type="file"name="photo" class="form-control" id="inputGroupFile01" aria-describedby="inputGroupFileAddon01" >
                    <label  for="inputGroupFile01">Choose Photo</label>
                    @error('photo')
                    <span class="text-danger">{{$message}}</span>
                   @enderror
                  </div>



                  <button type="submit" class="btn btn-primary my-2 px-5">Add</button>
                </form>


          </div>
    </div>
    </div>
    </div>
@endsection
