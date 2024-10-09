@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
<h1>Dashboard</h1>
@stop

@section('content')
<!-- Main content -->
<section class="content">
  <!-- Small boxes (Stat box) -->
  <div class="row">
    <div class="col-md-3 col-lg-3 col-xl-3 col-12">
      <div class="small-box">
        <div class="inner">
          <div class="left">
            <img src="https://server3.rvtechnologies.in/Field-Vision/Admin/public/images/admin-too.svg" alt="">
          </div>
          <div class="right">
            <p>Admins</p>
            <h3>{{$admincounts}}</h3>
          </div>
        </div>
        <a href="{{ route('admins_list') }}" class="small-box-footer">
          More Info
        </a>
      </div>
    </div>


    <div class="col-md-3 col-lg-3 col-xl-3 col-12">
      <div class="small-box">
        <div class="inner">
          <div class="left">
            <img src="https://server3.rvtechnologies.in/Field-Vision/Admin/public/images/reviewer-too.svg" alt="" style="width: auto;">
          </div>
          <div class="right">
            <p>Coordinators</p>
            <h3>{{App\Models\User::where('user_type',1)->count()}}</h3>
          </div>
        </div>
        <a href="{{ route('coordinator.list') }}" class="small-box-footer">
          More Info
        </a>
      </div>
    </div>

    <div class="col-md-3 col-lg-3 col-xl-3 col-12">
      <div class="small-box">
        <div class="inner">
          <div class="left">
            <img src="https://server3.rvtechnologies.in/Field-Vision/Admin/public/images/support.svg" alt="">
          </div>
          <div class="right">
            <p>Help & Support</p>
            <h3>{{\App\Models\HelpAndSupport::count()}}</h3>
          </div>
        </div>
        <a href="{{ route('feed.help-support.list') }}" class="small-box-footer">
          More Info
        </a>
      </div>
    </div>


    <div class="col-md-3 col-lg-3 col-xl-3 col-12">
      <div class="small-box">
        <div class="inner">
          <div class="left">
            <img src="https://server3.rvtechnologies.in/Field-Vision/Admin/public/images/website.svg" alt="">
          </div>
          <div class="right">
            <p>Website</p>
            <h3>{{\App\Models\Page::where(['device_type'=>'web','status'=>1])->get()->count()}}</h3>
          </div>
        </div>
        <a href="{{ route('website_pages_list') }}" class="small-box-footer">
          More Info
        </a>
      </div>
    </div>


    <div class="col-md-3 col-lg-3 col-xl-3 col-12">
      <div class="small-box">
        <div class="inner">
          <div class="left">
            <img src="https://server3.rvtechnologies.in/Field-Vision/Admin/public/images/mobile.svg" alt="" style="width: auto;">
          </div>
          <div class="right">
            <p>Mobile</p>
            <h3>{{\App\Models\Page::where(['device_type'=>'mobile','status'=>1])->get()->count()}}</h3>
          </div>
        </div>
        <a href="{{ route('mobile_pages_list') }}" class="small-box-footer">
          More Info
        </a>
      </div>
    </div>

   

  </div>
</section>
@endsection