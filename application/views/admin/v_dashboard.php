<script src="//cdn.jsdelivr.net/webshim/1.14.5/polyfiller.js"></script>
<script src="<?php echo site_url(); ?>js/custom.js"></script>
<script>
webshims.setOptions('forms-ext', {types: 'date'});
webshims.polyfill('forms forms-ext');
$(document).ready(function(){
    $('#myTab a').click(function (e) {
    e.preventDefault();
    $(this).tab('show');
    });    
});

</script>

<!--company Modal-->

<!--<div id="comModal" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="comModalLabel" aria-hidden="true">
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
    $attributes = array('class' => 'form-horizontal', 'id' => '', 'method'=>'POST');

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
                <span class="help-inline">Woohoo!</span>
            </div>
        </div>
        <div class="control-group">
            <label for="inputError" class="control-label">Upload Logo</label>
            <div class="controls">
                <input type="file" id="" name="company_logo" >
                <span class="help-inline">Woohoo!</span>
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
</div>-->

<!--company Modal End-->

<!--Department Modal-->

<!--<div id="depModal" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="depModalLabel" aria-hidden="true">
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

                 echo form_dropdown('company_id', $options_company, set_value('company_id'), 'class="span2"'); ?>

            </div>
        </div>
        <div class="control-group">
            <label for="inputError" class="control-label">Name</label>
            <div class="controls">
                <input type="text" id="" name="name" value="<?php echo set_value('name'); ?>" >
                <span class="help-inline">Woohoo!</span>
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

</div>-->

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
            <a href="#">Edit</a>
        </li>
    </ul>

    <div class="page-header">
        <h2>
            Editing Leave Information
        </h2>
    </div>

    <?php
    //flash messages
    if (isset($flash_message)) {
        if ($flash_message == TRUE) {
            echo '<div class="alert alert-success">';
            echo '<a class="close" data-dismiss="alert">×</a>';
            echo '<strong>Well done!</strong>Employee information updated successfully.';
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
    $options_department = array('' => "Select");
    $options_company = array('' => "Select");
    foreach ($department as $row) {
        $options_department[$row['id']] = $row['name'];
            if($data[0]['department_id'] == $row['id']){
            $selected_dep=$row['id'];
        }
    }
    foreach ($company as $val) {
        $options_company[$val['id']] = $val['name'];
        
        if($data[0]['company_id'] == $val['id']){
            $selected=$val['id'];
        }
    }

    //form validation
    echo validation_errors();

    echo form_open_multipart('admin/dashboard/editLeave', $attributes);
    ?>
<!--    <fieldset>
        <div class="control-group">
            <label for="company_id" class="control-label">Select Company</label>
            <div class="controls">
                <?php echo form_dropdown('company_id', $options_company, $selected , 'class="span2" onchange="javascript: return change_department($(this).val())"'); ?>
                <button class="btn btn-primary" type="button" data-toggle="modal" data-target="#comModal">Add</button>
            </div>
        </div>
        <div class="control-group">
            <label for="department_id" class="control-label">Select Department</label>
            <div class="controls">
                <select name="department_id" class="span2" id="department">
                    <option value="0">Select</option>
                </select>
                <?php echo form_dropdown('department_id', $options_department, $selected_dep, 'class="span2" id="department"'); ?>
                <button class="btn btn-primary" type="button" data-toggle="modal" data-target="#depModal">Add</button>
            </div>
        </div>
        <div class="control-group">
            <label for="inputError" class="control-label">Current Photo</label>
            <div class="controls">
                <?php
                if(isset($data[0]['employee_pic'])){?>
                    <img src='".site_url()."uploads/employee/" . $aRow['employee_pic'] . "' style='height:50px; width:50px;' />
                            <img style="" align="" src="<?php echo site_url(); ?>uploads/employee/<?php echo $data[0]['employee_pic'] ?>" width="100" height="130">
                            <input type="hidden" name="employee_pic" value="<?php echo $data[0]['employee_pic'] ?>">
                
                <?php }?>
            </div>
        </div>
        <div class="control-group">
            <label for="inputError" class="control-label">Upload Photo</label>
            <div class="controls">
                <input type="file" id="" name="employee_pic">
                <span class="help-inline">Woohoo!</span>
            </div>
            <div class="controls">
                <?php
                if(isset($data[0]['employee_pic'])){?>
                    <img src='".site_url()."uploads/employee/" . $aRow['employee_pic'] . "' style='height:50px; width:50px;' />
                            <img style="" align="" src="<?php echo site_url(); ?>uploads/employee/<?php echo $data[0]['employee_pic'] ?>" width="100" height="130">
                
                <?php }?>
            </div>
        </div>
    </fieldset>-->
<!--    <ul class="nav nav-tabs" id="myTab">
        <li class="active"><a href="#personal_info">Personal Information</a></li>
        <li><a href="#service_info">Service Information</a></li>
        <li><a href="#Salary_details">Salary Details</a></li>
        <li><a href="#special_assignment">Special Assignments</a></li>
        <li><a href="#leave_record">Leave Record</a></li>
        <li><a href="#performance">Performance as a whole</a></li>
    </ul>-->
    <div class="tab-content">
<!--        <div class="tab-pane active" id="personal_info">
            <fieldset>
                <div class="control-group">
                    <label for="inputError" class="control-label">ID No.</label>
                    <div class="controls">
                        <input type="text" id="" name="id_no" value="<?php echo $data[0]['id_no']; ?>">
                        <span class="help-inline">Woohoo!</span>
                    </div>
                </div>
                <div class="control-group">
                    <label for="inputError" class="control-label">Name</label>
                    <div class="controls">
                        <input type="text" id="" name="employee_name" value="<?php echo $data[0]['employee_name']; ?>">
                        <input type="hidden" id="" name="employee_id" value="<?php echo $data[0]['id']; ?>">
                        <span class="help-inline">Woohoo!</span>
                    </div>
                </div>
                <div class="control-group">
                    <label for="inputError" class="control-label">Father's name</label>
                    <div class="controls">
                        <input type="text" id="" name="father_name" value="<?php echo $data[0]['father_name']; ?>">
                    </div>
                </div>
                <div class="control-group">
                    <label for="inputError" class="control-label">Father's contact no.</label>
                    <div class="controls">
                        <input type="text" id="" name="father_contact" value="<?php echo $data[0]['father_contact']; ?>">
                    </div>
                </div>
                <div class="control-group">
                    <label for="inputError" class="control-label">Mother's name</label>
                    <div class="controls">
                        <input type="text" id="" name="mother_name" value="<?php echo $data[0]['mother_name']; ?>">
                    </div>
                </div>
                <div class="control-group">
                    <label for="inputError" class="control-label">Contact Number</label>
                    <div class="controls">
                        <input type="text" id="" name="contact_number" value="<?php echo $data[0]['contact_number']; ?>">
                    </div>
                </div>
                <div class="control-group">
                    <label for="inputError" class="control-label">E-mail</label>
                    <div class="controls">
                        <input type="text" id="" name="email" value="<?php echo $data[0]['email']; ?>">
                    </div>
                </div>
                <div class="control-group">
                    <label for="inputError" class="control-label">Date of Birth</label>
                    <div class="controls">
                        <input type="date" id="" onchange="javascript: return change_age($(this).val())" name="d_o_b" value="<?php echo $data[0]['d_o_b']; ?>">
                    </div>
                </div>
                <div class="control-group">
                    <label for="inputError" class="control-label">Present Age</label>
                    <div class="controls">
                        <input type="text" id="present_age" name="present_age" readonly="readonly" value="<?php echo $data[0]['present_age']; ?>">
                    </div>
                </div>
                <div class="control-group">
                    <label for="inputError" class="control-label">Blood Group</label>
                    
                    <div class="controls">
                        <select id="" name="blood_group">
                            <?php $blood_group = array(
                        "A+",
                        "B+",
                        "O+",
                        "A-",
                        "B-",
                        "O-",
                        "AB+",
                        "AB-"                   
                        );
                        foreach ($blood_group as $value)  {
                    ?>
                            <option <?php if ($data[0]['blood_group'] == $value) echo 'selected' ?> value="<?php echo $value; ?>"><?php echo $value; ?></option>
                                    <?php }?>
                                        </select>
                    </div>
                </div>
                <div class="control-group">
                    <label for="inputError" class="control-label">Voter ID no.</label>
                    <div class="controls">
                        <input type="text" id="" name="voter_id" value="<?php echo $data[0]['voter_id']; ?>">
                    </div>
                </div>
                <div class="control-group">
                    <label for="inputError" class="control-label">Permanent address</label>
                    <div class="controls">
                        <input type="text" id="" name="permanent_address" value="<?php echo $data[0]['permanent_address']; ?>">
                        <span class="help-inline">Cost Price</span>
                    </div>
                </div>
                <div class="control-group">
                    <label for="inputError" class="control-label">Present address</label>
                    <div class="controls">
                        <input type="text" id="" name="present_address" value="<?php  echo $data[0]['present_address']; ?>">
                    </div>
                </div>
                <div class="control-group">
                    <label for="inputError" class="control-label">Qualification</label>
                    <div class="controls">
                        <input type="text" id="" name="qualification" value="<?php echo $data[0]['qualification']; ?>">
                        <span class="help-inline">Cost Price</span>
                    </div>
                </div>
            </fieldset>
        </div>-->
<!--        <div class="tab-pane" id="service_info">
            <fieldset>
                <div class="control-group">
                    <label for="inputError" class="control-label">Designation</label>
                    <div class="controls">
                        <input type="text" id="" name="designation" value="<?php echo $data[0]['designation']; ?>" >
                        <span class="help-inline">Woohoo!</span>
                    </div>
                </div>
                <div class="control-group">
                    <label for="inputError" class="control-label">Joining Date</label>
                    <div class="controls">
                        <input type="date" name="joining_date" value="<?php echo $data[0]['joining_date']; ?>">
                        <span class="help-inline">OOps</span>
                    </div>
                </div>
                <div class="control-group">
                    <label for="inputError" class="control-label">Confirmation Date</label>
                    <div class="controls">
                        <input type="date" name="confirmation_date" value="<?php echo $data[0]['confirmation_date']; ?>">
                        <span class="help-inline">OOps</span>
                    </div>
                </div>
                <div class="control-group">
                    <label for="inputError" class="control-label">Place of work</label>
                    <div class="controls">
                        <input type="text" id="" name="place_of_work" value="<?php echo $data[0]['place_of_work']; ?>">
                    </div>
                </div>
                <div class="control-group">
                    <label for="inputError" class="control-label">Name of the guarantor</label>
                    <div class="controls">
                        <input type="text" id="" name="guarantor" value="<?php echo $data[0]['guarantor']; ?>">
                    </div>
                </div>
                <div class="control-group">
                    <label for="inputError" class="control-label">Show cause</label>
                    <div class="controls">
                        <input type="text" id="" name="show_cause" value="<?php echo $data[0]['show_cause']; ?>">
                    </div>
                </div>
                <div class="control-group">
                    <label for="inputError" class="control-label">Penalty</label>
                    <div class="controls">
                        <input type="text" id="" name="penalty" value="<?php echo $data[0]['penalty']; ?>">
                    </div>
                </div>
            </fieldset>
        </div>-->
<!--        <div class="tab-pane" id="Salary_details">
            <fieldset>
                <div class="control-group">
                    <label for="inputError" class="control-label">Consolidate salary</label>
                    <div class="controls">
                        <input type="text" id="salary0" onchange="javascript: return change_salary()" name="consolidate_salary" value="<?php echo $data[0]['consolidate_salary']; ?>">
                    </div>
                </div>
                <div class="control-group">
                    <label for="inputError" class="control-label">Basic</label>
                    <div class="controls">
                        <input type="text" id="salary1" onchange="javascript: return change_salary()" name="basic" value="<?php echo $data[0]['basic']; ?>">
                    </div>
                </div>
                <div class="control-group">
                    <label for="inputError" class="control-label">Dearness Allow</label>
                    <div class="controls">
                        <input type="text" id="salary2" onchange="javascript: return change_salary()" name="dearness_allow" value="<?php echo $data[0]['dearness_allow']; ?>">
                    </div>
                </div>
                <div class="control-group">
                    <label for="inputError" class="control-label">House Rent</label>
                    <div class="controls">
                        <input type="text" id="salary3" onchange="javascript: return change_salary()" name="house_rent" value="<?php echo $data[0]['house_rent']; ?>">
                    </div>
                </div>
                <div class="control-group">
                    <label for="inputError" class="control-label">Special Allow</label>
                    <div class="controls">
                        <input type="text" id="salary4" onchange="javascript: return change_salary()" name="special_allow" value="<?php echo $data[0]['special_allow']; ?>">
                    </div>
                </div>
                <div class="control-group">
                    <label for="inputError" class="control-label">Mobile Allow</label>
                    <div class="controls">
                        <input type="text" id="salary5" onchange="javascript: return change_salary()" name="mobile_allow" value="<?php echo $data[0]['mobile_allow']; ?>">
                    </div>
                </div>
                <div class="control-group">
                    <label for="inputError" class="control-label">Heavy Duty Allow</label>
                    <div class="controls">
                        <input type="text" id="salary6" onchange="javascript: return change_salary()" name="heavy_duty" value="<?php echo $data[0]['heavy_duty']; ?>">
                    </div>
                </div>
                <div class="control-group">
                    <label for="inputError" class="control-label">Washing Allow</label>
                    <div class="controls">
                        <input type="text" id="salary7" onchange="javascript: return change_salary()" name="washing_allow" value="<?php echo $data[0]['washing_allow']; ?>">
                    </div>
                </div>
                <div class="control-group">
                    <label for="inputError" class="control-label">Conveyance Allow</label>
                    <div class="controls">
                        <input type="text" id="salary8" onchange="javascript: return change_salary()" name="conveyance_allow" value="<?php echo $data[0]['conveyance_allow']; ?>">
                    </div>
                </div>
                <div class="control-group">
                    <label for="inputError" class="control-label">Misc</label>
                    <div class="controls">
                        <input type="text" id="salary9" onchange="javascript: return change_salary()" name="misc" value="<?php echo $data[0]['misc']; ?>">
                    </div>
                </div>
                <div class="control-group">
                    <label for="inputError" class="control-label">Total</label>
                    <div class="controls">
                        <input type="text" id="total_salary" name="total" value="<?php echo $data[0]['total']; ?>">
                    </div>
                </div>
            </fieldset>
        </div>-->
<!--        <div class="tab-pane" id="special_assignment">
            <fieldset>
                <div class="control-group">
                    <label for="inputError" class="control-label">Appointment as in charge</label>
                    <div class="controls">
                        <label class="radio inline">
                            <input <?php if ($data[0]['appointment_as'] == "yes") echo 'checked="checked"'; ?> type="radio" id="" name="appointment_as" value="yes"> Yes
                        </label>
                        <label class="radio inline">
                            <input <?php if ($data[0]['appointment_as'] == "no") echo 'checked="checked"'; ?> type="radio" id="" name="appointment_as" value="no"> No
                        </label>
                    </div>
                </div>
                <div class="control-group">
                    <label for="inputError" class="control-label">Target given</label>
                    <div class="controls">
                        <input type="text" id="" name="target_given" value="<?php echo $data[0]['target_given']; ?>">
                    </div>
                </div>
                <div class="control-group">
                    <label for="inputError" class="control-label">Target Achieved</label>
                    <div class="controls">
                        <label class="radio inline">
                            <input <?php if ($data[0]['target_achieved'] == "yes") echo 'checked="checked"'; ?> type="radio" id="" name="target_achieved" value="yes"> Yes
                        </label>
                        <label class="radio inline">
                            <input <?php if ($data[0]['target_achieved'] == "no") echo 'checked="checked"'; ?> type="radio" id="" name="target_achieved" value="no"> No
                        </label>
                    </div>
                </div>
                <div class="control-group">
                    <label for="inputError" class="control-label">Liability for recovery</label>
                    <div class="controls">
                        <input type="text" id="" name="liability_recovery" value="<?php echo $data[0]['liability_recovery']; ?>">
                    </div>
                </div>
                <div class="control-group">
                    <label for="inputError" class="control-label">Personally Equipment Facility</label>
                    <div class="controls">
                        <label class="checkbox inline">
                            <input <?php if ($data[0]['personal_equipment'] == "Laptop") echo 'checked="checked"'; ?> type="checkbox" name="personal_equipment" value="Laptop"> Laptop
                        </label>
                        <label class="checkbox inline">
                            <input <?php if ($data[0]['personal_equipment'] == "Car") echo 'checked="checked"'; ?> type="checkbox" name="personal_equipment" value="Car"> Car
                        </label>
                        <label class="checkbox inline">
                            <input <?php if ($data[0]['personal_equipment'] == "MC") echo 'checked="checked"'; ?> type="checkbox" name="personal_equipment" value="MC"> MC
                        </label>
                        <label class="checkbox inline">
                            <input <?php if ($data[0]['personal_equipment'] == "Fuel") echo 'checked="checked"'; ?> type="checkbox" name="personal_equipment" value="Fuel"> Fuel
                        </label>
                    </div>
                </div>
            </fieldset>
        </div>-->
<!--        <div class="tab-pane" id="leave_record">-->
            <fieldset>
                <div class="control-group">
                    <label for="inputError" class="control-label">Privileges Leave</label>
                    <div class="controls">
                        <input type="text" id="" name="privileges_leave" value="<?php echo $leave[0]['privileges_leave']; ?>">
                    </div>
                </div>
                <div class="control-group">
                    <label for="inputError" class="control-label">Casual Leave</label>
                    <div class="controls">
                        <input type="text" id="" name="casual_leave" value="<?php echo $leave[0]['casual_leave']; ?>">
                    </div>
                </div>
                <div class="control-group">
                    <label for="inputError" class="control-label">Sick Leave</label>
                    <div class="controls">
                        <input type="text" id="" name="sick_leave" value="<?php echo $leave[0]['sick_leave']; ?>">
                    </div>
                </div>
                <div class="control-group">
                    <label for="inputError" class="control-label">AWOL</label>
                    <div class="controls">
                        <input type="text" id="" name="awol" value="<?php echo $leave[0]['awol']; ?>">
                    </div>
                </div>
            </fieldset>
<!--        </div>-->
<!--        <div class="tab-pane" id="performance">
            <fieldset>
                <div class="control-group">
                    <label for="inputError" class="control-label">Punctuality</label>
                    <div class="controls">
                        <label class="radio inline">
                            <input <?php if ($data[0]['punctuality'] == "good") echo 'checked="checked"'; ?> type="radio" id="" name="punctuality" value="good"> Good
                        </label>
                        <label class="radio inline">
                            <input <?php if ($data[0]['punctuality'] == "average") echo 'checked="checked"'; ?> type="radio" id="" name="punctuality" value="average"> Average
                        </label>
                        <label class="radio inline">
                            <input <?php if ($data[0]['punctuality'] == "poor") echo 'checked="checked"'; ?> type="radio" id="" name="punctuality" value="poor"> Poor
                        </label>
                    </div>
                </div>
                <div class="control-group">
                    <label for="inputError" class="control-label">Job Knowledge</label>
                    <div class="controls">
                        <label class="radio inline">
                            <input <?php if ($data[0]['job_knowledge'] == "good") echo 'checked="checked"'; ?> type="radio" id="" name="job_knowledge" value="good"> Good
                        </label>
                        <label class="radio inline">
                            <input <?php if ($data[0]['job_knowledge'] == "average") echo 'checked="checked"'; ?> type="radio" id="" name="job_knowledge" value="average"> Average
                        </label>
                        <label class="radio inline">
                            <input <?php if ($data[0]['job_knowledge'] == "poor") echo 'checked="checked"'; ?> type="radio" id="" name="job_knowledge" value="poor"> Poor
                        </label>
                    </div>
                </div>
                <div class="control-group">
                    <label for="inputError" class="control-label">Initiative</label>
                    <div class="controls">
                        <label class="radio inline">
                            <input <?php if ($data[0]['initiative'] == "good") echo 'checked="checked"'; ?> type="radio" id="" name="initiative" value="good"> Good
                        </label>
                        <label class="radio inline">
                            <input <?php if ($data[0]['initiative'] == "average") echo 'checked="checked"'; ?> type="radio" id="" name="initiative" value="average"> Average
                        </label>
                        <label class="radio inline">
                            <input <?php if ($data[0]['initiative'] == "poor") echo 'checked="checked"'; ?> type="radio" id="" name="initiative" value="poor"> Poor
                        </label>
                    </div>
                </div>
                <div class="control-group">
                    <label for="inputError" class="control-label">Short coming</label>
                    <div class="controls">
                        <label class="radio inline">
                            <input <?php if ($data[0]['short_coming'] == "yes") echo 'checked="checked"'; ?> type="radio" id="" name="short_coming" value="yes"> Yes
                        </label>
                        <label class="radio inline">
                            <input <?php if ($data[0]['short_coming'] == "no") echo 'checked="checked"'; ?> type="radio" id="" name="short_coming" value="no"> No
                        </label>
                    </div>
                </div>
            </fieldset>
        </div>-->
    </div>
    <fieldset>
        <div class="form-actions">
            <button class="btn btn-primary" type="submit" onclick="history.go(-1);">Save changes</button>
            <button class="btn" type="reset">Cancel</button>
        </div>
    </fieldset>

    <?php echo form_close(); ?>

</div>
