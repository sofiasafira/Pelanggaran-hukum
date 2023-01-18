@extends('layout.layadmin')

@section('containeradmin')
<div class="row justify-content-center" >
  <div class="col-md-4">
  <main class="form-signin w-100 m-auto">
 
    <form>
<!--     <img class="mb-4" src="../assets/brand/bootstrap-logo.svg" alt="" width="72" height="57">
 -->    <h1 class="h3 mb-3 fw-normal">Please Login</h1>

    <div class="form-floating">
      <input type="email" class="form-control" id="floatingInput" placeholder="name@example.com">
      <label for="floatingInput">Username</label>
    </div>
    <div class="form-floating">
      <input type="password" class="form-control" id="floatingPassword" placeholder="Password">
      <label for="floatingPassword">Password</label>
    </div>
    <button class="w-100 btn btn-lg btn-primary" type="submit">Sign in</button>
  </form>
</main>
  </div>
</div>

@endsection