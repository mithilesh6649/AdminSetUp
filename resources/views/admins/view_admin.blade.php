@extends('adminlte::page')

@section('title', 'Admin Details')

@section('content_header')
@stop

@section('content')
<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-12">
      <div class="card">
        <div class="card-header alert d-flex justify-content-between align-items-center">
          <h3>View Admin Details</h3>
          <a class="btn btn-sm btn-success" href="{{ url()->previous() }}">{{ __('adminlte::adminlte.back') }}</a>
        </div>        
        <div class="card-body">
          @if (session('status'))
            <div class="alert alert-success" role="alert">
              {{ session('status') }}
            </div>
          @endif

          <form class="form_wrap">
            <div class="row">

              <div class="col-sm-6 col-md-6 col-lg-6 col-xl-6 col-12">
                <div class="form-group">
                  <label>First Name</label>
                  <input class="form-control" placeholder="{{ $viewAdmin[0]->first_name }}" readonly>
                </div>
              </div>

              <div class="col-sm-6 col-md-6 col-lg-6 col-xl-6 col-12">
                <div class="form-group">
                  <label>Last Name</label>
                  <input class="form-control" placeholder="{{ $viewAdmin[0]->last_name }}" readonly>
                </div>
              </div>

              <div class="col-sm-6 col-md-6 col-lg-6 col-xl-6 col-12">
                <div class="form-group">
                  <label>{{ __('adminlte::adminlte.email') }}</label>
                  <input class="form-control" placeholder="{{ $viewAdmin[0]->email }}" readonly>
                </div>
              </div>

              <div class="col-sm-6 col-md-6 col-lg-6 col-xl-6 col-12">
                <div class="form-group">
                  <label>Phone Number</label>
                  <input class="form-control" placeholder="{{ $viewAdmin[0]->phone_number }}" readonly>
                </div>
              </div>
              
              <div class="col-sm-6 col-md-6 col-lg-6 col-xl-6 col-12">
                <div class="form-group">
                  <label>{{ __('adminlte::adminlte.role') }}</label>
                  <?php $role = \App\Models\Role::where('id', $viewAdmin[0]->role_id)->get(); ?>
                  <input class="form-control" placeholder="{{ $role[0]->name }}" readonly>
                </div>
              </div>
              <div class="col-sm-6 col-md-6 col-lg-6 col-xl-6 col-12">
                <div class="form-group">
                  <label>Status</label>
                  <input class="form-control" placeholder="{{$viewAdmin[0]->status==1?'Active':'Inactive'}}" readonly>
                </div>
              </div>
              <div class="col-sm-6 col-md-6 col-lg-6 col-xl-6 col-12">
                <div class="form-group">
                  <label>Created Date</label>
                  <input class="form-control" placeholder="{{ $viewAdmin[0]->created_at ? Carbon\Carbon::parse($viewAdmin[0]->created_at)->format('d/m/Y') : '' }}" readonly>
                </div>
              </div>
              <div class="col-sm-6 col-md-6 col-lg-6 col-xl-6 col-12">
                <div class="form-group">
                  <label>Updated Date</label>
                  <input class="form-control" placeholder="{{ $viewAdmin[0]->updated_at ? Carbon\Carbon::parse($viewAdmin[0]->updated_at)->format('d/m/Y') : '' }}" readonly>
                </div>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection

@section('css')
@stop

@section('js')
@stop
