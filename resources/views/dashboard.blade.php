@extends('layouts.app', ['activePage' => 'dashboard', 'titlePage' => __('Dashboard')])

@section('content')


  <div class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-lg-3 col-md-6 col-sm-6">
          <div class="card card-stats">
            <div class="card-header card-header-warning card-header-icon">
              <div class="card-icon">
                <i class="fas fa-book"></i>
              </div>
              <p class="card-category">Books Borrowed</p>
              <h3 class="card-title">{{ $bookBorrowedCount }}</h3>
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
            <div class="card-header card-header-success card-header-icon">
              <div class="card-icon">
                <i class="far fa-user"></i>
              </div>
              <p class="card-category">Total Students</p>
              <h3 class="card-title">{{ $studentCount }}</h3>
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
            <div class="card-header card-header-priamary card-header-icon">
              <div class="card-icon">
                <i class="material-icons">info_outline</i>
              </div>
              <p class="card-category">Total student Borrowed</p>
              <h3 class="card-title">{{ $bookBorrowedCount }}</h3>
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
            <div class="card-header card-header-info card-header-icon">
              <div class="card-icon">
                <i class="fas fa-share-square"></i>
              </div>
              <p class="card-category">Total Borrowed</p>
              <h3 class="card-title">{{ $bookBorrowedCount }}</h3>
            </div>
            <div class="card-footer">
              <div class="stats">
                <i class="fas fa-share"></i>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-lg-6 col-md-12">
          <div class="card">
            <div class="card-header card-header-tabs card-header-primary">
              <div class="nav-tabs-navigation">
                <div class="nav-tabs-wrapper">
                  <span class="nav-tabs-title">Tasks:</span>
                  <ul class="nav nav-tabs" data-tabs="tabs">
                    <li class="nav-item">
                      <a class="nav-link active" href="#profile" data-toggle="tab">
                        <i class="fas fa-bookmark"></i> borrowed book
                        <div class="ripple-container"></div>
                      </a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" href="#messages" data-toggle="tab">
                        <i class="fas fa-share"></i> returned book
                        <div class="ripple-container"></div>
                      </a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" href="#settings" data-toggle="tab">
                        <i class="fas fa-book"></i> available book
                        <div class="ripple-container"></div>
                      </a>
                    </li>
                  </ul>
                </div>
              </div>
            </div>
            <div class="card-body">
              <div class="tab-content">
                <div class="tab-pane active" id="profile">
                  {{-- borrowed --}}
                  @livewire('dashboard.borrowed-books-list')
                </div>
                <div class="tab-pane" id="messages">
                    {{-- borrowed --}}
                    @livewire('dashboard.returned-books-list')
                </div>
                <div class="tab-pane" id="settings">
                     {{-- available --}}
                     @livewire('dashboard.available-books-list')
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-lg-6 col-md-12">
          <div class="card">
            <div class="card-header card-header-warning">
              <h4 class="card-title">Borrowed student</h4>
              <p class="card-category">All active student that borrowed books</p>
            </div>
            <div class="card-body table-responsive">
              {{-- available --}}
              @livewire('dashboard.borrowed-student-list')
            </div>
          </div>
        </div>
    </div>
  </div>
@endsection

@push('js')
  <script>
    $(document).ready(function() {
      // Javascript method's body can be found in assets/js/demos.js
      md.initDashboardPageCharts();
    });
  </script>
@endpush
