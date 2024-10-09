@extends('adminlte::page')

@section('title', 'Edit Questionnaire')

@section('content_header')
@stop

@section('content')
<div class="row">
  <div class="col-md-12">
    <div class="card">
      <div class="card-header alert d-flex justify-content-between align-items-center">
        <h3>Edit Questionnaire Details</h3>
        <a class="btn btn-sm btn-success" href="{{ url()->previous() }}">{{ __('adminlte::adminlte.back') }}</a>
      </div>
      <div class="card-body">
        @if (session('status'))
        <div class="alert alert-success" role="alert">
          {{ session('status') }}
        </div>
        @endif
        <form id="updateAdminForm" method="post" action="{{ route('questionnaire.update') }}">
          @csrf
          <input type="hidden" name="id" value="{{ $questionnaires_edit->id }}">
          <div class="row">
            <div class="col-sm-6 col-md-6 col-lg-6 col-xl-6 col-12">
              <div class="form-group">
                <label for="title">Title<span class="text-danger"> *</span></label>
                <input type="text" name="title" class="form-control" id="title" value="{{ $questionnaires_edit->title }}" maxlength="100">
              </div>
            </div>
          
            <div class="col-sm-6 col-md-6 col-lg-6 col-xl-6 col-12">
              <div class="form-group">
                <label for="status">Status</label>
                <select class="form-control" name="status">
                  <option value="1" {{$questionnaires_edit->status==1?'selected':''}}>Active</option>
                  <option value="0" {{$questionnaires_edit->status==0?'selected':''}}>Inactive</option>
                </select>
              </div>
            </div>

          <div class="card-footer">
            <button type="text" class="btn btn-primary">{{ __('adminlte::adminlte.update') }}</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
@endsection


@section('js')
<script src="https://ajax.aspnetcdn.com/ajax/jquery.validate/1.9/jquery.validate.js"></script>
<script>
  $(document).ready(function() {
    $('#updateAdminForm').validate({
      ignore: [],
      debug: false,
      rules: {
        title: {
          required: true
        }
      },
      messages: {
        title: {
          required: "Title is required"
        },
      }
    });
  });
</script>
@stop