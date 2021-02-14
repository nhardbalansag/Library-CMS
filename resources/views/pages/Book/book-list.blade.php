@extends('layouts.app', ['activePage' => 'bookList', 'titlePage' => __('Book')])
@section('content')
  @livewire('admin.book-list')
@endsection
