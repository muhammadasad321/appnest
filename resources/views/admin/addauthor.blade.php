@extends('admin.layout')

@section('admin.addauthor')
<div class="card">
            <div class="card-body">
              <h5 class="card-title">Add Author</h5>

              <!-- Vertical Form -->
              <form class="row g-3" action="{{url('admin/storeauthor')}}" methor="post">
                <div class="col-12">
                  <label for="inputNanme4" class="form-label">Author Name</label>
                  <input type="text" class="form-control" name="author" id="inputNanme4" placeholder="Enter Author Name">
                </div>
                
                
                
                <div class="text-left">
                  <button type="submit" class="btn btn-primary">Submit</button>
                </div>
              </form><!-- Vertical Form -->

            </div>
          </div>

@endsection