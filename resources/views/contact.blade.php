@extends('layout')
@section('title','Contact Us')
@section('meta_keyword', 'Contact Us')
@section('meta_desc', 'contact us for any query')
@section('contact')
<div class="contact-main-container">
@if(session('message'))
<div class="alert alert-success alert-dismissible fade show" role="alert">
{{session('message')}}
<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
              </div>
              @endif
<div class="contact-us-container">

    <div class="contact-form-container">
<div class="card">
            <div class="card-body">
              <h5 class="card-title">Contact form</h5>

              <!-- Vertical Form -->
              <form class="row g-3" action="{{url('submit')}}" method="post">
                @csrf
                <div class="col-12">
                  <label for="inputNanme4" class="form-label">Your Name</label>
                  <input type="text" name="name" class="form-control" id="inputNanme4">
                </div>
                <div class="col-12">
                  <label for="inputEmail4" class="form-label">Email</label>
                  <input type="email" name="email" class="form-control" id="inputEmail4">
                  </div>
                
                <div class="col-12">
                  <label for="inputEmail4" class="form-label">Message</label>
              <textarea name="message" class="form-control" id="" cols="30" rows="10"></textarea>
              </div>
                <div class="text-left">
                  <button type="submit" class="btn btn-primary ">Submit</button>
                </div>
              </form><!-- Vertical Form -->

            </div>
          </div>
          </div>
          <div class="contact-img-container">
            <img src="{{asset('images/contact.png')}}" alt="">
          </div>
          </div>
          </div>
@endsection