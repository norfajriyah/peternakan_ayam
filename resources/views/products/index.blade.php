@extends('layouts.app')
  
@section('title', 'Day Old Chick ')
  
@section('contents')
{{-- <@php
    dd($products);
@endphp --}}
    <div class="d-flex align-items-center justify-content-between">
        <h1 class="mb-0">List Data DOC</h1>
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
                <th>periode</th>
                <th>tanggal</th>
                <th>distributor</th>
                <th>jenis ayam</th>
                <th>jumlah ayam</th>
                <th>harga kontrak</th>
                <th>total harga</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>+
            @if($products->count() > 0)
                @foreach($products as $rs)
                    <tr>
                        <td class="align-middle">{{ $loop->iteration }}</td>
                        <td class="align-middle">{{ $rs->periode }}</td>
                        <td class="align-middle">{{ $rs->tanggal }}</td>
                        <td class="align-middle">{{ $rs->distributor }}</td>
                        <td class="align-middle">{{ $rs->jns_ayam }}</td>  
                        <td class="align-middle">{{ $rs->jumlah_ayam }}</td>
                        <td class="align-middle">{{ $rs->harga_kontrak}}</td>  
                        <td class="align-middle">{{ $rs->total_harga }}</td>    
                        <td class="align-middle">
                            <div class="btn-group" role="group" aria-label="Basic example">
                                <a href="{{ route('products.show', $rs->id)}}" type="button" class="btn btn-warning">Edit</a>
                                <form action="{{ route('products.destroy', $rs->id) }}" method="POST" type="button" class="btn btn-danger p-0" onsubmit="return confirm('Delete?')">
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