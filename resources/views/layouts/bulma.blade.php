<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
    @yield('stylesheet')
    <script src="{{ asset('js/app.js') }}"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.7.2/animate.css">
    <link rel="stylesheet" href="{{asset('css/app.css')}}">
    <link href="{{ asset('css/toastr.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://kit.fontawesome.com/991c42112a.js" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
    <style>

    .mydiv{

      margin-left:auto;
      margin-right:auto;
      display:block;
      width:50%;

      padding:40px;
      box-shadow: -1px -1px 5px 0px rgba(50, 50, 50, 0.75);
      border-top-right-radius: 22%;
      border-bottom-left-radius: 22%;

    }
    </style>

    @yield('styles')
  </head>
  <body style="background-color:#e6e2d3">
    @yield('body')
  </body>

</html>
  @stack('script')
