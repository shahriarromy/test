<html>
    <head>
        <title><?php echo $page_title; ?></title>
    </head>
    <body style="font-size: 12px;">
        <p style="text-align: center;"><img style="display: inline-block;border: 1px solid #000;" src="<?php echo base_url(); ?>uploads/company/<?php echo $dep_com[0]['company_logo']; ?>" alt="" ></p>
        <h3 class="lead" style="text-align: center;"><?php echo $dep_com[0]['company_name']; ?></h3>
        <h3 class="lead" style="text-align: center;"><?php echo $dep_com[0]['department_name']; ?> Department</h3>
        <div>
            <div style="padding-top: 10px;width: 60%;float: left;display: inline-block;">
                <div style="border: 1px solid #000;padding: 15px;">
                    <p><b><?php echo ucfirst($employee[0]['employee_name']); ?></b><br><?php echo $employee[0]['present_address']; ?><br>Cell: <?php echo $employee[0]['contact_number']; ?><br>E-mail: <?php echo $employee[0]['email']; ?></p>
                </div>
            </div>
            <div style="width: 20%;float: right;">
                <img style="float: right;height: 138px;width: 109px;border: 1px solid #000;" src="<?php echo base_url(); ?>uploads/employee/<?php echo $employee[0]['employee_pic']; ?>" width="109" height="138" alt="">
            </div>
        </div>
        <div style="padding-top: 10px;">
            <div style="padding: 10px;border: 1px solid #000; width: 45%;float: left;height: 230px;">
                <h3 style="margin-bottom: 10px;">Personal Information</h3>
                <div><b>Father's Name:</b> <?php echo $employee[0]['father_name']; ?></div>
                <div><b>Father's contact:</b> <?php echo $employee[0]['father_contact']; ?></div>
                <div><b>Mother's Name:</b> <?php echo $employee[0]['mother_name']; ?></div>
                <div><b>Contact no:</b> <?php echo $employee[0]['contact_number']; ?></div>
                <div><b>Date of birth:</b> <?php echo date('M j, Y', strtotime($employee[0]['d_o_b'])); ?></div>
                <div><b>Present Age:</b> <?php echo $employee[0]['present_age']; ?></div>
                <div><b>Blood Group:</b> <?php echo $employee[0]['blood_group']; ?></div>
                <div><b>Blood Group:</b> <?php echo $employee[0]['blood_group']; ?></div>
                <div><b>Voter ID No:</b> <?php echo $employee[0]['voter_id']; ?></div>
                <div><b>Present address:</b> <?php echo $employee[0]['present_address']; ?></div>
                <div><b>Permanent address:</b> <?php echo $employee[0]['permanent_address']; ?></div>
                <div><b>Qualification:</b> <?php echo $employee[0]['qualification']; ?></div>
            </div>
            <div style="padding: 10px;border: 1px solid #000; width: 45%;float: right;height: 230px;">
                <h3 style="margin-bottom: 10px;">Service Information</h3>
                <div><b>ID No.:</b> <?php echo $employee[0]['id_no']; ?></div>
                <div><b>Designation:</b> <?php echo $employee[0]['designation']; ?></div>
                <div><b>Joining date:</b> <?php echo date('M j, Y', strtotime($employee[0]['joining_date'])); ?></div>
                <div><b>Confirmation date:</b> <?php echo date('M j, Y', strtotime($employee[0]['confirmation_date'])); ?></div>
                <div><b>Place of work:</b> <?php echo $employee[0]['place_of_work']; ?></div>
                <div><b>Guarantor's name:</b> <?php echo $employee[0]['guarantor']; ?></div>
                <div><b>Show cause:</b> <?php echo $employee[0]['show_cause']; ?></div>
                <div><b>Penalty:</b> <?php echo $employee[0]['penalty']; ?></div>
            </div>
        </div>
        <div style="padding-top: 10px;">
            <div style="padding: 10px;border: 1px solid #000; width: 45%;float: left;height: 260px;">
                <h3 style="margin-bottom: 10px;">Salary Details</h3>
                <div><b>Last increment amount:</b> <?php echo $employee[0]['increment_amount']; ?></div>
                <div><b>Last increment amount:</b> <?php echo date('M j, Y', strtotime($employee[0]['last_increment_date'])); ?></div>
                <div><b>Consolidate salary:</b> <?php echo $employee[0]['consolidate_salary']; ?></div>
                <div><b>Basic:</b> <?php echo $employee[0]['basic']; ?></div>
                <div><b>Dearness Allow:</b> <?php echo $employee[0]['dearness_allow']; ?></div>
                <div><b>House Rent:</b> <?php echo $employee[0]['house_rent']; ?></div>
                <div><b>Special Allow:</b> <?php echo $employee[0]['special_allow']; ?></div>
                <div><b>Mobile Allow:</b> <?php echo $employee[0]['mobile_allow']; ?></div>
                <div><b>Heavy Duty Allow:</b> <?php echo $employee[0]['heavy_duty']; ?></div>
                <div><b>Washing Allow:</b> <?php echo $employee[0]['washing_allow']; ?></div>
                <div><b>Conveyance Allow:</b> <?php echo $employee[0]['conveyance_allow']; ?></div>
                <div><b>Misc:</b> <?php echo $employee[0]['misc']; ?></div>
                <div><b>Total:</b> <?php echo $employee[0]['total']; ?></div>
            </div>
            <div style="padding: 10px;border: 1px solid #000; width: 45%;float: right;height: 260px;">
                <h3 style="margin-bottom: 10px;">Special Assignment, etc</h3>
                <div><b>Appointed as in charge:</b> <?php echo ucfirst($employee[0]['appoinment_as']); ?></div>
                <div><b>Target given:</b> <?php echo $employee[0]['target_given']; ?></div>
                <div><b>Target achieved:</b> <?php echo $employee[0]['target_achieved']; ?></div>
                <div><b>Liability for recovery:</b> <?php echo $employee[0]['liability_recovery']; ?></div>
                <div><b>Personally Equipment Facility:</b> <?php if(!empty($employee[0]['is_laptop'])) {echo $employee[0]['is_laptop'];} if(!empty($employee[0]['is_car'])) {echo ' '.$employee[0]['is_car']; } if(!empty($employee[0]['is_mc'])) {echo ' '.$employee[0]['is_mc']; } if(!empty($employee[0]['is_fuel'])) {echo ' '.$employee[0]['is_fuel']; } ?></div>
            </div>
        </div>
        <div style="padding-top: 10px;">
            <div style="padding: 10px;border: 1px solid #000; width: 45%;float: left;height: 160px;">
                <h3 style="margin-bottom: 10px;">Leave Record</h3>
                <div><b>Casual Leave:</b> Permitted:<?php echo $leave[0]['casual_max']; ?>, Taken: <?php echo $leave[0]['casual_taken']; ?>, Available: <?php echo $leave[0]['casual_balance']; ?></div>
                <div><b>Privileges Leave:</b> Permitted:<?php echo $leave[0]['privileged_max']; ?>, Taken: <?php echo $leave[0]['privileged_taken']; ?>, Available: <?php echo $leave[0]['privileged_balance']; ?></div>
                <div><b>Sick Leave:</b> Permitted:<?php echo $leave[0]['sick_max']; ?>, Taken: <?php echo $leave[0]['sick_taken']; ?>, Available: <?php echo $leave[0]['sick_balance']; ?></div>
            </div>
            <div style="padding: 10px;border: 1px solid #000; width: 45%;float: right;height: 160px;">
                <h3 style="margin-bottom: 10px;">Performance as a whole</h3>
                <div><b>Punctuality:</b> <?php echo $employee[0]['punctuality']; ?></div>
                <div><b>Job Knowledge:</b> <?php echo $employee[0]['job_knowledge']; ?></div>
                <div><b>Initiative:</b> <?php echo $employee[0]['initiative']; ?></div>
                <div><b>Short coming:</b> <?php echo $employee[0]['short_coming']; ?></div>
            </div>
        </div>
    </body>
</html>