<div>
    <table class="table">
        <tbody>
            {{-- borrowed books --}}
            @foreach($books as $key => $value)
                <tr>
                    <td class="form-check-label">{{ $key }}</td>
                    <td>
                        <img width="100" src="{{asset('storage/' . $value->image_path) }}" alt="thumbnail">
                    </td>
                    <td>{{ $value->title }}</td>
                    <td class="text-primary">
                        <a href="/book/book-list-available" class="btn btn-primary btn-round btn-just-icon">
                            <i class="material-icons">visibility</i>
                            <div class="ripple-container"></div>
                        </a>
                    </td>
                </tr>
            @endforeach
        </tbody>
      </table>
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
