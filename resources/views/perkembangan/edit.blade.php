@extends('layouts.app')

@section('title', 'Edit Data Perkembangan')

@section('contents')
    <h1 class="mb-0">Edit Data Perkembangan</h1>
    <hr />
    <form action="{{ route('perkembangan.update', $perkembangan[0]->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="row mb-3">
            <div class="col-md-6">
                <label class="form-label">Periode</label>
                <input type="text" name="periode" class="form-control" placeholder="periode" value="{{ $perkembangan[0]->periode }}" disabled>
            </div>
            <div class="col-md-6">
                <label class="form-label">Tanggal</label>
                <input type="date" name="tanggal" class="form-control" placeholder="tanggal" value="{{ $perkembangan[0]->tanggal }}">
            </div>
        </div>
        
        <div class="row mb-3">
            <div class="col-md-6">
                <label class="form-label">Jumlah Populasi</label>
                <input type="text" name="jml_populasi" class="form-control" placeholder="jml_populasi" value="{{ $perkembangan[0]->jml_populasi }}">
            </div>
            <div class="col-md-6">
                <label class="form-label">Strain</label>
                <input type="text" name="strain" class="form-control" placeholder="strain" value="{{ $perkembangan[0]->atrain }}">
            </div>
        </div>
        
        <div class="row mb-3">
            <div class="col-md-6">
                <label class="form-label">BW Datang</label>
                <input type="text" name="bw_datang" class="form-control" placeholder="bw_datang" value="{{ $perkembangan[0]->bw_datang }}">
            </div>
            <div class="col-md-6">
                <label class="form-label">Kondisi</label>
                <input type="text" name="kondisi" class="form-control" placeholder="kondisi" value="{{ $perkembangan[0]->kondisi }}">
            </div>
        </div>
        
        <div class="row mb-3">
            <div class="col-md-6">
                <label class="form-label">Umur</label>
                <input type="text" name="umur" class="form-control" placeholder="umur" value="{{ $perkembangan[0]->umur }}">
            </div>
            <div class="col-md-6">
                <label class="form-label">Standar Feed</label>
                <input type="text" name="std_feed" class="form-control" placeholder="std_feed" value="{{ $perkembangan[0]->std_feed }}">
            </div>
        </div>
        
        <div class="row mb-3">
            <div class="col-md-6">
                <label class="form-label">Actual Feed</label>
                <input type="text" name="act_feed" class="form-control" placeholder="act_feed" value="{{ $perkembangan[0]->act_feed }}">
            </div>
            <div class="col-md-6">
                <label class="form-label">Mati</label>
                <input type="text" name="mati_deplesi" class="form-control" placeholder="mati_deplesi" value="{{ $perkembangan[0]->mati_deplesi }}">
            </div>
        </div>
        
        <div class="row mb-3">
            <div class="col-md-6">
                <label class="form-label">Culling</label>
                <input type="text" name="culling_deplesi" class="form-control" placeholder="culling_deplesi" value="{{ $perkembangan[0]->culling_deplesi }}">
            </div>
            <div class="col-md-6">
                <label class="form-label">Afkir</label>
                <input type="text" name="afkir_deplesi" class="form-control" placeholder="afkir_deplesi" value="{{ $perkembangan[0]->afkir_deplesi }}">
            </div>
        </div>
        
        <div class="row">
            <div class="col">
                <button class="btn btn-warning">Update</button>
            </div>
        </div>
    </form>
@endsection