@extends('layouts.app', ['class' => 'off-canvas-sidebar', 'activePage' => 'pengaduan', 'titlePage' => __('Tambah Pengaduan')])

@section('content')
<div class="container" style="height: auto;">
  <div class="row align-items-center">
    <div class="col-lg-8 col-md-6 col-sm-8 ml-auto mr-auto">
       <form method="post" action="{{ route('pengaduan.store')}}" enctype="multipart/form-data" autocomplete="off">
        {{ csrf_field() }}
        @method('post')

        <div class="card card-login card-hidden mb-3">
          <div class="card-header card-header-success text-center">
            <h4 class="card-title"><strong>{{ __('Form Pengaduan') }}</strong></h4>
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
            <div class="bmd-form-group{{ $errors->has('nik') ? ' has-danger' : '' }} mt-3">
              <div class="input-group">
                <div class="input-group-prepend">
                  <span class="input-group-text">
                    <i class="material-icons">credit_card</i>
                  </span>
                </div>
                <input type="number" name="nik" class="form-control" placeholder="{{ __('NIK...') }}" value="{{ old('nik') }}" required>
              </div>
              @if ($errors->has('nik'))
                <div id="nik-error" class="error text-danger pl-3" for="nik" style="display: block;">
                  <strong>{{ $errors->first('nik') }}</strong>
                </div>
              @endif
            </div>
            <div class="bmd-form-group{{ $errors->has('img4') ? ' has-danger' : '' }} mt-3">
              <div class="input-group">
                <div class="input-group-prepend">
                  <span class="input-group-text">
                    <i class="material-icons">image</i>
                  </span>
                </div>
                <label class="form-control-label custom-file-upload" for="input-img4">
                  <i class="fa fa-cloud-upload"></i> {{ __('Unggah Foto KTP') }}
                </label>
                <input type="file" name="img4" id="input-img4" class="form-control form-control-alternative{{ $errors->has('img4') ? ' is-invalid' : '' }}" placeholder="{{ __('Unggah Bukti Foto') }}" value="{{ old('img4') }}" style="display:none;">  
              </div>
              @if ($errors->has('img4'))
                <div id="deskripsi-error" class="error text-danger pl-3" for="img4" style="display: block;">
                  <strong>{{ $errors->first('img4') }}</strong>
                </div>
              @endif
            </div>
            <div class="bmd-form-group{{ $errors->has('nama') ? ' has-danger' : '' }} mt-3">
              <div class="input-group">
                <div class="input-group-prepend">
                  <span class="input-group-text">
                      <i class="material-icons">face</i>
                  </span>
                </div>
                <input type="text" name="nama" class="form-control" placeholder="{{ __('Nama Pengadu...') }}" value="{{ old('nama') }}" required>
              </div>
              @if ($errors->has('nama'))
                <div id="nama-error" class="error text-danger pl-3" for="nama" style="display: block;">
                  <strong>{{ $errors->first('nama') }}</strong>
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
            <div class="bmd-form-group{{ $errors->has('email') ? ' has-danger' : '' }} mt-3">
              <div class="input-group">
                <div class="input-group-prepend">
                  <span class="input-group-text">
                    <i class="material-icons">email</i>
                  </span>
                </div>
                <input type="email" name="email" class="form-control" placeholder="{{ __('E-mail...') }}" value="{{ old('email') }}" required>
              </div>
              @if ($errors->has('email'))
                <div id="email-error" class="error text-danger pl-3" for="email" style="display: block;">
                  <strong>{{ $errors->first('email') }}</strong>
                </div>
              @endif
            </div>
            <div class="row">
              <div class="col-md-12">
                <div id="map" style="width:100%;height:350px;"></div>   
              </div>
              <div class="col-md-6">
                  <div class="bmd-form-group{{ $errors->has('lat') ? ' has-danger' : '' }} mt-3">
                    <div class="input-group">
                      <div class="input-group-prepend">
                        <span class="input-group-text">
                          <i class="material-icons">location_on</i>
                        </span>
                      </div>
                      <input type="text" name="lat" id="lat" class="form-control" placeholder="{{ __('Latitude...') }}" value="{{ old('lat') }}" required>
                    </div>
                    @if ($errors->has('lat'))
                      <div id="lat-error" class="error text-danger pl-3" for="lat" style="display: block;">
                        <strong>{{ $errors->first('lat') }}</strong>
                      </div>
                    @endif
                  </div>
              </div>
              <div class="col-md-6">
                <div class="bmd-form-group{{ $errors->has('long') ? ' has-danger' : '' }} mt-3">
                  <div class="input-group">
                    <div class="input-group-prepend">
                      <span class="input-group-text">
                        <i class="material-icons">location_on</i>
                      </span>
                    </div>
                    <input type="text" name="long" id="long" class="form-control" placeholder="{{ __('Longitude...') }}" value="{{ old('long') }}" required>
                  </div>
                  @if ($errors->has('long'))
                    <div id="long-error" class="error text-danger pl-3" for="long" style="display: block;">
                      <strong>{{ $errors->first('long') }}</strong>
                    </div>
                  @endif
                </div>
              </div>
            </div>
            <div class="bmd-form-group{{ $errors->has('jenis') ? ' has-danger' : '' }} mt-3">
              <div class="input-group">
                <div class="input-group-prepend">
                  <span class="input-group-text">
                    <i class="material-icons">list</i>
                  </span>
                </div>
                <select class="form-control" data-style="btn btn-link" name="bidang_usaha" id="input-bidang_usaha" required>
                  <option hidden>Jenis Pengaduan</option>   
                  <option value="Pencemaran Air">Pencemaran Air</option>
                  <option value="Pencemaran Udara">Pencemaran Udara</option>
                  <option value="Illegal Logging">Illegal Logging</option>
                  <option value="Pembuangan Sampah">Pembuangan Sampah</option>
                  <option value="Dumping">Dumping</option>
                  <option value="Lainnya">Lainnya</option>
                </select>
              </div>
              @if ($errors->has('deskripsi'))
                <div id="deskripsi-error" class="error text-danger pl-3" for="deskripsi" style="display: block;">
                  <strong>{{ $errors->first('deskripsi') }}</strong>
                </div>
              @endif
            </div>
            <div class="bmd-form-group{{ $errors->has('deskripsi') ? ' has-danger' : '' }} mt-3">
              <div class="input-group">
                <div class="input-group-prepend">
                  <span class="input-group-text">
                    <i class="material-icons">assignment</i>
                  </span>
                </div>
                <input type="text" name="deskripsi" class="form-control" placeholder="{{ __('Deskripsi Pengaduan...') }}" value="{{ old('deskripsi') }}" required>
              </div>
              @if ($errors->has('deskripsi'))
                <div id="deskripsi-error" class="error text-danger pl-3" for="deskripsi" style="display: block;">
                  <strong>{{ $errors->first('deskripsi') }}</strong>
                </div>
              @endif
            </div>
            <div class="bmd-form-group{{ $errors->has('img1') ? ' has-danger' : '' }} mt-3">
              <div class="input-group">
                <div class="input-group-prepend">
                  <span class="input-group-text">
                    <i class="material-icons">image</i>
                  </span>
                </div>
                <label class="form-control-label custom-file-upload" for="input-img1">
                  <i class="fa fa-cloud-upload"></i> {{ __('Unggah Bukti Foto') }}
                </label>
                <input type="file" name="img1" id="input-img1" class="form-control form-control-alternative{{ $errors->has('img1') ? ' is-invalid' : '' }}" placeholder="{{ __('Unggah Bukti Foto') }}" value="{{ old('img1') }}" style="display:none;">  
              </div>
              @if ($errors->has('img1'))
                <div id="deskripsi-error" class="error text-danger pl-3" for="img1" style="display: block;">
                  <strong>{{ $errors->first('img1') }}</strong>
                </div>
              @endif
            </div>
            <div class="bmd-form-group{{ $errors->has('img2') ? ' has-danger' : '' }} mt-3">
              <div class="input-group">
                <div class="input-group-prepend">
                  <span class="input-group-text">
                    <i class="material-icons">image</i>
                  </span>
                </div>
                <label class="form-control-label custom-file-upload" for="input-img2">
                  <i class="fa fa-cloud-upload"></i> {{ __('Unggah Bukti Foto') }}
                </label>
                <input type="file" name="img2" id="input-img2" class="form-control form-control-alternative{{ $errors->has('img2') ? ' is-invalid' : '' }}" placeholder="{{ __('Unggah Bukti Foto') }}" value="{{ old('img2') }}" style="display:none;">  
              </div>
              @if ($errors->has('img2'))
                <div id="deskripsi-error" class="error text-danger pl-3" for="img2" style="display: block;">
                  <strong>{{ $errors->first('img2') }}</strong>
                </div>
              @endif
            </div>
            <div class="bmd-form-group{{ $errors->has('img3') ? ' has-danger' : '' }} mt-3">
              <div class="input-group">
                <div class="input-group-prepend">
                  <span class="input-group-text">
                    <i class="material-icons">image</i>
                  </span>
                </div>
                <label class="form-control-label custom-file-upload" for="input-img3">
                  <i class="fa fa-cloud-upload"></i> {{ __('Unggah Bukti Foto') }}
                </label>
                <input type="file" name="img3" id="input-img3" class="form-control form-control-alternative{{ $errors->has('img3') ? ' is-invalid' : '' }}" placeholder="{{ __('Unggah Bukti Foto') }}" value="{{ old('img3') }}" style="display:none;">  
              </div>
              @if ($errors->has('img3'))
                <div id="deskripsi-error" class="error text-danger pl-3" for="img3" style="display: block;">
                  <strong>{{ $errors->first('img3') }}</strong>
                </div>
              @endif
            </div>
            <div class="bmd-form-group{{ $errors->has('captcha') ? ' has-danger' : '' }} mt-3">
              <div class="input-group">
                <div class="col-md-12">
                  <div class="captcha">
                    <span>{!! captcha_img() !!}</span>
                    <button class="btn btn-danger btn-fab btn-fab-mini btn-round btn-refresh">
                      <i class="material-icons">refresh</i>
                    </button>
                  </div>
                </div>
                <div class="col-12">
                  <input type="text" id="captcha" name="captcha" class="form-control @error('captcha') is-invalid @enderror" placeholder="{{ __('Masukkan Captcha...') }}">
                </div>
              </div>
              @if ($errors->has('captcha'))
                <div id="captcha-error" class="error text-danger pl-3" for="captcha" style="display: block;">
                  <strong>{{ $errors->first('captcha') }}</strong>
                </div>
              @endif
            </div>
          </div>
          <div class="card-footer justify-content-center">
            <button type="submit" class="btn btn-success btn-md">{{ __('Kirim Pengaduan') }}</button>
          </div>
        </div>
      </form>
    </div>
  </div>
</div>
@endsection

@push('js')
<script>
    var map = new GMaps({
      el: '#map',
      zoom: 12,
      lat: -7.2146505,
      lng: 107.8959374,
      click: function(e) {
        // alert('click');
        var latLng = e.latLng;
        console.log(latLng);
        var lat = $('#lat');
        var long = $('#long');

        lat.val(latLng.lat());
        long.val(latLng.lng());
        map.removeMarkers();
        map.addMarker({
            lat: latLng.lat(),
            lng: latLng.lng(),
            title: 'Create Here',
            click: function(e) {
                alert('You clicked in this marker');
            }
        });

    },
});
</script>
<script>
  $('.btn-refresh').click(function(){
    $.ajax({
      type: 'GET',
      url: '{{ url('/refresh_captcha')}}',
      success: function (data){
        $('.captcha span').html(data);
      }
    });
  });
</script>
@endpush
