<script src="//cdn.jsdelivr.net/webshim/1.14.5/polyfiller.js"></script>
<script src="<?php echo site_url(); ?>js/custom.js"></script>
<script>
    webshims.setOptions('forms-ext', {types: 'date'});
    webshims.polyfill('forms forms-ext');
    $(document).ready(function () {
        $('#myTab a').click(function (e) {
            e.preventDefault();
            $(this).tab('show');
        });
    });
    $("input[id*='casual_max']").live('input', function (event) {
        this.value = this.value.replace(/[^0-9]/g, '');
    });
    $("input[id*='casual_taken']").live('input', function (event) {
        this.value = this.value.replace(/[^0-9]/g, '');
    });
    jQuery(document).ready(function () {
        $('#casual_max, #casual_taken').live('input', function () {
            var val1 = $("#casual_max").val();
            var val2 = $("#casual_taken").val();
            var result = val1 - val2;
            $("#casual_balance").val(result);
        });
        $('#privileged_max, #privileged_taken').live('input', function () {
            var val1 = $("#privileged_max").val();
            var val2 = $("#privileged_taken").val();
            var result = val1 - val2;
            $("#privileged_balance").val(result);
        });
        $('#sick_max, #sick_taken').live('input', function () {
            var val1 = $("#sick_max").val();
            var val2 = $("#sick_taken").val();
            var result = val1 - val2;
            $("#sick_balance").val(result);
        });
    });

</script>

<!--company Modal-->

<div id="comModal" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="comModalLabel" aria-hidden="true">
    <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
        <h3 id="comModalLabel">Add a New Company</h3>
    </div>
    <?php
    //flash messages
    if (isset($flash_message)) {
        if ($flash_message == TRUE) {
            echo '<div class="alert alert-success">';
            echo '<a class="close" data-dismiss="alert">×</a>';
            echo '<strong>Well done!</strong> new company created with success.';
            echo '</div>';
        } else {
            echo '<div class="alert alert-error">';
            echo '<a class="close" data-dismiss="alert">×</a>';
            echo '<strong>Oh snap!</strong> change a few things up and try submitting again.';
            echo '</div>';
        }
    }
    ?>

    <?php
    //form data
    $attributes = array('class' => 'form-horizontal', 'id' => '');

    //form validation
    echo validation_errors();

    echo form_open_multipart('admin/company/add', $attributes);
    ?>
    <div class="modal-body">

        <fieldset>
            <div class="control-group">
                <label for="inputError" class="control-label">Name</label>
                <div class="controls">
                    <input type="text" id="" name="name" value="<?php echo set_value('name'); ?>" >
                    <!--<span class="help-inline">Woohoo!</span>-->
                </div>
            </div>
            <div class="control-group">
                <label for="inputError" class="control-label">Upload Logo</label>
                <div class="controls">
                    <input type="file" id="" name="company_logo" >
                    <!--<span class="help-inline">Woohoo!</span>-->
                </div>
            </div>
        </fieldset>
    </div>
    <div class="modal-footer">
        <input type="hidden" name="com_confirm" value="com_confirm">
        <button class="btn" data-dismiss="modal" aria-hidden="true">Close</button>
        <button class="btn btn-primary" type="submit">Save</button>
    </div>
    <?php echo form_close(); ?>
</div>

<!--company Modal End-->

<!--Department Modal-->

<div id="depModal" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="depModalLabel" aria-hidden="true">
    <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
        <h3 id="depModalLabel">Add a New Department</h3>
    </div>
    <?php
    //flash messages
    if (isset($flash_message)) {
        if ($flash_message == TRUE) {
            echo '<div class="alert alert-success">';
            echo '<a class="close" data-dismiss="alert">×</a>';
            echo '<strong>Well done!</strong> new department added with success.';
            echo '</div>';
        } else {
            echo '<div class="alert alert-error">';
            echo '<a class="close" data-dismiss="alert">×</a>';
            echo '<strong>Oh snap!</strong> change a few things up and try submitting again.';
            echo '</div>';
        }
    }
    ?>

    <?php
    //form data
    $attributes = array('class' => 'form-horizontal', 'id' => '');
    $options_company = array('' => "Select");
    foreach ($company as $row) {
        $options_company[$row['id']] = $row['name'];
    }

    //form validation
    echo validation_errors();

    echo form_open('admin/department/add', $attributes);
    ?>
    <div class="modal-body">
        <fieldset>
            <div class="control-group">
                <label for="company_id" class="control-label">Company</label>
                <div class="controls">
                    <?php //echo form_dropdown('department_id', $options_department, '', 'class="span2"');

                    echo form_dropdown('company_id', $options_company, set_value('company_id'), 'class="span2"');
                    ?>

                </div>
            </div>
            <div class="control-group">
                <label for="inputError" class="control-label">Name</label>
                <div class="controls">
                    <input type="text" id="" name="name" value="<?php echo set_value('name'); ?>" >
                    <!--<span class="help-inline">Woohoo!</span>-->
                </div>
            </div>
        </fieldset>
    </div>
    <div class="modal-footer">
        <input type="hidden" name="dep_confirm" value="dep_confirm">
        <button class="btn" data-dismiss="modal" aria-hidden="true">Close</button>
        <button class="btn btn-primary" type="submit">Save</button>
    </div>
<?php echo form_close(); ?>

</div>

<!--Department Modal End-->

<div class="container top">

    <ul class="breadcrumb">
        <li>
            <a href="<?php echo site_url("admin"); ?>">
<?php echo ucfirst($this->uri->segment(1)); ?>
            </a> 
            <span class="divider">/</span>
        </li>
        <li>
            <a href="<?php echo site_url("admin") . '/' . $this->uri->segment(2); ?>">
<?php echo ucfirst($this->uri->segment(2)); ?>
            </a> 
            <span class="divider">/</span>
        </li>
        <li class="active">
            <a href="#">New</a>
        </li>
    </ul>

    <div class="page-header">
        <h2>
            Adding <?php echo ucfirst($this->uri->segment(2)); ?>
        </h2>
    </div>

    <?php
    //flash messages
    if (isset($flash_message)) {
        if ($flash_message == TRUE) {
            echo '<div class="alert alert-success">';
            echo '<a class="close" data-dismiss="alert">×</a>';
            echo '<strong>Well done!</strong> new employee added with success.';
            echo '</div>';
        } else {
            echo '<div class="alert alert-error">';
            echo '<a class="close" data-dismiss="alert">×</a>';
            echo '<strong>Oh snap!</strong> change a few things up and try submitting again.';
            echo '</div>';
        }
    }
    ?>

    <?php
    //form data
    $attributes = array('class' => 'form-horizontal', 'id' => '');
 //   $options_department = array('' => "Select");
//    foreach ($department as $row) {
//        $options_department[$row['id']] = $row['name'];
//    }
    $options_company = array('' => "Select");
    foreach ($company as $val) {
        $options_company[$val['id']] = $val['name'];
    }
    //form validation
    echo validation_errors();

    echo form_open_multipart('admin/employee/add', $attributes);
    ?>
    <fieldset>
        <div class="control-group">
            <label for="company_id" class="control-label">Select Company</label>
            <div class="controls">
                <?php echo form_dropdown('company_id', $options_company, set_value('company_id'), 'class="span3" onchange="javascript: return change_department($(this).val())"'); ?>
                <button class="btn btn-primary" type="button" data-toggle="modal" data-target="#comModal">Add</button>
            </div>
        </div>
        <div class="control-group">
            <label for="department_id" class="control-label">Select Department</label>
            <div class="controls">
                <?php echo form_dropdown('department_id', $options =array(''=>'Select'), set_value(''), 'class="span3" id="department"'); ?>
                <button class="btn btn-primary" type="button" data-toggle="modal" data-target="#depModal">Add</button>
            </div>
        </div>
        <div class="control-group">
            <label for="inputError" class="control-label">Upload Photo</label>
            <div class="controls">
                <input type="file" id="" name="employee_pic">
                <!--<span class="help-inline">Woohoo!</span>-->
            </div>
        </div>
    </fieldset>
    <ul class="nav nav-tabs" id="myTab">
        <li class="active"><a href="#personal_info">Personal Information</a></li>
        <li><a href="#service_info">Service Information</a></li>
        <li><a href="#Salary_details">Salary Details</a></li>
        <li><a href="#special_assignment">Special Assignment</a></li>
        <li><a href="#leave_record">Leave Record</a></li>
        <li><a href="#performance">Performance as a whole</a></li>
    </ul>
    <div class="tab-content">
        <div class="tab-pane active" id="personal_info">
            <fieldset>
                <div class="control-group">
                    <label for="inputError" class="control-label">Name</label>
                    <div class="controls">
                        <input type="text" id="" name="employee_name" value="<?php echo set_value('employee_name'); ?>">
                        <!--<span class="help-inline">Woohoo!</span>-->
                    </div>
                </div>
                <div class="control-group">
                    <label for="inputError" class="control-label">Father's name</label>
                    <div class="controls">
                        <input type="text" id="" name="father_name" value="<?php echo set_value('father_name'); ?>">
                    </div>
                </div>
                <div class="control-group">
                    <label for="inputError" class="control-label">Father's contact no.</label>
                    <div class="controls">
                        <input type="text" id="" name="father_contact" value="<?php echo set_value('father_contact'); ?>">
                    </div>
                </div>
                <div class="control-group">
                    <label for="inputError" class="control-label">Mother's name</label>
                    <div class="controls">
                        <input type="text" id="" name="mother_name" value="<?php echo set_value('Mother_name'); ?>">
                    </div>
                </div>
                <div class="control-group">
                    <label for="inputError" class="control-label">Contact Number</label>
                    <div class="controls">
                        <input type="text" id="" name="contact_number" value="<?php echo set_value('contact_number'); ?>">
                    </div>
                </div>
                <div class="control-group">
                    <label for="inputError" class="control-label">E-mail</label>
                    <div class="controls">
                        <input type="text" id="" name="email" value="<?php echo set_value('email'); ?>">
                    </div>
                </div>
                <div class="control-group">
                    <label for="inputError" class="control-label">Date of Birth</label>
                    <div class="controls">
                        <input type="date" id="txtDOB" onblur="javascript: return CalculateAge()" name="d_o_b">
                    </div>
                </div>
                <div class="control-group">
                    <label for="inputError" id="" class="control-label">Present Age</label>
                    <div class="controls">
                        <input type="text" id="lblAgeMesg" name="present_age">
                        <span id="lblDOB"></span>
                    </div>
                </div>
                <div class="control-group">
                    <label for="inputError" class="control-label">Blood Group</label>
                    <div class="controls">
                        <select id="" name="blood_group">
                            <option value="N/A">N/A</option>
                            <option value="A+">A+</option>
                            <option value="B+">B+</option>
                            <option value="O+">O+</option>
                            <option value="A-">A-</option>
                            <option value="B-">B-</option>
                            <option value="O-">O-</option>
                            <option value="AB+">AB+</option>
                            <option value="AB-">AB-</option>
                        </select>
                    </div>
                </div>
                <div class="control-group">
                    <label for="inputError" class="control-label">Voter ID no.</label>
                    <div class="controls">
                        <input type="text" id="" name="voter_id" value="<?php echo set_value('voter_id'); ?>">
                    </div>
                </div>
                <div class="control-group">
                    <label for="inputError" class="control-label">Permanent address</label>
                    <div class="controls">
                        <textarea rows="3" id="" name="permanent_address"><?php echo set_value('permanent_address'); ?></textarea>
                    </div>
                </div>
                <div class="control-group">
                    <label for="inputError" class="control-label">Present address</label>
                    <div class="controls">
                        <textarea rows="3" id="" name="present_address"><?php echo set_value('present_address'); ?></textarea>
                    </div>
                </div>
                <div class="control-group">
                    <label for="inputError" class="control-label">Qualification</label>
                    <div class="controls">
                        <input type="text" id="" name="qualification" value="<?php echo set_value('qualification'); ?>">
                        <!--<span class="help-inline">Cost Price</span>-->
                    </div>
                </div>
            </fieldset>
        </div>
        <div class="tab-pane" id="service_info">
            <fieldset>
                <div class="control-group">
                    <label for="inputError" class="control-label">ID No.</label>
                    <div class="controls">
                        <input type="text" id="" name="id_no" value="<?php echo set_value('id_no'); ?>">
                        <!--<span class="help-inline">Woohoo!</span>-->
                    </div>
                </div>
                <div class="control-group">
                    <label for="inputError" class="control-label">Designation</label>
                    <div class="controls">
                        <input type="text" id="" name="designation" value="<?php echo set_value('designation'); ?>" >
                        <!--<span class="help-inline">Woohoo!</span>-->
                    </div>
                </div>
                <div class="control-group">
                    <label for="inputError" class="control-label">Joining Date</label>
                    <div class="controls">
                        <input type="date" name="joining_date" value="<?php echo set_value('joining_date'); ?>">
                        <!--<span class="help-inline">OOps</span>-->
                    </div>
                </div>
                <div class="control-group">
                    <label for="inputError" class="control-label">Confirmation Date</label>
                    <div class="controls">
                        <input type="date" name="confirmation_date" value="<?php echo set_value('confirmation_date'); ?>">
                        <!--<span class="help-inline">OOps</span>-->
                    </div>
                </div>
                <div class="control-group">
                    <label for="inputError" class="control-label">Place of work</label>
                    <div class="controls">
                        <input type="text" id="" name="place_of_work" value="<?php echo set_value('place_of_work'); ?>">
                    </div>
                </div>
                <div class="control-group">
                    <label for="inputError" class="control-label">Name of the guarantor</label>
                    <div class="controls">
                        <input type="text" id="" name="guarantor" value="<?php echo set_value('guarantor'); ?>">
                    </div>
                </div>
                <div class="control-group">
                    <label for="inputError" class="control-label">Show cause</label>
                    <div class="controls">
                        <input type="text" id="" name="show_cause" value="<?php echo set_value('show_cause'); ?>">
                    </div>
                </div>
                <div class="control-group">
                    <label for="inputError" class="control-label">Penalty</label>
                    <div class="controls">
                        <input type="text" id="" name="penalty" value="<?php echo set_value('penalty'); ?>">
                    </div>
                </div>
                <div class="control-group">
                    <label for="inputError" class="control-label">Employment Activation</label>
                    <div class="controls">
                        <label class="radio inline">
                            <input type="radio" id="" name="is_active" value="yes" checked="checked"> Yes
                        </label>
                        <label class="radio inline">
                            <input type="radio" id="" name="is_active" value="no"> No
                        </label>
                    </div>
                </div>
            </fieldset>
        </div>
        <div class="tab-pane" id="Salary_details">
            <fieldset>
                <div class="control-group">
                    <label for="inputError" class="control-label">Consolidate salary</label>
                    <div class="controls">
                        <input type="text" id="salary0" onchange="javascript: return change_salary()" name="consolidate_salary" value="0">
                    </div>
                </div>
                <div class="control-group">
                    <label for="inputError" class="control-label">Basic</label>
                    <div class="controls">
                        <input type="text" id="salary1" onchange="javascript: return change_salary()" name="basic" value="0">
                    </div>
                </div>
                <div class="control-group">
                    <label for="inputError" class="control-label">Dearness Allow</label>
                    <div class="controls">
                        <input type="text" id="salary2" onchange="javascript: return change_salary()" name="dearness_allow" value="0">
                    </div>
                </div>
                <div class="control-group">
                    <label for="inputError" class="control-label">House Rent</label>
                    <div class="controls">
                        <input type="text" id="salary3" onchange="javascript: return change_salary()" name="house_rent" value="0">
                    </div>
                </div>
                <div class="control-group">
                    <label for="inputError" class="control-label">Special Allow</label>
                    <div class="controls">
                        <input type="text" id="salary4" onchange="javascript: return change_salary()" name="special_allow" value="0">
                    </div>
                </div>
                <div class="control-group">
                    <label for="inputError" class="control-label">Mobile Allow</label>
                    <div class="controls">
                        <input type="text" id="salary5" onchange="javascript: return change_salary()" name="mobile_allow" value="0">
                    </div>
                </div>
                <div class="control-group">
                    <label for="inputError" class="control-label">Heavy Duty Allow</label>
                    <div class="controls">
                        <input type="text" id="salary6" onchange="javascript: return change_salary()" name="heavy_duty" value="0">
                    </div>
                </div>
                <div class="control-group">
                    <label for="inputError" class="control-label">Washing Allow</label>
                    <div class="controls">
                        <input type="text" id="salary7" onchange="javascript: return change_salary()" name="washing_allow" value="0">
                    </div>
                </div>
                <div class="control-group">
                    <label for="inputError" class="control-label">Conveyance Allow</label>
                    <div class="controls">
                        <input type="text" id="salary8" onchange="javascript: return change_salary()" name="conveyance_allow" value="0">
                    </div>
                </div>
                <div class="control-group">
                    <label for="inputError" class="control-label">Misc</label>
                    <div class="controls">
                        <input type="text" id="salary9" onchange="javascript: return change_salary()" name="misc" value="0">
                    </div>
                </div>
                <div class="control-group">
                    <label for="inputError" class="control-label">Total</label>
                    <div class="controls">
                        <input type="text" id="total_salary" name="total" value="0">
                    </div>
                </div>
                <div class="control-group">
                    <label for="inputError" class="control-label">Last increment date</label>
                    <div class="controls">
                        <input type="date" id="" name="last_increment_date" value="<?php echo set_value('last_increment_date'); ?>">
                    </div>
                </div>
                <div class="control-group">
                    <label for="inputError" class="control-label">Last increased amount</label>
                    <div class="controls">
                        <input type="text" id="" name="increment_amount" value="<?php echo set_value('increment_amount'); ?>">
                    </div>
                </div>
            </fieldset>
        </div>
        <div class="tab-pane" id="special_assignment">
            <fieldset>
                <div class="control-group">
                    <label for="inputError" class="control-label">Appointment as in charge</label>
                    <div class="controls">
                        <label class="radio inline">
                            <input type="radio" id="" name="appointment_as" value="yes"> Yes
                        </label>
                        <label class="radio inline">
                            <input type="radio" id="" name="appointment_as" value="no"> No
                        </label>
                    </div>
                </div>
                <div class="control-group">
                    <label for="inputError" class="control-label">Target given</label>
                    <div class="controls">
                        <input type="text" id="" name="target_given" value="<?php echo set_value('target_given'); ?>">
                    </div>
                </div>
                <div class="control-group">
                    <label for="inputError" class="control-label">Target Achieved Amount</label>
                    <div class="controls">
                        <input type="text" id="" name="target_achieved" value="<?php echo set_value('target_achieved'); ?>">
                    </div>
                </div>
                <div class="control-group">
                    <label for="inputError" class="control-label">Liability for recovery</label>
                    <div class="controls">
                        <input type="text" id="" name="liability_recovery" value="<?php echo set_value('liability_recovery'); ?>">
                    </div>
                </div>
                <div class="control-group">
                    <label for="inputError" class="control-label">Personally Equipment Facility</label>
                    <div class="controls">
                        <label class="checkbox inline">
                            <input type="checkbox" name="is_laptop" value="Laptop"> Laptop
                        </label>
                        <label class="checkbox inline">
                            <input type="checkbox" name="is_car" value="Car"> Car
                        </label>
                        <label class="checkbox inline">
                            <input type="checkbox" name="is_mc" value="MC"> MC
                        </label>
                        <label class="checkbox inline">
                            <input type="checkbox" name="is_fuel" value="Fuel"> Fuel
                        </label>
                        <label>
                            Others <input type="text" name="other_equipment" value="<?php echo set_value('other_equipment'); ?>">
                        </label>
                    </div>
                </div>
            </fieldset>
        </div>
        <div class="tab-pane" id="leave_record">
            <fieldset>
                <table class="table table-bordered">
                    <tr>
                        <td>&nbsp;</td>
                        <td colspan="3">Casual Leave</td>
                        <td colspan="3">Privileged Leave</td>
                        <td colspan="3">Sick Leave</td>
                    </tr>
                    <tr>
                        <td>Year</td>
                        <td>Max Permitted Leave</td>
                        <td>Leave Taken</td>
                        <td>Balance Available</td>
                        <td>Max Permitted Leave</td>
                        <td>Leave Taken</td>
                        <td>Balance Available</td>
                        <td>Max Permitted Leave</td>
                        <td>Leave Taken</td>
                        <td>Balance Available</td>
                    </tr>
                    <tr>
                        <td>2015</td>
                        <td><input type="text" class="span1" name="casual_max" id="casual_max" placeholder="10" value="10" readonly="readonly"></td>
                        <td><input type="text" class="span1" name="casual_taken" id="casual_taken" placeholder=""></td>
                        <td><input type="text" class="span1" name="casual_balance" id="casual_balance" placeholder="" readonly="readonly"></td>
                        <td><input type="text" class="span1" name="privileged_max" id="privileged_max" placeholder="18" value="18" readonly="readonly"></td>
                        <td><input type="text" class="span1" name="privileged_taken" id="privileged_taken" placeholder=""></td>
                        <td><input type="text" class="span1" name="privileged_balance" id="privileged_balance" placeholder="" readonly="readonly"></td>
                        <td><input type="text" class="span1" name="sick_max" id="sick_max" placeholder="14"  value="14" readonly="readonly"></td>
                        <td><input type="text" class="span1" name="sick_taken" id="sick_taken" placeholder=""></td>
                        <td><input type="text" class="span1" name="sick_balance" id="sick_balance" placeholder="" readonly="readonly"></td>
                    </tr>
                </table>
                <a href="javascript:void(0);" class="btn btn-primary">Add year</a>
                <!--    </div>
                </div>-->
            </fieldset>
        </div>
        <div class="tab-pane" id="performance">
            <fieldset>
                <table class="table table-bordered">
                    <tr>
                        <td>&nbsp;</td>
                        <td>Punctuality</td>
                        <td>Job Knowledge</td>
                        <td>Initiative</td>
                        <td>Short coming</td>
                    </tr>
                    <tr>
                        <td>2015</td>
                        <td>
                            <label class="radio inline">
                                <input type="radio" id="" name="punctuality" value="good"> Good
                            </label>
                            <label class="radio inline">
                                <input type="radio" id="" name="punctuality" value="average"> Average
                            </label>
                            <label class="radio inline">
                                <input type="radio" id="" name="punctuality" value="poor"> Poor
                            </label>
                        </td>
                        <td>
                            <label class="radio inline">
                                <input type="radio" id="" name="job_knowledge" value="good"> Good
                            </label>
                            <label class="radio inline">
                                <input type="radio" id="" name="job_knowledge" value="average"> Average
                            </label>
                            <label class="radio inline">
                                <input type="radio" id="" name="job_knowledge" value="poor"> Poor
                            </label>
                        </td>
                        <td>
                            <label class="radio inline">
                                <input type="radio" id="" name="initiative" value="good"> Good
                            </label>
                            <label class="radio inline">
                                <input type="radio" id="" name="initiative" value="average"> Average
                            </label>
                            <label class="radio inline">
                                <input type="radio" id="" name="initiative" value="poor"> Poor
                            </label>
                        </td>
                        <td>
                            <label class="radio inline">
                                <input type="radio" id="" name="short_coming" value="yes"> Yes
                            </label>
                            <label class="radio inline">
                                <input type="radio" id="" name="short_coming" value="no"> No
                            </label>
                        </td>
                    </tr>
                </table>
                <a href="javascript:void(0);" class="btn btn-primary">Add year</a>
            </fieldset>
        </div>
    </div>
    <fieldset>
        <div class="form-actions">
            <button class="btn btn-primary" type="submit" onclick="history.go(-1);
                    return true;">Save changes</button>
            <button class="btn" type="reset">Cancel</button>
        </div>
    </fieldset>

<?php echo form_close(); ?>

</div>
