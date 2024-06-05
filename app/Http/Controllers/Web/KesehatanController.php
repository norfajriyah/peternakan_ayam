<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\Kesehatan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class KesehatanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $kesehatan = DB::table('kesehatans')
        ->join('docs', 'doc_id', '=', 'docs.id')
        ->select('kesehatans.*', 'docs.periode')
        ->get();
        return view('kesehatan.index', ['kesehatan'=> $kesehatan]);
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
    public function show(Kesehatan $kesehatan)
    {
        //
        $data = DB::table('kesehatans')
        ->join('docs', 'doc_id', '=', 'docs.id')
        ->select('kesehatans.*', 'docs.periode')
        ->where('kesehatans.id', '=', $kesehatan->id)
        ->get();
        return view('kesehatan.edit', ['kesehatan' => $data]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Kesehatan $kesehatan)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        //
        $kesehatan = Kesehatan::find($id);
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
            'user_id' => session("user_id"),
            'doc_id' => $data->doc_id,
            'tanggal' => $data->tanggal,
            'hari_ke' => $data->hari_ke,
            'jns_obat_pagi' => $data->jns_obat_pagi,
            'jns_obat_malam' => $data->jns_obat_malam,
            'jns_obat_hama' => $data->jns_obat_hama,
            'keterangan' => $data->keterangan
        ]);
        return redirect('kesehatan');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Kesehatan $kesehatan)
    {
        //
        $kesehatan->delete();
        if($kesehatan) {

            return redirect('kesehatan');
        }
    }
}
