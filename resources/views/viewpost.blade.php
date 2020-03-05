@extends('layouts.forum')
@section('title')
{{$mypost->title}}
@stop

@section('mysection')

<br />
<font color="red">{{ session()->get( 'msg' ) }}</font><br />

<div class="toggle" v-if="!editEvent">
  <h2 class="mb-4">{{$mypost->title}}</h2>
  <p>{{$mypost->body}}</p>


@auth
@if ($mypost->user->id ===auth::user()->id)

  <div class="tools" style="position:absolute;top:140px;right:100px;">
    <div class="dropdown show">
      <a class="btn btn-secondary btn-md dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        Action
      </a>

    <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
      <a class="dropdown-item" href="#" @click="editEvent=true">Edit <i class="far fa-edit"></i></a>
      <a class="dropdown-item" href="/deletedata/{{$mypost->id}}">Delete <i class="far fa-trash-alt"></i></a>
    </div>

  </div>
 </div>
@endif
@endauth
    <span class="badge badge-info">Posted on : {{$mypost->created_at}}</span>
    <span class="badge badge-danger">Author :- {{$mypost->user->name}}</span>
</div>

<div class="toggle" v-if="editEvent" style="position:relative;">
<div style="background-color:#eee;padding:8px;box-shadow: 10px 10px 46px -13px rgba(0,0,0,0.75);">
<span> Edit your blog </span>
  <form action = "/updatedata" method="post">
      @csrf


      <input type="hidden" name="blogId" value="{{$mypost->id}}">
      Title <br />
      <input type='text' name="title" class="form-control form-control-lg" style="width:60%;" value="{{$mypost->title}}" required>
      Body <br />
      <textarea name="message" class="form-control" rows="4"> {{$mypost->body}}</textarea>
      <br />
      <input type = 'submit' value = "Update" class="btn btn-primary">
  </form>
</div>
<span style="position:absolute;top:2px;right:2px;" @click="editEvent=false"><i class="fas fa-window-close"></i></span>
</div>

@auth
  <form method="post" action="/postcomment">
  @csrf <br />
    <input type="hidden" value="{{auth::user()->id}}" name="user_id">
    <input type="hidden" value="{{$mypost->id}}" name="post_id">
    <textarea class="form-control" placeholder="write a comment..." rows="3" name="comment"></textarea>
    <input type="submit" class="btn btn-info pull-right btn-md" value="post comment!" style="margin-top:2px;">
  </form>

@else
Please <a href="/login"> login </a> to leave your thoughts.. <hr>
@endauth

@foreach ($mypost->comment as $item)
<img src="https://bootdey.com/img/Content/user_1.jpg" width="60" style="border-radius:50%;">
  <font color="green">{{$item->user->name}}</font>
    <p>{{$item->comment}},  [{{$item->id}}]</p>

      <div style="margin-left:100px;">


            @foreach ($item->reply as $i)
              <i>  '{{$i->reply}}' </i>
                :- <font color="green">{{$i->user->name}}</font><br />
              @endforeach

            <br>
            @auth
            <span @click="replyEvent=true">Reply</span>
              <form method="post" action="/postreply/" v-if="replyEvent">
                  @csrf
                  <input type="text" style="background-color:inherit;border:none;border-bottom: 1px solid black; margin-left:20px;width:30%;" name="reply">
                  <input type="hidden" name="comment_id" value="{{$item->id}}">
                  <input type="hidden" name="blog_id" value="{{$mypost->id}}">
                  <input type="hidden" name="user_id" value="{{auth::user()->id}}">
              </form>
              @endauth
          </div>
@endforeach
@stop

@section('script')
<script src="https://cdn.jsdelivr.net/npm/vue/dist/vue.js"></script>
<script>

new Vue({
  el: '.mycontainer',
  data: {
    replyEvent: false,
    editEvent: false,
    mydata:'hello'
  }
});
</script>
@endsection
