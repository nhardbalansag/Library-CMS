@extends('layouts.app', ['activePage' => 'studentBookBorrowed', 'titlePage' => __('Student Books Borrowed')])
@section('content')
@section('content')
@livewire('admin.student-book-borrowed-list', ['userId' => $id])
@endsection
