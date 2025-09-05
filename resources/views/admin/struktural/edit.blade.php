@extends('layouts.admin')

@section('content')
    @include('admin.struktural.form', [
        'title' => 'Edit Staf',
        'route' => route('admin.struktural.update', $struktural->id),
        'method' => 'PUT',
        'data' => $struktural,
    ])
@endsection
