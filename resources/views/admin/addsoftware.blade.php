@extends('admin.layout')

@section('admin.addsoftware')
<div class="card">
            <div class="card-body">
 
              <h5 class="card-title">Add Software</h5>

              <!-- Vertical Form -->
              <form class="row g-3" enctype="multipart/form-data" action="{{url('admin/softwarestore')}}" method="post">
              @csrf 
              <div class="col-12">
                  <label for="inputNanme4" class="form-label">Application Name</label>
                  <input type="text" class="form-control" name="name" id="inputNanme4" placeholder="Enter application name" required>
                </div>
                <div class="d-flex justify-content-around flex-wrap">
                <div class=" border text-center p-3 m-4 rounded">
                      <input class="form-check-input" type="radio" name="windows" id="gridRadios1" value="Windows" >
                      <label class="form-check-label" for="gridRadios1">
Windows                      </label>
                    </div>
                    <div class=" border text-center p-3 m-4 rounded">
                      <input class="form-check-input" type="radio" name="android" id="gridRadios1" value="Android" >
                      <label class="form-check-label" for="gridRadios1">
Android                      </label>
                    </div>
                    <div class=" border text-center p-3 m-4 rounded">
                      <input class="form-check-input" type="radio" name="mac" id="gridRadios1" value="Mac" >
                      <label class="form-check-label" for="gridRadios1">
Mac/ios                      </label>
                    </div>
                    </div>
                <div class="col-12">
                  <label class="col-sm-2 col-form-label">Select Category</label>
                  <div class="col-sm-12">
                    <select class="form-select" name="category_id" aria-label="Default select example" required>
                      <option selected>Select application category</option>
                      @foreach($CategoryList as $data)
                      <option value="{{$data->id}}">{{$data->name }}</option>
                     @endforeach
                    </select>
                  </div>
                </div>
                <div class="col-12">
                  <label class="col-sm-2 col-form-label">Should be in trending</label>
                  <div class="col-sm-12">
                    <select class="form-select" name="trending" aria-label="Default select example" required>
                      <option selected>Select in trend</option>
                      <option value="1">Yes</option>
                      <option value="0">No</option>
                    </select>
                  </div>
                </div>
                <div class="col-12">
                  <label class="col-sm-2 col-form-label">Select Licence</label>
                  <div class="col-sm-12">
                    <select class="form-select" name="licence" aria-label="Default select example" required>
                      <option selected>Select Licence</option>
                      <option value="Free">Free</option>
                      <option value="Paid">Paid</option>


                    
                    </select>
                  </div>
                </div>
                <div class="col-12">
                  <label for="inputNanme4" class="form-label" required>Version</label>
                  <input type="text" class="form-control" id="inputNanme4" name="version" required placeholder="Enter application version">
                </div>
                <div class="col-12">
                  <label for="inputAddress" class="form-label">Image</label>
                  <input type="file" class="form-control" id="inputAddress" name="image" required  placeholder="Enter application tagline">
                </div>
                <div class="col-12">
                  <label for="inputAddress" class="form-label">Tagline</label>
                  <input type="text" class="form-control" id="inputAddress" name="tagline" required placeholder="Enter application tagline">
                </div>
        <div class="card">
            <div class="card-body">
              <h5 class="card-title">Enter application overview</h5>

              <!-- TinyMCE Editor -->
              <textarea class="tinymce-editor" name="description" required>
               
              </textarea><!-- End TinyMCE Editor -->

            </div>
          </div>
          <div class="col-12">
                  <label for="inputNanme4" class="form-label">File URL</label>
                  <input type="text" class="form-control" name="file_url" id="inputNanme4" required  placeholder="Enter application file url">
                </div>
                <div class="text-center">
                    <h1 class="card-title">Seo Section</h1>
                </div>
                <div class="col-12">
                  <label for="inputNanme4" class="form-label">Meta title</label>
                  <input type="text" class="form-control" name="meta_title" id="inputNanme4"  required placeholder="Enter application meta title">
                </div>
                <div class="col-12">
                  <label for="inputNanme4" class="form-label">Meta description</label>
                  <input type="text" class="form-control" id="inputNanme4" name="meta_desc" required placeholder="Enter application meta description">
                </div>
                <div class="col-12">
                  <label for="inputNanme4" class="form-label">Meta Keyword</label>
                  <input type="text"  class="form-control" id="inputNanme4" name="meta_keyword" required placeholder="Enter application meta keyword">
                </div>
                <div class="text-left">
                  <button type="submit" class="btn btn-primary">Submit</button>
                </div>
              </form><!-- Vertical Form -->

            </div>
          </div>
  

@endsection