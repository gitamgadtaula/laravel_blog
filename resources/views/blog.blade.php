
@extends('layouts.forum')
@section('mysection')
<div class="vuecontainer">
  <font color="red">{{ session()->get( 'msg' ) }}</font><br />
@auth
  <button type="button" class="btn-info btn-lg" style="position:absolute;top:130px;right:50px;" @click="postEvent=true" v-if="!postEvent">
    Create a new blog <i class="fas fa-pen-nib"></i>
  </button>
@endauth

  <div style="position:relative; background-color:#eee;padding:8px;box-shadow: 10px 10px 46px -13px rgba(0,0,0,0.75);" v-if="postEvent">
  <span> Insert a new blog </span>
    <form action = "/postdata" method = "post">
        @csrf
        Title <br />
        <input type='text' name='title' class="form-control form-control-lg" style="width:60%;" value="" required>
        Body <br />
        <textarea name="message" class="form-control" value="" rows="4"> </textarea>
        <br />
        <input type = 'submit' value = "Add post" class="btn btn-primary">
    </form>
    <span style="position:absolute;top:2px;right:2px;" @click="postEvent=false"><i class="fas fa-window-close"></i></span>
</div>
<br v-if="postEvent">

<div class="posts">

  @foreach ($mypost as $post)

                  <h3>{{$post->title}}</h3>
                  <p>{{$post->body}}</p>
                  <i>{{$post->user->name}}</i>
                  <a href="blog/{{$post->id}}" class="btn">Link</a>
                  <hr>

  @endforeach
</div>
{{ $mypost->links() }}
@endsection


@section('script')
<script src="https://cdn.jsdelivr.net/npm/vue/dist/vue.js"></script>
<script>
new Vue({
  el: '.vuecontainer',
  data: {
    postEvent:false,
    blogTitle:'',
    blogBody:'',
    blogId:'',
    buttonclicked:''
  },
  methods :{
    getData: function(name,msg,id)
    {
      // console.log('my data is ',data);
      this.blogTitle=name;
      this.blogBody=msg;
      this.blogId=id;
    }
  }

});
</script>
@endsection
