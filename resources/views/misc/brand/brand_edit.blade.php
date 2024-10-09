@extends('adminlte::page')

@section('title', 'Edit Brand')

@section('content_header')
@stop

@section('content')
<div class="row">
  <div class="col-md-12">
      <div class="card">
        <div class="card-header alert d-flex justify-content-between align-items-center">
          <h3>Edit Brand</h3>
          <a class="btn btn-sm btn-success" href="{{ url()->previous() }}">{{ __('adminlte::adminlte.back') }}</a>
        </div>
        <div class="card-body">
          @if (session('status'))
            <div class="alert alert-success" role="alert">
              {{ session('status') }}
            </div>
          @endif

          <form id="editbrandform" method="post" action="{{route('brand.update')}}">
            @csrf
              @if ($errors->any())
                <div class="alert alert-warning">
                  <ul>
                    @foreach ($errors->all() as $error)
                      <li>{{ $error }}</li>
                    @endforeach
                  </ul>
                </div>
              @endif
              <div class="information_fields">
                <div class="row">
                  <div class="col-6">
                    <div class="form-group">
                      <label for="name">Brand Name<span class="text-danger"> *</span></label>
                      <input type="hidden" name="id" id="id" value="{{ $editbrand->id }}">
                      <input type="text" name="name" class="form-control" id="name" value="{{ $editbrand->name }}" maxlength="100">
                      <div id ="function_error" class="error"></div>
                      @if($errors->has('county'))
                        <div class="error">{{ $errors->first('county') }}</div>
                      @endif
                    </div>
                  </div>
                </div>
              </div>
            <!-- /.card-body -->
            <div class="card-footer">
              <button type="text" class="btn btn-primary" >{{ __('adminlte::adminlte.update') }}</button>
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
<script src="https://ajax.aspnetcdn.com/ajax/jquery.validate/1.9/jquery.validate.js"></script>
  <script>
    $(document).ready(function() {
      $('#editbrandform').validate({
        ignore: [],
        debug: false,
        rules: {
          name: {
            required: true
          },
        },
        messages: {
          name: {
            required:"Brand Name is required"
          },
        }
      });
    });
  </script>
@stop
