@extends('admin.layout.master')
@section('title','Edit Vendor')
@section('heading','Edit Vendor')

 @section('content')



 <div class="container">
    <div class="row">
    <div class="col-12  d-block mx-auto my-auto">
        <div class="card ">
            <h5 class="card-header">Edit Vendor</h5>
            <div class="card-body">
              <form action="{{route('admin.updatevendor',$vendor->id)}}" method="post" style="padding: 20px" >
                @csrf
                  <div class="form-group ">
                      @if(Session()->has('success'))
                         <div class="alert alert-success alert-dismissible" >
                            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                               {{Session()->get('success')}}
                         </div>
                  </div>
                         @endif
                 <div class="form-group ">
                    <label for="exampleInputEmail1">Name</label>
                    <input type="text" class="form-control" name="name" value="{{$vendor->name}}" aria-describedby="emailHelp">
                    @error('name')
                    <span class="text-danger">{{$message}}</span>
                    @enderror
                 </div>

                 <div class="form-group ">
                  <label for="exampleInputEmail1">Email</label>
                    <input type="email" class="form-control" name="email" value="{{$vendor->email}}" aria-describedby="emailHelp">
                    @error('email')
                    <span class="text-danger">{{$message}}</span>
                    @enderror
                 </div>

                 <div class="form-group ">
                  <label for="exampleInputEmail1">Phone</label>
                    <input type="text" class="form-control" name="phone" value="{{$vendor->phone}}" aria-describedby="emailHelp">
                    @error('phone')
                    <span class="text-danger">{{$message}}</span>
                    @enderror
                 </div>

                 <div class="form-group ">
                  <label for="exampleInputEmail1">Password</label>
                    <input type="text" class="form-control" name="password" value="{{$vendor->password}}" aria-describedby="emailHelp">
                    @error('password')
                    <span class="text-danger">{{$message}}</span>
                    @enderror
                  </div>


                  <button type="submit" class="btn btn-primary my-2 px-5">Add</button>
                </form>
            </div>
        </div>
    </div>
    @endsection
