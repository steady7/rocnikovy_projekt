<?php include('../server.php') ?>
<?php
  session_start();
  
  $page = "page1";
  $getLEVEL = mysqli_fetch_assoc(mysqli_query($db, "SELECT level FROM `users` WHERE username = '$_SESSION[username]'"));
    $userLEVEL = $getLEVEL['level'];
    $_SESSION['level'] = $userLEVEL;
  if (!isset($_SESSION['username'])) {
    $_SESSION['msg'] = "You must log in first";
    header('location: login');
  }
 /*if (isset($_SESSION['success'])) {
    echo $_SESSION['success'];
  }
  if (isset($_SESSION['errors'])) {
    echo $_SESSION['errors'];
  }*/

    if (isset($_GET['jazyk'])) {
    $_SESSION['jazyk'] = $_GET['jazyk'];
    }
    else{
      if(!isset($_SESSION['jazyk'])){
        $_SESSION['jazyk'] = 'en';
      }
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
        a {
          text-decoration:none;
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
        h2 {
           padding: 10px;
}
     
        section li{
            margin:0 0 10px;
        }
                /* 
          ##Device = Desktops
          ##Screen = 1281px to higher resolution desktops
        */

        @media (min-width: 1281px) {
          
          section {
             padding-left: 150px;
             padding-right: 150px;
          }
          
        }

        /* 
          ##Device = Laptops, Desktops
          ##Screen = B/w 1025px to 1280px
        */

        @media (min-width: 1025px) and (max-width: 1280px) {
          
          section {
             padding-left: 100px;
             padding-right: 100px;
          }       
        }

        /* 
          ##Device = Tablets, Ipads (portrait)
          ##Screen = B/w 768px to 1024px
        */

        @media (min-width: 768px) and (max-width: 1024px) {
          
          section {
             padding-left: 50px;
             padding-right: 50px;
          }
        }
        
        /* 
          ##Device = Tablets, Ipads (landscape)
          ##Screen = B/w 768px to 1024px
        */

        @media (min-width: 768px) and (max-width: 1024px) and (orientation: landscape) {
          
          section {
             padding-left: 50px;
             padding-right: 50px;
          }
        }

        /* 
          ##Device = Low Resolution Tablets, Mobiles (Landscape)
          ##Screen = B/w 481px to 767px
        */

        @media (min-width: 481px) and (max-width: 767px) {
          
          section {
             padding-left: 0px;
             padding-right: 0px;
          }
          
        }

        /* 
          ##Device = Most of the Smartphones Mobiles (Portrait)
          ##Screen = B/w 320px to 479px
        */

        @media (min-width: 320px) and (max-width: 480px) {
          
          section {
             padding-left: 0px;
             padding-right: 0px;
          }
          
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
            border-bottom: 1px solid black;
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
            height:50px;
        }
        nav a:hover{
            background:#111;
        }
        .topnav label{
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
        .topnav input[type="checkbox"]{
            display:none;
        }
        .topnav input[type="checkbox"]:checked ~ nav{
            margin:0;
        }
        .topnav input[type="checkbox"]:checked ~ label{
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

  /* The Modal (background) */
  .modal {
  display: none; /* Hidden by default */
  position: fixed; /* Stay in place */
  z-index: 999; /* Sit on top */
  left: 0;
  top: 0;
  width: 100%; /* Full width */
  overflow: auto; /* Enable scroll if needed */
  background-color: rgb(0,0,0); /* Fallback color */
  background-color: rgba(0,0,0,0.4); /* Black w/ opacity */
  height: 100vh;
}

/* Modal Content/Box */
.modal-content {
  background-color: #fefefe;
  margin: 5% 25% auto;
  width: 50%;
}
a:hover {
 cursor:pointer;
}
/* The Close Button */
.close {
  color: #aaa;
  float: right;
  font-size: 28px;
  font-weight: bold;
}

.close:hover,
.close:focus {
  color: green;
  text-decoration: none;
  cursor: pointer;
}

#form-styl{
  margin: 100px auto;
  padding: 40px;
  width: 70%;
  min-width: 300px;
}
.close{
  font-size:50px;
  padding-right:15px;
}
.flex-container{
  display: flex;
  flex-wrap: wrap;
  padding-top: 20px;
  align-items: center;
  justify-content: center;
}
.obal_obrazku{
    position: relative;
}
.img_description_layer {
  position: absolute;
  top: 0;
  bottom: 0;
  left: 0;
  right: 0;
  background: rgba(24, 118, 35, 0.6);
  color: #fff;
  text-shadow: 1px 1px #000;
  visibility: hidden;
  opacity: 0;
  display: flex;
  align-items: center;
  justify-content: center;

  /* transition effect. not necessary */
  transition: opacity .2s, visibility .2s;
}

.obal_obrazku:hover .img_description_layer {
  visibility: visible;
  opacity: 1;
}
.img_description {
  transition: .2s;
  transform: translateY(1em);
  background: none;
}

.obal_obrazku:hover .img_description {
  transform: translateY(0);
}
 /* Style the form */
#regForm {
  padding: 40px;
}

/* Style the input fields */
input {
  padding: 10px;
  width: 100%;
  font-size: 17px;
  font-family: Raleway;
  border: 1px solid #aaaaaa;
}

/* Mark input boxes that gets an error on validation: */
input.invalid {
  background-color: #ffdddd;
}

/* Hide all steps by default: */
.tab {
  display: none;
}

/* Make circles that indicate the steps of the form: */
.step {
  height: 15px;
  width: 15px;
  margin: 0 2px;
  background-color: #bbbbbb;
  border: none;
  border-radius: 50%;
  display: inline-block;
  opacity: 0.5;
}

/* Mark the active step: */
.step.active {
  opacity: 1;
}

/* Mark the steps that are finished and valid: */
.step.finish {
  background-color: #4CAF50;
} 
.button {
  background-color: #4CAF50; /* Green */
  border: 1px solid black;
  color: white;
  padding: 15px 32px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size: 16px;
  width: 100%;
}
.button_next_previous{
  background-color: #4CAF50; /* Green */
  border: 1px solid black;
  color: white;
  padding: 15px 32px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size: 16px;
}
.rada_tlacitek{
  display: flex;
  flex-flow: row wrap;
  justify-content: flex-start;
}
.tab input[type="radio"] {
  opacity: 0;
  position: fixed;
  width: 0;
}
.tab label {
    display: inline-block;
    background-color: #ddd;
    padding: 10px 20px;
    font-family: sans-serif, Arial;
    font-size: 16px;
    border: 2px solid #444;
    border-radius: 4px;
    color:black;
    text-align: center;
    width: 105px;
}
.tab input[type="radio"]:checked + label {
    background-color:#bfb;
    border-color: #4c4;
}

    </style>
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
                          <a class="set_jazyk" style="background-image:url('https://flagpedia.net/data/flags/w580/jp.png');background-size:cover;background-position:center" href="../podstranky/comedy?jazyk=jp"></a>
                      </li>
                      <li>
                          <a class="set_jazyk" style="background-image:url('https://cdn.webshopapp.com/shops/94414/files/54954514/the-united-kingdom-flag-vector-free-download.jpg');background-size:cover;background-position:center" href="../podstranky/comedy?jazyk=en"></a>
                      </li>
                      <li>
                          <a class="set_jazyk" style="background-image:url('https://cdn.countryflags.com/thumbs/china/flag-800.png');background-size:cover;background-position:center" href="../podstranky/comedy?jazyk=ch"></a>
                      </li>
                      <li>
                          <a class="set_jazyk" style="background-image:url('https://upload.wikimedia.org/wikipedia/en/archive/f/f3/20120812153730%21Flag_of_Russia.svg');background-size:cover;background-position:center" href="../podstranky/comedy?jazyk=ru"></a>
                      </li>
                      <li>
                          <a class="set_jazyk" style="background-image:url('https://upload.wikimedia.org/wikipedia/en/thumb/b/ba/Flag_of_Germany.svg/1280px-Flag_of_Germany.svg.png');background-size:cover;background-position:center" href="../podstranky/comedy?jazyk=ge"></a>
                      </li>
                  </ul>
              </nav>
            <div class="topmenu_vpravo">
                <a href="../logout">Logout</a>
                <a id="myBtn">Add video</a>
                <a href="../stopky/test">Time tracker</a>
                <a href="../">Home</a>
      </div>
      </div>
    </div>
    <div id="myModal" class="modal">
    <!-- Modal content -->
    <div class="modal-content">
      <div class="box">
        <span class="close">&times;</span>
              <p>Do wish to upload youtube video?</p>
              <button class="button" type="button" id="option1yes">Yes</button>
              <button class="button" type="button" id="option1no">No</button>
              <div id="option1-yes">
                 <form method="post" action="comedy.php">

                <!-- One "tab" for each step in the form: -->
                <div class="tab">Please enter the URL link:
                  <p><input required="required" type="text" name="url" placeholder="URL link..."></p>
                </div>

                <div class="tab">Now choose the category:
                    <div class="rada_tlacitek">
                      <input type="radio" id="radioComedy" name="vyber" value="Comedy" checked>
                      <label for="radioComedy">Comedy</label>

                      <input type="radio" id="radioGaming" name="vyber" value="Gaming">
                      <label for="radioGaming">Gaming</label>

                      <input type="radio" id="radioMusic" name="vyber" value="Music">
                      <label for="radioMusic">Music</label> 

                      <input type="radio" id="radioVlog" name="vyber" value="Vlog">
                      <label for="radioVlog">Vlog</label> 

                      <input type="radio" id="radioOther" name="vyber" value="Other">
                      <label for="radioOther">Other</label> 
                    </div>
                </div>

                  <div class="tab">Now choose the language:
                    <div class="rada_tlacitek">
                      <input type="radio" id="radioJapanese" name="vyber_jazyka" alt="jp" value="jp" checked>
                      <label for="radioJapanese">Japanese</label>

                      <input type="radio" id="radioEnglish" name="vyber_jazyka" alt="en" value="en">
                      <label for="radioEnglish">English</label>

                      <input type="radio" id="radioChinese" name="vyber_jazyka" alt="ch" value="ch">
                      <label for="radioChinese">Chinese</label> 

                      <input type="radio" id="radioRussian" name="vyber_jazyka" alt="ru" value="ru">
                      <label for="radioRussian">Russian</label> 

                      <input type="radio" id="radioGerman" name="vyber_jazyka" alt="de" value="de">
                      <label for="radioGerman">German</label> 
                    </div>
                </div>

                <div class="tab">Additional comment:
                  <p><input name="popis"  autocomplete="off" maxlength="200" placeholder="Write here..."></p>
                  <input type="submit" class="btn" name="Submit_video" value="Submit"><br>
                </div>

                <div style="overflow:auto;">
                  <div style="float:right;">
                    <button type="button" class="button_next_previous" id="prevBtn" onclick="nextPrev(-1)">Previous</button>
                    <button type="button" class="button_next_previous" id="nextBtn" onclick="nextPrev(1)">Next</button>
                  </div>
                </div>

                <!-- Circles which indicates the steps of the form: -->
                <div style="text-align:center;margin-top:40px;">
                  <span class="step"></span>
                  <span class="step"></span>
                  <span class="step"></span>
                  <span class="step"></span>
                </div>

                </form> 
              </div>
              <div id="option1-no">This function has not been done yet.</div>
        </div>
      </div>
    </div>
  </div>

    <div class="flex-container">   
        <?php
        $sql = "SELECT * FROM videa WHERE video_zanr = 'Comedy' AND jazyk = '".$_SESSION['jazyk']."' ORDER BY `video_id` DESC";
        if($result = mysqli_query($db, $sql)){
            if(mysqli_num_rows($result) > 0){
                $pocet = 20;
                while($pocet > 0){
          while($row = mysqli_fetch_array($result)){
               echo '<a class="obal_obrazku" target="_blank" href="http://youtube.com/watch?v=' . $row[video_odkaz] . '">
               <img src="http://img.youtube.com/vi/' . $row[video_odkaz] . '/mqdefault.jpg"/>
               <div class="img_description_layer">
                <p class="img_description">' . $row[popis].'</p>
               </div>
               </a>';
        }
        $pocet--;
        }
      }
      else{
          echo '<div class="obal_obrazku"><img src="https://is2-ssl.mzstatic.com/image/thumb/Purple62/v4/25/3e/5d/253e5de1-1411-c919-410a-c3628a666a5b/mzl.rehriusj.png/246x0w.png"></div>';
      }
          }
          ?>
    </div>
  </body>
</html>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

<script>
$('.set_jazyk').on('click', function(e){
    var jazyk = $(this).val();
    $.ajax({
        type: 'POST',
        url: 'jazyk_set.php',
        data: {
            language: jazyk
        }
    }); 
});
// Get the modal
var modal = document.getElementById("myModal");

// Get the button that opens the modal
var btn = document.getElementById("myBtn");

// Get the <span> element that closes the modal
var span = document.getElementsByClassName("close")[0];

// When the user clicks on the button, open the modal
btn.onclick = function() {
  modal.style.display = "block";
}

// When the user clicks on <span> (x), close the modal
span.onclick = function() {
  modal.style.display = "none";
}

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
  if (event.target == modal) {
    modal.style.display = "none";
  }
}
var y = document.getElementById("option1-yes");
var n = document.getElementById("option1-no");
y.style.display = "none";
n.style.display = "none";

document.getElementById("option1yes").onclick = function () {
  y.style.display = "block";
  n.style.display = "none";
};

document.getElementById("option1no").onclick = function () {
  y.style.display = "none";
  n.style.display = "block";
};
var currentTab = 0; // Current tab is set to be the first tab (0)
showTab(currentTab); // Display the current tab

function showTab(n) {
  // This function will display the specified tab of the form ...
  var x = document.getElementsByClassName("tab");
  x[n].style.display = "block";
  // ... and fix the Previous/Next buttons:
  if (n == 0) {
    document.getElementById("prevBtn").style.display = "none";
  } else {
    document.getElementById("prevBtn").style.display = "inline";
  }
  if (n == (x.length - 1)) {
    document.getElementById("nextBtn").style.display = "none";
  } else {
    document.getElementById("nextBtn").style.display = "inline";
  }
  // ... and run a function that displays the correct step indicator:
  fixStepIndicator(n)
}

function nextPrev(n) {
  // This function will figure out which tab to display
  var x = document.getElementsByClassName("tab");
  // Exit the function if any field in the current tab is invalid:
  if (n == 1 && !validateForm()) return false;
  // Hide the current tab:
  x[currentTab].style.display = "none";
  // Increase or decrease the current tab by 1:
  currentTab = currentTab + n;
  // if you have reached the end of the form... :
  if (currentTab >= x.length) {
    //...the form gets submitted:
    document.getElementById("regForm").submit();
    return false;
  }
  // Otherwise, display the correct tab:
  showTab(currentTab);
}

function validateForm() {
  // This function deals with validation of the form fields
  var x, y, i, valid = true;
  x = document.getElementsByClassName("tab");
  y = x[currentTab].getElementsByTagName("input");
  // A loop that checks every input field in the current tab:
  for (i = 0; i < y.length; i++) {
    // If a field is empty...
    if (y[i].value == "") {
      // add an "invalid" class to the field:
      y[i].className += " invalid";
      // and set the current valid status to false:
      valid = false;
    }
  }
  // If the valid status is true, mark the step as finished and valid:
  if (valid) {
    document.getElementsByClassName("step")[currentTab].className += " finish";
  }
  return valid; // return the valid status
}

function fixStepIndicator(n) {
  // This function removes the "active" class of all steps...
  var i, x = document.getElementsByClassName("step");
  for (i = 0; i < x.length; i++) {
    x[i].className = x[i].className.replace(" active", "");
  }
  //... and adds the "active" class to the current step:
  x[n].className += " active";
}
</script>
      