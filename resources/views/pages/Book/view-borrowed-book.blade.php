@extends('layouts.app', ['activePage' => 'viewBoorowOne', 'titlePage' => __('View one borrowed Book')])
@section('content')
  @livewire('admin.view-borrowed-book', ['BorrowId'=> $BorrowId])
@endsection
