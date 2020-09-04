@extends('layouts.app')

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
               <div class="card-deck">
   
                <div class="card mb-12">    
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
                    <form action="{{ route('pelaporan.form-status')}}" method="POST">
                            @csrf
                        <div class="card-body">
                            
                                <div class="form-group">
                                <label for="filter">Pilih periode, tahun dan jenis pelaporan</label>
                                <div class="row">
                                    <div class="col-4">
                                        <select class="form-control" id="periode" name="periode" required>
                                            <option selected disabled>Pilih Periode</option>
                                            <option value="1">1</option>
                                            <option value="2">2</option>
                                            <option value="3">3</option>
                                            <option value="4">4</option>
                                        </select> 
                                       @if ($errors->has('periode'))
                                        <div id="periode-error" class="error text-danger pt-1" for="periode" style="display: block;">
                                            <strong>{{ $errors->first('periode') }}</strong>
                                        </div>
                                        @endif 
                                    </div>
                                    
                                    <div class="col-4">
                                        <select class="form-control" id="tahun" name="tahun" required>
                                            <option selected disabled>Pilih Tahun</option>
                                            <option value="2025">2025</option>
                                            <option value="2024">2024</option>
                                            <option value="2023">2023</option>
                                            <option value="2022">2022</option>
                                            <option value="2021">2021</option>
                                            <option value="2020">2020</option>
                                            <option value="2019">2019</option>
                                        </select>
                                        @if ($errors->has('tahun'))
                                        <div id="tahun-error" class="error text-danger pt-1" for="tahun" style="display: block;">
                                            <strong>{{ $errors->first('tahun') }}</strong>
                                        </div>
                                        @endif
                                    </div>
                                    
                                    <div class="col-4">
                                        <select class="form-control" id="jenis" name="jenis" required>
                                            <option selected disabled>Pilih Jenis Pelaporan</option>
                                            <option value="Air">Pelaporan Air</option>
                                            <option value="Udara">Pelaporan Udara</option>
                                            <option value="LimbahB3">Pelaporan Limbah B3</option>
                                            <option value="Lingkungan">Pelaporan Lingkungan</option>
                                        </select>
                                        @if ($errors->has('jenis'))
                                        <div id="jenis-error" class="error text-danger pt-1" for="jenis" style="display: block;">
                                            <strong>{{ $errors->first('jenis') }}</strong>
                                        </div>
                                        @endif
                                    </div>
                                </div>    
                                </div>
                                @if ($errors->has('bidang_usaha'))
                                    <div id="bidang_usaha-error" class="error text-danger pt-1" for="bidang_usaha" style="display: block;">
                                        <strong>{{ $errors->first('bidang_usaha') }}</strong>
                                    </div>
                                @endif
                                @if ($errors->has('dok_pelaporan'))
                                    <div id="dok_pelaporan-error" class="error text-danger pt-1" for="dok_pelaporan" style="display: block;">
                                        <strong>{{ $errors->first('dok_pelaporan') }}</strong>
                                    </div>
                                @endif  
                                @if ($errors->has('dok_lab'))
                                    <div id="dok_lab-error" class="error text-danger pt-1" for="dok_lab" style="display: block;">
                                        <strong>{{ $errors->first('dok_lab') }}</strong>
                                    </div>
                                @endif  
                                @if ($errors->has('dok_izin'))
                                    <div id="dok_izin-error" class="error text-danger pt-1" for="dok_izin" style="display: block;">
                                        <strong>{{ $errors->first('dok_izin') }}</strong>
                                    </div>
                                @endif  
                        </div>
                        <div class="card-footer text-right">
                            <button type="submit" class="btn btn-primary">Selanjutnya</button>
                        </div>
                    </form>
                </div>
                   
               </div>
            </div>
        </div> 
        
    </div>
  </div>
@endsection