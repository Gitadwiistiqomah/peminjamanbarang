@extends('layouts.app')

@section('content')
<div class="page-heading">
    <div class="page-title mb-3">
        <h3>
            <span class="bi bi-building"></span>
            Create - Items
        </h3>
    </div>

    <section class="section">
        <div class="card">
            <div class="card-body">
                <form action="{{route ('admin.items.store') }}" method="POST">
                    @csrf

                <div class="form-group mb-2">
                    <label for="name" class="form-lable"> Nama Barang <span class="text-danger">*</span></label>
                    <input type="text" name="name" id="name" value="{{ old('name') }}" class="form-control @error('name') is-invalid  @enderror" />
    
                    @error('name') 
                        <div class="invalid-feedback d-block">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group mb-2">
                    <label for="lokasi" class="form-lable"> Lokasi <span class="text-danger">*</span></label>
                    <input type="text" name="lokasi" id="lokasi" value="{{ old('lokasi') }}" class="form-control @error('lokasi') is-invalid  @enderror" />
    
                    @error('lokasi') 
                        <div class="invalid-feedback d-block">{{ $message }}</div>
                    @enderror
                </div>

                <button type="submit" class="btn btn-primary"> Simpan </button>
                <a href="{{ route('admin.items.index') }}" class="btn btn-secondary">Batal</a>
                </form>
            </div>
        </div>  
    </section>

</div>
@endsection