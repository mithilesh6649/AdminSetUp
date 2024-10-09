@extends('adminlte::page')

@section('title', 'Edit Coordinator')

@section('content_header')
@stop

@section('content')
<div class="row">
  <div class="col-md-12">
    <div class="card">
      <div class="card-header alert d-flex justify-content-between align-items-center">
        <h3>Edit Coordinator Details</h3>
        <a class="btn btn-sm btn-success" href="{{ url()->previous() }}">{{ __('adminlte::adminlte.back') }}</a>
      </div>
      <div class="card-body">
        @if (session('status'))
        <div class="alert alert-success" role="alert">
          {{ session('status') }}
        </div>
        @endif
        <form id="updateAdminForm" method="post" action="{{ route('coordinator.update') }}">
          @csrf
          <input type="hidden" name="id" value="{{ $coordinators_edit->id }}">
          <div class="row">

            <div class="col-sm-6 col-md-6 col-lg-6 col-xl-6 col-12">
              <div class="form-group">
                <label for="email">{{ __('adminlte::adminlte.email') }}<span class="text-danger"> *</span></label>
                <input type="text" name="email" class="form-control" id="email" value="{{ $coordinators_edit->email }}" readonly maxlength="100">
              </div>
            </div>

            <div class="col-sm-6 col-md-6 col-lg-6 col-xl-6 col-12">
              <div class="form-group">
                <label for="name">Name & Affiliation<span class="text-danger"> *</span></label>
                <input type="text" name="name_and_affiliation" class="form-control" id="name_and_affiliation" value="{{ $coordinators_edit->name_and_affiliation }}" maxlength="100">
              </div>
            </div>

            
            <!-- 
            <div class="col-sm-6 col-md-6 col-lg-6 col-xl-6 col-12">
              <div class="form-group">
                <label for="name">Phone Number</label>
                <input type="text" name="phone_number" class="form-control" id="phone_number" value="{{ $coordinators_edit->phone_number }}" maxlength="15">
              </div>
            </div> -->

            <div class="col-sm-6 col-md-6 col-lg-6 col-xl-6 col-12">
              <div class="form-group">
                <label for="name">Country<span class="text-danger"> *</span></label>
                <select class="form-control" name="country" id="country" disabled>
                  @foreach($counteries as $key => $country)
                  <option data-id="{{$country}}" value="{{$country->id}}" {{$coordinators_edit->getcountry->id==$country->id?'selected':''}}>{{$country->country_name}}</option>
                  @endforeach
                </select>
              </div>
            </div>

            @foreach($coordinators_edit->getUserRegion as $key => $value)
            <div class="col-sm-6 col-md-6 col-lg-6 col-xl-6 col-12">
              <div class="form-group">
                <label>GPS Coordination {{$key+1}}</label>
                <input class="form-control" value="{{ @$value->region->lat.' , '.@$value->region->long }}" readonly>
              </div>
            </div>
            @endforeach

            <!-- <div class="col-sm-6 col-md-6 col-lg-6 col-xl-6 col-12">
              <div class="form-group">
                <label>GPS Coordination<span class="text-danger"> *</span></label>
                <input type="text" class="form-control" name="gps_coordination" class="form-control" id="gps_coordination" value="{{ $coordinators_edit->gps_coordination }}">
              </div>
            </div> -->

            <div class="col-sm-6 col-md-6 col-lg-6 col-xl-6 col-12">
              <div class="form-group position-relative">
                <label for="password">{{ __('adminlte::adminlte.password') }}</label>
                <input type="password" name="password" class="form-control" id="password" maxlength="100">
                <span class="fa fa-fw fa-eye field-icon toggle-password view_pass"></span>
              </div>
            </div>

            <div class="col-sm-6 col-md-6 col-lg-6 col-xl-6 col-12">
              <div class="form-group position-relative">
                <label for="confirm_password">{{ __('adminlte::adminlte.confirm_password') }}</label>
                <input type="password" name="confirm_password" class="form-control" id="confirm_password" maxlength="100">
                <span class="fa fa-fw fa-eye field-icon toggle-password view_con_pass"></span>
              </div>
            </div>


            <div class="col-sm-6 col-md-6 col-lg-6 col-xl-6 col-12">
              <div class="form-group">
                <label>Assessment In Two Months</label>
                <select class="form-control" name="assessment_in_two_months">
                  <option value="1" {{$coordinators_edit->assessment_in_two_months==1?'selected':''}}>YES</option>
                  <option value="0" {{$coordinators_edit->assessment_in_two_months==0?'selected':''}}>NO</option>
                </select>
              </div>
            </div>


            <!--
            <div class="col-sm-6 col-md-6 col-lg-6 col-xl-6 col-12">
              <div class="form-group">
                <label>Lattitude </label>
                <input type="text" class="form-control" name="lat" class="form-control" id="lat" value="{{$coordinators_edit->getcountry->lat ?? '' }}" readonly>
              </div>
            </div>

            <div class="col-sm-6 col-md-6 col-lg-6 col-xl-6 col-12">
              <div class="form-group">
                <label>Longitude</label>
                <input type="text" class="form-control" name="long" class="form-control" id="long" value="{{$coordinators_edit->getcountry->long ?? ''}}" readonly>
              </div>
            </div> -->



            <div class="col-sm-6 col-md-6 col-lg-6 col-xl-6 col-12">
              <div class="form-group">
                <label>Finalize Country Questionnaire</label>
                <select class="form-control" name="finalize_country_questionnaire">
                  <option value="1" {{$coordinators_edit->finalize_country_questionnaire==1?'selected':''}}>YES</option>
                  <option value="0" {{$coordinators_edit->finalize_country_questionnaire==0?'selected':''}}>NO</option>
                </select>
              </div>
            </div>


            <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 col-12">
              <div class="form-group">
                <label for="status">Status</label>
                <select class="form-control" name="status">
                  <option value="1" {{$coordinators_edit->status==1?'selected':''}}>Active</option>
                  <option value="0" {{$coordinators_edit->status==0?'selected':''}}>Inactive</option>
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

<!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css"> -->

@section('js')
<script src="https://ajax.aspnetcdn.com/ajax/jquery.validate/1.9/jquery.validate.js"></script>
<!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js"></script> -->
<script>
  $(document).ready(function() {
    // $('#country').select2();

    //Set Lat-Long According to country selection
    // $('#country').change(function() {
    //   var selectedCountry = $(this).val();
    //   var opt = $("#country option:selected").data('id');
    //   $("#lat").val(opt.lat);
    //   $("#long").val(opt.long);
    // });


    $('#updateAdminForm').validate({
      ignore: [],
      debug: false,
      rules: {
        name_and_affiliation: {
          required: true
        },
        country: {
          required: true
        },
        email: {
          required: true,
          email: true
        },
        password: {
          minlength: 8
        },
        confirm_password: {
          minlength: 8,
          equalTo: "#password"
        },
        gps_coordination: {
          required: true,
        },
        phone_number: {
          number: true,
        }
      },
      messages: {
        name_and_affiliation: {
          required: "First Name is required"
        },
        country: {
          required: "Country is required"
        },
        email: {
          required: "Email is required",
          email: "Please enter a valid Email"
        },
        password: {
          minlength: "Minimum length should be 8"
        },
        confirm_password: {
          minlength: "Minimum length should be 8",
          equalTo: "Confirm Password must be equal to Password"
        },
        gps_coordination: {
          required: "GPS coordinations required"
        }
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