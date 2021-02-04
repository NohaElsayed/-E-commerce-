   @extends('layout.master')
   @section('title','Blog Details')
   @section('content')

    <!-- Blog Details Section Begin -->
    <section class="blog-details spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="blog-details-inner">


<div class="blog-detail-title">
    <h2 class="post-title">{{$post->title}}</h2>
    <p>{{$post->titles->name}} <span>{{Str::substr( $post->created_at,0,10)}}</span></p>
</div>
<div class="blog-large-pic">
    <img src="/images-uploaded/blog/{{$post->photo}}" class="pinterest-img" alt="{{$post->title}}">
</div>
<div class="blog-detail-desc">
    <p></p>
</div>
<div class="blog-quote">
    <p>{{$post->post_body}}</p>
</div>



    <div class="tag-share">
        <div class="details-tag">
            <ul>
                <li><i class="fa fa-tags"></i></li>
                @foreach ($all_titles as $t)
                <li>{{$t->name}}</li>
                @endforeach
            </ul>
        </div>
        <div class="blog-share">
            <span>Share:</span>
            <div class="social-links">
                <a href="https://www.facebook.com/sharer.php?u={{route('post-details',$post->id)}}" class="facebook-btn">
                    <i class="fa fa-facebook"></i>
                </a>
                <a href="https://twitter.com/share?url={{route('post-details',$post->id)}}&text={{$post->title}}" class="twitter-btn">
                    <i class="fa fa-twitter"></i>
                </a>
                <a href="https://plus.google.com/share?url={{route('post-details',$post->id)}}" class="googleplus-btn">
                    <i class="fa fa-google-plus"></i>
                </a>
                <a href="https://pinterest.com/pin/create/bookmarklet/?media={{$post->photo}}&url={{route('post-details',$post->id)}}&description={{$post->title}}" class="pinterest-btn">
                    <i class="fa fa-pinterest"></i>
                </a>
                <a href="https://wa.me/?text={{$post->title}} {{route('post-details',$post->id)}}" class="whatsapp-btn">
                    <i class="fa fa-whatsapp"></i>
                </a>

            </div>
        </div>
    </div>
    <div class="blog-post">
        <div class="row">
            <div class="col-lg-5 col-md-6">

              @if(isset($previous))
              @foreach($prev as $prev)
                <a href="{{ URL::to('post-details/'.$prev->id )}}" data-href="{{ URL::to('post-details/'.$previous )}}" class="prev-blog">

                    <div class="pb-pic">
                        <i class="ti-arrow-left"></i>

                        <img src="/images-uploaded/blog/{{$prev->photo}}" alt="{{$prev->title}}">
                    </div>
                    <div class="pb-text">
                        <span>Previous Post:</span>
                        <h5>{{$prev->title}}</h5>
                    </div>

                </a>
                @endforeach
               @endif
            </div>
            <div class="col-lg-5 offset-lg-2 col-md-6">
            @if(isset($next))

              @foreach($nex as $nex)
                <a href="{{ URL::to( 'post-details/'.$nex->id )}}"  data-href="{{ URL::to('post-details/'.$next )}}" class="next-blog">

                    <div class="nb-pic">
                        <img src="/images-uploaded/blog/{{$nex->photo}}" alt="{{$nex->title}}">
                        <i class="ti-arrow-right"></i>
                    </div>
                    <div class="nb-text">
                        <span>Next Post:</span>
                        <h5>{{$nex->title}}</h5>
                    </div>

                </a>
                @endforeach
                @endif

            </div>
        </div>
    </div>
    <div class="posted-by">
        <div class="pb-pic">
            <img src="{{asset('assets/img/blog/post-by.png')}}" alt="">
        </div>
        <div class="pb-text">
            <a href="#">
                <h5>Shane Lynch</h5>
            </a>
            <p>Aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate
                velit esse cillum bore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud
                amodo</p>
        </div>
    </div>
    <div class="leave-comment">
        <h4>Leave A Comment</h4>
        <form action="#" class="comment-form">
            <div class="row">
                <div class="col-lg-6">
                    <input type="text" placeholder="Name">
                </div>
                <div class="col-lg-6">
                    <input type="text" placeholder="Email">
                </div>
                <div class="col-lg-12">
                    <textarea placeholder="Messages"></textarea>
                    <button type="submit" class="site-btn">Send message</button>
                </div>
            </div>
        </form>
    </div>
</div>
</div>
</div>
</div>
</section>
<!-- Blog Details Section End -->


@endsection

