@extends('layout.master')
@section('title','Sign In')
@section('content')

    <!-- Breadcrumb Section Begin -->
    <div class="breacrumb-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb-text">
                        <a href="{{route('index')}}"><i class="fa fa-home"></i> Home</a>
                        <span>Login</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Breadcrumb Form Section Begin -->

    <!-- Register Section Begin -->
    <div class="register-login-section spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 offset-lg-3">
                    <div class="login-form">
                        @if(Session::has('failed'))
                        <script>
                            swal({
                                title:'Oops...',
                                text:"{{Session()->get('failed')}}",
                                icon:'error',
                                button:"Try again"
                            });
                            </script>
                            @endif
                        <h2>Login</h2>
                        <form action="{{route('signin-customer')}}" method="post">
                            @csrf
                            <div class="group-input">
                                <label for="username"> Email address <span class="text-danger">*</span></label>
                                <input type="text" name="email" id="username">
                            </div>
                            <div class="group-input">
                                <label for="pass">Password <span class="text-danger">*</span></label>
                                <input type="password" name="password" id="pass">
                            </div>
                            <div class="group-input gi-check">
                                <div class="gi-more">
                                    <label for="save-pass">
                                        Save Password
                                        <input type="checkbox" id="save-pass">
                                        <span class="checkmark"></span>
                                    </label>
                                    <a href="#" class="forget-pass">Forget your Password</a>
                                </div>
                            </div>
                            <button type="submit" class="site-btn login-btn">Sign In</button>
                        </form>
                        <div class="switch-login">
                            <a href="{{route('signup')}}" class="or-login">Or Create An Account</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Register Form Section End -->


    @endsection
