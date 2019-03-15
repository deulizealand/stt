@extends('adminlte::page')

@section('content')
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
@include('sweet::alert')
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-12">
          <div class="col-sm-11">
            <h1 class="m-0 text-dark">Pemesanan</h1>
            <h6>Tanggal : {{date('l, d-m-Y')}}</h6>
          </div>
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
    @include(‘sweet::alert’)
    <form action="/janggamekar/{{$baju->id}}" method="post">
            <div class="form-group">
              <table class="table1"width="99%" id="printTable" >
<tr>
  <th>ID</th>
  <th>Nama</th>
  <th>Jenis</th>
  <th>Ukuran</th>
  <th>Jumlah</th>
  <th>Status</th>
  <th>Tanggal</th>
</tr>

    <tr>
      <td><input class="form-control" type="hidden" name="id" value="{{$baju->id}}" readonly >{{$baju->id}}</td>
    <td><input type="hidden" name="nama" value="{{$baju->nama}}">{{$baju->nama}}</td>
    <td><select class="form-control" name="jk" >
      <option value="{{$baju->jk}}"> {{$baju->jk}} </option>
      <option value="Couo"> Couo </option>
      <option value="Ceue"> Ceue</option>
      </select></td>
      <td><select class="form-control" name="ukuran" >
        <option value="{{$baju->ukuran}}"> {{$baju->ukuran}} </option>
        <option value="S"> S </option>
        <option value="M"> M</option>
        <option value="L"> L</option>
        <option value="XL"> XL</option>
        <option value="XXL"> XXL</option>
        <option value="Custom"> Custom</option>
        </select></td>
      <td><input class="form-control" type="number" name="jumlah" value="{{$baju->jumlah}}" ></td>
    <td><select class="form-control" name="status" >
      <option value="{{$baju->status}}"> {{$baju->status}}</option>
      <option value="Bayar"> Bayar</option>
      <option value="Belum Bayar"> Belum Bayar</option>
      </select></td>
    <td><input type="date" class="form-control" name="tanggal"value="{{ date('Y-m-d') }}" readonly> </td>

    </tr>

</table>

       <div class="form-group">

       </div>


<button type="submit" style="margin-left:10px;" class="btn btn-primary " name="submit" value="edit">Simpan</button>
       {{ csrf_field() }}
         <input type="hidden" name="_method" value="PUT">
     </form>
  <script src="{{ asset('jquery/jquery-1.12.4.min.js') }}"></script>
     <script>

  $("#koak").change(function() {
  $.ajax({
  url: '/info/' + $(this).val() +'/' + $(this).val() ,
  type: 'get',
  dataType:"json",
  success: function(data) {
      if (data.success == true){
           console.log(data);
          $("#naak").attr('value', data.inf);
           $("#tipeakun").attr('value', data.st);
      } else {
      alert('nono');
  }
  },
  error: function(jqXHR, textStatus, errorThrown) {}
  });

  });
     </script>

@stop
