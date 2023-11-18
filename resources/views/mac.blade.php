@extends('layout')
@section('title', 'Mac Apps')
@section('meta_keyword', 'Mac apps')
@section('meta_desc', 'Mac application for apple devices')
@section('mac')
<section id="categories">
    <div class="main-container-categories">
      <div class="advertisement-container">
        <div class="advertisement">
          <p>advertisement</p>
          <img
            src="https://static.wixstatic.com/media/0e0314_defacf16c0c04edc8087bf216b9524bb~mv2.jpg/v1/fill/w_640,h_764,al_c,q_85,usm_0.66_1.00_0.01,enc_auto/0e0314_defacf16c0c04edc8087bf216b9524bb~mv2.jpg"
            alt="">
        </div>
      </div>
      <div class="categories-div-container">
        <div class="android-div">
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
        {{ $MacContent->links() }}        </div>
      </div>
      <div class="advertisement-container">
        <div class="advertisement">
          <p>advertisement</p>
          <img
            src="https://static.wixstatic.com/media/0e0314_defacf16c0c04edc8087bf216b9524bb~mv2.jpg/v1/fill/w_640,h_764,al_c,q_85,usm_0.66_1.00_0.01,enc_auto/0e0314_defacf16c0c04edc8087bf216b9524bb~mv2.jpg"
            alt="">
        </div>
      </div>
  </section>

  @endsection