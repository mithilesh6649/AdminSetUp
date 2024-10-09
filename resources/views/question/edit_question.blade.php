@extends('adminlte::page')

@section('title', 'Edit Question')

@section('content_header')
@stop

@section('content')
<div class="row">
  <div class="col-md-12">
    <div class="card">
      <div class="card-header alert d-flex justify-content-between align-items-center">
        <h3>Edit Question Details</h3>
        <a class="btn btn-sm btn-success" href="{{ url()->previous() }}">{{ __('adminlte::adminlte.back') }}</a>
      </div>
      <div class="card-body">
        @if (session('status'))
        <div class="alert alert-success" role="alert">
          {{ session('status') }}
        </div>
        @endif

        <form id="updateQuestionForm">
          @csrf
          <input type="hidden" name="id" value="{{ $question_edit->id }}">
          <div class="row">

            <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 col-12">
              <div class="form-group">
                <label for="question">Question<span class="text-danger"> *</span></label>
                <textarea style="border: 1px solid #7F8A9E; border-radius: 10px;" class="form-control" id="question" name="question">{{$question_edit->question}}</textarea>
              </div>
            </div>

            <div class="col-sm-6 col-md-6 col-lg-6 col-xl-6 col-12">
              <div class="form-group">
                <label>Questionnaire Title</label>
                <select class="form-control" name="questionnaire_id">
                  @foreach($questionnaireList as $key => $option)
                  <option value="{{$option->id}}" {{$option->id==$question_edit->questionnaire_id?'selected':''}}>{{ $option->title }}</option>
                  @endforeach
                </select>
              </div>
            </div>

            <div class="col-sm-6 col-md-6 col-lg-6 col-xl-6 col-12">
              <div class="form-group">
                <label for="status">Question Section</label>
                <select class="form-control" name="question_section" id="question_section">
                  <option value="" {{$question_edit->question_section_id==null ? 'selected' : '' }}>N\A</option>
                  @foreach($questionSectionList as $key => $option)
                  <option value="{{$option->id}}" {{$question_edit->question_section_id== $option->id? 'selected' : '' }}>{{$option->name}}</option>
                  @endforeach
                </select>
              </div>
            </div>

            <div class="col-sm-6 col-md-6 col-lg-6 col-xl-6 col-12">
              <div class="form-group">
                <label for="question">Question Type</label>
                <select class="form-control" name="question_type" id="question_type" style="pointer-events: none; cursor: pointer !important;">
                  <option value="1" {{$question_edit->question_type==1 ? 'selected' : '' }}>Option</option>
                  <option value="2" {{$question_edit->question_type==2 ? 'selected' : '' }}>Text</option>
                </select>
              </div>
            </div>

            <div class="col-sm-6 col-md-6 col-lg-6 col-xl-6 col-12">
              <div class="form-group">
                <label for="status">Status</label>
                <select class="form-control" name="status">
                  <option value="1" {{$question_edit->status==1?'selected':''}}>Active</option>
                  <option value="0" {{$question_edit->status==0?'selected':''}}>Inactive</option>
                </select>
              </div>
            </div>


            <!-- Options Section -->
            {{--
            @if($question_edit->question_type==1)
            <div class="col-md-12">
              <div class="card-header alert d-flex justify-content-between align-items-center">
                <h3>Edit Options</h3>
              </div>
              <br>

              <div class="row">
                <div class="col-sm-8 col-md-8 col-lg-8 col-xl-8 col-12">
                  <div class="form-group">
                    <label>Option<span class="text-danger"> *</span></label>
                  </div>
                </div>

                <!-- <div class="col-sm-4 col-md-4 col-lg-4 col-xl-4 col-12">
                  <div class="form-group">
                    <label>Correct</label>
                  </div>
                </div> -->

                <section id="options_collector">
                  @foreach($question_edit->question_options as $key => $option)

                  <div class="row" id="option_row_{{$option->id}}">

            <input type="hidden" name="option_ids[]" value="{{ $option->id }}">

            <div class="col-sm-8 col-md-8 col-lg-8 col-xl-8 col-12">
              <div class="form-group">
                <input placeholder="Enter option" class="form-control q_options" value="{{$option->option}}" name="option[]" id="option" dyanmic_msg="Option is required">
              </div>

              @if($key!=0)
              <div class="remove_btn">
                <button class="uibtn deleteOptionAPI" type="button" data-id="{{$option->id}}">
                  <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" class="text-danger" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path>
                  </svg>
                </button>
              </div>
              @endif

            </div>

            <!-- 
                    <div class="col-sm-4 col-md-4 col-lg-4 col-xl-4 col-12">
                      <div class="form-group">
                        <select class="form-control is_correct" name="is_correct[]">
                          <option value="1" {{$option->is_correct==1?'selected':''}}>YES</option>
                          <option value="0" {{$option->is_correct==0?'selected':''}}>NO</option>
                        </select>
                      </div>
                    </div> -->

          </div>
          @endforeach

          </section><!--options_collector close-->


          <div class="card-header alert d-flex justify-content-between align-items-center">
            <a class="btn btn-sm btn-success" id="AddOptions">Add Options</a>
          </div>
      </div>

    </div>
    @endif
    --}}
    <!-- Options Section -->

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

    //Atleast Any one option should be YES other all are NO
    // $(document).on('change', '.is_correct', function() {
    //   $('.is_correct option[value="0"]').prop('selected', true);
    //   $(this).val('1');
    // });


    /*
    //Delete Question Option API
    $(document).on('click', '.deleteOptionAPI', function() {
      var delete_opt_id = $(this).attr('data-id');
      swal({
        title: "Are you sure?",
        text: "Are you sure you want to delete this option ?",
        type: "warning",
        showCancelButton: true,
      }, function(willDelete) {
        if (willDelete) {
          $.ajax({
            url: "{{ route('delete_question_option') }}",
            type: 'post',
            data: {
              id: delete_opt_id
            },

            headers: {
              'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            success: function(response) {
              if (response.success) {
                $("#option_row_" + delete_opt_id).remove();
              } else {
                setTimeout(() => {
                  swal('Error', 'Something went wrong', 'error');
                }, 500);
              }
            }
          });
        }
      });
    });
    */

    /*
    // Add Options
    $('#AddOptions').click(function() {
      var uniqueId = Date.now().toString(36) + Math.random().toString(36).substr(2, 5);
      // <div class="col-sm-4 col-md-4 col-lg-4 col-xl-4 col-12">
      //         <div class="form-group">
      //           <select class="form-control is_correct" name="add_is_correct[]">
      //             <option value="1">YES</option>
      //             <option value="0" selected>NO</option>
      //           </select>
      //         </div>
      //   </div>
      var options_html = `
      <div class="row" id="option_row_${uniqueId}">
         <div class="col-sm-8 col-md-8 col-lg-8 col-xl-8 col-12">

             <div class="form-group">
               <input placeholder="Enter option" class="form-control q_options" name="add_option[]" id="option" dyanmic_msg="Option is required">
             </div>

             <div class="remove_btn">
              <button class="btn uibtn deleteOption" type="button" id="${uniqueId}">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" class="text-danger" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path>
               </svg>
               </button>
             </div>

           </div>
         </div>
      `;

      $('#options_collector').append(options_html);

      $(document).on('click', '.deleteOption', function() {
        var selected_id = $(this).attr('id');
        $("#option_row_" + selected_id).remove();
      });

    });
    */


    //Update Question
    $('#updateQuestionForm').validate({
      ignore: [],
      debug: false,
      rules: {
        question: {
          required: true
        },
        questionnaire_id: {
          required: true
        },
      },
      messages: {
        question: {
          required: "Question is required"
        },
        questionnaire_id: {
          required: "questionnaire title is required"
        }
      },
      submitHandler: function(form) {
        var form = form;

        /*
        //Apply Options validations according to question type (1=option, 2=text)
        var question_type = $("#question_type option:selected").val();
        if (question_type === "1") {

          //Add dynamic error message to options 
          var q_options = $('#updateQuestionForm .q_options');
          $(q_options).each(
            function() {
              var dymanic_error_msg = $(this)
                .attr('dyanmic_msg');
              if ($(this).val().trim() == '') {
                $(this).next().remove();
                $("<span class='text-danger compare'>" +
                    dymanic_error_msg +
                    "</span>")
                  .insertAfter(this);
              }
            });

          //When user fill options value then remove validations
          $(q_options).each(
            function() {
              $(this).on('input', function() {
                $(this).next().remove();
              });
            });
        }


        var container = document.getElementById('updateQuestionForm');
        var input = container.getElementsByClassName("compare");

        //Check if form has no any validations errors
        if (input.length == 0) {
        */

        $.ajax({
          type: "POST",
          url: "{{ route('question.update') }}",
          data: new FormData(form),
          contentType: false,
          processData: false,
          success: function(response) {
            swal({
                title: response.message,
                type: response.success ? "success" : "warning",
                timer: 1000
              },
              function() {
                if (response.success) {
                  window.location.href = "{{ route('question.list') }}"
                }
              });
          }
        });
        /*} else {
          return false;
        }*/
      },
    });
  });
</script>
@stop