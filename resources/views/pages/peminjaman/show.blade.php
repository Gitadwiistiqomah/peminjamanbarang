@extends('layouts.app')

@section('content')
<div class="page-heading">
    <div class="page-title mb-3">
        <h3>
            <span class="bi bi-people"></span>
            Show New - Peminjaman
        </h3>
    </div>

    <section class="section">
        <div class="card">
            <div class="card-body">
                    
                <table class="table table-striped table-bordered"> 
                 <tr>
                    <td>ID</td>
                    <td>{{ $peminjaman->id }}</td>
                </tr>
                <tr>
                    <td>Nama Item</td>
                    <td>{{$peminjaman->items_id}}</td>
                </tr>
                <tr>
                    <td>Nama Kategori</td>
                    <td>{{$peminjaman->categories_id}}</td>
                </tr>
                <tr>
                    <td>Nama </td>
                    <td>{{$peminjaman->name}}</td>
                </tr>
                <tr>
                    <td>Kelas</td>
                    <td>{{ $peminjaman->kelas }}</td>
                </tr>
                <tr>
                    <td>Waktu Pinjam</td>
                    <td>{{ $peminjaman->waktu_peminjaman }}</td>
                </tr>
                <tr>
                    <td>Status</td>
                    <td>{{ $peminjaman->status }}</td>
                </tr>
                <tr>
                    <td>Created At</td>
                    <td>{{ Carbon\Carbon::parse($peminjaman->created_at )->isoFormat('DD MMM Y HH:mm')}}</td>
                </tr>
                <tr>
                    <td>Update At</td>
                    <td>{{ Carbon\Carbon::parse( $peminjaman->update_at)->isoFormat('DD MMM Y HH:mm') }}</td>
                </tr>

                <td>
                <a href="{{ route('admin.peminjaman.index')}}" class="btn btn-sm btn-primary mb-2">
                    <span class="bi bi-arrow-left"></span>
                Kembali</a>
                </td>

                </table>

            </div>
        </div>  
    </section>

</div>
@endsection