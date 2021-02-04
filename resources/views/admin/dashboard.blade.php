@extends('admin.layout.master')
@section('title','Admin Dashboard')
@section('heading','Dashboard')

@section('content')


<div class="content">
    <div class="container-fluid">

        <input type="hidden"name="_token" value="{{csrf_token()}}" class="form-control">
        <input type="text" id="search" class="form-control mx-auto my-auto" placeholder="Search Products ..">
        <div class="show-result"></div>

<!--Info boxes-->
<div class="row">

<div class="col-md-3 col-sm-6 col-12 my-2">
<div class="info-box  ">
    <span class="info-box-icon bg-success"><i class="far fa-envelope"></i></span>
    <div class="info-box-content">
        <span class="info-box-text">Messages</span>
        <span class="info-box-number">{{App\Models\Message::count()}}</span>
    </div>
</div>
</div>

<div class="col-md-3 col-sm-6 col-12 my-2">
<div class="info-box  bg-danger ">
<span class="info-box-icon"><i class="fas fa-comments"></i></span>
<div class="info-box-content">
    <span class="info-box-text">Comments</span>
    <span class="info-box-number">41,410</span>
    <div class="progress">
    <div class="progress-bar" style="width: 70%"></div>
    </div>
    <span class="progress-description">
    70% Increase in 30 Days
    </span>
</div>
</div>
</div>


<div class="col-md-3 col-sm-6 col-12 my-2">
<div class="info-box  bg-warning ">
<span class="info-box-icon"><i class="fas fa-cart-plus"></i></span>
<div class="info-box-content">
    <span class="info-box-text">New Orders</span>
    <span class="info-box-number">300</span>
</div>
</div>
</div>

<div class="col-md-3 col-sm-6 col-12 my-2">
<div class="info-box  bg-info ">
<span class="info-box-icon"><i class="fas fa-user-plus"></i></span>
<div class="info-box-content">
    <span class="info-box-text">Customer Registerations</span>
    <span class="info-box-number">{{App\Models\Customer::count() }}</span>
</div>
</div>
</div>

</div><!----/.row----->




    </div><!-- /.container-fluid -->
  </div>
  @endsection
  <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
  <script>

$(document).ready(function(){
    $('#search').keyup(function(){
        var key=$(this).val();
        if(key !=''){
            $.ajax({
              url:"{{route('admin.searchproduct')}}",
              type:"POST",
              data:{
                '_token':"{{csrf_token()}}",
                'k':key
                  },
              success:function(response){
                $('.show-result').show();
                $('.show-result').html(response);
              }


            });

        }
        else{
            $('.show-result').hide();
        }
    });
});




  </script>
