@extends('admin.layout')

@section('admin.newsedit')
<div class="card">
            <div class="card-body">
              <h5 class="card-title">Add News</h5>

              <!-- Vertical Form -->
              <form class="row g-3" action="{{url('admin/newsupdate')}}" method="post" enctype="multipart/form-data">

              @csrf
              @foreach($data as $data)
<input type="hidden" name="id" value="{{$data->id}}">
                <div class="col-12">
                  <label for="inputNanme4" class="form-label">News Title</label>
                  <input type="text" class="form-control" id="inputNanme4" name="title" value="{{$data->title}}"  placeholder="Enter News Title">
                </div>
                <div class="col-12">
                  <label class="col-sm-2 col-form-label">Select Author</label>
                  <div class="col-sm-12">
                    <select class="form-select" name="author_id" aria-label="Default select example" required>
                      <option  value="{{$data->author_id}}">{{$data->author_name}}</option>

                      @foreach($AuthorList as $list)
                      <option value="{{$list->id}}">{{$list->name }}</option>
                     @endforeach
                    </select>
                  </div>
                <div class="col-12">
                  <label for="inputAddress" class="form-label">Image</label>
                  <input type="file" class="form-control" id="inputAddress" name="image"  value="{{$data->image}}"  >
                  <img src="{{asset('upload/news/'.$data->image)}}" alt="" style="width:10%">              

                </div>
                <div class="card">
            <div class="card-body">
              <h5 class="card-title">Enter News Article</h5>

              <!-- TinyMCE Editor -->
              <textarea class="tinymce-editor" name="article"  required>
               {{$data->article}}
              </textarea><!-- End TinyMCE Editor -->

            </div>
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
                <div class="text-left">
                  <button type="submit" class="btn btn-primary">Submit</button>
                </div>
                @endforeach
              </form><!-- Vertical Form -->

            </div>
          </div>


@endsection