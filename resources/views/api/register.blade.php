@extends('layouts.bulma')
@section('body')
<div class="container" style="padding-top:10px;padding-bottom:10px;">

<div class="mydiv">
  <span v-if="!flag.tokenEvent">
  <h1 class="subtitle is-3"> Register an User for api </h1>

  <div class="columns">
    <div class="column is-half">
      <input type="text" v-model="username" class="input is-primary" placeholder="Fullname"></div>

      <div class="column is-half">
        <input type="text" v-model="email" class="input is-primary" placeholder="email"> </div>
      </div>
      <div class="columns">
        <div class="column is-half">
          <input type="password" v-model="password" class="input" :class="myclass" placeholder="password"> </div>
            <div class="column is-half"><input type="password" v-model="c_password" class="input" :class="myclass" placeholder="verify password">
            </div></div>
  <div class="field"><button @click="verify()" class="button is-warning">Register </button>
    <a href="/apilogin" class="button is-success">Login</a> </div>
</span>

Username: @{{username}} <br /> Email: @{{email}}<hr>
<span v-if="flag.tokenEvent" class="animated zoom">
<a :href="tokenUrl"> Click here to activate the token </a>
@{{msg}}
</span>

</div>
</div>


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
      username:'',
      email:'',
      password:'',
      c_password:'',
      msg:undefined,
      myclass: 'is-primary',
      tokenUrl:''
    }
  },
  methods: {
    verify(){
      if(this.password!=this.c_password){
        this.msg= 'password did not match';
        this.myclass= 'is-danger animated shake';
    }
    else if(this.password.length>2){
      this.myclass="is-success animated fadeIn";
      this.register();
    }
  },
    register(){
      axios.post('api/register',{
        name: this.username,
        email: this.email,
        password: this.password,
        c_password: this.c_password
      })
      .then(
        (response)=>{
          console.log(response);
          console.log(response.data.token);
          this.msg="successfull, your token is " + response.data.token;
          this.tokenUrl="api/activate/"+response.data.token;
          this.flag.tokenEvent=true;
        },
        (error)=>{
          console.log(error);
          console.log('failed');
        });
    }
  },
  mounted(){
    this.verify();
  }
});
</script>
@endpush
