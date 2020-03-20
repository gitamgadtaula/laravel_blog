@extends('layouts.bulma')
@section('styles')

@endsection
@section('body')
<div class="container" style="padding-top: 10px;" >

  <div class="mydiv">
    <span v-if="!flag.tokenEvent">
      <h1 class="subtitle is-1" color="white"> Login </h1>

      <div class="columns is-vcentered">
        <div class="column is-half" >
          <input type="text" v-model="email" class="input is-primary" placeholder="email"> </div></div>
      <div class="columns is-vcentered">
        <div class="column is-half"><input type="password" v-model="password" class="input" placeholder="password"> </div></div>
          <div class="columns is-vcentered">
        <div class="column is-half"><button @click="login()" class="button is-warning">Login </button>
        <a href="/apiregister" class="button is-success">Register</a> </div>
      </div>
</span>
<span v-if="flag.tokenEvent" class="animated shake">
  <h1 class="subtitle is-3"> Email: @{{email}}</h1>
  Copy your Api token : <i class="fas fa-clipboard-check"><i class="fab fa-angellist"></i></i> <br />
<input :value="token" class="input is-primary is-large"> 


</span>

  </div>
</div>
<hr>

@endsection


@push('script')
<script>
@if(Session::has('msg'))
  toastr.info('{{ session()->get( 'msg' ) }}');
@endif



const options={
  headers:{
    'X-Requested-With': 'XMLHttpRequest'
  }
};
new Vue({
  el:'.container',
  data(){
    return{
      flag:
        {
          tokenEvent:false
        },

      email:'',
      password:'',
      msg:undefined,
      myclass: 'is-primary',
      token:''
    }
  },
  methods: {
    login(){
      axios.post('api/login',{
        email: this.email,
        password: this.password,

      })
      .then(
        (response)=>{
          console.log(response);
          console.log(response.data);
          this.msg="successfull, Your token is genereated ";
          this.token=response.data.success.token;
          this.flag.tokenEvent=true;
        },
        (error)=>{
          console.log(error);
          console.log('failed');
        });
    }
  }
});
</script>
@endpush
