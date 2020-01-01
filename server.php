<?php
session_start();

// initializing variables
$username = "";
$errors = array();

// connect to the database
$db = mysqli_connect(******************************************);
//////////////////////////////////////////TIME TRACKER PART///////////////
if (isset($_POST['time'])) {
	$attr = $_POST['time'];	
        echo '<script language="javascript">';
echo 'alert("message successfully sent")';
echo '</script>';
	$splitTimeStamp = explode(":",$attr);
	$prevod = $splitTimeStamp[0] * 60;
	$soucet = $prevod + $splitTimeStamp[1];
	$getXP = mysqli_fetch_assoc(mysqli_query($db, "SELECT xp FROM `users` WHERE username = '$_SESSION[username]'"));
	$userXP = $getXP['xp'];
	$query = "INSERT INTO stopky (name,time)  VALUES ('$_SESSION[username]','$attr')";
	mysqli_query($db, $query);
	$userXP = $userXP + $soucet;
	if($userXP > 1000){
		$userXP = $userXP - 1000;
		$sql ="UPDATE users SET level = level + 1 WHERE username='$_SESSION[username]'";
		$_SESSION['levelup'] = true;
		mysqli_query($db, $sql);	
	}
	$sql ="UPDATE users SET xp = '$userXP' WHERE username='steady'";
		mysqli_query($db, $sql);
}
////////////////////REGISTER PART//////////////////////////////////////////

// REGISTER USER
if (isset($_POST['reg_user'])) {
  // receive all input values from the form
  $username = mysqli_real_escape_string($db, $_POST['username']);
  $password_1 = mysqli_real_escape_string($db, $_POST['password_1']);
  $password_2 = mysqli_real_escape_string($db, $_POST['password_2']);

  // form validation: ensure that the form is correctly filled ...
  // by adding (array_push()) corresponding error unto $errors array
  if (empty($username)) { array_push($errors, "Username is required"); }
  if (empty($password_1)) { array_push($errors, "Password is required"); }
  if ($password_1 != $password_2) {
	array_push($errors, "The two passwords do not match");
  }

  // first check the database to make sure
  // a user does not already exist with the same username and/or email
  $user_check_query = "SELECT * FROM users WHERE username='$username' LIMIT 1";
  $result = mysqli_query($db, $user_check_query);
  $user = mysqli_fetch_assoc($result);

  if ($user) { // if user exists
    if ($user['username'] === $username) {
      array_push($errors, "Username already exists");
    }
  }

  // Finally, register user if there are no errors in the form
  if (count($errors) == 0) {
  	$password = md5($password_1);//encrypt the password before saving in the database
      $tempid = $_SESSION['tempid'];
  	mysqli_query($db, "INSERT INTO users(username, password) VALUES ('$username', '$password')");

  	$_SESSION['username'] = $username;
    $_SESSION['password'] = $password;
    $_SESSION['tempid'] = $tempid;
  	$_SESSION['success'] = "You are now logged in";
  	header('location: index');
  }
}
// ...
/*Pokus o system nahodnyho id
if (isset($_POST['Generator'])) {
    $entrancecode = uniqid();
    //kontrola jestli neni stejny nějaký jako nově vygenerovaný
    $user_check_query = "SELECT * FROM users WHERE Entrancecode='$entrancecode' LIMIT 1";
    $result = mysqli_query($db, $user_check_query);
    $user = mysqli_fetch_assoc($result);

    if ($user) { // jestli už existuje
      if ($user['Entrancecode'] === $entrancecode) {
        array_push($errors, "Entrancecode already exists");
      }
    }
    //jestli ne
    $query = "INSERT INTO users (Entrancecode)
  			  VALUES('$entrancecode')";
  	mysqli_query($db, $query);
    $_SESSION['entrancecode'] = $entrancecode;
    $_SESSION['success'] = "You have registered a user $entrancecode";
    header('location: index');
}
*/
/*
//Overeni dostupnosti entrance kodu
if (isset($_POST['entrancebutton'])){
    $entrancecode = mysqli_real_escape_string($db, $_POST['entrancecode']);
    if (empty($entrancecode)) {
    	array_push($errors, "Entrance code is required for registration!");
    }
    if(count($errors) == 0){
      $query = "SELECT id FROM users WHERE Entrancecode = '$entrancecode'";
      $results = mysqli_query($db, $query);
    	if (mysqli_num_rows($results) == 1) {
            $query2 = "SELECT * FROM users WHERE Entrancecode='$entrancecode'";
            $results2 = mysqli_query($db, $query2);
            while ($row = $results2->fetch_assoc()) {
            if(empty($row['username'])){
              $_SESSION['tempid'] = $entrancecode;
            }
            else{
              array_push($errors, "Someone is already using that code!");
            }
            }

      }
      else{
          array_push($errors, "Invalid entrance code :/");
      }
  }
}
*/
/////////////////////////////////////////////////////////////////////////////
// CAST NA LOGIN
if (isset($_POST['login_user'])) {
  $username = mysqli_real_escape_string($db, $_POST['username']);
  $password = mysqli_real_escape_string($db, $_POST['password']);

  if (empty($username)) {
  	array_push($errors, "Username is requireddd");
  }
  if (empty($password)) {
  	array_push($errors, "Password is requireddd");
  }

  if (count($errors) == 0) {
  	$password = md5($password);
  	$query = "SELECT * FROM users WHERE username='$username' AND password='$password'";
  	$results = mysqli_query($db, $query);
  	if (mysqli_num_rows($results) == 1) {
  	  $_SESSION['username'] = $username;
  	  $_SESSION['success'] = "You are now logged in";
  	  header('location: ../');
  	}else {
  		array_push($errors, "Wrong username/password combination");
  	}
  }
}
//UPLOAD VIDEO SUBMISSION
if (isset($_POST['Submit_video'])) {
  // receive all input values from the form
  $url = $_POST['url'];
  preg_match('%(?:youtube(?:-nocookie)?\.com/(?:[^/]+/.+/|(?:v|e(?:mbed)?)/|.*[?&]v=)|youtu\.be/)([^"&?/ ]{11})%i', $url, $match);
  $youtube_id = $match[1];
  $selectOption = $_POST['vyber'];
  $selectOption2 = $_POST['vyber_jazyka'];
  $popis = $_POST['popis'];
  // validace odkazu
  if (empty($url)) { array_push($errors, "URL link is required"); }
  // validace jestli je stejny
 $video_check_query = "SELECT * FROM videa WHERE video_odkaz ='$youtube_id' LIMIT 1";
  $result = mysqli_query($db, $video_check_query);
  $video = mysqli_fetch_assoc($result);

  if ($video) { // if video exists
    if ($video['video_odkaz'] === $youtube_id) {
      array_push($errors, "URL already exists");
    }
  }
  if (count($errors) == 0) {
        $query = "INSERT INTO videa (video_odkaz, video_zanr, jazyk, popis)
  			  VALUES('$youtube_id','$selectOption','$selectOption2', '$popis')";
  	mysqli_query($db, $query);
  	$_SESSION['success'] = "You have successfully submited a video! Thank you!"; 

  }
}
$videa = mysqli_query($db, "SELECT * FROM videa");

?>
	
		
