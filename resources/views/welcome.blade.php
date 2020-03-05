@extends('layouts.forum')

@section('mysection')


<h1> Welcome</h1>

            @auth
                <a href="{{ route('logout') }}"
                   onclick="event.preventDefault();
                                 document.getElementById('logout-form').submit();">
                    {{ __('Logout') }}
                </a>

                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                  @csrf
                </form>
            @endauth
            @guest<a href="{{route('login')}}">login</a>@endguest


    @guest<a href="{{route('register')}}">register</a>@endguest   @auth {{auth::user()->name}}@endauth


@endsection
