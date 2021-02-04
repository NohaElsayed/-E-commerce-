<!--Header-->
@include('admin.includes.header')
<div class="wrapper">

  <!-- Navbar -->
  <div class="container-fluid">
  <nav class="main-header navbar navbar-expand-lg navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="{{route('admin.dashboard')}}" class="nav-link">Home</a>
      </li>

    </ul>

 <!-- SEARCH FORM -->
 @yield('searchbar')

    <!-- Right navbar links -->
    @include('admin.includes.right-navbar-links')
  </nav>
  </div>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->


@if(Session()->get('role') == 'Admin')
  @include('admin.includes.admin-sidebar')
@elseif(Session()->get('role') == 'User')
  @include('admin.includes.user-sidebar')
@else
   @include('admin.includes.vendor-sidebar')
@endif

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->

   @include('admin.includes.heading')

    <!-- /.content-header -->

    <!-- Main content -->

     @yield('content')

    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <!-- Control Sidebar -->
      @include('admin.includes.profile-sidebar')
  <!-- /.control-sidebar -->

  <!-- Main Footer -->
 @include('admin.includes.footer')
