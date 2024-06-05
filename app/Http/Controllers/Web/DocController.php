<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\Doc;
use Illuminate\Http\Request;

class DocController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $docs = Doc::all();
        return view('products.index', ['products'=> $docs]);
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
    public function show($id)
    {
        $data = Doc::findOrFail($id);
        return view('products.edit', ['doc' => $data]);
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
    public function update(Request $request, $id)
    {
        $doc = Doc::find($id);
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
            'user_id' => session("user_id"),
            'tanggal' => $data->tanggal,
            'distributor' => $data->distributor,
            'jns_ayam' => $data->jns_ayam,
            'jumlah_ayam' => $data->jumlah_ayam,
            'harga_kontrak' => $data->harga_kontrak,
            'total_harga' => $data->total_harga,
        ]);

        return redirect("products");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Doc $doc)
    {
        //

        $deleteDoc = $doc->delete();
        if($deleteDoc) {
            return redirect("products");
        }
    }
}
