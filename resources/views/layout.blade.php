<html>
    <head>
<meta http-equiv="X-UA-Compatible" content="ie=edge">
<meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0" />

<!--JS files-->

<script src="{{asset('assets/js/countdown.js')}}"></script>

<!--Css files and CDN-->

<link rel="stylesheet" href="{{asset('assets/css/Frontendcss.css')}}">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

<!--Fonts and js CDN-->

<link href="https://fonts.googleapis.com/css2?family=Fjalla+One&family=Poppins&display=swap" rel="stylesheet">
<link href="{{asset('assets/vendor/remixicon/remixicon.css')}}" rel="stylesheet">
<!-- Include jQuery -->
<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
  integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
<!--meta Seo-->
<link rel="icon" type="image/x-icon" href="{{asset('images/bannerimg.png')}}">

<meta name="keywords" content="@yield('meta_keyword')">
    <meta name="description" content="@yield('meta_desc')">
    <title>@yield('title')</title>
    </head>
    <body>

      <!--Header Section of Website-->
  <header>
    <div class="main-container-header">
      <div class="menu-and-logo">
        <div class="menu">
          <div class="hambar">
            <i class='ri-menu-4-line' style="color: white;font-size: 1.6rem; cursor: pointer;" id="show"></i>
            <i class="ri-close-line" style="color: white;font-size: 1.6rem; cursor: pointer;" id="hide"></i>
          </div>
          <div class="main-menu">
            <ul>
              @foreach($Category as $data)
              <li><a href="{{url('categories/'.$data->id)}}">{{($data->name)}}</a></li>
             @endforeach
            </ul>
          </div>
        </div>
        <div class="logo"><a href="/" style="color:#fff;">Title</a></div>
      </div>
      <div class="nav-items">
        <ul>
          <li><a href="{{url('windows')}}">Windows</a></li>
          <li><a href="{{url('android')}}">Android</a></li>
          <li><a href="{{url('mac')}}">Mac</a></li>
        </ul>
      </div>
      <form action="{{url('search/')}}" method="get">
      <div class="header-searchbar">
        <input type="text" name="search" placeholder="Search here..." class="search-bar" id="">
        <button class="search-btn"><i class="ri-search-2-line"></i></button>
      </div>
      </form>
    </div>
  </header>
@yield('index')
@yield('categories')
@yield('windows')
@yield('android')
@yield('mac')  
@yield('application')
@yield('news')
@yield('searchpage')
@yield('newsall')
@yield('info')
@yield('contact')
@yield('filedownload')


      <!--Footer section of Website-->
  <footer>
    <div class="main-container-footer">
      <div class="footer-inner">
        <span class="footer-web-name">Website Name</span>

      </div>
      <div class="footer-inner">
        <span>About Us</span>
        <ul class="about-inner">
          <li><a href="{{url('info/')}}">Info</a></li>
          <li><a href="{{url('contact/')}}">Contact Us</a></li>
        </ul>
      </div>
      <div class="footer-inner">
        <span>Legal</span>
        <ul class="legal-inner">
          <li><a href="">Privacy policy</a></li>
          <li><a href="">Terms and Condition</a></li>
          <li><a href="">Disclaimer</a></li>
          <li><a href="">DMCA</a></li>
        </ul>
      </div>
      <div class="footer-inner">
        <span>Social media</span>
        <ul class="social-inner">
          <li><a href=""><i class="ri-facebook-line"></i></a></li>
          <li><a href=""><i class="ri-instagram-line"></i></a></li>
          <li><a href=""><i class="ri-youtube-line"></i></a></li>
        </ul>
      </div>
    </div>
    <div class="footer-credit">
      <span>Copyright. All right reserved.</span>
    </div>
  </footer>
</body>

</html>
<script>
  $("#show").click(function () {
    $(".main-menu").show();
    $("#show").hide();
    $("#hide").show();

  });
  $("#hide").click(function () {
    $(".main-menu").hide();
    $("#show").show();
    $("#hide").hide();
  });


  $(".window-latest-btn").click(function () {
    $(".window-div-container").show();
    $(".android-div-container").hide();
    $(".android-latest-btn").css('border-bottom', 'none');
    $(".mac-latest-btn").css('border-bottom', 'none');
    $(".window-latest-btn").css('border-bottom', '2px solid black');

    $(".mac-div-container").hide();

  });
  $(".android-latest-btn").click(function () {
    $(".window-div-container").hide();
    $(".android-div-container").show();
    $(".mac-latest-btn").css('border-bottom', 'none');

    $(".window-latest-btn").css('border-bottom', 'none');
    $(".android-latest-btn").css('border-bottom', '2px solid black');
    $(".mac-div-container").hide();
  });

  $(".mac-latest-btn").click(function () {
    $(".window-div-container").hide();
    $(".android-div-container").hide();
    $(".window-latest-btn").css('border-bottom', 'none');
    $(".android-latest-btn").css('border-bottom', 'none');
    $(".mac-latest-btn").css('border-bottom', '2px solid black');
    $(".mac-div-container").show();
  });

</script>

