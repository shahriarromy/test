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
                <p style="text-align: center;"><img style="display: inline-block;border: 1px solid #000;" src="<?php echo base_url(); ?>uploads/company/<?php if (!empty($dep_com[0]['company_logo'])) {
                echo $dep_com[0]['company_logo'];
            } else {
                echo 'dummy.jpg';
            } ?>" alt="" ></p>
                <h3 class="lead" style="text-align: center;"><?php echo $dep_com[0]['company_name']; ?></h3>
                <h3 style="text-align: center;"><?php echo $dep_com[0]['department_name']; ?></h3>
                <p style="text-align: center;"><img style="display: inline-block;height: 138px;width: 109px;max-width: 109px;border: 1px solid #000;" src="<?php echo base_url(); ?>uploads/employee/<?php if (!empty($employee[0]['employee_pic'])) {
                echo $employee[0]['employee_pic'];
            } else {
                echo 'dummy.jpg';
            } ?>" width="109" height="138" alt="" ></p>
            </div>
            <div class="row-fluid">
                <div class="span6 box-block">
                    <div style="padding: 10px;">
                        <h4 style="margin-bottom: 10px;">Service Information</h4>
                        <p><b>Father's Name:</b> <?php echo $employee[0]['father_name']; ?></p>
                        <p><b>Father's contact:</b> <?php echo $employee[0]['father_contact']; ?></p>
                        <p><b>Mother's Name:</b> <?php echo $employee[0]['mother_name']; ?></p>
                        <p><b>Contact no:</b> <?php echo $employee[0]['contact_number']; ?></p>
                        <p><b>Date of birth:</b> <?php echo date('M j, Y', strtotime($employee[0]['d_o_b'])); ?></p>
                        <p><b>Present Age:</b> <?php echo $employee[0]['present_age']; ?></p>
                        <p><b>Blood Group:</b> <?php echo $employee[0]['blood_group']; ?></p>
                        <p><b>Blood Group:</b> <?php echo $employee[0]['blood_group']; ?></p>
                        <p><b>Voter ID No:</b> <?php echo $employee[0]['voter_id']; ?></p>
                        <p><b>Present address:</b> <?php echo $employee[0]['present_address']; ?></p>
                        <p><b>Permanent address:</b> <?php echo $employee[0]['permanent_address']; ?></p>
                        <p><b>Qualification:</b> <?php echo $employee[0]['qualification']; ?></p>
                    </div>
                </div>
                <div class="span6 box-block">
                    <div style="padding: 10px;">
                        <h4 style="margin-bottom: 10px;">Personal Information</h4>
                        <p><b>ID No.:</b> <?php echo $employee[0]['id_no']; ?></p>
                        <p><b>Designation:</b> <?php echo $employee[0]['designation']; ?></p>
                        <p><b>Joining date:</b> <?php echo date('M j, Y', strtotime($employee[0]['joining_date'])); ?></p>
                        <p><b>Confirmation date:</b> <?php echo date('M j, Y', strtotime($employee[0]['confirmation_date'])); ?></p>
                        <p><b>Place of work:</b> <?php echo $employee[0]['place_of_work']; ?></p>
                        <p><b>Guarantor's name:</b> <?php echo $employee[0]['guarantor']; ?></p>
                        <p><b>Show cause:</b> <?php echo $employee[0]['show_cause']; ?></p>
                        <p><b>Penalty:</b> <?php echo $employee[0]['penalty']; ?></p>
                    </div>
                </div>
            </div>
            <div class="row-fluid">
                <div class="span6 box-block">
                    <div style="padding: 10px;">
                        <h4 style="margin-bottom: 10px;">Salary Details</h4>
                        <p><b>Last increment amount:</b> <?php echo $employee[0]['increment_amount']; ?></p>
                        <p><b>Last increment amount:</b> <?php echo date('M j, Y', strtotime($employee[0]['last_increment_date'])); ?></p>
                        <p><b>Consolidate salary:</b> <?php echo $employee[0]['consolidate_salary']; ?></p>
                        <p><b>Basic:</b> <?php echo $employee[0]['basic']; ?></p>
                        <p><b>Dearness Allow:</b> <?php echo $employee[0]['dearness_allow']; ?></p>
                        <p><b>House Rent:</b> <?php echo $employee[0]['house_rent']; ?></p>
                        <p><b>Special Allow:</b> <?php echo $employee[0]['special_allow']; ?></p>
                        <p><b>Mobile Allow:</b> <?php echo $employee[0]['mobile_allow']; ?></p>
                        <p><b>Heavy Duty Allow:</b> <?php echo $employee[0]['heavy_duty']; ?></p>
                        <p><b>Washing Allow:</b> <?php echo $employee[0]['washing_allow']; ?></p>
                        <p><b>Conveyance Allow:</b> <?php echo $employee[0]['conveyance_allow']; ?></p>
                        <p><b>Misc:</b> <?php echo $employee[0]['misc']; ?></p>
                        <p><b>Total:</b> <?php echo $employee[0]['total']; ?></p>
                    </div>
                </div>
                <div class="span6 box-block">
                    <div style="padding: 10px;">
                        <h4 style="margin-bottom: 10px;">Special Assignment, etc</h4>
                        <p><b>Appointed as in charge:</b> <?php echo ucfirst($employee[0]['appoinment_as']); ?></p>
                        <p><b>Target given:</b> <?php echo $employee[0]['target_given']; ?></p>
                        <p><b>Target achieved:</b> <?php echo $employee[0]['target_achieved']; ?></p>
                        <p><b>Liability for recovery:</b> <?php echo $employee[0]['liability_recovery']; ?></p>
                        <p><b>Personally Equipment Facility:</b> 
                            <?php
                            if (!empty($employee[0]['is_laptop'])) {
                                echo $employee[0]['is_laptop'];
                            } if (!empty($employee[0]['is_car'])) {
                                echo ' ' . $employee[0]['is_car'];
                            } if (!empty($employee[0]['is_mc'])) {
                                echo ' ' . $employee[0]['is_mc'];
                            } if (!empty($employee[0]['is_fuel'])) {
                                echo ' ' . $employee[0]['is_fuel'];
                            }
                            ?>
                        </p>
                    </div>
                </div>
            </div>
            <div class="row-fluid">
                <div class="span6 box-block">
                    <div style="padding: 10px;">
                        <h4 style="margin-bottom: 10px;">Leave Record</h4>
                        <p><b>Casual Leave:</b> Permitted:<?php echo $leave[0]['casual_max']; ?>, Taken: <?php echo $leave[0]['casual_taken']; ?>, Available: <?php echo $leave[0]['casual_balance']; ?></p>
                        <p><b>Privileges Leave:</b> Permitted:<?php echo $leave[0]['privileged_max']; ?>, Taken: <?php echo $leave[0]['privileged_taken']; ?>, Available: <?php echo $leave[0]['privileged_balance']; ?></p>
                        <p><b>Sick Leave:</b> Permitted:<?php echo $leave[0]['sick_max']; ?>, Taken: <?php echo $leave[0]['sick_taken']; ?>, Available: <?php echo $leave[0]['sick_balance']; ?></p>
                    </div>
                </div>
                <div class="span6 box-block">
                    <div style="padding: 10px;">
                        <h4 style="margin-bottom: 10px;">Performance as a whole</h4>
                        <p><b>Punctuality:</b> <?php echo $employee[0]['punctuality']; ?></p>
                        <p><b>Job Knowledge:</b> <?php echo $employee[0]['job_knowledge']; ?></p>
                        <p><b>Initiative:</b> <?php echo $employee[0]['initiative']; ?></p>
                        <p><b>Short coming:</b> <?php echo $employee[0]['short_coming']; ?></p>
                    </div>
                </div>
            </div>
        </div>
    </div>