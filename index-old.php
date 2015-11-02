<!DOCTYPE html>
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

    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="css/cover.css" rel="stylesheet">
    <style type="text/css">
      #viewport, #panel{
          position:relative;
          animation: fadeIn 2s;
          -moz-animation: fadeIn 2s; /* Firefox */
          -webkit-animation: fadeIn 1.8s; /* Safari and Chrome */
          -o-animation: fadeIn 2s; /* Opera */
      }

    </style> 
    

  <body>

    <div id="viewport" class="site-wrapper">

      <div class="site-wrapper-inner">

        <div class="cover-container" style="position:relative; top:0px;">

          <div class="masthead clearfix">
            <div class="inner">
              <h3 class="masthead-brand">The Real Deal</h3>
              <ul class="nav masthead-nav">
                <li class="active"><a href="#">Home</a></li>
                <li><a href="#">Features</a></li>
                <li><a href="">Contact</a></li>
              </ul>
            </div>
          </div>

          <div class="inner cover" style="overflow-y:hidden;">
            <h1 class="cover-heading">BU KIOSK</h1>
            <p id="greetings" class="lead ">Welcome to the Bicol University Kiosk! This system will aid you with etc. etc where you can try to be a
             get ready set go in the highest. Bicol Universit commits to continually strive for xcellence in instruction, research 
             and extension, in meeting the highest clientele satisfaction and adhering to quality standards. Bicol university college 
             of arts and letters, Bicol University College of Science, Bicol University College of Business Enterprenuer and Management,
              Bicol University College of Social Sciences and Philosophy.</p>
            
            <div id="apps" class="apps-panel " style="">
                <div class="box-shortcut" style="background-color:#2d89ef">
                    <a href="faculty-search.php" style="">
                    <span class="icon-user" ></span>

                    <h4>Faculty Schedule</h4>
                    </a>
                </div>
                <div class="box-shortcut" style="background-color:#7e3878">
                    <a href="student-verification.php" style="">
                    <span class="icon-book" ></span>

                    <h4>Student Info.</h4>
                    </a>
                </div>
                <div class="box-shortcut" style="background-color:#ee1111">
                    <a href="map.html" style="">
                    <span class="icon-map-marker" ></span>

                    <h4>Locator Map</h4>
                    </a>
                </div>
                <div class="box-shortcut" style="background-color:#2b5797">
                    <a href="office-search.php" style="">
                    <span class="icon-coffee" ></span>

                    <h4>Office Info.</h4>
                    </a>
                </div>
                <div class="box-shortcut" style="background-color:#2d89ef">
                    <a href="e-bulletin.html" style="">
                    <span class="icon-info" ></span>

                    <h4>Bulletin</h4>
                    </a>
                </div>
                <div class="box-shortcut" style="background-color:#7e3878">
                    <a href="calendar-of-activities.php" style="">
                    <span class="icon-calendar" ></span>

                    <h4>Activities</h4>
                    </a>
                </div>
                
                
            </div> <!--/apps-panel-->

            
          </div>
          <p class="lead" style="margin-top:20px;">
            <a id="" href="#" class="menu-toggle btn btn-lg btn-default">Tap to Start</a>
          </p>
          <div class="mastfoot">
            <div class="inner">
              <p>Developed by Team 10 BUCS BSIT 4th Year A.Y. 2014-2015</p>
            </div>
          </div>

        </div>

      </div>

    </div>

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <script src="js/jquery.js"></script>
    <script>
        (function(){
            var greetings = $("#greetings"); 
            var apps = $("#apps");
            $(".menu-toggle").bind("click", function(){
                console.log("menu toggle working.");
                apps.toggleClass("show-apps");
                greetings.toggleClass("show-greetings");
            });

        })();
    </script>

    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery.prettyPhoto.js"></script>
    <script src="js/main.js"></script>

<div id="global-zeroclipboard-html-bridge" class="global-zeroclipboard-container" style="position: absolute; left: 0px; top: -9999px; width: 15px; height: 15px; z-index: 999999999;" title="" data-original-title="Copy to clipboard">      <object classid="clsid:d27cdb6e-ae6d-11cf-96b8-444553540000" id="global-zeroclipboard-flash-bridge" width="100%" height="100%">         <param name="movie" value="/assets/flash/ZeroClipboard.swf?noCache=1409845180835">         <param name="allowScriptAccess" value="sameDomain">         <param name="scale" value="exactfit">         <param name="loop" value="false">         <param name="menu" value="false">         <param name="quality" value="best">         <param name="bgcolor" value="#ffffff">         <param name="wmode" value="transparent">         <param name="flashvars" value="trustedOrigins=getbootstrap.com%2C%2F%2Fgetbootstrap.com%2Chttp%3A%2F%2Fgetbootstrap.com">         <embed src="/assets/flash/ZeroClipboard.swf?noCache=1409845180835" loop="false" menu="false" quality="best" bgcolor="#ffffff" width="100%" height="100%" name="global-zeroclipboard-flash-bridge" allowscriptaccess="sameDomain" allowfullscreen="false" type="application/x-shockwave-flash" wmode="transparent" pluginspage="http://www.macromedia.com/go/getflashplayer" flashvars="trustedOrigins=getbootstrap.com%2C%2F%2Fgetbootstrap.com%2Chttp%3A%2F%2Fgetbootstrap.com" scale="exactfit">                </object>
</div>
  </body>
</html>