@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Edit Buku</div>
                <div class="card-body">
                    <form method="post" action="{{ route('buku.update', $buku->id) }}">
                        @csrf
                        @method('PUT')

                        <div class="row mb-3">
                            <label for="Judul" class="col-md-4 col-form-label text-md-end">{{ __('Judul') }}</label>
                            <div class="col-md-6">
                                <input id="Judul" type="text" value="{{ old('Judul', $buku->Judul) }}" 
                                       class="form-control @error('Judul') is-invalid @enderror" 
                                       name="Judul" required>
                                
                                @error('Judul')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="TahunTerbit" class="col-md-4 col-form-label text-md-end">{{ __('Tahun Terbit') }}</label>
                            <div class="col-md-6">
                                <input id="TahunTerbit" type="text" value="{{ old('TahunTerbit', $buku->TahunTerbit) }}" 
                                       class="form-control @error('TahunTerbit') is-invalid @enderror" 
                                       name="TahunTerbit" required>
                                
                                @error('TahunTerbit')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="Penerbit" class="col-md-4 col-form-label text-md-end">{{ __('Penerbit') }}</label>
                            <div class="col-md-6">
                                <input id="Penerbit" type="text" value="{{ old('Penerbit', $buku->Penerbit) }}" 
                                       class="form-control @error('Penerbit') is-invalid @enderror" 
                                       name="Penerbit" required>
                                
                                @error('Penerbit')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="Penulis" class="col-md-4 col-form-label text-md-end">{{ __('Penulis') }}</label>
                            <div class="col-md-6">
                                <input id="Penulis" type="text" value="{{ old('Penulis', $buku->Penulis) }}" 
                                       class="form-control @error('Penulis') is-invalid @enderror" 
                                       name="Penulis" required>
                                
                                @error('Penulis')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="NamaKategori" class="col-md-4 col-form-label text-md-end">{{ __('Kategori') }}</label>
                            <div class="col-md-6">
                                <select id="NamaKategori" name="NamaKategori" class="form-control @error('NamaKategori') is-invalid @enderror" required>
                                    <option value="">Pilih Kategori</option>
                                    @foreach($kategoris as $kat)
                                        <option value="{{ $kat->NamaKategori }}" 
                                                {{ old('NamaKategori', $buku->NamaKategori) == $kat->NamaKategori ? 'selected' : '' }}>
                                            {{ $kat->NamaKategori }}
                                        </option>
                                    @endforeach
                                </select>

                                @error('NamaKategori')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Simpan') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection