<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use App\Models\Vendor;
use App\Models\Post;
use App\Models\Title;
use Illuminate\Http\Request;


class SiteController extends Controller
{
    public function index()
    {

        $p = Product::take(3)->orderBy('created_at', 'DESC')->get();
        $products=Product::get();
        $category=Category::get();
        return view('frontend.index', compact('p','products','category'));
    }
    //show categories in shop
    public function shop()
    {
        $category = Category::get();
        $vendor = Vendor::get();
        $product = Product::with('categories')->get();

        return view('frontend.shop', compact('vendor', 'product', 'category'));
    }



    public function shopping_cart()
    {
        return view('frontend.shopping-cart');
    }
    public function register()
    {
        return view('frontend.register');
    }
    public function product()
    {
        return view('frontend.product');
    }
    public function login()
    {
        return view('frontend.login');
    }
    public function signup()
    {
        return view('frontend.register');
    }
    public function faq()
    {
        return view('frontend.faq');
    }
    public function contact()
    {
        return view('frontend.contact');
    }
    public function check_out()
    {

        return view('frontend.check-out');
    }


    //Show products by dropdown list
    public function show_products(Request $request)
    {
        $id = $request->id;
        $products  = Product::where('category_id', $id)->get();

        $id = $request->id;
        $product = Product::where('category_id', $id)->get();


        ?>

            <div class="container ">
                <div class=" row my-5">
                    <?php foreach ($product as $p) { ?>
                        <div class="col-lg-4 col-md-6 col-12 d-flex mb-3 mx-auto">
                            <div class="card img-cd  h-auto text-center" style="width:18rem;">

                                <img src="/images-uploaded/products/<?= $p->photo ?>" class="card-img-top img-fluid  " alt="<?= $p->name ?>">

                                <div class="card-body">
                                    <a href="<?= route('show-details', $p->id) ?>" class="btn btn-lg btn-warning " name="button">View</a>
                                    <p class="card-text my-2">
                                        <a href="#" style="color:black;">
                                            <i class="icon_heart_alt" onclick="favourite()"></i>
                                        </a>
                                        <a href="#" style="color:black;">
                                            <i class="icon_bag_alt " onclick="favourite()"></i>
                                        </a>
                                        Price <?= "$" . $p->price ?>
                                    </p>
                                </div>
                            </div>
                        </div>
                    <?php  } ?>

                </div>
            </div>
<?php

    }
    //show details of product
    public function show_details($id)
    {
        $product = Product::find($id);

        return view('frontend.product-details', compact('product'));
    }
    //show blog page
    public function blog(){
        $posts=Post::get();
        $t=Title::get();

        $recent_post=Post::take(3)->orderBy('created_at', 'DESC')->get();
        return view('frontend.blog-post.blog',compact('t','posts','recent_post'));
    }
    //Search blog

    public function blog_search(Request $request){
        $data='%'.$request->k.'%';
        $blog=Post::where('title','like',$data)->get();
        if(isset($blog) && $blog->count()>0){
            ?>


                <div class="row">
                <?php foreach($blog as $blog){ ?>
                <div class="col-lg-6 col-sm-6">
                <div class="blog-item">
                    <div class="bi-pic">
                        <img src="/images-uploaded/blog/<?= $blog->photo ?>" alt="<?= $blog->title ?>">
                    </div>
                    <div class="bi-text">
                        <a href="<?= route('post-details',$blog->id) ?>">
                            <h4><?= $blog->title ?></h4>
                        </a>
                        <p><?= $blog->titles->name ?> <span><?= substr( $blog->created_at,10) ?></span></p>
                    </div>
                </div>
                </div>
            <?php } ?>


<?php
        }
        else{
            ?>
            <div class="bi-text">

                            <h4 class="text-center">No Result</h4>


                    </div>

         <?php }?>
        </div>


        <?php
    }

    public function post_details($id){
        $post=Post::find($id);
        $arr=array('post'=>$post);
        $all_titles=Title::get();

        $previous=Post::where('id','<',$post->id)->orderBy('id','desc')->first();

         $next=Post::where('id','>',$post->id)->orderBy('id')->first();
        $prev= Post::find($previous);
        $nex=Post::find($next);

        return view('frontend.blog-post.blog-details',$arr,compact('all_titles','prev','nex'))->with('previous',$previous)->with('next',$next);

    }

}
