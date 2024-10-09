@extends('adminlte::auth.auth-page', ['auth_type' => 'login'])

@section('adminlte_css_pre')

@stop

@php( $login_url = View::getSection('login_url') ?? config('adminlte.login_url', 'login') )
@php( $register_url = View::getSection('register_url') ?? config('adminlte.register_url', 'register') )
@php( $password_reset_url = View::getSection('password_reset_url') ?? config('adminlte.password_reset_url', 'password/reset') )

@if (config('adminlte.use_route_url', false))
    @php( $login_url = $login_url ? route($login_url) : '' )
    @php( $register_url = $register_url ? route($register_url) : '' )
    @php( $password_reset_url = $password_reset_url ? route($password_reset_url) : '' )
@else
    @php( $login_url = $login_url ? url($login_url) : '' )
    @php( $register_url = $register_url ? url($register_url) : '' )
    @php( $password_reset_url = $password_reset_url ? url($password_reset_url) : '' )
@endif


@section('auth_body')
    <div class="login_wrap">
        <div class="header">
            <div class="left">
                <h4 class="card-title float-none text-center">Admin Panel</h4>
            </div>
            <div class="right">
                <div class="login-logo-inner pb-0">
                    <a href="/">
                        <!-- <img src="{{asset('assets/images/admin-logo.png')}}" alt="image" height="100" > -->
                    </a>
                </div>
            </div>
        </div>
        <p>Please enter your details.</p>
        <form action="{{ $login_url }}" method="post" id="loginForm" class="position-relative">
            {{ csrf_field() }}

            {{-- Email field --}}
            <div class="mb-3 email position-relative">
            <svg width="23" height="16" viewBox="0 0 23 16" fill="none" xmlns="http://www.w3.org/2000/svg">
              <path d="M20.7904 0.500016H2.29281C1.72907 0.500792 1.18851 0.716763 0.790009 1.10045C0.391333 1.48414 0.167245 2.00454 0.166626 2.5471V13.6196C0.166948 14.1525 0.384098 14.6641 0.771809 15.0445C0.778257 15.0515 0.780514 15.0605 0.786963 15.0675C0.793411 15.0745 0.802117 15.0751 0.808565 15.0814H0.808726C1.20466 15.4561 1.73763 15.6662 2.29283 15.6667H20.7904C21.3433 15.6664 21.8739 15.4578 22.2687 15.0856C22.2774 15.078 22.2889 15.0758 22.2976 15.0676C22.3063 15.0592 22.3098 15.0461 22.3185 15.0363L22.3187 15.0361C22.7016 14.6566 22.916 14.1486 22.9166 13.6196V2.54708C22.916 2.00452 22.6919 1.48412 22.2932 1.10043C21.8947 0.716739 21.3542 0.500755 20.7904 0.5L20.7904 0.500016ZM20.7904 1.54264C20.9341 1.54311 21.0762 1.57197 21.2078 1.62751L12.1474 7.74902C11.9713 7.86802 11.7614 7.93179 11.5464 7.93179C11.3313 7.93179 11.1216 7.86802 10.9456 7.74902L1.87524 1.62791C2.00663 1.57174 2.14882 1.54258 2.29261 1.54242L20.7904 1.54264ZM2.29281 14.6241C2.20979 14.6234 2.12709 14.6128 2.04648 14.5928L5.12897 11.6283C5.33436 11.4238 5.33162 11.0987 5.12269 10.8975C4.91392 10.6963 4.57603 10.6933 4.3634 10.8909L1.28169 13.8525C1.26154 13.7757 1.2509 13.6969 1.24993 13.6176V2.54713C1.24993 2.52557 1.25493 2.5054 1.25638 2.48383L10.3238 8.60494C10.6809 8.84481 11.106 8.97266 11.5414 8.97126C11.9799 8.97235 12.4083 8.8445 12.7692 8.60494L21.8267 2.48383C21.8267 2.5054 21.8332 2.52557 21.8332 2.54713V13.6196C21.8325 13.6985 21.8219 13.777 21.8014 13.8531L18.7212 10.8886C18.5085 10.6913 18.1706 10.6942 17.9619 10.8953C17.7529 11.0965 17.7502 11.4217 17.9556 11.6262L21.0381 14.5929V14.5927C20.957 14.6127 20.8738 14.6231 20.7903 14.6241L2.29281 14.6241Z" fill="#181725"></path>
            </svg>
            <input type="email" class="form-control valid" name="email" id="email" aria-describedby="emailHelp" placeholder="Email">
          </div>

          {{-- Password field --}}
          <div class="mb-3 password position-relative">
            <svg width="20" height="22" viewBox="0 0 20 22" fill="none" xmlns="http://www.w3.org/2000/svg">
              <path fill-rule="evenodd" clip-rule="evenodd" d="M9.97947 1.73315H9.96031C7.60393 1.73315 5.6848 3.53992 5.67353 5.76905V7.20145H14.2617V5.78718C14.2617 3.55166 12.3404 1.73315 9.97947 1.73315ZM15.9521 5.78718V7.49049C17.9479 8.15283 19.3926 9.93294 19.3926 12.0458V16.6203C19.3926 19.2921 17.0959 21.4647 14.273 21.4647H14.2403H10.4584C9.99187 21.4647 9.61322 21.1063 9.61322 20.6648C9.61322 20.2232 9.99187 19.8648 10.4584 19.8648H14.2403C16.1313 19.8648 17.6684 18.41 17.6684 16.6203C17.6684 16.5813 17.679 16.546 17.6896 16.5107C17.6941 16.4958 17.6985 16.4809 17.7022 16.4657V12.0458C17.7022 10.2561 16.164 8.80131 14.273 8.80131H5.66339C3.77243 8.80131 2.23419 10.2561 2.23419 12.0458V16.4657C2.23779 16.482 2.24243 16.4981 2.24707 16.5141C2.25696 16.5483 2.26687 16.5826 2.26687 16.6203C2.26687 18.41 3.80511 19.8648 5.69607 19.8648C6.16261 19.8648 6.54126 20.2232 6.54126 20.6648C6.54126 21.1063 6.16261 21.4647 5.69607 21.4647C5.69213 21.4647 5.68846 21.4642 5.6848 21.4636C5.68114 21.4631 5.67748 21.4626 5.67353 21.4626C5.67184 21.4626 5.67015 21.4631 5.66846 21.4636C5.66677 21.4642 5.66508 21.4647 5.66339 21.4647C2.84047 21.4647 0.543823 19.2921 0.543823 16.6203V12.0458C0.543823 9.93294 1.9874 8.15283 3.98316 7.49049V5.78718C3.99781 2.6536 6.67536 0.133301 9.95693 0.133301H9.98285C13.2723 0.133301 15.9521 2.6696 15.9521 5.78718ZM10.8132 13.1484V15.5173C10.8132 15.9588 10.4345 16.3172 9.96797 16.3172C9.50143 16.3172 9.12279 15.9588 9.12279 15.5173V13.1484C9.12279 12.7069 9.50143 12.3485 9.96797 12.3485C10.4345 12.3485 10.8132 12.7069 10.8132 13.1484Z" fill="#181725"></path>
            </svg>
            <input type="password" class="form-control valid" name="password" id="password-field" placeholder="Password">
            <span toggle="#password-field" class="fa fa-fw fa-eye field-icon toggle-password"></span>
          </div>

          {{-- Login field --}}
          <button type=submit class="btn btn-block {{ config('adminlte.classes_auth_btn', 'btn-flat btn-primary') }}">
            <span class="fas fa-sign-in-alt"></span>
            {{ __('adminlte::adminlte.log_in') }}
          </button>
        </form>
    </div>
@stop

@section('adminlte_js')
<script type="text/javascript">
    $(document).on('click','.view_pass',function(){
        console.log('view_pass');  
        $(this).removeAttr('class');
        if($('#password').attr('type')=='password'){
            $('#password').attr('type','text');
            $(this).addClass('fas fa-eye-slash view_pass');
        }else{
            $('#password').attr('type','password');
            $(this).addClass('fas fa-eye view_pass');
        }              
    })
</script>
<script>
      $(".toggle-password").click(function() {

        $(this).toggleClass("fa-eye fa-eye-slash");
        var input = $($(this).attr("toggle"));
        if (input.attr("type") == "password") {
          input.attr("type", "text");
        } else {
          input.attr("type", "password");
        }
      });       
</script>

<script src="https://ajax.aspnetcdn.com/ajax/jquery.validate/1.9/jquery.validate.js"></script>
<script>
    $('#loginForm').validate({
        ignore: [],
        debug: false,
        rules: {
            email: {
                required: true,
                email: true
            },
            password: {
                required: true
            },
        },
        messages: {
            email: {
                required: "Email is required",
                email: "Please enter a valid Email"
            },
            password: {
                required: "Password is required"
            }
        }
    });
</script>
@stop