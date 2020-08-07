$(function() {
  'use strict';

  $(function() {
    $('#dataTablePelaporan').DataTable({
      "language": {
        url: "http://cdn.datatables.net/plug-ins/1.10.9/i18n/Indonesian.json",
        sEmptyTable: "Tidak ada data di database"
      },
      "processing": true,
      "serverSide": true,
      "ajax": {
          url: "pelaporan/json",
      },
      "columns": [
          { data: 'id', name: 'id' },
          { data: 'created_at', name: 'created_at' },
          { data: 'nama', name: 'nama' },
          { data: 'telp', name: 'telp' },
          { data: 'nama_perusahaan', name: 'nama_perusahaan' },
          { data: 'periode', name: 'periode' },
          { data: 'jenis', name: 'jenis' },
          { data: 'action', name: 'action' },
      ],
      "order": [[1, 'desc']]
    });
    $('#dataTablePelaporan').each(function() {
      var datatable = $(this);
      // SEARCH - Add the placeholder for Search and Turn this into in-line form control
      var search_input = datatable.closest('.dataTables_wrapper').find('div[id$=_filter] input');
      search_input.attr('placeholder', 'Search');
      search_input.removeClass('form-control-sm');
      // LENGTH - Inline-Form control
      var length_sel = datatable.closest('.dataTables_wrapper').find('div[id$=_length] select');
      length_sel.removeClass('form-control-sm');
    });
  });

  $(function() {
    $('#dataTableRiwayat').DataTable({
      "language": {
        url: "http://cdn.datatables.net/plug-ins/1.10.9/i18n/Indonesian.json",
        sEmptyTable: "Tidak ada data di database"
      },
      "processing": true,
      "serverSide": true,
      "ajax": {
          url: "tanggapan/json",
      },
      "columns": [
        { data: 'id', name: 'id' },
        { data: 'created_at', name: 'created_at' },
        { data: 'nama', name: 'nama' },
        { data: 'nama_pelapor', name: 'nama_pelapor' },
        { data: 'nama_perusahaan', name: 'nama_perusahaan' },
        { data: 'jenis', name: 'jenis' },
        { data: 'periode', name: 'periode' },
        { data: 'action', name: 'action' },
      ],
      "order": [[1, 'desc']]
    });
    $('#dataTableRiwayat').each(function() {
      var datatable = $(this);
      // SEARCH - Add the placeholder for Search and Turn this into in-line form control
      var search_input = datatable.closest('.dataTables_wrapper').find('div[id$=_filter] input');
      search_input.attr('placeholder', 'Search');
      search_input.removeClass('form-control-sm');
      // LENGTH - Inline-Form control
      var length_sel = datatable.closest('.dataTables_wrapper').find('div[id$=_length] select');
      length_sel.removeClass('form-control-sm');
    });
  });
  
  $(function() {
    $('#dataTablePengaduan').DataTable({
      "language": {
        url: "http://cdn.datatables.net/plug-ins/1.10.9/i18n/Indonesian.json",
        sEmptyTable: "Tidak ada data di database"
      },
      "processing": true,
      "serverSide": true,
      "ajax": {
          url: "pengaduan/json",
      },
      "columns": [
        { data: 'id', name: 'id' },
        { data: 'created_at', name: 'created_at' },
        { data: 'nama', name: 'nama' },
        { data: 'telp', name: 'telp' },
        { data: 'email', name: 'email' },
        { data: 'action', name: 'action' },
      ],
      "order": [[1, 'desc']]
    });
    $('#dataTablePengaduan').each(function() {
      var datatable = $(this);
      // SEARCH - Add the placeholder for Search and Turn this into in-line form control
      var search_input = datatable.closest('.dataTables_wrapper').find('div[id$=_filter] input');
      search_input.attr('placeholder', 'Search');
      search_input.removeClass('form-control-sm');
      // LENGTH - Inline-Form control
      var length_sel = datatable.closest('.dataTables_wrapper').find('div[id$=_length] select');
      length_sel.removeClass('form-control-sm');
    });
  });
});
