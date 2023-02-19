@extends('layouts.app')

@section('header')
<div class="col-sm-6">
    <h1 class="m-0">Buku</h1>
</div>
<div class="col-sm-6">
    <ol class="breadcrumb float-sm-right">
        <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
        <li class="breadcrumb-item"><a href="{{ url('/books') }}">Buku</a></li>
        <li class="breadcrumb-item active">Ubah</li>
    </ol>
</div>
@endsection

@section('content')
<div class="container-fluid">
<div class="card card-primary">
        <div class="card-header">
            <h3 class="card-title">Mengubah buku</h3>
        </div>

        <form method="POST" action="{{ url('/books/edit/'. $data->id) }}">
            @csrf
            @method('PUT')
            <div class="card-body">
                <div class="form-group">
                    <label>Lemari<sup class="text-danger">*</sup></label>
                    <select class="form-control @error('role') is-invalid @enderror" name="bookshelfs">
                        @foreach($bookshelfs as $row)
                        <option value="{{ $row->id }}" {{ ($row->id == $data->bookshelfs_id) ? 'selected' : '' }}>{{ $row->name }}</option>
                        @endforeach
                    </select>
                    @error('bookshelfs')
                        <div class="alert alert-danger mt-2">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <hr>

                <div class="form-group">
                    <label>Kode Buku<sup class="text-danger">*</sup></label>
                    <input type="text" class="form-control @error('code') is-invalid @enderror" placeholder="Ex: 123xxx" name="code" required autocomplete="off" value="{{ $data->code }}">
                    @error('code')
                        <div class="alert alert-danger mt-2">
                            {{ $message }}
                        </div>
                    @enderror

                </div>
                <div class="form-group">
                    <label>Nama<sup class="text-danger">*</sup></label>
                    <input type="text" class="form-control @error('name') is-invalid @enderror" placeholder="Ex: Biografi si fulan" name="name" required autocomplete="off" value="{{ $data->name }}">
                    @error('name')
                        <div class="alert alert-danger mt-2">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <div class="form-group">
                    <label>Pengarang</label>
                    <input type="text" class="form-control" placeholder="Pengarang buku (opsional)" name="author" autocomplete="off" value="{{ $data->author }}">
                </div>
                <div class="form-group">
                    <label>Deskripsi</label>
                    <input type="text" class="form-control" placeholder="Deskripsi lemari (opsional)" name="description" autocomplete="off" value="{{ $data->description }}">
                </div>
            </div>

            <div class="card-footer">
                <button type="submit" class="btn btn-primary">Submit</button>
                <a href="{{ url('/books') }}" type="button" class="btn btn-default">Kembali</a>
            </div>
        </form>
    </div>
</div>
@endsection
