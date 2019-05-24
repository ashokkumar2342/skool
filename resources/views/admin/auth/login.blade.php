{{-- @extends('admin.layout.auth')
@section('body')
<div class="login-box">
  <div class="login-logo">
    <a href="#"><b>ISKOOL</b></a>
  </div>
  <!-- /.login-logo -->
  <div class="login-box-body">
    <p class="login-box-msg">Sign in to start your session</p> --}}
    {{-- {{ Auth::user()->name }} --}}
    {{-- {!! Form::open(['route'=>'admin.login']) !!}
      <div class="form-group has-feedback">
      	{!! Form::email('email', '', ['class'=>'form-control', 'placeholder'=>'mail']) !!}
        <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
        <p class="text-danger">{{ $errors->first('email') }}</p>
      </div>
      
      <div class="form-group has-feedback">
      {!! Form::password('password', ['class'=>'form-control', 'placeholder'=>'Password']) !!}
        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
        <p class="text-danger">{{ $errors->first('password') }}</p>
      </div>
      <div class="row">
         
        <a href="#" onclick="callPopupLarge(this,'{{ route('admin.forget.password') }}')">Forget Password</a>
        <div class="col-xs-4">
          <button type="submit" class="btn btn-primary btn-block btn-flat">Sign In</button>
        </div>
        <!-- /.col -->
      </div>
    {!! Form::close() !!}

   
   
  </div>
  <!-- /.login-box-body -->
</div>
<!-- /.login-box -->
@endsection --}}

 @extends('admin.layout.auth')
@section('body')
        <style type="text/css">
        html, body{height:100%;} 
            #outer{
            min-height:100%;
            }
            .intro {
                min-height: 100vh;
                background-image: url("{{asset('front_asset/extra-images/about_us_img.jpg')}}");
                background-size: cover;
                object-fit: cover;
                background-repeat: no-repeat;
                background-position: center;
                display: flex; /* NEW */
            }
            .well {
                min-height: 20px;

                padding: 20px;
                margin-bottom: 20px;
                background-color: #fff;
                border: 1px solid #e3e3e3;
                border-radius: 4px;
                -webkit-box-shadow: inset 0 1px 1px rgba(0,0,0,.05);
                box-shadow: inset 0 1px 1px rgba(0,0,0,.05);
                
            }
            .auth-form {

            width: 330px; 
            margin-left: 100px;
            padding-top: 50px;

               
            }
            .sp-logo-wrap{
                padding-top: 50px;
                padding-right: 20px;
            }
            .control-label{
                
                font-size: 12px;
                color: #54698d;
                font-family: SFS, Arial, sans-serif;
                margin: 0 0 8px 0;
                line-height: inherit;
            }
            
        </style>
    
        <!--Preloader-->
        <div class="preloader-it">
            <div class="la-anim-1"></div>
        </div>
        <!--/Preloader-->
        
        <div class="wrapper pa-0">
            
            
            <!-- Main Content -->
            <div class="page-wrapper pa-0 ma-0 auth-page"  style="background-color: #ccceff">
                <div class="container-fluid pa-0 ma-0">
                    <!-- Row -->
                    <div class="col-lg-6">
                      
                            
                     
                        <div class="table-struct full-width full-height">

                            <div class="table-cell vertical-align-middle auth-form-wrap">
                                <div class="text-center">
                                  <a href="#"><img src="{{asset('front_asset/images/logo.png')}}" alt="" style="margin-right:180px; padding-top:  80px" style=" " ></a>
                                    
                                </div>
                                <div class="auth-form  ml-auto mr-auto no-float">
                                    <div class="row well well-sm">
                                        <div class="col-sm-12 col-xs-12">

                                            <div class="mb-30">
                                                
                                              
                                            </div>
                                                                                        
                                            <div class="form-wrap">
                                              <!-- /.login-logo -->
                                                <div class="login-box-body">
                                                  <p class="login-box-msg"></p> 

                                                   {{--{{ Auth::user()->name }}  --}}
                                                  {!! Form::open(['route'=>'admin.login']) !!}
                                                    <div class="form-group has-feedback">
                                                      {{ Form::label('email','Email',['class'=>' control-label']) }}
                                                      {!! Form::email('email', '', ['class'=>'form-control', 'placeholder'=>'mail']) !!}
                                                      <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
                                                      <p class="text-danger">{{ $errors->first('email') }}</p>
                                                    </div>
                                                    
                                                    <div class="form-group has-feedback">
                                                      {{ Form::label('password','Password',['class'=>' control-label']) }}
                                                    {!! Form::password('password', ['class'=>'form-control', 'placeholder'=>'Password']) !!}
                                                      <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                                                      <p class="text-danger">{{ $errors->first('password') }}</p>
                                                    </div>
                                                    <div class="row">
                                                       
                                                      <a href="#" onclick="callPopupLarge(this,'{{ route('admin.forget.password') }}')">Forgot Password</a>
                                                      <div class="col-xs-4">
                                                        <button type="submit" class="btn btn-primary btn-rounded">Sign In</button>
                                                      </div>
                                                      <!-- /.col -->
                                                    </div>
                                                  {!! Form::close() !!}
                                            </div>
                                        </div>  
                                    </div>
                                </div>
                            </div>
                        </div>
                      </div> 
                        
                    </div>
                    <div class="col-lg-6 hidden-xs pa-0 ma-0 intro">

                    </div>
                
            </div>
            
        </div>
        @endsection 
        <!-- /#wrapper -->
   
       
        
        <!-- jQuery -->
        