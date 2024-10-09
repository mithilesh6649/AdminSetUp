@extends('adminlte::page')

@section('title', 'Panel Details')

@section('content_header')
@stop

@section('content')
<div class="row">
  <div class="col-md-12">
    <div class="card">
      <div class="card-header alert d-flex justify-content-between align-items-center">

        <h3>Edit Panel Details</h3>
        <h3><span style="color: #4b2f60;">COORDINATOR: </span> <a style="border:none; padding:0; background:none;font-size:18px;font-weight:600;color:#000000;" href="{{route('coordinator.view',['id' => Request::segment(4)])}}">{{$coordinator->name_and_affiliation}}</a></h3>
        <a class="btn btn-sm btn-success" href="{{ url()->previous() }}">{{ __('adminlte::adminlte.back') }}</a>

      </div>

      <div class="card-body">
        <form class="form_wrap" id="updateExpertPanelForm">
          @csrf
          <input type="hidden" name="panel_id" value="{{ $panel->id }}">
          <div class="row">

            <div class="col-sm-4 col-md-4 col-lg-4 col-xl-4 col-12">
              <div class="form-group">
                <label>Panel Name<span class="text-danger"> *</span></label>
                <input type="text" class="form-control" name="panel_name" id="panel_name" value="{{ $panel->panel_name}}">
              </div>
            </div>

            <div class="col-sm-4 col-md-4 col-lg-4 col-xl-4 col-12">
              <div class="form-group">
                <label>Panel Status</label>
                <select class="form-control" name="ep_status" id="ep_status">
                  <option value="pending" {{$panel->ep_status=='pending'?'selected':''}}>Pending</option>
                  <option value="ongoing" {{$panel->ep_status=='ongoing'?'selected':''}}>Ongoing</option>
                  <option value="completed" {{$panel->ep_status=='completed'?'selected':''}}>Completed</option>
                </select>
              </div>
            </div>

            <div class="col-sm-4 col-md-4 col-lg-4 col-xl-4 col-12">
              <div class="form-group">
                <label>Status</label>
                <select class="form-control" id="status" name="status">
                  <option value="1" {{$panel->status==1?'selected':''}}>Active</option>
                  <option value="0" {{$panel->status==0?'selected':''}}>Inactive</option>
                </select>
              </div>
            </div>

            <div class="card-footer">
              <button type="text" class="btn btn-primary">{{ __('adminlte::adminlte.update') }}</button>
            </div>
          </div>
        </form>

        <!-- Panel Users Section Start-->
        <!-- <div class="col-md-12">
          <div class="card-header alert d-flex justify-content-between align-items-center">
            <h3>Panel Users</h3>
          </div>
          <br>

          <table style="width:100%" id="admins-list" class="table table-bordered table-hover">
            <thead>
              <tr>
                <th class="display-none"></th>
                <th>Sr.No.</th>
                <th>Name</th>
                <th>Email</th>
                <th>Affiliation</th>
                <th>Occupation</th>
                <th>Gender</th>
                <th>Status</th>
                <th>Created at</th>
              </tr>
            </thead>
            <tbody>

              @foreach($panel->ExpertPanel as $key => $value)
              <tr>
                <td class="display-none"></td>
                <td>{{$key+1}}</td>
                <td>{{ $value->expert->name }}</td>
                <td>{{ $value->expert->email }}</td>
                <td>{{ $value->expert->affiliation }}</td>
                <td>{{ $value->expert->occupation }}</td>
                <td>{{ $value->expert->gender }}</td>
                <td><span class="text-center {{$value->expert->status==1?'text-success':'text-danger'}}">{{$value->expert->status==1?'Active':'Inactive'}}</span></td>
                <td>{{ Carbon\Carbon::parse($value->expert->created_at)->format('d/m/Y') }} </td>
              </tr>
              @endforeach

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

        </div> -->

        <!-- Panel Users Section End-->

      </div>
    </div>
  </div>

</div>
@endsection

@section('js')
<script src="https://ajax.aspnetcdn.com/ajax/jquery.validate/1.9/jquery.validate.js"></script>
<script>
  $(document).ready(function() {
    //Update Expert Panel
    $('#updateExpertPanelForm').validate({
      ignore: [],
      debug: false,
      rules: {
        panel_name: {
          required: true
        },
      },
      messages: {
        panel_name: {
          required: "Panel name is required"
        },
      },
      submitHandler: function(form) {
        var form = form;
        $.ajax({
          type: "POST",
          url: "{{ route('update_expert_panel') }}",
          data: new FormData(form),
          contentType: false,
          processData: false,
          success: function(response) {
            if (response.success) {
              swal({
                  title: response.message,
                  type: "success",
                  timer: 1000
                },
                function() {
                  window.location.href = "{{ url()->previous() }}"
                });
            }
          }
        });
      },
    });
  });
</script>
@stop