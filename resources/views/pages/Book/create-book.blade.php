@extends('layouts.app', ['activePage' => 'book', 'titlePage' => __('Create New Book')])
@section('content')
  @livewire('admin.create-book')
@endsection
