
<!--drawer -->
<div class="mdk-drawer js-mdk-drawer" id="default-drawer">
  <div class="mdk-drawer__content">
    <div class="mdk-drawer__inner" data-simplebar data-simplebar-force-enabled="true">

      <nav class="drawer  drawer--dark">
        <div class="drawer-spacer">
          <div class="media align-items-center">
          {{-- <img src="assets/image/berllogo.png"/> --}}
          </div>
        </div>
        <!-- HEADING -->
        <div class="py-2 drawer-heading" style="color: white;">
          Dashboards
        </div>
        <!-- MENU -->
        {{-- <ul class="drawer-menu" id="dasboardMenu" data-children=".drawer-submenu">
          <li class="drawer-menu-item active ">
            <a href="index.html">
              <i class="material-icons">poll</i>
              <span class="drawer-menu-text"> Financial</span>
            </a>
          </li>
          <li class="drawer-menu-item">
            <a href="projects.html">
              <i class="material-icons">dns</i>
              <span class="drawer-menu-text"> Projects/Tickets</span>
              <span class="badge badge-pill badge-success ml-1">4</span>
            </a>
          </li>
        </ul> --}}


        <!-- HEADING -->
        {{-- <div lass="py-2 drawer-heading">
          Components
        </div> --}}

        @if(Session::get('hakakses') == 1)

        <!-- MENU -->
        <ul class="drawer-menu" id="mainMenu" data-children=".drawer-submenu">
          <li class="drawer-menu-item active ">
            <a href="{{url('/dashboard')}}" class="collapsed">
              <i class="material-icons">dashboard</i>
              <span class="drawer-menu-text"> Dashboard</span>
            </a>
          </li>
         

          <li class="drawer-menu-item drawer-submenu">
            <a data-toggle="collapse" data-parent="#mainMenu" href="#" data-target="#uiComponentsMenu" aria-controls="uiComponentsMenu" aria-expanded="false" class="collapsed">
              <i class="material-icons">library_books</i>
              <span class="drawer-menu-text"> Master Data</span>
            </a>
            <ul class="collapse " id="uiComponentsMenu">
              <li class="drawer-menu-item "><a href="{{url('/datapengguna')}}">Data Pengguna</a></li>
              <li class="drawer-menu-item "><a href="{{url('/datapengguna')}}">Data Member</a></li>
              <li class="drawer-menu-item "><a href="{{url('/datakeluhan')}}">Data Keluhan</a></li>
              <li class="drawer-menu-item "><a href="{{url('/datapengguna')}}">Data Pertanyaan</a></li>
              <li class="drawer-menu-item "><a href="{{url('/datasolusi')}}">Data Solusi</a></li>
              <li class="drawer-menu-item "><a href="{{url('/datapengguna')}}">Data Basis Pengetahuan</a></li>
            </ul>
          </li>

          <li class="drawer-menu-item">
            <a href="{{url('/logout')}}">
              <i class="material-icons">exit_to_app</i>
              <span class="drawer-menu-text">Logout</span>
            </a>
          </li>
          {{-- <li class="drawer-menu-item active ">
            <a href="{{url('/dashboard')}}" class="collapsed">
              <i class="material-icons">dashboard</i>
              <span class="drawer-menu-text"> Akses Sistem Kepakaran</span>
            </a>
          </li> --}}
        </ul>

        @endif


      </nav>
    </div>
  </div>
</div>
