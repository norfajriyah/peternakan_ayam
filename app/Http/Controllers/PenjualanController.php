<?php

namespace App\Http\Controllers;

use App\Models\Penjualan;
use App\Http\Requests\StorePenjualanRequest;
use App\Http\Requests\UpdatePenjualanRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class PenjualanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $penjualan = Penjualan::all();
        return response()->json([
            'success' => true,
            'data' => $penjualan
        ], 200);
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
        //Validation
        $validation = Validator::make($request->all(),[
            'doc_id' => 'required|exists:docs,id',
            'tanggal' => 'required|date',
            'mitra' => 'required',
            'alamat' => 'required',
            'nama_pembeli' => 'required',
            'no_mobil' => 'required',
            'nama_driver' => 'required',
            'jml_ayam_panen' => 'required',
            'berat_rr' => 'required',
            'harga_kg' => 'required',
            'total_harga_jual' => 'required'
            
        ]);

        if ($validation->fails()) {
            return response()->json($validation->errors(), 422);
        }

        $penjualan = Penjualan::create([
            'user_id' => auth()->user()->id,
            'doc_id' => $request->doc_id,
            'tanggal' => $request->tanggal,
            'mitra' => $request->mitra,
            'alamat' => $request->alamat,
            'nama_pembeli' => $request->nama_pembeli,
            'no_mobil' => $request->no_mobil,
            'nama_driver' => $request->nama_pembeli,
            'jml_ayam_panen' => $request->jml_ayam_panen,
            'berat_rr' => $request->berat_rr,
            'harga_kg' => $request->harga_kg,
            'total_harga_jual' => $request->total_harga_jual
           
        ]);

        if ($penjualan) {
            return response()->json([
                'success' => true,
                'message' =>'Tambah data penjualan sukses',
                'data' => $penjualan
                ],200);
        }

        return response()->json([
            'success' => false,
        ], 422);
    }

    /**
     * Display the specified resource.
     */
    public function show(Penjualan $penjualan)
    {
        if ($penjualan) {
            return response()->json([
                'success' => true,
                'data' => $penjualan
            ],200);
        }
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
    public function update(Request $request, Penjualan $penjualan)
    {
        $data = $penjualan;

        if($request->doc_id != null) {
            $data->doc_id = $request->doc_id;
        }
        if($request->tanggal != null) {
            $data->tanggal = $request->tanggal;
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
        if($request->no_mobile != null) {
            $data->no_mobile = $request->no_mobile;
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
        if($request->harga_kg != null) {
            $data->harga_kg = $request->harga_kg;
        }
        if($request->total_harga_jual != null) {
            $data->total_harga_jual = $request->total_harga_jual;
        }        

        $penjualan->update([
            'user_id' => auth()->user()->id,
            'doc_id' => $data->doc_id,
            'tanggal' => $data->tanggal,
            'mitra' => $data->mitra,
            'alamat' => $data->alamat,
            'nama_pembeli' => $data->nama_pembeli,
            'no_mobil' => $data->no_mobil,
            'nama_driver' => $data->nama_pembeli,
            'jml_ayam_panen' => $data->jml_ayam_panen,
            'berat_rr' => $data->berat_rr,
            'harga_kg' => $data->harga_kg,
            'total_harga_jual' => $data->total_harga_jual
        ]);

        return response()->json([
            'success' => true,
            'message' => 'Berhasil mengupdate data'
        ], 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Penjualan $penjualan)
    {
        $deletePenjualan = $penjualan->delete();
        if($deletePenjualan) {
            return response()->json([
                'success' => true,
                'message' => 'Data berhasil di hapus'
            ],200);
        }
    }
}
