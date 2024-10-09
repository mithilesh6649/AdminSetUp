@extends('adminlte::page')

@section('title', 'Add Expertise')

@section('content_header')
@stop

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header alert d-flex justify-content-between align-items-center">
                    <h3>Add Expertise</h3>
                    <a class="btn btn-sm btn-success" href="{{ url()->previous() }}">{{ __('adminlte::adminlte.back') }}</a>
                </div>
                <div class="card-body">
                    @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                    @endif
                    <form id="addExpertiseForm" method="post" action="{{ route('save_expertise') }}">
                        @csrf
                        <div class="card-body">
                            <div class="row">

                                <div class="col-sm-6 col-md-6 col-lg-6 col-xl-6 col-12">
                                    <div class="form-group">
                                        <label for="name">Name<span class="text-danger"> *</span></label>
                                        <input type="text" name="name" class="form-control" id="name" value="" maxlength="100">
                                    </div>
                                </div>

                                <div class="col-sm-6 col-md-6 col-lg-6 col-xl-6 col-12">
                                    <div class="form-group">
                                        <label for="status">Status</label>
                                        <select class="form-control" name="status">
                                            <option value="1" selected>Active</option>
                                            <option value="0">Inactive</option>
                                        </select>
                                    </div>
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
</div>
@endsection

@section('css')
@stop

@section('js')
<script src="https://ajax.aspnetcdn.com/ajax/jquery.validate/1.9/jquery.validate.js"></script>
<script>
    $(document).ready(function() {

        $('#addExpertiseForm ').validate({
            ignore: [],
            debug: false,
            rules: {
                name: {
                    required: true
                },
            },
            messages: {
                name: {
                    required: "Name is required"
                },
            }
        });
    });
</script>
@stop