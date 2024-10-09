@extends('adminlte::page')

@section('title', 'Brand')

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
        <h3>Brand</h3>
        @can('add_brands')
          <a class="btn btn-sm btn-success" href="{{route('brand.add')}}">Add Brand</a>
        @endcan
      </div>
      <div class="card-body">
        <table style="width:100%" id="countiesList" class="table table-bordered table-hover">
          <thead>
            <tr>
              <th class="display-none"></th>
              <th>Brand Name</th>
              @if(Gate::check('view_brands') || Gate::check('edit_brands')|| Gate::check('delete_brands'))
                 <th>{{ __('adminlte::adminlte.actions') }}</th>
              @endif
            </tr>
          </thead> 
          <tbody>
            @foreach($brand as $brand_del)
            <tr>
              <td class="display-none"></td>
              <td>{{$brand_del->name}}</td>
              @if(Gate::check('view_brands') || Gate::check('edit_brands')|| Gate::check('delete_brands'))
                <td>
                  @can('view_brands')
                  <a class="action-button" title="View" href="{{route('brand.view',base64_encode($brand_del->id))}}"><i class="text-info fa fa-eye"></i></a>
                  @endcan
                  @can('edit_brands')
                  <a class="action-button" title="Edit" href="{{route('brand.edit',base64_encode($brand_del->id))}}"><i class="text-warning fa fa-edit"></i></a>
                  @endcan
                  @can('delete_brands')
                  <a class="action-button delete-button" title="Delete" href="javascript:void(0)" data-id="{{ $brand_del->id}}" data-submission="{{\App\Models\Brand::getBrandcount($brand_del->id)}}"><i class="text-danger fa fa-trash"></i></a>
                  @endcan
                </td>
              @endif
            </tr>
            @endforeach

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
    $('#countiesList').DataTable({
      columnDefs: [{
        targets: 0,
        render: function(data, type, row) {
          return data.substr(0, 2);
        }
      }]
    });
  });

  $('.delete-button').click(function(e) {
    var submission=$(this).attr('data-submission');
      
    if(submission>0)
    {
      swal({
          title: "Delete Brand",
          text: "Brand already used. You can not delete it.",
          type: "warning",
          showCancelButton: false,
        });
    }else{

        var id = $(this).attr('data-id');
        var obj = $(this);
        swal({
          title: "Are you sure?",
          text: "Are you sure you want to move this Brand to the Recycle Bin?",
          type: "warning",
          showCancelButton: true,
        }, function(willDelete) {
          if (willDelete) {
            $.ajax({
              url: "{{route('brand.movetorecycle')}}",
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
                  obj.parent().parent().remove();
                  //window.location.reload();
                } else {
                  console.log(response);
                  setTimeout(() => {
                    swal("Warning!", response.message, "warning");
                  }, 500);
                }
              }
            });
          }
        });
    }
    
  });
</script>
@stop