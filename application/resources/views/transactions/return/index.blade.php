@extends('layouts.app')

@section('header')
<div class="col-sm-6">
    <h1 class="m-0">Pengembalian</h1>
</div>
<div class="col-sm-6">
    <ol class="breadcrumb float-sm-right">
        <li class="breadcrumb-item"><a href="{{ url('/') }}">Dashboard</a></li>
        <li class="breadcrumb-item"><a href="{{ url('/') }}">Transaksi</a></li>
        <li class="breadcrumb-item active">Pengembalian</li>
    </ol>
</div>
@endsection

@section('content')
<div class="container-fluid">
    <div class="card card-default">
        <div class="card-body">
            <div class="callout callout-warning mb-0">
                <h5>Under development</h5>
            </div>
        </div>
    </div>
</div>
@endsection
