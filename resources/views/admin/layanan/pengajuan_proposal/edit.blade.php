@extends('layouts.admin')

@section('title', 'Edit Pengajuan Proposal')

@section('content')
    <div class="container-fluid">
        <h1 class="mb-4">Edit Pengajuan Proposal</h1>

        @if (session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <div class="card shadow-sm">
            <div class="card-body">
                <form action="{{ route('admin.layanan.pengajuan_proposal.update', $pengajuanProposal->id) }}" method="POST">
                    @method('PUT')
                    @include('admin.layanan.pengajuan_proposal.form')
                </form>
            </div>
        </div>
    </div>
@endsection
