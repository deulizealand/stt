@extends('adminlte::page')

@section('content')

<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
@include('sweet::alert')

          <div class="col-sm-11">
            <h1 class="m-0 text-dark">Belum</h1>
            <h6>Tanggal : {{date('l, d-m-Y')}}</h6>
          </div>



    <form action="/janggamekar/pesananbaju/pemesanan" method="post">
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

@foreach ($st as $item)
@if($item->status !== 'Bayar')
    <tr>
      <td >{{$item->id}}</td>
    <td>{{$item->nama}}</td>
    <td><select class="form-control" name="jk" readonly>
      <option value="Couo"> {{$item->jk}} </option>

      </select></td>
      <td><select class="form-control" name="ukuran" readonly>
        <option value="Null"> {{$item->ukuran}} </option>
        </select></td>
      <td><input class="form-control" type="number" name="jumlah" value="{{$item->jumlah}}" readonly ></td>
    <td><select class="form-control" name="status" readonly>
      <option value="Bayar"> {{$item->status}}</option>

      </select></td>
    <td><input type="date" class="form-control" name="tanggal"value="{{ date('Y-m-d') }}" readonly> </td>
    @endif
@endforeach

</table>

       <div class="form-group">

       </div>


  <!-- <button type="submit" style="margin-left:10px;" class="btn btn-success " name="submit" value="submit">Simpan</button> -->
       {{ csrf_field() }}
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
  </div>

@stop
