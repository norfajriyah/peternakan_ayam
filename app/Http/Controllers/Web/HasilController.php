<?php

namespace App\Http\Controllers\Web;

use App\Models\hasil;
use App\Http\Requests\UpdatehasilRequest;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\DB;

class HasilController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $hasil = DB::table('hasils')
        ->join('docs', 'doc_id', '=', 'docs.id')
        ->select('hasils.*', 'docs.periode')
        ->get();
        return view('hasil.index', ['hasil'=> $hasil]);
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
        $hasil->delete();
        if($hasil) {
            return redirect('hasil');
        }
    }
}
