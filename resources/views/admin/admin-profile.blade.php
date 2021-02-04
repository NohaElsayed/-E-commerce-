@extends('admin.layout.master')
@section('title','Profile')
@section('heading','Account setting')
@section('content')
<div class="container">
<div class="row">
<div class="col-sm-8 col-12  d-block mx-auto my-auto">
    <div class="card ">
        <h5 class="card-header">Edit your profile</h5>
        <div class="card-body">
            @if(Session()->has('success'))
            <div class="alert alert-success  alert-dismissible">
                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                   {{Session()->get('success')}}
            </div>
            @endif

          <form style="padding: 20px" action="{{route('admin.updateprofile',$profile->id)}}" method="POST" enctype="multipart/form-data" >
           @csrf
            <div class="form-group ">
                <label for="exampleInputEmail1">Email</label>
                <input type="email" name="email" value="{{$profile->email}}" class="form-control"  aria-describedby="emailHelp">


              </div>
              <div class="form-group ">
                <label for="exampleInputEmail1">UserName</label>
                <input type="text"name="username" value="{{$profile->username}}" class="form-control"  aria-describedby="emailHelp">

              </div>

              <div class="form-group ">
                  <input type="file"name="photo" value="{{$profile->photo}}" class="form-control" id="inputGroupFile01" aria-describedby="inputGroupFileAddon01" >
                  <label  for="inputGroupFile01">{{$profile->photo}}</label>


                </div>
              <button type="submit" class="btn btn-primary my-2 px-5">Add</button>
            </form>

      </div>
</div>
</div>
</div>


@endsection
