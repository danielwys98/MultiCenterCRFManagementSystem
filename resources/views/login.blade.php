<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="FYP-Group 1" content="Login Page">
    <title>Multicentre-CRF management system</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">


</head>
<body id="bkg-color">
    <div class="row d-flex justify-content-center row-login">
        <div id="login" class="col-md-5">
                        <span id="logo"><img src="photos/BK_Logo.png" alt="Borneo Kinetics Logo"></span>
                        <hr/>
                        <h3 class="subtitle mb-2">Welcome back!</h3>
                        <div class="form-group">
                            <label for="inputUsersName">Users Name: </label>
                            <input type="text" class="form-control" id="inputUsersName" aria-describedby="email" placeholder="Enter usersname">
                        </div>
                        <div class="form-group">
                            <label for="inputPassword">Password</label>
                            <input type="password" class="form-control" id="inputPassword" aria-describedby="password" placeholder="Password">
                        </div>
                        <a href="/dashboard"><button type="button" class="btn btn-danger">Login</button></a>
        </div>
    </div>
</body>
</html>
