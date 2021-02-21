
<div class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-lg-3 col-md-6 col-sm-6">
          <div class="card card-stats">
            <div class="card-header card-header-warning card-header-icon">
              <div class="card-icon">
                <i class="fas fa-book"></i>
              </div>
              <p class="card-category">Total Books</p>
              <h3 class="card-title">{{  $books_total }} ({{  ceil($books_total?  $books_total /  $books_total * 100 : 0) }}%)</h3>
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
              <h3 class="card-title">{{ $books_pending }} ({{ ceil($books_pending_percent) }}%)</h3>
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
              <p class="card-category">publish</p>
              <h3 class="card-title">{{ $books_publish }} ({{ ceil($books_publish_percent) }}%)</h3>
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
                <p class="card-category">available</p>
                <h3 class="card-title">{{ $books_available }} ({{ ceil($books_available_percent) }}%)</h3>
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

  <div class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-lg-3 col-md-6 col-sm-6">
          <div class="card card-stats">
            <div class="card-header card-header-info card-header-icon">
              <div class="card-icon">
                <i class="fas fa-user"></i>
              </div>
              <p class="card-category">Total user</p>
              <h3 class="card-title">{{  $user_total }} ({{  ceil($user_total?  $user_total /  $user_total * 100 : 0) }}%)</h3>
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
                <i class="fas fa-user"></i>
              </div>
              <p class="card-category">Not Verified</p>
              <h3 class="card-title">{{ $user_notVerified }} ({{ ceil($user_notVerified_pecent) }}%)</h3>
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
                  <i class="fas fa-user"></i>
                </div>
                <p class="card-category">Verified</p>
                <h3 class="card-title">{{ $user_verified }} ({{ ceil($user_verified_percent) }}%)</h3>
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
                  <i class="fas fa-user"></i>
                </div>
                <p class="card-category">Declined</p>
                <h3 class="card-title">{{ $user_decline }} ({{ ceil($user_decline_percent) }}%)</h3>
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

  <div class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-lg-3 col-md-6 col-sm-6">
          <div class="card card-stats">
            <div class="card-header card-header-primary card-header-icon">
              <div class="card-icon">
                <i class="fas fa-share-square"></i>
              </div>
              <p class="card-category">Total borrowed</p>
              <h3 class="card-title">{{  $borrowing_total }} ({{  ceil($borrowing_total?  $borrowing_total /  $borrowing_total * 100 : 0) }}%)</h3>
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
            <div class="card-header card-header-primary card-header-icon">
              <div class="card-icon">
                <i class="fas fa-share-square"></i>
              </div>
              <p class="card-category">Approved</p>
              <h3 class="card-title">{{ $borrowing_approved }} ({{ ceil($borrowing_approved_pecent) }}%)</h3>
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
              <div class="card-header card-header-primary card-header-icon">
                <div class="card-icon">
                  <i class="fas fa-share-square"></i>
                </div>
                <p class="card-category">Declined</p>
                <h3 class="card-title">{{ $borrowing_decline }} ({{ ceil($user_decline_percent) }}%)</h3>
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
              <div class="card-header card-header-primary card-header-icon">
                <div class="card-icon">
                  <i class="fas fa-share-square"></i>
                </div>
                <p class="card-category">Pending</p>
                <h3 class="card-title">{{ $borrowing_pending }} ({{ ceil($borrowing_pending_percent) }}%)</h3>
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
              <div class="card-header card-header-primary card-header-icon">
                <div class="card-icon">
                  <i class="fas fa-share-square"></i>
                </div>
                <p class="card-category">Returned</p>
                <h3 class="card-title">{{ $borrowing_return }} ({{ ceil($borrowing_return_percent) }}%)</h3>
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
