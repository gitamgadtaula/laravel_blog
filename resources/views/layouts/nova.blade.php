<!DOCTYPE html>
<html>
<title>@yield('title')</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="{{asset('css/custom.css')}}">
@yield('stylesheet')
<style>

body,h1 {
  font-family: "Raleway", Arial, sans-serif;
  background: rgb(52,47,26);
  background: linear-gradient(90deg, rgb(53, 52, 47) 0%, rgb(255, 255, 255) 100%,rgb(57, 200, 230) 100%);
}

h1 {
  letter-spacing: 6px
}

.w3-row-padding img {
  margin-bottom: 12px
}

.login-box{
  font-family: "Raleway", Arial, sans-serif;
  position:absolute;
  top:10px;
  right:10px;
  max-width:25%;
  background-color:##e9e9ea;
  border: 1px solid #fff;
  padding: 10px 20px 10px 20px;
  text-decoration: none;
}

</style>
<body>

<!-- !PAGE CONTENT! -->
<div class="w3-content" style="max-width:1500px">

<!-- Header -->
<header class="w3-panel w3-center w3-opacity" style="padding:128px 16px;margin-bottom:0px;">
  <h1 class="w3-xlarge">@yield('maintitle')</h1>
  <h1>@yield('subtitle')</h1>

  <div class="w3-padding-32">
    <div class="w3-bar w3-border">
      <a href="#" class="w3-bar-item w3-button">Home</a>
      <a href="#" class="w3-bar-item w3-button w3-light-grey">Portfolio</a>
      <a href="#" class="w3-bar-item w3-button">Contact</a>
      <a href="#" class="w3-bar-item w3-button w3-hide-small">Careers</a>
    </div>
  </div>
</header>

<div class="login-box">
  @yield('link1') | @yield('link2')
</div>



<!-- Photo Grid -->
<div class="w3-row-padding w3-grayscale" style="margin-bottom:128px">
  @yield('mysection')
</div>

<!-- End Page Content -->
</div>

<!-- Footer -->
<footer class="w3-container w3-padding-64 w3-light-grey w3-center w3-large">
  <i class="fa fa-facebook-official w3-hover-opacity"></i>
  <i class="fa fa-instagram w3-hover-opacity"></i>
  <i class="fa fa-snapchat w3-hover-opacity"></i>
  <i class="fa fa-pinterest-p w3-hover-opacity"></i>
  <i class="fa fa-twitter w3-hover-opacity"></i>
  <i class="fa fa-linkedin w3-hover-opacity"></i>
  <p>Powered by <a href="https://www.w3schools.com/w3css/default.asp" target="_blank" class="w3-hover-text-green">Rasello</a></p>
</footer>

</body>
</html>
