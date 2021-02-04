
    @extends('layout.master')
    @section('title','Sign Up')
    @section('content')
    <style>

        .group-input{
            overflow: hidden;
            font-size: 20px;
            position: relative;
        }
        .group-input :placeholder-shown{
        font-size: 15px;
        }
        .group-input a{
            color: black;

        }
         .group-input i{
            width: 26px;
            float: left;
            position: absolute;
            cursor: pointer;
            right: 20px;
            top: 55px;
            text-align: center;
         }
         .fas{
            display: inline-block;
            font: normal normal normal 14px/1 FontAwesome;
            font-size: inherit;
            text-rendering: auto;
            -webkit-font-smoothing: antialiased;
         }

    </style>

    <!-- Breadcrumb Section Begin -->
    <div class="breacrumb-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb-text">
                        <a href="{{route('index')}}"><i class="fa fa-home"></i> Home</a>
                        <span>Register</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Breadcrumb Form Section Begin -->

    <!-- Register Section Begin -->
    <div class="register-login-section spad">
        <div class="container">
            <!--Sweet Alert-->
            @if(Session::has('record_added'))
            <script>
                swal({
                    title:'Registered Successfully!',
                    text:"{{Session()->get('record_added')}}",
                    icon:'success',
                    button:"Ok"
                });
                </script>
                @endif
            <div class="row">
                <div class="col-lg-6 offset-lg-3">
                    <div class="register-form">
                        <h2>Register</h2>
                        <form action="{{route('register-customer')}}" method="post">
                            @csrf
                            <div class="group-input">
                                <label for="username">Name <span class="text-danger">*</span></label>
                                <input type="text" name="name" id="username" autocomplete="off" placeholder="Enter Your Name">
                              @error('name')
                                  <span class="text-danger">{{$message}}</span>
                              @enderror
                            </div>

                            <div class="group-input">
                                <label for="email">Email address <span class="text-danger">*</span></label>
                                <input type="text" id="email" name="email" autocomplete="off" placeholder="Enter Your Email Address">
                                @error('email')
                                <span class="text-danger">{{$message}}</span>
                            @enderror
                            </div>

                            <div class="group-input">
                                <label for="pass">Password <span class="text-danger">*</span></label>
                                <input type="password"name="password" id="pass" autocomplete="off" placeholder="Enter Your Password">
                                <i class="fas fa-eye togglepass" onclick="myFunction()"></i>
                                @error('password')
                                <span class="text-danger">{{$message}}</span>
                            @enderror
                            </div>

                            <div class="group-input">
                                <label for="con-pass">Confirm Password <span class="text-danger">*</span></label>
                                <input type="password" id="conpass" name="password_confirmation"  autocomplete="off" placeholder="Confirm Your Password">
                                <i class="fas fa-eye togglepass" onclick="myFunction()"></i>
                                @error('confirm_pass')
                                <span class="text-danger">{{$message}}</span>
                            @enderror
                            </div>
                            <button type="submit" class="site-btn register-btn">REGISTER</button>
                        </form>
                        <div class="switch-login">
                            <a href="{{route('login')}}" class="or-login">Or Login</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Register Form Section End -->
    <script
    src="https://code.jquery.com/jquery-3.3.1.js"
    integrity="sha256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60="
    crossorigin="anonymous"></script>
    <script>
            /**Toggle Password Visability Function**/
        function myFunction() {

            const togglepassword = document.querySelectorAll('.togglepass');
            const password=document.querySelector('#pass');
            const conpassword=document.querySelector('#conpass');
            for (const i of togglepassword) {
            i.addEventListener('click', function(i) {
                this.classList.toggle('fa-eye-slash');
            });

            }
            if (password.type === "password" || conpassword.type ==="password" ) {
                password.type = "text";
                conpassword.type="text";
            } else {
                password.type = "password";
                conpassword.type="password";
            }
        }


    </script>


    @endsection
