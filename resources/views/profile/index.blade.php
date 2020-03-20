<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
    <style>
    body{
      padding:5px;
      background-color: purple;
    }

    .container{
      display:flex;

    }
    .nav_left{
      display: flex;
      flex-direction: row;
      background-color: white;
    }
    .nav_right{
      display:flex;
      flex-direction: row-reverse;
      background-color: red;

    }
    </style>
  </head>
  <body>
    <div class="container">
      <div class="nav_left">
        <div> hello </div>
        <div> whats up</div>
      </div>

      <div class="nav_right">
        <div> right</div>
        <div> right</div>
      </div>

    </div>



  </body>
</html>

{{--
@section('something')
  @auth
  <h1> Hello</h1>
  {{ Auth::user()->email }}
  <h2> {{$user->name}} </h2>
  <img src="avatars/{{$user->profile_image}}" class="logo"><hr>
  <form method="post" action="uploadimage" enctype="multipart/form-data">
    @csrf
    <input type="file" value="click to upload" name="profile_image" class="form-control"><br />
    <input type="submit" value="submit" class="form-control">
  </form>
  @endauth

  @guest

  <a href="{{route('login')}}"> Please log in </a>
  @endguest

  @endsection
  @push('script')
  <script>
    if(Session::has('msg'))
      toastr.info('{{ session()->get( 'msg' ) }}');
  </script>
  @endpush
--}}
