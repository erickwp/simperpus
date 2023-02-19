@extends('layouts.app')

@section('header')
<div class="col-sm-6">
    <h1 class="m-0">Lemari <a href="{{ url('/bookshelfs/add') }}" class="btn btn-primary btn-sm ml-3" title="Tambah Data Baru"><i class="fa fa-plus"></i></a></h1>
</div>
<div class="col-sm-6">
    <ol class="breadcrumb float-sm-right">
        <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
        <li class="breadcrumb-item active">Lemari</li>
    </ol>
</div>
@endsection

@section('content')
<div class="container-fluid">
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Daftar lemari</h3>

            <div class="card-tools">
                <div class="input-group input-group-sm">
                    <input type="text" id="searchQuery" class="form-control float-right" placeholder="Search">

                    <div class="input-group-append">
                        <button type="button" class="btn btn-default" onclick="search()">
                            <i class="fas fa-search"></i>
                        </button>
                    </div>
                </div>
            </div>
        </div>
        <div class="card-body table-responsive p-0">
            <table class="table table-hover text-nowrap">
                <thead>
                    <tr>
                        <th>Code</th>
                        <th>Nama</th>
                        <th>Deskripsi</th>
                        <th>Status</th>
                        <th>Dibuat</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>

                    @foreach($data['data'] as $row)
                    <tr>
                        <td>{{ $row->code }}</td>
                        <td>{{ $row->name }}</td>
                        <td>{{ ($row->description) ? $row->description : '-' }}</td>
                        <td>
                            @if($row->is_active)
                                <span class="badge bg-success">Aktif</span>
                            @else
                                <span class="badge bg-danger">Tidak Aktif</span>
                            @endif
                        </td>
                        <td>{{ $row->created_at }}</td>
                        <td>
                            <a href="{{ url('/bookshelfs/edit/'.$row->id) }}" class="btn btn-warning btn-xs" title="Edit data"><i class="fas fa-pencil-alt"></i></a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
<script>
function search() {
    const query = document.getElementById('searchQuery').value
    document.location = `{{ url('/bookshelfs') }}?q=${query}`
}
</script>
@endsection
