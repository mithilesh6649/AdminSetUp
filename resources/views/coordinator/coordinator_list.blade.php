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
        <h3>Coordinator</h3>
        <div style="height: 41px;"></div>
      </div>
      <div class="card-body">
        @if (session('status'))
        <div class="alert alert-success" role="alert">
          {{ session('status') }}
        </div>
        @endif

        {{--
          <!-- <table style="width:100%" id="admins-list" class="table table-bordered table-hover">
          <thead>
            <tr>
              <th class="display-none"></th>
              <th>Sr.No.</th>
              <th>Image</th>
              <th>Email</th>
              <th>Name & Affiliation</th>
              <th>Country</th>
              <th>Created at</th>
              <th>Status</th>
              @if(Gate::check('view_coordinator') || Gate::check('edit_coordinator') || Gate::check('delete_coordinator') )
              <th>{{ __('adminlte::adminlte.actions') }}</th>
        @endif
        </tr>
        </thead>
        <tbody>
          <?php //for ($i = 0; $i < count((is_countable($coordinatorlist) ? $coordinatorlist : [])); $i++) {
          //$role = \App\Models\Role::where('id', $coordinatorlist[$i]->role_id)->get();
          ?>
          <tr>
            <td class="display-none"></td>
            <td>{{ $i + 1 }}</td>
            <td>
              <img src="{{ Str::replaceLast('index.php', '', url('/')).$coordinatorlist[$i]->profile_image }}" alt="image">
            </td>
            <td>{{ $coordinatorlist[$i]->email }}</td>
            <td>{{ $coordinatorlist[$i]->name_and_affiliation ?? 'N/A' }}</td>
            <td>{{ ucfirst($coordinatorlist[$i]->getcountry->country_name) ?? 'N/A' }}</td>
            <td>{{ Carbon\Carbon::parse($coordinatorlist[$i]->created_at)->format('d/m/Y') }} </td>
            <td><span class="text-center {{$coordinatorlist[$i]->status==1?'text-info':'text-danger'}}">{{$coordinatorlist[$i]->status==1?'Active':'Inactive'}}</span></td>
            @if(Gate::check('view_coordinator') || Gate::check('edit_coordinator') || Gate::check('delete_coordinator') )
            <td>
              @can('view_coordinator')
              <a class="action-button" title="View" href="{{route('coordinator.view',base64_encode($coordinatorlist[$i]->id))}}"><i class="text-info fa fa-eye"></i></a>
              @endcan
              @can('edit_coordinator')
              <a title="Edit" href="{{ route('coordinator.edit', ['id' => base64_encode($coordinatorlist[$i]->id)]) }}"><i class="text-warning fa fa-edit"></i></a>
              @endcan
              @can('delete_coordinator')
              <a class="action-button delete-button" title="Delete" href="javascript:void(0)" data-id="{{ $coordinatorlist[$i]->id}}"><i class="text-danger fa fa-trash"></i></a>
              @endcan
            </td>
            @endif
          </tr>
          <?php //} 
          ?>
        </tbody>
        <tfoot>
          <tr>
            <th></th>
            <th>{{ __('adminlte::adminlte.name') }}</th>
            <th>{{ __('adminlte::adminlte.email') }}</th>

            <th>{{ __('adminlte::adminlte.actions') }}</th>
          </tr>
        </tfoot>
        </table> -->
        --}}

        <!-- Server Side Pagination and Search -->
        <table class="table table-bordered data-table table-hover" style="width:100%" id="admins-list">
          <thead>
            <tr>
              <th>Sr.No.</th>
              <th>Image</th>
              <th>Email</th>
              <th>Name & Affiliation</th>
              <th>Country</th>
              <th>Created at</th>
              <th>Status</th>
              <th width="100px">Action</th>
            </tr>
          </thead>

          <tbody>
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
  // $(document).ready(function() {
  //Server Side pagination Example
  var table = $('.data-table').DataTable({
    processing: true,
    serverSide: true,
    ajax: "{{ route('coordinator.list') }}",
    columns: [{
        data: 'DT_RowIndex',
        name: 'serial_number'
      },
      {
        data: 'image',
        name: 'image'
      },
      {
        data: 'email',
        name: 'email'
      },
      {
        data: 'name_and_affiliation',
        name: 'name_and_affiliation'
      },
      {
        data: 'country',
        name: 'country'
      },
      {
        data: 'created_at',
        name: 'created_at'
      },
      {
        data: 'status',
        name: 'status'
      },
      {
        data: 'action',
        name: 'action',
        orderable: false,
        searchable: false
      },
    ]
  });


  // $('#admins-list').DataTable({
  //   stateSave: true,
  //   columnDefs: [{
  //     targets: 0,
  //     render: function(data, type, row) {
  //       return data.substr(0, 2);
  //     }
  //   }]
  // });
  // });


  function deleteCoordinator(id) {
    swal({
      title: "Are you sure?",
      text: "Are you sure you want to move this Coordinator to the Recycle Bin?",
      type: "warning",
      showCancelButton: true,
    }, function(willDelete) {
      if (willDelete) {
        $.ajax({
          url: "{{route('delete_coordinator')}}",
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
              $('#flash-message').html('Coordinator Deleted Successfully');
              table.ajax.reload();
              setTimeout(() => {
                $("#flash-message").addClass("d-none");
              }, 5000);

            } else if (response.success == 2) {
              $("#flash-message").css("display", "block");
              $("#flash-message").removeClass("d-none");
              $("#flash-message").addClass("alert-danger");
              $('#flash-message').html('Coordinator could not deleted');
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
  }

  //Without Server Side
  /*
  $('.delete-button').click(function(e) {
    var id = $(this).attr('data-id');
    var obj = $(this);
    swal({
      title: "Are you sure?",
      text: "Are you sure you want to move this Coordinator to the Recycle Bin?",
      type: "warning",
      showCancelButton: true,
    }, function(willDelete) {
      if (willDelete) {
        $.ajax({
          url: "{{route('delete_coordinator')}}",
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
              $('#flash-message').html('Coordinator Deleted Successfully');
              obj.parent().parent().remove();
              setTimeout(() => {
                $("#flash-message").addClass("d-none");
              }, 5000);

            } else if (response.success == 2) {
              $("#flash-message").css("display", "block");
              $("#flash-message").removeClass("d-none");
              $("#flash-message").addClass("alert-danger");
              $('#flash-message').html('Coordinator could not deleted');
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
  */
</script>
@stop