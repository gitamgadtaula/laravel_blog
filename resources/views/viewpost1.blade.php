<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
    <div class="cart">

      <button @click="add()"> Add </button> Items: @{{items}} <button @click="subtract()">Delete</button>
      <input type="text" v-model="mytext">
      {{mytext}}
    </div>
  </body>
</html>
<script src="https://cdn.jsdelivr.net/npm/vue/dist/vue.js"></script>
<script>
new Vue({
  el: '.cart',
  data: {
    items: 0,
    mytext: 'hello'
  },
  methods: {
    add: function()
    {
      ++this.items;
      console.log('added');
    },
    subtract: function()
    {
      if(this.items>0)
      {
      --this.items;
      }
      else
      {
        this.items=0;
      }

    }
  }
});

</script>
