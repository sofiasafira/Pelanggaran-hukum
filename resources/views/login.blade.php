@extends('layout.layadmin')

@section('containeradmin')
<div class="row justify-content-center" >
  <div class="col-md-4">
  <main class="form-signin w-100 m-auto">
 
    <form action="/login" method="POST">
      @csrf
<!--     <img class="mb-4" src="../assets/brand/bootstrap-logo.svg" alt="" width="72" height="57">
 -->    <h1 class="h3 mb-3 fw-normal block justify-content-center">Please Login</h1>

    <div class="form-floating">
      <input type="text" class="form-control @error('username') is-invalid @enderror" id="username" name="username" placeholder="Username" required value="{{ old('username') }}">
      <label for="username">Username</label>
      @error('username')
        <div class="invalid-feedback">
          {{ $message }}
        </div>
      @enderror
    </div>
    <div class="form-floating">
      <input type="password" name="password" class="form-control @error('password') is-invalid @enderror" id="password" placeholder="Password">
      <label for="password">Password</label>
      @error('password')
      <div class="invalid-feedback">
        {{ $message }}
      </div>
      @enderror
    </div>
    <button class="w-100 btn btn-lg btn-primary" type="submit">Sign in</button>
  </form>
</main>
  </div>
</div>

@endsection