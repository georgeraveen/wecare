<?php

?>
<!DOCTYPE html>
<html>

<head>
    <title>Login Page</title>
    <link rel="stylesheet" type="text/css" href="./../css/login.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
</head>

<body>
    <img class="login-background" src="./../images/undraw_medicine_b1ol.svg">
    <div class="container">

        <div class="login-container">
            <form method="post" action="./login/autho">
                <input type="hidden" name="mode" value="login" >
                <img class="avatar" src="./../images/undraw_Login_re_4vu2.svg">
                <h2>WeCare Customer Web Portal</h2>
                <div class="input-div one">
                    <div class="i">
                        <i class="fas fa-user"></i>
                    </div>
                    <div>
                        <h5>Username</h5>
                        <input class="input" type="text" value=""  id="username" name="username" required="" >
                    </div>
                </div>
                <div class="input-div two">
                    <div class="i">
                        <i class="fas fa-lock"></i>
                    </div>
                    <div>
                        <h5>Password</h5>
                        <input class="input" type="password" value=""  id="user_password" name="user_password" required="" >
                    </div>
                </div>
                <a href="#">Forgot Password ?</a>
                <input type="submit" class="btn-submit" value="Login">
            </form>

        </div>
        <div class="img">

        </div>
    </div>
    <script type="text/javascript" src="./../js/login.js"></script>
</body>

</html>
