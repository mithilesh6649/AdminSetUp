@extends('adminlte::page')

@section('title', 'Blogs')

@section('content_header')
@stop

@section('content')
<div class="row">
  <div class="col-md-12">
    <div class="alert d-none" id="flash-message"></div>
    <div class="card">
      <div class="card-header alert d-flex justify-content-between align-items-center">
        <h3>Blogs</h3>
        <div style="height: 41px;"></div>
        <a class="btn btn-sm btn-success" href="{{ route('add_blogs') }}">Add</a>
      </div>

      <div class="card-body">
        @if (session('status'))
        <div class="alert alert-success" role="alert">
          {{ session('status') }}
        </div>
        @endif

        <table style="width:100%" id="admins-list" class="table table-bordered table-hover">
          <thead>
            <tr>
              <th>Sr.No.</th>
              <th>Title</th>
              <th>Description</th>
              <th>{{ __('adminlte::adminlte.actions') }}</th>
            </tr>
          </thead>
          <tbody>
            @forelse ($bloglist as $blog)
              <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $blog->title }}</td>

                <td>{!! $blog->description !!} </td>
               
                <td>
                
                  <a title="Edit" href="{{ route('blogs.edit', ['id' => base64_encode($blog->id)]) }}"><i class="text-warning fa fa-edit"></i></a>
               
                  <a class="action-button delete-button" title="Delete" href="javascript:void(0)" data-id="{{ $blog->id}}"><i class="text-danger fa fa-trash"></i></a>
                 
                </td>
              </tr>
            @empty

            @endforelse
          </tbody>
          <tfoot>
            <tr>
              <th>{{ __('adminlte::adminlte.name') }}</th>
              <th>{{ __('adminlte::adminlte.email') }}</th>
              <th>{{ __('adminlte::adminlte.actions') }}</th>
            </tr>
          </tfoot>
        </table>
      </div>
    </div>
  </div>
</div>
@endsection


@section('js')
<script type="text/javascript" src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
<script>
  $(document).ready(function() {
    $('#admins-list').DataTable({
      stateSave: true,
      columnDefs: [{
        targets: 0,
        render: function(data, type, row) {
          return data.substr(0, 2);
        }
      }]
    });
  });

  $('.delete-button').click(function(e) {
    var id = $(this).attr('data-id');
    var obj = $(this);
    swal({
      title: "Are you sure?",
      text: "Are you sure you want to move this Expertise to the Recycle Bin?",
      type: "warning",
      showCancelButton: true,
    }, function(willDelete) {
      if (willDelete) {
        $.ajax({
          url: "{{route('delete_blogs')}}",
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

              $("#flash-message").css("display", "block");
              $("#flash-message").removeClass("d-none");
              $("#flash-message").addClass("alert-danger");
              $('#flash-message').html('Blog Deleted Successfully');
              obj.parent().parent().remove();
              setTimeout(() => {
                $("#flash-message").addClass("d-none");
              }, 5000);

            } else if (response.success == 2) {
              $("#flash-message").css("display", "block");
              $("#flash-message").removeClass("d-none");
              $("#flash-message").addClass("alert-danger");
              $('#flash-message').html('Blog could not deleted');
              setTimeout(() => {
                $("#flash-message").addClass("d-none");
              }, 5000);
            } else {
              swal("Something went wrong! Please try again.");
            }
          }
        });
      }
    });

  });
</script>
@stop