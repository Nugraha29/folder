@extends('layouts.app', ['activePage' => 'index', 'titlePage' => __('Data Pengguna')])

@section('content')
<div class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-12">
        <div class="card">
          <div class="card-header card-header-info">
            <!--Card image-->
            <div class="view view-cascade gradient-card-header blue-gradient narrower d-flex justify-content-between align-items-center">

              <h4 class="card-title ">Data Pengguna</h4>
              <!--
              <div>
                <a class="btn btn-sm btn-danger" href="{{ route('user.create') }}">
                  <i class="material-icons">add</i>{{ __('Tambah') }}
                </a>
              </div>
              -->
            </div>
            <!--/Card image-->
          </div>
          
          <div class="card-body">
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
            <div class="table-responsive">
              <table class="table">
                <thead class="text-center">
                  <th>ID</th>
                  <th>Nama</th>
                  <th>Email</th>
                  <th>Telepon</th>
                  <th>Nama Perusahaan</th>
                  <th>Jabatan</th>
                  <th>Status</th>
                  <th>Aksi</th>
                </thead>
                <tbody class="text-center">
                @foreach ($users as $user)
                  <tr>
                    <td>{{ $user->id }}</td>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    <td>{{ $user->telp }}</td>
                    <td>{{ $user->nama_perusahaan }}</td>
                    <td>{{ $user->jabatan }}</td>
                    <td>
                      @if ($user->status == 'aktif')
                        <a class="btn-success btn-rounded btn-sm text-white"> {{ $user->status }}</a>
                      @else
                        <a class="btn-warning btn-rounded btn-sm text-white"> {{ $user->status }}</a>
                      @endif
                    </td>
                    <td class="text-right">
                      <div class="dropdown">
                          <a class="btn btn-sm btn-icon-only text-light" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="material-icons">settings</i>
                          </a>
                          <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
                              @if ($user->id != auth()->id())
                                  @if ($user->status == 'aktif')
                                    <form action="{{ route('user.aktivasi', [$user->id]) }}" method="post">
                                      @csrf
                                      @method('put')
                                      <input type="text" name="aktivasi" value="menunggu" hidden>
                                      <button type="button" class="dropdown-item" onclick="confirm('{{ __("Yakin untuk menonaktifkan pengguna ini?") }}') ? this.parentElement.submit() : ''">
                                            {{ __('Aktivasi') }}
                                      </button>
                                    </form>  
                                  @else
                                    <form action="{{ route('user.aktivasi', [$user->id]) }}" method="post">
                                      @csrf
                                      @method('put')
                                      <input type="text" name="aktivasi" value="aktif" hidden>
                                      <button type="button" class="dropdown-item" onclick="confirm('{{ __("Yakin untuk mengaktifkan pengguna ini?") }}') ? this.parentElement.submit() : ''">
                                            {{ __('Aktivasi') }}
                                      </button>
                                    </form>   
                                  @endif
                                  
                                  <form action="{{ route('user.destroy', [$user->id]) }}" method="post">
                                      @csrf
                                      @method('delete')
                                      <a class="dropdown-item" href="{{ route('user.edit', [$user->id]) }}">{{ __('Edit') }}</a>
                                      <button type="button" class="dropdown-item" onclick="confirm('{{ __("Yakin untuk menghapus pengguna ini?") }}') ? this.parentElement.submit() : ''">
                                          {{ __('Hapus') }}
                                      </button>
                                  </form>    
                              @else
                                  <a class="dropdown-item" href="{{ route('user.edit', [$user->id]) }}">{{ __('Edit') }}</a>
                              @endif
                          </div>
                      </div>
                    </td>
                  </tr>                    
                @endforeach
                </tbody>
              </table>
            </div>
          </div>
          <div class="card-footer">
            <nav class="d-flex justify-content-end" aria-label="...">
                {{ $users->links() }}
            </nav>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection