<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Kesehatan;
use App\Http\Requests\StoreKesehatanRequest;
use App\Http\Requests\UpdateKesehatanRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class KesehatanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $kesehatan = Kesehatan::all();
        return response()->json([
            'success' => true,
            'data' => $kesehatan
        ], 200);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
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
            'hari_ke' => 'required',
            'jns_obat_pagi' => 'required',
            'jns_obat_malam' => 'required',
            'jns_obat_hama' => 'required',
            'keterangan' => 'required'
        ]);

        if ($validation->fails()) {
            return response()->json($validation->errors(), 422);
        }

        $kesehatan = Kesehatan::create([
            'user_id' => auth()->user()->id,
            'doc_id' => $request->doc_id,
            'tanggal' => $request->tanggal,
            'hari_ke' => $request->hari_ke,
            'jns_obat_pagi' => $request ->jns_obat_pagi,
            'jns_obat_malam' => $request ->jns_obat_malam,
            'jns_obat_hama' => $request ->jns_obat_hama,
            'keterangan' => $request->keterangan
        ]);

        if ($kesehatan) {
            return response()->json([
                'success' => true,
                'message' =>'Tambah data kesehatan sukses',
                'data' => $kesehatan
                ],200);
        }

        return response()->json([
            'success' => false,
        ], 422);
    }

    /**
     * Display the specified resource.
     */
    public function show(Kesehatan $kesehatan)
    {
        if ($kesehatan) {
            return response()->json([
                'success' => true,
                'data' => $kesehatan
            ],200);
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Kesehatan $kesehatan)
    {
        $data = $kesehatan;

        if($request->doc_id != null) {
            $data->doc_id = $request->doc_id;
        }

        if($request->hari_ke != null) {
            $data->hari_ke = $request->hari_ke;
        }

        if($request->tanggal != null) {
            $data->tanggal = $request->tanggal;
        }
        if($request->jns_obat_pagi != null) {
            $data->jns_obat_pagi = $request->jns_obat_pagi;
        }
        if($request->jns_obat_malam != null) {
            $data->jns_obat_malam = $request->jns_obat_malam;
        }
        if($request->jns_obat_hama != null) {
            $data->jns_obat_hama = $request->jns_obat_hama;
        }
        if($request->keterangan != null) {
            $data->keterangan = $request->keterangan;
        }

        $kesehatan->update([
            'user_id' => auth()->user()->id,
            'doc_id' => $data->doc_id,
            'tanggal' => $data->tanggal,
            'hari_ke' => $data->hari_ke,
            'jns_obat_pagi' => $data->jns_obat_pagi,
            'jns_obat_malam' => $data->jns_obat_malam,
            'jns_obat_hama' => $data->jns_obat_hama,
            'keterangan' => $data->keterangan
        ]);
        
        return response()->json([
            'success' => true,
            'message' => 'Berhasil mengupdate data'
        ], 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Kesehatan $kesehatan)
    {
        $deleteKesehatan = $kesehatan->delete();
        if($deleteKesehatan) {
            return response()->json([
                'success' => true,
                'message' => 'Data berhasil di hapus'
            ],200);
        }
    }

}
