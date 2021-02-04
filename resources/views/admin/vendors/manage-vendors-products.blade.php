@extends('admin.layout.master')
@section('title','Manage Vendors')
@section('heading','Manage Vendors')

 @section('content')



 <div class="container">
    <div class="row">
    <div class="col-12  d-block mx-auto my-auto">
        <div class="card ">
            <h5 class="card-header">Add New Vendor</h5>
            <div class="card-body">
              <form action="{{route('admin.addvendor')}}" method="post" style="padding: 20px" >
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
                    <input type="text" class="form-control" name="name"  aria-describedby="emailHelp">
                    @error('name')
                    <span class="text-danger">{{$message}}</span>
                    @enderror
                 </div>

                 <div class="form-group ">
                  <label for="exampleInputEmail1">Email</label>
                    <input type="email" class="form-control" name="email"  aria-describedby="emailHelp">
                    @error('email')
                    <span class="text-danger">{{$message}}</span>
                    @enderror
                 </div>

                 <div class="form-group ">
                  <label for="exampleInputEmail1">phone</label>
                    <input type="text" class="form-control" name="phone"  aria-describedby="emailHelp">
                    @error('phone')
                    <span class="text-danger">{{$message}}</span>
                    @enderror
                 </div>

                 <div class="form-group ">
                  <label for="exampleInputEmail1">Password</label>
                    <input type="text" class="form-control" name="password"  aria-describedby="emailHelp">
                    @error('password')
                    <span class="text-danger">{{$message}}</span>
                    @enderror
                  </div>


                  <button type="submit" class="btn btn-primary my-2 px-5">Add</button>
                </form>
            </div>
        </div>
    </div>





<div class=" col-12 d-block mx-auto my-auto">
    <div class="card ">
        <h5 class="card-header">Vendors List</h5>
        <div class="card-body">
          @if(@isset($vendors) && $vendors->count()>0)
            <table id="vendors_products" class="table table-bordered" style="width:100%">
             <thead style="background-color: #343a40;color:white">
                <tr>
                    <th>Vendors</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th>Operations</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($vendors as $v)

                <tr>
                <td>{{$v->name}}</td>
                <td>{{$v->email}}</td>
                <td><a href="tel:{{$v->phone}}">{{$v->phone}}</a></td>


                    <td><a href="{{route('admin.editvendor',$v->id)}}" class="btn btn-primary btn-sm my-2">Edit</a>
                        <a href="{{route('admin.deletevendor',$v->id)}}" class="btn btn-danger btn-sm my-2">Delete</a>
                        <a href="{{route('admin.showvendorsproducts',$v->id)}}" class="btn btn-success btn-sm my-2">Show Products</a>
                    </td>
                </tr>

                @endforeach
            </tbody>
            <tfoot>

            </tfoot>
        </table>
        @else
        <span>No Vendors Available</span>
        @endif
                </div>
            </div>
                </div>
            </div>
        </div>
 @endsection
