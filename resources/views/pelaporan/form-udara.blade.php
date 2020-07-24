@extends('layouts.app', ['activePage' => 'pengajuan', 'titlePage' => __('Tambah Pelaporan')])

@section('content')
  <div class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-12">
          <form method="post" action="{{ route('pelaporan.store') }}" enctype='multipart/form-data' autocomplete="off" class="form-horizontal">
            @csrf
            @method('post')
            <div class="card ">
              <div class="card-header card-header-info">
                <!--Card image-->
                <div class="view view-cascade gradient-card-header blue-gradient narrower d-flex justify-content-between align-items-center">

                  <h4 class="card-title">Form Pengajuan Pelaporan Udara</h4>

                  <div>
                    <a class="btn btn-sm btn-danger" href="{{ route('pelaporan.menu') }}">
                      <i class="material-icons">keyboard_backspace</i> {{ __('Kembali') }}
                    </a>
                  </div>

                </div>
                <!--/Card image-->
              </div>
              <div class="card-body ">
                @if (session('status'))
                  <div class="row">
                    <div class="col-sm-12">
                      <div class="alert alert-success">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                          <i class="material-icons">close</i>
                        </button>
                        <span>{{ session('status') }}</span>
                      </div>
                    </div>
                  </div>
                @endif
                <div class="row">
                  <label class="col-sm-3 col-form-label text-dark">{{ __('Nama Penanggung Jawab') }}</label>
                  <div class="col-sm-9">
                    <div class="form-group{{ $errors->has('nama') ? ' has-danger' : '' }}">
                      <input class="form-control{{ $errors->has('nama') ? ' is-invalid' : '' }}" name="nama" id="input-nama" type="text" placeholder="{{ __('Nama Penanggung Jawab') }}" value="{{ auth()->user()->name }}" required="true" aria-required="true" readonly/>
                      @if ($errors->has('nama'))
                        <span id="nama-error" class="error text-danger" for="input-nama">{{ $errors->first('nama') }}</span>
                      @endif
                    </div>
                  </div>
                </div>
                <div class="row">
                    <label class="col-sm-3 col-form-label text-dark">{{ __('Telepon') }}</label>
                    <div class="col-sm-9">
                      <div class="form-group{{ $errors->has('telp') ? ' has-danger' : '' }}">
                        <input class="form-control{{ $errors->has('telp') ? ' is-invalid' : '' }}" name="telp" id="input-telp" type="number" placeholder="{{ __('Telepon') }}" value="{{ auth()->user()->telp }}" required="true" aria-required="true" readonly/>
                        @if ($errors->has('telp'))
                          <span id="telp-error" class="error text-danger" for="input-telp">{{ $errors->first('telp') }}</span>
                        @endif
                      </div>
                    </div>
                </div>
                <div class="row">
                    <label class="col-sm-3 col-form-label text-dark">{{ __('Email') }}</label>
                    <div class="col-sm-9">
                      <div class="form-group{{ $errors->has('email') ? ' has-danger' : '' }}">
                        <input class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" id="input-telp" type="email" placeholder="{{ __('Email') }}" value="{{ auth()->user()->email }}" required="true" aria-required="true" readonly/>
                        @if ($errors->has('email'))
                          <span id="email-error" class="error text-danger" for="input-email">{{ $errors->first('email') }}</span>
                        @endif
                      </div>
                    </div>
                </div>
                <div class="row">
                  <label class="col-sm-3 col-form-label text-dark">{{ __('Nama Perusahaan') }}</label>
                  <div class="col-sm-9">
                    <div class="form-group{{ $errors->has('nama_perusahaan') ? ' has-danger' : '' }}">
                      <input class="form-control{{ $errors->has('nama_perusahaan') ? ' is-invalid' : '' }}" name="nama_perusahaan" id="input-nama_perusahaan" type="text" placeholder="{{ __('Nama Penanggung Jawab') }}" value="{{ auth()->user()->nama_perusahaan }}" required="true" aria-required="true" readonly/>
                      @if ($errors->has('nama_perusahaan'))
                        <span id="nama_perusahaan-error" class="error text-danger" for="input-nama_perusahaan">{{ $errors->first('nama_perusahaan') }}</span>
                      @endif
                    </div>
                  </div>
                </div>
                <div class="row">
                    <label class="col-sm-3 col-form-label text-dark">{{ __('Bidang Usaha') }}</label>
                    <div class="col-sm-9">
                      <div class="form-group">
                        <select class="form-control" data-style="btn btn-link" name="bidang_usaha" id="input-bidang_usaha" required>
                          <option disabled selected>Pilih Bidang Usaha</option>   
                          <optgroup label="Fasilitas Kesehatan">
                            <option value="Apotek">Apotek</option>
                            <option value="Toko Obat">Toko Obat</option>
                            <option value="Klinik">Klinik</option>
                            <option value="Puskesmas">Puskesmas</option>
                            <option value="Rumah Sakit">Rumah Sakit</option>
                            <option value="Lab Kesehatan">Lab Kesehatan</option>
                          </optgroup>
                          <optgroup label="Pertambangan Energi dan Mineral">
                            <option value="Pertambangan">Pertambangan</option>
                            <option value="Energi">Energi</option>
                            <option value="Mineral">Mineral</option>
                            <option value="Panas Bumi<">Panas Bumi</option>
                          </optgroup>                       
                          <optgroup label="Industri">
                            <option value="Makanan Olahan">Makanan Olahan</option>
                            <option value="Bahan Baku">Bahan Baku</option>
                            <option value="Perikanan">Perikanan</option>
                            <option value="Pertanian">Pertanian</option>
                            <option value="Perkebunan">Perkebunan</option>
                            <option value="Peternakan">Peternakan</option>
                          </optgroup>
                          <optgroup label="Sektor Domestik">
                            <option value="Perumahan">Perumahan</option>
                            <option value="Rumah Makan">Rumah Makan</option>
                            <option value="Hotel">Hotel</option>
                          </optgroup>
                          <option value="Lainnya">Lainnya</option>
                        </select>
                      </div>
                    </div>
                </div>
                <div class="row">
                  <label class="col-sm-3 col-form-label text-dark">{{ __('Jenis Pelaporan') }}</label>
                  <div class="col-sm-9">
                    <div class="form-group{{ $errors->has('jenis') ? ' has-danger' : '' }}">
                      <input class="form-control{{ $errors->has('jenis') ? ' is-invalid' : '' }}" name="jenis" id="input-jenis" type="text" value="Udara" required="false" aria-required="false" readonly/>
                      @if ($errors->has('jenis'))
                        <span id="jenis-error" class="error text-danger" for="input-jenis">{{ $errors->first('jenis') }}</span>
                      @endif
                    </div>
                  </div>
                </div>
                <div class="row">
                  <label class="col-sm-3 col-form-label text-dark">{{ __('Periode/Triwulan') }}</label>
                  <div class="col-sm-9">
                    <div class="form-group">
                      <div class="form-check form-check-radio">
                        <label class="form-check-label">
                            <input class="form-check-input" type="radio" name="periode" id="1" value="1" required>
                            1
                            <span class="circle">
                                <span class="check"></span>
                            </span>
                        </label>
                      </div>
                      <div class="form-check form-check-radio">
                        <label class="form-check-label">
                            <input class="form-check-input" type="radio" name="periode" id="2" value="2">
                            2
                            <span class="circle">
                                <span class="check"></span>
                            </span>
                        </label>
                      </div>

                      <div class="form-check form-check-radio">
                        <label class="form-check-label">
                            <input class="form-check-input" type="radio" name="periode" id="3" value="3">
                            3
                            <span class="circle">
                                <span class="check"></span>
                            </span>
                        </label>
                      </div>

                      <div class="form-check form-check-radio">
                        <label class="form-check-label">
                            <input class="form-check-input" type="radio" name="periode" id="4" value="4">
                            4
                            <span class="circle">
                                <span class="check"></span>
                            </span>
                        </label>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <label class="col-sm-3 col-form-label text-dark">{{ __('Unggah Dok.Pelaporan') }}</label>
                  <div class="col-sm-9">
                    <div class="form-group{{ $errors->has('dok_pelaporan') ? ' has-danger' : '' }} text-left">
                      <label class="form-control-label custom-file-upload" for="input-dok_pelaporan">
                        <i class="fa fa-cloud-upload"></i> {{ __('Dokumen Pelaporan') }}
                      </label>
                      <input type="file" name="dok_pelaporan" id="input-dok_pelaporan" class="form-control form-control-alternative{{ $errors->has('dok_pelaporan') ? ' is-invalid' : '' }}" placeholder="{{ __('Dokumen Pelaporan') }}" value="{{ old('dok_pelaporan') }}" style="display:none;" autofocus required>
                      @if ($errors->has('dok_pelaporan'))
                          <span class="invalid-feedback" role="alert">
                              <strong>{{ $errors->first('dok_pelaporan') }}</strong>
                          </span>
                      @endif
                    </div>
                  </div>
                </div>
                <div class="row">
                  <label class="col-sm-3 col-form-label text-dark">{{ __('Unggak Dok.Izin') }}</label>
                  <div class="col-sm-9">
                    <div class="form-group{{ $errors->has('dok_izin') ? ' has-danger' : '' }} text-left">
                      <label class="form-control-label custom-file-upload" for="input-dok_izin">
                        <i class="fa fa-cloud-upload"></i> {{ __('Dokumen Izin') }}
                      </label>
                      <input type="file" name="dok_izin" id="input-dok_izin" class="form-control form-control-alternative{{ $errors->has('dok_izin') ? ' is-invalid' : '' }}" placeholder="{{ __('Dokumen Izin') }}" value="{{ old('dok_izin') }}" style="display:none;" autofocus required>
                      @if ($errors->has('dok_izin'))
                          <span class="invalid-feedback" role="alert">
                              <strong>{{ $errors->first('dok_izin') }}</strong>
                          </span>
                      @endif
                    </div>
                  </div>
                </div>
                <div class="row">
                  <label class="col-sm-3 col-form-label text-dark">{{ __('Unggak Dok.Uji Lab') }}</label>
                  <div class="col-sm-9">
                    <div class="form-group{{ $errors->has('dok_lab') ? ' has-danger' : '' }} text-left">
                      <label class="form-control-label custom-file-upload" for="input-dok_lab">
                        <i class="fa fa-cloud-upload"></i> {{ __('Dokumen Hasil Uji Lab') }}
                      </label>
                      <input type="file" name="dok_lab" id="input-dok_lab" class="form-control form-control-alternative{{ $errors->has('dok_lab') ? ' is-invalid' : '' }}" placeholder="{{ __('Dokumen Hasil Uji Lab') }}" value="{{ old('dok_lab') }}" style="display:none;" autofocus required>
                      @if ($errors->has('dok_lab'))
                          <span class="invalid-feedback" role="alert">
                              <strong>{{ $errors->first('dok_lab') }}</strong>
                          </span>
                      @endif
                    </div>
                  </div>
                </div>
              </div>
              <div class="card-footer ml-auto mr-auto">
                <button type="submit" class="btn btn-info">{{ __('Simpan') }}</button>
              </div>
            </div>            
          </form>
        </div>
      </div>
    </div>
  </div>   
@endsection