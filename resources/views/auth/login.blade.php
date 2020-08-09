@extends('layouts.app2')

@section('content')
<div class="page-content d-flex align-items-center justify-content-center">

  <div class="row w-100 mx-0 auth-page">
    <div class="col-md-8 col-xl-6 mx-auto">
      <div class="card">
        <div class="row">
          <div class="col-md-4 pr-md-0">
            <div class="auth-left-wrapper" style="background-image: url({{ url('https://htmlcolors.com/gradients-images/53-light-purple-gradient.jpg') }})">

            </div>
          </div>
          <div class="col-md-8 pl-md-0">
            <div class="auth-form-wrapper px-4 pt-5 pb-3">
              <a href="#" class="noble-ui-logo d-block mb-2">Dinas Lingkungan Hidup <span>1.0</span></a>
              <h5 class="text-muted font-weight-normal mb-4">Selamat datang! Masuk ke akun Anda.</h5>
              <form class="forms-sample" method="POST" action="{{ route('login') }}">
                @csrf

                <div class="form-group">
                  <label for="exampleInputEmail1">Alamat email</label>
                  <input type="email" name="email" class="form-control" id="exampleInputEmail1" placeholder="Email" value="{{ old('email', 'admin@gmail.com') }}">
                  @if ($errors->has('email'))
                    <div id="email-error" class="error text-danger pt-1" for="email" style="display: block;">
                      <strong>{{ $errors->first('email') }}</strong>
                    </div>
                  @endif
                </div>
                <div class="form-group">
                  <label for="exampleInputPassword1">Kata sandi</label>
                  <input type="password" name="password" class="form-control" id="exampleInputPassword1" autocomplete="current-password" placeholder="Password" value="{{ !$errors->has('password') ? "12345678" : "" }}" >
                  @if ($errors->has('password'))
                    <div id="password-error" class="error text-danger pl-3" for="password" style="display: block;">
                      <strong>{{ $errors->first('password') }}</strong>
                    </div>
                  @endif
                </div>
                <div class="mt-3">
                  <button type="submit" class="btn btn-primary mr-2 mb-3 mb-md-3">Masuk</button>
                </div>
                <div class="mt-3">
                 Bukan pengguna?<a href="{{ url('/register') }}"> Daftar</a> 
                </div>
                <div class="mt-3">
                  Pengaduan?<a href="{{ url('/pengaduan/create') }}"> Disini</a> 
                 </div>
                
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

</div>
@endsection