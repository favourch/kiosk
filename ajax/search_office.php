<?php
	include "../db/db.php";

	$search_str = $_GET['search_str'];
	$query_unit = mysql_query("SELECT * FROM unit_t WHERE unit_name LIKE '%{$search_str}%' OR unit_abbrev LIKE '%{$search_str}%' ORDER BY type") or die(mysql_error());
	if(mysql_num_rows($query_unit) > 0){
    while($row_unit = mysql_fetch_assoc($query_unit)){
  		$unit_name = $row_unit['unit_name'];
  		$unit_id = $row_unit['unit_id'];
      $unit_type = $row_unit['type'];
      switch ($unit_type) {
        case 'college':
          $color = "#C183D5";
          break;
        case 'course':
          $color = "#F28A22";
          break;
        case 'department':
          $color = "#66C6EB";
          break;
        
        default:
          $color = "#EDB82A";
          break;
      }
      

  	?>
  					           <div class="search-item-box" style="">
                          <div style="float:left;width:5px;height:100%;background-color:<?php echo $color;?>"></div>
                          <a href="office-info.php?unit_id=<?php echo $unit_id; ?>&&unit_name=<?php echo $unit_name; ?>" style="vertical-align: middle;
                                                                display: block;
                                                                margin-top: 30px;">
                              <section ><?php echo $unit_name; ?></section>
                              <p>
                                 Bicol University College of Science
                              </p>
                          </a>
                          
                      </div><!-- /#search-item -->


  	<?php

  	}
  }
  else{
    ?>
                       <div class="search-item-box" style="width:100%; text-align:center;">
                          <div style="float:left;width:5px;height:100%;background-color:#ED2A2A"></div>
                          <a href="#" style="vertical-align: middle;display: block; margin-top: 30px;">
                              <section style="text-align:center; " >No result Found.</section>
                              
                          </a>
                          
                      </div><!-- /#search-item -->


    <?php

  }

//echo "search_office.php";
?>