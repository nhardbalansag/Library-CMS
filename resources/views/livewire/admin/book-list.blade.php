<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                @if (session()->has('message'))
                    <div class="alert alert-success">
                        <span>
                        <b> Success - </b> {{ session('message') }}</span>
                    </div>
                @endif
            </div>
            <div class="col-md-12">
                <form wire:submit.prevent="searchBooks" class="form-horizontal">
                    <div  class="input-group no-border w-50">
                        <input wire:model.defer='booktitle' type="text" name="bookSearch" class="form-control" placeholder="Search...">
                        <button type="submit" class="btn btn-white btn-round btn-just-icon">
                            <i class="material-icons">search</i>
                            <div class="ripple-container"></div>
                        </button>
                    </div>
                </form>
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
                                                <img width="100" src="{{asset('storage/' . $value->image_path) }}" alt="thumbnail">
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
        @if ($books->hasPages())
            <nav role="navigation" aria-label="Pagination Navigation" class="flex justify-between">
                {{-- Previous Page Link --}}
                @if ($books->onFirstPage())
                    <span class="relative inline-flex items-center px-4 py-2 text-sm font-medium leading-5 text-gray-500 bg-white border border-gray-300 rounded-md cursor-default">
                        {!! __('pagination.previous') !!}
                    </span>
                @else
                    <a href="{{ $books->previousPageUrl() }}" rel="prev" class="relative inline-flex items-center px-4 py-2 text-sm font-medium leading-5 text-gray-700 transition duration-150 ease-in-out bg-white border border-gray-300 rounded-md hover:text-gray-500 focus:outline-none focus:shadow-outline-blue focus:border-blue-300 active:bg-gray-100 active:text-gray-700">
                        {!! __('pagination.previous') !!}
                    </a>
                @endif

                {{-- Next Page Link --}}
                @if ($books->hasMorePages())
                    <a href="{{ $books->nextPageUrl() }}" rel="next" class="relative inline-flex items-center px-4 py-2 text-sm font-medium leading-5 text-gray-700 transition duration-150 ease-in-out bg-white border border-gray-300 rounded-md hover:text-gray-500 focus:outline-none focus:shadow-outline-blue focus:border-blue-300 active:bg-gray-100 active:text-gray-700">
                        {!! __('pagination.next') !!}
                    </a>
                @else
                    <span class="relative inline-flex items-center px-4 py-2 text-sm font-medium leading-5 text-gray-500 bg-white border border-gray-300 rounded-md cursor-default">
                        {!! __('pagination.next') !!}
                    </span>
                @endif
            </nav>
        @endif
    </div>
    <div wire:loading>
        @include('component.loading-state')
    </div>
</div>
