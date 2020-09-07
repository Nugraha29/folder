@extends('layouts.app')

@can('isAdmin')
@push('plugin-styles')
  <link href="{{ asset('assets/plugins/bootstrap-datepicker/css/bootstrap-datepicker.min.css') }}" rel="stylesheet" />
@endpush

@section('content')  
  <div class="row">
    <div class="col-12 col-xl-12">
      <div class="row flex-grow">
        <div class="col-md-4 grid-margin stretch-card">
          <div class="card">
            <div class="card-body">
              <div class="d-flex justify-content-between align-items-baseline">
                <h6 class="card-title mb-3">Pelaporan Baru</h6>
              </div>
              <div class="row">
                <div class="col-6">
                  <h3 class="mb-0">{{ $countpelaporan }}</h3>
                </div>
                <div class="col-6 text-center text-primary">
                  <i class="link-icon" data-feather="file" width="50" height="50"></i>
                </div>
              </div>
            </div>
            <div class="card-footer">
              <div class="stats">
                <a href="{{ route('pelaporan.index')}}">Lihat Detail</a>
              </div>
            </div>
          </div>
        </div>
        <div class="col-md-4 grid-margin stretch-card">
          <div class="card">
            <div class="card-body">
              <div class="d-flex justify-content-between align-items-baseline">
                <h6 class="card-title mb-3">Pelaporan Selesai</h6>
              </div>
              <div class="row">
                <div class="col-6">
                  <h3 class="mb-0">{{ $countpelaporan }}</h3>
                </div>
                <div class="col-6 text-center text-success">
                  <i class="link-icon" data-feather="file" width="50" height="50"></i>
                </div>
              </div>
            </div>
            <div class="card-footer">
              <div class="stats">
                <a href="{{ route('pelaporan.index')}}">Lihat Detail</a>
              </div>
            </div>
          </div>
        </div>
        <div class="col-md-4 grid-margin stretch-card">
          <div class="card">
            <div class="card-body">
              <div class="d-flex justify-content-between align-items-baseline">
                <h6 class="card-title mb-3">Pengaduan Baru</h6>
              </div>
              <div class="row">
                <div class="col-6">
                  <h3 class="mb-0">{{ $countpengaduan }}</h3>
                </div>
                <div class="col-6 text-center text-danger">
                  <i class="link-icon" data-feather="file" width="50" height="50"></i>
                </div>
              </div>
            </div>
            <div class="card-footer">
              <div class="stats">
                <a href="{{ route('pengaduan.index')}}">Lihat Detail</a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div> <!-- row -->
  
  <div class="row">
    <div class="col-6 grid-margin">
      <div class="card overflow-hidden">
        <div class="card-body">
          <div class="d-flex justify-content-between align-items-baseline mb-4 mb-md-3">
            <h6 class="card-title mb-0">Grafik Pelaporan Air</h6>
          </div>
          <div class="row align-items-start mb-2">
            <div class="col-md-12">
              <div class="form-group">
                <select class="pelaporan form-control text-dark" data-style="btn btn-link" name="pelaporanyear" id="pelaporanair">
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
          <div class="flot-wrapper mx-auto" style="width: 300px;height: 300px;">
            {!! $pelaporanairchart->container() !!}
            {!! $pelaporanairchart->script() !!}      
          </div>
        </div>
      </div>
    </div>
    <div class="col-6 col-xl-6 grid-margin">
      <div class="card overflow-hidden">
        <div class="card-body">
          <div class="d-flex justify-content-between align-items-baseline mb-4 mb-md-3">
            <h6 class="card-title mb-0">Grafik Pelaporan Udara</h6>
          </div>
          <div class="row align-items-start mb-2">
            <div class="col-md-12">
              <div class="form-group">
                <select class="pelaporan form-control text-dark" data-style="btn btn-link" name="pelaporanyear" id="pelaporanudara">
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
          <div class="flot-wrapper mx-auto" style="width: 300px;height: 300px;">
            {!! $pelaporanudarachart->container() !!}
            {!! $pelaporanudarachart->script() !!}      
          </div>
        </div>
      </div>
    </div>
  </div> <!-- row -->
  
  <div class="row">
    <div class="col-6 grid-margin">
      <div class="card overflow-hidden">
        <div class="card-body">
          <div class="d-flex justify-content-between align-items-baseline mb-4 mb-md-3">
            <h6 class="card-title mb-0">Grafik Pelaporan Limbah B3</h6>
          </div>
          <div class="row align-items-start mb-2">
            <div class="col-md-12">
              <div class="form-group">
                <select class="pelaporan form-control text-dark" data-style="btn btn-link" name="pelaporanyear" id="pelaporanlimbahb3">
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
          <div class="flot-wrapper mx-auto" style="width: 300px;height: 300px;">
            {!! $pelaporanlimbahb3chart->container() !!}
            {!! $pelaporanlimbahb3chart->script() !!}      
          </div>
        </div>
      </div>
    </div>
    <div class="col-6 grid-margin">
      <div class="card overflow-hidden">
        <div class="card-body">
          <div class="d-flex justify-content-between align-items-baseline mb-4 mb-md-3">
            <h6 class="card-title mb-0">Grafik Pelaporan Lingkungan</h6>
          </div>
          <div class="row align-items-start mb-2">
            <div class="col-md-12">
              <div class="form-group">
                <select class="pelaporan form-control text-dark" data-style="btn btn-link" name="pelaporanyear" id="pelaporanlingkungan">
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
          <div class="flot-wrapper mx-auto" style="width: 300px;height: 300px;">
            {!! $pelaporanlingkunganchart->container() !!}
            {!! $pelaporanlingkunganchart->script() !!}      
          </div>
        </div>
      </div>
    </div>
  </div> <!-- row -->

  <div class="row">
    <div class="col-12 col-xl-12 grid-margin stretch-card">
      <div class="card overflow-hidden">
        <div class="card-body">
          <div class="d-flex justify-content-between align-items-baseline mb-4 mb-md-3">
            <h6 class="card-title mb-0">Grafik Pengaduan</h6>
          </div>
          <div class="row align-items-start mb-2">
            <div class="col-md-7">
              <p class="text-muted tx-13 mb-3 mb-md-0">Statistik jumlah pengaduan per-tahun.</p>
            </div>
            <div class="col-md-5 d-flex justify-content-md-end">
              <div class="form-group">
                <select class="pengaduan form-control text-dark" data-style="btn btn-link" name="pengaduanyear">
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
          <div class="flot-wrapper">
              {!! $pengaduanchart->container() !!}
              {!! $pengaduanchart->script() !!}     
          </div>
        </div>
      </div>
    </div>
  </div> <!-- row -->
  
@endsection  

@push('plugin-scripts')
  <script src="{{ asset('assets/plugins/chartjs/Chart.min.js') }}"></script>
  <script src="{{ asset('assets/plugins/jquery.flot/jquery.flot.js') }}"></script>
  <script src="{{ asset('assets/plugins/jquery.flot/jquery.flot.resize.js') }}"></script>
  <script src="{{ asset('assets/plugins/bootstrap-datepicker/js/bootstrap-datepicker.min.js') }}"></script>
  <script src="{{ asset('assets/plugins/apexcharts/apexcharts.min.js') }}"></script>
@endpush

@push('js')
  <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.1/Chart.min.js" charset="utf-8"></script>
  <script type="text/javascript">
      var original_api_url = {{ $pelaporanairchart->id }}_api_url;
      $("#pelaporanair").change(function(){
          var pelaporanyear = $(this).val();
          {{ $pelaporanairchart->id }}_refresh(original_api_url + "?pelaporanyear="+pelaporanyear);
      });
  </script>
  <script type="text/javascript">
    var original_api_url1 = {{ $pelaporanudarachart->id }}_api_url;
    $("#pelaporanudara").change(function(){
        var pelaporanyear = $(this).val();
        {{ $pelaporanudarachart->id }}_refresh(original_api_url1 + "?pelaporanyear="+pelaporanyear);
    });
  </script>
  <script type="text/javascript">
    var original_api_url2 = {{ $pelaporanlimbahb3chart->id }}_api_url;
    $("#pelaporanlimbahb3").change(function(){
        var pelaporanyear = $(this).val();
        {{ $pelaporanlimbahb3chart->id }}_refresh(original_api_url2 + "?pelaporanyear="+pelaporanyear);
    });
  </script>
  <script type="text/javascript">
    var original_api_url3 = {{ $pelaporanudarachart->id }}_api_url;
    $("#pelaporanlingkungan").change(function(){
        var pelaporanyear = $(this).val();
        {{ $pelaporanlingkunganchart->id }}_refresh(original_api_url3 + "?pelaporanyear="+pelaporanyear);
    });
  </script>
  <script type="text/javascript">
    var original_api_url3 = {{ $pengaduanchart->id }}_api_url;
    $(".pengaduan").change(function(){
        var pengaduanyear = $(this).val();
        {{ $pengaduanchart->id }}_refresh(original_api_url3 + "?pengaduanyear="+pengaduanyear);
    });
  </script>
  <script src="{{ asset('assets/js/dashboard.js') }}"></script>
  <script src="{{ asset('assets/js/datepicker.js') }}"></script>
@endpush  

@elsecan('isOperator')

@elsecan('isUser')

@section('content')  
  <div class="row">
    <div class="col-12 col-xl-12 stretch-card">
      <div class="row flex-grow">
        <div class="col-md-3 grid-margin stretch-card">
          <div class="card">
            <div class="card-body">
              <div class="d-flex justify-content-between align-items-baseline">
                <h6 class="card-title mb-3">Pelaporan Air</h6>
              </div>
              <div class="row">
                <div class="col-6">
                  <h3 class="mb-0">{{ $countpelaporanair }}</h3>
                </div>
                <div class="col-6 text-center text-primary">
                  <i class="link-icon" data-feather="file" width="50" height="50"></i>
                </div>
              </div>
            </div>
            <div class="card-footer">
              <div class="stats">
                <a href="{{ route('pelaporan.index')}}">Lihat Detail</a>
              </div>
            </div>
          </div>
        </div>
        <div class="col-md-3 grid-margin stretch-card">
          <div class="card">
            <div class="card-body">
              <div class="d-flex justify-content-between align-items-baseline">
                <h6 class="card-title mb-3">Pelaporan Udara</h6>
              </div>
              <div class="row">
                <div class="col-6">
                  <h3 class="mb-0">{{ $countpelaporanudara }}</h3>
                </div>
                <div class="col-6 text-center text-success">
                  <i class="link-icon" data-feather="file" width="50" height="50"></i>
                </div>
              </div>
            </div>
            <div class="card-footer">
              <div class="stats">
                <a href="{{ route('pelaporan.index')}}">Lihat Detail</a>
              </div>
            </div>
          </div>
        </div>
        <div class="col-md-3 grid-margin stretch-card">
          <div class="card">
            <div class="card-body">
              <div class="d-flex justify-content-between align-items-baseline">
                <h6 class="card-title mb-3">Pelaporan Limbah B3</h6>
              </div>
              <div class="row">
                <div class="col-6">
                  <h3 class="mb-0">{{ $countpelaporanlimbah }}</h3>
                </div>
                <div class="col-6 text-center text-warning">
                  <i class="link-icon" data-feather="file" width="50" height="50"></i>
                </div>
              </div>
            </div>
            <div class="card-footer">
              <div class="stats">
                <a href="{{ route('pelaporan.index')}}">Lihat Detail</a>
              </div>
            </div>
          </div>
        </div>
        <div class="col-md-3 grid-margin stretch-card">
          <div class="card">
            <div class="card-body">
              <div class="d-flex justify-content-between align-items-baseline">
                <h6 class="card-title mb-3">Pelaporan Lingkungan</h6>
              </div>
              <div class="row">
                <div class="col-6">
                  <h3 class="mb-0">{{ $countpelaporanlingkungan }}</h3>
                </div>
                <div class="col-6 text-center text-danger">
                  <i class="link-icon" data-feather="file" width="50" height="50"></i>
                </div>
              </div>
            </div>
            <div class="card-footer">
              <div class="stats">
                <a href="{{ route('pelaporan.index')}}">Lihat Detail</a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div> 
  <!-- row -->
  @if ($countpelaporan == 0)
   
  @else 
 <div class="row">
    <div class="col-md-12">
      <div class="card">
        <div class="card-body">
          <h6 class="card-title">Timeline Pelaporan</h6>
          <div id="content">
            <ul class="timeline">
              @foreach ($pelaporan as $p)
              <li class="event" data-date="{{ $p->created_at->format('d/m/Y-H:i:s') }}">
                <h3>Pelaporan {{ $p->jenis }}</h3>
                <p>Triwulan {{ $p->periode }}</p>
                <p>
                  @if ($p->status == 'Reviewed')
                    <button class="btn btn-success">Telah ditanggapi</button>
                  @else                      
                    <button class="btn btn-warning text-white">Belum ditanggapi</button>
                  @endif
                </p>
              </li>    
              @endforeach
              
            </ul>
          </div>
        </div>
      </div>
    </div>
  </div>  
  @endif
  
@endsection 

@endcan


