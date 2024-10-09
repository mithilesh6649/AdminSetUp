@extends('adminlte::page')

@section('title', 'Website Page Content')

@section('content_header')
@stop

@section('content')
<div class="row">
  <div class="col-md-12">
      <div class="card">
        <div class="card-header alert d-flex justify-content-between align-items-center">
          <h3>Website Page Content</h3>
          <a class="btn btn-sm btn-success back-button" href="{{ url()->previous() }}">{{ __('adminlte::adminlte.back') }}</a>
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
                  <label>Title</label>
                  <input class="form-control" placeholder="{{ $pageContent->title }}" readonly>
                </div>
              </div>
              <div class="col-6">
                <div class="form-group">
                  <label>View</label>
                  <input class="form-control" placeholder="{{ ucfirst($pageContent->device_type) }}" readonly>
                </div>
              </div>
            </div>
            
            <div class="row">
              <div class="col-6">
                <div class="form-group">
                  <label>Added By</label>
                  <input class="form-control" placeholder="{{ $addedBy->first_name.' '.$addedBy->last_name }}" readonly>
                </div>
              </div>
              <div class="col-6">
                <div class="form-group">
                  <label>Updated By</label>
                  <input class="form-control" placeholder="{{ $updatedBy->first_name.' '.$updatedBy->last_name }}" readonly>
                </div>
              </div>
            </div>
            
            <div class="row">
              <div class="col-6">
                <div class="form-group">
                  <label>Updated Date</label>
                  <input class="form-control" placeholder="{{ date('m/d/Y', strtotime($pageContent->updated_at)) }}" readonly>
                </div>
              </div>
              <div class="col-6">
                <div class="form-group">
                  <label>Created Date</label>
                  <input class="form-control" placeholder="{{ date('m/d/Y', strtotime($pageContent->created_at)) }}" readonly>
                </div>
              </div>
            </div>
                          
            <div class="row">
              <div class="col-12">
                <div class="form-group">
                  <label>Content</label>
                  <div class="content_field">{!! $pageContent->content !!}<div>
                </div>
              </div>
              <div class="form-group">
                <label for="status">Status</label>
                <select name="status" class="form-control" id="status" disabled >
                   <option value="1" {{$pageContent->status==1?'selected':''}}>Active</option>
                   <option value="0" {{$pageContent->status==0?'selected':''}}>Inactive</option>
                </select>
                @if($errors->has('status'))
                  <div class="error">{{ $errors->first('status') }}</div>
                @endif
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
</div>
@endsection