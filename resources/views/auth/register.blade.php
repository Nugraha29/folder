@extends('layouts.app2')

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
            <div class="auth-form-wrapper px-4 py-4">
              <a href="#" class="noble-ui-logo d-block mb-2">Dinas Lingkungan Hidup <span>1.0</span></a>
              <h5 class="text-muted font-weight-normal mb-4">Buat akun baru.</h5>
              <form class="forms-sample" id="signupForm" method="POST" action="{{ route('register') }}">
                @csrf
                <fieldset>
                  <div class="form-group">
                    <label for="name">Nama</label>
                    <input id="name" class="form-control" minlength="10" name="name" type="text" value="{{ old('name') }}">
                    @if ($errors->has('name'))
                      <div id="name-error" class="error text-danger pl-3" for="name" style="display: block;">
                        <strong>{{ $errors->first('name') }}</strong>
                      </div>
                    @endif
                  </div>
                  <div class="form-group">
                    <label for="email">Email</label>
                    <input id="email" class="form-control" name="email" type="email">
                    @if ($errors->has('email'))
                      <div id="email-error" class="error text-danger pl-3" for="email" style="display: block;">
                        <strong>{{ $errors->first('email') }}</strong>
                      </div>
                    @endif
                  </div>
                  <div class="form-group">
                    <label for="password">Kata sandi</label>
                    <input id="password" class="form-control" name="password" type="password">
                    @if ($errors->has('password'))
                      <div id="password-error" class="error text-danger pl-3" for="password" style="display: block;">
                        <strong>{{ $errors->first('password') }}</strong>
                      </div>
                    @endif
                  </div>
                  <div class="form-group">
                    <label for="password_confirmation">Konfirmasi kata sandi</label>
                    <input id="password_confirmation" class="form-control" name="password_confirmation" type="password">
                    @if ($errors->has('password_confirmation'))
                      <div id="password_confirmation-error" class="error text-danger pl-3" for="password_confirmation" style="display: block;">
                        <strong>{{ $errors->first('password_confirmation') }}</strong>
                      </div>
                    @endif
                  </div>
                  <input class="btn btn-primary mb-3" type="submit" value="Submit">
                </fieldset>
                Sudah mempunyai akun? <a href="{{ url('/login') }}" class=" mt-4">Masuk</a>
              </form>
            </div>
          </div>
        </div>
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