@extends('layout')

@section('title', 'App news and reviews, best software downloads and discovery')
@section('meta_keyword', 'Softwares, Applications, Downloads, apk, windows download, android downloads, mac and ios download')
@section('meta_desc', 'This website is the place to discover the best applications for your device, offering you reviews, news, articles and free downloads.')

@section('index')
    <!--Hero Banner Section-->
    <section id="hero">
    <div class="hero-banner">
      <div class="main-container-banner">
        <div class="banner-main-heading">
          The best apps for you at one place.
        </div>
        <form action="{{url('search/')}}" method="get">

        <div class="banner-searchbar">
          <input type="text" name="search" placeholder="What would you like to find today?" class="search-bar" id="">
          <button class="search-btn"><i class="ri-search-2-line"></i></button>
        </div>
</form>
      </div>
      <div class="main-container-banner-image"><img src="{{asset('images/bannerimg.png')}}" alt=""></div>
    </div>
  </section>

      <!--Trending Content Section-->
  <section id="trending">
    <div class="main-container-trending-heading">
      <span class="trending-heading">Trending Apps</span>
    </div>
    <div class="trending-apps-container">
@foreach($TrendingContent as $data)
<a href="{{url('application/'.$data->slug)}}"> 
  <div class="trending-apps">
        <div class="trending-img">
          <img
            src="{{asset('upload/images/'.$data->image)}}"
            alt="">
        </div>
        <div class="trending-licence">
          {{$data->licence}}
        </div>
        <div class="trending-apps-heading">
          {{$data->name}}
        </div>
      </div>
</a>
    @endforeach

    </div>
    <div class="view-all">
      <button><a href="{{(url('trending/'))}}">View all</a></button>
    </div>
  </section>

      <!--Latest Apps Section-->
  <section id="latest">
    <div class="main-container-trending-heading">
      <span class="trending-heading">Latest Apps</span>
    </div>
    <div class="main-container-latest">
      <div class="latest-main-buttons">
        <button class="latest-btn window-latest-btn">Windows</button>
        <button class="latest-btn android-latest-btn">Android</button>
        <button class="latest-btn mac-latest-btn">Mac</button>

      </div>
      <div class="latest-main-divs">
        <div class="window-div-container">
          <div class="window-div">
            @foreach($WindowsContent as $data)
            <a href="{{url('application/'.$data->slug)}}"> 
<div class="latest-content">
              <div class="latest-img">
                <img
                src="{{asset('upload/images/'.$data->image)}}"
                  alt="">
              </div>
              <div class="latest-inner-content">
                <div class="latest-title">{{$data->name}}</div>
                <div class="latest-licence">{{$data->licence}}</div>
                <div class="latest-tagline">{{$data->tagline}}</div>
              </div>
            </div>
            </a>
            @endforeach
        
         
          </div>
          <div class="view-all latest-view-all">
          <button><a href="{{url('windows/')}}">View all</a></button>
          </div>
        </div>
        <div class="android-div-container">
          <div class="android-div">
          
          @foreach($AndroidContent as $data)
           <a href="{{url('application/'.$data->slug)}}"> 
            <div class="latest-content">
              <div class="latest-img">
                <img
                src="{{asset('upload/images/'.$data->image)}}"
                  alt="">
              </div>
              <div class="latest-inner-content">
                <div class="latest-title">{{$data->name}}</div>
                <div class="latest-licence">{{$data->licence}}</div>
                <div class="latest-tagline">{{$data->tagline}}</div>
              </div>
            </div>
            </a>
            @endforeach
        
          </div>
          
          <div class="view-all latest-view-all">
          <button><a href="{{url('mac/')}}">View all</a></button>
          </div>
        </div>
        <div class="mac-div-container">
          <div class="mac-div">
          @foreach($MacContent as $data)
          <a href="{{url('application/'.$data->slug)}}"> 
<div class="latest-content">
              <div class="latest-img">
                <img
                src="{{asset('upload/images/'.$data->image)}}"
                  alt="">
              </div>
              <div class="latest-inner-content">
                <div class="latest-title">{{$data->name}}</div>
                <div class="latest-licence">{{$data->licence}}</div>
                <div class="latest-tagline">{{$data->tagline}}</div>
              </div>
            </div>
            </a>
            @endforeach
        
          </div>
          <div class="view-all latest-view-all">
            <button><a href="{{url('mac/')}}">View all</a></button>
          </div>
        </div>
      </div>
    </div>
  </section>

      <!--News Section of Website-->
  <section id="news">
    <div class="main-container-trending-heading">
      <span class="trending-heading">Latest News</span>
    </div>
    <div class="main-container-news">
      @foreach($NewsContent as $data)
     <a href="{{url('news/'.$data->slug)}}"><div class="news-div-container">
        <div class="news-img-container">
          <img
            src="{{asset('upload/news/'.$data->image)}}"
            alt="{{$data->title}}">
        </div>
        <div class="news-title">{{$data->title}}
        </div>
      </div>
      </a> 
   @endforeach
     
      <div class="view-all latest-view-all">
        <button><a href="{{url('newsall')}}">View all</a></button>
      </div>
    </div>
  </section>
@endsection