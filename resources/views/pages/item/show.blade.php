@extends('layouts.app')

@section('content')
<div class="page-heading">
    <div class="page-title mb-3">
        <h3>
            <span class="bi bi-building"></span>
            Show New - Items
        </h3>
    </div>

    <section class="section">
        <div class="card">
            <div class="card-body">
                    
                <table class="table table-striped table-bordered"> 
                <tr>
                    <th>Id</th> 
                    <td><strong>#{{ $items->id }}</strong></td>
                </tr>
                <tr>
                    <td>Nama Barang </td>
                    <td>{{ $items->namebarang }}</td>
                </tr>
                <tr>
                    <td>Lokasi</td>
                    <td>{{ $items->lokasi }}</td>
                </tr>
                <tr>
                    <td>Created At</td>
                    <td>{{ Carbon\Carbon::parse($items->created_at )->isoFormat('DD MMM Y HH:mm') }}</td>
                </tr>
                <tr>
                    <td>Update At</td>
                    <td>{{ Carbon\Carbon::parse( $items->update_at)->isoFormat('DD MMM Y HH:mm') }}</td>
                </tr>

                <td>
                <a href="{{ route('admin.items.index')}}" class="btn btn-sm btn-primary mb-2">
                    <span class="bi bi-arrow-left"></span>
                Kembali</a>
                </td>

                </table>

            </div>
        </div>  
    </section>

</div>
@endsection