<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\PostRequest;
use App\Http\Requests\TitleRequest;
use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Title;
class PostController extends Controller
{
    public function add_post(){
        $blog_cat=Title::get();
        return view('admin.blog.add-post',compact('blog_cat'));
    }
    public function store_post(PostRequest $request){

        $ext=$request->photo->getClientOriginalExtension();
        $file_name=time().'.'.$ext;
        $path='images-uploaded\blog';
        $request->photo->move($path,$file_name);

        Post::create([
            'title_id'=>$request->category,
            'title'=>$request->header,
            'post_body'=>$request->post_body,
            'photo'=>$file_name
        ]);

         $request->session()->flash('success','Data Saved Successfully');
         return redirect()->route('admin.addpost');


    }
    public function manage_post(){
        $post=Post::get();
        return view('admin.blog.manage-post',compact('post'));
    }
    public function edit_post($id){
        $all_titles=Title::get();
        $post=Post::find($id);
        $arr=array('post'=>$post);
        return view('admin.blog.edit-post',$arr,compact('all_titles'));
    }
    public function update_post($id,Request $request){
        $p=Post::find($id);


        if(isset($request->photo)){
            if($p->photo !=Null){
                unlink("images-uploaded/blog/$p->photo");

            }

            $ext=$request->photo->getClientOriginalExtension();
            $file_name=time().'.'.$ext;
            $path='images-uploaded/blog';
            $request->photo->move($path,$file_name);
            $p->photo= $file_name;
   }

   else{
    $p->photo= $p->photo;
   }

        $p->title=$request->header;
        $p->post_body=$request->post_body;
        $p->title_id=$request->blogcat;
        $p->save();
        $request->session()->flash('success','Data Saved Successfully');
        return redirect()->back();

    }

public function delete_post($id){
    $row=Post::find($id);
    $row->delete();
    unlink("images-uploaded/blog/$row->photo")
    ;
    return redirect()->back()->with('failed','Post deleted successfully');
}

//add blog category
public function blog_category(){

    return view('admin.blog.add-newblog-category');
}

public function add_blog_category(TitleRequest $request){
     Title::create(['name'=>$request->name
     ]);
     $request->session()->flash('success','Category Saved Successfully');
     return redirect()->route('admin.blogcategory');


}




}
