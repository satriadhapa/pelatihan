@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h4>Pendaftaran Program Pelatihan</h4>
            </div>
            <div class="col-12">
                <form action="{{route('pendaftaran.store')}}" method="post">
                    @csrf

                    <div class="mb-3">
                        <label for="nim">NIM</label>
                        <input type="text" name="nim" value="{{old('nim')}}" class="form-control" required>
                        @error('nim')
                            <div class="invalid-feedback">{{$message}}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="nama">Nama</label>
                        <input type="text" name="nama" value="{{old('nama')}}" class="form-control">
                        @error('nama')
                            <div class="invalid-feedback">{{$message}}</div>                            
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="category_id">Kategori</label>
                        <select type="text" name="category_id" class="form-control" required>
                        @foreach ($categories as $category)
                        <option value="{{$category->id}}">
                            {{$category->nama}}
                        </option>
                            
                        @endforeach
                        </select>
                        @error('category_id')
                            <div class="invalid-feedback">{{$message}}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="alasan">Alasan Mengikuti</label>
                        <textarea name="alasan" class="form-control" required cols="30" rows="10">{{old('alasan')}}</textarea>
                        @error('alasan')
                            <div class="invalid-feedback">{{$message}}</div>
                            
                        @enderror
                    </div>
                    <button class="btn btn-primary" type="submit">Daftar</button>
                </form>
            </div>
        </div>
    </div>
@endsection