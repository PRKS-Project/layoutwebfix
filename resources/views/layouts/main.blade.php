@include('layouts.header')

<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">
  <main id="main" class="main">
    <div class="row">
      <div class="card info-card sales-card">
        @yield('content')
      </div>
    </div>
  </main><!-- End #main -->
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  @include('layouts.footer')
  