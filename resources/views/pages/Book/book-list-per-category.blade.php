@extends('layouts.app', ['activePage' => 'bookListavailableperCategory', 'titlePage' => $bookCategoryTitle . ' book category'])
@section('content')
@livewire('admin.book-list-category',['BookCategoryId' => $BookCategoryId])
@endsection
