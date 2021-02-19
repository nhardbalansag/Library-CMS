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
                                        <td class="text-primary">
                                            <div class="d-flex justify-content-center">
                                                <button wire:click="returnBook" class="btn btn-primary btn-round btn-just-icon">
                                                    <i class="material-icons">thumb_up</i>
                                                    <div class="ripple-container"></div>
                                                </button>
                                            </div>
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

