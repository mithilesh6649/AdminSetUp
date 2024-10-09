@extends('adminlte::page')

@section('title', 'Edit Admin')

@section('content_header')
@stop

@section('content')
<div class="row">
  <div class="col-md-12">
      <div class="card">
        <div class="card-header alert d-flex justify-content-between align-items-center">
          <h3>Edit Admin Details</h3>
          <a class="btn btn-sm btn-success" href="{{ url()->previous() }}">{{ __('adminlte::adminlte.back') }}</a>
        </div>
        <div class="card-body">
          @if (session('status'))
            <div class="alert alert-success" role="alert">
              {{ session('status') }}
            </div>
          @endif
          <form id="updateAdminForm" method="post" action="{{ route('update_admin') }}">
            @csrf
            <input type="hidden" name="id" value="{{ $admin[0]->id }}">
              <div class="row">
                <div class="col-6">
                  <div class="form-group">
                    <label for="first_name">First Name<span class="text-danger"> *</span></label>
                    <input type="text" name="first_name" class="form-control" id="first_name" value="{{ $admin[0]->first_name }}" maxlength="100">
                  </div>
                </div>
                <div class="col-6">
                  <div class="form-group">
                    <label for="last_name">Last Name<span class="text-danger"> *</span></label>
                    <input type="text" name="last_name" class="form-control" id="last_name" value="{{ $admin[0]->last_name }}" maxlength="100">
                  </div>
                </div>
                <div class="col-6">
                  <div class="form-group">
                    <label for="email">{{ __('adminlte::adminlte.email') }}<span class="text-danger"> *</span></label>
                    <input type="text" name="email" class="form-control" id="email" value="{{ $admin[0]->email }}" readonly maxlength="100">
                  </div>
                </div>
                <div class="col-6">
                  <div class="form-group">
                    <label for="phone_number">Phone Number</label>
                    <input type="text" name="phone_number" class="form-control" id="phone_number" value="{{ $admin[0]->phone_number }}" maxlength="15">
                  </div>
                </div>
                <div class="col-6">               
                  <div class="form-group">
                    <label for="role_id">{{ __('adminlte::adminlte.role') }}<span class="text-danger"> *</span></label>
                    <select name="role_id" class="form-control" id="role_id">
                        <!-- <option value="" hidden>Select Role</option> -->
                      <?php for ($i=0; $i < count($roles); $i++) { ?> 
                        <option value="{{ $roles[$i]->id }}" @if($admin[0]->role_id==$roles[$i]->id) selected @endif>{{ $roles[$i]->name }}</option>
                      <?php } ?>
                    </select>
                  </div>
                </div>
                <div class="col-6">
                  <div class="form-group">
                    <label for="status">Status<span class="text-danger"> *</span></label>
                    <select class="form-control" name="status" id="status">
                      <option value="1" {{$admin[0]->status==1?'selected':''}}>Active</option>
                      <option value="0" {{$admin[0]->status==0?'selected':''}}>Inactive</option>
                    </select>
                  </div>
                </div>

                <div class="col-6">
                  <div class="form-group position-relative">
                    <label for="password">{{ __('adminlte::adminlte.password') }}</label>
                    <input type="password" name="password" class="form-control" id="password" maxlength="100">
                    <span class="fa fa-fw fa-eye field-icon toggle-password view_pass"></span>
                  </div>
                </div>

                <div class="col-6">
                  <div class="form-group position-relative">
                    <label for="confirm_password">{{ __('adminlte::adminlte.confirm_password') }}</label>
                    <input type="password" name="confirm_password" class="form-control" id="confirm_password" maxlength="100">
                    <span class="fa fa-fw fa-eye field-icon toggle-password view_con_pass"></span>
                  </div>
                </div>
               </div>
            <!-- /.card-body -->
            <div class="card-footer">
              <button type="text" class="btn btn-primary">{{ __('adminlte::adminlte.update') }}</button>
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
      $('#updateAdminForm').validate({
        ignore: [],
        debug: false,
        rules: {
          name: {
            required: true
          },
          email: {
            required: true,
            email: true
          },
          phone_number:{
            number: true,
          },
          role: {
            required: true
          },
          password: {
            minlength: 8
          },
          confirm_password: {
            minlength: 8,
            equalTo : "#password"
          },
        },
        messages: {
          name: {
            required: "Name is required"
          },
          email: {
            required: "Email is required",
            email: "Please enter a valid Email"
          },
          role: {
            required: "Role is required"
          },
          password: {
            
            minlength: "Minimum length should be 8"
          },
          confirm_password: {
          
            minlength: "Minimum length should be 8",
            equalTo : "Confirm Password must be equal to Password"
          },
        }
      });
    });
    $(document).on('click','.view_pass',function(){
        
        $(this).removeAttr('class');
        if($('#password').attr('type')=='password'){
            $('#password').attr('type','text');
            $(this).addClass('fa fa-fw fa-eye-slash field-icon toggle-password view_pass');
        }else{
            $('#password').attr('type','password');
            $(this).addClass('fa fa-fw fa-eye field-icon toggle-password view_pass');
        }              
    })


     $(document).on('click','.view_con_pass',function(){
    
        $(this).removeAttr('class');
        if($('#confirm_password').attr('type')=='password'){
            $('#confirm_password').attr('type','text');
            $(this).addClass('fa fa-fw fa-eye-slash field-icon toggle-password view_con_pass');
        }else{
            $('#confirm_password').attr('type','password');
            $(this).addClass('fa fa-fw fa-eye field-icon toggle-password view_con_pass');
        }              
    })
  </script>
@stop
