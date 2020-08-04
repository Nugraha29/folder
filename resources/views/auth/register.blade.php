@extends('layouts.app', ['class' => 'off-canvas-sidebar', 'activePage' => 'register', 'titlePage' => __('Daftar')])

@section('content')
<div class="container" style="height: auto;">
  <div class="row align-items-center">
    <div class="col-lg-8 col-md-6 col-sm-8 ml-auto mr-auto">
      <form class="form" method="POST" action="{{ route('register') }}">
        @csrf

        <div class="card card-login card-hidden mb-3">
          <div class="card-header card-header-primary text-center">
            <h4 class="card-title"><strong>{{ __('Daftar') }}</strong></h4>
          </div>
          <div class="card-body ">
            <div class="bmd-form-group{{ $errors->has('name') ? ' has-danger' : '' }}">
              <div class="input-group">
                <div class="input-group-prepend">
                  <span class="input-group-text">
                      <i class="material-icons">face</i>
                  </span>
                </div>
                <input type="text" name="name" class="form-control" placeholder="{{ __('Nama...') }}" value="{{ old('name') }}" required>
              </div>
              @if ($errors->has('name'))
                <div id="name-error" class="error text-danger pl-3" for="name" style="display: block;">
                  <strong>{{ $errors->first('name') }}</strong>
                </div>
              @endif
            </div>
            <div class="bmd-form-group{{ $errors->has('email') ? ' has-danger' : '' }} mt-3">
              <div class="input-group">
                <div class="input-group-prepend">
                  <span class="input-group-text">
                    <i class="material-icons">email</i>
                  </span>
                </div>
                <input type="email" name="email" class="form-control" placeholder="{{ __('Email...') }}" value="{{ old('email') }}" required>
              </div>
              @if ($errors->has('email'))
                <div id="email-error" class="error text-danger pl-3" for="email" style="display: block;">
                  <strong>{{ $errors->first('email') }}</strong>
                </div>
              @endif
            </div>
            <div class="bmd-form-group{{ $errors->has('telp') ? ' has-danger' : '' }} mt-3">
              <div class="input-group">
                <div class="input-group-prepend">
                  <span class="input-group-text">
                    <i class="material-icons">phone</i>
                  </span>
                </div>
                <input type="number" name="telp" class="form-control" placeholder="{{ __('Telepon...') }}" value="{{ old('telp') }}" required>
              </div>
              @if ($errors->has('telp'))
                <div id="telp-error" class="error text-danger pl-3" for="telp" style="display: block;">
                  <strong>{{ $errors->first('telp') }}</strong>
                </div>
              @endif
            </div>
            <div class="bmd-form-group{{ $errors->has('nama_perusahaan') ? ' has-danger' : '' }} mt-3">
              <div class="input-group">
                <div class="input-group-prepend">
                  <span class="input-group-text">
                    <i class="material-icons">location_city</i>
                  </span>
                </div>
                <input type="text" name="nama_perusahaan" class="form-control" placeholder="{{ __('Nama Perusahaan...') }}" value="{{ old('nama_perusahaan') }}" required>
              </div>
              @if ($errors->has('nama_perusahaan'))
                <div id="nama_perusahaan-error" class="error text-danger pl-3" for="nama_perusahaan" style="display: block;">
                  <strong>{{ $errors->first('nama_perusahaan') }}</strong>
                </div>
              @endif
            </div>
            <div class="bmd-form-group{{ $errors->has('jabatan') ? ' has-danger' : '' }} mt-3">
              <div class="input-group">
                <div class="input-group-prepend">
                  <span class="input-group-text">
                    <i class="material-icons">work</i>
                  </span>
                </div>
                <input type="text" name="jabatan" class="form-control" placeholder="{{ __('Jabatan...') }}" value="{{ old('jabatan') }}" required>
              </div>
              @if ($errors->has('jabatan'))
                <div id="jabatan-error" class="error text-danger pl-3" for="jabatan" style="display: block;">
                  <strong>{{ $errors->first('jabatan') }}</strong>
                </div>
              @endif
            </div>
            <div class="bmd-form-group{{ $errors->has('password') ? ' has-danger' : '' }} mt-3">
              <div class="input-group">
                <div class="input-group-prepend">
                  <span class="input-group-text">
                    <i class="material-icons">lock_outline</i>
                  </span>
                </div>
                <input type="password" name="password" id="password" class="form-control" placeholder="{{ __('Katasandi...') }}" required>
              </div>
              @if ($errors->has('password'))
                <div id="password-error" class="error text-danger pl-3" for="password" style="display: block;">
                  <strong>{{ $errors->first('password') }}</strong>
                </div>
              @endif
            </div>
            <div class="bmd-form-group{{ $errors->has('password_confirmation') ? ' has-danger' : '' }} mt-3">
              <div class="input-group">
                <div class="input-group-prepend">
                  <span class="input-group-text">
                    <i class="material-icons">lock_outline</i>
                  </span>
                </div>
                <input type="password" name="password_confirmation" id="password_confirmation" class="form-control" placeholder="{{ __('Konfimasi Katasandi...') }}" required>
              </div>
              @if ($errors->has('password_confirmation'))
                <div id="password_confirmation-error" class="error text-danger pl-3" for="password_confirmation" style="display: block;">
                  <strong>{{ $errors->first('password_confirmation') }}</strong>
                </div>
              @endif
            </div>
          </div>
          <div class="card-footer justify-content-center">
            <button type="submit" class="btn btn-primary btn-link btn-lg">{{ __('Buat Akun') }}</button>
          </div>
        </div>
      </form>
    </div>
  </div>
</div>
@endsection
