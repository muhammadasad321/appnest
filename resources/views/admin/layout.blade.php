<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Dashboard - NiceAdmin Bootstrap Template</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Include jQuery -->
<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>

<!-- Include the latest version of Select2 -->
<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css" rel="stylesheet" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js"></script>

  <!-- Favicons -->
  <link href="{{asset('assets/img/favicon.png')}}" rel="icon">
  <link href="{{asset('assets/img/apple-touch-icon.png')}}" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.gstatic.com" rel="preconnect">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">  <link href="{{asset('assets/vendor/bootstrap-icons/bootstrap-icons.css')}}" rel="stylesheet">
  <link href="{{asset('assets/vendor/boxicons/css/boxicons.min.css')}}" rel="stylesheet">
  <link href="{{asset('assets/vendor/quill/quill.snow.css')}}" rel="stylesheet">
  <link href="{{asset('assets/vendor/remixicon/remixicon.css')}}" rel="stylesheet">
  <link href="{{asset('assets/vendor/simple-datatables/style.css')}}" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="{{asset('assets/css/style.css')}}" rel="stylesheet">

  <!-- =======================================================
  * Template Name: NiceAdmin
  * Updated: Aug 30 2023 with Bootstrap v5.3.1
  * Template URL: https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>

  <!-- ======= Header ======= -->
  <header id="header" class="header fixed-top d-flex align-items-center">

    <div class="d-flex align-items-center justify-content-between">
      <a href="index.html" class="logo d-flex align-items-center">
        <img src="assets/img/logo.png" alt="">
        <span class="d-none d-lg-block">Admin Panel</span>
      </a>
      <i class="bi bi-list toggle-sidebar-btn"></i>
    </div><!-- End Logo -->



    <nav class="header-nav ms-auto">
      <ul class="d-flex align-items-center">

        <li class="nav-item d-block d-lg-none">
          <a class="nav-link nav-icon search-bar-toggle " href="#">
            <i class="bi bi-search"></i>
          </a>
        </li><!-- End Search Icon-->

      
       
        <li class="nav-item dropdown pe-3">

          <a class="nav-link nav-profile d-flex align-items-center pe-0" href="#" data-bs-toggle="dropdown">
           @if(Session::get('username'))
            <span class="d-none d-md-block dropdown-toggle ps-2">
              
             Welcome {{Session::get('username')}}
            </span>
            @endif
          </a><!-- End Profile Iamge Icon -->

          <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile">
            <li class="dropdown-header">
            @if(Session::get('username'))

              <h6>{{Session::get('username')}}</h6>
              @endif

            </li>
            <li>
              <hr class="dropdown-divider">
            </li>

           
            <li>
              <hr class="dropdown-divider">
            </li>

          
            <li>
              <hr class="dropdown-divider">
            </li>

            <li>
              <a class="dropdown-item d-flex align-items-center" href="{{url('admin/logout')}}">
                <i class="bi bi-box-arrow-right"></i>
                <span>Sign Out</span>
              </a>
            </li>

          </ul><!-- End Profile Dropdown Items -->
        </li><!-- End Profile Nav -->

      </ul>
    </nav><!-- End Icons Navigation -->

  </header><!-- End Header -->

  <!-- ======= Sidebar ======= -->
  <aside id="sidebar" class="sidebar">

    <ul class="sidebar-nav" id="sidebar-nav">

      <li class="nav-item">
        <a class="nav-link " href="{{url('admin/dashboard')}}">
          <i class="bi bi-grid"></i>
          <span>Dashboard</span>
        </a>
      </li><!-- End Dashboard Nav -->

      <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#components-nav" data-bs-toggle="collapse" href="#">
          <i class='bx bx-category'></i><span>Categories</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="components-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
          <li>
            <a href="{{url('admin/categories')}}">
              <i class="bi bi-circle"></i><span>Create category</span>
            </a>
          </li>
          <li>
            <a href="{{url('admin/categorylist')}}">
              <i class="bi bi-circle"></i><span>Category list</span>
            </a>
          </li>
          
        </ul>
      </li><!-- End Components Nav -->

   
      <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#forms-nav" data-bs-toggle="collapse" href="#">
          <i class='bx bx-window-alt'></i><span>Applications</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="forms-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
          <li>
            <a href="{{url('admin/addsoftware')}}">
              <i class="bi bi-circle"></i><span>Add application </span>
            </a>
          </li>
          <li>
            <a href="{{url('admin/softwarelist')}}">
              <i class="bi bi-circle"></i><span>Application list</span>
            </a>
          </li>
          
        </ul>
      </li><!-- End Components Nav -->
      <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#charts-nav" data-bs-toggle="collapse" href="#">
        <i class='bx bx-news'></i><span>News</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="charts-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
          <li>
            <a href="{{url('admin/addnews')}}">
              <i class="bi bi-circle"></i><span>Create news</span>
            </a>
          </li>
          <li>
            <a href="{{url('admin/newslist')}}">
              <i class="bi bi-circle"></i><span>News list</span>
            </a>
          </li>
          <li>
            <a href="{{url('admin/addauthor')}}">
              <i class="bi bi-circle"></i><span>Add author</span>
            </a>
          </li>
          <li>
            <a href="{{url('admin/authorlist')}}">
              <i class="bi bi-circle"></i><span>Author list</span>
            </a>
          </li>
          
        </ul>
      </li><!-- End Components Nav -->
      <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#Review-nav" data-bs-toggle="collapse" href="#">
        <i class='bx bx-star'></i><span>Reviews</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="Review-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
          <li>
            <a href="{{url('admin/reviewlist')}}">
              <i class="bi bi-circle"></i><span>Reviews list</span>
            </a>
          </li>
      
          
        </ul>
      </li>
  
    
      <li class="nav-heading">Pages</li>

<li class="nav-item">
  <a class="nav-link collapsed" href="{{url('admin/contact')}}">
    <i class="bi bi-envelope"></i>
    <span>Contact</span>
  </a>
</li>
<li class="nav-item">
  <a class="nav-link collapsed" href="{{url('admin/searchlist')}}">
    <i class="bx bx-search-alt"></i>
    <span>Searches on website</span>
  </a>
</li><!-- End Profile Page Nav -->
     
    </ul>

  </aside><!-- End Sidebar-->

  <main id="main" class="main">

  @yield('admin.dashboard')

  @yield('admin.categories')

  @yield('admin.categorylist')

  @yield('admin.categoryedit')

  @yield('admin.addsoftware')

  @yield('admin.softwarelist')

  @yield('admin.softwareedit')

  @yield('admin.addnews')
  @yield('admin.newslist')
  @yield('admin.newsedit')

  @yield('admin.addauthor')
  @yield('admin.authorlist')


  @yield('admin.reviewlist')

  @yield('admin.searchlist')

  @yield('admin.contact')
  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
  <footer id="footer" class="footer">
    <div class="copyright">
      &copy; Copyright <strong><span>Muhammad Asad</span></strong>. All Rights Reserved
    </div>

  </footer><!-- End Footer -->


  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="{{asset('assets/vendor/apexcharts/apexcharts.min.js')}}"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js"></script>
  <script src="{{asset('assets/vendor/tinymce/tinymce.min.js')}}"></script>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous"></script>

  

  <!-- Template Main JS File -->
  <script src="{{asset('assets/js/main.js')}}"></script>


  <script>
$(document).ready(function () {
    // When any radio button is clicked
    $('input[type="radio"]').click(function () {
        // Unselect all other radio buttons
        $('input[type="radio"]').not(this).prop('checked', false);
    });
});
</script>
</body>

</html>