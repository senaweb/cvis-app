<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>
            @if(isset($pageTitle))
                {{ $pageTitle }}
            @elseif(isset($pageTitleAndHeading))
                {{ $pageTitleAndHeading }}
            @else
                {{ 'Default Page' }}
            @endif
            - {{ config('app.name') }}
        </title> 
        <!-- Styles -->
        <!-- plugins:css -->
        <link rel="stylesheet" href="{{ asset('theme/iconfonts/mdi/css/materialdesignicons.min.css') }}">
        <link rel="stylesheet" href="{{ asset('theme/vendors/css/vendor.bundle.base.css') }}">
        
        {{-- <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous"> --}}
        <!-- endinject -->
        <!-- inject:css -->
        <link href="{{ asset('theme/css/style.css') }}" rel="stylesheet">
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
        <!-- endinject -->
        <link rel="icon" href="{{ asset('public/favicons/favicon.ico') }}">
    </head>
    <body>
      <div id="app" class="container-scroller">
        <!-- partial:../../partials/_navbar.html -->
        @include('dashboard.includes.navbar')
        <!-- partial -->
        <div class="container-fluid page-body-wrapper">
          <!-- partial:../../partials/_sidebar.html -->
          @include('dashboard.includes.sidebar')          
          <!-- partial -->
          <div class="main-panel">
            <div class="content-wrapper">
              <div class="page-header">
                <h3 class="page-title">
                  @if(isset($pageHeading))
                      {{ $pageHeading }}
                  @elseif(isset($pageTitleAndHeading))
                      {{ $pageTitleAndHeading }}
                  @else
                      {{ 'Admin Page' }}
                  @endif
                </h3>
              </div>

              @include('notifications.alert') <!-- To display notifications -->

              @yield('content') <!-- Where actual content is placed -->

            </div>
            <!-- content-wrapper ends -->
            <!-- partial:../../partials/_footer.html -->
            @include('dashboard.includes.footer')
            <!-- partial -->
          </div>
          <!-- main-panel ends -->
        </div>
        <!-- page-body-wrapper ends -->
      </div>
  <!-- plugins:js -->
  <script src="{{ asset('js/app.js') }}"></script>
  <script src="{{ asset('theme/vendors/js/vendor.bundle.base.js') }}"></script>
  <script src="{{ asset('theme/vendors/js/vendor.bundle.addons.js') }}"></script>
  <!-- endinject -->
  <!-- Plugin js for this page-->
  <!-- End plugin js for this page-->
  <!-- inject:js -->
  <script src="{{ asset('theme/js/off-canvas.js') }}"></script>
  <script src="{{ asset('theme/js/misc.js') }}"></script>
  <!-- endinject -->
  <!-- Custom js for this page-->
  <script src="{{ asset('theme/js/dashboard.js') }}"></script>
  <!-- End custom js for this page-->
    </body>
</html>
