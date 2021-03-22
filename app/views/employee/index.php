<?php

?>
<!DOCTYPE html>
<html>

<head>
    <title>Login Page</title>
    <link rel="stylesheet" type="text/css" href="./../../css/loginEmp.css">
    <link rel="stylesheet" type="text/css" href="./../../css/alert.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
</head>

<div>
<div class="container content">

        <div class="login-container">
    <form method="post" action="./../login/autho" onSubmit="showLoader()">
    <input type="hidden" name="mode" value="login" >
    <h2>WeCare Employee Web Portal</h2>
    <div>
        <div class="input-div one">
            <div class="i">
                <i class="fas fa-user"></i>
            </div>
            <div>
                <h5>Username:</h5><br>
                <input class="input" type="text" value=""  id="username" name="username" required="" >
            </div>
        </div>
        <div class="input-div two">
            <div class="i">
                <i class="fas fa-user"></i>
            </div>
            <div>
                <h5>Password:</h5><br>
                <input class="input" type="password" value=""  id="user_password" name="user_password" required="" >
            </div>
        </div>
        <br>
        <div class="forgot popup" onClick="forgot()">
            <h4>Forgot password?</h4>
            <span class="popuptext" id="myPopup">Please contact administrator to reset password</span>
        </div>
        <button type="submit" class="btn-submit">Submit</button> 
    </div>

    </form>
    </div>
    </div>
</div>
<div  class="containers">
  <div id="loader" class="loader"></div>
</div>
<script type="text/javascript" src="./../../js/login.js"></script>
<script type="text/javascript" src="./../../js/alert.js"></script>
</body>

</html>
