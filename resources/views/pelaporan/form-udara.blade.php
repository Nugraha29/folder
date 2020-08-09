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
          <form class="forms-sample" id="formPengajuan" method="POST" action="{{ route('pelaporan.store') }}" enctype='multipart/form-data'>
            @csrf
            <div class="card">
              <div class="card-header card-header-warning">
                <!--Card image-->
                <div class="view view-cascade gradient-card-header blue-gradient narrower d-flex justify-content-between align-items-center">

                  <h4 class="card-title">Form Pengajuan Pelaporan Udara</h4>

                  <div>
                    <a class="btn btn-sm btn-danger" href="{{ route('pelaporan.menu') }}">
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
                    <input id="nama" class="form-control" name="nama" type="text" value="{{ auth()->user()->name }}" readonly>
                    @if ($errors->has('nama'))
                      <div id="nama-error" class="error text-danger pt-1" for="nama" style="display: block;">
                        <strong>{{ $errors->first('nama') }}</strong>
                      </div>
                    @endif
                  </div>
                  <div class="form-group">
                    <label for="telp">Telepon</label>
                    <input id="telp" class="form-control" maxlength="20" name="telp" type="number" value="{{ auth()->user()->telp }}" readonly>
                    @if ($errors->has('telp'))
                      <div id="telp-error" class="error text-danger pt-1" for="telp" style="display: block;">
                        <strong>{{ $errors->first('telp') }}</strong>
                      </div>
                    @endif
                  </div>
                  <div class="form-group">
                    <label for="email">Email</label>
                    <input id="email" class="form-control" name="email" type="email" value="{{ auth()->user()->email }}" readonly>
                    @if ($errors->has('email'))
                      <div id="email-error" class="error text-danger pt-1" for="email" style="display: block;">
                        <strong>{{ $errors->first('email') }}</strong>
                      </div>
                    @endif
                  </div>
                  <div class="form-group">
                    <label for="nama_perusahaan">Nama Perusahaan</label>
                    <input id="nama_perusahaan" class="form-control" name="nama_perusahaan" type="text" value="{{ auth()->user()->nama_perusahaan }}" readonly>
                    @if ($errors->has('nama_perusahaan'))
                      <div id="nama_perusahaan-error" class="error text-danger pt-1" for="nama_perusahaan" style="display: block;">
                        <strong>{{ $errors->first('nama_perusahaan') }}</strong>
                      </div>
                    @endif
                  </div>
                  <div class="form-group">
                    <label for="bidang_usaha">Bidang Usaha</label>
                    <input id="bidang_usaha" class="form-control" name="bidang_usaha" type="text" value="{{ auth()->user()->bidang_usaha }}" readonly>
                    @if ($errors->has('bidang_usaha'))
                      <div id="bidang_usaha-error" class="error text-danger pt-1" for="bidang_usaha" style="display: block;">
                        <strong>{{ $errors->first('bidang_usaha') }}</strong>
                      </div>
                    @endif
                  </div>
                  <div class="form-group">
                    <label for="jenis">Jenis Pelaporan</label>
                    <input id="jenis" class="form-control" name="jenis" type="text" value="Udara" readonly>
                    @if ($errors->has('jenis'))
                      <div id="jenis-error" class="error text-danger pt-1" for="jenis" style="display: block;">
                        <strong>{{ $errors->first('jenis') }}</strong>
                      </div>
                    @endif
                  </div>
                  <div class="form-group">
                    <label>Periode</label><br>
                    <div class="form-check form-check-inline">
                      <label class="form-check-label">
                        <input type="radio" class="form-check-input" name="periode" id="periode1" value="1">
                        1
                      </label>
                    </div>
                    <div class="form-check form-check-inline">
                      <label class="form-check-label">
                        <input type="radio" class="form-check-input" name="periode" id="periode2" value="2">
                        2
                      </label>
                    </div>   
                    @if ($errors->has('periode'))
                      <div id="periode-error" class="error text-danger pt-1" for="periode" style="display: block;">
                        <strong>{{ $errors->first('periode') }}</strong>
                      </div>
                    @endif               
                  </div>
                  <div class="form-group">
                    <label>Dokumen Pelaporan</label>
                    <input type="file" name="dok_pelaporan" class="file-upload-default">
                    <div class="input-group col-xs-12">
                      <input type="file" id="myDropify" class="border" name="dok_pelaporan"/>
                    </div>
                    @if ($errors->has('dok_pelaporan'))
                      <div id="dok_pelaporan-error" class="error text-danger pt-1" for="dok_pelaporan" style="display: block;">
                        <strong>{{ $errors->first('dok_pelaporan') }}</strong>
                      </div>
                    @endif  
                  </div>
                  <div class="form-group">
                    <label>Dokumen Izin</label>
                    <input type="file" name="dok_lab" class="file-upload-default">
                    <div class="input-group col-xs-12">
                      <input type="file" id="myDropify1" class="border" name="dok_lab"/>
                    </div>
                    @if ($errors->has('dok_lab'))
                      <div id="dok_lab-error" class="error text-danger pt-1" for="dok_lab" style="display: block;">
                        <strong>{{ $errors->first('dok_lab') }}</strong>
                      </div>
                    @endif  
                  </div>
                  <div class="form-group">
                    <label>Dokumen Lab</label>
                    <input type="file" name="dok_izin" class="file-upload-default">
                    <div class="input-group col-xs-12">
                      <input type="file" id="myDropify2" class="border" name="dok_izin"/>
                    </div>
                    @if ($errors->has('dok_izin'))
                      <div id="dok_izin-error" class="error text-danger pt-1" for="dok_izin" style="display: block;">
                        <strong>{{ $errors->first('dok_izin') }}</strong>
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