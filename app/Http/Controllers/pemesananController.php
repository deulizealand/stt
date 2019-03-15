<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Baju;
use Yajra\DataTables\DataTables;
use DB;
use Alert;
class pemesananController extends Controller
{
  public function apiPemesanan(Request $request)
    {
        $baju = Baju::all();
        return Datatables::of($baju)
        ->addColumn('action', function($baju){
            return '<a href="janggamekar/'.$baju->id.'/edit" class="btn btn-primary btn-xs"><i class="glyphicon glyphicon-edit"></i> edit</a> ';
        })->make(true);
    }
public function storePemesanan(Request $request)
    {
        try {
            $pem = new Baju;
            $pem->id = $request->id;
            $pem->nama = $request->nama;
            $pem->jk = $request->jk;
            $pem->ukuran = $request->ukuran;
            $pem->jumlah = $request->jumlah;
            $pem->status = $request->status;
            $pem->tanggal = $request->tanggal;
                // var_dump($pem->totalpemasukan);
            // dd($pem);

            $pem->save();


            return redirect('janggamekar/pesananbaju/pemesanan');
        } catch (\Illuminate\Database\QueryException $exception) {
                // But how to return to the same view and still pass an error message
                // I don't want to loose my request data also.

            return back()->withInput();
        }
    }
    public function update(Request $request, $id)
  {
      // try {
      $baju = Baju::find($id);
      $baju->nama = $request->nama;
      $baju->jk = $request->jk;
      $baju->ukuran = $request->ukuran;
      $baju->jumlah = $request->jumlah;
      $baju->status = $request->status;
      $baju->tanggal = $baju->tanggal;
      $baju->save();
      // return redirect('/janggamekar/'.$baju->id.'/struk');
      return redirect('/pemesanan');
  // } catch(\Illuminate\Database\QueryException $exception) {
  //     // But how to return to the same view and still pass an error message
  //     // I don't want to loose my request data also.
  //     return back()->withInput();
  //     }
  }
  public function belumbayar()
  {
      Alert::warning('Hanya Halaman Admin', 'Bertanggung Jawablah atas Apa yang terjadi');
    $st = DB::SELECT("SELECT * from pesanbaju");
    return view('janggamekar.pesananbaju.BelumBayar',['st'=>$st]);
  }
  public function sudahbayar()
  {
    $st = DB::SELECT("SELECT * from pesanbaju");
    return view('janggamekar.pesananbaju.SudahBayar',['st'=>$st]);
  }

  public function edit($id)
{
  Alert::warning('Hanya Halaman Admin', 'Bertanggung Jawablah atas Apa yang terjadi');
    $baju = Baju::find($id);

    return view('Janggamekar.pesananbaju.edit', ['baju'=> $baju]);
}
}
