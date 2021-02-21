
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                @if (session()->has('message'))
                    <div class="alert alert-success">
                        <span>
                        <b> Success - </b> {{ session('message') }}</span>
                    </div>
                @elseif(session()->has('error'))
                    <div class="alert alert-danger">
                        <span>
                        <b> Success - </b> {{ session('error') }}</span>
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
                <div>
                    <button wire:click="descending" class="btn btn-primary btn-round btn-just-icon">
                        <i class="fas fa-sort-amount-up"></i>
                        <div class="ripple-container"></div>
                    </button>
                    <button wire:click="ascending" class="btn btn-primary btn-round btn-just-icon">
                        <i class="fas fa-sort-amount-down-alt"></i>
                        <div class="ripple-container"></div>
                    </button>
                </div>
                <div class="content">
                    <div class="container-fluid">
                      <div class="row">
                        <div class="col-lg-3 col-md-6 col-sm-6">
                          <div class="card card-stats">
                            <div class="card-header card-header-warning card-header-icon">
                              <div class="card-icon">
                                <i class="fas fa-book"></i>
                              </div>
                              <p class="card-category">Returned</p>
                              <h3 class="card-title">{{ $totalReturn }}</h3>
                            </div>
                            <div class="card-footer">
                              <div class="stats">
                                <i class="fas fa-share"></i>
                              </div>
                            </div>
                          </div>
                        </div>
                        <div class="col-lg-3 col-md-6 col-sm-6">
                            <div class="card card-stats">
                              <div class="card-header card-header-warning card-header-icon">
                                <div class="card-icon">
                                  <i class="fas fa-book"></i>
                                </div>
                                <p class="card-category">Borrowed</p>
                                <h3 class="card-title">{{ $totalBorrow }}</h3>
                              </div>
                              <div class="card-footer">
                                <div class="stats">
                                  <i class="fas fa-share"></i>
                                </div>
                              </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6 col-sm-6">
                            <div class="card card-stats">
                              <div class="card-header card-header-warning card-header-icon">
                                <div class="card-icon">
                                  <i class="fas fa-book"></i>
                                </div>
                                <p class="card-category">Pending</p>
                                <h3 class="card-title">{{ $totalPending }}</h3>
                              </div>
                              <div class="card-footer">
                                <div class="stats">
                                  <i class="fas fa-share"></i>
                                </div>
                              </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6 col-sm-6">
                            <div class="card card-stats">
                              <div class="card-header card-header-warning card-header-icon">
                                <div class="card-icon">
                                  <i class="fas fa-book"></i>
                                </div>
                                <p class="card-category">Total</p>
                                <h3 class="card-title">{{ $totalBooks }}</h3>
                              </div>
                              <div class="card-footer">
                                <div class="stats">
                                  <i class="fas fa-share"></i>
                                </div>
                              </div>
                            </div>
                        </div>
                    </div>
                  </div>
                <div class="card">
                    <div class="card-header card-header-primary">
                        <h4 class="card-title ">Book List</h4>
                        <p class="card-category">All book list</p>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table">
                                <thead class=" text-primary">
                                <th>Student Number</th>
                                <th>Student Name</th>
                                <th>Book Thumbnail</th>
                                <th>Title</th>
                                <th>Category</th>
                                <th>Borrow Status</th>
                                <th>Date Borrowed</th>
                                <th class='text-center'>Action</th>
                                </thead>
                                <tbody>
                                    @foreach($books as $key => $value)
                                        <tr>
                                            <td>{{ $value->id_number }}</td>
                                            <td>{{ $value->last_name . ', ' . $value->first_name }}</td>
                                            <td>
                                                <img width="100" src="{{asset('storage/' . $value->image_path) }}" alt="thumbnail">
                                            </td>
                                            <td>{{ $value->title }}</td>
                                            <td>{{ $value->bookCategoryTitle }}</td>
                                            <td class="text-primary">{{ $value->borrowStatus }}</td>
                                            <td class="text-primary">{{ $value->dateBorrowed }}</td>
                                            <td class="text-center text-primary">
                                                @if($value->borrowStatus === 'borrowed')
                                                    <a href="/view-borrowed-book/{{ $value->borrowId }}" class="btn btn-primary btn-round btn-just-icon">
                                                        <i class="material-icons">visibility</i>
                                                        <div class="ripple-container"></div>
                                                    </a>
                                                @elseif($value->borrowStatus === 'return')
                                                    <p>-</p>
                                                @else
                                                    <div class=" row col-12">
                                                        <div class="col-6">
                                                            @livewire('admin.approve', ['borrowId' => $value->borrowId, 'userId' => $value->userId, 'bookId' => $value->id])
                                                        </div>
                                                        <div class="col-6">
                                                            @livewire('admin.decline', ['borrowId' => $value->borrowId, 'userId' => $value->userId])
                                                        </div>
                                                    </div>
                                                @endif
                                            </td>
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







