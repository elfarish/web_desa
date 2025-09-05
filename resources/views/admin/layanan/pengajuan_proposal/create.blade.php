@extends('layouts.admin')

@section('title', 'Tambah Pengajuan Proposal')

@section('content')
    <div class="container-fluid">
        <h1 class="mb-4">Tambah Pengajuan Proposal</h1>

        @if (session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <div class="card shadow-sm">
            <div class="card-body">
                <form action="{{ route('admin.layanan.pengajuan_proposal.store') }}" method="POST">
                    @include('admin.layanan.pengajuan_proposal.form')
                </form>
            </div>
        </div>
    </div>
@endsection
