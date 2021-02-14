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
              <h3 class="card-title">49/50</h3>
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
              <h3 class="card-title">34,245</h3>
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
              <h3 class="card-title">75</h3>
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
              <h3 class="card-title">+245</h3>
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
                  <table class="table">
                    <tbody>
                      <tr>
                        <td>
                          <div class="form-check">
                            <label class="form-check-label">
                             1
                            </label>
                          </div>
                        </td>
                        <td>Sign contract for "What are conference organizers afraid of?"</td>
                        <td class="text-right td-actions">
                            <a href="">View</a>
                        </td>
                      </tr>
                    </tbody>
                  </table>
                </div>
                <div class="tab-pane" id="messages">
                    <table class="table">
                        <tbody>
                          <tr>
                            <td>
                              <div class="form-check">
                                <label class="form-check-label">
                                 1
                                </label>
                              </div>
                            </td>
                            <td>Sign contract for "What are conference organizers afraid of?"</td>
                            <td class="text-right td-actions">
                                <a href="">View</a>
                            </td>
                          </tr>
                        </tbody>
                    </table>
                </div>
                <div class="tab-pane" id="settings">
                    <table class="table">
                        <tbody>
                          <tr>
                            <td>
                              <div class="form-check">
                                <label class="form-check-label">
                                 1
                                </label>
                              </div>
                            </td>
                            <td>Sign contract for "What are conference organizers afraid of?"</td>
                            <td class="text-right td-actions">
                                <a href="">View</a>
                            </td>
                          </tr>
                        </tbody>
                    </table>
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
              <table class="table table-hover">
                <thead class="text-warning">
                  <th>Student ID</th>
                  <th>Name</th>
                  <th>Year</th>
                  <th># Of Book Borrowed</th>
                </thead>
                <tbody>
                  <tr>
                    <td>1</td>
                    <td>Dakota Rice</td>
                    <td>4</td>
                    <td>3</td>
                  </tr>
                </tbody>
              </table>
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
