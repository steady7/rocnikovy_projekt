<?php include('server.php') ?>
<!DOCTYPE html>
<html>
<head>
  <title>Registration system PHP and MySQL</title>
  <link rel="stylesheet" type="text/css" href="style.css">
  <meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body class="prvni-strana">
<div id="loginbox" class="loginbox">
  <form method="post" action="login.php" class="form-styl">
  	<?php include('errors.php'); ?>
      <h1><center>Login</center></h1>
      <div class="obal">
        <div class="container">
      		<p>Username</p>
      		<input autocomplete="off" type="text" name="username" placeholder="Enter username" >
        </div>
        <div class="container">
      		<p>Password</p>
      		<input  autocomplete="off" type="password" name="password"placeholder="Enter password"><br>
      		<input autocomplete="off" type="submit" class="btn" name="login_user" value="Login">
        </div>
        
      </div>
  	  <a href="register" style="cursor: pointer;text-decoration: none;color:white;">Not registered?</a><br>

  </form>
</body>
</html>
					