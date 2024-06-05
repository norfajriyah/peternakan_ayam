<?php

namespace App\Http\Controllers\Api;

use App\Models\hasil;
use App\Http\Requests\StorehasilRequest;
use App\Http\Requests\UpdatehasilRequest;
use App\Models\Penjualan;
use App\Models\Perkembangan;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class HasilController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
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
            'tanggal'=> 'required|date'
        ]);

        if ($validation->fails()) {
            return response()->json($validation->errors(), 422);
        }


        $cekHitung = hasil::where('doc_id', $request->doc_id)->first();
        // dd($cekHitung[0]->id != null);
        if($cekHitung !== null){
            return response()->json([
                'success' => true,
                'message' => 'data indeks performa pernah dihitung ges',
                'data' => $cekHitung
            ], 200);  
        };

        $dataPerkembangan = DB::table('perkembangans')
        ->select(
            DB::raw(
                'sum(perkembangans.act_feed) as jmlPakan, 
                sum(perkembangans.mati_deplesi) as jmlMati, 
                sum(perkembangans.culling_deplesi) as jmlCulling'))
        ->where('doc_id', '=', $request->doc_id)
        ->get();
        
        $dataPenjualan = DB::table('penjualans')
        ->select('penjualans.berat_rr', 'penjualans.total_berat', 'penjualans.umur', 'penjualans.jml_ayam_panen')
        ->where('doc_id', '=', $request->doc_id)
        ->get();

        $dataDoc = DB::table('docs')
        ->select('docs.jumlah_ayam')
        ->where('id', '=', $request->doc_id)
        ->get();
        
        // Perhitungan indeks performance
        $fcr = $dataPerkembangan[0]->jmlPakan / $dataPenjualan[0]->total_berat;
        $abw = $dataPenjualan[0]->berat_rr;
        $rrUmur = ($dataPenjualan[0]->jml_ayam_panen * $dataPenjualan[0]->umur) / $dataPenjualan[0]->jml_ayam_panen;
        $deplesi = (($dataPerkembangan[0]->jmlMati + $dataPerkembangan[0]->jmlCulling) / $dataDoc[0]->jumlah_ayam) * 100;

        $IP = ((100-$deplesi) * $abw) / ($fcr * $dataPenjualan[0]->umur) * 100;
        // $IP = ((100-3.18)* 2.00)/ (1.495*32.44)*100;
        // dd($IP);

        $kategori = '';
        if ($IP > 400) {
            $kategori = 'Sangat Baik';
        } else if ($IP > 300){
            $kategori = 'Baik';
        } else if ($IP < 300) {
            $kategori = 'Kurang Baik' ;
        }

        $hasil = hasil::create([
            'user_id' => auth()->user()->id,
            'doc_id' => $request->doc_id,
            'tanggal' => $request->tanggal,
            'bobot_rr'=>$abw,
            'fcr'=>$fcr,
            'umur_panen'=>$rrUmur,
            'deplesi'=>$deplesi,
            'performa'=>$IP,
            'kategori'=>$kategori
        ]);

        if ($hasil) {
            return response()->json([
                'success' => true,
                'message' => 'Tambah data indeks performa',
                'data' => $hasil
            ], 200);
        }
    
        return response()->json([
            'success' => false,
        ], 422);

    }

    /**
     * Display the specified resource.
     */
    public function show(hasil $hasil)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(hasil $hasil)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatehasilRequest $request, hasil $hasil)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(hasil $hasil)
    {
        //
    }
}
