<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="FYP-Group 1" content="Multicentre-CRF management system">
    <title>Multicentre-CRF management system</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">


</head>
<body>

<div class="sidebar-container">
    <div class="sidebar-logo">
               <h5>MultiCentre-CRF Management System/LOGO</h5>
    </div>
    <ul class="sidebar-navigation">
        <li class="header">Menu</li>
        <li>
            <a href="/dashboard" class="active">Dashboard</a>
        </li>
        <li>
            <a href="/preScreening">Pre-Screening</a>
        </li>
        <li>
            <a href="/studySpecific">Study Specific</a>
        </li>

        <li>
            <a href="/preScreeningdb">Pre-Screening Database</a>
        </li>

        <li>
            <a href="/studySpecificdb">Study Specific Database</a>
        </li>

        <li>
            <a href="/admin">Administration</a>
        </li>
    </ul>
</div>

<div class="content-container">
    <div class="HeaderInContent">
    <div class="row">
    <h1 class="col-lg-11">Welcome! {users.name}</h1>
    <a href="/" class="col-lg-1">Log off </a>
    </div>
    </div>
    <hr>
        {{--//main content starts here--}}
        <div class="container-fluid">
            @yield('content')
        </div>
</div>



</div>
</body>
</html>
