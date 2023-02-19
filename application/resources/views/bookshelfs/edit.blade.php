@extends('layouts.app')

@section('header')
<div class="col-sm-6">
    <h1 class="m-0">Lemari</h1>
</div>
<div class="col-sm-6">
    <ol class="breadcrumb float-sm-right">
        <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
        <li class="breadcrumb-item"><a href="{{ url('/bookshelfs') }}">Lemari</a></li>
        <li class="breadcrumb-item active">Ubah</li>
    </ol>
</div>
@endsection

@section('content')
<div class="container-fluid">
<div class="card card-primary">
        <div class="card-header">
            <h3 class="card-title">Mengubah lemari</h3>
        </div>

        <form method="POST" action="{{ url('/bookshelfs/edit/'. $data->id) }}">
            @csrf
            @method('PUT')
            <div class="card-body">
                <div class="form-group">
                    <label>Kode Lemari<sup class="text-danger">*</sup></label>
                    <input type="text" class="form-control @error('code') is-invalid @enderror" placeholder="Ex: 123xxx" name="code" required autocomplete="off" value="{{ $data->code }}">
                    @error('code')
                        <div class="alert alert-danger mt-2">
                            {{ $message }}
                        </div>
                    @enderror

                </div>
                <div class="form-group">
                    <label>Nama<sup class="text-danger">*</sup></label>
                    <input type="text" class="form-control @error('name') is-invalid @enderror" placeholder="Ex: Lemari A" name="name" required autocomplete="off" value="{{ $data->name }}">
                    @error('name')
                        <div class="alert alert-danger mt-2">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="form-group">
                    <label>Deskripsi</label>
                    <input type="text" class="form-control" placeholder="Deskripsi lemari (opsional)" name="description" autocomplete="off" value="{{ $data->description }}">
                </div>
            </div>

            <div class="card-footer">
                <button type="submit" class="btn btn-primary">Update</button>
                <a href="{{ url('/bookshelfs') }}" type="button" class="btn btn-default">Kembali</a>
            </div>
        </form>
    </div>
</div>
@endsection
