
<html lang="en"><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="http://getbootstrap.com/favicon.ico">

    <title>Start Here</title>


    <link href="css/font-awesome.min.css" rel="stylesheet">
    <link href="css/animate.css" rel="stylesheet">
    <link href="css/main.css" rel="stylesheet">




    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="css/cover.css" rel="stylesheet">

    <link href="css/ours.css" rel="stylesheet">

    <style type="text/css">
      #viewport, #panel{
          position:relative;
          animation: fadeIn 2s;
          -moz-animation: fadeIn 2s; /* Firefox */
          -webkit-animation: fadeIn 1.8s; /* Safari and Chrome */
          -o-animation: fadeIn 2s; /* Opera */
      }
      .screen-footer{

        position: fixed;
        bottom: 0;
        left: 0;
        width: 100%;
        background-color: #404040;
        height: 50px;
      }
      .cover-screen{
        position:fixed;
        width:100%;
        height:100%;
        top:0;
        left:0;
        background-color: #fff;
          
        transition: top 1s ease;
        z-index: 100;

        background: #606c88; /* Old browsers */
        background: -moz-linear-gradient(top,  #606c88 0%, #3f4c6b 100%); /* FF3.6+ */
        background: -webkit-gradient(linear, left top, left bottom, color-stop(0%,#606c88), color-stop(100%,#3f4c6b)); /* Chrome,Safari4+ */
        background: -webkit-linear-gradient(top,  #606c88 0%,#3f4c6b 100%); /* Chrome10+,Safari5.1+ */
        background: -o-linear-gradient(top,  #606c88 0%,#3f4c6b 100%); /* Opera 11.10+ */
        background: -ms-linear-gradient(top,  #606c88 0%,#3f4c6b 100%); /* IE10+ */
        background: linear-gradient(to bottom,  #606c88 0%,#3f4c6b 100%); /* W3C */
        filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#606c88', endColorstr='#3f4c6b',GradientType=0 ); /* IE6-9 */
        background-image: url("img/kiosknoncolor.jpg");
        background-size:cover;
         -webkit-backface-visibility: hidden;

      }
      .hide-cover{
        top:-100%;
      }
      .cover-text{
        overflow-y: hidden;
        width: 50%;
        margin: auto;
        margin-top: 130px;
        background-color: rgba(33, 33, 33, 0.49);
        border-radius: 10px;
        padding: 30px;



          animation: fadeIn 2s;
          -moz-animation: fadeIn 2s; /* Firefox */
          -webkit-animation: fadeInDown 3s; /* Safari and Chrome */
          -o-animation: fadeIn 2s; /* Opera */

      }

      #buttons{

        height: 100%;
        padding: 5px;
      }
      #buttons > a{
        border: 2px solid white;
        padding: 8px;
        border-radius: 100%;
        font-size: 15px;
        display: inline-block;
        width: 40px;
        margin:0 15px;
      }
      #buttons > a:hover,
      #buttons > a:active{
        color:#dadada;
        border-color:#dadada;
      }


      #menu {
        position:fixed;
        height: 92%;
        width: 100%;
      }
      .menu-panel{
        top:0;
        left:0;
        z-index: 10;
        transition:left 1s ease;
      }
      .hide-menu{
        left: 100%;
      }
    </style>
    

  <body style=" margin:0; padding:0;">

    <div class="cover-screen">
          
          <div class="cover-text" style="overflow-y:hidden;">
            <h3 id="time" style="margin:0;">time</h3>
            <h6 id="date">date</h6>
           
            <h1 class="cover-heading">Service Not Available</h1>
            <p id="greetings" class="lead ">This error can be caused by the following situations:</p>
            <ul style="list-style:none;">
                <li>The kiosk server not installed.</li>
                <li>The kiosk databse is missing.</li>
                <li>Network may be disconnected.</li>
                <li>Hackers did something funny.</li>
            </ul>
            <hr>
            <p><a class="btn btn-success" href="index.php">Reload</a></p>
          </div>

    </div><!--/.cover-screen-->









    <!-- Bootstrap core JavaScript
    ================================================== -->
    <script src="js/jquery.js"></script>
    <script>
        startTime();
        (function(){
            var greetings = $("#greetings"); 
            var apps = $("#apps");
            $(".menu-toggle").bind("click", function(){
                console.log("menu toggle working.");
                apps.toggleClass("show-apps");
                greetings.toggleClass("show-greetings");
            });

        })();
        $('.cover-screen').click(function(){
          //toggleLock();

        });
        function toggleLock(){
          $(".cover-screen").toggleClass("hide-cover");
        }
        function toggleMenu(){
          $(".menu-panel").toggleClass("hide-menu");
          $("#apps").toggleClass("hide-cover");
        }

        function startTime() {
            var today=new Date();
            var h=today.getHours();
            var m=today.getMinutes();
            var s=today.getSeconds();
            var dd = "AM";
            if (h >= 12) {
                h = h-12;
                dd = "PM";
            }
            if (h == 0) {
                h = 12;
            }


            year = today.getFullYear();
            month = today.getMonth();
            months = new Array('January', 'February', 'March', 'April', 'May', 'June', 'Jully', 'August', 'September', 'October', 'November', 'December');
            d = today.getDate();
            day = today.getDay();
            days = new Array('Sunday', 'Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday');



            m = checkTime(m);
            s = checkTime(s);
            $("#time").text( h+":"+m+" "+dd);
            $("#date").text( months[month]+" "+d+", "+year);
            var t = setTimeout(function(){startTime()},500);
        }

        function checkTime(i) {
            if (i<10) {i = "0" + i};  // add zero in front of numbers < 10
            return i;
        }
    </script>

    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery.prettyPhoto.js"></script>
    <script src="js/main.js"></script>

    <!-- scripts for sound effects -->
    <script src="js/ion.sound-master/js/ion.sound.min.js"></script>
    <script type="text/javascript">
        ion.sound({
            sounds: [
                {name: "snap"},
                {name: "branch_break"},
                {name: "tap"},
                {name: "water_droplet_3"},
                {name: "pop_cork"}
                
            ],
            volume: 0.5,
            path: "js/ion.sound-master/sounds/",
            preload: true
        });
        $("a").click(function(e){
            var url = $(this).attr('href');
            e.preventDefault();
            ion.sound.play("branch_break");
            setTimeout(function(){
                window.location = url;
            },200);
            //alert("this");
        });
    </script>

<div id="global-zeroclipboard-html-bridge" class="global-zeroclipboard-container" style="position: absolute; left: 0px; top: -9999px; width: 15px; height: 15px; z-index: 999999999;" title="" data-original-title="Copy to clipboard">      <object classid="clsid:d27cdb6e-ae6d-11cf-96b8-444553540000" id="global-zeroclipboard-flash-bridge" width="100%" height="100%">         <param name="movie" value="/assets/flash/ZeroClipboard.swf?noCache=1409845180835">         <param name="allowScriptAccess" value="sameDomain">         <param name="scale" value="exactfit">         <param name="loop" value="false">         <param name="menu" value="false">         <param name="quality" value="best">         <param name="bgcolor" value="#ffffff">         <param name="wmode" value="transparent">         <param name="flashvars" value="trustedOrigins=getbootstrap.com%2C%2F%2Fgetbootstrap.com%2Chttp%3A%2F%2Fgetbootstrap.com">         <embed src="/assets/flash/ZeroClipboard.swf?noCache=1409845180835" loop="false" menu="false" quality="best" bgcolor="#ffffff" width="100%" height="100%" name="global-zeroclipboard-flash-bridge" allowscriptaccess="sameDomain" allowfullscreen="false" type="application/x-shockwave-flash" wmode="transparent" pluginspage="http://www.macromedia.com/go/getflashplayer" flashvars="trustedOrigins=getbootstrap.com%2C%2F%2Fgetbootstrap.com%2Chttp%3A%2F%2Fgetbootstrap.com" scale="exactfit">                </object>
</div>
  </body>
</html>