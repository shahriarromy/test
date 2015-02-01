<div class="container top view">
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
            <a href="#">View</a>
        </li>
    </ul>
    <div class="page-header">
        <h2>
            <?php echo ucfirst($this->uri->segment(2)); ?> Details
        </h2>
    </div>
    <div class="row">
        <div class="span12 columns">
            <div class="well">
                <h3 style="text-align: right;"><a href="<?php echo base_url() . "admin/employee/view/" . $employee[0]['id'] . "/1"; ?>" target="_blank">Print</a></h3>
                <p style="text-align: center;"><img style="display: inline-block;height: 80px;width: 109px;max-width: 109px;border: 1px solid #000;" src="<?php echo base_url(); ?>uploads/company/<?php
                    if (!empty($dep_com[0]['company_logo'])) {
                        echo $dep_com[0]['company_logo'];
                    } else {
                        echo 'dummy.jpg';
                    }
                    ?>" height="80" width="109" alt="" ></p>
                <h3 class="lead" style="text-align: center;"><?php echo $dep_com[0]['company_name']; ?></h3>
                <h3 style="text-align: center;"><?php echo $dep_com[0]['department_name']; ?> Department</h3>
                <p style="text-align: center;"><img style="display: inline-block;height: 138px;width: 109px;max-width: 109px;border: 1px solid #000;" src="<?php echo base_url(); ?>uploads/employee/<?php
                    if (!empty($employee[0]['employee_pic'])) {
                        echo $employee[0]['employee_pic'];
                    } else {
                        echo 'dummy.jpg';
                    }
                    ?>" width="109" height="138" alt="" ></p>
                <h4 style="text-align: center"><?php echo ucfirst($employee[0]['employee_name']); ?></h4>
                <h5 style="text-align: center"><?php echo $employee[0]['designation']; ?></h5>
            </div>
            <div class="row-fluid">
                <div class="span6 box-block">
                    <div style="padding: 10px;">
                        <h4 style="margin-bottom: 10px;">Personal Information</h4>
                        <table class="table table-borderless">
                            <tr>
                                <td><b>Father's Name:</b></td>
                                <td><?php echo $employee[0]['father_name']; ?></td>
                            </tr>
                            <tr>
                                <td><b>Father's contact:</b></td>
                                <td><?php echo $employee[0]['father_contact']; ?></td>
                            </tr>
                            <tr>
                                <td><b>Mother's Name:</b></td>
                                <td><?php echo $employee[0]['mother_name']; ?></td>
                            </tr>
                            <tr>
                                <td><b>Contact no:</b></td>
                                <td><?php echo $employee[0]['contact_number']; ?></td>
                            </tr>
                            <tr>
                                <td><b>Date of birth:</b></td>
                                <td><?php if ($employee[0]['d_o_b'] == '0000-00-00' || empty($employee[0]['d_o_b'])) echo '';
                    else echo date('M j, Y', strtotime($employee[0]['d_o_b'])); ?></td>
                            </tr>
                            <tr>
                                <td><b>Present Age:</b></td>
                                <td><?php echo $employee[0]['present_age']; ?></td>
                            </tr>
                            <tr>
                                <td><b>Blood Group:</b></td>
                                <td><?php echo $employee[0]['blood_group']; ?></td>
                            </tr>
                            <tr>
                                <td><b>Voter ID No:</b></td>
                                <td><?php echo $employee[0]['voter_id']; ?></td>
                            </tr>
                            <tr>
                                <td><b>Present address:</b></td>
                                <td><?php echo $employee[0]['present_address']; ?></td>
                            </tr>
                            <tr>
                                <td><b>Permanent address:</b></td>
                                <td><?php echo $employee[0]['permanent_address']; ?></td>
                            </tr>
                            <tr>
                                <td><b>Qualification:</b></td>
                                <td><?php echo $employee[0]['qualification']; ?></td>
                            </tr>
                            <tr>
                                <td><b>Employment Activation:</b></td>
                                <td><?php echo $employee[0]['is_active']; ?></td>
                            </tr>
                        </table>
                    </div>
                </div>
                <div class="span6 box-block">
                    <div style="padding: 10px;">
                        <h4 style="margin-bottom: 10px;">Service Information</h4>
                        <table class="table table-borderless">
                            <tr>
                                <td><b>ID No.:</b></td>
                                <td><?php echo $employee[0]['id_no']; ?></td>
                            </tr>
                            <tr>
                                <td><b>Designation:</b></td>
                                <td><?php echo $employee[0]['designation']; ?></td>
                            </tr>
                            <tr>
                                <td><b>Designation:</b></td>
                                <td><?php echo $employee[0]['designation']; ?></td>
                            </tr>
                            <tr>
                                <td><b>Joining date:</b></td>
                                <td><?php if ($employee[0]['joining_date'] == '0000-00-00' || empty($employee[0]['joining_date'])) echo '';
                    else echo date('M j, Y', strtotime($employee[0]['joining_date'])); ?></td>
                            </tr>
                            <tr>
                                <td><b>Confirmation date:</b></td>
                                <td><?php if ($employee[0]['confirmation_date'] == '0000-00-00' || empty($employee[0]['confirmation_date'])) echo '';
                    else echo date('M j, Y', strtotime($employee[0]['confirmation_date'])); ?></td>
                            </tr>
                            <tr>
                                <td><b>Place of work:</b></td>
                                <td><?php echo $employee[0]['place_of_work']; ?></td>
                            </tr>
                            <tr>
                                <td><b>Guarantor's name:</b></td>
                                <td><?php echo $employee[0]['guarantor']; ?></td>
                            </tr>
                            <tr>
                                <td><b>Show cause:</b></td>
                                <td><?php echo $employee[0]['show_cause']; ?></td>
                            </tr>
                            <tr>
                                <td><b>Penalty:</b></td>
                                <td><?php echo $employee[0]['penalty']; ?></td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
            <div class="row-fluid">
                <div class="span6 box-block">
                    <div style="padding: 10px;">
                        <h4 style="margin-bottom: 10px;">Salary Details</h4>
                        <table class="table table-borderless">
                            <tr>
                                <td><b>Consolidate salary:</b></td>
                                <td><?php echo $employee[0]['consolidate_salary']; ?></td>
                            </tr>
                            <tr>
                                <td><b>Basic:</b></td>
                                <td><?php echo $employee[0]['basic']; ?></td>
                            </tr>
                            <tr>
                                <td><b>Dearness Allow:</b></td>
                                <td><?php echo $employee[0]['dearness_allow']; ?></td>
                            </tr>
                            <tr>
                                <td><b>House Rent:</b></td>
                                <td><?php echo $employee[0]['house_rent']; ?></td>
                            </tr>
                            <tr>
                                <td><b>Special Allow:</b></td>
                                <td><?php echo $employee[0]['special_allow']; ?></td>
                            </tr>
                            <tr>
                                <td><b>Mobile Allow:</b></td>
                                <td><?php echo $employee[0]['mobile_allow']; ?></td>
                            </tr>
                            <tr>
                                <td><b>Heavy Duty Allow:</b></td>
                                <td><?php echo $employee[0]['heavy_duty']; ?></td>
                            </tr>
                            <tr>
                                <td><b>Washing Allow:</b></td>
                                <td><?php echo $employee[0]['washing_allow']; ?></td>
                            </tr>
                            <tr>
                                <td><b>Conveyance Allow:</b></td>
                                <td><?php echo $employee[0]['conveyance_allow']; ?></td>
                            </tr>
                            <tr>
                                <td><b>Misc:</b></td>
                                <td><?php echo $employee[0]['misc']; ?></td>
                            </tr>
                            <tr>
                                <td><b>Total:</b></td>
                                <td><?php echo $employee[0]['total']; ?></td>
                            </tr>
                            <tr>
                                <td><b>Last increased amount:</b></td>
                                <td><?php echo $employee[0]['increment_amount']; ?></td>
                            </tr>
                            <tr>
                                <td><b>Last increment date:</b></td>
                                <td><?php if ($employee[0]['last_increment_date'] == '0000-00-00' || empty($employee[0]['last_increment_date'])) echo '';
                    else echo date('M j, Y', strtotime($employee[0]['last_increment_date'])); ?></td>
                            </tr>
                        </table>
                    </div>
                </div>
                <div class="span6 box-block">
                    <div style="padding: 10px;">
                        <h4 style="margin-bottom: 10px;">Special Assignment, etc</h4>
                        <table class="table table-borderless">
                            <tr>
                                <td><b>Appointed as in charge:</b></td>
                                <td><?php echo ucfirst($employee[0]['appoinment_as']); ?></td>
                            </tr>
                            <tr>
                                <td><b>Target given:</b></td>
                                <td><?php echo $employee[0]['target_given']; ?></td>
                            </tr>
                            <tr>
                                <td><b>Target achieved amount:</b></td>
                                <td><?php echo $employee[0]['target_achieved']; ?></td>
                            </tr>
                            <tr>
                                <td><b>Liability for recovery:</b></td>
                                <td><?php echo $employee[0]['liability_recovery']; ?></td>
                            </tr>
                            <tr>
                                <td><b>Personally Equipment Facility:</b></td>
                                <td><?php
                                    if (!empty($employee[0]['is_laptop'])) {
                                        echo $employee[0]['is_laptop'];
                                    } if (!empty($employee[0]['is_car'])) {
                                        echo ' ' . $employee[0]['is_car'];
                                    } if (!empty($employee[0]['is_mc'])) {
                                        echo ' ' . $employee[0]['is_mc'];
                                    } if (!empty($employee[0]['is_fuel'])) {
                                        echo ' ' . $employee[0]['is_fuel'];
                                    } if (!empty($employee[0]['other_equipment'])) {
                                        echo ' ' . $employee[0]['other_equipment'];
                                    }
                                    ?></td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
            <div class="row-fluid">
                <div class="span6 box-block">
                    <div style="padding: 10px;">
                        <h4 style="margin-bottom: 10px;">Leave Record</h4>
                        <table class="table table-borderless">
                            <tr>
                                <td><b>Casual Leave:</b></td>
                                <td>Permitted:<?php echo $leave[0]['casual_max']; ?>, Taken: <?php echo $leave[0]['casual_taken']; ?>, Available: <?php echo $leave[0]['casual_balance']; ?></td>
                            </tr>
                            <tr>
                                <td><b>Privileges Leave:</b></td>
                                <td>Permitted:<?php echo $leave[0]['privileged_max']; ?>, Taken: <?php echo $leave[0]['privileged_taken']; ?>, Available: <?php echo $leave[0]['privileged_balance']; ?></td>
                            </tr>
                            <tr>
                                <td><b>Sick Leave:</b></td>
                                <td>Permitted:<?php echo $leave[0]['sick_max']; ?>, Taken: <?php echo $leave[0]['sick_taken']; ?>, Available: <?php echo $leave[0]['sick_balance']; ?></td>
                            </tr>
                        </table>
                    </div>
                </div>
                <div class="span6 box-block">
                    <div style="padding: 10px;">
                        <h4 style="margin-bottom: 10px;">Performance as a whole</h4>
                        <table class="table table-borderless">
                            <tr>
                                <td><b>Punctuality:</b></td>
                                <td><?php echo $employee[0]['punctuality']; ?></td>
                            </tr>
                            <tr>
                                <td><b>Job Knowledge:</b></td>
                                <td><?php echo $employee[0]['job_knowledge']; ?></td>
                            </tr>
                            <tr>
                                <td><b>Initiative:</b></td>
                                <td><?php echo $employee[0]['initiative']; ?></td>
                            </tr>
                            <tr>
                                <td><b>Short coming:</b></td>
                                <td><?php echo $employee[0]['short_coming']; ?></td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>