@extends('adminlte::page')

@section('title', 'Admins')

@section('content_header')
@stop

@section('content')
<div class="row">
  <div class="col-md-12">
    <!-- <div class="alert d-none" id="flash-message"></div> -->
      <div class="card">
        <div class="card-header alert d-flex justify-content-between align-items-center">
          <h3>{{ __('adminlte::adminlte.admins') }}</h3>
          @can('add_admin')<a class="btn btn-sm btn-success" href="add">Add Admin</a>@endcan
        </div>           
        <div class="card-body">
          @if (session('status'))
            <div class="alert alert-success" role="alert">
              {{ session('status') }}
            </div>
          @endif
          <!-- <div class="main-title">
            <h5 class="text-center mb-4">Total Admins: {{count($adminsList)}}</h5>
          </div> -->
          <table style="width:100%" id="admins-list" class="table table-bordered table-hover">
            <thead>
              <tr>
                <th class="display-none"></th>
                 <th>Sr.No.</th>
                 <th style="width: 100%;">{{ __('adminlte::adminlte.name') }}</th>
                 <th>{{ __('adminlte::adminlte.email') }}</th>
                 <th>Role</th>
                 <th>Status</th>
                @can('manage_admin_action')<th>{{ __('adminlte::adminlte.actions') }}</th>@endcan
              </tr>
            </thead>
            <tbody>
              <?php for ($i=0; $i < count((is_countable($adminsList)?$adminsList:[])); $i++) { 
                $role = \App\Models\Role::where('id', $adminsList[$i]->role_id)->get();
                ?>
                <tr>
                  <td class="display-none"></td>
                  <td>{{ $i + 1 }}</td>
                  <td>{{ $adminsList[$i]->first_name." ".$adminsList[$i]->last_name  }}</td>
                  <td>{{ $adminsList[$i]->email }}</td>
                  <td>{{ count($role)>0?$role[0]->name:'' }}</td>
                  <td><span class="text-center {{$adminsList[$i]->status==1?'text-info':'text-danger'}}">{{$adminsList[$i]->status==1?'Active':'Inactive'}}</span></td>
                  @can('manage_admin_action')
                    <td>
                      @can('view_admin')
                        <a class="action-button" title="View" href="view/{{$adminsList[$i]->id}}"><i class="text-info fa fa-eye"></i></a>
                      @endcan
                      @can('edit_admin')
                        <a class="action-button" title="Edit" href="edit/{{$adminsList[$i]->id}}"><i class="text-warning fa fa-edit"></i></a>
                      @endcan
                      @can('delete_admin')
                        <a class="action-button delete-button" title="Delete" href="javascript:void(0)" data-id="{{ $adminsList[$i]->id}}"><i class="fa fa-trash" aria-hidden="true"></i></a>
                      @endcan
                    </td>
                  @endcan
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

@section('css')
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.css">
@stop

@section('js')
  <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.js"></script>
  <script type="text/javascript" src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
  <script>
     $(document).ready(function() {
      $('#admins-list').DataTable( {
        stateSave: true,
        columnDefs: [ {
          targets: 0,
          render: function ( data, type, row ) {
            return data.substr( 0, 2 );
          }
        }]
      });
    });
    
    $('.delete-button').click(function(e) {
   
      var id = $(this).attr('data-id');
      var obj = $(this);
      // console.log({id});
      swal({
        title: "Are you sure?",
        text: "Are you sure you want to move this Admin to the Recycle Bin?",
        type: "warning",
        showCancelButton: true,
      }, function(willDelete) {
        if (willDelete) {
          $.ajax({
            url: "{{ route('delete_admin') }}",
            type: 'post',
            data: {
              id: id
            },
            dataType: "JSON",
            headers: {
              'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            success: function(response) {
              console.log("Response", response);
              if(response.success == 1) {
           
                /* console.log("response", response);*/
                $( "#flash-message" ).css("display","block");
                $( "#flash-message" ).removeClass("d-none");
                $( "#flash-message" ).addClass("alert-danger");
                $('#flash-message').html('Admin Deleted Successfully');
                obj.parent().parent().remove();
                setTimeout(() => {
                $( "#flash-message" ).addClass("d-none");
                }, 5000);

              }
              else {
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
  </script>
@stop
