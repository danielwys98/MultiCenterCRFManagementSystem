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
<body>
    <div class="row">
    <div class="container-logo">
            <span id="logo"><img src="photos/BK_Logo.png"/></span>
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Login</h4>
                <h5 class="card-subtitle mb-2">Welcome back!</h5>
                    <div class="form-group">
                        <label for="inputUsersName">Users Name: </label>
                        <input type="text" class="form-control" id="inputUsersName" aria-describedby="email" placeholder="Enter usersname">
                    </div>
                    <div class="form-group">
                        <label for="inputPassword">Password</label>
                        <input type="password" class="form-control" id="inputPassword" aria-describedby="password" placeholder="Password">
                    </div>
                    <a href="/dashboard"><button type="button" class="btn btn-primary">Login</button></a>
            </div>
        </div>
      </div>
    </div>

</body>
</html>
