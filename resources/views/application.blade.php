@extends('layout')
@section('title', $MetaDetail->meta_title )
@section('meta_keyword', $MetaDetail->meta_keyword)
@section('meta_desc', $MetaDetail->meta_desc)
@section('application')
<link rel="icon" type="image/x-icon" href="{{asset('upload/images/'.$MetaDetail->image)}}">

<section id="main-page">
    <div class="main-container-of-all">
        @foreach($result as $data)
      <div class="main-container-download-page">
        <div class="container-img-and-content">
          <div class="download-main-img">
            <img
              src="{{asset('upload/images/'.$data->image)}}"
              alt="">
          </div>
          <div class="download-header-content">
            <span class="mainpage-title">{{$data->name}}</span>
            <span class="mainpage-licence">{{$data->licence}}

            </span>
            <span class="mainpage-tagline">{{$data->tagline}}
            </span>
          </div>
        </div>
        <div class="download-btn">
          <a href="{{$data->file_url}}" target="_blank"><button id="myButton1" style="display: none;">Downlaod
              Now</button></a>
          <p id="countdown1">10</p>

        </div>

      </div>
      <div class="application-overview-and-specs">
        <div class="application-overview">
          <span class="overview">{!! $data->description !!}</span>
         
          <div class="main-container-download-page">
            <div class="container-img-and-content">
              <div class="download-main-img">
                <img
                  src="{{asset('upload/images/'.$data->image)}}"
                  alt="">
              </div>
              <div class="download-header-content">
                <span class="mainpage-title">{{$data->name}}</span>
                <span class="mainpage-licence">{{$data->licence}}

                </span>
                <span class="mainpage-tagline">{{$data->tagline}}
                </span>
              </div>
            </div>
            <div class="download-btn">
              <a href="{{$data->file_url}}" target="_blank"><button id="myButton2" style="display: none;">Downlaod
                  Now</button></a>
              <p id="countdown2">10</p>

            </div>

          </div>
        </div>

        <div class="application-specs">
          <span class="spec-title">App specs</span>
          <span class="spec-licence">
            <span style="color: #777; ">Licence</span>
            <span style="color: #444;">{{$data->licence}}</span>
          </span>
          <span class="spec-version">
            <span style="color: #777; ">Version</span>
            <span style="color: #444;">{{$data->version}}</span>
          </span>
          <span class="spec-platform">
            <span style="color: #777; ">Platform</span>
            <span style="color: #444;">
            @if (!empty($data->windows) || !empty($data->android) || !empty($data->mac))
            {{$data->windows}}
            {{$data->android}}
            {{$data->mac}}

@endif
        </span>
          </span>
          <span class="spec-Language">
            <span style="color: #777; ">Language</span>
            <span style="color: #444;">English</span>
          </span>
        </div>
        <div class="main-page-sidebar">
          <div class="trending-downlaods">
            <div class="trending-download-heading" style="margin: 1rem 1rem;font-size: 1.4rem;">
              Trending Applications
            </div>
            <div class="trending-content">
              @foreach($TrendingContent as $data)
             <a href="{{url('application/'.$data->slug)}}"> <div class="latest-content" style="width: 18rem; cursor: pointer;">
                <div class="latest-img" style="width: 4rem;height: 4rem;">
                  <img
                    src="{{asset('upload/images/'.$data->image)}}"
                    alt="">
                </div>
                <div class="latest-inner-content">
                  <div class="latest-title" style="font-size: .9rem;">{{$data->name}}</div>
                  <div class="latest-tagline" style="font-size: .9rem;">{{$data->tagline}}</div>
                </div>
              </div>
              </a>
             @endforeach
              
            </div>
          </div>
          <div class="trending-downlaods">
            <div class="trending-download-heading" style="margin: 1rem 1rem;font-size: 1.4rem;">
              Latest Applications
            </div>
            <div class="trending-content">
              @foreach($LatestContent as $data)
              <a href="{{url('application/'.$data->slug)}}">
              <div class="latest-content" style="width: 18rem; cursor: pointer;">
                <div class="latest-img" style="width: 4rem;height: 4rem;">
                  <img
                    src="{{asset('upload/images/'.$data->image)}}"
                    alt="">
                </div>
                <div class="latest-inner-content">
                  <div class="latest-title" style="font-size: .9rem;">{{$data->name}}</div>
                  <div class="latest-tagline" style="font-size: .9rem;">{{$data->tagline}}</div>
                </div>
              </div>
              </a>
              @endforeach
            </div>
          </div>
        </div>
      </div>

      <div class="user-review-container">
        @foreach($Review as $data)
        <div class="review-container">
          <div class="user-img-and-name">
            <div class="user-img">
              <img src="https://a.disquscdn.com/1694631380/images/noavatar92.png" alt="">

            </div>

            <div class="user-name">
              <span class="review-by">By {{$data->name}}</span>
              
              <span class="reviewed-on">{{ $formattedDate }}</span>
           
            </div>
          </div>
          <div class="review-shown">
            <span class="review">
             {{$data->review}}
            </span>
          </div>
        </div>
       @endforeach
      </div>

      <div class="review-main-container">
        <div class="review-form mt-4 mb-4">
          <div class="card">
          @if(session('review'))
  <div class="alert alert-success alert-dismissible fade show" role="alert">
{{session('review')}}

<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
              </div>
              @endif
            <div class="card-body">
              <h5 class="card-title">User review form</h5>

              <!-- Vertical Form -->

              <form class="col g-3" action="/review-submit" method="post">
                @csrf
                <input type="hidden" name="post_id" value="{{$data->slug}}">
                <div class="col-12 mt-2">
                  <label for="inputNanme4" class="form-label">Your Name</label>
                  <input type="text" class="form-control" name="name" id="inputNanme4">
                </div>
                <div class="col-12 mt-2">
                  <label for="inputEmail4" class="form-label">Email</label>
                  <input type="email" class="form-control" name="email" id="inputEmail4">
                </div>
                <div class="col-12 mt-2">
                  <label for="inputPassword4" class="form-label">Review</label>
                  <textarea class="form-control" name="review" id="" cols="30" rows="10"></textarea>
                </div>

                <div class="text-left mt-2">
                  <button type="submit" class="btn btn-primary "
                    style="background-color:#232448;border: none;">Review</button>
                </div>
              </form><!-- Vertical Form -->

            </div>
          </div>
        </div>
      </div>

      @endforeach
    </div>
  </section>
@endsection