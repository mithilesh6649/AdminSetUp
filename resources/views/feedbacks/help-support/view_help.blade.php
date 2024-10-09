@extends('adminlte::page')

@section('title', 'Help And Support')

@section('content_header')
@stop

@section('content')

<div class="row">
  <div class="col-md-12">
    <div class="card">
      <div class="card-header alert d-flex align-items-center justify-content-between">
        <h3>Help And Support <span class="badge {{ $viewhelp->status==1 ? 'badge-danger':'badge-success' }} p-2">{{ $viewhelp->status==1 ? 'Open':'Resolved' }}</span></h3>
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
            <input type="hidden" name="help_and_support_id" id="help_and_support_id" value="{{ $viewhelp->id }}">
            <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 col-12">
              <div class="form-group subject_wrapper">
                <label><strong>Subject</strong></label>
                <p class="mt-2 mb-1">{{ $viewhelp->subject }}</p>
              </div>
            </div>

            <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 col-12">
              <div class="main_div_wrapper">
                <div class="Chat-Logs_box position-relative">
                  <label>Chat Logs</label>
                </div>

                <div class="chat_box_content" id="help-response">
                  @foreach($viewhelp->helpResponse as $key => $data)

                  @if($data->user_type==3)
                  <div class="chat-log-heading darker col-12">
                    <div class="chat-box">
                      <p>{{ $data->description }}</p>
                      <span class="time-left" id="time-{{ $key }}"></span>
                    </div>
                    <img src="https://cdn2.vectorstock.com/i/thumb-large/23/81/default-avatar-profile-icon-vector-18942381.jpg" alt="Avatar" class="right" style="width:100%;">
                  </div>
                  @endif

                  @if($data->user_type==1 || $data->user_type==2)
                  <div class="chat-log-heading darker-box col-12">
                    <img src="{{ Str::replaceLast('index.php', '', url('/')).$viewhelp->user_profile_image }}" alt="Avatar" style="width:100%;">
                    <div class="chat-box inner-box">
                      <p>{{ $data->description }}</p>
                      <span class="time-right" id="time-{{ $key }}"></span>
                    </div>
                  </div>
                  @endif

                  <script>
                    //Convert UTC timezone format to local timezone format
                    var created_at = '{{ $data->created_at }}';
                    var formattedDate = formatDate(created_at);
                    document.getElementById('time-{{ $key }}').textContent = formattedDate;

                    function formatDate(date) {
                      var localDate = moment.utc(date).local();
                      var formatted = localDate.format('DD/MM/YYYY, h:mm:ss A');
                      return formatted;
                    }
                  </script>

                  @endforeach
                </div>
              </div>
            </div>

            <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 col-12">
              <div class="text_messges position-relative {{ $viewhelp->status==2 ? 'd-none':''}}">
                <div class="send-box">
                  <form action="">
                    <input id="message" type="text" class="form-control" aria-label="message…" placeholder="Write message…">
                    <button class="send_response" type="button"><i class="fa fa-paper-plane" aria-hidden="true"></i> </button>
                  </form>
                </div>
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
<link href="https://cdn.jsdelivr.net/gh/gitbrent/bootstrap4-toggle@3.6.1/css/bootstrap4-toggle.min.css" rel="stylesheet">
<style>
  .main_div_wrapper {
    background: rgb(223 223 223 / 20%);
    border-radius: 10px;
  }

  .chat-div-wrapper {
    background: rgb(223 223 223 / 20%);
    padding: 20px;
    border-radius: 14px;
    margin-right: 1.5px;
    margin-left: 1.5px;
    margin-bottom: 10px;
    overflow-y: auto;
    max-height: calc(100vh - 522px);
  }

  row {
    display: -ms-flexbox;
    display: flex;
    -ms-flex-wrap: wrap;
    flex-wrap: wrap;
    margin-right: -7.5px;
    margin-left: -7.5px;
  }

  .darker-box {
    display: flex;
    justify-content: flex-start;
    align-items: center;
  }

  .darker {
    /* border-color: #ccc; */
    /* background-color: #ddd; */
    display: flex;
    align-items: center !important;
    justify-content: flex-end;
  }

  .send-box {
    padding: 20px;
    border-top: 1px solid #ccc;
    display: flex;
    background: #ffffff;
  }

  .position-relative {
    position: relative !important;
  }

  .send-box {
    padding: 20px;
    border-top: 1px solid #ccc;
    display: flex;
    background: #ffffff;
  }

  .send-box .form-control {
    display: block;
    width: -webkit-fill-available;
    padding: 0.375rem 0.75rem;
    font-size: 14px;
    font-weight: 400;
    line-height: 1.5;
    color: #222;
    background-color: #fff;
    background-clip: padding-box;
    border: 1px solid #ccc;
    -webkit-appearance: none;
    -moz-appearance: none;
    appearance: none;
    border-radius: 0.25rem;
    transition: border-color .15s ease-in-out, box-shadow .15s ease-in-out;
  }

  .chat-log-heading {
    border-radius: 5px;
    padding: 10px;
    margin: 10px 0;
  }

  .chat-box.inner-box {
    background: #fff !important;
    color: #000 !important;
    min-width: 80px;
    box-shadow: 1px 1px 5px #d9d9d9;
    max-width: 70%;
  }

  .chat-box {
    background: #3797f0;
    padding: 7px 10px;
    color: #fff;
    border-radius: 10px 0px 10px;
    min-width: 80px;
    max-width: 70%;
  }

  .time-left {
    float: right;
    color: #dcdcdc;
    /* position: absolute; */
    /* top: 45px; */
    /* right: 101px; */
    margin-top: 7px;
  }

  .chat-log-heading img.right {
    float: right;
    margin-left: 20px;
    margin-right: 0;
  }

  .chat-log-heading img {
    float: left;
    max-width: 60px;
    width: 100%;
    height: 60px;
    object-fit: cover;
    margin-right: 20px;
    border-radius: 50%;
  }
</style>
@stop
@section('js')
<script src="https://cdn.jsdelivr.net/gh/gitbrent/bootstrap4-toggle@3.6.1/js/bootstrap4-toggle.min.js"></script>
<script>
  //console.log(Intl.DateTimeFormat().resolvedOptions().timeZone);
  $(document).ready(function() {

    //When enter press then send message
    $(document).on('keypress', function(e) {
      if (e.which == 13) {
        event.preventDefault();
        $(".send_response").trigger("click");
      }
    });

    //When user click send response then send message
    $('.send_response').click(function() {
      if ($('#message').val().length != 0) {
        $(".error").hide();
        var help_and_support_id = $("#help_and_support_id").val();
        var message = $("#message").val();

        $.ajax({
          type: "post",
          url: "{{ route('help-suport.sendmessage') }}",
          data: {
            "_token": "{{ csrf_token() }}",
            help_and_support_id: help_and_support_id,
            message: message,
          },
          success: function(response) {
            if (response.success) {

              var localDate = moment.utc().local();
              var currentDateTime = localDate.format('DD/MM/YYYY, h:mm:ss A');
           

              $(`<div class='chat-log-heading darker col-12'><div class='chat-box'><p> ${message} </p><span class='time-left'> ${currentDateTime} </span></div><img src='https://cdn2.vectorstock.com/i/thumb-large/23/81/default-avatar-profile-icon-vector-18942381.jpg' alt='Avatar' class='right' style='width:100%;'></div>`).insertAfter($('.chat-log-heading').last());
              $("#message").val('');

              var helpResponseDiv = $('#help-response');
              helpResponseDiv.animate({
                scrollTop: helpResponseDiv.prop("scrollHeight")
              }, 1000);
            }
          }
        });
      } else {
        $(".error").hide();
        swal({
          icon: 'error',
          title: "Error",
          text: 'Message can not be empty!',
          type: "error",
          timer: 1000,
        });
      }
    });


    //When page refresh then automatically scroll its height
    var helpResponseDiv = $('#help-response');
    helpResponseDiv.animate({
      scrollTop: helpResponseDiv.prop("scrollHeight")
    }, 1000);

  });
</script>
@stop