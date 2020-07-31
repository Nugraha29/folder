@extends('layouts.app', ['activePage' => 'pengaduan', 'titlePage' => __('Data Pengaduan')])
@push('css')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/material-components-web/4.0.0/material-components-web.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.21/css/dataTables.material.min.css">
@endpush
@section('content')
<div class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-12">
        <div class="card">
          <div class="card-header card-header-info">
                <!--Card image-->
                <div class="view view-cascade gradient-card-header blue-gradient narrower d-flex justify-content-between align-items-center">
                  <h4 class="card-title ">Data Pengaduan</h4>
                  <div>
                    <a class="btn btn-sm btn-danger" href="{{ route('pengaduan.export') }}">
                        <i class="material-icons">file_copy</i> {{ __('Export Excel') }}
                    </a>
                  </div>
                </div>
                <!--/Card image-->
              </div>
          <div class="card-body">
            <div class="table-responsive">
              <table id="pengaduan" class="mdl-data-table" style="width:100%">
                <thead class=" text-primary">
                  <th>ID</th>
                  <th>NIK</th>
                  <th>Nama Pengadu</th>
                  <th>Telepon</th>
                  <th>Email</th>
                  <th>Aksi</th>
                </thead>
              </table>
            </div>
          </div>
          <div class="card-footer">
            <nav class="d-flex justify-content-end" aria-label="...">
                {{ $pengaduan->links() }}
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
    $('#pengaduan').DataTable( {
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
        ajax: 'pengaduan/json',
        columns: [
            { data: 'id', name: 'id' },
            { data: 'nik', name: 'nik' },
            { data: 'nama', name: 'nama' },
            { data: 'telp', name: 'telp' },
            { data: 'email', name: 'email' },
            { data: 'action', name: 'action' },
        ]
       
    } );
    var user_id;

    $(document).on('click', '.delete', function(){
      user_id = $(this).attr('id');
      $('#confirmModal').modal('show');
    });

    $('#ok_button').click(function(){
      $.ajax({
      url:"pengaduan/destroy/"+user_id,
      beforeSend:function(){
        $('#ok_button').text('Menghapus data...');
      },
      success:function(data)
      {
        setTimeout(function(){
        $('#confirmModal').modal('hide');
        $('#pengaduan').DataTable().ajax.reload();
        alert('Data Terhapus');
        }, 2000);
      }
      })
    });
  });

</script>
@endpush