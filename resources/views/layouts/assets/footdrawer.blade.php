 <!-- drawer -->
            <div class="mdk-drawer js-mdk-drawer" id="user-drawer" data-position="right" data-align="end">
              <div class="mdk-drawer__content">
                <div class="mdk-drawer__inner" data-simplebar data-simplebar-force-enabled="true">
                  <nav class="drawer drawer--light">
                    <div class="drawer-spacer drawer-spacer-border">
                      <div class="media align-items-center">
                        <div class="media-body">
                          <a href="#" class="h5 m-0">{{Session::get('nama')}}</a>
                          <div>
                            @if(Session::get('hakakses') == 1) Menu Pengguna Sistem  @endif
                            @if(Session::get('hakakses') == 2) Menu Pasien @endif
                          </div>
                        </div>
                      </div>
                    </div>
                   {{--  <div class="drawer-spacer bg-body-bg">
                      <div class="d-flex justify-content-between mb-2">
                        <p class="h6 text-gray m-0"><i class="material-icons align-middle md-18 text-primary">monetization_on</i> Balance</p>
                        <span>$21,011</span>
                      </div>
                      <div class="d-flex justify-content-between">
                        <p class="h6 text-gray m-0"><i class="material-icons align-middle md-18 text-primary">shopping_cart</i> Sales</p>
                        <span>142</span>
                      </div>
                    </div> --}}
                    <!-- MENU -->
                    <ul class="drawer-menu" id="userMenu" data-children=".drawer-submenu">
                      {{-- <li class="drawer-menu-item">
                        <a href="account.html">
                          <i class="material-icons">lock</i>
                          <span class="drawer-menu-text" style="color: black;"> Account</span>
                        </a>
                      </li>
                      <li class="drawer-menu-item">
                        <a href="profile.html">
                          <i class="material-icons">account_circle</i>
                          <span class="drawer-menu-text" style="color: black;"> Profile</span>
                        </a>
                      </li> --}}
                      <li class="drawer-menu-item">
                        <a href="{{url('/logout')}}">
                          <i class="material-icons">exit_to_app</i>
                          <span class="drawer-menu-text" style="color: black;"> Keluar </span>
                        </a>
                      </li>
                    </ul>
                  </nav>
                </div>
              </div>
            </div>
            <!-- // END drawer -->