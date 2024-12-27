<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Kesehatan;
use App\Models\Pakan;
use App\Http\Requests\StorePakanRequest;
use App\Http\Requests\UpdatePakanRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class PakanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $pakan = Pakan::all();
        return response()->json([
            'success' => true,
            'data' => $pakan
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
            'jenis_pakan' => 'required|in:Galaxy 00, Galaxy 01, B 151 C / Strarfeed, 510, 511 Alfa',
            'jumlah_pakan' => 'required',
            'hrg_pakan_satuan' => 'required',
            'total_harga' => 'required'
        ]);

        if ($validation->fails()) {
            return response()->json($validation->errors(), 422);
        }

        $pakan = Pakan::create([
            'user_id' => auth()->user()->id,
            'doc_id' => $request->doc_id,
            'tanggal' => $request->tanggal,
            'jenis_pakan' => $request->jenis_pakan,
            'jumlah_pakan' => $request ->jumlah_pakan,
            'hrg_pakan_satuan' => $request->hrg_pakan_satuan,
            'total_harga' => $request->total_harga
        ]);

        if ($pakan) {
            return response()->json([
                'success' => true,
                'message' =>'Tambah data pakan sukses',
                'data' => $pakan
                ],200);
        }

        return response()->json([
            'success' => false,
        ], 422);
    }

    /**
     * Display the specified resource.
     */
    public function show(Pakan $pakan)
    {
        if ($pakan) {
            return response()->json([
                'success' => true,
                'data' => $pakan
            ],200);
        }
    }

    public function update(Request $request, Pakan $pakan)
    {
        $data = $pakan;

        if($request->doc_id != null) {
            $data->doc_id = $request->doc_id;
        }
        if($request->tanggal != null) {
            $data->tanggal = $request->tanggal;
        }
        if($request->jenis_pakan != null) {
            $data->jenis_pakan = $request->jenis_pakan;
        }
        if($request->jumlah_pakan != null) {
            $data->jumlah_pakan = $request->jumlah_pakan;
        }
        if($request->hrg_pakan_satuan != null) {
            $data->hrg_pakan_satuan = $request->hrg_pakan_satuan;
        }
        if($request->total_harga != null) {
            $data->total_harga = $request->total_harga;
        }

        $pakan ->update([
            'user_id' => auth()->user()->id,
            'doc_id' => $data->doc_id,
            'tanggal' => $data->tanggal,
            'jenis_pakan' => $data->jenis_pakan,
            'jumlah_pakan' => $data ->jumlah_pakan,
            'hrg_pakan_satuan' => $data->hrg_pakan_satuan,
            'total_harga' => $data->total_harga
        ]);
        
        return response()->json([
            'success' => true,
            'message' => 'Berhasil update data'
        ], 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Pakan $pakan)
    {
        $deletePakan = $pakan->delete();
        if($deletePakan) {
            return response()->json([
                'success' => true,
                'message' => 'Data berhasil di hapus'
            ],200);
        }
    }
}
