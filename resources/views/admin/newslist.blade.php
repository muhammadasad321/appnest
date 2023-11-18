@extends('admin.layout')

@section('admin.newslist')
<table class="table">
@if(session('update-news'))
  <div class="alert alert-success alert-dismissible fade show" role="alert">
{{session('update-news')}}

<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
              </div>
              @endif
  
              @if(session('delete'))
  <div class="alert alert-success alert-dismissible fade show" role="alert">
{{session('delete')}}
<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
              </div>
              @endif
              @if(session('add'))
  <div class="alert alert-success alert-dismissible fade show" role="alert">
{{session('add')}}
<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
              </div>
              @endif
                <thead>
                  <tr>
                    <th scope="col">ID No.</th>
                    <th scope="col">title</th>
                    <th scope="col">auhtor name</th>
                    <th scope="col">Image</th>
                    <th scope="col">Action</th>
                    <th scope="col">Status</th>

                    

                  </tr>
                </thead>
                <tbody>
                @foreach($NewsList as $data)

                  <tr>
                    <th scope="row">{{$data->id}}</th>
                    <td>{{$data->title}}</td>
                    <td>{{$data->author_name}}</td>
                   
                    <td style="overflow: hidden;width:10%;
    object-fit: contain;
    -o-object-fit: contain;"><img src="{{asset('upload/news/'.$data->image)}}" alt="" class="rounded" style="width:100%"></td>


                    <td>   <div class="btn-group" role="group" aria-label="Basic mixed styles example">
              <a href="{{url('admin/newsdelete',$data->id)}}"><button type="button" class="btn btn-danger">Delete</button></a>
              <a href="{{url('admin/newsedit',$data->id)}}"><button type="button" class="btn btn-warning">Edit</button></a>
 
            </div>
</td>
<td>              <a href="{{url('admin/newsstatus',$data->id)}}"><button type="button" class="btn btn-{{$data->status ? 'success' : 'danger'}}">{{$data->status ? 'Active' : 'Deactive'}}</button></a>
</td>
                  </tr>
                  @endforeach
                 
                </tbody>
              </table>
@endsection