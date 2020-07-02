@extends('layouts.app', ['activePage' => 'pelaporan', 'titlePage' => __('Detail Pelaporan')])

@section('content')
<div class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-12">
        <div class="card">
          <div class="card-header card-header-info">
            <!--Card image-->
            <div class="view view-cascade gradient-card-header blue-gradient narrower d-flex justify-content-between align-items-center">

                <h4 class="card-title ">Detail Pelaporan {{ $pelaporan->nama_perusahaan }}</h4>

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
                    <td colspan="3" class="text-right">Dibuat pada {{ $pelaporan->created_at }}</td>
                  </tr>
                  <tr>
                    <td style="width: 180px">ID</td>
                    <td style="width: 1px">:</td>
                    <td>{{ $pelaporan->id }}</td>
                  </tr>
                  <tr>
                    <td style="width: 180px">Nama Pelapor</td>
                    <td style="width: 1px">:</td>
                    <td>{{ $pelaporan->nama }}</td>
                  </tr>
                  <tr>
                    <td style="width: 180px">Telepon</td>
                    <td style="width: 1px">:</td>
                    <td>{{ $pelaporan->telp }}</td>
                  </tr>
                  <tr>
                    <td style="width: 180px">Nama Perusahaan</td>
                    <td style="width: 1px">:</td>
                    <td>{{ $pelaporan->nama_perusahaan }}</td>
                  </tr>
                  <tr>
                    <td style="width: 180px">Bidang Usaha</td>
                    <td style="width: 1px">:</td>
                    <td>{{ $pelaporan->bidang_usaha }}</td>
                  </tr>
                  <tr>
                    <td style="width: 180px">Periode/Semester</td>
                    <td style="width: 1px">:</td>
                    <td>{{ $pelaporan->periode }}</td>
                  </tr>
                  <tr>
                    <th colspan="3">Jenis Pelaporan Air</th>
                  </tr>  
                  <tr>
                    <td style="width: 180px">Dokumen Pelaporan</td>
                    <td style="width: 1px">:</td>
                    <td><a href="{{ asset('storage/'.$pelaporan->dok_pelaporan_air) }}" target="_blank">Download</a></td>
                  </tr>
                  <tr>
                    <td style="width: 180px">Dokumen Izin</td>
                    <td style="width: 1px">:</td>
                    <td><a href="{{ asset('storage/'.$pelaporan->dok_izin_air) }}" target="_blank">Download</a></td>
                  </tr>
                  <tr>
                    <td style="width: 180px">Dokumen Hasil Uji Lab</td>
                    <td style="width: 1px">:</td>
                    <td><a href="{{ asset('storage/'.$pelaporan->dok_lab_air) }}" target="_blank">Download</a></td>
                  </tr>
                  <tr>
                    <th colspan="3">Jenis Pelaporan Limbah B3</th>
                  </tr>
                  <tr>
                    <td style="width: 180px">Dokumen Pelaporan</td>
                    <td style="width: 1px">:</td>
                    <td><a href="{{ asset('storage/'.$pelaporan->dok_pelaporan_limbah) }}" target="_blank">Download</a></td>
                  </tr>
                  <tr>
                    <td style="width: 180px">Dokumen Izin</td>
                    <td style="width: 1px">:</td>
                    <td><a href="{{ asset('storage/'.$pelaporan->dok_izin_limbah) }}" target="_blank">Download</a></td>
                  </tr>
                  <tr>
                    <td style="width: 180px">Dokumen Hasil Uji Lab</td>
                    <td style="width: 1px">:</td>
                    <td><a href="{{ asset('storage/'.$pelaporan->dok_lab_limbah) }}" target="_blank">Download</a></td>
                  </tr>
                  <tr>
                    <th colspan="3">Jenis Pelaporan Udara</th>
                  </tr>
                  <tr>
                    <td style="width: 180px">Dokumen Pelaporan</td>
                    <td style="width: 1px">:</td>
                    <td><a href="{{ asset('storage/'.$pelaporan->dok_pelaporan_udara) }}" target="_blank">Download</a></td>
                  </tr>
                  <tr>
                    <td style="width: 180px">Dokumen Izin</td>
                    <td style="width: 1px">:</td>
                    <td><a href="{{ asset('storage/'.$pelaporan->dok_izin_udara) }}" target="_blank">Download</a></td>
                  </tr>
                  <tr>
                    <td style="width: 180px">Dokumen Hasil Uji Lab</td>
                    <td style="width: 1px">:</td>
                    <td><a href="{{ asset('storage/'.$pelaporan->dok_lab_udara) }}" target="_blank">Download</a></td>
                  </tr>
                </tbody>
              </table>
            </div>
          </div>
        </div>
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