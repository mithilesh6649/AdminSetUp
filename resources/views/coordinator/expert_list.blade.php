@extends('adminlte::page')

@section('title', 'Coordinator')

@section('content_header')
@stop

<style>
  .form_wrap label {
    font-weight: 600 !important;
  }

  ::placeholder {
    /* Chrome, Firefox, Opera, Safari 10.1+ */
    color: black !important;
  }

  .modal button.close {
    padding: 0px !important;
    margin: -10px 0 0 0 !important;
    background: transparent;
    opacity: 1;
    text-shadow: none;
    position: absolute;
    right: 10px;
    top: 13px;
    font-size: 35px;
  }

  .modal-footer button.btn {
    padding: 7px 30px;
    height: auto;
  }

  .modal button.close:hover {
    color: red;
  }

  .form-group .form-control[name] {
    border: 1px solid #7F8A9E;
    height: 55px;
    border-radius: 10px;
    padding: 15px;
    font-size: 14px;
    line-height: normal;
  }

  .form-group label.error {
    font-weight: normal !important;
  }
</style>

@section('content')
<div class="row">
  <div class="col-md-12">
    <div class="alert d-none" id="flash-message"></div>
    <div class="card">
      <div class="card-header alert d-flex justify-content-between align-items-center">
        <h3>View Expert List</h3>
        <!-- <div style="height: 41px;"></div> -->
        <h3><span style="color: #4b2f60;">COORDINATOR: </span> <a style="border:none; padding:0; background:none;font-size:18px;font-weight:600;color:#000000;" href="{{route('coordinator.view',['id' => Request::segment(4)])}}">{{$coordinator->name_and_affiliation ?? ""}}</a></h3>
        <a class="btn btn-sm btn-success" href="javascript:void(0)" onclick="addExpert()">Add Expert</a>

      </div>

      <div class="card-body">
        @if (session('status'))
        <div class="alert alert-success" role="alert">
          {{ session('status') }}
        </div>
        @endif

        <div class="row mb-5">
          <nav>
            <div class="nav nav-tabs" role="tablist">

              <a class="nav-link" href="{{route('coordinator.view',['id' => Request::segment(4)])}}">
                <svg width="20" height="27" viewBox="0 0 1024 1024" xmlns="http://www.w3.org/2000/svg">
                  <path fill="currentColor" d="M288 320a224 224 0 1 0 448 0 224 224 0 1 0-448 0zm544 608H160a32 32 0 0 1-32-32v-96a160 160 0 0 1 160-160h448a160 160 0 0 1 160 160v96a32 32 0 0 1-32 32z" />
                </svg>
                Coordinator Details
              </a>

              <a class="nav-link active" href="{{route('coordinator.expert_list',['id' => Request::segment(4)])}}">
                <svg width="20" height="27" viewBox="0 0 1024 1024" xmlns="http://www.w3.org/2000/svg">
                  <path fill="currentColor" d="M288 320a224 224 0 1 0 448 0 224 224 0 1 0-448 0zm544 608H160a32 32 0 0 1-32-32v-96a160 160 0 0 1 160-160h448a160 160 0 0 1 160 160v96a32 32 0 0 1-32 32z" />
                </svg>
                Expert List
              </a>

              <a class="nav-link" href="{{route('coordinator.panel_list',['id' => Request::segment(4)])}}">
                <svg fill="#000000" width="20" height="27" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                  <path d="M15.991 2H7.97897C7.44774 2 6.93827 2.21071 6.56263 2.58579C6.187 2.96086 5.97596 3.46957 5.97596 4H14.9895V9H19.997V20H5.97596C5.97596 20.5304 6.187 21.0391 6.56263 21.4142C6.93827 21.7893 7.44774 22 7.97897 22H19.997C20.5282 22 21.0377 21.7893 21.4133 21.4142C21.789 21.0391 22 20.5304 22 20V8L15.991 2Z" />
                  <path d="M13.0165 12.46H8.00901V18H13.0165V12.46Z" />
                  <path d="M13.0165 6H2V11.54H13.0165V6Z" />
                  <path d="M7.00751 12.46H2V18H7.00751V12.46Z" />
                </svg>
                Panel List
              </a>

            </div>
          </nav>
        </div>

        <table style="width:100%" id="experts-list" class="table table-bordered table-hover">
          <thead>
            <tr>
              <th class="display-none"></th>
              <th>Sr.No.</th>
              <th>Image</th>
              <th>Name</th>
              <th>Email</th>
              <th>Occupation</th>
              <th>Affiliation</th>
              <th>Gender</th>
              <th>Created at</th>
              <th>Status</th>

              @if(Gate::check('view_expert') || Gate::check('edit_expert') || Gate::check('delete_expert') )
              <th>{{ __('adminlte::adminlte.actions') }}</th>
              @endif
            </tr>
          </thead>
          <tbody>
            <?php for ($i = 0; $i < count((is_countable($expertlist) ? $expertlist : [])); $i++) {
              $role = \App\Models\Role::where('id', $expertlist[$i]->role_id)->get();
            ?>
              <tr>
                <td class="display-none"></td>
                <td>{{ $i + 1 }}</td>
                <td><img src="{{ asset('/').$expertlist[$i]->profile }}" alt="image"></td>
                <td>{{ $expertlist[$i]->name?? 'N/A' }}</td>
                <td>{{ $expertlist[$i]->email }}</td>
                <td>{{ $expertlist[$i]->occupation ?? 'N/A' }}</td>
                <td>{{ $expertlist[$i]->affiliation ?? 'N/A' }}</td>
                <td>{{ ucfirst($expertlist[$i]->gender) ?? 'N/A' }}</td>
                <td>{{ Carbon\Carbon::parse($expertlist[$i]->created_at)->format('d/m/Y') }} </td>
                <td><span class="text-center {{$expertlist[$i]->status==1?'text-info':'text-danger'}}">{{$expertlist[$i]->status==1?'Active':'Inactive'}}</span></td>

                @if(Gate::check('view_expert') || Gate::check('edit_expert') || Gate::check('delete_expert') )
                <td>
                  @can('view_expert')
                  <a class="action-button" title="View" style="cursor: pointer;" onclick="viewExpert({{$expertlist[$i]}})" href="javascript:void(0)" data-toggle="modal" data-target="#expertDetailModel"><i class="text-info fa fa-eye"></i></a>
                  @endcan
                  @can('edit_expert')
                  <a title="Edit" href="javascript:void(0)" onclick="editExpert({{$expertlist[$i]}})"><i class="text-warning fa fa-edit"></i></a>
                  @endcan
                  @can('delete_expert')
                  <a class="action-button delete-button" title="Delete" href="javascript:void(0)" data-id="{{ $expertlist[$i]->id}}"><i class="text-danger fa fa-trash"></i></a>
                  @endcan
                </td>
                @endif
              </tr>
            <?php } ?>
          </tbody>
          <tfoot>
            <tr>
              <th></th>
              <th>{{ __('adminlte::adminlte.name') }}</th>
              <th>{{ __('adminlte::adminlte.email') }}</th>
              <th>{{ __('adminlte::adminlte.actions') }}</th>
            </tr>
          </tfoot>
        </table>
      </div>
    </div>
  </div>
</div>


<!-- View Expert Detail modal start -->
<div class="modal fade bd-example-modal-lg" id="expertDetailModel" tabindex="-1" role="dialog" aria-labelledby="expertDetailModelTitle" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title" id="expertDetailModelTitle">Expert Details</h4>

        <button type="button" class="close close_expert_detail_model" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>

      </div>
      <div class="modal-body">
        <div class="container-fluid">
          <form class="form_wrap">
            <div class="row">

              <div class="col-sm-6 col-md-6 col-lg-6 col-xl-6 col-12">
                <div class="form-group">
                  <label>Name</label>
                  <input class="form-control expt_mdl_name" placeholder="" readonly>
                </div>
              </div>

              <div class="col-sm-6 col-md-6 col-lg-6 col-xl-6 col-12">
                <div class="form-group">
                  <label>{{ __('adminlte::adminlte.email') }}</label>
                  <input class="form-control expt_mdl_email" placeholder="" readonly>
                </div>
              </div>

              <div class="col-sm-6 col-md-6 col-lg-6 col-xl-6 col-12">
                <div class="form-group">
                  <label>Occupation</label>
                  <input class="form-control expt_mdl_occupation" placeholder="" readonly>
                </div>
              </div>

              <div class="col-sm-6 col-md-6 col-lg-6 col-xl-6 col-12">
                <div class="form-group">
                  <label>Affiliation</label>
                  <input class="form-control expt_mdl_affiliation" placeholder="" readonly>
                </div>
              </div>


              <div class="col-sm-6 col-md-6 col-lg-6 col-xl-6 col-12">
                <div class="form-group">
                  <label>Expertise</label>
                  <textarea class="form-control expt_mdl_expertise" placeholder="" readonly> </textarea>
                </div>
              </div>

              <div class="col-sm-6 col-md-6 col-lg-6 col-xl-6 col-12">
                <div class="form-group">
                  <label>Gender</label>
                  <input class="form-control expt_mdl_gender" placeholder="" readonly>
                </div>
              </div>


              <!-- <div class="col-sm-6 col-md-6 col-lg-6 col-xl-6 col-12">
                <div class="form-group">
                  <label>Phone No</label>
                  <input class="form-control expt_mdl_phone_number" placeholder="" readonly>
                </div>
              </div> -->

              <div class="col-sm-6 col-md-6 col-lg-6 col-xl-6 col-12">
                <div class="form-group">
                  <label>Created At</label>
                  <input class="form-control expt_mdl_created_at" placeholder="" readonly>
                </div>
              </div>

              <div class="col-sm-6 col-md-6 col-lg-6 col-xl-6 col-12">
                <div class="form-group">
                  <label>Status</label>
                  <input class="form-control expt_mdl_status" placeholder="" readonly>
                </div>
              </div>

              <!-- <div class="col-sm-6 col-md-6 col-lg-6 col-xl-6 col-12">
                <div class="form-group">
                  <label>Last Updated At</label>
                  <input class="form-control expt_mdl_updated_at" placeholder="" readonly>
                </div>
              </div> -->

            </div>
          </form>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" data-dismiss="modal" class="btn btn-warning close_expert_detail_model">Close</button>
      </div>
    </div>
  </div>
</div>
<!-- View Expert Detail modal end -->



<!-- Edit Expert Detail modal start -->
<div class="modal fade bd-example-modal-lg" id="editExpertModel">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title" id="editExpertModelTitle">Edit Expert Details</h4>
        <button type="button" class="close" id="close_edit_expert_model" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>

      </div>
      <div class="modal-body">
        <div class="container-fluid">
          <form class="form_wrap" id="updateExpertForm">
            <div class="row">

              <input type="hidden" class="edit_expt_mdl_id" name="id" value="">

              <div class="col-sm-6 col-md-6 col-lg-6 col-xl-6 col-12">
                <div class="form-group">
                  <label>Name<span class="text-danger"> *</span></label>
                  <input type="text" class="form-control edit_expt_mdl_name" name="name" id="name" value="" />
                </div>
              </div>

              <div class="col-sm-6 col-md-6 col-lg-6 col-xl-6 col-12">
                <div class="form-group">
                  <label>{{ __('adminlte::adminlte.email') }}</label>
                  <input type="text" class="form-control edit_expt_mdl_email" name="email" id="email" value="" readonly>
                </div>
              </div>

              <div class="col-sm-6 col-md-6 col-lg-6 col-xl-6 col-12">
                <div class="form-group">
                  <label>Occupation<span class="text-danger"> *</span></label>
                  <input type="text" class="form-control edit_expt_mdl_occupation" name="occupation" id="occupation" value="">
                </div>
              </div>

              <div class="col-sm-6 col-md-6 col-lg-6 col-xl-6 col-12">
                <div class="form-group">
                  <label>Affiliation<span class="text-danger"> *</span></label>
                  <input type="text" class="form-control edit_expt_mdl_affiliation" name="affiliation" id="affiliation" value="">
                </div>
              </div>

              <div class="col-sm-6 col-md-6 col-lg-6 col-xl-6 col-12">
                <div class="form-group">
                  <label>Expertise<span class="text-danger"> *</span></label>
                  <textarea type="text" class="form-control edit_expt_mdl_expertise" name="expertise" id="expertise" value=""> </textarea>
                </div>
              </div>

              <div class="col-sm-6 col-md-6 col-lg-6 col-xl-6 col-12">
                <div class="form-group">
                  <label>Gender<span class="text-danger"> *</span></label>
                  <select class="form-control edit_expt_mdl_gender" name="gender" name="gender">
                    <option value="male">Male</option>
                    <option value="female">Female</option>
                    <option value="other">Other</option>
                  </select>
                </div>
              </div>


              <!-- <div class="col-sm-6 col-md-6 col-lg-6 col-xl-6 col-12">
                <div class="form-group">
                  <label>Phone No</label>
                  <input type="text" class="form-control edit_expt_mdl_phone_number" name="phone_number" value="" id="phone_number" maxlength="15">
                </div>
              </div> -->

              <div class="col-sm-6 col-md-6 col-lg-6 col-xl-6 col-12">
                <div class="form-group">
                  <label>Password</label>
                  <input type="text" class="form-control edit_expt_mdl_password" name="password" id="password" value="" />
                </div>
              </div>

              <div class="col-sm-6 col-md-6 col-lg-6 col-xl-6 col-12">
                <div class="form-group">
                  <label>Confirm New Password</label>
                  <input type="text" class="form-control edit_expt_mdl_confirm_password" name="confirm_password" id="confirm_password" value="" />
                </div>
              </div>


              <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 col-12">
                <div class="form-group">
                  <label>Status</label>
                  <select type="text" class="form-control edit_expt_mdl_status " name="status" id="status">
                    <option value="1">Active</option>
                    <option value="0">Inactive</option>
                  </select>
                </div>
              </div>

            </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="text" class="btn btn-warning close_expert_detail_model">Update</button>
      </div>

      </form>
    </div>
  </div>
</div>
<!-- Edit Expert Detail modal end -->



<!-- Add Expert Detail modal start -->
<div class="modal fade bd-example-modal-lg" id="addExpertModel">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title" id="addExpertModelTitle">Add New Expert</h4>
        <button type="button" class="close" id="close_add_expert_model" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>

      </div>
      <div class="modal-body">
        <div class="container-fluid">
          <form class="form_wrap" id="addExpertForm">
            <div class="row">

              <input type="hidden" name="coordinator_id" value="{{Request::segment(4)}}">

              <div class="col-sm-6 col-md-6 col-lg-6 col-xl-6 col-12">
                <div class="form-group">
                  <label>Name<span class="text-danger"> *</span></label>
                  <input type="text" class="form-control " name="name" id="name" value="" />
                </div>
              </div>

              <div class="col-sm-6 col-md-6 col-lg-6 col-xl-6 col-12">
                <div class="form-group">
                  <label>{{ __('adminlte::adminlte.email') }}<span class="text-danger"> *</span></label>
                  <input type="email" class="form-control " name="email" id="email" value="">
                </div>
              </div>


              <div class="col-sm-6 col-md-6 col-lg-6 col-xl-6 col-12">
                <div class="form-group">
                  <label>Occupation<span class="text-danger"> *</span></label>
                  <input type="text" class="form-control " name="occupation" id="occupation" value="">
                </div>
              </div>


              <div class="col-sm-6 col-md-6 col-lg-6 col-xl-6 col-12">
                <div class="form-group">
                  <label>Affiliation<span class="text-danger"> *</span></label>
                  <input type="text" class="form-control " name="affiliation" id="affiliation" value="">
                </div>
              </div>


              <div class="col-sm-6 col-md-6 col-lg-6 col-xl-6 col-12">
                <div class="form-group">
                  <label>Expertise</label>
                  <textarea type="text" class="form-control " name="expertise" id="expertise" value=""> </textarea>
                </div>
              </div>

              <div class="col-sm-6 col-md-6 col-lg-6 col-xl-6 col-12">
                <div class="form-group">
                  <label>Gender<span class="text-danger"> *</span></label>
                  <select class="form-control " name="gender" name="gender">
                    <option value="male" selected>Male</option>
                    <option value="female">Female</option>
                    <option value="other">Other</option>
                  </select>
                </div>
              </div>

              <div class="col-sm-6 col-md-6 col-lg-6 col-xl-6 col-12">
                <div class="form-group">
                  <label for="password">Password<span class="text-danger"> *</span></label>
                  <div class="input-group">
                    <input type="password" class="form-control" name="password" id="add_password" value="" />
                    <div class="input-group-append">
                      <span class="input-group-text">
                        <i class="fa fa-eye-slash" id="togglePassword"></i>
                      </span>
                    </div>
                  </div>
                  <label for="add_password" generated="false" class="error"></label>
                </div>
              </div>

              <div class="col-sm-6 col-md-6 col-lg-6 col-xl-6 col-12">
                <div class="form-group">
                  <label for="confirm_password">Confirm Password<span class="text-danger"> *</span></label>
                  <div class="input-group">
                    <input type="password" class="form-control" name="confirm_password" id="add_confirm_password" value="" />
                    <div class="input-group-append">
                      <span class="input-group-text">
                        <i class="fa fa-eye" id="toggleCPassword"></i>
                      </span>
                    </div>
                  </div>
                  <label for="add_confirm_password" generated="false" class="error"></label>
                </div>
              </div>

              <!-- 
              <div class="col-sm-6 col-md-6 col-lg-6 col-xl-6 col-12">
                <div class="form-group">
                  <label>Phone No</label>
                  <input type="text" class="form-control " name="phone_number" value="" id="phone_number" maxlength="15">
                </div>
              </div> -->


              <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 col-12">
                <div class="form-group">
                  <label>Status</label>
                  <select type="text" class="form-control  " name="status" id="status">
                    <option value="1">Active</option>
                    <option value="0">Inactive</option>
                  </select>
                </div>
              </div>

            </div>

        </div>
      </div>

      <div class="modal-footer">
        <button type="text" class="btn btn-warning" id="addButton">
          <span class="spinner-border spinner-border-sm d-none" role="status" aria-hidden="true"></span>
          <span id="addButtonText">Add</span>
        </button>
      </div>
    </div>

    </form>
  </div>
</div>
</div>
<!-- Add Expert Detail modal end -->


</div>
@endsection


@section('js')
<script type="text/javascript" src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
<script src="https://ajax.aspnetcdn.com/ajax/jquery.validate/1.9/jquery.validate.js"></script>


<script>
  //Format date
  function dateFormat(date) {
    var date = new Date(date);
    var formattedDate = date.toLocaleDateString("en-US", {
      month: "2-digit",
      day: "2-digit",
      year: "numeric"
    });
    return formattedDate;
  }

  //View expert details in model
  function viewExpert(expert) {
    $('.expt_mdl_name').attr('placeholder', expert.name);
    $('.expt_mdl_email').attr('placeholder', expert.email);
    $('.expt_mdl_affiliation').attr('placeholder', expert.affiliation);
    $('.expt_mdl_occupation').attr('placeholder', expert.occupation);
    $('.expt_mdl_expertise').text(expert.expertise);
    //  $('.expt_mdl_phone_number').attr('placeholder', expert.phone_number ?? 'N/A');
    $('.expt_mdl_gender').attr('placeholder', expert.gender);
    $('.expt_mdl_status').attr('placeholder', expert.status ? "Active" : "Inactive");
    $('.expt_mdl_created_at').attr('placeholder', dateFormat(expert.created_at));
    //$('.expt_mdl_updated_at').attr('placeholder', dateFormat(expert.updated_at));
  }

  //Edit expert details in model
  function editExpert(expert) {
    $('.edit_expt_mdl_id').val(expert.id);
    $('.edit_expt_mdl_name').val(expert.name);
    $('.edit_expt_mdl_email').val(expert.email);
    $('.edit_expt_mdl_affiliation').val(expert.affiliation);
    $('.edit_expt_mdl_occupation').val(expert.occupation);
    $('.edit_expt_mdl_expertise').val(expert.expertise);
    // $('.edit_expt_mdl_phone_number').val(expert.phone_number);
    $('.edit_expt_mdl_gender').val(expert.gender);
    $('.edit_expt_mdl_status').val(expert.status);
    $('#editExpertModel').modal('show');
  }

  //Add expert details in model
  function addExpert(expert) {
    $('#addExpertModel').modal('show');
  }

  $(document).ready(function() {

    $("#togglePassword").click(function() {
      var passwordInput = $("#add_password");
      var passwordFieldType = passwordInput.attr("type");

      if (passwordFieldType === "password") {
        passwordInput.attr("type", "text");
        $(this).removeClass("fa-eye").addClass("fa-eye-slash");
      } else {
        passwordInput.attr("type", "password");
        $(this).removeClass("fa-eye-slash").addClass("fa-eye");
      }
    });

    $("#toggleCPassword").click(function() {
      var passwordInput = $("#add_confirm_password");
      var passwordFieldType = passwordInput.attr("type");

      if (passwordFieldType === "password") {
        passwordInput.attr("type", "text");
        $(this).removeClass("fa-eye").addClass("fa-eye-slash");
      } else {
        passwordInput.attr("type", "password");
        $(this).removeClass("fa-eye-slash").addClass("fa-eye");
      }
    });


    //Close models
    $('#close_edit_expert_model').click(function() {
      $('#editExpertModel').modal('hide');
    });

    $('#close_add_expert_model').click(function() {
      $('#addExpertForm').trigger('reset');
      $('#addExpertModel').modal('hide');
    });

    //Setup expert list datatable
    $('#experts-list').DataTable({
      stateSave: true,
      columnDefs: [{
        targets: 0,
        render: function(data, type, row) {
          return data.substr(0, 2);
        }
      }]
    });

    //Add New expert
    $('#addExpertForm').validate({
      ignore: [],
      debug: false,
      rules: {
        name: {
          required: true
        },
        email: {
          required: true
        },
        password: {
          required: true,
          minlength: 8,
        },
        confirm_password: {
          required: true,
          equalTo: "#add_password",
        },
        affiliation: {
          required: true
        },
        occupation: {
          required: true
        },
        // phone_number: {
        //   number: true,
        // }
        expertise: {
          required: true
        },
      },
      messages: {
        name: {
          required: "Name is required"
        },
        email: {
          required: "Email is required"
        },
        password: {
          required: "Password is required",
          minlength: "Password must be at least {0} characters long"
        },
        confirm_password: {
          required: "Confirm password is required",
          equalTo: "Passwords do not match"
        },
        affiliation: {
          required: "Affiliation is required"
        },
        occupation: {
          required: "Occupation is required"
        },
        expertise: {
          required: "Expertise is required"
        },
      },

      submitHandler: function(form) {
           $("#addButton").prop("disabled", true)
          .find("#addButtonText").text("Adding").end()
          .find(".spinner-border").removeClass("d-none");

        var form = form;
        $.ajax({
          type: "POST",
          url: "{{ route('add_expert') }}",
          data: new FormData(form),
          contentType: false,
          processData: false,
          success: function(response) {
            $("#addButton").prop("disabled", false)
              .find("#addButtonText").text("Add").end()
              .find(".spinner-border").addClass("d-none");
            $('#addExpertForm').trigger('reset');
            $('#addExpertModel').modal('hide');
            swal({
                title: response.message,
                type: response.success ? "success" : "warning",
                timer: 500
              },
              function() {
                if (response.success) {
                  window.location.href = "{{route('coordinator.expert_list',['id' => Request::segment(4)])}}";
                }
              }
            );
          }
        });
      },
    });



    // Reset validations for confirm password field
    $(".edit_expt_mdl_password").on("keyup change", function() {
      $("#updateExpertForm").validate().element(".edit_expt_mdl_confirm_password");
    });

    //Update expert
    $('#updateExpertForm').validate({
      ignore: [],
      debug: false,
      rules: {
        name: {
          required: true
        },
        affiliation: {
          required: true
        },
        occupation: {
          required: true
        },
        expertise: {
          required: true
        },
        // phone_number: {
        //   number: true,
        // },
        password: {
          minlength: 8,
        },
        confirm_password: {
          required: function(element) {
            return $(".edit_expt_mdl_password").val() !== "" ? true : false;
          },
          equalTo: {
            param: "#password",
            depends: function(element) {
              return $(".edit_expt_mdl_password").val() !== "" ? true : false;
            }
          }
        },
      },
      messages: {
        name: {
          required: "Name is required"
        },
        affiliation: {
          required: "Affiliation is required"
        },
        occupation: {
          required: "Occupation is required"
        },
        expertise: {
          required: "Expertise is required"
        },
        password: {
          minlength: "Password must be at least {0} characters long"
        },
        confirm_password: {
          equalTo: "Passwords do not match",
          required: "Confirm Password is required"
        },
      },

      submitHandler: function(form) {
        var form = form;
        $.ajax({
          type: "POST",
          url: "{{ route('edit_expert') }}",
          data: new FormData(form),
          contentType: false,
          processData: false,
          success: function(response) {
            $('#updateExpertForm').trigger('reset');
            $('#editExpertModel').modal('hide');
            swal({
                title: response.message,
                type: "success",
                timer: 500
              },
              function() {
                window.location.href = "{{route('coordinator.expert_list',['id' => Request::segment(4)])}}";
              });
          }
        });
      },
    });

  });

  //Delete Expert
  $('.delete-button').click(function(e) {
    var id = $(this).attr('data-id');
    var obj = $(this);
    swal({
      title: "Are you sure?",
      text: "Are you sure you want to move this Expert to the Recycle Bin?",
      type: "warning",
      showCancelButton: true,
    }, function(willDelete) {
      if (willDelete) {
        $.ajax({
          url: "{{route('delete_expert')}}",
          type: 'post',
          data: {
            id: id
          },
          dataType: "JSON",
          headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          },
          success: function(response) {
            if (response.success == 1) {

              $("#flash-message").css("display", "block");
              $("#flash-message").removeClass("d-none");
              $("#flash-message").addClass("alert-danger");
              $('#flash-message').html('Expert Deleted Successfully');
              obj.parent().parent().remove();
              setTimeout(() => {
                $("#flash-message").addClass("d-none");
              }, 5000);

            } else if (response.success == 2) {
              $("#flash-message").css("display", "block");
              $("#flash-message").removeClass("d-none");
              $("#flash-message").addClass("alert-danger");
              $('#flash-message').html('Expert could not deleted');
              setTimeout(() => {
                $("#flash-message").addClass("d-none");
              }, 5000);
            } else {
              swal("Something went wrong! Please try again.");
            }
          }
        });
      }
    });

  });
</script>
@stop