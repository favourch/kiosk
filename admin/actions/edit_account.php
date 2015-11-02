<?php

	$account_no = $_POST['e_account_no'];
	$e_username = $_POST['e_username'];
	$e_password = $_POST['e_password'];
	$e_type = $_POST['e_type'];

    include "../../db/db.php";

    $privilege=(isset($_POST['e_checkbox']))? $_POST['e_checkbox']:NULL;
    for($i=0; $i<sizeof($privilege); $i++){
        echo $privilege[$i]."<br>";

    }
    if($privilege!=NULL){
        echo $priv_1 = is_numeric((array_search("System Administrator",$privilege)))? 1:0;
        echo $priv_2 = is_numeric((array_search("E - Bulletin Management",$privilege)))? 1:0;

        echo $priv_3 = is_numeric((array_search("Personnel Data",$privilege)))? 1:0;
        echo $priv_4 = is_numeric((array_search("Enrollment Data",$privilege)))? 1:0;
        echo $priv_5 = is_numeric((array_search("Payment Data",$privilege)))? 1:0;

        echo $priv_6 = is_numeric((array_search("Office Information",$privilege)))? 1:0;
        echo $priv_7 = is_numeric((array_search("Member Assignment",$privilege)))? 1:0;

         //disable account ; not actually deleting it from the database...
        mysql_query("UPDATE account_t SET username='{$e_username}', 
                      password='{$e_password}',
                      type ='{$e_type}', 
                                      priv_admin = '{$priv_1}',
                                      priv_bull = '{$priv_2}',
                                      priv_cms1 = '{$priv_3}',
                                      priv_cms2 = '{$priv_4}',
                                      priv_cms3 = '{$priv_5}',
                                      priv_ois1 = '{$priv_6}',
                                      priv_ois2 = '{$priv_7}'
                                WHERE account_no='{$account_no}'") or die(trigger_error(mysql_error()));
    }
    else{
        mysql_query("UPDATE account_t SET username='{$e_username}', 
                                          password='{$e_password}',
                                          type ='{$e_type}'
                                    WHERE account_no='{$account_no}'") or die(trigger_error(mysql_error()));
    }


   

    header("location: {$_SERVER['HTTP_REFERER']}");


?>