<!DOCTYPE html>

<?php
session_start();
if(isset($_SESSION['kiosk']['user_id'])){
    header("location: index.php");
}
$msg="";
$username = "";
$password = "";
if(isset($_POST['login'])){
    include "../db/db.php";

    $username = $_POST['username'];
    $password = $_POST['password'];

    $query_account = mysql_query("SELECT * FROM account_t WHERE username='{$username}'") or die(mysql_error());
    if(mysql_num_rows($query_account)>0){
        $row_account = mysql_fetch_assoc($query_account);
        $account_no = $row_account['account_no'];
        $db_password = $row_account['password'];
        $account_no = $row_account['account_no'];
        if($db_password==$password){
            
            $_SESSION['kiosk']['user_id'] = $account_no;
            header("location: index.php");
        }
        else{
            $msg = "Wrong password";
        }
        
    }
    else{
        $msg = "invalid username.";
    }
}

?>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Registration | Flat Theme</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/font-awesome.min.css" rel="stylesheet">
    <link href="css/prettyPhoto.css" rel="stylesheet">
    <link href="css/animate.css" rel="stylesheet">
    <link href="css/main.css" rel="stylesheet">
    <link href="css/ours.css" rel="stylesheet">
    <!--[if lt IE 9]>
    <script src="js/html5shiv.js"></script>
    <script src="js/respond.min.js"></script>
    <![endif]-->       
    <link rel="shortcut icon" href="images/ico/favicon.ico">
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="images/ico/apple-touch-icon-144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="images/ico/apple-touch-icon-114-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="images/ico/apple-touch-icon-72-precomposed.png">
    <link rel="apple-touch-icon-precomposed" href="images/ico/apple-touch-icon-57-precomposed.png">
</head><!--/head-->
<body>
    <header class="navbar navbar-inverse navbar-fixed-top wet-asphalt" role="banner" style="box-shadow: 1px 0 5px 0 #000000;">
        <div class="container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
            </div>
            <div class="collapse navbar-collapse">
                <ul class="nav navbar-nav navbar-right">
                    <li><a href="#">Home</a></li>
                    <li class="dropdown active">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">Pages <i class="icon-angle-down"></i></a>
                        <ul class="dropdown-menu">
                            <li><a href="career.html">Career</a></li>
                            <li><a href="blog-item.html">Blog Single</a></li>
                            <li><a href="faq.html">FAQ</a></li>
                            <li><a href="pricing.html">Pricing</a></li>
                            <li><a href="404.html">404</a></li>
                            <li class="active"><a href="registration.html">Registration</a></li>
                            <li class="divider"></li>
                            <li><a href="privacy.html">Privacy Policy</a></li>
                            <li><a href="terms.html">Terms of Use</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </header><!--/header-->

    <section id="title" class="amethyst">
        <div class="container">
            <div class="row">
                <div class="col-sm-12 center">
                   <h1 style="margin:50px">BUCS Kiosk</h1>
                </div>
            </div>
        </div>
    </section><!--/#title-->     

    <section id="registration" class="container">
        <form id="login_form" class="center" role="form" action="" method="post">
            <fieldset class="registration-form" style="position:relative; top:-100px; width:400px;">
                <div class="form-group">
                    <input type="text" id="username" name="username" placeholder="Username" class="form-control" value="<?php echo ($username!='')? $username:''; ?>">
                </div>
               
                <div class="form-group">
                    <input type="password" id="password" name="password" placeholder="Password" class="form-control"  value="<?php echo ($password!='')? $password:''; ?>">
                </div>
               
                <div class="form-group">
                    <button type="submit" id="login" name="login" class="btn btn-info btn-md btn-block">LOGIN</button>
                </div>
                <?php if($msg!=""){?>
                    <div id="error_msg" class="alert alert-danger"><?php echo $msg;?></div>
                <?php }?>
            </fieldset>
        </form>
    </section><!--/#registration-->

   

    <footer id="footer" class="midnight-blue" style="position:fixed;width:100%;bottom:0;">
        <div class="container">
            <div class="row">
                <div class="col-sm-6">
                    &copy; 2015 Bicol University All Rights Reserved.
                </div>
                <div class="col-sm-4">
                   
                </div>
                <div class="col-sm-2">
                    <a href="../index2.php"> Go to Kiosk  <i class="icon-chevron-right "></i></a>
                </div>
            </div>
        </div>
    </footer><!--/#footer-->

    <script src="js/jquery.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery.prettyPhoto.js"></script>
    <script src="js/main.js"></script>
</body>
</html>