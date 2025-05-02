  <!--Start sidebar-wrapper-->
  <div id="sidebar-wrapper" data-simplebar="" data-simplebar-auto-hide="true">
    <div class="brand-logo">
     <a href="index.html">
      {{-- <img src="assets/images/logo-icon.png" class="logo-icon" alt="logo icon"> --}}
      <h5 class="logo-text">Admin</h5>
    </a>
  </div>
  <ul class="sidebar-menu do-nicescrol">
     {{-- <li class="sidebar-header">MAIN NAVIGATION</li> --}}
     <li>
       <a href="{{ route('admin.dashboard') }}">
        
         <i class="zmdi zmdi-view-dashboard"></i> <span>Dashboard</span>
       </a>
     </li>
     {{-- <li>
      <a href="{{ route('users.index') }}">
        <i class="zmdi zmdi-view-dashboard"></i> <span>User</span>
      </a>
    </li> --}}
    <li>
      <a href="{{ route('features.index') }}">
        <i class="zmdi zmdi-view-dashboard"></i> <span>Features</span>
      </a>
    </li>
    <li>
      <a href="{{ route('banners.index') }}">
        <i class="zmdi zmdi-view-dashboard"></i> <span>Banner</span>
      </a>
    </li>
    {{-- <li>
      <a href="{{ route('catagorys.index') }}">
        <i class="zmdi zmdi-view-dashboard"></i> <span>Catagory</span>
      </a>
    </li>
    <li>
      <a href="{{ route('topups.index') }}">
        <i class="zmdi zmdi-view-dashboard"></i> <span>TopUp</span>
      </a>
    </li> --}}
     <li>
        <a href="{{ route('games.index') }}">
          <i class="zmdi zmdi-view-dashboard"></i> <span>Game Control</span>
        </a>
      </li>
      <li>
        <a href="{{ route('transaction.index') }}">
          <i class="zmdi zmdi-view-dashboard"></i> <span>Transaction List</span>
        </a>
      </li>
      
      
      
      <li>
        <a href="{{ route('settings.index') }}">
          <i class="zmdi zmdi-view-dashboard"></i> <span>Setting</span>
        </a>
      </li>
      
   </ul>
  
  </div>
  <!--End sidebar-wrapper-->