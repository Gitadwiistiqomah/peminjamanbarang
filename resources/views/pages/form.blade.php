<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Peminjaman Form</title>

    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@300;400;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('/css/bootstrap.css') }}">
    
    <link rel="stylesheet" href="{{ asset('/vendors/perfect-scrollbar/perfect-scrollbar.css') }}">
    <link rel="stylesheet" href="{{ asset('/vendors/bootstrap-icons/bootstrap-icons.css') }}">
    <link rel="stylesheet" href="{{ asset('/css/app.css') }}">

    <link rel="shortcut icon" href="{{ asset('/images/favicon.svg') }}" type="image/x-icon">
</head>
<body>
    <div class="container my-4">
        <div class="row justify-content-center">
            <div class="col-md-9">
                <div class="card shadow">
                    <div class="card-header">
                        PEMINJAMAN FORM
                    </div>
                    <div class="card-body">
                        <p>Silahkan masukan data kamu sebagai peminjam,pada form dibawah:</p>
                        @if (Session::has('success'))
                            <div class="alert alert-success"> {{ Session::get('success')}}</div>
                        @endif

                        <form action="{{ route('form.store')}}" method="POST">
                            @csrf

                            <div class="form-group mb-3">
                                <label for="name"> Nama Peminjam </label>
                                    <input type="text" name="name" id="name" value="{{ old('name')}}" class="form-control @error('name') is-invalid @enderror"/>
                                
                                @error('name')
                                        <div class="invalid-feedback d-block">{{ $message}}</div>
                                @enderror
                            </div>
                       
                        
                            <div class="form-group mb-3">
                                <label for="kelas">Kelas</label>
                                <input type="text" name="kelas" id="kelas"  value="{{ old('kelas')}}" class="form-control @error('kelas') is-invalid @enderror"/>
                                
                                @error('kelas')
                                    <div class="invalid-feedback d-block">{{ $message}}</div>
                                @enderror
                            </div>
                            
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group mb-3">
                                        <label for="items_id"> Nama Items </label>
                                            <select name="items_id" class="form-select @error('items_id') is-invalid @enderror">
                                                @foreach($items as $item)
                                                    <option value="{{ $item->id}}" @if (old('items_id') ==$item->id) selected @endif> {{ $item->name }}</option>
                                                @endforeach
                                            </select>
                                        
                                        @error('items_id')
                                            <div class="invalid-feedback d-block">{{ $message}}</div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group mb-3">
                                        <label for="categories_id"> Nama Kategori </label>
                                            <select name="categories_id" class="form-select @error('categories_id') is-invalid @enderror">
                                                @foreach($categories as $item)
                                                    <option value="{{ $item->id}}" @if (old('categories_id') ==$item->id) selected @endif> {{ $item->name }}</option>
                                                @endforeach
                                            </select>
                                        
                                        @error('categories_id')
                                            <div class="invalid-feedback d-block">{{ $message}}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>    
                            
                           
                                <div class="form-group mb-3">
                                    <label for="waktu_peminjaman">Waktu Peminjaman</label>
                                    <input type="datetime-local" name="waktu_peminjaman" id="waktu_peminjaman"  value="{{ old('waktu_peminjaman')}}" class="form-control @error('waktu_peminjaman') is-invalid @enderror"/>
                                    
                                    @error('waktu_peminjaman')
                                        <div class="invalid-feedback d-block">{{ $message}}</div>
                                    @enderror
                                </div>

                                <div class="form-group mb-3">
                                    <label for="status"> Status </label> 
                                    <div class="form-check mb-2">  
                                        <input type="radio" name="status" id="Belum Dikembalikan" value="Belum Dikembalikan" value="{{ old('status') }}" class="form-check-input @error('status') is-invalid  @enderror"/>
                                        <label for="Belum Dikembalikan" class="form-check-label"> Belum Dikembalikan </label>
                                    </div>
                                    <div class="form-check mb-2">
                                        <input type="radio" name="status" id="Sudah Dikembalikan" value="Sudah Dikembalikan" value="{{ old('status') }}" class="form-check-input @error('status') is-invalid  @enderror"/>
                                        <label for="Sudah Dikembalikan" class="form-check-label"> Sudah Dikembalikan </label>
                        
                                    @error('status')
                                        <div class="invalid-feedback d-block">{{ $message}}</div>
                                    @enderror
                                </div>

                            <button type="submit" class="btn btn-primary">Submit
                                <span class="bi bi-send ms-2"></span>
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="{{ asset('/vendors/perfect-scrollbar/perfect-scrollbar.min.js') }}"></script>
    <script src="{{ asset('/js/bootstrap.bundle.min.js') }}"></script>
    
</body>
</html>