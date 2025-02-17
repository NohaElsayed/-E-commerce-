
   @extends('layout.master')
   @section('title','Shop')
   @section('content')


    <!-- Breadcrumb Section Begin -->
    <div class="breacrumb-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb-text">
                        <a href="{{route('index')}}"><i class="fa fa-home"></i> Home</a>
                        <span>Shop</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Breadcrumb Section Begin -->

    <!-- Product Shop Section Begin -->
    <section class="product-shop spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-6 col-sm-8 order-2 order-lg-1 produts-sidebar-filter">
                    <div class="filter-widget">
                        <h4 class="fw-title">Categories</h4>
                        <input type="hidden"name="_token" value="{{csrf_token()}}" class="form-control">
                        <ol class="filter-catagories">

                        @foreach ($category as $c)

                            <li style="list-style: none" class="categorylink" id="{{$c->id}}"><a href="{{route('view-products-by-category',$c->id)}}">

                           {{Str::ucfirst($c->name)}}

                        </a> </li>

                         @endforeach
                         <li style="list-style: none" id="shopall"><a href="{{route('shop')}}"> Shop All</a></li>
                    </ol>

                </div>

                   <div class="filter-widget">
                        <h4 class="fw-title">Brand</h4>
                        <div class="fw-brand-check">

                            <div class="bc-item">
                                <ul>
                                @foreach ($vendor as $v)
                                <li style="list-style: none">
                                <label >
                                    {{Str::ucfirst($v->name)}}


                                    <input type="checkbox"  name="vendors"
                                    id="{{$v->id}}" class="vendor_checkbox">
                                    <span class="checkmark"></span>
                                </label>
                                </li>

                                @endforeach
                                </ul>
                            </div>

                        </div>
                    </div>

                    <div class="filter-widget">
                        <h4 class="fw-title">Price</h4>
                        <div class="filter-range-wrap">
                            <div class="range-slider">
                                <div class="price-input">
                                    <input type="text" id="minamount">
                                    <input type="text" id="maxamount">
                                </div>
                            </div>
                            <div class="price-range ui-slider ui-corner-all ui-slider-horizontal ui-widget ui-widget-content"
                                data-min="33" data-max="98">
                                <div class="ui-slider-range ui-corner-all ui-widget-header"></div>
                                <span tabindex="0" class="ui-slider-handle ui-corner-all ui-state-default"></span>
                                <span tabindex="0" class="ui-slider-handle ui-corner-all ui-state-default"></span>
                            </div>
                        </div>
                        <a href="#" class="filter-btn">Filter</a>
                    </div>
                    <div class="filter-widget">
                        <h4 class="fw-title">Color</h4>
                        <div class="fw-color-choose">
                            <div class="cs-item">
                                <input type="radio" id="cs-black">
                                <label class="cs-black" for="cs-black">Black</label>
                            </div>
                            <div class="cs-item">
                                <input type="radio" id="cs-violet">
                                <label class="cs-violet" for="cs-violet">Violet</label>
                            </div>
                            <div class="cs-item">
                                <input type="radio" id="cs-blue">
                                <label class="cs-blue" for="cs-blue">Blue</label>
                            </div>
                            <div class="cs-item">
                                <input type="radio" id="cs-yellow">
                                <label class="cs-yellow" for="cs-yellow">Yellow</label>
                            </div>
                            <div class="cs-item">
                                <input type="radio" id="cs-red">
                                <label class="cs-red" for="cs-red">Red</label>
                            </div>
                            <div class="cs-item">
                                <input type="radio" id="cs-green">
                                <label class="cs-green" for="cs-green">Green</label>
                            </div>
                        </div>
                    </div>
                    <div class="filter-widget">
                        <h4 class="fw-title">Size</h4>
                        <div class="fw-size-choose">
                            <div class="sc-item">
                                <input type="radio" id="s-size">
                                <label for="s-size">s</label>
                            </div>
                            <div class="sc-item">
                                <input type="radio" id="m-size">
                                <label for="m-size">m</label>
                            </div>
                            <div class="sc-item">
                                <input type="radio" id="l-size">
                                <label for="l-size">l</label>
                            </div>
                            <div class="sc-item">
                                <input type="radio" id="xs-size">
                                <label for="xs-size">xs</label>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-9 order-1 order-lg-2">
                    <div class="product-show-option">
                        <div class="row">
                            <div class="col-lg-7 col-md-7">
                                <div class="select-option">
                                    <select class="sorting">
                                        <option value="">Default Sorting</option>
                                    </select>
                                    <select class="p-show">
                                        <option value="">Show:</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-5 col-md-5 text-right">
                                <p>Show 01- 09 Of 36 Product</p>
                            </div>
                        </div>
                    </div>

                    <div class="showing-p"></div>
                    <div class="product-list">
                        <div class="row">
                            <div class="showing-products"></div>
                            @foreach ($product as $p)
                            <div class="col-lg-4 col-sm-6">
                                <div class="product-item">

                                    <div class="pi-pic">

                                        <img src="/images-uploaded/products/{{$p->photo}}" alt="{{$p->name}}">
                                        @if($p->pricebefore_sale !=NULL)
                                        <div class="sale pp-sale">Sale</div>
                                        @endif
                                        <div class="icon">
                                            <i class="icon_heart_alt"></i>
                                        </div>
                                        <ul>
                                            <li class="w-icon active"><a href="#"><i class="icon_bag_alt"></i></a></li>
                                            <li class="quick-view"><a href="#">+ Quick View</a></li>
                                            <li class="w-icon"><a href="#"><i class="fa fa-random"></i></a></li>
                                        </ul>
                                    </div>


                                    <div class="pi-text">
                                        <div class="catagory-name">{{$p->categories->name}}</div>
                                        <a href="#">
                                            <h5>{{Str::ucfirst($p->name)}}</h5>
                                        </a>
                                        <div class="product-price">
                                            ${{$p->price}}
                                            @if($p->pricebefore_sale !=NULL)
                                            <span> ${{$p->pricebefore_sale}}</span>
                                            @endif
                                        </div>
                                    </div>


                                </div>
                            </div>
                            @endforeach
                        </div>

                    </div>

                    <div class="loading-more">
                        <i class="icon_loading"></i>
                        <a href="#">
                            Loading More
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Product Shop Section End -->

    @endsection






