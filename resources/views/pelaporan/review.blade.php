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
                      <a class="btn btn-icon-text btn-danger" href="{{ route('pelaporan.index') }}">
                        <i class="btn-icon-prepend" data-feather="chevron-left" width="18" height="18"></i> <span>Kembali</span>
                      </a>
                      </div>

                  </div>
                  <!--/Card image-->
              </div>
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
                        <td style="width: 180px">
                          @if ($pelaporan->jenis == 'Lingkungan')
                              Periode/Semester
                          @else
                              Periode/Triwulan
                          @endif
                        </td>
                        <td style="width: 1px">:</td>
                        <td>{{ $pelaporan->periode }}</td>
                        <td><input type="text" value="{{ $pelaporan->periode }}" name="periode" hidden></td>
                    </tr>
                    <tr>
                      <td style="width: 180px">Tahun</td>
                      <td style="width: 1px">:</td>
                      <td>{{ $pelaporan->tahun }}</td>
                      <td><input type="text" value="{{ $pelaporan->tahun }}" name="tahun" hidden></td>
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
                            <div class="form-check form-check-inline mt-4">
                              <label class="form-check-label">
                                <input type="radio" class="form-check-input" name="kesimpulan" id="Taat" value="Taat">
                                Taat
                              </label>
                            </div>
                            <div class="form-check form-check-inline">
                              <label class="form-check-label">
                                <input type="radio" class="form-check-input" name="kesimpulan" id="Tidak Taat" value="Tidak Taat">
                                Tidak Taat
                              </label>
                            </div>                            
                          </div>
                        </td>
                    </tr>
                    </tbody>
                </table>
              </div>   
                  <button type="submit" class="btn btn-primary">{{ __('Simpan') }}</button>
                   
            </div>
        </form>
      </div>
    </div>
  </div>
</div>
@endsection