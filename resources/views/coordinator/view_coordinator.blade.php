@extends('adminlte::page')

@section('title', 'view Coordinator Details')

@section('content_header')
@stop

@section('content')
<div class="row">
  <div class="col-md-12">
    <div class="card">
      <div class="card-header alert d-flex justify-content-between align-items-center">
        <h3>View Coordinator Details</h3>
        <a class="btn btn-sm btn-success" href="{{ url()->previous() }}">{{ __('adminlte::adminlte.back') }}</a>

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

              <a class="nav-link active" href="#">
                <svg width="20" height="27" viewBox="0 0 1024 1024" xmlns="http://www.w3.org/2000/svg">
                  <path fill="currentColor" d="M288 320a224 224 0 1 0 448 0 224 224 0 1 0-448 0zm544 608H160a32 32 0 0 1-32-32v-96a160 160 0 0 1 160-160h448a160 160 0 0 1 160 160v96a32 32 0 0 1-32 32z" />
                </svg>
                Coordinator Details
              </a>


              <a class="nav-link" href="{{route('coordinator.expert_list',['id' => Request::segment(4)])}}">
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

        <form class="form_wrap">
          <div class="row">

            <div class="col-sm-6 col-md-6 col-lg-6 col-xl-6 col-12">
              <div class="form-group">
                <label>{{ __('adminlte::adminlte.email') }}</label>
                <input class="form-control" placeholder="{{ $coordinator->email }}" readonly>
              </div>
            </div>

            <div class="col-sm-6 col-md-6 col-lg-6 col-xl-6 col-12">
              <div class="form-group">
                <label>Name & Affiliation</label>
                <input class="form-control" placeholder="{{ $coordinator->name_and_affiliation??'N/A' }}" readonly>
              </div>
            </div>

            <!-- <div class="col-sm-6 col-md-6 col-lg-6 col-xl-6 col-12">
              <div class="form-group">
                <label>Phone No</label>
                <input class="form-control" placeholder="{{ $coordinator->phone_number?? ' N/A' }}" readonly>
              </div>
            </div> -->

            <div class="col-sm-6 col-md-6 col-lg-6 col-xl-6 col-12">
              <div class="form-group">
                <label>Country</label>
                <input class="form-control" placeholder="{{ $coordinator->getcountry->country_name ??'N/A' }}" readonly>
              </div>
            </div>

            <!-- <div class="col-sm-6 col-md-6 col-lg-6 col-xl-6 col-12">
              <div class="form-group">
                <label>GPS Coordination</label>
                <input class="form-control" placeholder="{{ $coordinator->gps_coordination??'N/A' }}" readonly>
              </div>
            </div> -->

            @foreach($coordinator->getUserRegion as $key => $value)
            <div class="col-sm-6 col-md-6 col-lg-6 col-xl-6 col-12">
              <div class="form-group">
                <label>GPS Coordination {{$key+1}}</label>

                <input class="form-control" placeholder="{{ @$value->region->lat.' , '.@$value->region->long }}" readonly>
              </div>
            </div>
            @endforeach

            <!-- 
            <div class="col-sm-6 col-md-6 col-lg-6 col-xl-6 col-12">
              <div class="form-group">
                <label>Lattitude</label>
                <input class="form-control" placeholder="{{ $coordinator->getcountry->lat ??'N/A'}}" readonly>
              </div>
            </div>

            <div class="col-sm-6 col-md-6 col-lg-6 col-xl-6 col-12">
              <div class="form-group">
                <label>Longitude</label>
                <input class="form-control" placeholder="{{ $coordinator->getcountry->long ??'N/A' }}" readonly>
              </div>
            </div> -->

            <div class="col-sm-6 col-md-6 col-lg-6 col-xl-6 col-12">
              <div class="form-group">
                <label>Assessment In Two Months</label>
                <input class="form-control" placeholder="{{ $coordinator->assessment_in_two_months ? 'YES' : 'NO' }}" readonly>
              </div>
            </div>

            <div class="col-sm-6 col-md-6 col-lg-6 col-xl-6 col-12">
              <div class="form-group">
                <label>Finalize Country Questionnaire</label>
                <input class="form-control" placeholder="{{ $coordinator->finalize_country_questionnaire ? 'YES' : 'NO' }}" readonly>
              </div>
            </div>

            <div class="col-sm-6 col-md-6 col-lg-6 col-xl-6 col-12">
              <div class="form-group">
                <label>{{ __('adminlte::adminlte.created_date') }}</label>
                <input class="form-control" placeholder="{{Carbon\Carbon::parse($coordinator->created_at)->format('d/m/Y') ?? '' }}" readonly>
              </div>
            </div>

            <!-- <div class="col-sm-6 col-md-6 col-lg-6 col-xl-6 col-12">
              <div class="form-group">
                <label>Updated Date</label>
                <input class="form-control" placeholder="{{ $coordinator->created_at ? date('m/d/Y', strtotime($coordinator->created_at)) : '' }}" readonly>
              </div>
            </div> -->

            <div class="col-sm-6 col-md-6 col-lg-6 col-xl-6 col-12">
              <div class="form-group">
                <label>Status</label>
                <input class="form-control" placeholder="{{ $coordinator->status==1?'Active':'Inactive'}}" readonly>
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
@stop

@section('js')
@stop