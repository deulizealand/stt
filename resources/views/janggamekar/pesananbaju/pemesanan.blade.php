@extends('adminlte::page')

@section('content')
<!-- Main content -->
<section class="content">
  <!-- Small boxes (Stat box) -->
  <div class="row">
    <div class="col-lg-3 col-xs-6">
      <!-- small box -->
      <div class="small-box bg-aqua">
        <div class="inner">
          <h3>{{$bb}}</h3>

          <p>Belum Bayar</p>
        </div>
        <div class="icon">
          <i class="ion ion-bag"></i>
        </div>
        <a href="/janggamekar/pesananbaju/belumbayar" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
      </div>
    </div>
    <!-- ./col -->
    <div class="col-lg-3 col-xs-6">
      <!-- small box -->
      <div class="small-box bg-green">
        <div class="inner">
          <h3>{{$bayar}}<sup style="font-size: 20px"></sup></h3>

          <p>Sudah Bayar</p>
        </div>
        <div class="icon">
          <i class="ion ion-stats-bars"></i>
        </div>
        <a href="/janggamekar/pesananbaju/sudahbayar" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
      </div>
    </div>
    <!-- ./col -->
    <div class="col-lg-3 col-xs-6">
      <!-- small box -->
      <div class="small-box bg-yellow">
        <div class="inner">
          <h3>{{$tot}}</h3>

          <p>Total Pemesan</p>
        </div>
        <div class="icon">
          <i class="ion ion-person-add"></i>
        </div>
        <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
      </div>
    </div>
    <!-- ./col -->
    <div class="col-lg-3 col-xs-6">
      <!-- small box -->
      <div class="small-box bg-red">
        <div class="inner">
          <h3>65</h3>

          <p>Yang tidak Memesan</p>
        </div>
        <div class="icon">
          <i class="ion ion-pie-graph"></i>
        </div>
        <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
      </div>
    </div>
    <!-- ./col -->
  </div>
  <!-- /.row -->
  <!-- Main row -->




              <table id="pemasukan-table" class="=Table table-striped"  cellspacing="0" width="100%">
              <thead>
                  <tr>
                  <th>ID</th>
                  <th>Nama</th>
                  <th> Jenis</th>
                  <th> Ukuran</th>
                  <th>Jumlah</th>
                  <th> Status </th>
                  <th> Tanggal Bayar</th>
                  <th></th>
                  </tr>
              </thead>
              </table>


            <!-- Bootstrap core JavaScript
            ================================================== -->
            <!-- Placed at the end of the document so the pages load faster -->
            <script src="{{ asset('jquery/jquery-1.12.4.min.js') }}"></script>
            <script src="{{ asset('bootstrap/js/bootstrap.min.js') }}"></script>

            {{-- dataTables --}}

            <script src="{{ asset('dataTables/js/jquery.dataTables.min.js ' ) }}  "></script>
            <script src="{{ asset('dataTables/js/dataTables.bootstrap.min.js') }}"></script>


            {{-- Validator --}}
            <script src="{{ asset('validator/validator.min.js') }}"></script>

        <script type="text/javascript">
          $('#pemasukan-table').DataTable({
            language: {
              "sProcessing": "Sedang memproses...",
      "sLengthMenu": "Tampilkan _MENU_ entri",
      "sZeroRecords": "Tidak ditemukan data yang sesuai",
      "sInfo": "Menampilkan _START_ sampai _END_ dari _TOTAL_ entri",
      "sInfoEmpty": "Menampilkan 0 sampai 0 dari 0 entri",
      "sInfoFiltered": "(disaring dari _MAX_ entri keseluruhan)",
      "sInfoPostFix": "",
      "sSearch": "Cari:",
      "sUrl": "",
      "oPaginate": {
      "sFirst": "Pertama",
      "sPrevious": "Sebelumnya",
      "sNext": "Selanjutnya",
      "sLast": "Terakhir"
                  }
              },

            processing: true,
            serverSide: true,
            ajax: "{{  route('/janggamekar/api/pemesanan')  }}",
            columns: [
                          { data: 'id',name: 'id' },
                          { data: 'nama',name: 'nama' },
                          { data: 'jk',name: 'jk' },
                          { data: 'ukuran',name: 'ukuran' },
                          { data: 'jumlah',name: 'jumlah' },
                          { data: 'status',name: 'status' },
                          { data: 'created_at',name: 'created_at' },
                          { data: 'action', name:'action', orderable :false, searchable: false },
            ]
          });
          </script>
@stop
