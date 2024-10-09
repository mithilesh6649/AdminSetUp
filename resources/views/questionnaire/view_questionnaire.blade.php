@extends('adminlte::page')

@section('title', 'Questionnaire Details')

@section('content_header')
@stop

@section('content')
<div class="row">
  <div class="col-md-12">
    <div class="card">
      <div class="card-header alert d-flex justify-content-between align-items-center">
        <h3>Questionnaire Details</h3>
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
                <label>Title</label>
                <input class="form-control" placeholder="{{ $questionnaires_detl->title??'N/A' }}" readonly>
              </div>
            </div>

            <div class="col-sm-6 col-md-6 col-lg-6 col-xl-6 col-12">
              <div class="form-group">
                <label>Status</label>
                <input class="form-control" placeholder="{{ $questionnaires_detl->status==1?'Active':'Inactive'}}" readonly>
              </div>
            </div>
            

            <div class="col-sm-6 col-md-6 col-lg-6 col-xl-6 col-12">
              <div class="form-group">
                <label>{{ __('adminlte::adminlte.created_date') }}</label>
                <input class="form-control" placeholder="{{ $questionnaires_detl->created_at ? date('m/d/Y', strtotime($questionnaires_detl->created_at)) : '' }}" readonly>
              </div>
            </div>

            <div class="col-sm-6 col-md-6 col-lg-6 col-xl-6 col-12">
              <div class="form-group">
                <label>Updated Date</label>
                <input class="form-control" placeholder="{{ $questionnaires_detl->created_at ? date('m/d/Y', strtotime($questionnaires_detl->created_at)) : '' }}" readonly>
              </div>
            </div>
            
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
@endsection

@section('css')
@stop

@section('js')
@stop