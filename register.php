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
      <h1><center>Registration</center></h1>
      <div class="obal">
        <div class="container">
      		<p>Username</p>
      		<input type="text" name="username" value="<?php echo $username; ?>" placeholder="Enter username">
        </div>
        <div class="container">
      		<p>Password</p>
      		<input type="password" name="password_1" placeholder="Enter password"><br><br>
                <input type="password" name="password_2" placeholder="Enter password again"><br>
      		<input type="submit" class = "btn" name="reg_user" value="Register"><br>
        </div>
      </div>
  	  <a href="login" style="cursor: pointer;text-decoration: none;color:white;">Already a member?</a><br>

  </form>
</body>
</html>
					