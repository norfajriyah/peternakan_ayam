@extends('layouts.app')
  
@section('title', 'Edit Data Perkembangan')
  
@section('contents')
    <h1 class="mb-0">Edit Data Perkembangan</h1>
    <hr />
    <form action="{{ route('perkembangan.update', $perkembangan[0]->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="row">
            <div class="col mb-3">
                <label class="form-label">periode</label>
                <input disabled ="text" name="tanggal" class="form-control" placeholder="tanggal" value="{{ $perkembangan[0]->periode }}" >
            </div>
            <div class="col mb-3">
                <label class="form-label">tanggal</label>
                <input type="text" name="tanggal" class="form-control" placeholder="tanggal" value="{{ $perkembangan[0]->tanggal }}" >
            </div>
        </div>
        <div class="row">
            <div class="col mb-3">
                <label class="form-label">jumlah populasi</label>
                <input type="text" name="jml_populasi" class="form-control" placeholder="jml_populasi" value="{{ $perkembangan[0]->jml_populasi}}" >
            </div>
            <div class="col mb-3">
                <label class="form-label">strain</label>
                <input type="text" name="atrain"  class="form_control" placeholder="atrain" value="{{$perkembangan[0]->atrain }}" >
            </div>
        </div>
        <div class="row">
            <div class="col mb-3">
                <label class="form-label">bw datang</label>
                <input type="text" name="bw_datang" class="form-control" placeholder="bw_datang" value="{{ $perkembangan[0]->bw_datang}}" >
            </div>
            <div class="col mb-3">
                <label class="form-label">kondisi</label>
                <input type="text" name="kondisi" class="form-control" placeholder="kondisi" value="{{$perkembangan[0]->kondisi }}">
            </div>
        </div>
        <div class="row">
            <div class="col mb-3">
                <label class="form-label">umur</label>
                <input type="text" name="umur" class="form-control" placeholder="umur" value="{{ $perkembangan[0]->umur}}" >
            </div>
            <div class="col mb-3">
                <label class="form-label">standar feed</label>
                <input type="text" name="std_feed" class="form-control" placeholder="std_feed" value="{{$perkembangan[0]->std_feed }}">
            </div>
        </div>
        <div class="row">
            <div class="col mb-3">
                <label class="form-label">actual feed</label>
                <input type="text" name="act_feed" class="form-control" placeholder="act_feed" value="{{ $perkembangan[0]->act_feed}}" >
            </div>
            <div class="col mb-3">
                <label class="form-label">mati</label>
                <input type="text" name="mati_deplesi" class="form-control" placeholder="mati_deplesi" value="{{$perkembangan[0]->mati_deplesi }}">
            </div>
        </div>
        <div class="row">
            <div class="col mb-3">
                <label class="form-label">culling</label>
                <input type="text" name="culling_deplesi" class="form-control" placeholder="culling_deplesi" value="{{ $perkembangan[0]->culling_deplesi}}" >
            </div>
            <div class="col mb-3">
                <label class="form-label">afkir</label>
                <input type="text" name="afkir_deplesi" class="form-control" placeholder="afkir_deplesi" value="{{$perkembangan[0]->afkir_deplesi }}">
            </div>
        </div>
        <div class="row">
            <div class="d-grid">
                <button class="btn btn-warning">Update</button>
            </div>
        </div>
    </form>
@endsection