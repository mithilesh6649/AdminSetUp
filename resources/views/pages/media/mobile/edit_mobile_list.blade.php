@extends('adminlte::page')

@section('title', 'media website')

@section('content_header')
@stop

@section('content')
@if (session('status'))
<div class="alert alert-success" role="alert">
  {{ session('status') }}
  <a href="javascript:void(0)" id="close_button" class="float-right text-white close_button">X</a>
</div>
@endif
<div class="row">
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
              <th>Section Name</th>
              <th>Light Image</th>
              <th>Dark Image</th>
              <th>Width x Height</th>
              <th>Actions</th>
            </tr>
          </thead>
          <tbody>
            @forelse($mediawebseclist as $media)
            <tr>
              <td class="display-none"></td>
              <td>{{$media->section_name}}</td>
              <td>
                <img  src="{{asset('assets/media/'.$media->light_image)}}" alt="" class="view_image" data-image="{{asset('assets/media/'.$media->light_image)}}">
              </td>
              <td>
                <img  src="{{asset('assets/media/'.$media->dark_image)}}" alt="" class="view_image" data-image="{{asset('assets/media/'.$media->dark_image)}}">
              </td>
              <td>{{$media->image_width.' x '.$media->image_height}}</td>

              <td>
                <!-- <a href="javascript:void(0)"  title="View"><i class="text-info fa fa-eye"></i></a> -->
                <a href="{{ route('media.mobile.edit', ['id' =>base64_encode($media->id)]) }}" title="Edit"><i class="text-warning fa fa-edit"></i></a>
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
<div class="modal fade" id="ediaviewimage" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Media Mobile</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div >
          <img src="" id="put_me" width="100%" height="100%">
        </div>
      </div>
      <div class="modal-footer">

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
  $(document).ready(function() {
    $('#pages-list').DataTable({
      stateSave: true,
      columnDefs: [{
        targets: 0,
        render: function(data, type, row) {
          return data.substr(0, 2);
        }
      }]
    });

    $(".view_image").click(function() {
      src = $(this).data('image');
      $("#put_me").attr("src", src);
      $("#ediaviewimage").modal('show');
    });
  });
</script>
@stop