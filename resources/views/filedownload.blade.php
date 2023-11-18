@extends('layout')
<title>Download The Source Code</title>

@section('filedownload')
<body>

  <main>
    <div class="container">
    @if(session('error'))
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
{{ session('error') }}



                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
              </div>
              @endif
      <section class="section register min-vh-100 d-flex flex-column align-items-center justify-content-center py-4">
        <div class="container">


          <div class="row justify-content-center">
            <div class="col-lg-4 col-md-6 d-flex flex-column align-items-center justify-content-center">

           
              <div class="card mb-3">

                <div class="card-body">
           <div class="pt-4 pb-2">
    
    


                    <h5 class="card-title text-center pb-0 fs-4">Download the code</h5>
                    <p class="text-center small">Enter password given by author</p>
                  </div>
                 

                  <form class="row g-3 needs-validation" action="{{url('download')}}" method="post" novalidate>
@csrf
                  
                    <div class="col-12">
                      <label for="yourPassword" class="form-label">Password</label>
                      <input type="password" name="password" class="form-control" id="yourPassword" placeholder="Enter password" required>
                      <div class="invalid-feedback">Please enter valid password!</div>
                    </div>

                   
                    <div class="col-12">
                      <button class="btn btn-primary w-100" type="submit">Download</button>
                    </div>
                   
                  </form>

                </div>
              </div>

            
            </div>
          </div>
        </div>

      </section>

    </div>
  </main><!-- End #main -->
</body>
@endsection