@extends('layouts.app', ['activePage' => 'profile', 'titlePage' => __('Profil Pengguna')])

@section('content')
  <div class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-12">
          <form method="post" action="{{ route('profile.update') }}" autocomplete="off" class="form-horizontal">
            @csrf
            @method('put')

            <div class="card ">
              <div class="card-header card-header-primary">
                <!--Card image-->
                <div class="view view-cascade gradient-card-header blue-gradient narrower d-flex justify-content-between align-items-center">
                  <h4 class="card-title ">Edit Profil</h4>
                </div>
                <!--/Card image-->
              </div>
              <div class="card-body ">
                @if (session('status'))
                  <div class="row">
                    <div class="col-sm-12">
                      <div class="alert alert-success">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                          <i class="material-icons">close</i>
                        </button>
                        <span>{{ session('status') }}</span>
                      </div>
                    </div>
                  </div>
                @endif
                @can('isUser')
                  <div class="row">
                    <label class="col-sm-3 col-form-label">{{ __('Nama Penanggung Jawab') }}</label>
                    <div class="col-sm-9">
                      <div class="form-group{{ $errors->has('name') ? ' has-danger' : '' }}">
                        <input class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" id="input-name" type="text" placeholder="{{ __('Nama Penanggung Jawab') }}" value="{{ old('name', auth()->user()->name) }}" required="true" aria-required="true"/>
                        @if ($errors->has('name'))
                          <span id="name-error" class="error text-danger" for="input-name">{{ $errors->first('name') }}</span>
                        @endif
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <label class="col-sm-3 col-form-label">{{ __('Telepon') }}</label>
                    <div class="col-sm-9">
                      <div class="form-group{{ $errors->has('telp') ? ' has-danger' : '' }}">
                        <input class="form-control{{ $errors->has('telp') ? ' is-invalid' : '' }}" name="telp" id="input-telp" type="number" placeholder="{{ __('Telepon') }}" value="{{ old('telp', auth()->user()->telp) }}" required />
                        @if ($errors->has('telp'))
                          <span id="telp-error" class="error text-danger" for="input-telp">{{ $errors->first('telp') }}</span>
                        @endif
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <label class="col-sm-3 col-form-label">{{ __('Nama Perusahaan') }}</label>
                    <div class="col-sm-9">
                      <div class="form-group{{ $errors->has('nama_perusahaan') ? ' has-danger' : '' }}">
                        <input class="form-control{{ $errors->has('nama_perusahaan') ? ' is-invalid' : '' }}" name="nama_perusahaan" id="input-nama_perusahaan" type="text" placeholder="{{ __('Nama Perusahaan') }}" value="{{ old('nama_perusahaan', auth()->user()->nama_perusahaan) }}" required="true" aria-required="true"/>
                        @if ($errors->has('nama_perusahaan'))
                          <span id="nama_perusahaan-error" class="error text-danger" for="input-nama_perusahaan">{{ $errors->first('nama_perusahaan') }}</span>
                        @endif
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <label class="col-sm-3 col-form-label">{{ __('Jabatan') }}</label>
                    <div class="col-sm-9">
                      <div class="form-group{{ $errors->has('jabatan') ? ' has-danger' : '' }}">
                        <input class="form-control{{ $errors->has('jabatan') ? ' is-invalid' : '' }}" name="jabatan" id="input-jabatan" type="text" placeholder="{{ __('Jabatan') }}" value="{{ old('jabatan', auth()->user()->jabatan) }}" required="true" aria-required="true"/>
                        @if ($errors->has('jabatan'))
                          <span id="jabatan-error" class="error text-danger" for="input-jabatan">{{ $errors->first('jabatan') }}</span>
                        @endif
                      </div>
                    </div>
                  </div>
                @else
                  <div class="row">
                    <label class="col-sm-2 col-form-label">{{ __('Nama') }}</label>
                    <div class="col-sm-7">
                      <div class="form-group{{ $errors->has('name') ? ' has-danger' : '' }}">
                        <input class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" id="input-name" type="text" placeholder="{{ __('Nama') }}" value="{{ old('name', auth()->user()->name) }}" required="true" aria-required="true"/>
                        @if ($errors->has('name'))
                          <span id="name-error" class="error text-danger" for="input-name">{{ $errors->first('name') }}</span>
                        @endif
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <label class="col-sm-2 col-form-label">{{ __('Email') }}</label>
                    <div class="col-sm-7">
                      <div class="form-group{{ $errors->has('email') ? ' has-danger' : '' }}">
                        <input class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" id="input-email" type="email" placeholder="{{ __('Email') }}" value="{{ old('email', auth()->user()->email) }}" required />
                        @if ($errors->has('email'))
                          <span id="email-error" class="error text-danger" for="input-email">{{ $errors->first('email') }}</span>
                        @endif
                      </div>
                    </div>
                  </div>
                @endcan
                
              </div>
              <div class="card-footer ml-auto mr-auto">
                <button type="submit" class="btn btn-primary">{{ __('Simpan') }}</button>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
@endsection