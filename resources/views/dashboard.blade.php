@if(Auth::user()->status == "menunggu")

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


@else
@extends('layouts.app', ['activePage' => 'dashboard', 'titlePage' => __('Beranda')])
@section('content')
  <div class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-lg-6 col-md-6 col-sm-6">
          <div class="card card-stats">
            <div class="card-header card-header-warning card-header-icon">
              <div class="card-icon">
                <i class="material-icons">assignment</i>
              </div>
              <p class="card-category">Data Pelaporan</p>
              <h3 class="card-title">
                <small>Pelaporan</small>
              </h3>
            </div>
            <div class="card-footer">
              <div class="stats">
                <a href="{{ route('pelaporan.index')}}">Lihat Detail</a>
              </div>
            </div>
          </div>
        </div>
        <div class="col-lg-6 col-md-6 col-sm-6">
          <div class="card card-stats">
            <div class="card-header card-header-danger card-header-icon">
              <div class="card-icon">
                <i class="material-icons">assignment</i>
              </div>
              <p class="card-category">Data Pengaduan</p>
              <h3 class="card-title">
                <small>Pengaduan</small>
              </h3>                
            </div>
            <div class="card-footer">
              <div class="stats">
                <a href="{{ route('pengaduan.index')}}">Lihat Detail</a>
              </div>
            </div>
          </div>
        </div>
        <!--
        <div class="col-lg-3 col-md-6 col-sm-6">
          <div class="card card-stats">
            <div class="card-header card-header-danger card-header-icon">
              <div class="card-icon">
                <i class="material-icons">info_outline</i>
              </div>
              <p class="card-category">Fixed Issues</p>
              <h3 class="card-title">75</h3>
            </div>
            <div class="card-footer">
              <div class="stats">
                <i class="material-icons">local_offer</i> Tracked from Github
              </div>
            </div>
          </div>
        </div>
        <div class="col-lg-3 col-md-6 col-sm-6">
          <div class="card card-stats">
            <div class="card-header card-header-info card-header-icon">
              <div class="card-icon">
                <i class="fa fa-twitter"></i>
              </div>
              <p class="card-category">Followers</p>
              <h3 class="card-title">+245</h3>
            </div>
            <div class="card-footer">
              <div class="stats">
                <i class="material-icons">update</i> Just Updated
              </div>
            </div>
          </div>
        </div>
        -->
      </div>
      <div class="row">
        <div class="col-md-12">
          <div class="card card-chart">
            <div class="card-header card-header-warning">
            <h4 class="card-title">Grafik Data Pelaporan </h4>
            
            </div>
            <div class="card-body">
            </div>
            <div class="card-footer">
              
            </div>
          </div>
        </div>
        <div class="col-md-12">
          <div class="card card-chart">
            <div class="card-header card-header-danger">
            <h4 class="card-title">Grafik Data Pengaduan </h4>
            <select class="sel" name="year">
              <option value="2020">Year 2019</option>
              <option value="2018">Year 2018</option>
              <option value="2017">Year 2017</option>
            </select>
            </div>
            <div class="card-body">
              {!! $chart->container() !!}

              {!! $chart->script() !!}    
            </div>
            <div class="card-footer">
              
            </div>
          </div>
        </div>
        <!--
        <div class="col-md-4">
          <div class="card card-chart">
            <div class="card-header card-header-danger">
              <div class="ct-chart" id="completedTasksChart"></div>
            </div>
            <div class="card-body">
              <h4 class="card-title">Completed Tasks</h4>
              <p class="card-category">Last Campaign Performance</p>
            </div>
            <div class="card-footer">
              <div class="stats">
                <i class="material-icons">access_time</i> campaign sent 2 days ago
              </div>
            </div>
          </div>
        </div>
        -->
      </div>
    </div>
  </div>
@endsection
@endif
@push('js')
  <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.1/Chart.min.js" charset="utf-8"></script>
  <script>
    $(document).ready(function() {
      // Javascript method's body can be found in assets/js/demos.js
      md.initDashboardPageCharts();
    });
  </script>

  <script type="text/javascript">
      var original_api_url = {{ $chart->id }}_api_url;
      $(".sel").change(function(){
          var year = $(this).val();
          {{ $chart->id }}_refresh(original_api_url + "?year="+year);
      });
  </script>
@endpush  

