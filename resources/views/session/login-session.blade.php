@extends('layouts.user_type.guest')

@section('content')

<main class="main-content mt-0" style="background-image: url('../assets/img/OMAL.jpg'); background-size: cover; background-position: center; min-height: 100vh;">
  <section class="d-flex align-items-center justify-content-center" style="min-height: 100vh;">
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-xl-4 col-lg-5 col-md-6 d-flex flex-column">
          <div class="card card-plain bg-white bg-opacity-75 mt-8">
            <div class="card-header pb-0 text-left bg-transparent">
              <h3 class="font-weight-bolder text-info text-gradient">Welcome back</h3>
            </div>
            <div class="card-body">
              <form role="form" method="POST" action="/session">
                @csrf
                <label for="email">Email</label>
                <div class="mb-3">
                  <input type="email" class="form-control" name="email" id="email" placeholder="Email" aria-label="Email" aria-describedby="email-addon">
                  @error('email')
                    <p class="text-danger text-xs mt-2">{{ $message }}</p>
                  @enderror
                </div>
                <label for="password">Password</label>
                <div class="mb-3">
                  <input type="password" class="form-control" name="password" id="password" placeholder="Password" aria-label="Password" aria-describedby="password-addon">
                  @error('password')
                    <p class="text-danger text-xs mt-2">{{ $message }}</p>
                  @enderror
                </div>
                <div class="form-check form-switch">
                  <input class="form-check-input" type="checkbox" id="rememberMe">
                  <label class="form-check-label" for="rememberMe">Remember me</label>
                </div>
                <div class="text-center">
                  <button type="submit" class="btn bg-gradient-info w-100 mt-4 mb-0">Sign in</button>
                </div>
              </form>
            </div>
            <div class="card-footer text-center pt-0 px-lg-2 px-1">
              <small class="text-muted">Forgot your password? Reset your password 
                <a href="/login/forgot-password" class="text-info text-gradient font-weight-bold">here</a>.
              </small>
              <p class="mb-4 text-sm mx-auto">
                Don't have an account? 
                <a href="register" class="text-info text-gradient font-weight-bold">Sign up</a>.
              </p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
</main>

@endsection