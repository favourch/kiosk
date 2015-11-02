<?php 
	include '../../db/db.php';

	if(isset($_POST['submit'])){
		$unit_name=$_POST['unit_name'];
		$unit_abbrev=$_POST['abbrev'];
		$unit_type=$_POST['unit_type'];
		
		$query_insert_unit=mysql_query("INSERT INTO unit_t VALUES('', '$unit_name', '$unit_abbrev', '$unit_type')") or die(mysql_error());
		$latest_id=mysql_query("SELECT MAX(unit_id) as latest_id FROM unit_t");
		$row_id=mysql_fetch_assoc($latest_id);
		$id=$row_id['latest_id'];
		$select=mysql_query("SELECT * FROM unit_t WHERE unit_id='$id'") or die(mysql_error());
		$row_select=mysql_fetch_assoc($select);
		$type_of_unit=$row_select['type'];
		echo $type_of_unit;
			if($type_of_unit=='college')
				$query_second=mysql_query("INSERT INTO college_unit_t VALUES('$id', 'CS')");
			else if ($type_of_unit=='department'){
				$query_second=mysql_query("INSERT INTO department_unit_t VALUES('$id')");
			} else if($type_of_unit=='course'){
				$query_second=mysql_query("INSERT INTO course_unit_t VALUES('$id', null)");
			}
			
		header("Location: ../add_unit.php?unit_id=$id");
	}

	if(isset($_POST['update'])){
		$unit_name=$_POST['unit_name'];
		$unit_abbrev=$_POST['abbrev'];
		$unit_type=$_POST['unit_type'];
		$unit_id=$_POST['unit_id'];
		
		$query_update=mysql_query("UPDATE unit_t SET unit_name='$unit_name', unit_abbrev='$unit_abbrev', type='$unit_type' WHERE unit_id='$unit_id'") or die(mysql_error());
		
		header("Location: ../add_unit.php?unit_id=$unit_id");
		}


	if($_GET['action']=='ok'){
		$unit_value=$_GET['position'];
		$member_value=$_GET['member_type'];
		$quantity=$_GET['quantity'];
		$unit_id=$_GET['unit_iden'];

		$query_select_position=mysql_query("SELECT * FROM position_t WHERE position_name='$unit_value'") or die(mysql_error());
		$count=mysql_num_rows($query_select_position);

		if($unit_value==""){
			//echo "insert positions";
		} else if ($count>0){
			echo "duplicate position";
		
		} else {
			$query_insert_position=mysql_query("INSERT INTO position_t VALUES('', '$unit_value', NULL, '$quantity', '$unit_id')") or die(mysql_error());
			$id=mysql_insert_id();
			$query_insert=mysql_query("INSERT INTO member_t VALUES('', '$unit_id', '$id', '$member_value')") or die(mysql_error());	
			echo "success";
		}
	}
	
	 if($_GET['action']=='remove'){
		
		$position_value=$_GET['position_value'];
		$unit_iden=$_GET['unit_iden'];
		
		$query_delete=mysql_query("DELETE FROM member_t WHERE position_id='$position_value' AND unit_id='$unit_iden'");
	}
	
	if(isset($_GET['toDo'])=='delete'){
		$unit_id=$_GET['unit_id'];
		
		$query_delete=mysql_query("DELETE FROM unit_t WHERE unit_id='$unit_id'");
		
		header("location: {$_SERVER['HTTP_REFERER']}");
		}	

	 if($_GET['action']=='update'){
		
		$position_name=$_GET['p_name'];
		$p_description=$_GET['p_desc'];
		$position_id=$_GET['position_id'];
		
		$query_update_p=mysql_query("UPDATE position_t SET position_name='$position_name', position_description='$p_description'
									WHERE position_id='$position_id'");

		echo "success";
	}
	
	if(isset($_GET['toDo'])=='delete_position'){
		$p_id=$_GET['position_id'];
		$unit_id=$_GET['u_id'];

		$query_delete=mysql_query("DELETE FROM position_t WHERE position_id='$p_id'");
		
		header("Location: ../position_list.php?unit_id=$unit_id");
		}	

	 if($_GET['action']=='set_names'){
		
		$unit_id=$_GET['u_ID'];
		$m_type=$_GET['m_type'];

		if($m_type=='personnel'){
			echo "<option value=''>Select ...</option>";
			$query=mysql_query("SELECT * FROM personnel_t");
			while($row=mysql_fetch_assoc($query)){
				$personnel_id=$row['personnel_id'];
				$f_name=$row['f_name'];
				$l_name=$row['l_name'];
				$full_name=ucfirst($f_name).' '.ucfirst($l_name);
				echo "<option value='".$personnel_id."'>".$full_name."</option>";

			}
		} else {
			echo "<option value=''>Select ...</option>";
			$query=mysql_query("SELECT * FROM student_t");
			while($row=mysql_fetch_assoc($query)){
				$f_name=$row['f_name'];
				$l_name=$row['l_name'];
				$full_name=ucfirst($f_name).' '.ucfirst($l_name);
				$student_id=$row['student_id'];
				echo "<option value='".$student_id."'>".$full_name."</option>";
				echo "<br />";
			}
		}


		//echo "success";
	}

	 if($_GET['action']=='set_position'){
		
		$unit_id=$_GET['unit_ID'];
		//$m_type=$_GET['m_type'];
		$query_positions=mysql_query("SELECT * FROM member_t, position_t WHERE member_t.unit_id='$unit_id'
									AND member_t.position_id=position_t.position_id");
		echo "<option value=''>Select ...</option>";
		while($row_positions=mysql_fetch_assoc($query_positions)){
			$position_id=$row_positions['position_id'];
			$position_name=$row_positions['position_name'];
			echo "<option value='".$position_id."'>".$position_name."</option>";

		}
		//echo "success";
	}

	 if($_GET['action']=='ok_setmembers'){
		
		$unit_id=$_GET['UNIT_id'];
		$position_id=$_GET['position_ID'];
		$id=$_GET['member_ID'];
		//$m_type=$_GET['m_type'];

		$query_member_t=mysql_query("SELECT * FROM member_t, position_t WHERE member_t.position_id='$position_id'  
									AND position_t.position_id='$position_id' AND member_t.unit_id='$unit_id'") or die(mysql_error());
		$row_member_t=mysql_fetch_assoc($query_member_t);
		$mem_id=$row_member_t['member_id'];
		$mem_type=$row_member_t['member_type'];
		$position_quantity=$row_member_t['quantity'];

		if($mem_type=='personnel'){
		$query_select=mysql_query("SELECT * FROM personnel_members_t WHERE member_id='$mem_id'");

		 if((mysql_num_rows($query_select)>0) && ($position_quantity!='multiple')){
		 	echo "unique position is duplicated";
		 } else {
			 $query_inert_mem=mysql_query("INSERT INTO personnel_members_t VALUES('', '$mem_id', NULL, '$id')") or die(mysql_error());
			//echo "success personnel";
		 }

		} else if ($mem_type=='student'){
			$query_inert_mem=mysql_query("INSERT INTO student_members_t VALUES('', $mem_id', NULL, '$id')");
			//echo "success student";
		}
		//echo "success";
	}

	 if($_GET['action']=='onchange'){
		
		
		$position_id=$_GET['p_ID'];
		
		//$m_type=$_GET['m_type'];

		$query_member_t=mysql_query("SELECT * FROM member_t WHERE position_id='$position_id'");
		$row_member_t=mysql_fetch_assoc($query_member_t);
		$mem_type=$row_member_t['member_type'];

		if($mem_type=='personnel'){
			$query=mysql_query("SELECT * FROM personnel_t");
			while($row=mysql_fetch_assoc($query)){
				$personnel_id=$row['personnel_id'];
				$f_name=$row['f_name'];
				$l_name=$row['l_name'];
				$full_name=ucfirst($f_name).' '.ucfirst($l_name);
				echo "<option value='".$personnel_id."'>".$full_name."</option>";

			}
		} else {
			$query=mysql_query("SELECT * FROM student_t");
			while($row=mysql_fetch_assoc($query)){
				$f_name=$row['f_name'];
				$l_name=$row['l_name'];
				$full_name=ucfirst($f_name).' '.ucfirst($l_name);
				$student_id=$row['student_id'];
				echo "<option value='".$student_id."'>".$full_name."</option>";
				echo "<br />";
			}
		}
	}


	if(isset($_POST['multi_delete'])){
			$name=$_POST['name'];
			for($i=0; $i<sizeof($name); $i++){
			$query_delete=mysql_query("DELETE FROM position_t WHERE position_id={$name[$i]}");
			echo "{$name[$i]}";
			}
			header("location: {$_SERVER['HTTP_REFERER']}");

	}

	if($_GET['action']=='edit_officer'){
			$personnel_id=$_GET['personnel_id'];
			$query_officer=mysql_query("SELECT * FROM personnel_members_t, member_t WHERE personnel_members_t.personnel_id='$personnel_id' 
										AND personnel_members_t.member_id=member_t.member_id");
			$row_officer=mysql_fetch_assoc($query_officer);
			$member_type=$row_officer['member_type'];

			if($member_type=='personnel'){
					$query_p=mysql_query("SELECT * FROM personnel_t");

					echo "<select name='member' id='member' class='form-control'>";
					while($row_p=mysql_fetch_assoc($query_p)){
						$p_id=$row_p['personnel_id'];
						$f_name=$row_p['f_name'];
						$l_name=$row_p['l_name'];
						$full_name=$f_name.' '.$l_name;
						echo "<option value='$p_id'>$full_name</option>";
					}
					echo "</select>";
			} 
}

	if(isset($_POST['ok_edit'])){
		$personnel=$_POST['member'];
		$pm_id=$_POST['pm_id'];
		echo $pm_id;
		$query=mysql_query("UPDATE personnel_members_t SET personnel_id='$personnel' WHERE pm_id='$pm_id'") or die(mysql_error());

		header("location: {$_SERVER['HTTP_REFERER']}");
	}

	if($_GET['action']=='edit_s_officer'){
			$student_id=$_GET['student_id'];
			$query_officer=mysql_query("SELECT * FROM student_members_t, member_t WHERE student_members_t.student_id='$student_id' 
										AND student_members_t.member_id=member_t.member_id");
			$row_officer=mysql_fetch_assoc($query_officer);
			
					$query_s=mysql_query("SELECT * FROM student_t");
					echo "<select name='member' class='form-control'>";
					while($row_s=mysql_fetch_assoc($query_s)){
						$s_id=$row_s['student_id'];
						$f_name=$row_s['f_name'];
						$l_name=$row_s['l_name'];
						$full_name=$f_name.' '.$l_name;
						echo "<option value='$s_id'>$full_name</option>";

					}
					echo "</select>";
			
}

	if(isset($_POST['ok_edit_s'])){
		$student=$_POST['member'];
		$sm_id=$_POST['sm_id'];
		echo $sm_id.''.$student;
		$query=mysql_query("UPDATE student_members_t SET student_id='$student' WHERE sm_id='$sm_id'") or die(mysql_error());

		header("location: {$_SERVER['HTTP_REFERER']}");
	}

	if($_GET['action']=='delete_officer'){
		$pm_id=$_GET['pm_id'];
		$query=mysql_query("DELETE FROM personnel_members_t WHERE pm_id='$pm_id'") or die(mysql_error());

		header("location: {$_SERVER['HTTP_REFERER']}");
	}
?>