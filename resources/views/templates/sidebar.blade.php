<nav class="sidebar sidebar-offcanvas" id="sidebar">
        <ul class="nav">
          <li class="nav-item nav-profile">
            <a href="#" class="nav-link">
              <div class="nav-profile-image">
                <img src="{{ Storage::url(Auth::user()->avatar) }}" alt="profile">
                <span class="login-status online"></span> <!--change to offline or busy as needed-->              
              </div>
              <div class="nav-profile-text d-flex flex-column">
                <span class="font-weight-bold mb-2">{{ Auth::user()->firstname . ' ' . Auth::user()->lastname }}</span>
                <span class="text-secondary text-small">Administrator</span>
              </div>
              <i class="mdi mdi-bookmark-check text-success nav-profile-badge"></i>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{ route('home') }}">
              <span class="menu-title">Dashboard</span>
              <i class="mdi mdi-home menu-icon"></i>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#admin" aria-expanded="false" aria-controls="admin">
              <span class="menu-title">Administrators</span>
              <i class="menu-arrow"></i>
              <i class="mdi mdi-account-key menu-icon"></i>
            </a>
            <div class="collapse" id="admin">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item"> <a class="nav-link" href="{{ url('administrator/new') }}">New</a></li>
                <li class="nav-item"> <a class="nav-link" href="{{ url('administrator/list') }}">List</a></li>
              </ul>
            </div>
          </li>
          <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#contact" aria-expanded="false" aria-controls="contact">
              <span class="menu-title">Contacts</span>
              <i class="menu-arrow"></i>
              <i class="mdi mdi-account-card-details menu-icon"></i>
            </a>
            <div class="collapse" id="contact">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item"> <a class="nav-link" href="{{ url('contact/new') }}">New</a></li>
                <li class="nav-item"> <a class="nav-link" href="{{ url('contact/list') }}">List</a></li>
              </ul>
            </div>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{ url('report') }}">
              <span class="menu-title">Reports</span>
              <i class="mdi mdi-file-chart menu-icon"></i>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{ url('about') }}">
              <span class="menu-title">About</span>
              <i class="mdi mdi-information-outline menu-icon"></i>
            </a>
          </li>
        </ul>
      </nav>