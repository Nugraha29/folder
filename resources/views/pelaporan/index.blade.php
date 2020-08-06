@extends('layouts.app', ['activePage' => 'pelaporan', 'titlePage' => __('Data Pelaporan')])
@push('css')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/material-components-web/4.0.0/material-components-web.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.21/css/dataTables.material.min.css">
@endpush
@can('isAdmin')
@section('content')
<div class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-12">
        <div class="card">
          <div class="card-header card-header-info">
            <!--Card image-->
            <div class="view view-cascade gradient-card-header blue-gradient narrower d-flex justify-content-between align-items-center">
              <h4 class="card-title font-weight-bold">Data Pelaporan</h4>
              <div>
                <a class="btn btn-sm btn-danger" href="{{ route('pelaporan.export') }}">
                    <i class="material-icons">file_copy</i> {{ __('Export Excel') }}
                </a>
              </div>
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
              <table id="example" class="mdl-data-table" style="width:100%; text-align: center;">
                <thead class="text-dark">
                  <th>No</th>
                  <th width="17%">Tanggal Pelaporan</th>
                  <th width="14%">Nama Pelapor</th>
                  <th>Telepon</th>
                  <th width="17%">Nama Perusahaan</th>
                  <th width="10%">Periode</th>
                  <th width="17%">Jenis Pelaporan</th>
                  <th width="15%">Aksi</th>
                </thead>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<div id="confirmModal" class="modal fade" role="dialog">
  <div class="modal-dialog">
      <div class="modal-content">
          <div class="modal-header">              
              <h4 class="modal-title">Konfirmasi</h4>
              <button type="button" class="close" data-dismiss="modal">&times;</button>
          </div>
          <div class="modal-body">
              <h5 align="center" style="margin:0;">Apakah Anda yakin akan mengapus data ini?</h5>
          </div>
          <div class="modal-footer">
            <button type="button" name="ok_button" id="ok_button" class="btn btn-sm btn-danger">OK</button>
            <button type="button" class="btn btn-sm" data-dismiss="modal">Batal</button>
          </div>
      </div>
  </div>
</div>
@endsection
@push('js')
<script>
  $(document).ready(function() {
    var t = $('#example').DataTable( {
        language: {
            url: "http://cdn.datatables.net/plug-ins/1.10.9/i18n/Indonesian.json",
            sEmptyTable: "Tidak ada data di database"
        },
        autoWidth: false,
        columnDefs: [
            {
                targets: ['_all'],
                className: 'mdc-data-table__cell'
            }
        ],
        processing: true,
        serverSide: true,
        ajax: 'pelaporan/json',
        columns: [
            { data: 'id', name: 'id' },
            { data: 'created_at', name: 'created_at' },
            { data: 'nama', name: 'nama' },
            { data: 'telp', name: 'telp' },
            { data: 'nama_perusahaan', name: 'nama_perusahaan' },
            { data: 'periode', name: 'periode' },
            { data: 'jenis', name: 'jenis' },
            { data: 'action', name: 'action' },
        ],
        columnDefs:[{targets:1, render:function(data){
          return moment(data).format('D MMMM YYYY');
        }}],
        order: [[1, 'desc']]
       
    } );
    t.on( 'order.dt search.dt', function () {
        t.column(0, {search:'applied', order:'applied'}).nodes().each( function (cell, i) {
            cell.innerHTML = i+1;
        } );
    } ).draw();

    var user_id;

    $(document).on('click', '.delete', function(){
      user_id = $(this).attr('id');
      $('#confirmModal').modal('show');
    });

    $('#ok_button').click(function(){
      $.ajax({
      url:"pelaporan/destroy/"+user_id,
      beforeSend:function(){
        $('#ok_button').text('Menghapus data...');
      },
      success:function(data)
      {
        setTimeout(function(){
        $('#confirmModal').modal('hide');
        $('#example').DataTable().ajax.reload();
        alert('Data Terhapus');
        }, 2000);
      }
      })
    });
  });

</script>
@endpush
@elsecan('isUser')
@section('content')
<div class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-12">
        <div class="card">
          <div class="card-header card-header-info">
            <!--Card image-->
            <div class="view view-cascade gradient-card-header blue-gradient narrower d-flex justify-content-between align-items-center">
              <h4 class="card-title ">Data Pelaporan</h4>
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
                <thead class="text-primary">
                  <th>ID</th>
                  <th>Nama Pelapor</th>
                  <th>Telepon</th>
                  <th>Nama Perusahaan</th>
                  <th>Jenis</th>
                  <th>Periode</th>
                  <th>Aksi</th>
                </thead>
                <tbody>
                  @foreach ($pelaporan as $p)
                      <tr>
                        <td>{{ $p->id }}</td>
                        <td>{{ $p->nama }}</td>
                        <td>{{ $p->telp }}</td>
                        <td>{{ $p->nama_perusahaan}}</td>
                        <td>{{ $p->jenis}}</td>
                        <td>{{ $p->periode}}</td>
                        <td class="text-left">
                          <div class="dropdown">
                              <a class="btn btn-sm btn-icon-only text-light" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="material-icons">settings</i>
                              </a>
                              <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
                                <form action="{{ route('pelaporan.destroy', [$p->id]) }}" method="post">
                                  @csrf
                                  @method('get')                          
                                    <a class="dropdown-item" href="{{ route('pelaporan.show', [$p->id]) }}">{{ __('Lihat Detail') }}</a>
                                    <button type="button" class="dropdown-item" onclick="confirm('{{ __("Are you sure you want to delete this user?") }}') ? this.parentElement.submit() : ''">{{ __('Hapus') }}</button>
                                </form> 
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
                {{ $pelaporan->links() }}
            </nav>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
@endcan