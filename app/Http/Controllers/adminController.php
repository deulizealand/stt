<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class adminController extends Controller
{
public function dashboard()
{

  return view('janggamekar.dashboard');
}
public function pemesanan()
{
  $day = date('Y-m-d');
    $bayar = DB::SELECT("SELECT COUNT(id) as t from pesanbaju where status='Bayar'");
    $bb = DB::SELECT("SELECT COUNT(id) as t from pesanbaju where status='Belum Bayar'");
    $tot = DB::SELECT("SELECT COUNT(id) as t from pesanbaju");

$bayar = $bayar[0]->t;
$bb = $bb[0]->t;
$tot = $tot[0]->t;

  return view('janggamekar.pesananbaju.pemesanan',['bayar'=>$bayar ,'bb'=>$bb,'tot'=>$tot]);
}
}
