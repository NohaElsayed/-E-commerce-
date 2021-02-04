@extends('admin.layout.master')
@section('title','Edit User')
@section('heading','Edit User')
@section('content')
<div class="container">
<div class="row">
<div class="col-sm-8 col-12  d-block mx-auto my-auto">
    <div class="card ">
        <h5 class="card-header">Edit User</h5>
        <div class="card-body">
            @if(Session()->has('success'))
            <div class="alert alert-success  alert-dismissible">
                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                   {{Session()->get('success')}}
            </div>
            @endif
          <form style="padding: 20px" action="{{route('admin.updateuser',$user->id)}}" method="POST" enctype="multipart/form-data" >
           @csrf

              <div class="form-group ">
                <label for="exampleInputEmail1">UserName</label>
                <input type="text"name="name" value="{{$user->username}}" class="form-control"  aria-describedby="emailHelp">
                @error('name')
                <span class="text-danger">{{$message}}</span>
                @enderror
              </div>

              <div class="form-group">
                <label for="exampleInputEmail1">Email</label>
                <input type="text" name="email" value="{{$user->email}}" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                @error('email')
                <span class="text-danger">{{$message}}</span>
                @enderror
              </div>

              <div class="form-group">
                <label for="exampleInputEmail1">Password</label>
                <input type="text" name="password" value="{{$user->password}}" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                @error('password')
                <span class="text-danger">{{$message}}</span>
                @enderror
              </div>

                <div class="form-group ">
                    <label for="exampleInputEmail1">User Role</label>
                    <select name="role" class="form-control">
                        <option value="0">{{$user->role}}</option>
                        <option value="1">Admin</option>
                        <option value="2">User</option>
                        @error('role')
                        <span class="text-danger">{{$message}}</span>
                        @enderror
                    </select>


                  </div>

              <button type="submit" name="submit" class="btn btn-primary my-2 px-5">Add</button>
            </form>
      </div>
</div>
</div>
</div>

@endsection
