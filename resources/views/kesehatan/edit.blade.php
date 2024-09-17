@extends('layouts.app')

@section('title', 'Edit Data Kesehatan')

@section('contents')
    <h1 class="mb-0">Edit Data Kesehatan</h1>
    <hr />
    <form action="{{ route('kesehatan.update', $kesehatan[0]->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="row mb-3">
            <div class="col-md-6">
                <label class="form-label">Periode DOC</label>
                <input type="text" name="doc_id" class="form-control" placeholder="doc_id" value="{{ $kesehatan[0]->periode }}" disabled>
            </div>
            <div class="col-md-6">
                <label class="form-label">Tanggal</label>
                <input type="date" name="tanggal" class="form-control" placeholder="tanggal" value="{{ $kesehatan[0]->tanggal }}">
            </div>
        </div>
        <div class="row mb-3">
            <div class="col-md-6">
                <label class="form-label">Hari</label>
                <input type="text" name="hari_ke" class="form-control" placeholder="hari_ke" value="{{ $kesehatan[0]->hari_ke }}">
            </div>
            <div class="col-md-6">
                <label class="form-label">Obat Pagi</label>
                <select name="jns_obat_pagi" class="form-control">
                    <option value="Gula Merah" {{ $kesehatan[0]->jns_obat_pagi == 'Gula Merah' ? 'selected' : '' }}>Gula Merah</option>
                    <option value="Amoxitin" {{ $kesehatan[0]->jns_obat_pagi == 'Amoxitin' ? 'selected' : '' }}>Amoxitin</option>
                    <option value="Cyprotylogrin" {{ $kesehatan[0]->jns_obat_pagi == 'Cyprotylogrin' ? 'selected' : '' }}>Cyprotylogrin</option>
                    <option value="Vitakur" {{ $kesehatan[0]->jns_obat_pagi == 'Vitakur' ? 'selected' : '' }}>Vitakur</option>
                    <option value="Enoquyl" {{ $kesehatan[0]->jns_obat_pagi == 'Enoquyl' ? 'selected' : '' }}>Enoquyl</option>
                </select>
            </div>
        </div>
        <div class="row mb-3">
            <div class="col-md-6">
                <label class="form-label">Obat Malam</label>
                <select name="jns_obat_malam" class="form-control">
                    <option value="Maxtrime" {{ $kesehatan[0]->jns_obat_malam == 'Maxtrime' ? 'selected' : '' }}>Maxtrime</option>
                    <option value="Amilyte" {{ $kesehatan[0]->jns_obat_malam == 'Amilyte' ? 'selected' : '' }}>Amilyte</option>
                </select>
            </div>
            <div class="col-md-6">
                <label class="form-label">Obat Hama</label>
                <select name="jns_obat_hama" class="form-control">
                    <option value="Delaxtrin" {{ $kesehatan[0]->jns_obat_hama == 'Delaxtrin' ? 'selected' : '' }}>Delaxtrin</option>
                    <option value="Neoantisep" {{ $kesehatan[0]->jns_obat_hama == 'Neoantisep' ? 'selected' : '' }}>Neoantisep</option>
                </select>
            </div>
        </div>
        <div class="row mb-3">
            <div class="col-md-12">
                <label class="form-label">Keterangan</label>
                <input type="text" name="keterangan" class="form-control" placeholder="keterangan" value="{{ $kesehatan[0]->keterangan }}">
            </div>
        </div>
        <div class="row">
            <div class="col">
                <button class="btn btn-warning">Update</button>
            </div>
        </div>
    </form>
@endsection