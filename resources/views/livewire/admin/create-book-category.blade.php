
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
          <form wire:submit.prevent="createBookCategory" class="form-horizontal">
            <div class="card ">
              <div class="card-header card-header-primary">
                <h4 class="card-title">{{ __('Create Book Category') }}</h4>
                <p class="card-category">{{ __('Book category information') }}</p>
              </div>
              <div class="card-body ">
                <div class="row">
                  <label class="col-sm-2 col-form-label">{{ __('Category Title') }}</label>
                  <div class="col-sm-7">
                    <div class="form-group{{ $errors->has('name') ? ' has-danger' : '' }}">
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
