<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
      <link rel="stylesheet" href="{{asset('css/app.css')}}">
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
  </head>
  <body>
    <div>
      <h1>Blog posts</h1>



      @foreach ($mydata as $post)
      <div class="myCard" style="background-color:#fafa23;">

          <img src="avatars/{{$post->user->profile_image}}" class="myLogo">


          <h2>{{$post->title}}</h2>
          <p style="color:inherit;">{{$post->body}}</p>
          <i> - {{$post->user->name}}| {{$post->user->email}}</i>
          <hr>



      </div>
@endforeach

    </div>


  </body>
</html>
