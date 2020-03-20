@extends('layouts.bulma')

@section('body')
@auth
@section('styles')
<style>
img {
  width:5%;
  height:5%;
  border-radius: 50%;

}
</style>
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
  endif
</script>
@endpush
