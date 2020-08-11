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

@push('css')
<style>
.blink_me {
    animation: blinker 1s linear infinite;
}

@keyframes blinker {  
    50% { opacity: 0; }
}
</style>

@endpush

@section('content')
  <div class="content">
    <div class="container-fluid">

        <div class="row">
         <div class="col-md-12">
                <!-- Card deck -->
            <div class="card-deck">

                <!-- Card Pengajuan Air -->
                <div class="card">
                
                    <!--Card content-->
                    <div class="card-body">
                
                        <!--Title-->
                        <h3 class="card-title text-danger">Petunjuk Pengisian!</h3>
                        <!--Text -->    
                        <p class="card-text text-justify">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc ut nisl justo. Duis et tempus lectus. Quisque varius lorem in pellentesque mattis. Integer non sem congue, cursus diam sit amet, feugiat massa. Sed lobortis posuere enim quis ullamcorper. Donec molestie non dui ac malesuada. Aliquam ac tellus est. Vivamus elementum eleifend felis sed accumsan.

                            Duis in risus vulputate, faucibus turpis eleifend, gravida neque. Integer tincidunt risus eget ante sagittis, congue gravida velit aliquam. Nam eget erat lacinia, semper ipsum sit amet, sollicitudin magna. Duis odio neque, aliquet et nulla quis, iaculis sagittis neque. In laoreet molestie semper. Pellentesque consectetur efficitur nisi consequat rhoncus. Sed molestie nunc a leo semper aliquam. Phasellus viverra iaculis ante sit amet semper. Morbi auctor accumsan augue in tempor.</p> 

                    </div>
            
                </div>
                <!-- Card -->
            
            </div>
            <!-- Card deck -->
         </div>
        </div> 

        <div class="row mt-3">
            <div class="col-md-12">
                @if (!$filter)
                <form class="forms-sample" id="formPengajuan" action="{{ route('pelaporan.store')}}" method="POST" enctype="multipart/form-data">
                    @csrf 
                    <div class="card-deck mb-3">
                        <div class="card">    
                            <div class="card-header">
                                <h5 class="text-primary text-center" style="text-transform:uppercase;">Identitas Perusahaan</h5>
                            </div> 
                            <div class="card-body">
                                <div class="form-group">
                                    <div class="col">
                                        <a class="text-success blink_me">Untuk identitas perusahaan diubah di halaman profil</a> 
                                    </div>
                                    <div class="col">
                                        <a class="text-danger">*Wajib</a> 
                                    </div>

                                </div>
                                <div class="form-group">
                                    <label for="nama">Nama Penanggung Jawab<a class="text-danger">*</a></label>
                                    <input id="nama" class="form-control" name="nama" type="text" value="{{ auth()->user()->name }}" readonly>
                                    @if ($errors->has('nama'))
                                    <div id="nama-error" class="error text-danger pt-1" for="nama" style="display: block;">
                                        <strong>{{ $errors->first('nama') }}</strong>
                                    </div>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <label for="telp">Telepon<a class="text-danger">*</a></label>
                                    <input id="telp" class="form-control" maxlength="20" name="telp" type="number" value="{{ auth()->user()->telp }}" readonly>
                                    @if ($errors->has('telp'))
                                    <div id="telp-error" class="error text-danger pt-1" for="telp" style="display: block;">
                                        <strong>{{ $errors->first('telp') }}</strong>
                                    </div>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <label for="email">Email<a class="text-danger">*</a></label>
                                    <input id="email" class="form-control" name="email" type="email" value="{{ auth()->user()->email }}" readonly>
                                    @if ($errors->has('email'))
                                    <div id="email-error" class="error text-danger pt-1" for="email" style="display: block;">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </div>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <label for="nama_perusahaan">Nama Perusahaan<a class="text-danger">*</a></label>
                                    <input id="nama_perusahaan" class="form-control" name="nama_perusahaan" type="text" value="{{ auth()->user()->nama_perusahaan }}" readonly>
                                    @if ($errors->has('nama_perusahaan'))
                                    <div id="nama_perusahaan-error" class="error text-danger pt-1" for="nama_perusahaan" style="display: block;">
                                        <strong>{{ $errors->first('nama_perusahaan') }}</strong>
                                    </div>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <label for="bidang_usaha">Bidang Usaha<a class="text-danger">*</a></label>
                                    <input id="bidang_usaha" class="form-control" name="bidang_usaha" type="text" value="{{ auth()->user()->bidang_usaha }}" readonly>
                                    @if ($errors->has('bidang_usaha'))
                                    <div id="bidang_usaha-error" class="error text-danger pt-1" for="bidang_usaha" style="display: block;">
                                        <strong>{{ $errors->first('bidang_usaha') }}</strong>
                                    </div>
                                    @endif
                                </div>               
                            </div>            
                        </div>
                    </div>
                    <div class="card-deck">
                        <div class="card">  
                            <div class="card-header">
                                <h5 class="text-primary text-center" style="text-transform:uppercase;">Deskripsi Pelaporan</h5>
                            </div> 
                            <div class="card-body">                                    
                                <div class="form-group">
                                    <label for="jenis">Jenis Pelaporan<a class="text-danger">*</a></label>
                                    <input id="jenis" class="form-control" name="jenis" type="text" value="{{$jenis}}" readonly>
                                    @if ($errors->has('jenis'))
                                    <div id="jenis-error" class="error text-danger pt-1" for="jenis" style="display: block;">
                                        <strong>{{ $errors->first('jenis') }}</strong>
                                    </div>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <label for="periode">Periode<a class="text-danger">*</a></label>
                                    <input id="periode" class="form-control" name="periode" type="text" value="{{$periode}}" readonly>
                                    @if ($errors->has('periode'))
                                    <div id="periode-error" class="error text-danger pt-1" for="periode" style="display: block;">
                                        <strong>{{ $errors->first('periode') }}</strong>
                                    </div>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <label>Dokumen Pelaporan<a class="text-danger">*</a></label>
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
                                    <label>Dokumen Lab<a class="text-danger">*</a></label>
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
                                    <label>Dokumen Izin<a class="text-danger">*</a></label>
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
                            </div>
                            <div class="card-footer">
                                <a href="{{ route('pelaporan.form') }}" class="btn btn-danger">Kembali</a>
                                <button type="submit" class="btn btn-primary pull-right">Kirim</button>
                            </div>              
                        </div>
                    </div>
                </form>    
                    @else
                    <div class="card-body">
                        <div class="col">
                            Anda telah mengirim Pelaporan {{ $filter->jenis }} periode Triwulan {{ $filter->periode }} pada {{ $filter->created_at->format('d F Y')}} pukul {{ $filter->created_at->format('H:i:s')}}
                        </div>
                        <div class="col">
                            <a href="{{ route('pelaporan.show', [$filter->id])}}">Klik disini untuk melihat secara detail</a> 
                        </div>
                    </div>
                    <div class="card-footer">
                        <a href="{{ route('pelaporan.form') }}" class="btn btn-danger">Kembali</a>
                    </div>  
                @endif  
               
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