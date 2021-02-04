@extends('layout.master')
@section('title','Blog')
@section('content')

    <!-- Breadcrumb Section Begin -->
    <div class="breacrumb-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb-text">
                        <a href="{{route('index')}}"><i class="fa fa-home"></i> Home</a>
                        <span>Blog</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Breadcrumb Section Begin -->

    <!-- Blog Section Begin -->
    <section class="blog-section spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-6 col-sm-8 order-2 order-lg-1">
                    <div class="blog-sidebar">
                        <div class="search-form">
                            <h4>Search</h4>
                            <form action="#">



                                <input type="hidden"name="_token" value="{{csrf_token()}}" class="form-control">
                                <input type="text" id="search_blog" placeholder="Search . . .  ">

                            </form>
                        </div>
                        <div class="blog-catagory">
                            <h4>Categories</h4>
                            <ul>
                                @foreach ($t as $t)
                                <li><a href="#">{{$t->name}}</a></li>
                                @endforeach
                            </ul>
                        </div>
                        <div class="recent-post">
                            <h4>Recent Post</h4>
                            @foreach($recent_post as $p)
                            <div class="recent-blog">
                                <a href="{{route('post-details',$p->id)}}" class="rb-item">
                                    <div class="rb-pic">
                                        <img src="/images-uploaded/blog/{{$p->photo}}" alt="{{$p->title}}">
                                    </div>
                                    <div class="rb-text">
                                        <h6>{{$p->title}}</h6>
                                        <p>{{$p->titles->name}} <span>{{Str::substr( $p->created_at,0,10)}}</span></p>
                                    </div>
                                </a>
                            </div>
                            @endforeach
                        </div>
                        <div class="blog-tags">
                            <h4>Product Tags</h4>
                            <div class="tag-item">
                                @foreach($posts as $tagp)

                                <a href="{{route('post-details',$tagp->id)}}">{{Str::substr($tagp->title, 0, 10) }}</a>

                               @endforeach
                            </div>
                        </div>
                    </div>
                </div>
                <div class="blog-result col-lg-9 order-1 order-lg-2"></div>
                <div class="col-lg-9 order-1 order-lg-2 divblog">


                    <div class="row">

                        @foreach($posts as $pt)

                        <div class="col-lg-6 col-sm-6 ">
                            <div class="blog-item">
                                <div class="bi-pic">
                                    <img src="/images-uploaded/blog/{{$pt->photo}}" alt="{{$pt->title}}">
                                </div>
                                <div class="bi-text">
                                    <a href="{{route('post-details',$pt->id)}}">
                                        <h4>{{$pt->title}}</h4>
                                    </a>
                                    <p>{{$pt->titles->name}} <span>{{Str::substr( $pt->created_at,0,10)}}</span></p>
                                </div>
                            </div>
                        </div>

                        @endforeach




                        <div class="col-lg-12">
                            <div class="loading-more">
                                <i class="icon_loading"></i>
                                <a href="#">
                                    Loading More
                                </a>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>
    <!-- Blog Section End -->


    @endsection
    <script
    src="https://code.jquery.com/jquery-3.3.1.js"></script>
    <script>

        $(document).ready(function(){
            $('#search_blog').keyup(function(){
                var key=$(this).val();
                if(key !=''){
                    $.ajax({
                      url:"{{route('blog-search')}}",
                      type:"POST",
                      data:{
                        '_token':"{{csrf_token()}}",
                        'k':key
                          },
                      success:function(response){
                        $('.divblog').hide();
                        $('.blog-result').show();
                        $('.blog-result').html(response);
                      }


                    });

                }
                else{
                    $('.divblog').show();
                    $('.blog-result').hide();

                }
            });
        });




          </script>
