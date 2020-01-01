function show_modal(){
	var modal = document.getElementById("myModal");
	var btn = document.getElementById("myBtn");
	var span = document.getElementsByClassName("close")[0];
	  modal.style.display = "block";
	  span.onclick = function() {
	  modal.style.display = "none";
	}
	window.onclick = function(event) {
	  if (event.target == modal) {
		modal.style.display = "none";
	  }
	} 
}
var sw = {
  /* [INIT] */
  etime : null, // holds HTML time display
  ego : null, // holds HTML start/stop button
  timer : null, // timer object
  now : 0, // current timer
  init : function () {
    // Get HTML elements
    sw.etime = document.getElementById("sw-time");
    sw.ego = document.getElementById("sw-go");

    // Attach listeners
    sw.ego.addEventListener("click", sw.start);
    sw.ego.disabled = false;
  },
  /* [ACTIONS] */
  tick : function () {
  // tick() : update display if stopwatch running

    // Calculate hours, mins, seconds
    sw.now+= 1;
    var remain = sw.now;
    var hours = Math.floor(remain / 3600);
    remain -= hours * 3600;
    var mins = Math.floor(remain / 60);
    remain -= mins * 60;
    var secs = remain;

    // Update the display timer
    if (hours<10) { hours = "0" + hours; }
    if (mins<10) { mins = "0" + mins; }
    if (secs<10) { secs = "0" + secs; }
    sw.etime.innerHTML = hours + ":" + mins + ":" + secs;
  },

  start : function () {
  // start() : start the stopwatch
	var col=document.getElementById("sw-time");
	col.style.backgroundColor = "#2ECC40";
    sw.timer = setInterval(sw.tick, 1000);
    sw.ego.value = "Stop";
    sw.ego.removeEventListener("click", sw.start);
    sw.ego.addEventListener("click", sw.stop);
	var audio = new Audio('podstranky/bell.mp3');
        audio.volume = 0.2;
	audio.play();
	  var link = document.querySelector("link[rel*='icon']") || document.createElement('link');
    link.type = 'image/x-icon';
    link.rel = 'shortcut icon';
    link.href = 'https://i.redd.it/hq8tqyd20bp21.png';
    document.getElementsByTagName('head')[0].appendChild(link);
	document.title = "GO!";
  },

  stop  : function () {
  // stop() : stop the stopwatch
	var col=document.getElementById("sw-time");
	col.style.backgroundColor = "#FF4136";
    clearInterval(sw.timer);
    sw.timer = null;
    sw.ego.value = "Start";
    sw.ego.removeEventListener("click", sw.stop);
    sw.ego.addEventListener("click", sw.start);
	if(sw.now >= 10){
	var time = document.getElementById("sw-time").innerHTML;
        $.ajax({
            type: 'post',
            url: '../server.php',
            data: "time="+time,
            success: function () {
              location.reload();
            }
          });
	}
		  var link = document.querySelector("link[rel*='icon']") || document.createElement('link');
		  
    link.type = 'image/x-icon';
    link.rel = 'shortcut icon';
    link.href = 'https://ih0.redbubble.net/image.684249614.9160/flat,800x800,075,f.u2.jpg';
    document.getElementsByTagName('head')[0].appendChild(link);
    sw.now = -1;
    sw.tick();
	document.title = "Steady";
  },
};
window.addEventListener("load", sw.init);


