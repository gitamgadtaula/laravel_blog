@extends('layouts.custom')
@section('mysection')
<div class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1 class="m-0 text-dark">Welcome to Dashboard</h1>
      </div><!-- /.col -->
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item">@auth

            <a class="" href="{{ route('logout') }}"
               onclick="event.preventDefault();
                             document.getElementById('logout-form').submit();">
                {{ __('Logout') }}
            </a>

            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
              @csrf logout
            </form>
          @else
          <a href="login">Sign In</a</li>@endauth
          <li class="breadcrumb-item active">Dashboard v1</li>
        </ol>
      </div><!-- /.col -->
    </div><!-- /.row -->
  </div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->


<!-- Main content -->

<section class="content">
  <div class="container-fluid">
    <!-- Small boxes (Stat box) -->
    <div class="row">
      <div class="col-lg-3 col-6">
        <!-- small box -->
        <div class="small-box bg-info">
          <div class="inner">
            <h3>@auth {{auth::user()->name}} @else Hey guest! @endauth</h3>

            <p>@auth{{auth::user()->email}}@else Please sign in @endauth</p>
          </div>
          <div class="icon">
            <i class="ion ion-bag"></i>
          </div>
          @auth
          <a href="logout" class="small-box-footer" onclick="event.preventDefault();
                        document.getElementById('logout-form').submit();">Logout
          @else
          <a href="{{route('login')}}" class="small-box-footer">Login
          @endauth
             <i class="fas fa-arrow-circle-right"></i></a>
             <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
               @csrf logout
             </form>


      </div>
      <!-- ./col -->
    </div>
    <div class="col-lg-3 col-6">
      <!-- small box -->
      <div class="small-box bg-success">
        <div class="inner">
          <h3>{{$mypost->count()}}
            {{--<sup style="font-size: 20px">total</sup>--}}</h3>

          <p>View blogs</p>
        </div>
        <div class="icon">
          <i class="ion ion-stats-bars"></i>
        </div>
        <a href="/blog" class="small-box-footer">Open blog <i class="fas fa-arrow-circle-right"></i></a>
      </div>
    </div>
    <!-- ./col -->
    <div class="col-lg-3 col-6">
      <!-- small box -->
      <div class="small-box bg-warning">
        <div class="inner">

          <h3>{{$myuser->count()}}</h3>

          <p>User Registrations</p>
        </div>
        <div class="icon">
          <i class="ion ion-person-add"></i>
        </div>
        <a href="#" class="small-box-footer">Manage users <i class="fas fa-arrow-circle-right"></i></a>
      </div>
    </div>
    <!-- ./col -->
    <div class="col-lg-3 col-6">
      <!-- small box -->
      <div class="small-box bg-danger">
        <div class="inner">
          <h3>{{$mycategory->count()}}</h3>

          <p>Categories</p>
        </div>
        <div class="icon">
          <i class="ion ion-pie-graph"></i>
        </div>
        <a href="#" class="small-box-footer" @click="addCategory=true">Add category <i class="fas fa-arrow-circle-right"></i></a>
      </div>
    </div>
    <!-- ./col -->
  </div>

<font color="red">{{ session()->get( 'msg' ) }}</font><br />
<div class="addcategory" v-if="addCategory">
  <form action = "/addcategory" method="post">
      @csrf
      <label for="inputcategory" class="sr-only">Enter category</label>
      <input type="text" class="form-control input-sm" name="category" placeholder="Enter your category">

    <button type="submit" class="btn btn-primary mb-2">Submit</button>
    </div>
  </form>
<span v-if="!showCategory" @click="showCategory=true">Show Categories </span>
<span v-if="showCategory" class="animated fadeInDownBig slower">
My categories :-

<form>
  <select>
    @foreach ($mycategory as $index)
      <option>  {{$index->category}} </option>
    @endforeach
</select>
</form>
</span>
</section>
@endsection

@section('myscript')
<script src="https://cdn.jsdelivr.net/npm/vue/dist/vue.js"></script>
<script>
new Vue({
  el:'.content-wrapper',
  data(){
    return{
      addCategory:false,
      showCategory:false
      }
  }
});
</script>
@endsection
