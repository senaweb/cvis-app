{{-- <nav class="sidebar sidebar-offcanvas" @if(auth()->user()->hasPermissionTo('admin'))style="background: #F2EDF3;" @endif id="sidebar"> --}}
      <nav class="sidebar sidebar-offcanvas" id="sidebar">
            <ul class="nav">
              <li class="nav-item nav-profile">
                <a href="#" class="nav-link">
                  <div class="nav-profile-image">
                    <img src="{{ asset('theme/images/faces/face1.jpg') }}" alt="profile">
                    <span class="login-status online"></span> <!--change to offline or busy as needed-->              
                  </div>
                  <div class="nav-profile-text d-flex flex-column">
                    <span class="font-weight-bold mb-2">{{ auth()->user()->fullName }}</span>
                    <span class="text-secondary text-small">{{ auth()->user()->role? auth()->user()->role->name : '' }}</span>
                  </div>
                  <i class="mdi mdi-bookmark-check text-success nav-profile-badge"></i>
                </a>
              </li>

              @if(Gate::check('super admin') || Gate::check('create incidents'))
              <li class="nav-item sidebar-actions">
                <span class="nav-link">
                  <div class="border-bottom"></div>
                  <a href="{{ route('incidents.create') }}" class="btn btn-block btn-lg btn-gradient-primary my-3 text-white">+ Add incident</a>
                  <div class="border-bottom"></div>

                  {{-- <div class="mt-4">
                    <div class="border-bottom">
                      <p class="text-secondary">Categories</p>                  
                    </div>
                    <ul class="gradient-bullet-list mt-4">
                      <li>Free</li>
                      <li>Pro</li>
                    </ul>
                  </div> --}}
                </span>
              </li>
              @endif

              <li class="nav-item">
                <a class="nav-link" href="{{ route('dashboard') }}">
                  <span class="menu-title">Dashboard</span>
                  <i class="mdi mdi-home menu-icon"></i>
                </a>
              </li>

              {{-- Drop down --}}
              {{-- <li class="nav-item">
                <a class="nav-link" data-toggle="collapse" href="#ui-basic" aria-expanded="false" aria-controls="ui-basic">
                  <span class="menu-title">UI Elements</span>
                  <i class="menu-arrow"></i>
                  <i class="mdi mdi-crosshairs-gps menu-icon"></i>
                </a>
                
                <div class="collapse" id="ui-basic">
                  <ul class="nav flex-column sub-menu">
                    <li class="nav-item"> <a class="nav-link" href="../../pages/ui-features/buttons.html">Buttons</a></li>
                    <li class="nav-item"> <a class="nav-link" href="../../pages/ui-features/typography.html">Typography</a></li>
                  </ul>
                </div>
              </li> --}}

              <li class="nav-item">
                <a class="nav-link" href="{{ route('incidents.index') }}">
                  <span class="menu-title">Vehicle Incidents</span>
                  <i class="mdi mdi-format-list-bulleted menu-icon"></i>
                </a>
              </li>

              <li class="nav-item">
                <a class="nav-link" href="{{ route('dashboard.reports') }}">
                  <span class="menu-title">Vehicle Incidents Report</span>
                  <i class="mdi mdi-projector-screen menu-icon"></i>
                </a>
              </li>

              @if(Gate::check('super admin') || Gate::check('register users'))
               {{-- @can(['super admin', 'register users']) --}}
              <li class="nav-item">
                <a class="nav-link" href="{{ route('register') }}">
                  <span class="menu-title">Register User</span>
                  <i class="mdi mdi-human-male menu-icon"></i>
                </a>
              </li>

              <li class="nav-item">
                <a class="nav-link" href="{{ route('users.index') }}">
                  <span class="menu-title">Registered User</span>
                  <i class="mdi mdi-human-male-female menu-icon"></i>
                </a>
              </li>
              {{-- @endcan --}}
              @endif

              
              
            </ul>
          </nav>