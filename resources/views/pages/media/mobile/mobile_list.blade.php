@extends('adminlte::page')

@section('title', 'media mobile')

@section('content_header')
@stop

@section('content')
<div class="">
  <div class="row justify-content-center">
    <div class="col-md-12">
        <div class="card">
          <div class="card-header alert d-flex justify-content-between align-items-center">
            <h3>Media Mobile</h3>
            <a class="btn btn-sm btn-success back-button" href="{{ url()->previous() }}">{{ __('adminlte::adminlte.back') }}</a>
            
          </div>
          <div class="card-body">
            <table style="width:100%" id="pages-list" class="table table-bordered table-hover">
              <thead>
                <tr>
                  <th class="display-none"></th>
                  <th>Page</th>
                   <th>Actions</th>
                </tr>
              </thead>
              <tbody>
                @forelse($mediamobilelist as $media)
                 <tr>
                   <td class="display-none"></td>
                   <td>{{$media->page_name}}</td>
                   <td>
                      <a href="{{ route('media.mobile.editlist', ['slug' => $media->page_slug]) }}" title="Edit"><i class="text-warning fa fa-edit"></i></a>
                  </td>
                 </tr> 
                @empty
                  <tr>
                    <td colspan="3">No data available in table</td>
                  </tr>
                @endforelse
                
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
