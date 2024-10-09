@extends('adminlte::page')

@section('title', 'Edit media')

@section('content_header')
@stop

@section('content')
<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-12">
      <div class="card">
        <div class="card-header">
          <a class="btn btn-sm btn-success back-button" href="{{ url()->previous() }}">{{ __('adminlte::adminlte.back') }}</a>
          <h3>Edit media</h3>
        </div>
        <div class="card-body">
          @if (session('status'))
          <div class="alert alert-success" role="alert">
            {{ session('status') }}
          </div>
          @endif
          <form id="editmediaimage" method="post" action="{{route('media.website.update')}}" enctype="multipart/form-data">
            @csrf
            <div class="card-body">
            
                  <div class="form-group">
                    <label for="page_title">Section Name</label>
                    <input type="hidden" name="id" value="{{$mediawebsecedit->id}}" />
                    <input type="title" name="title" class="form-control" id="page_title" value="{{ $mediawebsecedit->section_name }}" readonly>
                    @if($errors->has('title'))
                    <div class="error">{{ $errors->first('title') }}</div>
                    @endif
                  </div>
               
                  <div class="form-group">
                    <label for="content">image </label> <span>{{$mediawebsecedit->image_width.' px X '.$mediawebsecedit->image_height .' px'}}</span>
                    <input type="file" accept=".jpg,.jpeg,.png" name="image" id="image" class="form-control" />
                  </div>
                  <img id="image_pre" src="{{asset('assets/media/'.$mediawebsecedit->image)}}" alt="">
                  
                </div>

            </div>
            <!-- /.card-body -->
            <div class="card-footer">
              <button type="submit" class="btn btn-primary disabled_button">Update</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
@push('css')
<link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.0.1/css/toastr.css" rel="stylesheet"/>
@endpush
@push('js')
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.0.1/js/toastr.js"></script>
<script src="https://ajax.aspnetcdn.com/ajax/jquery.validate/1.9/jquery.validate.js"></script>

<script>
  $(document).ready(function() {
    $("#image").change(function(evt) {

      const [file] = image.files
      if (file) {

        if (file.type == "image/png" || file.type == "image/jpeg" || file.type == "image/jpg") {
          if (file.size > 10546513) {

            toastr.error("File size should be less then 8 MB");
          } else {

            image_pre.src = URL.createObjectURL(file);
            image_pre.onload = function() {
              width = image_pre.naturalWidth;
              height = image_pre.naturalHeight;

              if (width == {{$mediawebsecedit->image_width}} && height =={{$mediawebsecedit->image_height}}) {
                $('.disabled_button').removeAttr('disabled',false);
                $('#image_pre').css('display', 'block');
                $('.remove_temp_image').css('display', 'block');
                $('#error_msg').val('');

              } else {
                $('.disabled_button').attr('disabled',true);
                toastr.error('Please upload an image with {{$mediawebsecedit->image_width}} x {{$mediawebsecedit->image_height}} pixels dimension');
                $('#image').css('display', 'block');
                $('#error_msg').val(1);
              }
            }

          }
        }
      }
    });

  });

</script>
@endpush

