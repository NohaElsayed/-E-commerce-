@extends('admin.layout.master')
@section('title','Edit Post')
@section('heading','Edit Post')
@section('content')
<div class="container">
<div class="row">
<div class="col-sm-8 col-12  d-block mx-auto my-auto">
    <div class="card ">
        <h5 class="card-header">Edit Post</h5>
        <div class="card-body">

          <form style="padding: 20px" action="{{route('admin.updatepost',$post->id)}}" method="POST" enctype="multipart/form-data" >
           @csrf

           <div class="form-group ">
            <label >Blog Category</label>
            <select name="blogcat" class="form-control">
                <option>Select Blog Category</option>
              @foreach ($all_titles as $pt)
                  <option value="{{$pt->id}}"
                    @if($post->title_id == $pt->id){
                        selected
                    } @endif >
                    {{Str::ucfirst($pt->name)}}</option>
              @endforeach
            </select>

          </div>

              <div class="form-group ">
                <label for="exampleInputEmail1">Title</label>
                <input type="text"name="header" value="{{$post->header}}" class="form-control"  aria-describedby="emailHelp">

              </div>
              <div class="form-group ">
                <div class="form-floating">
                    <label for="floatingTextarea2">Post</label>
                    <textarea class="form-control" name="post_body" placeholder="Write a post here" id="floatingTextarea2" style="height: 100px">{{$post->post_body}}</textarea>
                </div>
              </div>

              <div class="form-group ">
                  <img src="/images-uploaded/blog/{{$post->photo}}" width="80" height="80" alt="post_pic">
                  <input type="file" name="photo" value="{{$post->photo}}" class=" form-control" id="inputGroupFile01" aria-describedby="inputGroupFileAddon01" >
                </div>

              <button type="submit" name="submit" class="btn btn-primary my-2 px-5">Add</button>
            </form>
      </div>
</div>
</div>
</div>

@endsection
