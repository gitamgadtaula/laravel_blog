@extends('layouts.forum')

@section('mysection')


<div class="container">
    <div class="row">
      <div class="col-lg-10 col-xl-9 mx-auto">
        <div class="card card-signin flex-row my-5">
          <div class="card-img-left d-none d-md-flex">

          </div>
          <div class="card-body">
            <h5 class="card-title text-center">login</h5>
            <form class="form-signin" action="{{ route('login') }}" method="post">

              <div class="form-label-group">
                @csrf

                <input id="email" placeholder="Enter email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror

              </div>


              <hr>

              <div class="form-label-group">
                <input id="password" placeholder="Enter password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
                @error('password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror

              </div>



              <button class="btn btn-lg btn-primary btn-block text-uppercase" type="submit">Sign in</button>
              @if (Route::has('password.request'))
                  <a class="btn btn-link" href="{{ route('password.request') }}">
                      {{ __('Forgot Your Password?') }}
                  </a>
              @endif
              <a class="d-block text-center mt-2 small" href="{{route('register')}}">Register</a>

          </div>
        </div>
      </div>
    </div>
  </div>

@endsection
