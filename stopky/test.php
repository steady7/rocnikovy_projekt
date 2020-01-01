<?php
  include('../server.php');
  session_start();
  $page = "page1";
	$getLEVEL = mysqli_fetch_assoc(mysqli_query($db, "SELECT level FROM `users` WHERE username = '$_SESSION[username]'"));
	  $userLEVEL = $getLEVEL['level'];
	  $_SESSION['level'] = $userLEVEL;
  if (!isset($_SESSION['username'])) {
  	$_SESSION['msg'] = "You must log in first";
  	header('location: login.php');
  }
 if (!isset($_SESSION['success'])) {
  	echo $_SESSION['success'];
  }
?>
<!DOCTYPE html>
<html>
  <head>
    <title>
      Nazdar!
    </title>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
  <link rel="stylesheet" type="text/css" href="../podstranky/styly_podstranek.css">
	<script>

		Number.prototype.padDigit = function() {
	  return (this < 10) ? '0' + this : this;
	}

	$(window).on( "load", function() {
  var t1 = "00:00:00"; 
  var secs = 0;
  var mins = 0;
  var hrs = 0;
  $('.hours').each(function() {
    t1 = t1.split(':');
    var t2 = $(this).text().split(':');
    secs = Number(t1[2]) + Number(t2[2]);
    minmins = Math.floor(parseInt(secs / 60));
    mins = Number(t1[1]) + Number(t2[1]) + minmins;
    minhrs = Math.floor(parseInt(mins / 60));
    hrs = Number(t1[0]) + Number(t2[0]) + minhrs;
    mins = mins % 60;
    secs = secs % 60;
    t1 = hrs.padDigit() + ':' + mins.padDigit() + ':' + secs.padDigit() ;
  console.log(t1);
  });
  $('#timesum').text(t1);
});
	</script>
    <link href="stopwatch.css" rel="stylesheet">
    <script src="stopwatch.js"></script>
  </head>
  
  
  <body>
     <div class="wrapper">
      <div class="topnav">
            <div class="topmenu_vpravo">
                <a href="../logout">Logout</a>
                <a href="../index">Home</a>
            </div>
      </div>
    </div>
    
    <form id="stopwatch">
      <div id="sw-time">00:00:00</div>
		  
		  <input name="tlacitko" class="sw_button"type="button" value="Start" id="sw-go" disabled/>
    </form>


	<?php
	if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
 
// Attempt select query execution
$nickname = $_SESSION['username'];
$sql = "SELECT * 
FROM stopky
WHERE date >= CURDATE() AND name = '$nickname'
 ORDER BY date DESC";

if($result = mysqli_query($db, $sql)){
    if(mysqli_num_rows($result) > 0){
	   echo "<div class='tabulka'>";
        echo "<table>";
            echo "<tr>";
                echo "<th>Nickname</th>";
                echo "<th>Time</th>";
                echo "<th>Date</th>";
            echo "</tr>";
          echo "<tr style='background-color:#DDDDDD;font-weight: bold;'>";
			    echo "<td>Total time for today is:</td>";
			   	echo "<td><span style='padding: 7px;' id='timesum'></span></td>";
          echo "<td></td>";
		    	echo "</tr>";
          while($row = mysqli_fetch_array($result)){
            echo "<tr>";
                echo "<td>" . $row['name'] . "</td>";
                echo "<td class='hours'>" . $row['time'] . "</td>";
                echo "<td>" . $row['date'] . "</td>";
            echo "</tr>";
        }
					
        echo "</table>";
	echo "</div>";
        // Free result set
        mysqli_free_result($result);
    } else{
    echo "You have no records for today!(minimal time is 10 seconds)";
    }
} else{
    echo "ERROR: Unable to execute $sql. " . mysqli_error($link);
}
 
	?>
  </body>
</html>		