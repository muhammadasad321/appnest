@extends('admin.layout')

@section('admin.searchlist')

<table class="table">
   
<thead>
                  <tr>
                    <th scope="col">ID No.</th>
                    <th scope="col">Query</th>
                    <th scope="col">Date of Search</th>

                    <th scope="col">Action</th>
                  

                    

                  </tr>
                </thead>
                <tbody>
                @foreach($SearchList as $data)

                  <tr>
                    <th scope="row">{{$data->id}}</th>
                    <td>{{$data->search}}</td>
                    <td>{{$data->updated_at}}</td>

                   
                     <td>   <div class="btn-group" role="group" aria-label="Basic mixed styles example">
              <a href="{{url('admin/searchdelete',$data->id)}}"><button type="button" class="btn btn-danger">Delete</button></a>
 
            </div>
</td>

                  </tr>
                  @endforeach
                 
                </tbody>
              </table>
@endsection