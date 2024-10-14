@extends('layouts.app')

@section('content')
<div class="page-heading">
    <div class="page-title mb-3">
        <h3>
            <span class="bi bi-building"></span>
            Edit New - Items
        </h3>
    </div>

    <section class="section">
        <div class="card">
            <div class="card-body">
                <form action="{{ route('admin.items.update', $items->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    {{-- <div class="mb-3">
                        <label for="members_id" class="form-label"> Nama Member</label>
                        <select name="members_id" id="members_id" class="form-control">
                            <option>Pilih member</option>
                            @foreach ($members as $item)
                                <option value="{{ $item->id }}">{{ $item->member }}</option>
                            @endforeach
                        </select>
                    </div> --}}

                    <div class="form-group mb-2">
                        <label for="namebarang" class="form-lable"> Nama Barang <span class="text-danger">*</span></label>
                        <input type="text" name="namebarang" id="namebarang" value="{{ $items->namebarang }}" class="form-control @error('namebarang') is-invalid  @enderror"/>
    
                        @error('namebarang') 
                            <div class="invalid-feedback d-block">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group mb-2">
                        <label for="lokasi" class="form-lable"> Lokasi <span class="text-danger">*</span></label>
                        <input type="text" name="lokasi" id="lokasi" value="{{ $items->lokasi }}" class="form-control @error('lokasi') is-invalid  @enderror"/>
    
                        @error('lokasi') 
                            <div class="invalid-feedback d-block">{{ $message }}</div>
                        @enderror
                    </div>

                    {{-- <div class="form-group mb-2">
                        <label for="foto" class="form-lable"> Foto <span class="text-danger">*</span></label>
                        <input type="file" name="foto" id="foto" value="{{ ($items->foto) }}" class="form-control  @error('foto') is-invalid  @enderror"/>
                        <img src="{{ asset('storage/uploads/peminjamanbarang/'. $items->foto) }}" alt="" width="100" height="100">

                        @error('foto') 
                            <div class="invalid-feedback d-block">{{ $message }}</div>
                        @enderror
                    </div> --}}

                    
                        <button type="submit" class="btn btn-primary"> Simpan </button>
                    <a href="{{ route('admin.items.index') }}" class="btn btn-secondary">Batal</a>
                </form>
            </div>
        </div>  
    </section>

</div>
@endsection