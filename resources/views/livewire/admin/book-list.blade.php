@extends('layouts.app', ['activePage' => 'bookList', 'titlePage' => __('Table List')])

@section('content')
<div class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-12">
        <div class="card">
          <div class="card-header card-header-primary">
            <h4 class="card-title ">Book List</h4>
            <p class="card-category">All book list</p>
          </div>
          <div class="card-body">
            <div class="table-responsive">
              <table class="table">
                <thead class=" text-primary">
                  <th>#</th>
                  <th>Thumbnail</th>
                  <th>Title</th>
                  <th>Category</th>
                  <th>Status</th>
                  <th>Date Created</th>
                </thead>
                <tbody>
                    @foreach($books as $key => $value)
                        <tr>
                            <td>{{ $key }}</td>
                            <td>
                                <img class="w-20" src="{{asset('storage/' . $value->image_path) }}" alt="thumbnail">
                            </td>
                            <td>{{ $value->title }}</td>
                            <td>{{ $value->bookCategoryTitle }}</td>
                            <td class="text-primary">{{ $value->status }}</td>
                            <td class="text-primary">{{ $value->created_at }}</td>
                        </tr>
                    @endforeach
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
