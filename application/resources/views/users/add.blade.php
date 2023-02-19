@extends('layouts.app')

@section('header')
<div class="col-sm-6">
    <h1 class="m-0">Tambah User</h1>
</div>
<div class="col-sm-6">
    <ol class="breadcrumb float-sm-right">
        <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
        <li class="breadcrumb-item"><a href="{{ url('/users') }}">User</a></li>
        <li class="breadcrumb-item active">Tambah</li>
    </ol>
</div>
@endsection

@section('content')
<div class="container-fluid">
    <div class="card card-primary">
        <div class="card-header">
            <h3 class="card-title">Menambahkan user baru</h3>
        </div>

        <form method="POST" action="{{ url('/users/add') }}">
            @csrf
            <div class="card-body">
                <div class="form-group">
                    <label for="exampleInputEmail1">Email<sup class="text-danger">*</sup></label>
                    <input type="email" class="form-control @error('email') is-invalid @enderror" placeholder="Ex: me@mailinator.com" name="email" required autocomplete="off">
                    @error('email')
                        <div class="alert alert-danger mt-2">
                            {{ $message }}
                        </div>
                    @enderror

                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">Password<sup class="text-danger">*</sup></label>
                    <input type="password" class="form-control @error('password') is-invalid @enderror" placeholder="******" name="password" required>
                    @error('password')
                        <div class="alert alert-danger mt-2">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <hr>

                <div class="form-group">
                    <label for="exampleInputEmail1">Nama<sup class="text-danger">*</sup></label>
                    <input type="text" class="form-control @error('name') is-invalid @enderror" placeholder="Ex: Galang Purnomo" name="name" required autocomplete="off">
                    @error('nama')
                        <div class="alert alert-danger mt-2">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Alamat</label>
                    <input type="text" class="form-control" placeholder="Ex: Ikan Tuna" name="address" autocomplete="off">
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Telepon</label>
                    <input type="number" class="form-control" placeholder="Ex: 081234xxx" name="phone" autocomplete="off">
                </div>

                <hr>

                <div class="form-group">
                    <label for="exampleInputEmail1">Role<sup class="text-danger">*</sup></label>
                    <select class="form-control @error('role') is-invalid @enderror" name="role">
                        @foreach($roles as $row)
                        <option value="{{ $row->id }}">{{ $row->name }}</option>
                        @endforeach
                    </select>
                    @error('role')
                        <div class="alert alert-danger mt-2">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
            </div>

            <div class="card-footer">
                <button type="submit" class="btn btn-primary">Submit</button>
                <a href="{{ url('/users') }}" type="button" class="btn btn-default">Kembali</a>
            </div>
        </form>
    </div>
</div>
@endsection
