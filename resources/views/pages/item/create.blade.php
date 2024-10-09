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
                <form action="{{route('admin.items.store') }}" method="POST">
                    @csrf

                <div class="mb-3">
                    <label for="members_id" class="form-label">Nama Member</label>
                    <select name="members_id" id="members_id" class="form-control">
                         <option>pilih member</option>
                            @foreach ($members as $item)
                                <option value="{{ $item->id }}">{{ $item->member }}</option>
                            @endforeach
                    </select>
                </div>  

                <div class="form-group mb-2">
                    <label for="namebarang" class="form-lable"> Nama Barang <span class="text-danger">*</span></label>
                    <input type="text" name="namebarang" id="namebarang" value="{{ old('namebarang') }}" class="form-control @error('namebarang') is-invalid  @enderror" />
    
                    @error('namebarang') 
                        <div class="invalid-feedback d-block">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group mb-2">
                    <label for="harga" class="form-lable"> Harga <span class="text-danger">*</span></label>
                    <input type="number" name="harga" id="harga" value="{{ old('harga') }}" class="form-control @error('harga') is-invalid  @enderror" />
    
                    @error('harga') 
                        <div class="invalid-feedback d-block">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group mb-2">
                    <label for="foto" class="form-lable"> Foto <span class="text-danger">*</span></label>
                    <input type="file" name="foto" id="foto" value="{{ old('foto') }}"class="form-control @error('foto') is-invalid  @enderror"/>
    
                    @error('foto') 
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