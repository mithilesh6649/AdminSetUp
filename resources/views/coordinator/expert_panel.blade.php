@extends('adminlte::page')

@section('title', 'Coordinator')

@section('content_header')
@stop

@section('content')
<div class="row">
  <div class="col-md-12">
    <!-- <div class="alert d-none" id="flash-message"></div> -->
    <div class="card">
      <div class="card-header alert d-flex justify-content-between align-items-center">
        <h3>View Panel List</h3>
        <div style="height: 41px;"></div>
        <h3><span style="color: #4b2f60;">COORDINATOR: </span> <a style="border:none; padding:0; background:none;font-size:18px;font-weight:600;color:#000000;" href="{{route('coordinator.view',['id' => Request::segment(4)])}}">{{$coordinator->name_and_affiliation}}</a></h3>

      </div>
      <div class="card-body">
        @if (session('status'))
        <div class="alert alert-success" role="alert">
          {{ session('status') }}
        </div>
        @endif

        <div class="row mb-5">
          <nav>
            <div class="nav nav-tabs" role="tablist">

              <a class="nav-link" href="{{route('coordinator.view',['id' => Request::segment(4)])}}">
                <svg width="20" height="27" viewBox="0 0 1024 1024" xmlns="http://www.w3.org/2000/svg">
                  <path fill="currentColor" d="M288 320a224 224 0 1 0 448 0 224 224 0 1 0-448 0zm544 608H160a32 32 0 0 1-32-32v-96a160 160 0 0 1 160-160h448a160 160 0 0 1 160 160v96a32 32 0 0 1-32 32z" />
                </svg>
                Coordinator Details
              </a>


              <a class="nav-link" href="{{route('coordinator.expert_list',['id' => Request::segment(4)])}}">
                <svg width="20" height="27" viewBox="0 0 1024 1024" xmlns="http://www.w3.org/2000/svg">
                  <path fill="currentColor" d="M288 320a224 224 0 1 0 448 0 224 224 0 1 0-448 0zm544 608H160a32 32 0 0 1-32-32v-96a160 160 0 0 1 160-160h448a160 160 0 0 1 160 160v96a32 32 0 0 1-32 32z" />
                </svg>
                Expert List
              </a>

              <a class="nav-link active" href="{{route('coordinator.panel_list',['id' => Request::segment(4)])}}">
                <svg fill="#000000" width="20" height="27" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                  <path d="M15.991 2H7.97897C7.44774 2 6.93827 2.21071 6.56263 2.58579C6.187 2.96086 5.97596 3.46957 5.97596 4H14.9895V9H19.997V20H5.97596C5.97596 20.5304 6.187 21.0391 6.56263 21.4142C6.93827 21.7893 7.44774 22 7.97897 22H19.997C20.5282 22 21.0377 21.7893 21.4133 21.4142C21.789 21.0391 22 20.5304 22 20V8L15.991 2Z" />
                  <path d="M13.0165 12.46H8.00901V18H13.0165V12.46Z" />
                  <path d="M13.0165 6H2V11.54H13.0165V6Z" />
                  <path d="M7.00751 12.46H2V18H7.00751V12.46Z" />
                </svg>
                Panel List
              </a>

            </div>
          </nav>
        </div>


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

              @if(Gate::check('view_expert_panel') || Gate::check('edit_expert_panel') || Gate::check('delete_expert_panel') )
              <th>{{ __('adminlte::adminlte.actions') }}</th>
              @endif
            </tr>
          </thead>
          <tbody>

            <?php for ($i = 0; $i < count((is_countable($panellist) ? $panellist : [])); $i++) {
              $role = \App\Models\Role::where('id', $panellist[$i]->role_id)->get();
            ?>
              <tr>
                <td class="display-none"></td>
                <td>{{ $i + 1 }}</td>
                <td>{{ $panellist[$i]->panel_name?? 'N/A' }}</td>
                <td>{{ ucfirst($panellist[$i]->ep_status) }}</td>
                <td>{{ $panellist[$i]->expert_panel_count }}</td>

              <td>{{ Carbon\Carbon::parse($panellist[$i]->created_at)->format('d/m/Y') }} </td>
                <td><span class="text-center {{$panellist[$i]->status==1?'text-info':'text-danger'}}">{{$panellist[$i]->status==1?'Active':'Inactive'}}</span></td>

                @if(Gate::check('view_expert_panel') || Gate::check('edit_expert_panel') || Gate::check('delete_expert_panel') )
                <td>
                  @can('view_expert_panel')
                  <a class="action-button" title="View" href="{{ route('coordinator.view_expert_panel',['panel_id' => base64_encode($panellist[$i]->id),'id' =>Request::segment(4)]) }}"><i class="text-info fa fa-eye"></i></a>
                  @endcan
                  @can('edit_expert_panel')
                  <a title="Edit" href="{{ route('coordinator.edit_expert_panel',['panel_id' => base64_encode($panellist[$i]->id),'id' =>Request::segment(4)]) }}"><i class="text-warning fa fa-edit"></i></a>
                  @endcan
                  @can('delete_expert_panel')
                  <a class="action-button delete-button" title="Delete" href="javascript:void(0)" data-id="{{ $panellist[$i]->id}}"><i class="text-danger fa fa-trash"></i></a>
                  @endcan
                </td>
                @endif
              </tr>
            <?php } ?>
          </tbody>
          <tfoot>
            <tr>
              <th></th>
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
      text: "Are you sure you want to move this Expert Panel to the Recycle Bin?",
      type: "warning",
      showCancelButton: true,
    }, function(willDelete) {
      if (willDelete) {
        $.ajax({
          url: "{{route('delete_expert_panel')}}",
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
              $('#flash-message').html('Expert Panel Deleted Successfully');
              obj.parent().parent().remove();
              setTimeout(() => {
                $("#flash-message").addClass("d-none");
              }, 5000);

            } else if (response.success == 2) {
              $("#flash-message").css("display", "block");
              $("#flash-message").removeClass("d-none");
              $("#flash-message").addClass("alert-danger");
              $('#flash-message').html('Expert Panel could not deleted');
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