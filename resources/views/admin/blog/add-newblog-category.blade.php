@extends('admin.layout.master')
@section('title','Add New Category')
@section('heading','Add New Blog Category')
@section('content')

<div class="container">
    <div class="row">
    <div class=" col-sm-6 col-12 d-block mx-auto my-auto">
        <div class="card ">
            <h5 class="card-header">Add New Blog Category</h5>
            <div class="card-body">

              <form action="{{route('admin.addnblogcategory')}}" method="post" style="padding: 20px" >
                @csrf

                  <div class="form-group ">

                    <label for="exampleInputEmail1">Title</label>
                    <input type="text" class="form-control" name="name" aria-describedby="emailHelp">
                    @error('name')

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
