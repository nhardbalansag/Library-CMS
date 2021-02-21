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
                <div class="card">
                    <div class="card-header card-header-primary">
                        <h4 class="card-title ">Book List</h4>
                        <p class="card-category">All book list</p>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table">
                                <thead class=" text-primary">
                                <th>Thumbnail</th>
                                <th>Title</th>
                                <th>Status</th>
                                <th>Date Created</th>
                                <th>Date to Return</th>
                                <th class="text-center">Move to Return</th>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>
                                            <img width="100" src="{{asset('storage/' . $book->image_path) }}" alt="thumbnail">
                                        </td>
                                        <td>{{ $book->title }}</td>
                                        <td class="text-primary">{{ $book->borrowStatus }}</td>
                                        <td class="text-primary">{{ $book->created_at }}</td>
                                        <td class="text-primary">{{ $book->returnDate }}</td>
                                        <td class="text-center text-primary">
                                            @if($book->borrowStatus === 'return')
                                                <p>-</p>
                                            @else
                                                <div class="d-flex justify-content-center">
                                                    <button wire:click="returnBook" class="btn btn-primary btn-round btn-just-icon">
                                                        <i class="material-icons">reply</i>
                                                        <div class="ripple-container"></div>
                                                    </button>
                                                </div>
                                            @endif
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div wire:loading>
        @include('component.loading-state')
    </div>
</div>

