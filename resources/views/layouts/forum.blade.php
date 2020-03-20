<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
  	<title>@yield('title')</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.7.2/animate.min.css">
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
		<link rel="stylesheet" href="{{asset('sidebar/css/style.css')}}">
    <link rel="stylesheet" href="{{asset('css/app.css')}}">
    <link href="{{ asset('css/toastr.css') }}" rel="stylesheet">
    <script src="https://kit.fontawesome.com/991c42112a.js" crossorigin="anonymous"></script>
    <script src="{{ asset('js/app.js') }}"></script>
    @yield('styles')
  </head>
  <body>
    <div class="mycontainer" style="position:relative;">
		<div class="wrapper d-flex align-items-stretch">

			<nav id="sidebar">
				<div class="p-4 pt-5">

          {{--<img src="/avatars/{{Auth::user()->profile_image}}" class="img logo rounded-cirlce mb-5" style="border-radius:50%;">
          --}}

	        <ul class="list-unstyled components mb-5">
	          <li class="active">
	            <a href="#homeSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">Home</a>
	            <ul class="collapse list-unstyled" id="homeSubmenu">
                <li>
                    <a href="#">Home 1</a>
                </li>
                <li>
                    <a href="#">Home 2</a>
                </li>
                <li>
                    <a href="#">Home 3</a>
                </li>
	            </ul>
	          </li>
	          <li>
	              <a href="#">About</a>
	          </li>
	          <li>
              <a href="#pageSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">Pages</a>
              <ul class="collapse list-unstyled" id="pageSubmenu">
                <li>
                    <a href="#">Page 1</a>
                </li>
                <li>
                    <a href="#">Page 2</a>
                </li>
                <li>
                    <a href="#">Page 3</a>
                </li>
              </ul>
	          </li>
	          <li>
              <a href="#">Portfolio</a>
	          </li>
	          <li>
              <a href="#">Contact</a>
	          </li>
	        </ul>

	        <div class="footer">
	        <p style="color:green;">	<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
              @auth
              <img src="/avatars/{{auth::user()->profile_image}}" style="height:40%;width:40%;">
              <br />
              {{auth::user()->email}} <br />
                <a class="" href="{{ route('logout') }}"
                   onclick="event.preventDefault();
                                 document.getElementById('logout-form').submit();"> {{ __('Logout') }}</a>

                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                  @csrf
                </form>
              @else
              <a href="/login">Sign In</a></li>
              @endauth
            </p>
            </div>

	      </div>
    	</nav>


        <!-- Page Content  -->
      <div id="content" class="p-4 p-md-5">

        <nav class="navbar navbar-expand-lg navbar-light bg-light">
          <div class="container-fluid">

            <button type="button" id="sidebarCollapse" class="btn btn-primary">
              <i class="fa fa-bars"></i>
              <span class="sr-only">Toggle Menu</span>
            </button>
            <button class="btn btn-dark d-inline-block d-lg-none ml-auto" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <i class="fa fa-bars"></i>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
              <ul class="nav navbar-nav ml-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="/">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/blog">Blog</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/home">Dashboard</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Contact</a>
                </li>
              </ul>
            </div>
          </div>
        </nav>

        @yield('mysection')


      </div>
		</div>
  </div>
</body>
</html>
@yield('script')

<script src="{{asset('sidebar/js/jquery.min.js')}}"></script>
<script src="{{asset('sidebar/js/popper.js')}}"></script>
<script src="{{asset('sidebar/js/bootstrap.min.js')}}"></script>
<script src="{{asset('sidebar/js/main.js')}}"></script>
