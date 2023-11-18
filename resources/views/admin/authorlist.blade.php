@extends('admin.layout')

@section('admin.authorlist')

<table class="table">
    @if(session('add-author'))
<div class="alert alert-success alert-dismissible fade show" role="alert">
{{session('add-author')}}
<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
              </div>
              @endif
              @if(session('delete'))
<div class="alert alert-success alert-dismissible fade show" role="alert">
{{session('delete')}}
<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
              </div>
              @endif
<thead>
                  <tr>
                    <th scope="col">ID No.</th>
                    <th scope="col">Author Name</th>
                    <th scope="col">Action</th>
                  

                    

                  </tr>
                </thead>
                <tbody>
                @foreach($AuthorList as $data)

                  <tr>
                    <th scope="row">{{$data->id}}</th>
                    <td>{{$data->author}}</td>
                   
                     <td>   <div class="btn-group" role="group" aria-label="Basic mixed styles example">
              <a href="{{url('admin/authordelete',$data->id)}}"><button type="button" class="btn btn-danger">Delete</button></a>
 
            </div>
</td>

                  </tr>
                  @endforeach
                 
                </tbody>
              </table>
@endsection