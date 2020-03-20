@extends('layouts.forum')
@section('title')
{{$mypost->title}}
@endsection

@section('styles')
<link href="https://fonts.googleapis.com/css?family=Open+Sans|Raleway:300&display=swap" rel="stylesheet">
<style>
.myLogo
{
  width:10%;
  height:40%;
  border-radius: 50%;
  display:block;
}

.toggle
{
  position: relative;
  padding:10px 2px 10px 5px;
  box-shadow:-8px -5px 10px;
}
.toggle h2
{
  font-family: 'Open Sans', sans-serif;
  font-size: 20px;
}
.toggle h1
{
  font-family: 'Raleway', sans-serif;
  font-size: 24px;
}
textarea:hover{
  box-shadow: -8px -5px 10px;
}
</style>
@endsection

@section('mysection')


<div class="toggle" v-if="!editEvent">
  <img src="/avatars/{{$mypost->user->profile_image}}" class="myLogo">
  {{$mypost->user->email}}
  <h1>{{$mypost->title}}</h1>
  <h2>{{$mypost->body}}</h2>
  views:{{$mypost->views}} | @{{views}}
  <input type="hidden" value="{{$mypost->views}}" v-model="views">
  <br />

@auth
@if ($mypost->user->id===auth::user()->id)

<div class="tools" style="position:absolute;top:2px;right:5px;">
  <a href="#" @click="editEvent=true"><i class="far fa-edit"></i></a> |
  <a href="/deletedata/{{$mypost->id}}"><i class="far fa-trash-alt"></i></a>
</div>
@endif
@endauth
    <span class="badge badge-info">Posted on : {{$mypost->created_at}}</span>
    <br />
      @foreach ($mypost->category as $index)
      <span class="badge badge-success">
      {{$index->category}}
      </span>
      @endforeach
</div>

<div class="toggle animated bounceIn" :class="animatedClass" v-if="editEvent">
  <span style="position:absolute;top:-2px;right:2px;" @click="animateOut()"><i class="fas fa-window-close"></i></span>

<span> Edit your blog </span>

  <form action = "/updatedata" method="post">
      @csrf
      <input type="hidden" name="blogId" value="{{$mypost->id}}">
      Title <br />
      <input type='text' name="title" class="form-control form-control-lg" style="width:60%;" value="{{$mypost->title}}" required>
      Body <br />
      <textarea name="message" class="form-control" rows="4"> {{$mypost->body}}</textarea>
      <br />
      <span v-for="i in categoryArray">
          <input type="hidden" :value="i" name="category[]">
      </span>
      <div class="select is-primary is-multiple">
      <select name="" form="postform" multiple="true" v-model="categoryArray" required>

          <option hidden>Choose category..</option>
          @foreach ($mycategory as $index)
          <option value="{{$index->id}}">{{$index->category}}</option>
          @endforeach
      </select>
      <br />
      <input type = 'submit' value = "Update" class="btn btn-primary">
  </form>
</div>
</div>


@auth
<div class="comment">
  <form method="post" action="/postcomment" v-if="!editEvent">
  @csrf <br />
    <input type="hidden" value="{{auth::user()->id}}" name="user_id">
    <input type="hidden" value="{{$mypost->id}}" name="post_id">
    <textarea class="form-control" placeholder="write a comment..." rows="3" name="comment"></textarea>
    <input type="submit" class="btn btn-info pull-right btn-md" value="post comment!" style="margin-top:2px;">
  </form>
</div>

@else
<br />
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
<script>
if(Session::has('msg'))
{
  toastr.success('{{ session()->get( 'msg' ) }}');
}
</script>
<script>

let myObj=new Vue({
  el: '.mycontainer',
  data: {
    replyEvent: false,
    editEvent: false,
    mydata:'hello',
    animatedClass:'bounceIn',
    categoryArray:[],
    views:{{$mypost->views}}
  },
  methods:{
    animateOut(){
      this.animatedClass='bounceOut';
      setTimeout(()=>{
        this.editEvent=false;
        this.animatedClass='bounceIn';
      }, 700);
    }

    // viewCounter(){
    //   ++this.views;
    //     axios.put('api/login',{
    //       views: this.views
    //     })
    //     .then(
    //       (response)=>{
    //         console.log(response);
    //         console.log(response.data);
    //
    //         this.token=response.data.success.token;
    //         this.flag.tokenEvent=true;
    //       },
    //       (error)=>{
    //         console.log(error);
    //         console.log('failed');
    //       });
    //
    //

  },

    mounted() {
      // this.viewCounter();

      // this.viewCounter();
    }

});
// ++myObj.views;
</script>
@endsection
