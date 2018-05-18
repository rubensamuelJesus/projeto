<!doctype html>
<html lang="en">
<head>
	<meta charset="utf-8" />
	<link rel="apple-touch-icon" sizes="76x76" href="assets/img/apple-icon.png">
	<link rel="icon" type="image/png" sizes="96x96" href="assets/img/favicon.png">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

	<title>Personal Finances Assistant</title>

	<meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
    <meta name="viewport" content="width=device-width" />


    <!-- Bootstrap core CSS     -->

    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet"/>

    <!--  Paper Dashboard core CSS    -->
    <link href="{{ asset('css/paper-dashboard.css') }}" rel="stylesheet"/>


    <link href="{{ asset('https://data.jsdelivr.com/v1/package/npm/paper-dashboard/badge') }}" rel="stylesheet"/>

    <!--  CSS for Demo Purpose, don't include it in your project     -->
    <link href="{{ asset('https://cdnjs.cloudflare.com/ajax/libs/jquery-ui-bootstrap/0.5pre/css/demo.css') }}" rel="stylesheet"/>
    <link href="{{ asset('https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.5.2/animate.min.css') }}" rel="stylesheet"/>
    
    <!--  Fonts and icons     -->
    <link href="{{ asset('http://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css') }}" rel="stylesheet"/>
    <link href="{{ asset('https://fonts.googleapis.com/css?family=Muli:400,300') }}" rel="stylesheet"/>
    <link href="{{ asset('css/themify-icons.css') }}" rel="stylesheet"/>

    <link href="{{ asset('https:////maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css') }}" rel="stylesheet" id="bootstrap-css"/>
    <link href="{{ asset('https://maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js') }}" rel="stylesheet"/>
    <link href="{{ asset('code.jquery.com/jquery-1.11.1.min.js') }}" rel="stylesheet"/>

    <link href="{{ asset('https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js') }}" rel="stylesheet"/>
    <link href="{{ asset('https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js') }}" rel="stylesheet"/>
    <link href="{{ asset('https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha/css/bootstrap.min.css') }}" rel="stylesheet"/>
    <link href="{{ asset('https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css') }}" rel="stylesheet"/>

</head>
<body>

<div class="wrapper">
    <div class="sidebar" data-background-color="white" data-active-color="danger">
    	<div class="sidebar-wrapper">
            <div class="logo">
                <a href="/" class="simple-text">
                    Personal Finances Assistant
                </a>
            </div>

            <ul class="nav">
                <li class="active">
                    <a href="/" class="topicos">
                        <i class="ti-panel"></i>
                        <p>Finances</p>
                    </a>
                </li>
                <li>
                    <a href="{{route('me.profile')}}" class="topicos">
                        <i class="ti-user"></i>
                        <p>User Profile</p>
                    </a>
                </li>
                <li>
                    <a href="{{route('profiles')}}" class="topicos">
                        <i class="ti-list"></i>
                        <p>Profiles</p>
                    </a>
                </li>
                <li>
                    <a href="" class="topicos">
                        <i class="ti-view-list-alt"></i>
                        <p>Accounts</p>
                    </a>
                </li>
                <li class="">
                    <a href="/estatistics" class="topicos">
                        <i class="ti-bar-chart-alt"></i>
                        <p>Estatistics</p>
                    </a>
                </li>
                <li>
                    <a href="icons"class="topicos">
                        <i class="ti-pencil-alt2"></i>
                        <p>Icons</p>
                    </a>
                </li>

                <li>
                    <a href="about"class="topicos">
                        <i class="ti-help-alt"></i>
                        <p>About Us</p>
                    </a>
                </li>
            </ul>
    	</div>
    </div>

    <div class="main-panel">
        <nav class="navbar navbar-default">
            <div class="container-fluid">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar bar1"></span>
                        <span class="icon-bar bar2"></span>
                        <span class="icon-bar bar3"></span>
                    </button>
                    <a class="navbar-brand" href="/">Finances</a>
                </div>
                <div class="collapse navbar-collapse">
                    <ul class="nav navbar-nav navbar-right">
                        @if (Auth::guest())
                        <li>
                            <a href="login">
                                <i class="ti-lock"></i>
                                <p>Login</p>
                            </a>
                        </li>
                        <li>
                            <a href="register">
                                <i class="ti-user"></i>
                                <p>Register</p>
                            </a>
                        </li>
                        @endif
                        <li>
                            <a href="login">
                                <i class="ti-settings"></i>
                                <p>Settings</p>
                            </a>
                        </li>

                        @admin
                            <li>
                                <a href="login">
                                    <i class="ti-lock"></i>
                                    <p>Admin......</p>
                                </a>
                            </li>
                        @endadmin

                        @if (Auth::check())
                            
                            <li class="dropdown">
                              <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                    <p>{{$user->name}}</p>
                                    <b class="caret"></b>
                              </a>
                              <ul class="dropdown-menu">
                                <li><a href="#">Profile</a></li>
                                <li><a href="{{ route('logout') }}">llll</a>{{csrf_field()}}</li>
                                
                                <a class="dropdown-item" href="{{ route('logout') }}"
                                   onclick="event.preventDefault();
                                                 document.getElementById('logout-form').submit();">
                                    {{ __('Logoutaaaaaa') }}
                                </a>

                                    <li><form method="POST" action="{{route('logout')}}">
                                        {{csrf_field()}}
                                        <button class="dropdown-toggle">Logout</button>
                                    </form>
                                    </li>
                              </ul>
                            </li>
                            <li>
                            </li>
                        @endif
                    </ul>

                </div>
            </div>
        </nav>

         @yield('content')

        <footer class="footer">
            <div class="container-fluid">
                <div class="copyright pull-right">
                    &copy; <script>document.write(new Date().getFullYear())</script>  by Xa | Reis | Ruben</a>
                </div>
            </div>
        </footer>

    </div>
</div>


</body>

    <!--   Core JS Files   -->
    <script src="js/jquery-1.10.2.js" type="text/javascript"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-ui-bootstrap/0.5pre/assets/js/bootstrap.min.js" type="text/javascript"></script>

    <!--  Checkbox, Radio & Switch Plugins -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/awesome-bootstrap-checkbox/1.0.1/awesome-bootstrap-checkbox.min.css"></script>

    <!--  Charts Plugin -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/chartist/0.11.0/chartist.min.js"></script>

    <!--  Notifications Plugin    -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-notify/0.2.0/js/bootstrap-notify.min.js"></script>

    <!--  Google Maps Plugin    -->
    <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js"></script>

    <!-- Paper Dashboard Core javascript and methods for Demo purpose -->
    <!--<script src="js/paper-dashboard.js"></script>

    <!-- Paper Dashboard DEMO methods, don't include it in your project! -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-ui-bootstrap/0.5pre/assets/js/demo.js"></script>

</html>
