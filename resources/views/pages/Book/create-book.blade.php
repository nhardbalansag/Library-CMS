@extends('layouts.app', ['activePage' => 'book', 'titlePage' => __('Book')])
@section('content')
  @livewire('admin.create-book')
@endsection
