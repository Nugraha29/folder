@extends('layouts.app')

@can('isAdmin')
@section('content')
<div class="row">
  <div class="col-md-12 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <div class="d-flex justify-content-between align-items-center mb-3">
          <h4 class="card-title font-weight-bold">Data Pelaporan</h4>
          <div>
            <a class="btn btn-success" role="button" href="{{ route('pelaporan.export') }}">
              <i class="link-icon" data-feather="file" width="18" height="18"></i> <span>Export</span>
            </a>
          </div>
        </div>
        <div class="table-responsive">
          <table id="dataTablePelaporan" class="table" style="width: 100%; text-align:center;">
            <thead>
              <tr>
                <th>No</th>
                <th>Tanggal Pelaporan</th>
                <th>Nama Pelapor</th>
                <th>Telepon</th>
                <th>Nama Perusahaan</th>
                <th>Periode</th>
                <th>Jenis Pelaporan</th>
                <th>Aksi</th>
              </tr>
            </thead>
          </table>
        </div>
      </div>
    </div>
  </div>
</div>
<div id="confirmModal" class="modal fade" role="dialog">
  <div class="modal-dialog">
      <div class="modal-content">
          <div class="modal-header">              
              <h5 class="modal-title">Konfirmasi</h5>
              <button type="button" class="close" data-dismiss="modal">&times;</button>
          </div>
          <div class="modal-body">
              <h5 align="center" style="margin:0;">Apakah Anda yakin akan mengapus data ini?</h5>
          </div>
          <div class="modal-footer">
            <button type="button" name="ok_button" id="ok_button" class="btn btn-sm btn-success">OK</button>
            <button type="button" class="btn btn-sm btn-danger" data-dismiss="modal">Batal</button>
          </div>
      </div>
  </div>
</div>
@endsection
@push('plugin-scripts')
  <script src="{{ asset('assets/plugins/datatables-net/jquery.dataTables.js') }}"></script>
  <script src="{{ asset('assets/plugins/datatables-net-bs4/dataTables.bootstrap4.js') }}"></script>
@endpush
@push('js')
<script>
  $(document).ready(function() {
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
<script src="{{ asset('assets/js/data-table.js') }}"></script>
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
              <table id="example" class="mdl-data-table" style="width:100%; text-align: center;">
                <thead class="text-dark">
                  <th>No</th>
                  <th width="17%">Tanggal Pelaporan</th>
                  <th width="14%">Nama Pelapor</th>
                  <th width="17%">Nama Perusahaan</th>
                  <th width="10%">Periode</th>
                  <th width="17%">Jenis Pelaporan</th>
                  <th width="10%">Status</th>
                  <th width="15%">Aksi</th>
                </thead>
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
            { data: 'nama_perusahaan', name: 'nama_perusahaan' },
            { data: 'periode', name: 'periode' },
            { data: 'jenis', name: 'jenis' },
            { data: 'status', name: 'status' },
            { data: 'action', name: 'action' },
        ],
        columnDefs:[{targets:1, render:function(data){
          return moment(data).format('D MMMM YYYY');
        }}],
        "createdRow": function ( row, data, index ) {
            if ( data['status'] === 'Reviewed' ) {
              $('td', row).eq(6).html('<button type="button" class="btn btn-sm btn-success">Telah Ditanggapi</button');
            } else {
              $('td', row).eq(6).html('<button type="button" class="btn btn-sm btn-warning">Belum Ditanggapi</button');
            }
        },
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
        $('#dataTablePelaporan').DataTable().ajax.reload();
        alert('Data Terhapus');
        }, 2000);
      }
      })
    });
  });

</script>
@endpush
@endcan