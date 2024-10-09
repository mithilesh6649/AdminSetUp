@extends('adminlte::page')

@section('title', 'Deleted Brand')

@section('content_header')
@stop

@section('content')
<div class="alert d-none" id="flash-message">
  <a href="javascript:void(0)" id="close_button" class="float-right text-white close_button">X</a>
</div>
<div class="row">
  <div class="col-md-12">
    <div class="card">
      <div class="card-header alert d-flex justify-content-between align-items-center">
        <h3>Deleted Brand</h3>
        <a class="btn btn-sm btn-success invisible" href="{{ url()->previous() }}">{{ __('adminlte::adminlte.back') }}</a>
      </div>
      <div class="card-body">
        @if (session('status'))
        <div class="alert alert-success" role="alert">
          {{ session('status') }}
        </div>
        @endif
        <table style="width:100%" id="deletedCounties" class="table table-bordered table-hover">
          <thead>
            <tr>
              <th class="display-none"></th>
              <th>Brand Name</th>
              @if(Gate::check('restore_brands') && Gate::check('permanent_deleted_brands'))
              <th>{{ __('adminlte::adminlte.actions') }}</th>
              @endif
            </tr>
          </thead>
          <tbody>
            @forelse($deletebrand as $brand)
            <tr id="news_row_{{$brand->id}}">
              <td class="display-none"></td>
              <td>{{$brand->name}}</td>
              @if(Gate::check('restore_brands') && Gate::check('permanent_deleted_brands'))
              <td>
                @can('restore_brands')
                <a class="action-button restore-button" title="Restore" href="javascript:void(0)" data-id="{{ $brand->id}}"><i class="text-success fa fa-undo"></i></a>
                @endcan
                @can('permanent_deleted_brands')
                <a class="action-button remove-button" title="Permanent Delete" href="javascript:void(0)" data-id="{{ $brand->id}}"><i class="text-danger fa fa-trash"></i></a>
                @endcan
              </td>
              @endif

            </tr>
            @empty
            @endforelse
          </tbody>

        </table>
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
    $('#deletedCounties').DataTable({
      stateSave: true,
      columnDefs: [{
        targets: 0,
        render: function(data, type, row) {
          return data.substr();
        }
      }]
    });
  });


  $('.restore-button').click(function(e) {
    var id = $(this).attr('data-id');
    var obj = $(this);
    swal({
      title: "Are you sure?",
      text: "Are you sure you want to restore this Brand?",
      type: "warning",
      showCancelButton: true,
    }, function(willDelete) {
      if (willDelete) {
        $.ajax({
          url: "{{route('brand.deleted.restore')}}",
          type: 'post',
          data: {
            id: id
          },
          dataType: "JSON",
          headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          },
          success: function(response) {
            if (response.success == 1) {
              $("#news_row_" + id).remove();
              $("#flash-message").removeClass("d-none");
              $("#flash-message").addClass("alert-success");
              $("#flash-message").css("display", "block");
              $("#flash-message").text("Restored Successfully");
              setTimeout(function() {
                $("#flash-message").css("display", "none");
              }, 4000);
            } else {
              console.log("FALSE");
              setTimeout(() => {
                alert("Something went wrong! Please try again.");
              }, 500);
              // swal("Error!", "Something went wrong! Please try again.", "error");
              // swal("Something went wrong! Please try again.");
            }

          }
        });
      }
    });
  });



  $('.remove-button').click(function(e) {
    var id = $(this).attr('data-id');
    var obj = $(this);
    swal({
      title: "Are you sure?",
      text: "Are you sure you want to Permanently Delete this Record?",
      type: "warning",
      showCancelButton: true,
    }, function(willDelete) {
      if (willDelete) {
        $.ajax({
          url: "{{route('brand.deleted.deletepermanent')}}",
          type: 'post',
          data: {
            id: id
          },
          dataType: "JSON",
          headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          },
          success: function(response) {
            if (response.success == 1) {
              $("#news_row_" + id).remove();
              $("#flash-message").removeClass("d-none");
              $("#flash-message").addClass("alert-danger");
              $("#flash-message").css("display", "block");
              $("#flash-message").text("Deleted Successfully");
              setTimeout(function() {
                $("#flash-message").css("display", "none");
              }, 4000);
              console.log("response", response);
              obj.parent().parent().remove();
            } else {
              console.log("FALSE");
              setTimeout(() => {
                alert("Something went wrong! Please try again.");
              }, 500);
            }
          }
        });
      }
    });
  });
</script>
@stop