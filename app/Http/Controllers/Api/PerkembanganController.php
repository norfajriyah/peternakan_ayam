<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Perkembangan;
use App\Http\Requests\StorePerkembanganRequest;
use App\Http\Requests\UpdatePerkembanganRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class PerkembanganController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $perkembangans = Perkembangan::orderBy('id', 'desc')->first();
        return response()->json([
            'success' => true,
            'data' => $perkembangans
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
            'jml_populasi' => 'required',
            'atrain' => 'required',
            'bw_datang' => 'required',
            'kondisi' => 'required',
            'umur' => 'required',
            'std_feed' => 'required',
            'act_feed' => 'required',
            'mati_deplesi' => 'required',
            'culling_deplesi' => 'required',
            'afkir_deplesi' => 'required'
            
        ]);

        if ($validation->fails()) {
            return response()->json($validation->errors(), 422);
        }

        $perkembangans = Perkembangan::create([
            'user_id' => auth()->user()->id,
            'doc_id' => $request->doc_id,
            'tanggal' => $request->tanggal,
            'jml_populasi' => $request->jml_populasi,
            'atrain' => $request->atrain,
            'bw_datang' => $request->bw_datang,
            'kondisi' => $request->kondisi,
            'umur' => $request->umur,
            'std_feed' => $request->std_feed,
            'act_feed' => $request->act_feed,
            'mati_deplesi' => $request->mati_deplesi,
            'culling_deplesi' => $request->culling_deplesi,
            'afkir_deplesi' => $request->afkir_deplesi
           
        ]);

        if ($perkembangans) {
            return response()->json([
                'success' => true,
                'message' =>'Tambah data perkembangan sukses',
                'data' => $perkembangans
                ],200);
        }

        return response()->json([
            'success' => false,
        ], 422);
    }

    /**
     * Display the specified resource.
     */
    public function show(Perkembangan $perkembangans)
    {
        if ($perkembangans) {
            return response()->json([
                'success' => true,
                'data' => $perkembangans
            ],200);
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Perkembangan $perkembangan)
    {
        $data = $perkembangan;

        if($request->doc_id != null) {
            $data->doc_id = $request->doc_id;
        }
        if($request->tanggal != null) {
            $data->tanggal = $request->tanggal;
        }
        if($request->jml_populasi != null) {
            $data->jml_populasi = $request->jml_populasi;
        }
        if($request->atrain != null) {
            $data->atrain = $request->atrain;
        }
        if($request->bw_datang != null) {
            $data->bw_datang = $request->bw_datang;
        }
        if($request->kondisi != null) {
            $data->kondisi = $request->kondisi;
        }
        if($request->umur != null) {
            $data->umur = $request->umur;
        }
        if($request->std_feed != null) {
            $data->std_feed = $request->std_feed;
        }
        if($request->act_feed != null) {
            $data->act_feed = $request->act_feed;
        }
        if($request->mati_deplesi != null) {
            $data->mati_deplesi = $request->mati_deplesi;
        }
        if($request->culling_deplesi != null) {
            $data->culling_deplesi = $request->culling_deplesi;
        }
        if($request->afkir_deplesi != null) {
            $data->afkir_deplesi = $request->afkir_deplesi;
        }

        $perkembangan->update([
            'user_id' => auth()->user()->id,
            'doc_id' => $data->doc_id,
            'tanggal' => $data->tanggal,
            'jml_populasi' => $data->jml_populasi,
            'atrain' => $data->atrain,
            'bw_datang' => $data->bw_datang,
            'kondisi' => $data->kondisi,
            'umur' => $data->umur,
            'std_feed' => $data->std_feed,
            'act_feed' => $data->act_feed,
            'mati_deplesi' => $data->mati_deplesi,
            'culling_deplesi' => $data->culling_deplesi,
            'afkir_deplesi' => $data->afkir_deplesi
        ]);

        return response()->json([
            'success' => true,
            'message' => 'Berhasil update data'
        ], 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Perkembangan $perkembangans)
    {
        
        $deletePerkembangan = $perkembangans->delete();
        if($deletePerkembangan) {
            return response()->json([
                'success' => true,
                'message' => 'Data berhasil di hapus'
            ],200);
        }
    }
}
