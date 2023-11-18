@extends('admin.layout')

@section('admin.reviewlist')

<table class="table">
    @if(session('delete'))
<div class="alert alert-success alert-dismissible fade show" role="alert">
{{session('delete')}}
<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
              </div>
              @endif
<thead>
                  <tr>
                    <th scope="col">ID No.</th>
                    <th scope="col">post slug</th>
                    <th scope="col">Name</th>
                    <th scope="col">Email</th>
                    <th scope="col">Review</th>
                    <th scope="col">Action</th>
                  

                    

                  </tr>
                </thead>
                <tbody>
                @foreach($ReviewList as $data)

                  <tr>
                    <th scope="row">{{$data->id}}</th>
                    <td>{{$data->post_id}}</td>
                    <td>{{$data->name}}</td>
                    <td>{{$data->email}}</td>
                     <td>{{$data->review}}</td>
                     <td>   <div class="btn-group" role="group" aria-label="Basic mixed styles example">
              <a href="{{url('admin/reviewdelete',$data->id)}}"><button type="button" class="btn btn-danger">Delete</button></a>
 
            </div>
</td>

                  </tr>
                  @endforeach
                 
                </tbody>
              </table>
@endsection