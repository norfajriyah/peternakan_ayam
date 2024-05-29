@extends('layouts.app')
  
@section('title', 'Perkembangan')
  
@section('contents')
{{-- <@php
    dd($products);
@endphp --}}
    <div class="d-flex align-items-center justify-content-between">
        <h1 class="mb-0">List Data Perkembangan</h1>
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
                <th>jumlah populasi</th>
                <th>strain</th>
                <th>bw datang</th>
                <th>kondisi</th>
                <th>umur</th>
                <th>standar feed</th>
                <th>actual feed</th>
                <th>mati</th>
                <th>culling</th>
                <th>afkir</th>
                <th>action</th>
            </tr>
        </thead>
        <tbody>+
            @if($perkembangans->count() > 0)
                @foreach($perkembangans as $rs)
                    <tr>
                        <td class="align-middle">{{ $loop->iteration }}</td>
                        <td class="align-middle">{{ $rs->doc_id }}</td>
                        <td class="align-middle">{{ $rs->tanggal }}</td>
                        <td class="align-middle">{{ $rs->jml_populasi }}</td>
                        <td class="align-middle">{{ $rs->atrain }}</td>  
                        <td class="align-middle">{{ $rs->bw_datang }}</td>
                        <td class="align-middle">{{ $rs->kondisi}}</td>  
                        <td class="align-middle">{{ $rs->umur }}</td>  
                        <td class="align-middle">{{ $rs->std_feed }}</td>  
                        <td class="align-middle">{{ $rs->act_feed }}</td>
                        <td class="align-middle">{{ $rs->mati_deplesi }}</td>
                        <td class="align-middle">{{ $rs->culling_deplesi }}</td>
                        <td class="align-middle">{{ $rs->afkir_deplesi }}</td>
                        <td class="align-middle">
                            <div class="btn-group" role="group" aria-label="Basic example">
                                <a href="{{ route('perkembangan.show', $rs->id)}}" type="button" class="btn btn-warning">Edit</a>
                                <form action="{{ route('perkembangan.destroy', $rs->id) }}" method="POST" type="button" class="btn btn-danger p-0" onsubmit="return confirm('Delete?')">
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