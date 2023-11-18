@extends('admin.layout')

@section('admin.dashboard')
<div class="pagetitle">
      <h1>Dashboard</h1>
      
    </div><!-- End Page Title -->

    <section class="section dashboard">
      <div class="row">

        <!-- Left side columns -->
        <div class="col-lg-8">
          <div class="row">

            <!-- Sales Card -->
            <div class="col-xxl-4 col-md-6">
              <div class="card info-card sales-card">

               
                <div class="card-body">
                  <h5 class="card-title">Total apps</h5>

                  <div class="d-flex align-items-center">
                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                    <i class='bx bx-list-ol' ></i>                    </div>
                    <div class="ps-3">
                      <h6>{{$totalapps}}</h6>
<a href="{{url('admin/softwarelist')}}"><button class="btn btn-primary btn-sm">Visit list</button></a>
                    </div>
                  </div>
                </div>

              </div>
            </div><!-- End Sales Card -->

            <!-- Revenue Card -->
            <div class="col-xxl-4 col-md-6">
              <div class="card info-card revenue-card">

               

                <div class="card-body">
                  <h5 class="card-title">Total visitors</h5>

                  <div class="d-flex align-items-center">
                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                    <i class="bi bi-people"></i>
                  </div>
                    <div class="ps-3">
                      <h6>{{ $visitorCount }}</h6>

                    </div>
                  </div>
                </div>

              </div>
              
            </div><!-- End Revenue Card -->
<!-- Revenue Card -->
<div class="col-xxl-4 col-md-6">
              <div class="card info-card customers-card">

               

                <div class="card-body">
                  <h5 class="card-title">Total categories</h5>

                  <div class="d-flex align-items-center">
                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                    <i class="bx bx-category"></i>
                  </div>
                    <div class="ps-3">
                      <h6>{{ $totalcategories }}</h6>
                      <a href="{{url('admin/categorylist')}}"><button class="btn btn-warning btn-sm text-white">Visit list</button></a>


                    </div>
                  </div>
                </div>

              </div>
              
            </div><!-- End Revenue Card -->
            <div class="col-xxl-4 col-md-6">
              <div class="card info-card customers-card" >

               

                <div class="card-body">
                  <h5 class="card-title">Total News</h5>

                  <div class="d-flex align-items-center">
                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center" style="background:#9c27b0a1">
                    <i class="bx bx-news" style="color:purple"></i>
                  </div>
                    <div class="ps-3">
                      <h6>{{ $totalnews }}</h6>
                      <a href="{{url('admin/newslist')}}"><button class="btn btn-sm" style="background:purple; color:white">Visit list</button></a>


                    </div>
                  </div>
                </div>

              </div>
              
            </div><!
            <!-- Reports -->
        
          </div>
        </div><!-- End Left side columns -->

        <!-- Right side columns -->
      
      </div>
    </section>
    @endsection