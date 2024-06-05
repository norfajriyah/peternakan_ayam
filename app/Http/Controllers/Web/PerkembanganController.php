<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\Perkembangan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PerkembanganController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $perkembangans = DB::table('perkembangans')
        ->join('docs', 'doc_id', '=', 'docs.id')
        ->select('perkembangans.*', 'docs.periode')
        ->get();
        return view('perkembangan.index', ['perkembangans'=> $perkembangans]);
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
    public function show(Perkembangan $perkembangan)
    {
        //
        $data = DB::table('perkembangans')
        ->join('docs', 'doc_id', '=', 'docs.id')
        ->select('perkembangans.*', 'docs.periode')
        ->where('perkembangans.id', '=', $perkembangan->id)
        ->get();
        return view('perkembangan.edit', ['perkembangan' => $data]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Perkembangan $perkembangan)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        //
        $perkembangan = Perkembangan::find($id);
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
            'user_id' => session("user_id"),
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

        return redirect('perkembangan');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Perkembangan $perkembangan)
    {
        //
        $perkembangan->delete();
        if($perkembangan) {
            return redirect("products");
        }
    }
}
