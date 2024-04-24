      <?php
      $route_name = request()->route()->getName();
      $route_name = explode('.', $route_name);
      $route_prefix = $route_name[0];
      ?>

<div class="app-sidebar colored">
      <div class="sidebar-header">
            <a class="header-brand" href="{{ route('home') }}">
                  <span class="text">JAI NEWS</span>
            </a>
            <!-- <button type="button" class="nav-toggle"><i data-toggle="expanded" class="ik ik-toggle-right toggle-icon"></i></button> -->
            <button id="sidebarClose" class="nav-close"><i class="ik ik-x"></i></button>
      </div>

      <div class="sidebar-content">
            <div class="nav-container">
                  <nav id="main-menu-navigation" class="navigation-main">
                        <div class="nav-lavel">Navigations</div>
                        <div class="nav-item @if($route_prefix == 'home') ? active : '' ; @endif">
                              <a href="{{ route('home') }}"><i class="ik ik-bar-chart-2"></i><span>Dashboard</span></a>
                        </div>
                        <div class="nav-lavel">Data Tables</div>

                        <div class="nav-item @if($route_prefix == 'ad') ? active open : ''; @endif">
                              <a href="{{ route('ad.index') }}"><i class="ik ik-tv"></i><span>Ads</span></a>
                        </div>
                        <div class="nav-item has-sub @if($route_prefix == 'article') ? active open : ''; @endif">
                              <a href="#"><i class="ik ik-file-text"></i><span>Article</span></a>
                              <div class="submenu-content">
                                    <a href="{{ route('article.index') }}" class="menu-item">View All Category</a>
                                    <a href="{{ route('article.create') }}" class="menu-item">Create New Category</a>
                              </div>
                        </div>

                        <div class="nav-item has-sub @if($route_prefix == 'company' || $route_prefix == 'contact' || $route_prefix == 'social' || $route_prefix == 'category') ? active open : ''; @endif">
                              <a href="#"><i class="ik ik-settings"></i><span>About</span></a>
                              <div class="submenu-content">
                                    <a href="{{ route('category.index') }}" class="menu-item @if($route_prefix == 'category') ? active open : ''; @endif">Category</a>
                                    <a href="{{ route('company.index') }}" class="menu-item @if($route_prefix == 'company') ? active open : ''; @endif">Company</a>
                                    <a href="{{ route('contact.index') }}" class="menu-item @if($route_prefix == 'contact') ? active open : ''; @endif">Contact</a>
                                    <a href="{{ route('social.index') }}" class="menu-item @if($route_prefix == 'social') ? active open : ''; @endif">Social</a>
                              </div>
                        </div>


                  </nav>
            </div>
      </div>
</div>
