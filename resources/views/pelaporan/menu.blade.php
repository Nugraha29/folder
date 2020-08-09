@extends('layouts.app', ['activePage' => 'pengajuan', 'titlePage' => __('Menu Pelaporan')])

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

        <!-- 
        <div class="row mt-3">
            <div class="col-md-12">
               <div class="card-deck">
   
                   <div class="card mb-12">            
                   
                       <div class="card-body">
                        <form action="{{ route('pelaporan.menu')}}" method="get">
                        @csrf
                          <div class="form-group">
                            <label for="filter">Select Input</label>
                            <div class="row">
                                <div class="col-3">
                                    <select class="form-control" id="filter" name="periode">
                                        <option selected disabled>Pilih Periode</option>
                                        <option value="1">1</option>
                                        <option value="2">2</option>
                                        <option value="3">3</option>
                                        <option value="4">4</option>
                                    </select> 
                                </div>
                                <div class="col-3">
                                    <select class="form-control" id="filter" name="tahun">
                                        <option selected disabled>Pilih Tahun</option>
                                        <option value="2025">2025</option>
                                        <option value="2024">2024</option>
                                        <option value="2023">2023</option>
                                        <option value="2022">2022</option>
                                        <option value="2021">2021</option>
                                        <option value="2020">2020</option>
                                        <option value="2019">2019</option>
                                    </select>
                                </div>
                                <div class="col-3">
                                    <button type="submit" class="btn btn-primary btn-icon"><i class="link-icons" data-feather="search"></i></button>
                                </div>
                            </div>    
                          </div>
                        </form>
                       </div>
               
                   </div>
               
               </div>
            </div>
        </div> 
        -->

        <!-- Card Pengajuan -->
        <div class="row mt-3">
         <div class="col-md-12">
            <!-- Card deck -->
            <div class="card-deck">

                <!-- Card Pengajuan Air -->
                <div class="card mb-3">
            
                    <!--Card image-->
                    <div class="view overlay">
                        <img class="card-img-top" src="{{ asset('assets') }}/images/seo-report-green.png" alt="Card image cap" height="200px">
                        <a href="#!">
                        <div class="mask rgba-white-slight"></div>
                        </a>
                    </div>
                
                    <!--Card content-->
                    <div class="card-body">
                
                        <!--Title-->
                        <h3 class="card-title">Pengajuan Laporan Air</h3>
                        <!--Text -->    
                        <p class="card-text">&nbsp;</p> 
                        <a href="{{ route('pelaporan.form-air') }}" class="btn btn-light-blue btn-sm btn-success">Klik Disini</a>

                
                    </div>
            
                </div>
                <!-- Card -->

                <!-- Card Pengajuan Udara -->
                <div class="card mb-3">
            
                    <!--Card image-->
                    <div class="view overlay">
                        <img class="card-img-top" src="{{ asset('assets') }}/images/seo-report-blue.png" alt="Card image cap" height="200px">
                        <a href="#!">
                        <div class="mask rgba-white-slight"></div>
                        </a>
                    </div>
                
                    <!--Card content-->
                    <div class="card-body">
                
                        <!--Title-->
                        <h3 class="card-title">Pengajuan Laporan Udara</h3>
                        <!--Text -->    
                        <p class="card-text">&nbsp;</p> 
                        <a href="{{ route('pelaporan.form-udara') }}" class="btn btn-light-blue btn-sm btn-info text-white">Klik Disini</a>
                
                    </div>
            
                </div>
                <!-- Card -->

                <!-- Card Pengajuan Limbah B3 -->
                <div class="card mb-3">
            
                    <!--Card image-->
                    <div class="view overlay">
                        <img class="card-img-top" src="{{ asset('assets') }}/images/seo-report-orange.png" alt="Card image cap" height="200px">
                        <a href="#!">
                        <div class="mask rgba-white-slight"></div>
                        </a>
                    </div>
                
                    <!--Card content-->
                    <div class="card-body">
                
                        <!--Title-->
                        <h3 class="card-title">Pengajuan Laporan Limbah B3</h3>
                        <!--Text -->    
                        <p class="card-text">&nbsp;</p>                  
                        <a href="{{ route('pelaporan.form-limbah') }}" class="btn btn-light-blue btn-sm btn-warning text-white">Klik Disini</a>

                    </div>
            
                </div>
                <!-- Card -->

                <!-- Card Pengajuan Lingkungan -->
                <div class="card mb-3">
            
                    <!--Card image-->
                    <div class="view overlay">
                        <img class="card-img-top" src="{{ asset('assets') }}/images/seo-report-red.png" alt="Card image cap" height="200px">
                        <a href="#!">
                        <div class="mask rgba-white-slight"></div>
                        </a>
                    </div>
                
                    <!--Card content-->
                    <div class="card-body">
                
                        <!--Title-->
                        <h3 class="card-title">Pengajuan Laporan Lingkungan</h3>
                        <!--Text -->    
                        <p class="card-text">&nbsp;</p>                  
                        <a href="{{ route('pelaporan.form-lingkungan') }}" class="btn btn-light-blue btn-sm btn-danger">Klik Disini</a>

                    </div>
            
                </div>
                <!-- Card -->
            
            </div>
            <!-- Card deck -->
         </div>
        </div> 
        <!-- Card Pengajuan-->
        
    </div>
  </form>
  </div>
@endsection