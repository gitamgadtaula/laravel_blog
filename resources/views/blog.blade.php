
@extends('layouts.forum')
@section('styles')
<style>
a{

  color: black;
}
.myCard{
  /* box-shadow: 15px 6px 12px -13px rgba(0,0,0,0.76); */
  box-shadow: 10px 10px 5px -6px rgba(0,0,0,0.75);
  margin-bottom:15px;
  padding: 5px;
  display:block;
  position: relative;
}

.myCard:first-child{
  margin-top:60px;
}

.myCard:hover{
  box-shadow: 15px 6px 23px 0px rgba(0,0,0,0.75);
  border: 8px solid white;
  border-radius: 1%;
  padding-top:20px;
  padding-bottom:20px;

}

.myLogo{
  width:5%;
  height:30%;
  border-radius: 50%;
  /* position: absolute; */
  top:1px;
  left:1px;
}

</style>
@endsection

@section('mysection')
<div class="vuecontainer">



@auth
  <button type="button" class="btn-info btn-lg" style="position:absolute;top:130px;right:50px;" @click="welcome()" v-if="!postEvent">
    Create a new blog <i class="fas fa-pen-nib"></i>
  </button>
  <br />
@endauth

  <div class="animated" :class="animateClass" style="position:relative; background-color:#eee;padding:8px;box-shadow: 10px 10px 46px -13px rgba(0,0,0,0.75);" v-if="postEvent">
  <span> Insert a new blog </span>
    <form action = "/postdata" method="post" id="postform">
        @csrf
        Title <br />
        <input type='text' name='title' class="form-control form-control-lg" style="width:60%;" value="" required>
        Body <br />
        <textarea name="message" class="form-control" value="" rows="4"> </textarea>
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
      </div>

        <br />
        <input type='submit' value="Add post" class="btn btn-primary"> <br />


    </form>
    <span style="position:absolute;top:2px;right:2px;" @click="animate()" class="hvr-grow"> Close</span>
</div>

<br v-if="postEvent">


  @foreach ($mypost as $post)

              <div class="myCard">
                <a href="blog/{{$post->id}}">
                  <img src="avatars/{{$post->user->profile_image}}" class="myLogo">


                  <h2>{{$post->title}}</h2>
                  <p style="color:inherit;">{{$post->body}}</p>
                  <i style="position:absolute;bottom:1px;right:10px;">-{{$post->user->name}}</i>

                  </a>

              </div>
  @endforeach
  <a href="blog/3">3rd block</a>


{{--pagination--}}
{{ $mypost->links() }}
</div>
@endsection


@section('script')
<script>
  if(Session::has('msg'))
  {
    toastr.info('{{ session()->get( 'msg' ) }}');
  }
  if (session('error'))
  {
    toastr.danger('{{ session('error') }}');
  }
</script>

<script>
new Vue({
  el: '.vuecontainer',
  data: {
    postEvent:false,
    blogTitle:'',
    blogBody:'',
    blogId:'',
    buttonclicked:'',
    categoryArray:[],
    isHovering:false,
    animateClass:"zoomInDown"
  },

  methods :{
    welcome(){
      this.postEvent=true;
      this.animateClass="zoomInDown";
    },
    animate(){
      this.animateClass="shake";
      setTimeout(() => this.postEvent= false, 400);
      console.log(this.animateClass);
    },
    getData: function(name,msg,id)
    {
      // console.log('my data is ',data);
      this.blogTitle=name;
      this.blogBody=msg;
      this.blogId=id;
    }
  },
  mounted(){
    console.log("animated class : "+this.animateClass)
  }

});
</script>
@endsection
