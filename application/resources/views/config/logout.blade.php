@extends('layouts.app')

@section('header')
<div class="col-sm-6">
    <h1 class="m-0">Logout</h1>
</div>
<div class="col-sm-6">
    <ol class="breadcrumb float-sm-right">
        <li class="breadcrumb-item"><a href="{{ url('/') }}">Dashboard</a></li>
        <li class="breadcrumb-item active">Logout</li>
    </ol>
</div>
@endsection

@section('content')
<div class="container-fluid">
    <div class="card card-default">
        <div class="card-body">
            <div class="callout callout-danger mb-0">
                <h5>Keluar</h5>

                <p>Silahkan menekan tombol di bawah ini untuk keluar dari aplikasi.</p>
                <form method="POST" action="{{ url('/logout') }}">
                    @csrf
                    <button type="submit">Logout</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
