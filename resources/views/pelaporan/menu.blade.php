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

        <!-- Card Pengajuan -->
        <div class="row">
         <div class="col-md-12">
            <!-- Card deck -->
            <div class="card-deck">

                <!-- Card Pengajuan Air -->
                <div class="card mb-3">
            
                    <!--Card image-->
                    <div class="view overlay">
                        <img class="card-img-top" src="{{ asset('img') }}/seo-report-green.png" alt="Card image cap" height="200px">
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
                        <img class="card-img-top" src="{{ asset('img') }}/seo-report-blue.png" alt="Card image cap" height="200px">
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
                        <a href="{{ route('pelaporan.form-udara') }}" class="btn btn-light-blue btn-sm btn-info">Klik Disini</a>
                
                    </div>
            
                </div>
                <!-- Card -->

                <!-- Card Pengajuan Limbah B3 -->
                <div class="card mb-3">
            
                    <!--Card image-->
                    <div class="view overlay">
                        <img class="card-img-top" src="{{ asset('img') }}/seo-report-orange.png" alt="Card image cap" height="200px">
                        <a href="#!">
                        <div class="mask rgba-white-slight"></div>
                        </a>
                    </div>
                
                    <!--Card content-->
                    <div class="card-body">
                
                        <!--Title-->
                        <h3 class="card-title">Pengajuan Laporan Limbah B3</h3>
                        <!--Text -->    
                        <p class="card-text"></p>                  
                        <a href="{{ route('pelaporan.form-limbah') }}" class="btn btn-light-blue btn-sm btn-warning">Klik Disini</a>

                    </div>
            
                </div>
                <!-- Card -->

                <!-- Card Pengajuan Lingkungan -->
                <div class="card mb-3">
            
                    <!--Card image-->
                    <div class="view overlay">
                        <img class="card-img-top" src="{{ asset('img') }}/seo-report-red.png" alt="Card image cap" height="200px">
                        <a href="#!">
                        <div class="mask rgba-white-slight"></div>
                        </a>
                    </div>
                
                    <!--Card content-->
                    <div class="card-body">
                
                        <!--Title-->
                        <h3 class="card-title">Pengajuan Laporan Lingkungan</h3>
                        <!--Text -->    
                        <p class="card-text"></p>                  
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