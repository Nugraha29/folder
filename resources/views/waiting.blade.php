@extends('layouts.app2')

@push('plugin-styles')
  <link href="{{ asset('assets/plugins/bootstrap-datepicker/css/bootstrap-datepicker.min.css') }}" rel="stylesheet" />
@endpush

@section('content')  
<div class="container" style="height: auto;">
  <div class="row align-items-center">
    
    <div class="col-lg-4 col-md-6 col-sm-8 mt-5 ml-auto mr-auto">

        <div class="card card-login card-hidden mb-3">
          
          <div class="card-body">
            <p class="card-description text-center mt-5">{{ __('Terimakasih telah mendaftar!') }}</p>
            <p class="card-description text-center mt-1">{{ __('Akun Anda sedang dalam tahap') }} <strong>verifikasi.</strong> {{ __(' Silahkan tunggu dalam waktu ') }}<strong>2x24jam.</strong> </p>
          
          </div>
          <div class="card-footer justify-content-center">
            <a href="{{ route('logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();" type="button" class="btn btn-info btn-sm ">{{ __('Kembali') }}</a>
          </div>
        </div>
        
    </div>
  </div>
</div>
@endsection

@push('plugin-scripts')
  <script src="{{ asset('assets/plugins/chartjs/Chart.min.js') }}"></script>
  <script src="{{ asset('assets/plugins/jquery.flot/jquery.flot.js') }}"></script>
  <script src="{{ asset('assets/plugins/jquery.flot/jquery.flot.resize.js') }}"></script>
  <script src="{{ asset('assets/plugins/bootstrap-datepicker/js/bootstrap-datepicker.min.js') }}"></script>
  <script src="{{ asset('assets/plugins/apexcharts/apexcharts.min.js') }}"></script>
  <script src="{{ asset('assets/plugins/progressbar-js/progressbar.min.js') }}"></script>
@endpush

@push('js')
  <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.1/Chart.min.js" charset="utf-8"></script>
  <script>
    $(document).ready(function() {
      // Javascript method's body can be found in assets/js/demos.js
      md.initDashboardPageCharts();
    });
  </script>
  <script src="{{ asset('assets/js/dashboard.js') }}"></script>
  <script src="{{ asset('assets/js/datepicker.js') }}"></script>
@endpush  

