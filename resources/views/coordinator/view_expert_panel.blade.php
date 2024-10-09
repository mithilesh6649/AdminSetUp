@extends('adminlte::page')

@section('title', 'Panel Details')

@section('content_header')
@stop

@section('content')
<div class="row">
  <div class="col-md-12">
    <div class="card">
      <div class="card-header alert d-flex justify-content-between align-items-center">

        <h3>Panel Details</h3>
        <h3><span style="color: #4b2f60;">COORDINATOR: </span> <a style="border:none; padding:0; background:none;font-size:18px;font-weight:600;color:#000000;" href="{{route('coordinator.view',['id' => Request::segment(4)])}}">{{$coordinator->name_and_affiliation}}</a></h3>
        <a class="btn btn-sm btn-success" href="{{ url()->previous() }}">{{ __('adminlte::adminlte.back') }}</a>

      </div>

      <div class="card-body">

        <form class="form_wrap">
          <div class="row">
            <div class="col-sm-6 col-md-6 col-lg-6 col-xl-6 col-12">
              <div class="form-group">
                <label>Panel Name</label>
                <input class="form-control" placeholder="{{ $panel->panel_name ?? 'N/A' }}" readonly>
              </div>
            </div>

            <div class="col-sm-6 col-md-6 col-lg-6 col-xl-6 col-12">
              <div class="form-group">
                <label>Panel Status</label>
                <input class="form-control" placeholder="{{ ucfirst($panel->ep_status ?? 'N/A') }}" readonly>
              </div>
            </div>


            <div class="col-sm-6 col-md-6 col-lg-6 col-xl-6 col-12">
              <div class="form-group">
                <label>Panel Created By</label>
                <input class="form-control" placeholder="{{ $panel->panel_owner->email }}" readonly>
              </div>
            </div>

            <div class="col-sm-6 col-md-6 col-lg-6 col-xl-6 col-12">
              <div class="form-group">
                <label>Total Panel Experts</label>
                <input class="form-control" placeholder="{{ $panel->expert_panel_count }}" readonly>
              </div>
            </div>

            <div class="col-sm-6 col-md-6 col-lg-6 col-xl-6 col-12">
              <div class="form-group">
                <label>{{ __('adminlte::adminlte.created_date') }}</label>
                <input class="form-control" placeholder="{{ Carbon\Carbon::parse($panel->created_at)->format('d/m/Y') }}" readonly>
              </div>
            </div>

            <div class="col-sm-6 col-md-6 col-lg-6 col-xl-6 col-12">
              <div class="form-group">
                <label>Status</label>
                <input class="form-control" placeholder="{{ $panel->status==1?'Active':'Inactive'}}" readonly>
              </div>
            </div>

          </div>
        </form>

        <!-- Panel Users Section Start-->
        <div class="col-md-12">
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
                <th>Occupation</th>
                <th>Affiliation</th>
                <th>Gender</th>
                <th>Created at</th>
                <th>Status</th>
              </tr>
            </thead>
            <tbody>

              @foreach($panel->ExpertPanel as $key => $value)
              <tr>
                <td class="display-none"></td>
                <td>{{$key+1}}</td>
                <td>{{ @$value->expert->name }}</td>
                <td>{{ @$value->expert->email }}</td>
                <td>{{ @$value->expert->occupation }}</td>
                <td>{{ @$value->expert->affiliation }}</td>
                <td>{{ ucfirst(@$value->expert->gender) }}</td>
                <td>{{ Carbon\Carbon::parse(@$value->expert->created_at)->format('d/m/Y') }} </td>
                <td><span class="text-center {{@$value->expert->status==1?'text-success':'text-danger'}}">{{@$value->expert->status==1?'Active':'Inactive'}}</span></td>
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

        </div>

        <!-- Panel Users Section End-->

      </div>
    </div>
  </div>

</div>
@endsection