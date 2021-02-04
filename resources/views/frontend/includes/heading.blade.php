<header class="header-section">
    <div class="header-top">
        <div class="container">
            <div class="ht-left">
                <div class="mail-service">
                   <p>  {{Session()->get('name')}}</p>
                </div>

                <div class="phone-service">
                    <i class=" fa fa-phone"></i>
                    +65 11.188.888
                </div>
            </div>
            <div class="ht-right">
                <a href="{{route('login')}}" class="login-panel"><i class="fa fa-user"></i>Login</a>
          <!--
                <a role="button" tabindex="0" data-qa="lnk_languageSelector" class="mx-2 " style="color: black;">
                {{-- @foreach(LaravelLocalization::getSupportedLocales() as $localeCode => $properties)
                    <a rel="alternate" hreflang="{{ $localeCode }}" href="{{ LaravelLocalization::getLocalizedURL($localeCode, null, [], true) }}">
                        {{ $properties['native'] }}
                    </a>
                    @endforeach
                    --}}
                </a>

            -->
                <div class="top-social">
                    <a href="#"><i class="ti-facebook"></i></a>
                    <a href="#"><i class="ti-twitter-alt"></i></a>
                    <a href="#"><i class="ti-linkedin"></i></a>
                    <a href="#"><i class="ti-pinterest"></i></a>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="inner-header">
            <div class="row">
                <div class="col-lg-2 col-md-2">
                    <div class="logo">
                        <a href="{{route('index')}}">
                            <img src="{{asset('assets/img/logo.png')}}" alt="">
                        </a>
                    </div>
                </div>
                <!-- Begin Choose Category-->
                <div class="col-lg-7 col-md-7">

                        @php
                        $category=App\Models\Category::select('id','name')->get();
                        @endphp

                        <input type="hidden"name="_token" value="{{csrf_token()}}" class="form-control">
                        <select id="cat"  name="category" class="form-control">
                            <option value="0 ">All Categories</option>
                            @foreach ($category as $category)
                            <option value="{{$category->id}}"> {{Str::ucfirst($category->name)}}</option>
                            @endforeach
                        </select>

                </div>
               <!--End Choose Category-->


                <div class="col-lg-3 text-right col-md-3">
                    <ul class="nav-right">
                        <li class="heart-icon">
                            <a href="#">
                                <i class="icon_heart_alt"></i>
                                <span>1</span>
                            </a>
                        </li>
                        <li class="cart-icon">
                            <a href="#">
                                <i class="icon_bag_alt"></i>
                                <span>3</span>
                            </a>
                            <div class="cart-hover">
                                <div class="select-items">
                                    <table>
                                        <tbody>
                                            <tr>
                                                <td class="si-pic"><img src="{{asset('assets/img/select-product-1.jpg')}}" alt=""></td>
                                                <td class="si-text">
                                                    <div class="product-selected">
                                                        <p>$60.00 x 1</p>
                                                        <h6>Kabino Bedside Table</h6>
                                                    </div>
                                                </td>
                                                <td class="si-close">
                                                    <i class="ti-close"></i>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="si-pic"><img src="{{asset('assets/img/select-product-2.jpg')}}" alt=""></td>
                                                <td class="si-text">
                                                    <div class="product-selected">
                                                        <p>$60.00 x 1</p>
                                                        <h6>Kabino Bedside Table</h6>
                                                    </div>
                                                </td>
                                                <td class="si-close">
                                                    <i class="ti-close"></i>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                                <div class="select-total">
                                    <span>total:</span>
                                    <h5>$120.00</h5>
                                </div>
                                <div class="select-button">
                                    <a href="{{route('shopping-cart')}}" class="primary-btn view-card">VIEW CARD</a>
                                    <a href="{{route('check-out')}}" class="primary-btn checkout-btn">CHECK OUT</a>
                                </div>
                            </div>
                        </li>
                        <li class="cart-price"></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <div class="nav-item">
        <div class="container">

            <nav class="nav-menu mobile-menu">
                <ul>
                    <li class="active"><a href="{{route('index')}}">Home</a></li>
                    <li><a href="{{route('shop')}}">Shop</a></li>
                    <li><a href="#">Collection</a>
                        <ul class="dropdown">
                            <li><a href="#">Men's</a></li>
                            <li><a href="#">Women's</a></li>
                            <li><a href="#">Kid's</a></li>
                        </ul>
                    </li>
                    <li><a href="{{route('blog')}}">Blog</a></li>
                    <li><a href="{{route('contact')}}">Contact</a></li>

                    <li><a href="#">Other</a>
                        <ul class="dropdown">

                            <li><a href="{{route('shopping-cart')}}">Shopping Cart</a></li>
                            <li><a href="{{route('faq')}}">FAQ</a></li>

                            <li><a href="{{route('logout-customer')}}">Log out</a></li>
                        </ul>
                    </li>
                    <li><a href="{{route('register')}}">Register</a></li>
                </ul>
            </nav>
            <div id="mobile-menu-wrap"></div>
        </div>
    </div>

    <div class="show-product"> </div>
</header>
<div class="container-fluid show" style="display: none;width:100%;padding:20px;background-color:white;color:black"></div>


<script src="https://code.jquery.com/jquery-3.5.1.js"></script>


<script>
    $(document).ready(function () {

      $('#cat').change( function () {

         var $id  = $(this).val();
         if ($id != '0') {
              $.ajax({
              url: "{{route('show-products')}}",
              method:'POST',
              data: {
                  '_token' : "{{ csrf_token() }}  " ,
                  'id' : $id
               } ,
              success:function( res ) {
                  $('.hero-section').hide();
                  $('.show-product').show();
                  $('.show-product').html(res);
              }
              });
        } else {
          $('.hero-section').show();
          $('.show-product').hide();
        }
    });
  });


  </script>
