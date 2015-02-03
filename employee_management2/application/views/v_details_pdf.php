<html>
    <head>
        <title><?php echo $page_title; ?></title>
    </head>
    <body style="font-size: 12px;font-family: Arial, Helvetica, sans-serif;">
        <h3 class="lead" style="text-align: center;"><?php echo $dep_com[0]['company_name']; ?></h3>
        <h3 class="lead" style="text-align: center;"><?php echo $dep_com[0]['department_name']; ?></h3>
        <div>
            <div style="padding-top: 10px;width: 60%;float: left;display: inline-block;">
                <div style="border: 1px solid #000;padding: 15px;">
                    <p><b><?php echo ucfirst($employee[0]['employee_name']); ?></b><br><b><?php echo $employee[0]['designation']; ?></b><br><?php echo $employee[0]['present_address']; ?><br>Cell: <?php echo $employee[0]['contact_number']; ?><br>E-mail: <?php echo $employee[0]['email']; ?></p>
                </div>
            </div>
            <div style="width: 20%;float: right;">
                <img style="float: right;height: 138px;width: 109px;border: 1px solid #000;" src="<?php echo base_url(); ?>uploads/employee/<?php echo $employee[0]['employee_pic']; ?>" width="109" height="138" alt="">
            </div>
        </div>
        <div style="padding-top: 10px;">
            <div style="padding: 10px;border: 1px solid #000; width: 45%;float: left;height: 230px;">
                <h3 style="margin-bottom: 10px;">Personal Information</h3>
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
                        <td><?php if($employee[0]['d_o_b']=='0000-00-00' || empty($employee[0]['d_o_b'])) echo ''; else echo date('M j, Y', strtotime($employee[0]['d_o_b'])); ?></td>
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
            <div style="padding: 10px;border: 1px solid #000; width: 45%;float: right;height: 230px;">
                <h3 style="margin-bottom: 10px;">Service Information</h3>
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
                        <td><b>Joining date:</b></td>
                        <td><?php if($employee[0]['joining_date']=='0000-00-00' || empty($employee[0]['joining_date'])) echo ''; else echo date('M j, Y', strtotime($employee[0]['joining_date'])); ?></td>
                    </tr>
                    <tr>
                        <td><b>Confirmation date:</b></td>
                        <td><?php if($employee[0]['confirmation_date']=='0000-00-00' || empty($employee[0]['confirmation_date'])) echo ''; else echo date('M j, Y', strtotime($employee[0]['confirmation_date'])); ?></td>
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
        <div style="padding-top: 10px;">
            <div style="padding: 10px;border: 1px solid #000; width: 45%;float: left;height: 260px;">
                <h3 style="margin-bottom: 10px;">Salary Details</h3>
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
                        <td><?php if($employee[0]['last_increment_date']=='0000-00-00' || empty($employee[0]['last_increment_date'])) echo ''; else echo date('M j, Y', strtotime($employee[0]['last_increment_date'])); ?></td>
                    </tr>
                </table>
            </div>
            <div style="padding: 10px;border: 1px solid #000; width: 45%;float: right;height: 260px;">
                <h3 style="margin-bottom: 10px;">Special Assignment, etc</h3>
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
        <div style="padding-top: 10px;">
            <div style="padding: 10px;border: 1px solid #000; width: 45%;float: left;height: 120px;">
                <h3 style="margin-bottom: 10px;">Leave Record</h3>
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
            <div style="padding: 10px;border: 1px solid #000; width: 45%;float: right;height: 120px;">
                <h3 style="margin-bottom: 10px;">Performance as a whole</h3>
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
    </body>
</html>