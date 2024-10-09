@extends('adminlte::page')

@section('title', 'Questionnaire')

@section('content_header')
@stop

@section('content')
<div class="row">
  <div class="col-md-12">
  <!-- <div class="alert d-none" id="flash-message"></div> -->
      <div class="card">
        <div class="card-header alert d-flex justify-content-between align-items-center">
          <h3>Questionnaire</h3>
          <div style="height: 41px;"></div>
          @can('add_questionnaire')  <a class="btn btn-sm btn-success" href="{{ route('add_questionnaire') }}">Add</a> @endcan
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
                 <th>Title</th>
                 <!-- <th>Created by</th> -->
                 <th>Created at</th>
                 <th>Status</th>
              
                 @if(Gate::check('view_questionnaire') || Gate::check('edit_questionnaire') || Gate::check('delete_questionnaire') )
                  <th>{{ __('adminlte::adminlte.actions') }}</th>
                 @endif
              </tr>
            </thead>
            <tbody>
              <?php for ($i=0; $i < count((is_countable($questionnairelist)?$questionnairelist:[])); $i++) { 
                $role = \App\Models\Role::where('id', $questionnairelist[$i]->role_id)->get();
                ?>
                <tr>
                  <td class="display-none"></td>
                  <td>{{ $i + 1 }}</td>
                  <td>{{ $questionnairelist[$i]->title ?? 'N/A' }}</td>
            
                  <!-- <td>{{ $questionnairelist[$i]->created_by ?? 'N/A' }}</td> -->
                  <td>{{ Carbon\Carbon::parse($questionnairelist[$i]->created_at)->format('d/m/Y') }} </td>
                  <td><span class="text-center {{$questionnairelist[$i]->status==1?'text-info':'text-danger'}}">{{$questionnairelist[$i]->status==1?'Active':'Inactive'}}</span></td>
                 
                  @if(Gate::check('view_questionnaire') || Gate::check('edit_questionnaire') || Gate::check('delete_questionnaire') )
                    <td>
                      @can('view_questionnaire')
                        <a class="action-button" title="View" href="{{route('questionnaire.view',base64_encode($questionnairelist[$i]->id))}}"><i class="text-info fa fa-eye"></i></a>
                      @endcan
                      @can('edit_questionnaire')
                        <a title="Edit" href="{{ route('questionnaire.edit', ['id' => base64_encode($questionnairelist[$i]->id)]) }}"><i class="text-warning fa fa-edit"></i></a>
                      @endcan
                      @can('delete_questionnaire')
                       <a class="action-button delete-button" title="Delete" href="javascript:void(0)" data-id="{{ $questionnairelist[$i]->id}}"><i class="text-danger fa fa-trash"></i></a>
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
          swal({
            title: "Are you sure?",
            text: "Are you sure you want to move this Questionnaire to the Recycle Bin?",
            type: "warning",
            showCancelButton: true,
          }, function(willDelete) {
            if (willDelete) {
              $.ajax({
                url: "{{route('delete_questionnaire')}}",
                type: 'post',
                data: {
                  id: id
                },
                dataType: "JSON",
                headers: {
                  'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                success: function(response) {
                  if(response.success == 1) {
                      
                    $( "#flash-message" ).css("display","block");
                    $( "#flash-message" ).removeClass("d-none");
                    $( "#flash-message" ).addClass("alert-danger");
                    $('#flash-message').html('Questionnaire Deleted Successfully');
                    obj.parent().parent().remove();
                    setTimeout(() => {
                    $( "#flash-message" ).addClass("d-none");
                    }, 5000); 

                  }else if(response.success==2)
                  {
                    $( "#flash-message" ).css("display","block");
                    $( "#flash-message" ).removeClass("d-none");
                    $( "#flash-message" ).addClass("alert-danger");
                    $('#flash-message').html('Questionnaire could not deleted');
                    setTimeout(() => {
                      $( "#flash-message" ).addClass("d-none");
                      }, 5000);
                  }
                  else {
                    swal("Something went wrong! Please try again.");
                  }
                }
              });
            } 
          });
      
    });
  </script>
@stop
