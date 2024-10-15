@extends('layouts.app')

@section('content')
<div class="page-heading">
    <div class="page-title mb-3">
        <h3>
            <span class="bi bi-people"></span>
            Peminjaman
        </h3>
    </div>

    <section class="section">
        <div class="card">
            <div class="card-body">
                <table id="datatable" class="table table-striped">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Name</th>
                            <th>Kelas</th>
                            <th>Nama Item</th>
                            <th>Nama Kategori</th>
                            <th>Waktu Pinjam</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($peminjaman as $item)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $item->name }}</td>
                            <td>{{ $item->kelas }}</td>
                            <td>{{ $item->items->name }}</td>
                            <td>{{ $item->categories->name}}</td>
                            <td>{{ Carbon\carbon::parse($item->waktu_peminjaman)->isoFormat('DD MMMM Y') }}</td>
                            <td>
                                <a href="{{ route('admin.peminjaman.show', $item->id) }}" class="btn btn-outline-secondary btn-sm me-1">
                                    <span class="bi bi-eye">Show</span>
                                </a>
                                <a href="#" class="btn btn-danger btn-sm me-1" onclick="handleDestroy(`{{ route ('admin.peminjaman.destroy', $item->id) }}`)">
                                    <span class="bi bi-trash">Hapus</span>
                                </a>
                            </td>
                        </tr>  
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </section>
</div>  

    <form action="" id="form-delete" method="POST">
        @csrf
        @method('DELETE')
    </form>
@endsection

@push('styles')
    <link rel="stylesheet" href="{{ asset('/vendors/simple-datatables/style.css')}}">
@endpush

@push('scripts')
    <script src="{{ asset('/vendors/simple-datatables/simple-datatables.js')}}"></script>
        <script>
        // Simple Datatable
        let datatable = document.querySelector('#datatable');
        new simpleDatatables.DataTable(datatable);
    </script>
@endpush

@push('scripts')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>

    <script type="text/javascript">
        function handleDestroy(url) {
            swal({
                title: "Apakah anda yakin?",
                text: "Setelah dihapus, Anda tidak akan dapat mengembalikannya",
                icon: "warning",
                buttons: ['Batal', 'Ya, hapus!'],
                dengerMode: true,
            })
            .then((confirmed) => {
                if (confirmed) {
                    $('#form-delete').attr('action', url);
                    $('#form-delete').submit();
                }
            });
        }
    </script>
@endpush