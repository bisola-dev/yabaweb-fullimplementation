
<!DOCTYPE html>
<html lang="en">
    
<!-- Mirrored from thememinister.com/crm/login.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 27 Aug 2019 13:28:07 GMT -->
<head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
        <title>Yabaweb : YABATECH</title>

       
        <!-- Favicon and touch icons -->
        <link rel="shortcut icon" href="{{asset('assets/dist/img/ico/favicon.png')}}" type="image/x-icon">
        <!-- Bootstrap -->
        <link href="{{asset('assets/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet" type="text/css"/>
        <!-- Bootstrap rtl -->
        <!--<link href="assets/bootstrap-rtl/bootstrap-rtl.min.css" rel="stylesheet" type="text/css"/>-->
        <!-- Pe-icon-7-stroke -->
        <link href="{{asset('assets/pe-icon-7-stroke/css/pe-icon-7-stroke.css')}}" rel="stylesheet" type="text/css"/>
        <!-- style css -->
        <link href="{{asset('assets/dist/css/stylecrm.css')}}" rel="stylesheet" type="text/css"/>
        <!-- Theme style rtl -->
        <!--<link href="assets/dist/css/stylecrm-rtl.css" rel="stylesheet" type="text/css"/>-->
    </head>
    <body>
        <!-- Content Wrapper -->
        <div class="login-wrapper">
            <div class="back-link">
            </div>
            <div class="container-center">
            <div class="login-area">
                <div class="panel panel-bd panel-custom">
                    <div class="panel-heading">
                          <div class="column-md-8">
					<div class="card-body">
					@if($errors->any())
					<ul class="list-group">
					@foreach($errors->all() as $error)
					<div class="alert alert-danger">
					<li class="list-group-item">
					            {{$error}}
                            </li>
					       @endforeach
                           </ul>
                         </div>
			            @endif


					<div class="account-content">
						@if(session()->has('success'))
						<div class="alert alert-success">
							{{session()->get('success')}}
                             </div>
							 @endif
                        <div class="view-header">
                            <div class="header-icon">
                                <i class="pe-7s-unlock"></i>       
                            </div>
                            <div class="header-title">
                                <h3>Admin Login</h3> 
                                
                            </div>
                        </div>
                    </div>
                    <div class="panel-body">
                        <form action='/adminlogin' method="post" id="loginForm" novalidate>
                              {{ csrf_field() }} 
                            <div class="form-group">
                                
                                <label class="control-label" for="email">Email Address</label>
                                <input type="text" title="Please enter your email" required="" value="" name="admail" id="email" class="form-control">
                                
                            </div>
                            <div class="form-group">
                                <label class="control-label" for="password">Password</label>
                                <input type="password" title="Please enter your password" placeholder="******" required="" value="" name="pass" id="password" class="form-control">
                               
                            </div>
                            <div>
                                <button type="submit" name="submit" class="btn btn-warning">Login</button>

                                <br />
                                <br />
                                  
                            </div>
                        </form>
                        </div>
                        </div>
                </div>
            </div>
        </div>
        <!-- /.content-wrapper -->
        <!-- jQuery -->
        <script src="assets/plugins/jQuery/jquery-1.12.4.min.js" type="text/javascript"></script>
        <!-- bootstrap js -->
        <script src="assets/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
    </body>

<!-- Mirrored from thememinister.com/crm/login.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 27 Aug 2019 13:28:07 GMT -->
