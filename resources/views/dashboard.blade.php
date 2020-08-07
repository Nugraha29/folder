@if(Auth::user()->status == "menunggu")
@extends('layouts.app2')
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

@else
@extends('layouts.app')
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
                {{ $countpelaporan }} <small>Pelaporan</small>
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
                {{ $countpengaduan }} <small>Pengaduan</small>
              </h3>          
            </div>
            <div class="card-footer">
              <div class="stats">
                <a href="{{ route('pengaduan.index')}}">Lihat Detail</a>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-md-12">
          <div class="card card-chart">
            <div class="card-header card-header-warning">
              <div class="row">
                <div class="col-6 mt-3">
                  <h4 class="card-title">Grafik Data Pelaporan </h4>
                </div>
                <div class="col-4">
                </div>
                <div class="col-2">
                  <div class="form-group">
                    <select class="pelaporan form-control" data-style="btn btn-link" name="pelaporanyear">
                      <option disabled selected>Pilih Tahun</option>   
                        <option value="2025">2025</option>
                        <option value="2024">2024</option>
                        <option value="2023">2023</option>
                        <option value="2022">2022</option>
                        <option value="2021">2021</option>
                        <option value="2020">2020</option>
                        <option value="2019">2019</option>
                    </select>
                  </div>
                </div>
              </div>
            </div>
            <div class="card-body">
              {!! $pelaporanchart->container() !!}

              {!! $pelaporanchart->script() !!}    
            </div>
            <div class="card-footer">
              
            </div>
          </div>
        </div>
        <div class="col-md-12">
          <div class="card card-chart">
            <div class="card-header card-header-danger">
              <div class="row">
                <div class="col-6 mt-3">
                  <h4 class="card-title">Grafik Data Pengaduan </h4>
                </div>
                <div class="col-4">
                </div>
                <div class="col-2">
                  <div class="form-group">
                    <select class="pengaduan form-control" data-style="btn btn-link" name="pengaduanyear">
                      <option disabled selected>Pilih Tahun</option>   
                        <option value="2025">2025</option>
                        <option value="2024">2024</option>
                        <option value="2023">2023</option>
                        <option value="2022">2022</option>
                        <option value="2021">2021</option>
                        <option value="2020">2020</option>
                        <option value="2019">2019</option>
                    </select>
                  </div>
                </div>
              </div>
            </div>
            <div class="card-body">
              {!! $pengaduanchart->container() !!}

              {!! $pengaduanchart->script() !!}                 
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
      var original_api_url = {{ $pelaporanchart->id }}_api_url;
      $(".pelaporan").change(function(){
          var pelaporanyear = $(this).val();
          {{ $pelaporanchart->id }}_refresh(original_api_url + "?pelaporanyear="+pelaporanyear);
      });
  </script>
  <script type="text/javascript">
    var original_api_url2 = {{ $pengaduanchart->id }}_api_url;
    $(".pengaduan").change(function(){
        var pengaduanyear = $(this).val();
        {{ $pengaduanchart->id }}_refresh(original_api_url2 + "?pengaduanyear="+pengaduanyear);
    });
  </script>

  
@endpush  

