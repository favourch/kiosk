<?php

include_once 'actions/misc_functions.php';
include_once '../db/db.php';
 ?>

    <header class="navbar navbar-inverse navbar-fixed-top wet-asphalt" role="banner">
        <div class="container">
            
            <div class="collapse navbar-collapse">
                <ul class="nav navbar-nav navbar-right">
                    
                    
                    <li class="dropdown">

                        <a href="#" class="dropdown-toggle" data-toggle="dropdown"><?php echo getName(); ?><i class="icon-angle-down"></i></a>
                        <ul class="dropdown-menu">
                            <li><a href="account.php">My Account</a></li>
                            <li class="divider"></li>
                            
                            <li><a href="">Admin Manual</a></li>
                            <li><a href="../about-us.html">Contact Developers</a></li>
                            <li><a href="admin_guide.php">Guide</a></li>
                            <li class="divider"></li>
                            <li><a href="actions/logout.php">Logout</a></li>
                        </ul>
                    </li>
                    <li><a href="../index.php">Go to Kiosk!</a></li>
                </ul>
            </div>
        </div>
    </header><!--/header-->