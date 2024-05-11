<?php

namespace App\Http\Controllers;

use App\Models\Doc;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;

class DocController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $docs = Doc::all();
        return response()->json([
            'success' => true,
            'data' => $docs
        ],200);
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
        // Validasi input
        $validation = Validator::make($request->all(),[
            'tanggal' => 'required|date',
            'distributor' => 'required|max:50',
            'jns_ayam' => 'required|in:CP,MB,Wonokoyo',
            'jumlah_ayam' => 'required|integer',
            'harga_kontrak' => 'required|max:50',
            'total_harga' => 'required|max:50',
        ]);

        if ($validation->fails()) {
            return response()->json($validation->errors(), 422);
        }

        $doc = Doc::create([
            'user_id' => auth()->user()->id,
            'tanggal' => $request->tanggal,
            'distributor' => $request->distributor,
            'jns_ayam' => $request->jns_ayam,
            'jumlah_ayam' => $request->jumlah_ayam,
            'harga_kontrak' => $request->harga_kontrak,
            'total_harga' => $request->total_harga,
        ]);
        
        if ($doc) {
            return response()->json([
                'success' => true,
                'message' =>'Tambah data doc sukses',
                'data' => $doc
                ],200);
        }

        return response()->json([
            'success' => false,
        ], 422);
        
    }

    /**
     * Display the specified resource.
     */
    public function show(Doc $doc)
    {
        if ($doc) {
            return response()->json([
                'success' => true,
                'data' => $doc
            ],200);
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Doc $doc)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Doc $doc)
    {
        $data = $doc;
        
        if($request->tanggal != null) {
            $data->tanggal = $request->tanggal;
        }
        if($request->distributor != null) {
            $data->distributor = $request->distributor;
        }
        if($request->jns_ayam != null) {
            $data->jns_ayam = $request->jns_ayam;
        }
        if($request->jumlah_ayam != null) {
            $data->jumlah_ayam = $request->jumlah_ayam;
        }
        if($request->harga_kontrak != null) {
            $data->harga_kontrak = $request->harga_kontrak;
        }
        if($request->total_harga != null) {
            $data->total_harga = $request->total_harga;
        }

        $doc->update([
            'user_id' => auth()->user()->id,
            'tanggal' => $data->tanggal,
            'distributor' => $data->distributor,
            'jns_ayam' => $data->jns_ayam,
            'jumlah_ayam' => $data->jumlah_ayam,
            'harga_kontrak' => $data->harga_kontrak,
            'total_harga' => $data->total_harga,
        ]);

        return response()->json([
            'success' => true,
            'message' => 'Berhasil mengupdate data'
        ], 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Doc $doc)
    {
        $deleteDoc = $doc->delete();
        if($deleteDoc) {
            return response()->json([
                'success' => true,
                'message' => 'Data berhasil di hapus'
            ],200);
        }
    }
}
