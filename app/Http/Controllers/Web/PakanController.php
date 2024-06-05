<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\Pakan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PakanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $pakan = DB::table('pakans')
        ->join('docs', 'doc_id', '=', 'docs.id')
        ->select('pakans.*', 'docs.periode')
        ->get();
        return view('pakan.index', ['pakan'=> $pakan]);
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
    public function show(Pakan $pakan)
    {
        //
        $data = DB::table('pakans')
        ->join('docs', 'doc_id', '=', 'docs.id')
        ->select('pakans.*', 'docs.periode')
        ->where('pakans.id', '=', $pakan->id)
        ->get();
        return view('pakan.edit', ['pakan' => $data]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Pakan $pakan)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $pakan = Pakan::find($id);
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
            'user_id' => session("user_id"),
            'doc_id' => $data->doc_id,
            'tanggal' => $data->tanggal,
            'jenis_pakan' => $data->jenis_pakan,
            'jumlah_pakan' => $data ->jumlah_pakan,
            'hrg_pakan_satuan' => $data->hrg_pakan_satuan,
            'total_harga' => $data->total_harga
        ]);
        return redirect('pakan');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Pakan $pakan)
    {
        //
        $pakan->delete();
        if($pakan) {

            return redirect('pakan');
        }
    }
}
