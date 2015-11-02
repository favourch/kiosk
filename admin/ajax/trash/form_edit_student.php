
                <form id="edit_student_form" name="edit_student_form" class="center" role="form"  >
                    <fieldset class="registration-form" style="width: 80%">
                        <div class="form-group">
                            <input readonly="true" id="student_id" name="student_id" type="text" class="form-control" style="width:100%;">
                            </input>
                        </div>
                        <div class="form-group">
                            <input id="sf_name" name="sf_name" type="text" class="form-control" style="width:100%;" placeholder="First Name">
                            </input>
                            <input id="sm_name" name="sm_name" type="text" class="form-control" style="width:100%;" placeholder="Middle Name">
                            </input>
                            <input id="sl_name" name="sl_name" type="text" class="form-control" style="width:100%;" placeholder="Last Name">
                            </input>
                        </div>

                        <div class="form-group">
                            <select id="student_gender" name="student_gender" class="form-control" style="width:100%;">
                                <option value="Male">Male</option>
                                <option value="Female">Female</option>

                            </select>
                        </div>
                        <div class="form-group">
                            <select id="student_status" name="student_status" class="form-control" style="width:100%;">
                                <option value="regular">Regular</option>
                                <option value="irregular">Irregular</option>

                            </select>
                        </div>
                        
                        <div class="form-group">
                            <input type="hidden" name="" id="" >
                        </div>

                        <div id="e_error_msg" class="alert alert-danger hidden">

                        </div>                        
                    </fieldset>
                </form>