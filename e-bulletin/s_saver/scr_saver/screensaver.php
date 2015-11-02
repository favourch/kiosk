<!DOCTYPE html>
<?php include '../../../db/db.php'; ?>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" style="padding: 0px"> <!--<![endif]-->
	<head>
	    <meta charset="utf-8">
	    <meta http-equiv="X-UA-Compatible" content="IE=edge">
		<title>Animate Slider jQuery Plugin</title>
		<!-- Plugin css -->
		<link href="../../../css/bootstrap.min.css" rel="stylesheet">
		<!-- <link href="../../../css/font-awesome.min.css" rel="stylesheet"> -->
	    <!-- <link href="../../../css/prettyPhoto.css" rel="stylesheet"> -->
	    <!-- <link href="../../../css/animate.css" rel="stylesheet"> -->
	    <link href="../../../css/main.css" rel="stylesheet">
	    <link href="../../../css/ours.css" rel="stylesheet">
		<link rel="stylesheet" href="css_S/jquery.animateSlider.css">
		<!-- Demo css -->
		<link rel="stylesheet" href="css_S/font-awesome.css">
	    <link rel="stylesheet" href="css_S/normalize.css">
		<!-- <link rel="stylesheet" href="css_S/demo1.css"> -->

		<style type="text/css">

		.post1, .post2, .post3, .post4{
            background-color: rgba(255, 255, 130, 1);
			width: 315px;
			margin: 35px 10px 10px 10px;
			/*background-color: #fff*/;
			word-wrap: break-word;
			display: inline-block;
			vertical-align: top;
		}

		.post{
            background-color: rgba(255, 255, 130, 1);
			width: 240px;
			margin: 5px;
			word-wrap: break-word;
			display: inline-block;
			vertical-align: top;
        }
        .post_m{
            background-color: rgba(239, 0, 255, 0.57);
			width: 240px;
			margin: 5px;
			word-wrap: break-word;
			display: inline-block;
			vertical-align: top;
        }
        .post_a{
            background-color: rgba(79, 154, 239, 0.57);
			width: 240px;
			margin: 5px;
			word-wrap: break-word;
			display: inline-block;
			vertical-align: top;
        }
        .post_h{
            background-color: rgba(5, 255, 8, 0.68);
			width: 240px;
			margin: 5px;
			word-wrap: break-word;
			display: inline-block;
			vertical-align: top;
        }
		
		
		.post_section {
			margin: 0 auto;
			margin-right: 150px;
			margin-top: 20px;
			width: 1066px;
			height: 87%;
			padding: 0px 10px 10px 10px;
			transition: width 1s ease, margin-right 1s ease;
			}
		
		.post_adjust {
			margin-right: 45px;
			width: 1045px;
			
			}
		
	
					
		.content {
			padding: 5px 10px 10px 10px;
			box-sizing: border-box;
			color: rgba(0,0,0,0.8);
			font-family: "Palatino Linotype", "Book Antiqua", Palatino, serif;
			font-size: 25px;
			font-family: 'Roboto', sans-serif;
			}

       
        .post hr{
            margin: 0;
            border: 1px solid #9b59b6;
        }
		
		#title {
			font-weight:bold;
			font-size:26px;
			padding-bottom: 5px;
			}

       
		.button {
			margin: 0 0 10px 0; 
			width: 305px; 
			height: 50px;
			font-size: 24px;
			
			}
		.section{
			margin-top: -10px;
			}
			
		
		
		.size {
			width: 315px;
			height: 200px;
			
			}
		.sizeof2 {
			width: 157.5px;
			height: 200px;
			
			
			}
		.sizeof3 {
			width: 117px;
			height: 62px;
		}
		.sample{
			width:100px;
			display: table-cell;
			}

			
		.side {
			margin: 10px 10px 0px 10px; 
			color: #FFF; 
			font-size: 20px; 
			padding: 10px;
			
			}
	
		
		.footer {
			font-style: italic;
			font-size: 12px;
			float: right;
			font-family: Arial
						
			}
			

	
		.tab-up {
			height: 50px;
			padding-top: 15px;
			transition: height 1s ease, padding-top 1s ease;

		}
		.tab-down {
			height: 88px; 
			padding-top: 35px;

		}
		
		.heading {
			height: 55px;
			transition: height 1s ease;
		}

		.heading-adjust {
			height: 93px;
		}

		.unit_checkbox {
			margin: 21px 5px 21px 100px;
		}

		.unit_adjust{
			margin: 21px 5px 21px 300px;
		}






/***********************************************************/

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
        color:#fff;
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
        background-image: url("../../../img/kioskcolor.jpg");
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
	</head>

    <body style="padding: 0px">

	<ul class="anim-slider" id="post_content" style="background-color:#0484C8;"> <!-- A93B41 -->

		<?php 
			$c=0;
			$query_img=mysql_query("SELECT * FROM image_slide_t, attachment_t, posts_t WHERE image_slide_t.attachment_id=attachment_t.attachment_id
									AND attachment_t.post_id=posts_t.post_id");
		
		?>
		<!-- Slide No1 -->
	
	
			 
			<?php 	while($row_img=mysql_fetch_assoc($query_img)){
               		 
					  	$account_no=$row_img['account_no'];
					   	$post_id=$row_img['post_id'];
					   	$post_title=$row_img['post_title'];
					   	$time_of_post=$row_img['time_of_post'];
					   	$date_of_post=$row_img['date_of_post'];
					   	$identity=$row_img['identity'];
					   	$type_of_post=$row_img['type_of_post'];
					   	$status=$row_img['status'];
					   //echo "$post_title";
					   	$posts[$c]["post_id"]=$post_id;
					   	$posts[$c]["types"]=$type_of_post;
					   	$posts[$c]["post_title"]=$post_title;
					   	$posts[$c]["time_of_post"]=$time_of_post;
					   	$posts[$c]["date_of_post"]=$date_of_post;
					   	$posts[$c]["identity"]=$identity;
				   		$posts[$c]["account_no"]=$account_no;
				   		$posts[$c]["status"]=$status;
    					$c++; 

    					
    				
               		} ?>
          		
		
		
		
		<!-- Slide No2 -->
		


		<!-- Slide No3 -->
	
		<!-- Arrows -->
		
		<!-- Dynamically created dots -->
		
	</ul>

		<!-- demo -->
		

		<!-- Bower Depedencies -->
		<script src="../dist/jquery.js"></script>
		<script src="../dist/modernizr.js"></script>
		<script>
		 var posts=<?php echo json_encode(isset($posts)?$posts:""); ?>;
       
       	if(posts==""){
       		//alert("here");
       		$("#content").html("<h1>No Post Found</h1>")
       	}
		
		$.ajax({
			url: "event.php",
			type: "POST",
			data: {posts:posts},
			async: false,
			success: function(data){
					//alert("here");
					//console.log(data);
					$("#post_content").html(data);


			}

		})

		</script>
		<!-- Load the plugin -->
		<script src="../src/jquery.animateSlider.js"></script>
		<script src="../../../js/masonry.pkgd.min.js"></script>
    	<script src="../../../js/imagesloaded.pkgd.min.js"></script>
		<script>
		 $(".anim-slider").animateSlider(
		 	{
		 		autoplay	:true,
		 		interval	:10000,
		 		animations 	: 
				{
					0	: 	//Slide No1
					{
						".cover-screen":
						{
							show 	  :"fadeIn",
							hide	  :"fadeOut",
							delayShow :"delay0-5s"

						},
						".cover-text":
						{
							show 	  :"fadeInDown",
							hide 	  :"fadeOutUp",
							delayShow :"delay1-5s"
						}

					},
					1	: 	//Slide No1
					{
						".post1"	: 
						{
							show   	  : "bounceIn",
							hide 	  : "flipOutX",
							delayShow : "delay1s"
	 					},
	 					".post2":
	 					{
	 						show 	  : "fadeInUpBig",
							hide 	  : "fadeOutDownBig",
							delayShow : "delay1-5s"
	 					},
	 					".post3" 	:
	 					{
							show   	  : "bounceInRight",
							hide 	  : "fadeOutRightBig",
							delayShow : "delay1-5s"
	 					},
	 					".post4":
	 					{
	 						show 	  : "bounceInUp",
							hide 	  : "fadeOutLeftBig",
							delayShow : "delay2s"
						}	
					},
					2	: //Slide No2
					{	
						".post1":
						{
							show 		: "fadeIn",
							hide 		: "fadeOut",
							delayShow   : "delay0-5s"
						},
						".post2" 	:
						{
							show 	 	: "bounceIn",
							hide 	 	: "bounceOut",
							delayShow 	: "delay2s"
						},
						".post3":
						{
							show 	 	: "bounceInDown",
							hide 	 	: "bounceOutLeft",
							delayShow 	: "delay2-5s"
						},
						".post4":
						{
							show 	 	: "bounceInRight",
							hide 	 	: "bounceOutRight",
							delayShow 	: "delay3s"
						},




						
						// "#fade" :
						// {
						// 	show 	 	: "fadeInLeft",
						// 	hide 	 	: "fadeOutLeft",
						// 	delayShow 	: "delay3-5s"
						// },
						// "#fadeUp":
						// {
						// 	show 	 	: "fadeInUpBig",
						// 	hide 	 	: "fadeOutUpBig",
						// 	delayShow 	: "delay4s"
						// },
						// "#fadeDown":
						// {
						// 	show 	 	: "fadeInDownBig",
						// 	hide 	 	: "fadeOutDownBig",
						// 	delayShow 	: "delay4-5s"	
						// },
						// "#rotate" :
						// {
						// 	show 	 	: "rotateIn",
						// 	hide 	 	: "rotateOut",
						// 	delayShow 	: "delay5-5s"
						// },
						// "#rotateRight" :
						// {
						// 	show 	 	: "rotateInUpRight",
						// 	hide 	 	: "rotateOutDownRight",
						// 	delayShow 	: "delay6s"
						// },
						// "#rotateLeft" :
						// {
						// 	show 	 	: "rotateInUpLeft",
						// 	hide 	 	: "rotateOutDownLeft",
						// 	delayShow 	: "delay6-5s"
						// }
					},
					
				}
		 	});

// bounceIn
// bounceInDown
// bounceInLeft
// bounceInRight
// bounceInUp
// bounceOut
// bounceOutDown
// bounceOutLeft
// bounceOutRight
// bounceOutUp
// fadeIn
// fadeInDown
// fadeInDownBig
// fadeInLeft
// fadeInLeftBig
// fadeInRight
// fadeInRightBig
// fadeInUp
// fadeInUpBig
// fadeOut
// fadeOutDown
// fadeOutDownBig
// fadeOutLeft
// fadeOutLeftBig
// fadeOutRight
// fadeOutRightBig
// fadeOutUp
// fadeOutUpBig
// flipInX
// flipInY
// flipOutX
// flipOutY
// lightSpeedIn
// lightSpeedOut
// rotateIn
// rotateInDownLeft
// rotateInDownRight
// rotateInUpLeft
// rotateInUpRight
// rotateOut
// rotateOutDownLeft
// rotateOutDownRight
// rotateOutUpLeft
// rotateOutUpRight
// hinge
// rollIn
// rollOut
// zoomIn
// zoomInDown
// zoomInLeft
// zoomInRight
// zoomInUp
// zoomOut
// zoomOutDown
// zoomOutLeft
// zoomOutRight
// zoomOutUp
// slideInDown
// slideInLeft
// slideInRight
// slideInUp
// slideOutDown
// slideOutLeft
// slideOutRight
// slideOutUp

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
	        };
	        function checkTime(i) {
	            if (i<10) {i = "0" + i};  // add zero in front of numbers < 10
	            return i;
	        }
	        startTime();
		</script>
    </body>
</html>
