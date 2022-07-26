@extends('layouts.app')

@section('content')
<div class="container">
    <h4>management pendaftaran</h4>
    <div class="row">
        <div class="col-3">
            <select name="category_id" class="form-control">
                <option value="" selected>All</option>
                @foreach ($categories as $category)
                    <option value="{{$category -> id}}" 
                        {{! empty(request()->get('category_id')) 
                        && request()->get('category_id') == $category ->id ? 'selected':'' }}>
                        {{$category->nama}}
                    </option>
                @endforeach
            </select>
        </div>
        <div class="col-9">
                <form action="{{route('manage.register.index')}}" method="get">
                    @csrf
                    <div class="input-group">
                        <input type="text" name="keyword" class="form-control">
                        <button class="btn btn-outline-secondary" type="submit">Search
                        </button>
                    </div>
                </form>
        </div>
    </div>
        <table class="table table-bordered table-striped mt-3">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nim</th>
                    <th>Nama</th>
                    <th>Kategori</th>
                    <th>Tanggal pendaftaran</th>
                    <th>Action</th> 
                  </tr>
            </thead>
            <tbody>
                @php
                    $no = (request()->get('page',1)-1)*$limit;
                @endphp
                @forelse ($registrations as $row)
                    <tr>
                        <td>{{++$no;}}</td>
                        <td>{{$row -> nim;}}</td>
                        <td>{{$row -> nama;}}</td>
                        <td>{{$row -> category->nama;}}</td>
                        <td>{{$row -> created_at;}}</td>
                        <td>action</td>
                        
                    </tr>
                    @empty
                    <tr>
                        <td class="text-center" colspan="6">Data Tidak Ada</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
        {{$registrations ->links()}}
</div>
    
@endsection