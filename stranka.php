<?php include('server.php') ?>
<?php
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
<html>
  <head>
    <title>Novej layout</title>
    <style>
            * {
          margin: 0;
          padding: 0;
          background: #232323;
          color: #cdcdcd;
          font-family: "Avenir Next", "Avenir", sans-serif;
        }
        body, html{
          height:100%;
        }
        body{
            padding:0;
            margin:0;
        }
        h1, p, li{
            font-family:'helvetica neue', helvetica, arial, sans-serif;
            color:white;
            margin:0 0 1em;
        }
        section li{
            margin:0 0 10px;
        }
       section {
          padding-left: 250px;
          padding-right: 250px;
       }
        h1{
            font-size:2.5em;
            font-weight:300;
        }
        p{
            font-size:1em;
            line-height:1.5em;
        }
        .wrapper{
            overflow:hidden;
        }
        nav{
            position:fixed;
            top:0;
            left:0;
            width:200px;
            height:100%;
            margin:0 0 0 -250px;
            -moz-transition:all 200ms ease-in;
            -webkit-transition:all 200ms ease-in;
            -o-transition:all 200ms ease-in;
            transition:all 200ms ease-in;
            z-index:999;
        }
        nav ul{
            height:100%;
            padding:0;
            margin:0;
            list-style:none;
            background-color: white;
            overflow:hidden;
        }
        nav li{
            margin:0;
        }
        nav a{
            color:black;
            font-size:1em;
            font-family:'helvetica neue', helvetica, arial, sans-serif;
            text-decoration:none;
            display:block;
            padding:25px 15px;
            font-weight:300;
            letter-spacing:2px;
            border-bottom:1px solid #333;
            background-color:white;
            text-align: center;
        }
        nav a:hover{
            background:#111;
        }
        label{
            display:block;
            font-family:'helvetica neue', helvetica, arial, sans-serif;
            font-weight:700;
            background:#1ea1b8;
            width:50px;
            height:50px;
            line-height:42px;
            color:#fff;
            text-align:center;
            font-size:2em;
            line-height:1.1em;
            position:fixed;
            top:10px;
            left:10px;
            -moz-transition:all 200ms ease-in;
            -webkit-transition:all 200ms ease-in;
            -o-transition:all 200ms ease-in;
            transition:all 200ms ease-in;
            z-index:500;
        }
        input[type="checkbox"]{
            display:none;
        }
        input[type="checkbox"]:checked ~ nav{
            margin:0;
        }
        input[type="checkbox"]:checked ~ label{
            left:220px;
        }

        .topmenu_vpravo a {
          float: right;
          color: #f2f2f2;
          text-align: center;
          padding: 14px 16px;
          text-decoration: none;
          font-size: 17px;
        }

        .carousel-wrap {
          margin: 100px auto;
          width: 100%;
          position: relative;
        }

        /* fix blank or flashing items on carousel */
        .owl-carousel .item {
          position: relative;
          z-index: 100;
          -webkit-backface-visibility: hidden;
        }

        /* end fix */
        .owl-nav > div {
          margin-top: -26px;
          position: absolute;
          top: 50%;
          color: #cdcbcd;
        }

        .owl-nav i {
          font-size: 52px;
        }
        .owl-carousel .owl-item img {
    display: block;
    width: 140px;
}
        .owl-nav .owl-prev {
          left: -30px;
          position: absolute;
          top: 40px;
        }

        .owl-nav .owl-next {
          right: -30px;
          position: absolute;
          top: 55px;
        }
        .owl-nav {
          font-size: 50px;
        }
    </style>
    <link rel="stylesheet" href="OwlCarousel/dist/assets/owl.carousel.min.css">
    <link rel="stylesheet" href="OwlCarousel/dist/assets/owl.theme.default.min.css">
  </head>
  <body>
        <div class="wrapper">
          <div class="topnav">
            <input type="checkbox" id="navigation" />
            <label for="navigation">
               <img style="width:50px" src="https://icon-library.net/images/globe-icon-white/globe-icon-white-25.jpg">
            </label>

            <nav>
                <ul>
                    <li>
                        <a href="">Home</a>
                    </li>
                    <li>
                        <a href="">Latest News</a>
                    </li>
                    <li>
                        <a href="">What We Do</a>
                    </li>
                    <li>
                        <a href="">Another Link</a>
                    </li>
                    <li>
                        <a href="">Contact</a>
                    </li>
                </ul>
            </nav>
            <div class="topmenu_vpravo">
              <a ref="logout.php">Logout</a>
              <a href="nahranividea.php">Add video</a>
              <a href="stopky/test.php">Stopky</a>

            </div>
          </div>


<?php
include('errors.php');
if (isset($_POST["color"]) && !empty($_POST["color"])) {
      include_once('podstranky/all.php');
 }
echo $_SESSION['success'];
$_SESSION['success'] = "";
  if(isset($_GET['page'])){
      $page = $_GET['page'];
  switch($page){
    case 'page0': include_once('podstranky/all.php'); break;
    case 'page1': include_once('podstranky/comedy.php'); break;
    case 'page2': include_once('podstranky/music.php'); break;
    case 'page3': include_once('podstranky/gaming.php'); break;
    case 'page4': include_once('podstranky/vlog.php'); break;
    case 'page5': include_once('podstranky/other.php'); break;
    default: include_once('registrace.php'); break;
  }
}
    </div>
    <section>
    <div class="carousel-wrap">
      <div class="owl-carousel">
        <div class="item"><img src="http://placehold.it/150x150"></div>
        <div class="item"><img src="http://placehold.it/150x150"></div>
        <div class="item"><img src="http://placehold.it/150x150"></div>
        <div class="item"><img src="http://placehold.it/150x150"></div>
        <div class="item"><img src="http://placehold.it/150x150"></div>
        <div class="item"><img src="http://placehold.it/150x150"></div>
        <div class="item"><img src="http://placehold.it/150x150"></div>
        <div class="item"><img src="http://placehold.it/150x150"></div>
        <div class="item"><img src="http://placehold.it/150x150"></div>
        <div class="item"><img src="http://placehold.it/150x150"></div>
        <div class="item"><img src="http://placehold.it/150x150"></div>
        <div class="item"><img src="http://placehold.it/150x150"></div>
      </div>
    </div>

 <div class="carousel-wrap">
      <div class="owl-carousel">
        <div class="item"><img src="http://placehold.it/150x150"></div>
        <div class="item"><img src="http://placehold.it/150x150"></div>
        <div class="item"><img src="http://placehold.it/150x150"></div>
        <div class="item"><img src="http://placehold.it/150x150"></div>
        <div class="item"><img src="http://placehold.it/150x150"></div>
        <div class="item"><img src="http://placehold.it/150x150"></div>
        <div class="item"><img src="http://placehold.it/150x150"></div>
        <div class="item"><img src="http://placehold.it/150x150"></div>
        <div class="item"><img src="http://placehold.it/150x150"></div>
        <div class="item"><img src="http://placehold.it/150x150"></div>
        <div class="item"><img src="http://placehold.it/150x150"></div>
        <div class="item"><img src="http://placehold.it/150x150"></div>
      </div>
    </div>
   </section>
  </body>
</html>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="OwlCarousel/dist/owl.carousel.min.js"></script>
<script>
$(document).ready(function(){
$(".owl-carousel").owlCarousel();
});
$('.owl-carousel').owlCarousel({
  loop: true,
  margin: 10,
  nav: true,
  responsive: {
    0: {
      items: 3
    },
    600: {
      items: 6
    },
    1000: {
      items: 10
    }
  }
})
</script>
		
