    <!-- Header -->
    @include('backend.includes.header')

    <!-- Sidebar -->
    @include('backend.includes.sidebar')


    <!-- ============================================================== -->
    <!-- Start Page Content here -->
    <!-- ============================================================== -->
    <div class="content-page">
    <div class="content">
        <!-- Start Content-->
        <div class="container-fluid"> 
            @yield('content')
        </div>
    </div>
    </div>


    <!-- Footer block -->
    @include('backend.includes.footer')