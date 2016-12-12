@section('content')

<div id="app">@{{ message }}</div>

<script type="text/javascript"
	src="https://cdnjs.cloudflare.com/ajax/libs/vue/1.0.27/vue.js"></script>
<script>
new Vue({
  el: '#app',
  data: {
    message: 'Hello Vue.js!'
  }
});
</script>