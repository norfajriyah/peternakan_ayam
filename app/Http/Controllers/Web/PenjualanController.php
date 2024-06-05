<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\Penjualan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PenjualanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $penjualan = DB::table('penjualans')
        ->join('docs', 'doc_id', '=', 'docs.id')
        ->select('penjualans.*', 'docs.periode')
        ->get();
        return view('penjualan.index', ['penjualan'=> $penjualan]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Penjualan $penjualan)
    {
        //
        $data = DB::table('penjualans')
        ->join('docs', 'doc_id', '=', 'docs.id')
        ->select('penjualans.*', 'docs.periode')
        ->where('penjualans.id', '=', $penjualan->id)
        ->get();
        return view('penjualan.edit', ['penjualan' => $data]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Penjualan $penjualan)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request,  $id)
    {
        //
        $penjualan = Penjualan::find($id);
        $data = $penjualan;

        if($request->doc_id != null) {
            $data->doc_id = $request->doc_id;
        }
        if($request->tanggal != null) {
            $data->tanggal = $request->tanggal;
        }
        if($request->umur != null) {
            $data-> umur = $request->umur;
        }
        if($request->mitra != null) {
            $data->mitra = $request->mitra;
        }
        if($request->alamat != null) {
            $data->alamat = $request->alamat;
        }
        if($request->nama_pembeli != null) {
            $data->nama_pembeli = $request->nama_pembeli;
        }
        if($request->no_mobil != null) {
            $data->no_mobil = $request->no_mobil;
        }
        if($request->nama_driver != null) {
            $data->nama_driver = $request->nama_driver;
        }
        if($request->jml_ayam_panen != null) {
            $data->jml_ayam_panen = $request->jml_ayam_panen;
        }
        if($request->berat_rr != null) {
            $data->berat_rr = $request->berat_rr;
        }
        if($request-> total_berat != null) {
            $data->total_berat = $request->total_berat;
        }
        if($request->harga_kg != null) {
            $data->harga_kg = $request->harga_kg;
        }
        if($request->total_harga_jual != null) {
            $data->total_harga_jual = $request->total_harga_jual;
        }        

        $penjualan->update([
            'user_id' => session("user_id"),
            'doc_id' => $data->doc_id,
            'tanggal' => $data->tanggal,
            'umur' => $data->umur,
            'mitra' => $data->mitra,
            'alamat' => $data->alamat,
            'nama_pembeli' => $data->nama_pembeli,
            'no_mobil' => $data->no_mobil,
            'nama_driver' => $data->nama_driver,
            'jml_ayam_panen' => $data->jml_ayam_panen,
            'berat_rr' => $data->berat_rr,
            'total_berat'=> $data->total_berat,
            'harga_kg' => $data->harga_kg,
            'total_harga_jual' => $data->total_harga_jual
        ]);
        return redirect('penjualan');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Penjualan $penjualan)
    {
        //
        $penjualan->delete();
        if($penjualan) {
            return redirect("penjualan");
        }
    }
}
