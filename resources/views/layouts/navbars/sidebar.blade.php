<div class="sidebar" data-color="orange" data-background-color="white" data-image="{{ asset('material') }}/img/sidebar-1.jpg">
  <!--
      Tip 1: You can change the color of the sidebar using: data-color="purple | azure | green | orange | danger"

      Tip 2: you can also add an image using data-image tag
  -->
  <div class="sidebar-wrapper">
    <ul class="nav">
      <li class="nav-item{{ $activePage == 'dashboard' ? ' active' : '' }}">
        <a class="nav-link" href="{{ route('home') }}">
          <i class="material-icons">dashboard</i>
            <p>{{ __('Dashboard') }}</p>
        </a>
      </li>

      {{-- user information handling --}}
      <li class="nav-item {{ ($activePage == 'profile' || $activePage == 'user-management') ? ' active' : '' }}">
        <a class="nav-link" data-toggle="collapse" href="#laravelExample" aria-expanded="true">
        <i class="fas fa-user"></i>
          <p>User Information
            <b class="caret"></b>
          </p>
        </a>
        <div class="collapse show" id="laravelExample">
          <ul class="nav">
            <li class="nav-item{{ $activePage == 'profile' ? ' active' : '' }}">
              <a class="nav-link" href="{{ route('profile.edit') }}">
                <span class="sidebar-mini"> UP </span>
                <span class="sidebar-normal">{{ __('User profile') }} </span>
              </a>
            </li>
            <li class="nav-item{{ $activePage == 'user-management' ? ' active' : '' }}">
              <a class="nav-link" href="/user">
                <span class="sidebar-mini"> UM </span>
                <span class="sidebar-normal"> {{ __('User Management') }} </span>
              </a>
            </li>
          </ul>
        </div>
      </li>

      {{-- books handling--}}
      <li class="nav-item {{ ($activePage == 'profile' || $activePage == 'user-management') ? ' active' : '' }}">
        <a class="nav-link" data-toggle="collapse" href="#books" aria-expanded="true">
        <i class="fas fa-book"></i>
          <p>Books
            <b class="caret"></b>
          </p>
        </a>
        <div class="collapse show" id="books">
          <ul class="nav">
            <li class="nav-item{{ $activePage == 'bookCategory' ? ' active' : '' }}">
                <a class="nav-link" href="/book/add-book-category">
                  <span class="sidebar-mini"> <i class="fas fa-plus-square"></i> </span>
                  <span class="sidebar-normal">{{ __('Add Book Category') }} </span>
                </a>
              </li>
              <li class="nav-item{{ $activePage == 'book' ? ' active' : '' }}">
                <a class="nav-link" href="/book/add-book">
                  <span class="sidebar-mini"> <i class="fas fa-plus-square"></i> </span>
                  <span class="sidebar-normal">{{ __('Add Book') }} </span>
                </a>
              </li>
            <li class="nav-item{{ $activePage == 'bookList' ? ' active' : '' }}">
                <a class="nav-link" href="/book/book-list">
                  <i class="material-icons">content_paste</i>
                    <p>{{ __('Book List') }}</p>
                </a>
              </li>
          </ul>
        </div>
      </li>

      {{-- borrowing --}}

      <li class="nav-item {{ ($activePage == 'profile' || $activePage == 'user-management') ? ' active' : '' }}">
        <a class="nav-link" data-toggle="collapse" href="#borrowing" aria-expanded="true">
        <i class="fas fa-bookmark"></i>
          <p>Borrowing
            <b class="caret"></b>
          </p>
        </a>
        <div class="collapse show" id="borrowing">
          <ul class="nav">
            <li class="nav-item{{ $activePage == 'bookListavailable' ? ' active' : '' }}">
                <a class="nav-link" href="/book/book-list-available">
                  <i class="material-icons">content_paste</i>
                    <p>{{ __('Available Books') }}</p>
                </a>
              </li>
            <li class="nav-item{{ $activePage == 'table' ? ' active' : '' }}">
                <a class="nav-link" href="{{ route('table') }}">
                  <i class="material-icons">content_paste</i>
                    <p>{{ __('Borrowed Books') }}</p>
                </a>
              </li>
              <li class="nav-item{{ $activePage == 'table' ? ' active' : '' }}">
                <a class="nav-link" href="{{ route('table') }}">
                  <i class="material-icons">content_paste</i>
                    <p>{{ __('Returned Book') }}</p>
                </a>
              </li>
          </ul>
        </div>
      </li>

       {{-- Students --}}

       <li class="nav-item {{ ($activePage == 'profile' || $activePage == 'user-management') ? ' active' : '' }}">
        <a class="nav-link" data-toggle="collapse" href="#Students" aria-expanded="true">
        <i class="fas fa-users"></i>
          <p>Students
            <b class="caret"></b>
          </p>
        </a>
        <div class="collapse show" id="Students">
          <ul class="nav">
            <li class="nav-item{{ $activePage == 'profile' ? ' active' : '' }}">
                <a class="nav-link" href="{{ route('profile.edit') }}">
                  <span class="sidebar-mini"> <i class="fas fa-plus-square"></i> </span>
                  <span class="sidebar-normal">{{ __('Add Student') }} </span>
                </a>
              </li>
            <li class="nav-item{{ $activePage == 'table' ? ' active' : '' }}">
                <a class="nav-link" href="{{ route('table') }}">
                  <i class="material-icons">content_paste</i>
                    <p>{{ __('Student Account Information') }}</p>
                </a>
              </li>
          </ul>
        </div>
      </li>
    </ul>
  </div>
</div>
