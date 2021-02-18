@extends('layouts.app', ['activePage' => 'viewAllStudent', 'titlePage' => __('Generate Qr Code')])
@section('content')
@livewire('admin.generate-qr', ['StudentId'=> $StudentId])
@endsection
