@extends('layouts.app')

@section('content')
<div class="page-heading">
    <div class="page-title mb-3">
        <h3>
            <span class="bi bi-building"></span>
            Create - members
        </h3>
    </div>

    <section class="section">
        <div class="card">
            <div class="card-body">
                <form action="{{route('admin.members.store') }}" method="POST">
                    @csrf
                <div class="form-group mb-2">
                    <label for="name" class="form-lable"> Name <span class="text-danger">*</span></label>
                    <input type="text" name="name" id="name" value="{{ old('name') }}" class="form-control @error('name') is-invalid  @enderror" />
    
                    @error('name') 
                        <div class="invalid-feedback d-block">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group mb-2">
                    <label for="email" class="form-lable"> Email <span class="text-danger">*</span></label>
                    <input type="text" name="email" id="email" value="{{ old('email') }}" class="form-control @error('email') is-invalid  @enderror" />
    
                    @error('email') 
                        <div class="invalid-feedback d-block">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group mb-2">
                    <label for="password" class="form-lable"> Password <span class="text-danger">*</span></label>
                    <input type="text" name="password" id="password" value="{{ old('password') }}" class="form-control @error('password') is-invalid  @enderror" />
    
                    @error('password') 
                        <div class="invalid-feedback d-block">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-check mb-2">
                    <input type="radio" name="role" id="admin" value="admin" value="{{ old('role') }}" class="form-check-input @error('role') is-invalid  @enderror"/>
                    <label for="admin" class="form-check-label"> Admin <span class="text-danger">*</span></label>
                </div>
                <div class="form-check mb-2">
                    <input type="radio" name="role" id="pemilik" value="pemilik" value="{{ old('role') }}" class="form-check-input @error('role') is-invalid  @enderror"/>
                    <label for="pemilik" class="form-check-label"> Pemilik <span class="text-danger">*</span></label>
    
                    @error('role') 
                        <div class="invalid-feedback d-block">{{ $message }}</div>
                    @enderror
                </div>

                <button type="submit" class="btn btn-primary"> Simpan </button>
                <a href="{{ route('admin.members.index') }}" class="btn btn-secondary">Batal</a>
                </form>
            </div>
        </div>  
    </section>

</div>
@endsection