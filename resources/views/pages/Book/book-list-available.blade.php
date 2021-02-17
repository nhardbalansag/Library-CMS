@extends('layouts.app', ['activePage' => 'bookListavailable', 'titlePage' => __('Available Book List')])
@section('content')
@livewire('admin.view-all-available-books')
@endsection
