<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="FYP-Group 1" content="Multicentre-CRF management system">
    <title>Multicentre-CRF management system</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <!-- Fonts and Styling-->
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>



</head>
<body>
        <div class="sidebar-container">
            <div class="sidebar-logo">
                      <h6>MultiCentre-CRF Management System</h6>
            </div>
            <ul class="sidebar-navigation">
                <li class="header">Menu</li>
                <li>
                    <a href="/dashboard" class="{{request()->is('dashboard')? 'active' :' '}}">Dashboard</a>
                </li>
                <li>
                    <a href="/preScreening" class="{{request()->is('preScreeningForm')? 'active' :' '}}" >Pre-Screening</a>
                </li>
                <li>
                    <a href="/studySpecific" class="{{request()->is('studySpecific')? 'active' :' '}}" >Study Specific</a>
                </li>
                @can('adminFunctions')
                <li>
                    <a href="/preScreening/admin" class="{{request()->is('preScreening/admin')? 'active' :' '}}" >Pre-Screening Database</a>
                </li>

                <li>
                    <a href="/studySpecificdb" class="{{request()->is('studySpecificdb')? 'active' :' '}}" >Study Specific Database</a>
                </li>

                <li>
                    <a href="/users" class="{{request()->is('/users')? 'active' :' '}}"}}>Administration</a>

                </li>
                @endcan
            </ul>
        </div>

        <div class="content-container">
            <div class="HeaderInContent">
                <div class="row">
                    <h1 class="col-lg-11">Welcome! {{Auth::user()->name}}</h1>
                    {{logger($errors)}}
                        <a href="{{route('logout')}}" class="col-lg-1"
                            onclick="preventDefault();
                            document.getElementById('logout-form').submit();">
                            <span id="power_button"><img src="{{ URL::asset("photos/logoff.png") }}" alt="Log Off Button"></span>
                        </a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                </div>
                <hr/>
            </div>

                {{--//main content starts here--}}
                <div class="container-fluid">
                    @yield('content')
                </div>
            </div>
        </div>
</body>
</html>
