
<!DOCTYPE html>
<html lang="en">
<head>
  @include('Backend.dashboard.component.head')
</head>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">
  <!-- Navbar -->
  @include('Backend.dashboard.component.nav')

  <!-- Main Sidebar Container -->
  @include('Backend.dashboard.component.sidebar')

  <!-- Main -->
  @yield('content')

  {{-- footer --}}
  @include('Backend.dashboard.component.footer')

</div>

{{-- script --}}
@include('Backend.dashboard.component.script')

</body>
</html>
