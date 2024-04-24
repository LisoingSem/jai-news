<header class="header-top" header-theme="light">
      <div class="container-fluid">
            <div class="d-flex justify-content-between">
                  <div class="top-menu d-flex align-items-center">
                        <button type="button" class="btn-icon mobile-nav-toggle d-lg-none"><span></span></button>
                        <div class="header-search">
                              <div class="input-group">
                                    <span class="input-group-addon search-close"><i class="ik ik-x"></i></span>
                                    <input type="text" class="form-control">
                                    <span class="input-group-addon search-btn"><i class="ik ik-search"></i></span>
                              </div>
                        </div>
                        <button type="button" id="navbar-fullscreen" class="nav-link"><i class="ik ik-maximize"></i></button>
                  </div>
                  <div class="top-menu d-flex align-items-center">
                        <div class="dropdown">
                              <a class="dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><img class="avatar" src="{{ asset('assets/defaults/logo-white.png') }}" alt=""></a>
                              <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
                                    <a class="dropdown-item" data-widget="fullscreen" href="#" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();" role="button"><i class="ik ik-power dropdown-icon"></i> Logout
                                          <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                                @csrf
                                          </form>
                                    </a>
                              </div>
                        </div>

                  </div>
            </div>
      </div>
</header>
