<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>UMKM Admin</title>
  <!-- plugins:css -->
  <link rel="stylesheet" href="{{ asset('template/vendors/mdi/css/materialdesignicons.min.css') }}">
  <link rel="stylesheet" href="{{ asset('template/vendors/base/vendor.bundle.base.css') }}">
  <!-- endinject -->
  <!-- plugin css for this page -->
  <link rel="stylesheet" href="{{ asset('template/vendors/datatables.net-bs4/dataTables.bootstrap4.css') }}">
  <!-- End plugin css for this page -->
  <!-- inject:css -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.8/css/line.css">
  <link rel="stylesheet" href="{{ asset('template/css/style.css') }}">
  <!-- endinject -->
  <link rel="shortcut icon" href="{{ asset('template/images/favicon.png') }}" />
</head>
<body>
  <div class="container-scroller">
    <!-- partial:partials/_navbar.html -->
    <nav class="navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
      <div class="navbar-brand-wrapper d-flex justify-content-center">
        <div class="navbar-brand-inner-wrapper d-flex justify-content-between align-items-center w-100">  
          <a class="navbar-brand brand-logo" href="index.html"><img src="{{ asset('template/images/logo.svg') }}" alt="logo"/></a>
          <a class="navbar-brand brand-logo-mini" href="index.html"><img src="{{ asset('template/images/logo-mini.svg') }}" alt="logo"/></a>
          <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-toggle="minimize">
            <span class="mdi mdi-sort-variant"></span>
          </button>
        </div>  
      </div>
      <div class="navbar-menu-wrapper d-flex align-items-center justify-content-end">
        <ul class="navbar-nav navbar-nav-right">
          <li class="nav-item nav-profile dropdown">
            <a class="nav-link dropdown-toggle" href="#" data-bs-toggle="dropdown" id="profileDropdown">
              <img src="{{ asset('profile/' . Auth::user()->avatar) }}" alt="profile"/>
              <span class="nav-profile-name">{{ Auth::user()->name }}</span>
            </a>
            <div class="dropdown-menu dropdown-menu-right navbar-dropdown" aria-labelledby="profileDropdown">
              <a class="dropdown-item" href="{{ url('auth/logout') }}">
                <i class="mdi mdi-logout text-primary"></i>
                Logout
              </a>
            </div>
          </li>
        </ul>
        <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-toggle="offcanvas">
          <span class="mdi mdi-menu"></span>
        </button>
      </div>
    </nav>
    <!-- partial -->
    <div class="container-fluid page-body-wrapper">
      <!-- partial:partials/_sidebar.html -->
      <nav class="sidebar sidebar-offcanvas" id="sidebar">
        <ul class="nav">
          <li class="nav-item">
            <a class="nav-link" href="{{ url('dasboard/halaman') }}">
              <i class="mdi mdi-file-document-box-outline menu-icon"></i>
              <span class="menu-title">Documentation</span>
            </a>
            <a class="nav-link" href="{{ route('profile.index') }}">
              <i class="mdi mdi-file-document-box-outline menu-icon"></i>
              <span class="menu-title">Profile</span>
            </a>
            <a class="nav-link" href="{{ url('/chat') }}">
              <i class="mdi mdi-file-document-box-outline menu-icon"></i>
              <span class="menu-title">chat</span>
            </a>
            <a class="nav-link" href="{{ url('/inbox') }}">
              <i class="mdi mdi-file-document-box-outline menu-icon"></i>
              <span class="menu-title">inbox</span>
            </a>
          </li>
        </ul>
      </nav>
      
      <!-- partial -->
      <div class="main-panel">
        <div class="content-wrapper">
          @include('dasboard.halaman.pesan')
          <div class="row">
            <div class="col-md-12 stretch-card">
              <div class="card">
                <div class="card-body">
                <form action="{{ route('profile.update',$profile->id) }}"method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <img width="100" height="100"src="{{ asset('profile/' . Auth::user()->avatar) }} " alt="profile"/>
                    <div class="mb-3">
                      <label for="profile" class="form-label text-light">GAMBAR</label>
                      <input type="file" class="form-control @error('profile') is-invalid @enderror" value="{{ old ('profile') }}" id="profile" name="profile"
                      accept="image/*" onchange="document.getElementById('output').src = window. URL.createObjectURL(this.files[0])">
                      @error('profile')
                      <span class="invalid-feedback" >
                      <strong>{{ $message }}</strong>
                      </span>
                      @enderror
                      </div>
                    <div class="form-group">
                        <label for="name">Nama:</label>
                        <input type="text" class="form-control" name="name" required value="{{ $profile->name }}" />
                    </div>
                    <div class="form-group">
                        <label for="phone">Nomor Telepon:</label>
                        <input type="text" class="form-control" name="phone" required value="{{ $profile->notel }}" />
                    </div>
                    <div class="form-group">
                        <label for="address">Alamat:</label>
                        <input type="text" class="form-control" name="address" rows="4" required value="{{ $profile->alamat }}"></textarea>
                    </div>
                    <label for="pdf_file">File Perijinan:</label>
                    <input type="file" name="pdf_file" value="{{ $profile->perijinan }}"><br>
                    
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- content-wrapper ends -->
        <!-- partial:partials/_footer.html -->
        <footer class="footer">
        <div class="d-sm-flex justify-content-center justify-content-sm-between">
          <span class="text-muted text-center text-sm-left d-block d-sm-inline-block">Copyright © <a href="https://www.bootstrapdash.com/" target="_blank">bootstrapdash.com </a>2021</span>
          <span class="float-none float-sm-right d-block mt-1 mt-sm-0 text-center">Only the best <a href="https://www.bootstrapdash.com/" target="_blank"> Bootstrap dashboard  </a> templates</span>
        </div>
        </footer>
        <!-- partial -->
      </div>
      <!-- main-panel ends -->
    </div>
    <!-- page-body-wrapper ends -->
  </div>
  <!-- container-scroller -->

  <!-- plugins:js -->
  <script src="{{ asset('template/vendors/base/vendor.bundle.base.js') }}"></script>
  <!-- endinject -->
  <!-- Plugin js for this page-->
  <script src="{{ asset('template/vendors/chart.js/Chart.min.js') }}"></script>
  <script src="{{ asset('template/vendors/datatables.net/jquery.dataTables.js') }}"></script>
  <script src="{{ asset('template/vendors/datatables.net-bs4/dataTables.bootstrap4.js') }}"></script>
  <!-- End plugin js for this page-->
  <!-- inject:js -->
  <script src="{{ asset('template/js/off-canvas.js') }}"></script>
  <script src="{{ asset('template/js/hoverable-collapse.js') }}"></script>
  <script src="{{ asset('template/js/template.js') }}"></script>
  <!-- endinject -->
  <!-- Custom js for this page-->
  <script src="{{ asset('template/js/dashboard.js') }}"></script>
  <script src="{{ asset('template/js/data-table.js') }}"></script>
  <script src="{{ asset('template/js/jquery.dataTables.js') }}"></script>
  <script src="{{ asset('template/js/dataTables.bootstrap4.js') }}"></script>
  <!-- End custom js for this page-->

  <script src="js/jquery.cookie.js" type="text/javascript"></script>
</body>

</html>
