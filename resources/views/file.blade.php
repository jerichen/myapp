@section('content')

<!--  
<div id="app">@{{ message }}</div>
-->

<div id="container">
    <div class="row">
        <div class="col-md-6 col-md-offset-3">
            <form id="changeRepoForm" @submit.prevent="changeRepo()" class="form-inline">
                <div class="form-group">
                    <label for="fullRepoName">Full Repo Name</label>
                    <input type="text" name="fullRepoName" v-model="fullRepoName" class="form-control">
                </div>
                <input type="submit" class="btn btn-default" value="Get repo filesystem!">
            </form>
            <hr>
            <github-file-explorer :username="username" :repo="repo"></github-file-explorer>
        </div>
    </div>
</div>


<script>
/*
new Vue({
  el: '#app',
  data: {
    message: 'Hello Vue.js!'
  }
});
*/
</script>

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
<link rel="stylesheet" href="{{ URL::asset('vuejs-explorer/css/app.min.css') }}">
<script src="{{ URL::asset('vuejs-explorer/js/app.min.js') }}"></script>

