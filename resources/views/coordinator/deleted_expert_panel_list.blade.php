@extends('adminlte::page')

@section('title', 'Deleted Expert Panel')

@section('content_header')
@stop

@section('content')
<div class="alert d-none" id="flash-message"></div>
<div class="row">
  <div class="col-md-12">
    <div class="card">
      <div class="card-header alert d-flex justify-content-between align-items-center">
        <h3>Deleted Expert Panels</h3>
        <a class="btn btn-sm btn-success invisible" href="{{ url()->previous() }}">{{ __('adminlte::adminlte.back') }}</a>
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
              <th class="display-none"></th>
              <th>Sr.No.</th>
              <th>Panel Name</th>
              <th>Panel Status</th>
              <th>Total Expert</th>
              <th>Created at</th>
              <th>Status</th>
              @if(Gate::check('restore_expert_panel') || Gate::check('permanent_deleted_expert_panel'))
              <th>{{ __('adminlte::adminlte.actions') }}</th>
              @endif
            </tr>
          </thead>
          <tbody>
            <?php for ($i = 0; $i < count((is_countable($expert_panels) ? $expert_panels : [])); $i++) { ?>
              <tr id="admin_row_{{ $expert_panels[$i]->id }}">
                <th class="display-none"></th>
                <td>{{ $i + 1 }}</td>
                <td>{{ $expert_panels[$i]->panel_name?? 'N/A' }}</td>
                <td>{{ ucfirst($expert_panels[$i]->ep_status) }}</td>
                <td>{{ $expert_panels[$i]->expert_panel_count }}</td>

                <td>{{ Carbon\Carbon::parse($expert_panels[$i]->created_at)->format('d/m/Y') }} </td>
                <td><span class="text-center {{$expert_panels[$i]->status==1?'text-info':'text-danger'}}">{{$expert_panels[$i]->status==1?'Active':'Inactive'}}</span></td>

                @if(Gate::check('restore_expert_panel') || Gate::check('permanent_deleted_expert_panel'))
                <td>
                  @can('restore_expert_panel')
                  <a class="action-button restore-button" title="Restore" href="javascript:void(0)" data-id="{{ $expert_panels[$i]->id}}"><i class="text-success fa fa-undo"></i></a>
                  @endcan
                  @can('permanent_deleted_expert_panel')
                  <a class="action-button remove-button" title="Permanent Delete" href="javascript:void(0)" data-id="{{ $expert_panels[$i]->id}}"><i class="text-danger fa fa-trash"></i></a>
                  @endcan
                </td>
                @endif
              </tr>
            <?php } ?>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>
@endsection



@section('js')

<script type="text/javascript" src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
<script>
  $('#admins-list').DataTable({
    stateSave: true,
    columnDefs: [{
      targets: 0,
      render: function(data, type, row) {
        return data.substr(0, 2);
      }
    }],

    //Hide pagination when 0 records
    drawCallback: function(settings) {
      var table = settings.oInstance.api();
      var recordsTotal = table.page.info().recordsTotal;
      if (recordsTotal === 0) {
        $('.dataTables_paginate').hide();
      } else {
        $('.dataTables_paginate').show();
      }
    }
  });

  $('.restore-button').click(function(e) {
    var id = $(this).attr('data-id');
    var obj = $(this);
    swal({
      title: "Are you sure?",
      text: "Are you sure you want to restore the Expert Panel?",
      type: "warning",
      showCancelButton: true,
    }, function(willDelete) {
      if (willDelete) {
        $.ajax({
          url: "{{ route('expert.panel.deleted.restore') }}",
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
              $("#admin_row_" + id).remove();
              $("#flash-message").removeClass("d-none");
              $("#flash-message").addClass("alert-success");
              $("#flash-message").css("display", "block");
              $("#flash-message").text("Restored Successfully");
              setTimeout(function() {
                $("#flash-message").css("display", "none");
              }, 4000);
            } else {
              swal("Error!", "Something went wrong! Please try again.", "error");
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
          url: "{{ route('permanent_delete_expert_panel') }}",
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
              $("#admin_row_" + id).remove();
              $("#flash-message").removeClass("d-none");
              $("#flash-message").addClass("alert-danger");
              $("#flash-message").css("display", "block");
              $("#flash-message").text("Deleted Successfully");
              setTimeout(function() {
                $("#flash-message").css("display", "none");
              }, 4000);
            } else {
              swal("Error!", "Something went wrong! Please try again.", "error");
            }
          }
        });
      }
    });
  });
</script>
@stop