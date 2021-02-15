@extends('layouts.app', ['class' => 'off-canvas-sidebar', 'activePage' => 'register', 'title' => __('Material Dashboard')])

@section('content')
<div class="container" style="height: auto;">
  <div class="row align-items-center">
    <div class="ml-auto mr-auto col-lg-4 col-md-6 col-sm-8">
      <form class="form" method="POST" action="{{ route('register') }}">
        @csrf

        <div class="mb-3 card card-login card-hidden">
          <div class="text-center card-header card-header-primary">
            <h4 class="card-title"><strong>{{ __('Register') }}</strong></h4>
            <div class="social-line">
              <a href="#pablo" class="btn btn-just-icon btn-link btn-white">
                <i class="fa fa-facebook-square"></i>
              </a>
              <a href="#pablo" class="btn btn-just-icon btn-link btn-white">
                <i class="fa fa-twitter"></i>
              </a>
              <a href="#pablo" class="btn btn-just-icon btn-link btn-white">
                <i class="fa fa-google-plus"></i>
              </a>
            </div>
          </div>
          <div class="card-body ">
            <p class="text-center card-description">{{ __('Or Be Classical') }}</p>
            {{--  --}}
            <div class="bmd-form-group{{ $errors->has('first_name') ? ' has-danger' : '' }}">
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text">
                            <i class="material-icons">face</i>
                        </span>
                    </div>
                    <input type="text" name="first_name" class="form-control" placeholder="{{ __('First name...') }}"  required>
                </div>
              @if ($errors->has('first_name'))
                <div id="name-error" class="pl-3 error text-danger" for="first_name" style="display: block;">
                    <strong>{{ $errors->first('first_name') }}</strong>
                </div>
              @endif
            </div>
            <div class="bmd-form-group{{ $errors->has('last_name') ? ' has-danger' : '' }}">
                <div class="input-group">
                  <div class="input-group-prepend">
                    <span class="input-group-text">
                        <i class="material-icons">face</i>
                    </span>
                  </div>
                  <input type="text" name="last_name" class="form-control" placeholder="{{ __('Last name...') }}" required>
                </div>
                @if ($errors->has('last_name'))
                  <div id="name-error" class="pl-3 error text-danger" for="last_name" style="display: block;">
                    <strong>{{ $errors->first('last_name') }}</strong>
                  </div>
                @endif
            </div>
            <div class="bmd-form-group{{ $errors->has('middle_name') ? ' has-danger' : '' }}">
                <div class="input-group">
                  <div class="input-group-prepend">
                    <span class="input-group-text">
                        <i class="material-icons">face</i>
                    </span>
                  </div>
                  <input type="text" name="middle_name" class="form-control" placeholder="{{ __('Middle name...') }}" required>
                </div>
                @if ($errors->has('middle_name'))
                  <div id="name-error" class="pl-3 error text-danger" for="middle_name" style="display: block;">
                    <strong>{{ $errors->first('middle_name') }}</strong>
                  </div>
                @endif
            </div>
            <div class="bmd-form-group{{ $errors->has('id_number') ? ' has-danger' : '' }} mt-3">
              <div class="input-group">
                <div class="input-group-prepend">
                  <span class="input-group-text">
                    <i class="far fa-id-card"></i>
                  </span>
                </div>
                <input type="text" name="id_number" class="form-control" placeholder="{{ __('ID Number...') }}" required>
              </div>
              @if ($errors->has('id_number'))
                <div id="email-error" class="pl-3 error text-danger" for="id_number" style="display: block;">
                  <strong>{{ $errors->first('id_number') }}</strong>
                </div>
              @endif
            </div>
            <div class="bmd-form-group{{ $errors->has('email') ? ' has-danger' : '' }} mt-3">
                <div class="input-group">
                  <div class="input-group-prepend">
                    <span class="input-group-text">
                        <i class="far fa-envelope"></i>
                    </span>
                  </div>
                  <input type="text" name="email" class="form-control" placeholder="{{ __('Email...') }}" required>
                </div>
                @if ($errors->has('email'))
                  <div id="email-error" class="pl-3 error text-danger" for="email" style="display: block;">
                    <strong>{{ $errors->first('email') }}</strong>
                  </div>
                @endif
              </div>
            <div class="bmd-form-group{{ $errors->has('password') ? ' has-danger' : '' }} mt-3">
              <div class="input-group">
                <div class="input-group-prepend">
                  <span class="input-group-text">
                    <i class="material-icons">lock_outline</i>
                  </span>
                </div>
                <input type="password" name="password" id="password" class="form-control" placeholder="{{ __('Password...') }}" required>
              </div>
              @if ($errors->has('password'))
                <div id="password-error" class="pl-3 error text-danger" for="password" style="display: block;">
                  <strong>{{ $errors->first('password') }}</strong>
                </div>
              @endif
            </div>
            <div class="bmd-form-group{{ $errors->has('password_confirmation') ? ' has-danger' : '' }} mt-3">
              <div class="input-group">
                <div class="input-group-prepend">
                  <span class="input-group-text">
                    <i class="material-icons">lock_outline</i>
                  </span>
                </div>
                <input type="password" name="password_confirmation" id="password_confirmation" class="form-control" placeholder="{{ __('Confirm Password...') }}" required>
              </div>
              @if ($errors->has('password_confirmation'))
                <div id="password_confirmation-error" class="pl-3 error text-danger" for="password_confirmation" style="display: block;">
                  <strong>{{ $errors->first('password_confirmation') }}</strong>
                </div>
              @endif
            </div>
            <div class="mt-3 ml-3 mr-auto form-check">
              <label class="form-check-label">
                <input class="form-check-input" type="checkbox" id="policy" name="policy" {{ old('policy', 1) ? 'checked' : '' }} >
                <span class="form-check-sign">
                  <span class="check"></span>
                </span>
                {{ __('I agree with the ') }} <a href="#">{{ __('Privacy Policy') }}</a>
              </label>
            </div>
          </div>
          <div class="card-footer justify-content-center">
            <button type="submit" class="btn btn-primary btn-link btn-lg">{{ __('Create account') }}</button>
          </div>
        </div>
      </form>
    </div>
  </div>
</div>
@endsection
