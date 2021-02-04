@include('frontend.includes.header')

    <!-- Heading Section Begin -->
      @include('frontend.includes.heading')
    <!-- Heading End -->

     <!--Content begin-->
      @yield('content')

     <!-- Content End-->

    <!-- Partner Logo Section Begin -->
       @include('frontend.includes.partner-logo')
    <!-- Partner Logo Section End -->

    <!-- Footer Section Begin -->
     @include('frontend.includes.footer')
