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
    <script src="https://kit.fontawesome.com/e601eb5514.js" crossorigin="anonymous"></script>


</head>
<body>
        <div class="sidebar-container">
            <div class="sidebar-logo">
                      <h5>MultiCentre-CRF Management System</h5>
            </div>
            <ul class="sidebar-navigation">
                <li class="header">Menu</li>
                <li>
                    <a href="/dashboard" class="{{request()->is('dashboard')? 'active' :' '}}">Dashboard</a>
                </li>
                <li>
                    <a href="/preScreening" class="{{request()->is('preScreening')? 'active' :' '}}" >Pre-Screening</a>
                </li>
                <li>
                    <a href="/studySpecific" class="{{request()->is('studySpecific')? 'active' :' '}}" >Study Specific</a>
                </li>
                @can('adminFunctions')
                <li>
                    <a href="/preScreeningdb" class="{{request()->is('preScreeningdb')? 'active' :' '}}" >Pre-Screening Database</a>
                </li>

                <li>
                    <a href="/studySpecificdb" class="{{request()->is('studySpecificdb')? 'active' :' '}}" >Study Specific Database</a>
                </li>

                <li>
                    <a href="admin/users" class="{{request()->is('admin/users')? 'active' :' '}}"}}>Administration</a>

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
                            onclick="event.preventDefault();
                            document.getElementById('logout-form').submit();">
                            <i class="fas fa-power-off"></i>
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
