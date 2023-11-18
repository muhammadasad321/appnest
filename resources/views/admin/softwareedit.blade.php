@extends('admin.layout')

@section('admin.softwareedit')
<div class="card">
            <div class="card-body">
         
              <h5 class="card-title">Add Software</h5>

              <!-- Vertical Form -->
              <form class="row g-3" enctype="multipart/form-data" action="{{url('admin/softwareupdate')}}" method="post">
@csrf
@foreach($data as $data)

<input type="hidden" name="id" id="inputNanme4" value="{{$data->id}}" class="form-control">
              <div class="col-12">
                  <label for="inputNanme4" class="form-label">Application Name</label>
                  <input type="text" class="form-control" name="name" value="{{$data->name}}" id="inputNanme4" placeholder="Enter application name" required>
                </div>
                <div class="d-flex justify-content-around flex-wrap">
                <div class=" border text-center p-3 m-4 rounded">
                      <input class="form-check-input" type="radio" name="windows" id="gridRadios1" value="Windows" @if($data->windows === 'Windows') checked @endif >
                      <label class="form-check-label" for="gridRadios1">
Windows                      </label>
                    </div>
                    <div class=" border text-center p-3 m-4 rounded">
                      <input class="form-check-input" type="radio" name="android" id="gridRadios1" value="Android" @if($data->android === 'Android') checked @endif >
                      <label class="form-check-label" for="gridRadios1">
Android                      </label>
                    </div>
                    <div class=" border text-center p-3 m-4 rounded">
                      <input class="form-check-input" type="radio" name="mac" id="gridRadios1" value="Mac" @if($data->mac === 'Android') checked @endif >
                      <label class="form-check-label" for="gridRadios1">
Mac/ios                      </label>
                    </div>
                    </div>
                <div class="col-12">
                  <label class="col-sm-2 col-form-label">Select Category</label>
                  <div class="col-sm-12">
                    <select class="form-select" name="category_id" aria-label="Default select example" required>
                      <option  value="{{$data->category_id}}">{{$data->category_name}}</option>

                      @foreach($CategoryList as $list)
                      <option value="{{$list->id}}">{{$list->name }}</option>
                     @endforeach
                    </select>
                  </div>
                </div>
                <div class="col-12">
                  <label class="col-sm-2 col-form-label">Should be in trending?</label>
                  <div class="col-sm-12">
                    <select class="form-select" name="trending"  aria-label="Default select example" required>
                      <option selected>{{$data->trending}}</option>
                      <option value="1">Yes</option>
                      <option value="0">No</option>


                    
                    </select>
                  </div>
                </div>
                <div class="col-12">
                  <label class="col-sm-2 col-form-label">Select Licence</label>
                  <div class="col-sm-12">
                    <select class="form-select" name="licence"  aria-label="Default select example" required>
                      <option selected>{{$data->licence}}</option>
                      <option value="Free">Free</option>
                      <option value="Paid">Paid</option>


                    
                    </select>
                  </div>
                </div>
                <div class="col-12">
                  <label for="inputNanme4" class="form-label" required>Version</label>
                  <input type="text" class="form-control" id="inputNanme4" name="version" value="{{$data->version}}" required placeholder="Enter application version">
                </div>
                <div class="col-12">
                  <label for="inputAddress" class="form-label">Image</label>
                  <input type="file" class="form-control" id="inputAddress" name="image" value="{{$data->image}}"   placeholder="Enter application tagline">
                  <img src="{{asset('upload/images/'.$data->image)}}" alt="" style="width:10%">              
                  </div>
                <div class="col-12">
                  <label for="inputAddress" class="form-label">Tagline</label>
                  <input type="text" class="form-control" id="inputAddress" name="tagline"value="{{$data->tagline}}" required placeholder="Enter application tagline">
                </div>
        <div class="card">
            <div class="card-body">
              <h5 class="card-title">Enter application overview</h5>

              <!-- TinyMCE Editor -->
              <textarea class="tinymce-editor" name="description"  required>
              {{$data->description}}
              </textarea><!-- End TinyMCE Editor -->

            </div>
          </div>
          <div class="col-12">
                  <label for="inputNanme4" class="form-label">File URL</label>
                  <input type="text" class="form-control" name="file_url" id="inputNanme4" value="{{$data->file_url}}" required  placeholder="Enter application file url">
                </div>
                <div class="text-center">
                    <h1 class="card-title">Seo Section</h1>
                </div>
                <div class="col-12">
                  <label for="inputNanme4" class="form-label">Meta title</label>
                  <input type="text" class="form-control" name="meta_title" id="inputNanme4" value="{{$data->meta_title}}" required placeholder="Enter application meta title">
                </div>
                <div class="col-12">
                  <label for="inputNanme4" class="form-label">Meta description</label>
                  <input type="text" class="form-control" id="inputNanme4" name="meta_desc" value="{{$data->meta_desc}}" required placeholder="Enter application meta description">
                </div>
                <div class="col-12">
                  <label for="inputNanme4" class="form-label">Meta Keyword</label>
                  <input type="text" class="form-control" id="inputNanme4" name="meta_keyword" value="{{$data->meta_keyword}}" required placeholder="Enter application meta keyword">
                </div>
                @endforeach
                <div class="text-left">
                  <button type="submit" class="btn btn-primary">Submit</button>
                </div>
              </form><!-- Vertical Form -->

            </div>
          </div>
@endsection