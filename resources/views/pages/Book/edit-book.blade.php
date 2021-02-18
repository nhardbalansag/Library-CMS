@extends('layouts.app', ['activePage' => 'editBook', 'titlePage' => __('Edit Book')])
@section('content')
  @livewire('admin.edit-book', ['BookId'=> $BookId])
@endsection
