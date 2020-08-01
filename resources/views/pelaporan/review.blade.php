@extends('layouts.app', ['activePage' => 'pelaporan', 'titlePage' => __('Detail Pelaporan')])

@section('content')
<div class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-12">
        <form method="post" action="{{ route('pelaporan.review') }}" autocomplete="off" class="form-horizontal">
            @csrf
            @method('put')
            <div class="card">
            <div class="card-header card-header-info">
                <!--Card image-->
                <div class="view view-cascade gradient-card-header blue-gradient narrower d-flex justify-content-between align-items-center">

                    <h4 class="card-title ">Detail Pelaporan HIMAGRIB</h4>

                    <div>
                    <a class="btn btn-sm btn-danger" href="{{ route('pelaporan.index') }}">
                        <i class="material-icons">keyboard_backspace</i> {{ __('Kembali') }}
                    </a>
                    </div>

                </div>
                <!--/Card image-->
            </div>
            <div class="card-body">
                <div class="table-responsive">
                <table class="table">
                    <tbody>
                    <tr>
                        <td style="width: 180px">ID</td>
                        <td style="width: 1px">:</td>
                        <td>{{ $pelaporan->id }}</td>
                        <td><input type="text" value="{{ $pelaporan->id }}" name="pelaporan_id" hidden></td>
                    </tr>
                    <tr>
                        <td style="width: 180px">Nama Pelapor</td>
                        <td style="width: 1px">:</td>
                        <td>{{ $pelaporan->nama }}</td>
                        <td><input type="text" value="{{ $pelaporan->nama }}" name="nama_pelapor" hidden></td>
                    </tr>
                    <tr>
                        <td style="width: 180px">Telepon</td>
                        <td style="width: 1px">:</td>
                        <td>{{ $pelaporan->telp }}</td>
                        <td></td>
                    </tr>
                    <tr>
                        <td style="width: 180px">Email</td>
                        <td style="width: 1px">:</td>
                        <td>{{ $pelaporan->email }}</td>
                        <td><input type="text" value="{{ $pelaporan->email }}" name="email" hidden></td>
                    </tr>
                    <tr>
                        <td style="width: 180px">Nama Perusahaan</td>
                        <td style="width: 1px">:</td>
                        <td>{{ $pelaporan->nama_perusahaan }}</td>
                        <td><input type="text" value="{{ $pelaporan->nama_perusahaan }}" name="nama_perusahaan" hidden></td>
                    </tr>
                    <tr>
                        <td style="width: 180px">Bidang Usaha</td>
                        <td style="width: 1px">:</td>
                        <td>{{ $pelaporan->bidang_usaha }}</td>
                        <td><input type="text" value="{{ $pelaporan->bidang_usaha }}" name="bidang_usaha" hidden></td>
                    </tr>
                    <tr>
                        <td style="width: 180px">Jenis Pelaporan</td>
                        <td style="width: 1px">:</td>
                        <td>{{ $pelaporan->jenis }}</td>
                        <td><input type="text" value="{{ $pelaporan->jenis }}" name="jenis" hidden></td>
                    </tr>
                    <tr>
                        <td style="width: 180px">Periode</td>
                        <td style="width: 1px">:</td>
                        <td>{{ $pelaporan->periode }}</td>
                        <td><input type="text" value="{{ $pelaporan->periode }}" name="periode" hidden></td>
                    </tr>
                    <tr>
                        <td style="width: 180px">Dokumen Pelaporan</td>
                        <td style="width: 1px">:</td>
                        <td><a href="{{ asset('storage/'.$pelaporan->dok_pelaporan) }}" target="_blank">Download</a></td>
                        <td>
                            <div class="form-group">
                                <input class="form-control" name="review_dok_pelaporan" type="text" placeholder="{{ __('Tanggapi Dokumen Pelaporan') }}" required="true" aria-required="true"/>
                            </div> 
                        </td>
                    </tr>
                    <tr>
                        <td style="width: 180px">Dokumen Izin</td>
                        <td style="width: 1px">:</td>
                        <td><a href="{{ asset('storage/'.$pelaporan->dok_izin) }}" target="_blank">Download</a></td>
                        <td>
                            <div class="form-group">
                                <input class="form-control" name="review_dok_izin" type="text" placeholder="{{ __('Tanggapi Dokumen Izin') }}" required="true" aria-required="true"/>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td style="width: 180px">Dokumen Hasil Uji Lab</td>
                        <td style="width: 1px">:</td>
                        <td><a href="{{ asset('storage/'.$pelaporan->dok_lab) }}" target="_blank">Download</a></td>
                        <td style="width: 600px">
                            <div class="form-group">
                                <input class="form-control" name="review_dok_lab" type="text" placeholder="{{ __('Tanggapi Dokumen Hasil Uji Lab') }}" required="true" aria-required="true"/>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td style="width: 180px">Kesimpulan</td>
                        <td style="width: 1px">:</td>
                        <td colspan="2">
                            <div class="form-group">
                                <div class="form-check form-check-radio">
                                  <label class="form-check-label">
                                      <input class="form-check-input" type="radio" name="kesimpulan" id="taat" value="Taat" required>
                                      Taat
                                      <span class="circle">
                                          <span class="check"></span>
                                      </span>
                                  </label>
                                </div>
                                <div class="form-check form-check-radio">
                                  <label class="form-check-label">
                                      <input class="form-check-input" type="radio" name="kesimpulan" id="tidaktaat" value="Tidak Taat" required>
                                      Tidak Taat
                                      <span class="circle">
                                          <span class="check"></span>
                                      </span>
                                  </label>
                                </div>                                
                            </div>
                        </td>
                        
                    </tr>

                    </tbody>
                </table>
                </div>
            </div>      
            <div class="card-footer ml-auto mr-auto">
                <button type="submit" class="btn btn-primary">{{ __('Simpan') }}</button>
            </div>      
            </div>
        </form>
      </div>
    </div>
    <!--
      <div class="row">
        <div class="col-md-12">
          <div class="card">
            <div class="card-header card-header-primary">
              <div class="view view-cascade gradient-card-header blue-gradient narrower d-flex justify-content-between align-items-center">
                  <h4 class="card-title ">Matriks Pengelolaan dan Pemantauan Lingkungan</h4>
              </div>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table">
                  <tbody>
                    <tr>
                      <td>ID</td>
                      <td>{{ $pelaporan->id }}</td>
                    </tr>
                    <tr>
                      <td>Nama Pelapor</td>
                      <td>{{ $pelaporan->nama }}</td>
                    </tr>
                    <tr>
                      <td>Telepon</td>
                      <td>{{ $pelaporan->telp }}</td>
                    </tr>
                    <tr>
                      <td>Nama Perusahaan</td>
                      <td>{{ $pelaporan->nama_perusahaan }}</td>
                    </tr>
                    <tr>
                      <td>Bidang Usaha</td>
                      <td>{{ $pelaporan->bidang_usaha }}</td>
                    </tr>
                    <tr>
                      <td>Periode Semester</td>
                      <td>1</td>
                    </tr>
                    <tr>
                      <td>Deskripsi</td>
                      <td>Laporan Himagrib selama 6 bulan.</td>
                    </tr>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>
    -->
  </div>
</div>
@endsection