@extends('layouts.app')
  
@section('title', 'Penjualan')
  
@section('contents')
{{-- <@php
    dd($products);
@endphp --}}
    <div class="d-flex align-items-center justify-content-between">
        <h1 class="mb-0">List Data Penjualan</h1>
        {{-- <a href="" class="btn btn-primary">Add Product</a> --}}
    </div>
    <hr />
    @if(Session::has('success'))
        <div class="alert alert-success" role="alert">
            {{ Session::get('success') }}
        </div>
    @endif
    <table class="table table-hover">
        <thead class="table-primary">
            <tr>
                <th>No.</th>
                <th>periode doc</th>
                <th>tanggal</th>
                <th>mitra</th>
                <th>alamat</th>
                <th>nama pembeli</th>
                <th>no mobil</th>
                <th>nama driver</th>
                <th>jumlah ayam terpanen</th>
                <th>berat rata-rata</th>
                <th>harga/kg</th>
                <th>total harga jual</th>
                <th>action</th>
            </tr>
        </thead>
        <tbody>+
            @if($penjualan->count() > 0)
                @foreach($penjualan as $rs)
                    <tr>
                        <td class="align-middle">{{ $loop->iteration }}</td>
                        <td class="align-middle">{{ $rs->doc_id }}</td>
                        <td class="align-middle">{{ $rs->tanggal }}</td>
                        <td class="align-middle">{{ $rs->mitra }}</td>
                        <td class="align-middle">{{ $rs->alamat }}</td>  
                        <td class="align-middle">{{ $rs->nama_pembeli }}</td>
                        <td class="align-middle">{{ $rs->no_mobil}}</td>  
                        <td class="align-middle">{{ $rs->nama_driver }}</td>  
                        <td class="align-middle">{{ $rs->jml_ayam_panen }}</td>  
                        <td class="align-middle">{{ $rs->berat_rr }}</td>
                        <td class="align-middle">{{ $rs->harga_kg }}</td>
                        <td class="align-middle">{{ $rs->total_harga_jual }}</td>
                        <td class="align-middle">
                            <div class="btn-group" role="group" aria-label="Basic example">
                                <a href="{{ route('penjualan.show', $rs->id)}}" type="button" class="btn btn-warning">Edit</a>
                                <form action="{{ route('penjualan.destroy', $rs->id) }}" method="POST" type="button" class="btn btn-danger p-0" onsubmit="return confirm('Delete?')">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-danger m-0">Delete</button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @endforeach
                @else
                <tr>
                    <td class="text-center" colspan="5">Product not found</td>
                </tr>
            @endif
        </tbody>
    </table>
@endsection