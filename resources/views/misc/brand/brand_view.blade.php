@extends('adminlte::page')

@section('title', 'Brand')

@section('content_header')
@stop

@section('content')
<div class="row">
  <div class="col-md-12">
      <div class="card">
        <div class="card-header alert d-flex justify-content-between align-items-center">
          <h3>View Brand</h3>
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
              <div class="col-6">
                <div class="form-group">
                  <label>Brand Name</label>
                  <input class="form-control" placeholder="{{ $viewbrand->name }}" readonly>
                </div>
              </div>
                             
              <div class="col-6">
                <div class="form-group">
                  <label>{{ __('adminlte::adminlte.created_date') }}</label>
                  <input class="form-control" placeholder="{{ $viewbrand->created_at ? date('m/d/Y', strtotime($viewbrand->created_at)) : '' }}" readonly>
                </div>
              </div>
              
              <div class="col-6">
                <div class="form-group">
                  <label>Updated Date</label>
                  <input class="form-control" placeholder="{{ $viewbrand->updated_at ? date('m/d/Y', strtotime($viewbrand->updated_at)) : '' }}" readonly>
                </div>
              </div>
            </div>
          </form>

        </div>
      </div>
    </div>
</div>
@endsection