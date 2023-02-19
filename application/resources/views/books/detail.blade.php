@extends('layouts.app')

@section('header')
<div class="col-sm-6">
    <h1 class="m-0">Buku</h1>
</div>
<div class="col-sm-6">
    <ol class="breadcrumb float-sm-right">
        <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
        <li class="breadcrumb-item"><a href="{{ url('/books') }}">Buku</a></li>
        <li class="breadcrumb-item active">Detail</li>
    </ol>
</div>
@endsection

@section('content')
<div class="container-fluid">
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Detail buku</h3>
        </div>
        <div class="card-body table-responsive p-0">
            <table class="table table-hover text-nowrap">
                <tr>
                    <td width="20%">Lemari</td>
                    <td width="80%">: {{ $bookshelfs->name }}</td>
                </tr>
                <tr>
                    <td>Kode Buku</td>
                    <td>: {{ $data->code }}</td>
                </tr>
                <tr>
                    <td>Nama</td>
                    <td>: {{ $data->name }}</td>
                </tr>
                <tr>
                    <td>Pengarang</td>
                    <td>: {{ ($data->author) ? $data->author : '-' }} </td>
                </tr>
                <tr>
                    <td>Deskripsi</td>
                    <td>: {{ ($data->description) ? $data->description : '-' }} </td>
                </tr>
                <tr>
                    <td>Status</td>
                    <td>
                        @if($data->is_active)
                            <span class="badge bg-success">Aktif</span>
                        @else
                            <span class="badge bg-danger">Tidak Aktif</span>
                        @endif
                    </td>
                </tr>
                <tr>
                    <td>Dibuat</td>
                    <td>: {{ $data->created_at }}</td>
                </tr>
            </table>
        </div>
    </div>
</div>
<script>
function search() {
    const query = document.getElementById('searchQuery').value
    document.location = `{{ url('/books') }}?q=${query}`
}
</script>
@endsection
