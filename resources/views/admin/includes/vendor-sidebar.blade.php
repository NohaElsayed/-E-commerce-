<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="{{route('admin.dashboard')}}" class="brand-link">
        <!--LOGO BRAND-->
      <img src="{{asset('assets/img/footer-logo.png')}}" alt="Fashi Logo" class="brand-image elevation-3"
           style="max-width:100%">
      <span class="brand-text font-weight-light">Dashboard</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
            @if(Session()->get('photo')!=NULL)
          <img src="/images-uploaded/Users/{{Session()->get('photo')}}"  class="rounded-circle img-responsive elevation-2 "  alt="User Image">
          @else
          <img src="/images-uploaded/Users/person.svg" class="rounded-circle img-responsive elevation-2 "  alt="User Image">
          @endif
        </div>
        <div class="info">
          <a href="{{route('admin.editprofile',Session()->get('id'))}}" class="d-block">{{Session()->get('username')}}</a>

        </div>
      </div>
      <!-- Sidebar Menu -->
<nav class="mt-2">
    <ul class="nav nav-pills nav-sidebar flex-column">
      <!-- Add icons to the links using the .nav-icon class
           with font-awesome or any other icon font library -->
      <li class=" nav-item ">
        <a href="{{route('admin.dashboard')}}" class="nav-link ">
            <i class="nav-icon fas fa-tachometer-alt"></i>
            <p>
              Dashboard

            </p>
          </a>
        <ul class="nav ">
            <li class="nav-item">
                <a href="{{route('admin.managevendorsproducts')}}" class="nav-link">
                  <i class="fas fa-edit nav-icon"></i>
                  <p>Manage Vendors  </p><span class="left badge badge-danger"> {{App\Models\Vendor::count() }} </span>
                </a>
              </li>
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
      </div>
      <!-- /.sidebar -->
    </aside>
