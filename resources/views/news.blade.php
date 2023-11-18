@extends('layout')
@section('title', $MetaDetail->meta_title)
@section('meta_keyword', $MetaDetail->meta_keyword)
@section('meta_desc', $MetaDetail->meta_desc)
@section('news')
<article>
    <header class="news-header">
      @foreach($NewsList as $data)
      <div class="news-title">
        <p>News</p>
        <h1 class="news-main-heading">{{$data->title}}</h1>
      </div>

      <div class="news-main-img">
        <img
          src="{{asset('upload/news/'.$data->image)}}"
          alt="">
      </div>

      <div class="author">
        <div class="author-img">
          <img
            src="https://media.istockphoto.com/id/1200677760/photo/portrait-of-handsome-smiling-young-man-with-crossed-arms.jpg?b=1&s=612x612&w=0&k=20&c=t7Z7NBXf5t7jWqoFxsH7B3bgrO3_BznOOhqEXWywjOc="
            alt="">
        </div>
        <div class="author-name-and-date">
          <span class="author-name">{{$data->author_name}}</span>
          <span class="publish-date">{{$formattedDate }}</span>
        </div>

      </div>
      <div class="news-main-container">
        <div class="news-shows">
          <span class="overview">{!! $data->article !!}
          </span>
         
        </div>
        <div class="Recommended-news">
          <div class="trending-download-heading" style="margin: 1rem 1rem;font-size: 1.4rem;">
            Recommended News
          </div>
          @foreach($LatestNews as $data)
         <a href="news/.$data->slug"> <div class="latest-content" style="width:100%;">
            <div class="latest-img" style="">
              <img
                src="{{asset('upload/news/'.$data->image)}}"
                alt="">
            </div>
            <div class="latest-inner-content">
              <span style="color:#888">How To</span>
              <div class="latest-title clamped-text" style="font-size: 1rem;">{{$data->title}}</div>
              <span style="color: #888;font-size: .9rem;">Read More</span>

            </div>
          </div>
</a>
          @endforeach
        </div>
        @endforeach
    </header>
  </article>

@endsection