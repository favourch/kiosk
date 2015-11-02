<form id="edit_personnel_form" name="edit_personnel_form" class="center" role="form"  >
                    <fieldset class="registration-form" style="width: 80%">
                        <div class="form-group">
                            <input readonly="true" id="personnel_id" name="personnel_id" type="text" class="form-control" style="width:100%;">
                            </input>
                        </div>
                        <div class="form-group">
                            <input id="pf_name" name="pf_name" type="text" class="form-control" style="width:100%;" placeholder="First Name">
                            </input>
                            <input id="pm_name" name="pm_name" type="text" class="form-control" style="width:100%;" placeholder="Middle Name">
                            </input>
                            <input id="pl_name" name="pl_name" type="text" class="form-control" style="width:100%;" placeholder="Last Name">
                            </input>
                        </div>

                        <div class="form-group">
                            <select id="personnel_gender" name="personnel_gender" class="form-control" style="width:100%;">
                                <option value="male">Male</option>
                                <option value="female">Female</option>

                            </select>
                        </div>
                        <div class="form-group">
                            <select id="personnel_status" name="personnel_status" class="form-control" style="width:100%;">
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