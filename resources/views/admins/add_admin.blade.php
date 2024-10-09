@extends('adminlte::page')

@section('title', 'Add Admin')

@section('content_header')
@stop

@section('content')
<div class="row">
  <div class="col-md-12">
    <div class="card">
      <div class="card-header alert d-flex justify-content-between align-items-center">
        <h3>{{ __('adminlte::adminlte.add_admin') }}</h3>
        <a class="btn btn-sm btn-success" href="{{ url()->previous() }}">{{ __('adminlte::adminlte.back') }}</a>
      </div>
      <div class="card-body">
        @if (session('status'))
        <div class="alert alert-success" role="alert">
          {{ session('status') }}
        </div>
        @endif
        <form id="addAdminForm" method="post" , action="{{ route('save_admin') }}" onload="myFunction()">
          @csrf
          <div class="row">

            <div class="col-6">
              <div class="form-group">
                <label for="first_name">First Name<span class="text-danger"> *</span></label>
                <input type="text" name="first_name" class="form-control" id="first_name" maxlength="100" value="">
              </div>
            </div>

            <div class="col-6">
              <div class="form-group">
                <label for="last_name">Last Name<span class="text-danger"> *</span></label>
                <input type="text" name="last_name" class="form-control" id="last_name" maxlength="100" value="">
              </div>
            </div>

            <div class="col-6">
              <div class="form-group">
                <label for="email">{{ __('adminlte::adminlte.email') }}<span class="text-danger"> *</span></label>
                <input type="text" name="email" class="form-control" id="email" placeholder="Ex: example@lossdamage.com" maxlength="100" value="">
                <div id="email_error" class="error"></div>
              </div>
            </div>

            <div class="col-6">
              <div class="form-group">
                <label for="phone_number">Phone Number</label>
                <input type="text" name="phone_number" class="form-control" id="phone_number" maxlength="15" value="">
              </div>
            </div>

            <div class="col-6">
              <div class="form-group">
                <label for="role_id">{{ __('adminlte::adminlte.role') }}<span class="text-danger"> *</span></label>
                <select name="role_id" class="form-control" id="role_id">
                  <option value="" hidden>{{ __('adminlte::adminlte.select_role') }}</option>
                  <?php for ($i = 0; $i < count($roles); $i++) { ?>
                    <option value="{{ $roles[$i]->id }}">{{ $roles[$i]->name }}</option>
                  <?php } ?>
                </select>
                <div id="role_id_error" class="error"></div>
              </div>
            </div>
            <div class="col-6">
              <div class="form-group">
                <label for="status">Status</label>
                <select class="form-control" name="status" id="status">
                  <option value="1">Active</option>
                  <option value="0">Inactive</option>
                </select>
                <div id="password_error" class="error"></div>
              </div>
            </div>

            <div class="col-6">
              <div class="form-group position-relative">
                <label for="password">{{ __('adminlte::adminlte.password') }}<span class="text-danger"> *</span></label>
                <input type="password" name="password" class="form-control" id="password" maxlength="100">
                <span class="fa fa-fw fa-eye field-icon toggle-password view_pass"></span>
                <div id="password_error" class="error"></div>
              </div>
            </div>

            <div class="col-6">
              <div class="form-group position-relative">
                <label for="confirm_password">{{ __('adminlte::adminlte.confirm_password') }}<span class="text-danger"> *</span></label>
                <input type="password" name="confirm_password" class="form-control" id="confirm_password" maxlength="100">
                <span class="fa fa-fw fa-eye field-icon toggle-password view_con_pass"></span>
                <div id="confirm_password_error" class="error"></div>
              </div>
            </div>
          </div>
          <!-- /.card-body -->
          <div class="card-footer">
            <button type="text" class="btn btn-primary">{{ __('adminlte::adminlte.save') }}</button>
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
  function myFunction() {
    document.getElementById("email").val('');
  }
  $(document).ready(function() {

    $("#email").blur(function() {
      $.ajax({
        type: "GET",
        url: "{{ route('check_admin_email') }}",
        data: {
          email: $(this).val(),
          table_name: 'admins'
        },
        success: function(result) {
          if (result.response == 1) {
            $("#email_error").text("");
          } else {
            $("#email_error").html("");
          }
        }
      });
    });
    $('#addAdminForm').validate({
      ignore: [],
      debug: false,
      rules: {
        first_name: {
          required: true
        },
        last_name: {
          required: true
        },
        email: {
          required: true,
          email: true
        },
        phone_number: {
          number: true,
        },
        role_id: {
          required: true
        },
        password: {
          required: true,
          minlength: 8
        },
        confirm_password: {
          required: true,
          minlength: 8,
          equalTo: "#password"
        },
      },
      messages: {
        first_name: {
          required: "First Name is required"
        },
        last_name: {
          required: "Last Name is required"
        },
        email: {
          required: "The Email is required",
          email: "Please enter a valid Email"
        },
        role_id: {
          required: "The Role is required"
        },
        password: {
          required: "The Password is required",
          minlength: "Minimum length should be 8"
        },
        confirm_password: {
          required: "The Confirm Password is required",
          minlength: "Minimum length should be 8",
          equalTo: "The Confirm Password must be equal to Password"
        },
      }
    });
  });
  $(document).on('click', '.view_pass', function() {

    $(this).removeAttr('class');
    if ($('#password').attr('type') == 'password') {
      $('#password').attr('type', 'text');
      $(this).addClass('fa fa-fw fa-eye-slash field-icon toggle-password view_pass');
    } else {
      $('#password').attr('type', 'password');
      $(this).addClass('fa fa-fw fa-eye field-icon toggle-password view_pass');
    }
  })

  $(document).on('click', '.view_con_pass', function() {

    $(this).removeAttr('class');
    if ($('#confirm_password').attr('type') == 'password') {
      $('#confirm_password').attr('type', 'text');
      $(this).addClass('fa fa-fw fa-eye-slash field-icon toggle-password view_con_pass');
    } else {
      $('#confirm_password').attr('type', 'password');
      $(this).addClass('fa fa-fw fa-eye field-icon toggle-password view_con_pass');
    }
  })
</script>
@stop