@extends('adminlte::page')

@section('title', 'Mobile Pages')

@section('content_header')
@stop

@section('content')
<div class="">
  <div class="row justify-content-center">
    <div class="col-md-12">
        <div class="card">
          <div class="card-header alert d-flex justify-content-between align-items-center">
            <h3>Mobile Home</h3>
            {{-- @can('add_mobile_page')<a class="btn btn-success" href="{{ route('add_mobile_page') }}">Create Mobile Page</a>@endcan --}}
          </div>
          <div class="card-body">
            <table style="width:100%" id="pages-list" class="table table-bordered table-hover">
              <thead>
                <tr>
                  <th class="display-none"></th>
                  <th>Title</th>
                  <th>Description</th>
                  <th>Light Image</th>
                  <th>Dark Image</th>
                  <th>Actions</th>
                </tr>
              </thead>
              <tbody>
                @foreach($homelistdata as $list)
                 <tr>
                   <td class="display-none"></td>
                   <td>{{$list->title}}</td>
                   <td>{{substr($list->description, 0,50) .'...'}}</td>
                   <td><img id="image_pre" src="{{asset('assets/mobile/'.$list->light_image)}}" alt="" class="view_full{{$list->id}}"></td>
                   <td><img id="image_pre" src="{{asset('assets/mobile/'.$list->dark_image)}}" alt="" class="view_full{{$list->id}}"></td>
                   <td>
                      <a href="{{route('mobile-home.view',base64_encode($list->id))}}" title="View"><i class="text-info fa fa-eye"></i></a>
                      <a href="javascript:void(0)" title="Edit"><i class="text-warning fa fa-edit"></i></a>
                  </td>
                 </tr>
                @endforeach
              </tbody>
            </table>
          </div>
        </div>
      </div>
  </div>
</div>
@endsection

@section('css')
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.css">
@stop

@section('js')
  <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.js"></script>
  <script type="text/javascript" src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
  <script>
    $('#pages-list').DataTable( {
      stateSave: true,
      columnDefs: [ {
        targets: 0,
        render: function ( data, type, row ) {
          return data.substr( 0, 2 );
        }
      }]
    });
  </script>
@stop
