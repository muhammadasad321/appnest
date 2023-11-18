@extends('layout')
@section('title', 'Latest News are here')
@section('meta_keyword', 'news, trending news apps news')
@section('meta_desc', 'All news about trending technology')
@section('newsall')
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
        @foreach($NewsAll as $data)
           <a href="{{url('news/'.$data->slug)}}"> <div class="latest-content">
              <div class="latest-img" style="width:12rem">
                <img
                src="{{asset('upload/news/'.$data->image)}}"
                  alt="">
              </div>
              <div class="latest-inner-content">
                <div class="latest-title">{{$data->title}}</div>
                
              </div>
            </div>
            </a>
            @endforeach
        
        </div>
        <div class="view-all latest-view-all">
        {{ $NewsAll->links() }}        </div>
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