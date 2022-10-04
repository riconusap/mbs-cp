@php
    header('Access-Control-Allow-Origin: *');
@endphp
<!DOCTYPE html>
<html lang="en">
<head>
    @include('user.includes.header')
    @yield('custom-css')
</head>
<body>
  <div id="app">
    <div class="main-wrapper">

        @include('user.includes.navbar')

      <!-- Main Content -->
      <div class="main-content">
        @yield('content')
      </div>
    </div>
  </div>
  <!-- General JS Scripts -->
  @include('user.includes.footer')
  <!-- Page Specific JS File -->
  @yield('custom-js')
  </body>
  </html>