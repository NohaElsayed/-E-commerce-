@extends('admin.layout.master')
@section('title','Edit Category')
@section('heading','Edit Category')
@section('content')

<div class="container">
    <div class="row">
    <div class=" col-sm-6 col-12 d-block mx-auto my-auto">
        <div class="card ">
            <h5 class="card-header">Edit Category</h5>
            <div class="card-body">
              <form action="{{route('admin.updatecategory',$category->id)}}" method="post" style="padding: 20px" >
                @csrf
                  <div class="form-group ">
                      @if(Session()->has('success'))
                         <div class="alert alert-success alert-dismissible" >
                            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                               {{Session()->get('success')}}
                         </div>
                         @endif
                    <label for="exampleInputEmail1">Name</label>
                    <input type="text" value="{{$category->name}}" class="form-control" name="name"  aria-describedby="emailHelp">

                  </div>


                    <button type="button" class="btn btn-danger my-2 px-5">Clear</button>
                  <button type="submit" class="btn btn-primary my-2 px-5">Add</button>
                </form>
          </div>
    </div>
    </div>
    </div>
@endsection
