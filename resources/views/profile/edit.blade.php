@extends('layouts.app')
@push('plugin-styles')
  <link href="{{ asset('assets/plugins/select2/select2.min.css') }}" rel="stylesheet" />
  <link href="{{ asset('assets/plugins/jquery-tags-input/jquery.tagsinput.min.css') }}" rel="stylesheet" />
  <link href="{{ asset('assets/plugins/dropzone/dropzone.min.css') }}" rel="stylesheet" />
  <link href="{{ asset('assets/plugins/dropify/css/dropify.min.css') }}" rel="stylesheet" />
  <link href="{{ asset('assets/plugins/bootstrap-colorpicker/bootstrap-colorpicker.min.css') }}" rel="stylesheet" />
  <link href="{{ asset('assets/plugins/bootstrap-datepicker/bootstrap-datepicker.min.css') }}" rel="stylesheet" />
  <link href="{{ asset('assets/plugins/font-awesome/css/font-awesome.min.css') }}" rel="stylesheet" />
  <link href="{{ asset('assets/plugins/tempusdominus-bootstrap-4/tempusdominus-bootstrap-4.min.css') }}" rel="stylesheet" />
@endpush
@section('content')
  <div class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-12">
          <form class="forms-sample" method="post" action="{{ route('profile.update') }}">
            @csrf
            @method('put')
            <div class="card">
              <div class="card-header card-header-warning">
                <!--Card image-->
                <div class="view view-cascade gradient-card-header blue-gradient narrower d-flex justify-content-between align-items-center">

                  <h4 class="card-title">Form Pengajuan Pelaporan Air</h4>

                  <div>
                    <a class="btn btn-sm btn-danger" href="{{ route('home') }}">
                      <i class="link-icon" data-feather="chevron-left" width="18" height="18"></i> <span>Kembali</span>
                    </a>
                  </div>

                </div>
                <!--/Card image-->
              </div>
              
              <div class="card-body">
                @if (session('status'))
                  <div class="row">
                    <div class="col-sm-12">
                      <div class="alert alert-success">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                          <i class="link-icons" data-feather="x"></i>
                        </button>
                        <span>{{ session('status') }}</span>
                      </div>
                    </div>
                  </div>
                @endif
                <fieldset>
                  <div class="form-group">
                    <label for="nama">Nama Penanggung Jawab</label>
                    <input id="nama" class="form-control" name="nama" type="text" value="{{ auth()->user()->name }}">
                    @if ($errors->has('nama'))
                      <div id="nama-error" class="error text-danger pt-1" for="nama" style="display: block;">
                        <strong>{{ $errors->first('nama') }}</strong>
                      </div>
                    @endif
                  </div>
                  <div class="form-group">
                    <label for="telp">Telepon</label>
                    <input id="telp" class="form-control" maxlength="20" name="telp" type="number" value="{{ auth()->user()->telp }}">
                    @if ($errors->has('telp'))
                      <div id="telp-error" class="error text-danger pt-1" for="telp" style="display: block;">
                        <strong>{{ $errors->first('telp') }}</strong>
                      </div>
                    @endif
                  </div>
                  <div class="form-group">
                    <label for="nama_perusahaan">Nama Perusahaan</label>
                    <input id="nama_perusahaan" class="form-control" name="nama_perusahaan" type="text" value="{{ auth()->user()->nama_perusahaan }}">
                    @if ($errors->has('nama_perusahaan'))
                      <div id="nama_perusahaan-error" class="error text-danger pt-1" for="nama_perusahaan" style="display: block;">
                        <strong>{{ $errors->first('nama_perusahaan') }}</strong>
                      </div>
                    @endif
                  </div>
                  <div class="form-group">
                    <label>Bidang Usaha</label>
                    <select class="form-control js-example-basic-single w-100" id="bidang_usaha" name="bidang_usaha" required>
                      <option disabled selected>Pilih Bidang Usaha</option>   
                      <optgroup label="Fasilitas Kesehatan">
                        <option {{ auth()->user()->bidang_usaha == "Apotek" ? "selected" : ""}} value="Apotek">Apotek</option>
                        <option {{ auth()->user()->bidang_usaha == "Toko Obat" ? "selected" : ""}} value="Toko Obat">Toko Obat</option>
                        <option {{ auth()->user()->bidang_usaha == "Klinik" ? "selected" : ""}} value="Klinik">Klinik</option>
                        <option {{ auth()->user()->bidang_usaha == "Puskesmas" ? "selected" : ""}} value="Puskesmas">Puskesmas</option>
                        <option {{ auth()->user()->bidang_usaha == "Rumah Sakit" ? "selected" : ""}} value="Rumah Sakit">Rumah Sakit</option>
                        <option {{ auth()->user()->bidang_usaha == "Lab Kesehatan" ? "selected" : ""}} value="Lab Kesehatan">Lab Kesehatan</option>
                      </optgroup>
                      <optgroup label="Pertambangan Energi dan Mineral">
                        <option {{ auth()->user()->bidang_usaha == "Pertambangan" ? "selected" : ""}} value="Pertambangan">Pertambangan</option>
                        <option {{ auth()->user()->bidang_usaha == "Energi" ? "selected" : ""}} value="Energi">Energi</option>
                        <option {{ auth()->user()->bidang_usaha == "Mineral" ? "selected" : ""}} value="Mineral">Mineral</option>
                        <option {{ auth()->user()->bidang_usaha == "Panas Bumi" ? "selected" : ""}} value="Panas Bumi">Panas Bumi</option>
                      </optgroup>                       
                      <optgroup label="Industri">
                        <option {{ auth()->user()->bidang_usaha == "Makanan Olahan" ? "selected" : ""}} value="Makanan Olahan">Makanan Olahan</option>
                        <option {{ auth()->user()->bidang_usaha == "Bahan Baku" ? "selected" : ""}} value="Bahan Baku">Bahan Baku</option>
                        <option {{ auth()->user()->bidang_usaha == "Perikanan" ? "selected" : ""}} value="Perikanan">Perikanan</option>
                        <option {{ auth()->user()->bidang_usaha == "Pertanian" ? "selected" : ""}} value="Pertanian">Pertanian</option>
                        <option {{ auth()->user()->bidang_usaha == "Perkebunan" ? "selected" : ""}} value="Perkebunan">Perkebunan</option>
                        <option {{ auth()->user()->bidang_usaha == "Peternakan" ? "selected" : ""}} value="Peternakan">Peternakan</option>
                      </optgroup>
                      <optgroup label="Sektor Domestik">
                        <option {{ auth()->user()->bidang_usaha == "Perumahan" ? "selected" : ""}} value="Perumahan">Perumahan</option>
                        <option {{ auth()->user()->bidang_usaha == "Rumah Makan" ? "selected" : ""}} value="Rumah Makan">Rumah Makan</option>
                        <option {{ auth()->user()->bidang_usaha == "Hotel" ? "selected" : ""}} value="Hotel">Hotel</option>
                      </optgroup>
                      <option {{ auth()->user()->bidang_usaha == "Lainnya" ? "selected" : ""}} value="Lainnya">Lainnya</option>
                    </select>
                    @if ($errors->has('bidang_usaha'))
                      <div id="bidang_usaha-error" class="error text-danger pt-1" for="bidang_usaha" style="display: block;">
                        <strong>{{ $errors->first('bidang_usaha') }}</strong>
                      </div>
                    @endif
                  </div>
                  <div class="form-group">
                    <label for="jabatan">Jabatan</label>
                    <input id="jabatan" class="form-control" name="jabatan" type="text" value="{{ auth()->user()->jabatan }}">
                    @if ($errors->has('jabatan'))
                      <div id="jabatan-error" class="error text-danger pt-1" for="jabatan" style="display: block;">
                        <strong>{{ $errors->first('jabatan') }}</strong>
                      </div>
                    @endif
                  </div>                  
                </fieldset>                
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
@push('plugin-scripts')
  <script src="{{ asset('assets/plugins/jquery-validation/jquery.validate.min.js') }}"></script>
  <script src="{{ asset('assets/plugins/bootstrap-maxlength/bootstrap-maxlength.min.js') }}"></script>
  <script src="{{ asset('assets/plugins/inputmask/jquery.inputmask.bundle.min.js') }}"></script>
  <script src="{{ asset('assets/plugins/select2/select2.min.js') }}"></script>
  <script src="{{ asset('assets/plugins/typeahead-js/typeahead.bundle.min.js') }}"></script>
  <script src="{{ asset('assets/plugins/jquery-tags-input/jquery.tagsinput.min.js') }}"></script>
  <script src="{{ asset('assets/plugins/dropzone/dropzone.min.js') }}"></script>
  <script src="{{ asset('assets/plugins/dropify/js/dropify.min.js') }}"></script>
  <script src="{{ asset('assets/plugins/bootstrap-colorpicker/bootstrap-colorpicker.min.js') }}"></script>
  <script src="{{ asset('assets/plugins/bootstrap-datepicker/bootstrap-datepicker.min.js') }}"></script>
  <script src="{{ asset('assets/plugins/moment/moment.min.js') }}"></script>
  <script src="{{ asset('assets/plugins/tempusdominus-bootstrap-4/tempusdominus-bootstrap-4.js') }}"></script>
@endpush

@push('js')
  <script src="{{ asset('assets/js/form-validation.js') }}"></script>
  <script src="{{ asset('assets/js/bootstrap-maxlength.js') }}"></script>
  <script src="{{ asset('assets/js/inputmask.js') }}"></script>
  <script src="{{ asset('assets/js/select2.js') }}"></script>
  <script src="{{ asset('assets/js/typeahead.js') }}"></script>
  <script src="{{ asset('assets/js/tags-input.js') }}"></script>
  <script src="{{ asset('assets/js/dropzone.js') }}"></script>
  <script src="{{ asset('assets/js/dropify.js') }}"></script>
  <script src="{{ asset('assets/js/bootstrap-colorpicker.js') }}"></script>
  <script src="{{ asset('assets/js/datepicker.js') }}"></script>
  <script src="{{ asset('assets/js/timepicker.js') }}"></script>
@endpush