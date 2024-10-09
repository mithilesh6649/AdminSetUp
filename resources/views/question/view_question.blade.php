@extends('adminlte::page')

@section('title', 'Question Details')

@section('content_header')
@stop

@section('content')
<div class="row">
  <div class="col-md-12">
    <div class="card">
      <div class="card-header alert d-flex justify-content-between align-items-center">
        <h3>Question Details</h3>
        <a class="btn btn-sm btn-success" href="{{ url()->previous() }}">{{ __('adminlte::adminlte.back') }}</a>
      </div>
      <div class="card-body">

        <form class="form_wrap">
          <div class="row">
            <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 col-12">
              <div class="form-group">
                <label>Question</label>
                <textarea class="form-control" placeholder="{{ $question_detl->question ??'N/A' }}" readonly>{{$question_detl->question??'N/A'}}</textarea>
              </div>
            </div>

            <div class="col-sm-6 col-md-6 col-lg-6 col-xl-6 col-12">
              <div class="form-group">
                <label>Questionnaire Title</label>
                <input class="form-control" placeholder="{{ $question_detl->questionnaire->title ??'N/A' }}" readonly>
              </div>
            </div>

            <div class="col-sm-6 col-md-6 col-lg-6 col-xl-6 col-12">
              <div class="form-group">
                <label for="status">Question Section</label>
                <input class="form-control" placeholder="{{ $question_detl->questionSection->name ??'N/A' }}" readonly>
              </div>
            </div>


            <div class="col-sm-6 col-md-6 col-lg-6 col-xl-6 col-12">
              <div class="form-group">
                <label for="question">Question Type</label>
                <select class="form-control" name="question_type" id="question_type" disabled>
                  <option value="1" {{$question_detl->question_type==1 ? 'selected' : '' }}>Option</option>
                  <option value="0" {{$question_detl->question_type==0 ? 'selected' : '' }}>Text</option>
                </select>
              </div>
            </div>

            <div class="col-sm-6 col-md-6 col-lg-6 col-xl-6 col-12">
              <div class="form-group">
                <label>{{ __('adminlte::adminlte.created_date') }}</label>
                <input class="form-control" placeholder="{{ $question_detl->created_at ? date('m/d/Y', strtotime($question_detl->created_at)) : '' }}" readonly>
              </div>
            </div>


            <div class="col-sm-6 col-md-6 col-lg-6 col-xl-6 col-12">
              <div class="form-group">
                <label>Last Updated Date</label>
                <input class="form-control" placeholder="{{ $question_detl->created_at ? date('m/d/Y', strtotime($question_detl->created_at)) : '' }}" readonly>
              </div>
            </div>

            <div class="col-sm-6 col-md-6 col-lg-6 col-xl-6 col-12">
              <div class="form-group">
                <label>Status</label>
                <input class="form-control" placeholder="{{ $question_detl->status==1?'Active':'Inactive'}}" readonly>
              </div>
            </div>

          </div>
        </form>

        <!-- Options Section -->
        {{--
        @if($question_detl->question_type==1)
        <div class="col-md-12">
          <div class="card-header alert d-flex justify-content-between align-items-center">
            <h3>Options</h3>
          </div>
          <br>

          <form class="form_wrap">
            <div class="row">
              <div class="col-sm-8 col-md-8 col-lg-8 col-xl-8 col-12">
                <div class="form-group">
                  <label>Option</label>
                </div>
              </div>

              <!-- 
              <div class="col-sm-4 col-md-4 col-lg-4 col-xl-4 col-12">
                <div class="form-group">
                  <label>Correct</label>
                </div>
              </div> -->

              @foreach($question_detl->question_options as $key => $option)
              <div class="col-sm-8 col-md-8 col-lg-8 col-xl-8 col-12">
                <div class="form-group">
                  <input class="form-control" placeholder="{{ $option->option ??'N/A' }}" readonly>
      </div>
    </div>

    <!-- <div class="col-sm-4 col-md-4 col-lg-4 col-xl-4 col-12">
                <div class="form-group">
                  <input style="border-color: <?php //echo $option->is_correct ? 'lightgreen' : '' 
                                              ?>;" class="form-control" placeholder="{{ $option->is_correct ? 'YES' : 'NO' }}" readonly>
                </div>
              </div> -->

    @endforeach
  </div>
  </form>
</div>
@endif
<!-- Options Section -->
--}}

</div>
</div>
</div>

</div>
@endsection