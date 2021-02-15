
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div>
                    @if (session()->has('message'))
                        <div class="alert alert-success">
                            <span>
                            <b> Success - </b> {{ session('message') }}</span>
                        </div>
                    @endif
                </div>
                <form wire:submit.prevent="createBook" class="form-horizontal" enctype="multipart/form-data" >
                    <div class="card ">
                        <div class="card-header card-header-primary">
                            <h4 class="card-title">{{ __('Create Book') }}</h4>
                            <p class="card-category">{{ __('Book information') }}</p>
                        </div>
                        <div class="card-body ">
                            <div class="row">
                                <label class="col-sm-2 col-form-label">{{ __('Thumbnail') }}</label>
                                <label class="w-full py-2 font-semibold text-gray-800 bg-white border-black rounded shadow-xs cursor-pointer border-bottom hover:bg-gray-100">
                                    <input type="file"
                                        wire:model="image_path"
                                    hidden>
                                    <div>
                                        <div class="row col-12 d-flex justify-content-center align-items-center"  style="color:#1b3295">
                                            @if ($image_path)
                                                <div class="col-12">
                                                    <img class="w-25" src="{{ $image_path->temporaryUrl() }}">
                                                </div>
                                                <div class="p-0 text-left col-12 ">
                                                    <div class="p-0 col-12">
                                                        <span class="p-0 text-xs text-capitalize" >select documents from gallery</span>
                                                    </div>
                                                    <div class="p-0 col-12">
                                                        @if ($image_path)
                                                        <p class="text-xs text-truncate text-muted">{{ $image_path->temporaryUrl() }}</p>
                                                        @endif
                                                        @error('image_path') <p class="ml-2 text-xs italic text-red-500">{{$message}}</p> @enderror
                                                    </div>
                                                </div>
                                            @else
                                                <div class="p-0 d-flex justify-content-end col-2">
                                                    <svg height="59" width="50" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                                    </svg>
                                                </div>
                                                <div class="p-0 text-left col-10 ">
                                                    <div class="p-0 col-12">
                                                        <span class="p-0 text-xs text-capitalize" >select documents from gallery</span>
                                                    </div>
                                                    <div class="p-0 col-12">
                                                        @if ($image_path)
                                                        <p class="text-xs text-truncate text-muted">{{ $image_path->temporaryUrl() }}</p>
                                                        @endif
                                                        @error('image_path') <p class="ml-2 text-xs italic text-red-500">{{$image_path}}</p> @enderror
                                                    </div>
                                                </div>
                                            @endif
                                        </div>
                                    </div>
                                </label>
                            </div>
                            <div class="row">
                                <label class="col-sm-2 col-form-label">{{ __('Book Category') }}</label>
                                <div class="col-sm-7">
                                    <select wire:model.defer="BookCategoryId" id="country" class="form-control">
                                        <option>Select Category</option>
                                        @foreach($book_category as $key => $value)
                                            <option class="text-capitalize" value ="{{ $value->id }}">{{ $value->title }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                @error('BookCategoryId') <span class="error text-danger">{{ $BookCategoryId }}</span> @enderror
                            </div>
                            <div class="row">
                                <label class="col-sm-2 col-form-label">{{ __('Book Title') }}</label>
                                <div class="col-sm-7">
                                    <div class="form-group{{ $errors->has('title') ? ' has-danger' : '' }}">
                                        <input wire:model.defer="title" class="form-control{{ $errors->has('title') ? ' is-invalid' : '' }}" name="title"  type="text" placeholder="{{ __('Category Title') }}"  required="true" aria-required="true"/>
                                        @error('title') <span class="error text-danger">{{ $title }}</span> @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <label class="col-sm-2 col-form-label">{{ __('Description') }}</label>
                                <div class="col-sm-7">
                                    <div class="form-group{{ $errors->has('description') ? ' has-danger' : '' }}">
                                        <input wire:model.defer="description" class="form-control{{ $errors->has('description') ? ' is-invalid' : '' }}" name="email" type="text"   placeholder="{{ __('Description') }}"  required />
                                        @error('description') <span class="error text-danger">{{ $description }}</span> @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <label class="col-sm-2 col-form-label">{{ __('Inventory Count') }}</label>
                                <div class="col-sm-7">
                                    <div class="form-group{{ $errors->has('book_inventory_count') ? ' has-danger' : '' }}">
                                        <input wire:model.defer="book_inventory_count" class="form-control{{ $errors->has('book_inventory_count') ? ' is-invalid' : '' }}" name="email" type="number"  required />
                                        @error('book_inventory_count') <span class="error text-danger">{{ $book_inventory_count }}</span> @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <label class="col-sm-2 col-form-label">{{ __('Status') }}</label>
                                <div class="col-sm-7">
                                    <select wire:model.defer="status" id="country" class="form-control">
                                        <option>Select Status</option>
                                        <option value = "publish" >Publish</option>
                                        <option value = "pending" >Pending</option>
                                    </select>
                                </div>
                                @error('status') <span class="error text-danger">{{ $status }}</span> @enderror
                            </div>
                        </div>
                        <div class="ml-auto mr-auto card-footer">
                            <button type="submit" class="btn btn-primary">{{ __('Create') }}</button>
                        </div>
                    </div>

                </form>
            </div>
        </div>
    </div>
    <div wire:loading>
        @include('component.loading-state')
    </div>
  </div>

