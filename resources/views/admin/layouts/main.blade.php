<!DOCTYPE html>
<html lang="en">
<head>
    @include('admin.includes.header')
    @yield('custom-css')
</head>
<body>
  <div id="app">
    <div class="main-wrapper">

        @include('admin.includes.navbar')
        @include('admin.includes.sidebar')

      <!-- Main Content -->
      <div class="main-content">
        @yield('content')
      </div>
      <footer class="main-footer">
        <div class="footer-left">
          Copyright &copy; {{date('Y')}} </div>
      </footer>
    </div>
  </div>
  <!-- General JS Scripts -->
  @include('admin.includes.footer')
  <!-- Page Specific JS File -->
  @yield('custom-js')
  </body>
  </html>



