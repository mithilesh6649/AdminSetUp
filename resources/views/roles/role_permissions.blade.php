@extends('adminlte::page')

@section('title', 'Role Permissions')

@section('content_header')
@stop

@section('content')
<div class="row">
  <div class="col-md-12">
    <div class="card">
      <div class="card-header alert d-flex justify-content-between align-items-center">
        <a class="btn btn-sm btn-success back-button" href="{{ url()->previous() }}">{{ __('adminlte::adminlte.back') }}</a>
        <h3>{{ __('adminlte::adminlte.role_permissions') }}</h3>
      </div>
      <div class="card-body pb-3">
        @if (session('status'))
        <div class="alert alert-success" role="alert">
          {{ session('status') }}
        </div>
        @endif
        <form id="addRoleForm" method="post" , action="{{ route('save_permissions') }}">
          @csrf
          <div class="role-name">
            <div class="row">
              <div class="col-sm-12">
                <div class="form-group">
                  <label for="role_name">{{ __('adminlte::adminlte.role_name') }}</label>
                  <input type="hidden" name="role_id" id="role_id">
                  <select name="role_name" class="form-control" id="role_name" required data-msg="Please select a role">
                    <option value="" hidden>Select Role</option>
                    @foreach($roles as $role)
                    <option value="{{ $role->id }}">{{ $role->name }}</option>
                    @endforeach
                  </select>
                  @if($errors->has('role_name'))
                  <div class="error">{{ $errors->first('role_name') }}</div>
                  @endif
                </div>
              </div>
            </div>
          </div>

          <div class="role-permissions" id="role-permissions">
            <label for="permissions[]" class="label">{{ __('adminlte::adminlte.permissions') }}</label>
            <label id="permissions[]-error" class="error" for="permissions[]" style="font-weight: 400 !important;"></label>
            <br>
            @if($errors->has('permissions'))
            <div class="error">{{ $errors->first('permissions') }}</div>
            @endif

            <div class="custom_check_wrap">
              <div class="custom-check">
                <input type="checkbox" id="full_access" class="">
                <span></span>
              </div>
              <strong>FULL ACCESS</strong>
            </div>

            <div class="title">
              <h5>Users Management</h5>
              <hr />
            </div>

            <div class="row permissions-section">
              <div class="col-4">
                <div class="form-group">
                  <div class="permissions-section-inner-sec">
                    <p class="headings"><strong class="list-text">Coordinator</strong></p>
                    <div class="custom_check_wrap">
                      <div class="custom-check">
                        <input type="checkbox" id="coordinator_permissions" class="ckbCheckAll">
                        <span></span>
                      </div>
                      <strong class="list-text">Select All</strong>
                    </div>
                    <div id="checkBoxes">
                      @foreach($coordinatorPermissions as $permission)
                      <div class="custom_check_wrap">
                        <div class="custom-check">
                          <input type="checkbox" class="checkBoxClass coordinatorcheckBox" name="permissions[]" value="{{ $permission->id }}" id="button_{{ $permission->id }}">
                          <span></span>
                        </div>
                        <label class="mb-0">{{ $permission->name }}</label>
                      </div>
                      @endforeach
                    </div>
                  </div>
                </div>
              </div>

              <div class="col-4">
                <div class="form-group">
                  <div class="permissions-section-inner-sec">
                    <p class="headings"><strong class="list-text">Admins</strong></p>
                    <div class="custom_check_wrap">
                      <div class="custom-check">
                        <input type="checkbox" id="admins_permissions" class="ckbCheckAll">
                        <span></span>
                      </div>
                      <strong class="list-text">Select All</strong>
                    </div>
                    <div id="checkBoxes">
                      @foreach($adminsPermissions as $permission)
                      <div class="custom_check_wrap">
                        <div class="custom-check">
                          <input type="checkbox" class="checkBoxClass adminscheckBox" name="permissions[]" value="{{ $permission->id }}" id="button_{{ $permission->id }}">
                          <span></span>
                        </div>
                        <label class="mb-0">{{ $permission->name }}</label>
                      </div>
                      @endforeach
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>

          <div class="title">
            <h5>Content Management</h5>
            <hr />
          </div>

          <div class="row permissions-section">
            <div class="col-4">
              <div class="form-group">
                <div class="permissions-section-inner-sec">
                  <p class="headings"><strong class="list-text">Website</strong></p>
                  <div class="custom_check_wrap">
                    <div class="custom-check">
                      <input type="checkbox" id="website_permissions" class="ckbCheckAll">
                      <span></span>
                    </div>
                    <strong class="list-text">Select All</strong>
                  </div>
                  <div id="checkBoxes">
                    @foreach($websitePagesPermissions as $permission)
                    <div class="custom_check_wrap">
                      <div class="custom-check">
                        <input type="checkbox" class="checkBoxClass websitecheckBox" name="permissions[]" value="{{ $permission->id }}" id="button_{{ $permission->id }}">
                        <span></span>
                      </div>
                      <label class="mb-0">{{ $permission->name }}</label>
                    </div>
                    @endforeach
                  </div>
                </div>
              </div>
            </div>

            <div class="col-4">
              <div class="form-group">
                <div class="permissions-section-inner-sec">
                  <p class="headings"><strong class="list-text">Mobile</strong></p>
                  <div class="custom_check_wrap">
                    <div class="custom-check">
                      <input type="checkbox" id="mobile_permissions" class="ckbCheckAll">
                      <span></span>
                    </div>
                    <strong class="list-text">Select All</strong>
                  </div>
                  <div id="checkBoxes">
                    @foreach($mobilePagesPermissions as $permission)
                    <div class="custom_check_wrap">
                      <div class="custom-check">
                        <input type="checkbox" class="checkBoxClass mobilecheckBox" name="permissions[]" value="{{ $permission->id }}" id="button_{{ $permission->id }}">
                        <span></span>
                      </div>
                      <label class="mb-0">{{ $permission->name }}</label>
                    </div>
                    @endforeach
                  </div>
                </div>
              </div>
            </div>

            <div class="col-4">
              <div class="form-group">
                <div class="permissions-section-inner-sec">
                  <p class="headings"><strong class="list-text">Media</strong></p>
                  <div class="custom_check_wrap">
                    <div class="custom-check">
                      <input type="checkbox" id="media_permissions" class="ckbCheckAll">
                      <span></span>
                    </div>
                    <strong class="list-text">Select All</strong>
                  </div>
                  <div id="checkBoxes">
                    @foreach($mobilemediaPermissions as $permission)
                    <div class="custom_check_wrap">
                      <div class="custom-check">
                        <input type="checkbox" class="checkBoxClass mediacheckBox" name="permissions[]" value="{{ $permission->id }}" id="button_{{ $permission->id }}">
                        <span></span>
                      </div>
                      <label class="mb-0">{{ $permission->name }}</label>
                    </div>
                    @endforeach
                  </div>
                </div>
              </div>
            </div>
          </div>

          <!-- <div class="title">
                  <h5>Users Feedback</h5>
                  <hr/>
                </div>

                <div class="row permissions-section">
                  <div class="col-4">
                    <div class="form-group">
                      <div class="permissions-section-inner-sec">
                        <p class="headings"><strong class="list-text">Help And Support</strong></p>
                        <div class="custom_check_wrap">
                          <div class="custom-check">
                            <input type="checkbox" id="helpsp_permissions" class="ckbCheckAll">
                            <span></span>
                          </div>
                            <strong class="list-text">Select All</strong>
                        </div>
                        <div id="checkBoxes">
                          @foreach($helpsupportPermissions as $permission)
                            <div class="custom_check_wrap">
                              <div class="custom-check">
                                <input type="checkbox" class="checkBoxClass helpspcheckBox" name="permissions[]" value="{{ $permission->id }}" id="button_{{ $permission->id }}">
                                <span></span>
                              </div>
                                <label class="mb-0">{{ $permission->name }}</label>
                            </div>
                          @endforeach
                        </div>
                      </div>
                    </div>
                  </div>
                </div> -->



          <!-- <div class="title">
                  <h5>Misc Data Management</h5>
                  <hr/>
                </div>
                <div class="row permissions-section">
                  <div class="col-4">
                    <div class="form-group">
                      <div class="permissions-section-inner-sec">
                        <p class="headings"><strong class="list-text">Brands</strong></p>
                        <div class="custom_check_wrap">
                          <div class="custom-check">
                            <input type="checkbox" id="brands_permissions" class="ckbCheckAll">
                            <span></span>
                          </div>
                            <strong class="list-text">Select All</strong>
                        </div>
                        <div id="checkBoxes">
                          @foreach($brandsPermissions as $permission)
                            <div class="custom_check_wrap">
                              <div class="custom-check">
                                <input type="checkbox" class="checkBoxClass brandscheckBox" name="permissions[]" value="{{ $permission->id }}" id="button_{{ $permission->id }}">
                                <span></span>
                              </div>
                              <label class="mb-0">{{ $permission->name }}</label>
                            </div>
                          @endforeach
                        </div>
                      </div>
                    </div>
                  </div>
                </div> -->



          <div class="title">
            <h5>Access Control</h5>
            <hr />
          </div>

          <div class="row permissions-section">
            <div class="col-4">
              <div class="form-group">
                <div class="permissions-section-inner-sec">
                  <p class="headings"><strong class="list-text">Roles</strong></p>
                  <div class="custom_check_wrap">
                    <div class="custom-check">
                      <input type="checkbox" id="roles_permissions" class="ckbCheckAll">
                      <span></span>
                    </div>
                    <strong class="list-text">Select All</strong>
                  </div>
                  <div id="checkBoxes">
                    @foreach($rolesPermissions as $permission)
                    <div class="custom_check_wrap">
                      <div class="custom-check">
                        <input type="checkbox" class="checkBoxClass rolescheckBox" name="permissions[]" value="{{ $permission->id }}" id="button_{{ $permission->id }}">
                        <span></span>
                      </div>
                      <label class="mb-0">{{ $permission->name }}</label>
                    </div>
                    @endforeach
                  </div>
                </div>
              </div>
            </div>
            <div class="col-4">
              <div class="form-group">
                <div class="permissions-section-inner-sec">
                  <p class="headings"><strong class="list-text">Permissions</strong></p>
                  <div class="custom_check_wrap">
                    <div class="custom-check">
                      <input type="checkbox" id="access_permissions" class="ckbCheckAll">
                      <span></span>
                    </div>
                    <strong class="list-text">Select All</strong>
                  </div>
                  <div id="checkBoxes">
                    @foreach($accessPermissions as $permission)
                    <div class="custom_check_wrap">
                      <div class="custom-check">
                        <input type="checkbox" class="checkBoxClass accesscheckBox" name="permissions[]" value="{{ $permission->id }}" id="button_{{ $permission->id }}">
                        <span></span>
                      </div>
                      <label class="mb-0">{{ $permission->name }}</label>
                    </div>
                    @endforeach
                  </div>
                </div>
              </div>
            </div>
          </div>

          <div class="title">
            <h5>Recycle Bin</h5>
            <hr />
          </div>

          <div class="row permissions-section">
            <div class="col-6">
              <div class="form-group">
                <div class="permissions-section-inner-sec">
                  <div class="custom_check_wrap">
                    <div class="custom-check">
                      <input type="checkbox" id="restore_permissions" class="ckbCheckAll">
                      <span></span>
                    </div>
                    <strong class="list-text">Select All</strong>
                  </div>
                  <div id="checkBoxes">
                    @foreach($allRecyledPermissions as $permission)

                    <div class="custom_check_wrap">
                      <div class="custom-check">
                        <input type="checkbox" class="checkBoxClass restorecheckBox" name="permissions[]" value="{{ $permission->id }}" id="button_{{ $permission->id }}">
                        <span></span>
                      </div>
                      <label class="mb-0">{{ $permission->name }}</label>
                    </div>
                    @endforeach
                  </div>
                </div>
              </div>
            </div>
          </div>
      </div>
      <!-- /.card-body -->
      <div class="card-footer pt-0 mb-4">
        <button type="submit" class="btn btn-primary">{{ __('adminlte::adminlte.save') }}</button>
      </div>
      </form>
    </div>
  </div>
</div>
</div>
@endsection

@section('css')
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
<style>
  strong.list-text {
    position: relative;
    left: -8px;
    top: -3px;
  }

  span.list-text {
    position: relative;
    left: -8px;
    top: -3px;
  }

  /* .role-permissions { display:none; } */
</style>
@stop

@section('js')
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<script>
  $(document).ready(function() {
    checkAll();
    $("input[type='checkbox']").change(function() {
      checkAll();
    });
    $("#role_name").change(function() {
      $('input').filter(':checkbox').prop('checked', false);
      var role = $(this);
      $("#role_id").val(role.val());
      $(".checkBoxClass").removeAttr('checked');
      var id = $("#role_name").val();
      $.ajax({
        url: "{{ route('get_role_permissions') }}",
        type: 'post',
        data: {
          role_id: id
        },
        dataType: "JSON",
        headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        success: function(res) {
          for (let i = 0; i < res.length; i++) {
            const response = res[i];
            var permissionId = "#button_" + response.permission_id;
            $(permissionId).prop('checked', 'true');
            checkAll();
          }
        }
      });
    });

    $('#addRoleForm').validate({
      ignore: [],
      debug: false,
      rules: {
        role_name: {
          required: true
        },
        "permissions[]": {
          required: true
        }
      },
      messages: {
        role_name: {
          required: "The Role Name field is required."
        },
        "permissions[]": {
          required: "You must select at least one permission.",
        }
      }
    });
  });

  function checkAll() {
    $("#full_access").click(function() {
      $("input[type=checkbox]").prop('checked', this.checked)
    })
    $("#appusers_permissions").click(function() {
      $(".appUserscheckBox").prop('checked', this.checked)
    })
    $("#coordinator_permissions").click(function() {
      $(".coordinatorcheckBox").prop('checked', this.checked)
    })
    $("#restore_permissions").click(function() {
      $(".rolescheckBox").prop('checked', this.checked)
    })
    $("#reviews_permissions").click(function() {
      $(".reviewcheckBox").prop('checked', this.checked)
    })
    $("#news_permissions").click(function() {
      $(".newscheckBox").prop('checked', this.checked)
    })
    $("#feedback_permissions").click(function() {
      $(".feedbackcheckBox").prop('checked', this.checked)
    })
    $("#admins_permissions").click(function() {
      $(".adminscheckBox").prop('checked', this.checked)
    })
    $("#groups_permissions").click(function() {
      $(".groupscheckBox").prop('checked', this.checked)
    })
    $("#groups_polls_permissions").click(function() {
      $(".groupsPollscheckBox").prop('checked', this.checked)
    })
    $("#groups_messages_permissions").click(function() {
      $(".groupsMessagescheckBox").prop('checked', this.checked)
    })
    $("#groups_search_history_permissions").click(function() {
      $(".groupsSearchHistorycheckBox").prop('checked', this.checked)
    })
    $("#wants_permissions").click(function() {
      $(".wantscheckBox").prop('checked', this.checked)
    })
    $("#wants_reported_permissions").click(function() {
      $(".wantsReportedcheckBox").prop('checked', this.checked)
    })
    $("#wants_discussion_reported_permissions").click(function() {
      $(".wantsDiscussionReportedcheckBox").prop('checked', this.checked)
    })
    $("#mobile_permissions").click(function() {
      $(".mobilecheckBox").prop('checked', this.checked)
    })
    $("#website_permissions").click(function() {
      $(".websitecheckBox").prop('checked', this.checked)
    })

    $("#media_permissions").click(function() {
      $(".mediacheckBox").prop('checked', this.checked)
    })

    $("#helpsp_permissions").click(function() {
      $(".helpspcheckBox").prop('checked', this.checked)
    })

    $("#brands_permissions").click(function() {
      $(".brandscheckBox").prop('checked', this.checked)
    })

    $("#roles_permissions").click(function() {
      $(".rolescheckBox").prop('checked', this.checked)
    })
    $("#access_permissions").click(function() {
      $(".accesscheckBox").prop('checked', this.checked)
    })
    $("#restore_permissions").click(function() {

      $(".restorecheckBox").prop('checked', this.checked)
    })


    ////////////////////////////////////////

    if ($('.checkBoxClass:checked').length == $('.checkBoxClass').length) {
      $("#full_access").prop('checked', 'true');
    } else {
      $("#full_access").prop('checked', false);
    }
    if ($('.appUserscheckBox:checked').length == $('.appUserscheckBox').length) {
      $("#appusers_permissions").prop('checked', 'true');
    } else {
      $("#appusers_permissions").prop('checked', false);
    }
    if ($('.coordinatorcheckBox:checked').length == $('.coordinatorcheckBox').length) {
      $("#coordinator_permissions").prop('checked', 'true');
    } else {
      $("#coordinator_permissions").prop('checked', false);
    }

    $("#restore_permissions").click(function() {
      $(".rolescheckBox").prop('checked', this.checked)
    })

    if ($('.rolescheckBox:checked').length == $('.rolescheckBox').length) {
      $("#restore_permissions").prop('checked', 'true');
    } else {
      $("#restore_permissions").prop('checked', false);
    }

    if ($('.adminscheckBox:checked').length == $('.adminscheckBox').length) {
      $("#admins_permissions").prop('checked', 'true');
    } else {
      $("#admins_permissions").prop('checked', false);
    }
    if ($('.reviewcheckBox:checked').length == $('.reviewcheckBox').length) {
      $("#reviews_permissions").prop('checked', 'true');
    } else {
      $("#reviews_permissions").prop('checked', false);
    }
    if ($('.groupscheckBox:checked').length == $('.groupscheckBox').length) {
      $("#groups_permissions").prop('checked', 'true');
    } else {
      $("#groups_permissions").prop('checked', false);
    }
    if ($('.groupsPollscheckBox:checked').length == $('.groupsPollscheckBox').length) {
      $("#groups_polls_permissions").prop('checked', 'true');
    } else {
      $("#groups_polls_permissions").prop('checked', false);
    }
    if ($('.groupsMessagescheckBox:checked').length == $('.groupsMessagescheckBox').length) {
      $("#groups_messages_permissions").prop('checked', 'true');
    } else {
      $("#groups_messages_permissions").prop('checked', false);
    }
    if ($('.groupsSearchHistorycheckBox:checked').length == $('.groupsSearchHistorycheckBox').length) {
      $("#groups_search_history_permissions").prop('checked', 'true');
    } else {
      $("#groups_search_history_permissions").prop('checked', false);
    }
    if ($('.wantscheckBox:checked').length == $('.wantscheckBox').length) {
      $("#wants_permissions").prop('checked', 'true');
    } else {
      $("#wants_permissions").prop('checked', false);
    }
    if ($('.wantsReportedcheckBox:checked').length == $('.wantsReportedcheckBox').length) {
      $("#wants_reported_permissions").prop('checked', 'true');
    } else {
      $("#wants_reported_permissions").prop('checked', false);
    }
    if ($('.wantsDiscussionReportedcheckBox:checked').length == $('.wantsDiscussionReportedcheckBox').length) {
      $("#wants_discussion_reported_permissions").prop('checked', 'true');
    } else {
      $("#wants_discussion_reported_permissions").prop('checked', false);
    }
    if ($('.mobilecheckBox:checked').length == $('.mobilecheckBox').length) {
      $("#mobile_permissions").prop('checked', 'true');
    } else {
      $("#mobile_permissions").prop('checked', false);
    }
    if ($('.mediacheckBox:checked').length == $('.mediacheckBox').length) {
      $("#media_permissions").prop('checked', 'true');
    } else {
      $("#media_permissions").prop('checked', false);
    }

    if ($('.helpspcheckBox:checked').length == $('.helpspcheckBox').length) {
      $("#helpsp_permissions").prop('checked', 'true');
    } else {
      $("#helpsp_permissions").prop('checked', false);
    }

    if ($('.rolescheckBox:checked').length == $('.rolescheckBox').length) {
      $("#roles_permissions").prop('checked', 'true');
    } else {
      $("#roles_permissions").prop('checked', false);
    }
    if ($('.accesscheckBox:checked').length == $('.accesscheckBox').length) {
      $("#access_permissions").prop('checked', 'true');
    } else {
      $("#access_permissions").prop('checked', false);
    }
    if ($('.restorecheckBox:checked').length == $('.restorecheckBox').length) {
      $("#restore_permissions").prop('checked', 'true');
    } else {
      $("#restore_permissions").prop('checked', false);
    }

    if ($('.feedbackcheckBox:checked').length == $('.feedbackcheckBox').length) {
      $("#feedback_permissions").prop('checked', 'true');
    } else {
      $("#feedback_permissions").prop('checked', false);
    }

    if ($('.brandscheckBox:checked').length == $('.brandscheckBox').length) {
      $("#brands_permissions").prop('checked', 'true');
    } else {
      $("#brands_permissions").prop('checked', false);
    }


    /*
    if($('.rolescheckBox:checked').length == $('.rolescheckBox').length) {
      $("#roles_permissions").prop('checked', 'true');
    }
    else {
      $("#roles_permissions").prop('checked', false);
    }
    if($('.accesscheckBox:checked').length == $('.accesscheckBox').length) {
      $("#access_permissions").prop('checked', 'true');
    }
    else {
      $("#access_permissions").prop('checked', false);
    }
    if($('.restorecheckBox:checked').length == $('.restorecheckBox').length) {
      $("#restore_permissions").prop('checked', 'true');
    }
    else {
      $("#restore_permissions").prop('checked', false);
    }*/
    if ($('.websitecheckBox:checked').length == $('.websitecheckBox').length) {
      $("#website_permissions").prop('checked', 'true');
    } else {
      $("#website_permissions").prop('checked', false);
    }
    
  }
</script>
@stop