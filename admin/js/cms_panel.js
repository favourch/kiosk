//cms_panel.js


var initTable = {
	                "bLengthChange": false,
	                'iDisplayLength': 5,
	                "bFilter": true,
	                "bInfo": false,
	                "processing": true,
	                "ajax": ""
	            };





//student functions
 		function edit_student(studentID){
            console.log("Editing student : ID No: "+studentID);

            //load form to modal using ajax
            $.ajax({
            	url:"ajax/form_edit_student.php",
            	async: false,
            	success: function(data){
            		$("#edit_modal .modal-body").html(data);
            		$("#edit_button").unbind("click").click(edit_student_submit);
            		console.log("student form loaded");
            	}
            });

            var student_id = studentID;

            $("#student_id").val(studentID);
            //ajax retrieve data 
            $.ajax({
                url: "ajax/details_student.php",
                type: "GET",
                data: {student_id:student_id},
                async : false,
                success: function(data){
                    //alert(data);
                    var details = jQuery.parseJSON(data);
                    var f_name = details['f_name'];
                    var m_name = details['m_name'];
                    var l_name = details['l_name'];
                    var gender = details['gender'];
                    var status = details['status'];


                    $("#sf_name").val(f_name);
                    $("#sm_name").val(m_name);
                    $("#sl_name").val(l_name);
                    $("#student_gender").val(gender);
                    $("#student_status").val(status);

                }
            });
            $("#edit_modal").modal("toggle");
        }
        function edit_student_submit(){
            var data = {};
            data['studentID'] = $("#student_id").val();
            data['f_name'] = $("#sf_name").val();
            data['m_name'] = $("#sm_name").val();
            data['l_name'] = $("#sl_name").val();
            data['gender'] = $("#student_gender").val();
            data['status'] = $("#student_status").val();

            $.ajax({
                url: "ajax/update_student.php",
                type: "GET",
                data: data,
                async : false,
                success: function(data){
                    console.log(data);
                    $('#table_student').dataTable().fnDestroy();
                    initTable["ajax"] = "ajax/load_student_list.php";
                    $('#table_student').dataTable(initTable);
                    initTable["ajax"] = "";
                }
            });
            $("#edit_modal").modal("toggle");
        } 
        function delete_student(studentID){
            $("#delete_modal").modal("toggle");
        }
        function load_view_student(studentID){
            $("#sload_modal_id").val(studentID);
            $.ajax({
                url: "ajax/details_student.php",
                type: "GET",
                data: {student_id:studentID},
                async : false,
                success: function(data){
                    //alert(data);
                    var details = jQuery.parseJSON(data);
                    var f_name = details['f_name'];
                    var m_name = details['m_name'];
                    var l_name = details['l_name'];
                    var gender = details['gender'];
                    var status = details['status'];

                    $("#sload_modal_name").val(f_name+" "+m_name+" "+l_name);

                }
            });
            sload_modal_data();
            $("#sload_modal").modal("toggle");

        }


// personnel functions


        function edit_personnel(personnelID){
            console.log("Editing personnel : ID No: "+personnelID);
            //load form to modal using ajax
            $.ajax({
            	url:"ajax/form_edit_personnel.php",
            	async: false,
            	success: function(data){
            		$("#edit_modal .modal-body").html(data);
            		$("#edit_button").unbind("click").click(edit_personnel_submit);
            		console.log("student form loaded");

            	}
            });

            //initialize values
            var personnel_id = personnelID;

            $("#personnel_id").val(personnelID);
            //ajax retrieve data 
            $.ajax({
                url: "ajax/details_personnel.php",
                type: "GET",
                data: {personnel_id:personnel_id},
                async : false,
                success: function(data){
                    //alert(data);
                    var details = jQuery.parseJSON(data);
                    var f_name = details['f_name'];
                    var m_name = details['m_name'];
                    var l_name = details['l_name'];
                    var gender = details['gender'];
                    var status = details['status'];


                    $("#pf_name").val(f_name);
                    $("#pm_name").val(m_name);
                    $("#pl_name").val(l_name);
                    $("#personnel_gender").val(gender);
                    $("#personnel_status").val(status);

                }
            });
            $("#edit_modal").modal("toggle");
        }
        function edit_personnel_submit(){
            var data = {};
            data['personnelID'] = $("#personnel_id").val();
            data['f_name'] = $("#pf_name").val();
            data['m_name'] = $("#pm_name").val();
            data['l_name'] = $("#pl_name").val();
            data['gender'] = $("#personnel_gender").val();
            data['status'] = $("#personnel_status").val();

            $.ajax({
                url: "ajax/update_personnel.php",
                type: "GET",
                data: data,
                async : false,
                success: function(data){
                    console.log(data);
                    $('#table_personnel').dataTable().fnDestroy();
                    initTable["ajax"] = "ajax/load_faculty_list.php";
                    $('#table_personnel').dataTable(initTable);
                    initTable["ajax"] = "";
                    
                }
            });
            $("#edit_modal").modal("toggle");
        } 

        // function delete_personnel(){
        //     $("delete_modal").modal("toggle");
        // }
        function load_view_personnel(personnelID){
            $("#pload_modal_id").val(personnelID);
            $.ajax({
                url: "ajax/details_personnel.php",
                type: "GET",
                data: {personnel_id:personnelID},
                async : false,
                success: function(data){
                    //alert(data);
                    var details = jQuery.parseJSON(data);
                    var f_name = details['f_name'];
                    var m_name = details['m_name'];
                    var l_name = details['l_name'];
                    var gender = details['gender'];
                    var status = details['status'];

                    $("#pload_modal_name").val(f_name+" "+m_name+" "+l_name);

                }
            });
            pload_modal_data();
            $("#pload_modal").modal("toggle");

        }


// subject functions


        function edit_subject(subjectID){
            console.log("Editing subject : ID No: "+subjectID);
            //load form to modal using ajax
            $.ajax({
            	url:"ajax/form_edit_subject.php",
            	async: false,
            	success: function(data){
            		$("#edit_modal .modal-body").html(data);
            		$("#edit_button").unbind("click").click(edit_subject_submit);
            		console.log("subject form loaded");

            	}
            });


            //initialize values
            var subject_id = subjectID;

            $("#subject_id").val(subjectID);
            //ajax retrieve data 
            $.ajax({
                url: "ajax/details_subject.php",
                type: "GET",
                data: {subject_id:subject_id},
                async : false,
                success: function(data){
                    //alert(data);
                    var details       = jQuery.parseJSON(data);
                    var subject_id    = details['subject_id'];
                    var subject_code  = details['subject_code'];
                    var subject_title = details['subject_title'];
                    var lec_units 	  = details['lec_units'];
                    var lab_units 	  = details['lab_units'];
                    var units	      = details['units'];


                    $("#subject_id").val(subject_id);
                    $("#subject_code").val(subject_code);
                    $("#subject_title").val(subject_title);
                    $("#lec_units").val(lec_units);
                    $("#lab_units").val(lab_units);
                    $("#units").val(units);

                }
            });
            $("#edit_modal").modal("toggle");
        }
        function edit_subject_submit(){
            var data = {};
            data['subjectID'] = $("#subject_id").val();
            data['subject_code'] = $("#subject_code").val();
            data['subject_title'] = $("#subject_title").val();
            data['lec_units'] = $("#lec_units").val();
            data['lab_units'] = $("#lab_units").val();
            data['units'] = $("#units").val();

            $.ajax({
                url: "ajax/update_subject.php",
                type: "GET",
                data: data,
                async : false,
                success: function(data){
                    console.log(data);
                    $('#table_subject').dataTable().fnDestroy();
                    initTable["ajax"] = "ajax/load_subject_list.php";
                    $('#table_subject').dataTable(initTable);
                    initTable["ajax"] = "";
                    
                }
            });
            $("#edit_modal").modal("toggle");
        } 





// block functions


        function edit_block(blockID){
            console.log("Editing block : ID No: "+blockID);
            //load form to modal using ajax
            $.ajax({
            	url:"ajax/form_edit_block.php",
            	async: false,
            	success: function(data){
            		$("#edit_modal .modal-body").html(data);
            		$("#edit_button").unbind("click").click(edit_block_submit);
            		console.log("block form loaded");

            	}
            });


            //initialize values
            var block_id = blockID;

            $("#block_id").val(blockID);
            //ajax retrieve data 
            $.ajax({
                url: "ajax/details_block.php",
                type: "GET",
                data: {block_id:block_id},
                async : false,
                success: function(data){
                    //alert(data);
                    var details       = jQuery.parseJSON(data);
                    var block_id      = details['block_id'];
                    var block_name    = details['block_name'];
                    var course_code   = details['course_code'];
                    var year_level 	  = details['year_level'];


                    $("#block_id").val(block_id);
                    $("#block_name").val(block_name);
                    $("#course_code").val(course_code);
                    $("#year_level").val(year_level);

                }
            });
            $("#edit_modal").modal("toggle");
        }
        function edit_block_submit(){
            var data = {};
            data['blockID'] = $("#block_id").val();
            data['block_name'] = $("#block_name").val();
            data['course_code'] = $("#course_code").val();
            data['year_level'] = $("#year_level").val();

            $.ajax({
                url: "ajax/update_block.php",
                type: "GET",
                data: data,
                async : false,
                success: function(data){
                    console.log(data);
                    $('#table_block').dataTable().fnDestroy();
                    initTable["ajax"] = "ajax/load_block_list.php";
                    $('#table_block').dataTable(initTable);
                    initTable["ajax"] = "";
                    
                }
            });
            $("#edit_modal").modal("toggle");
        } 