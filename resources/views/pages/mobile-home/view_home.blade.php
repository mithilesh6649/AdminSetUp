@extends('adminlte::page')
@section('title', 'View Mobile Home')
@section('content_header')
@stop
@section('content')
<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-12">
      <div class="card">
        <div class="card-header">
          <a class="btn btn-sm btn-success back-button" href="{{ url()->previous() }}">{{ __('adminlte::adminlte.back') }}</a>
          <h3>View Mobile Home</h3>
        </div>
        <div class="card-body">
          @if (session('status'))
          <div class="alert alert-success" role="alert">
            {{ session('status') }}
          </div>
          @endif
          <form>
            @csrf
            <div class="card-body">

              <div class="form-group">
                <label for="page_title">Title</label>
                <input type="title" name="title" class="form-control" id="page_title" value="{{ $viewmobilehome->title }}" readonly>
                @if($errors->has('title'))
                <div class="error">{{ $errors->first('title') }}</div>
                @endif
              </div>
              <div class="form-group">
                <label for="content">Description </label>
                <textarea class="form-control">{{$viewmobilehome->description}}</textarea>
              </div>

              <div class="form-group">
                <label for="content">Light Image</label> <span>{{$viewmobilehome->image_width.' px X '.$viewmobilehome->image_height .' px'}}</span>

              </div>
              <img id="image_pre" src="{{asset('assets/mobile/'.$viewmobilehome->light_image)}}" alt="light image">

              <div class="form-group">
                <label for="content">Dark mage </label> <span>{{$viewmobilehome->image_width.' px X '.$viewmobilehome->image_height .' px'}}</span>

              </div>
              <img id="image_pre" src="{{asset('assets/mobile/'.$viewmobilehome->dark_image)}}" alt="dark image">

            </div>

        </div>
        <!-- /.card-body -->

        </form>
      </div>
    </div>
  </div>
</div>
</div>
@endsection