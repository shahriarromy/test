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
                <h3 class="lead" style="text-align: center;"><?php echo $dep_com[0]['company_name']; ?></h3>
                <h3 style="text-align: center;"><?php echo $dep_com[0]['department_name']; ?></h3>
                <p style="text-align: center;"><img style="height: 138px;width: 109px;max-width: 109px;border: 1px solid #000;" src="<?php echo base_url(); ?>uploads/employee/<?php echo $employee[0]['employee_pic']; ?>" width="109" height="138" alt="" ></p>
            </div>
            <div class="row-fluid">
                <div class="span6 box-block">
                    <div style="padding: 10px;">
                        <h4 style="margin-bottom: 10px;">Service Information</h4>
                        <p><b>ID No.:</b> <?php echo $employee[0]['id_no']; ?></p>
                        <p><b>Name:</b> <?php echo $employee[0]['employee_name']; ?></p>
                        <p><b>Designation:</b> <?php echo $employee[0]['designation']; ?></p>
                        <p><b>Joining date:</b> <?php echo $employee[0]['joining_date']; ?></p>
                        <p><b>Confirmation date:</b> <?php echo $employee[0]['confirmation_date']; ?></p>
                        <p><b>Place of work:</b> <?php echo $employee[0]['place_of_work']; ?></p>
                        <p><b>Contact no:</b> <?php echo $employee[0]['contact_number']; ?></p>
                        <p><b>Show cause:</b> Not Available</p>
                        <p><b>Penalty:</b> Not Available</p>
                    </div>
                </div>
                <div class="span6 box-block">
                    <div style="padding: 10px;">
                        <h4 style="margin-bottom: 10px;">Personal Information</h4>
                        <p><b>Father's Name:</b> <?php if(!empty($employee[0]['father_name'])){echo $employee[0]['father_name'];} else { ?>Not Available<?php } ?>&emsp;&emsp;<b>Contact no.:</b> <?php if(!empty($employee[0]['father_contact'])){echo $employee[0]['father_contact'];} else { ?>Not Available<?php } ?></p>
                        <p><b>Mother's Name:</b> Not available</p>
                        <p><b>Date of birth:</b> Not available</p>
                        <p><b>Present Age:</b> Not available</p>
                        <p><b>Blood Group:</b> Not available</p>
                        <p><b>Voter ID No:</b> <?php echo $employee[0]['voter_id']; ?></p>
                        <p><b>Present address:</b> <?php echo $employee[0]['present_address']; ?></p>
                        <p><b>Permanent address:</b> <?php echo $employee[0]['permanent_address']; ?></p>
                        <p><b>Qualification:</b> <?php echo $employee[0]['qualification']; ?></p>
                        <p><b>Guarantor's name:</b> <?php echo $employee[0]['guarantor']; ?></p>
                    </div>
                </div>
            </div>
            <div class="row-fluid">
                <div class="span6 box-block">
                    <div style="padding: 10px;">
                        <h4 style="margin-bottom: 10px;">Salary Details</h4>
                        <p><b>Consolidate salary:</b> </p>
                        <p><b>Basic:</b> Not available</p>
                        <p><b>Dearness Allow:</b> Not available</p>
                        <p><b>House Rent:</b> Not available</p>
                        <p><b>Special Allow:</b> Not available</p>
                        <p><b>Mobile Allow:</b> Not available</p>
                        <p><b>Heavy Duty Allow:</b> Not available</p>
                        <p><b>Skill Allow:</b> Not available</p>
                        <p><b>Washing Allow:</b> Not available</p>
                        <p><b>Conveyance Allow:</b> Not available</p>
                        <p><b>Misc:</b> Not available</p>
                        <p><b>Total:</b> </p>
                    </div>
                </div>
                <div class="span6 box-block">
                    <div style="padding: 10px;">
                        <h4 style="margin-bottom: 10px;">Special Assignment, etc</h4>
                        <p><b>Appointed as in charge:</b> Not Available</p>
                        <p><b>Target given:</b> Not Available</p>
                        <p><b>Target achieved:</b> Not Available</p>
                        <p><b>Liability for recovery:</b> Not Available</p>
                        <p><b>Personally Equipment Facility:</b> Not Available</p>
                        <p><b>Laptop / Car / MC/ Fuel:</b> Not Available</p>
                    </div>
                </div>
            </div>
            <div class="row-fluid">
                <div class="span6 box-block">
                    <div style="padding: 10px;">
                        <h4 style="margin-bottom: 10px;">Leave Record</h4>
                        <p><b>Privileges Leave:</b> Not available</p>
                        <p><b>Casual Leave:</b> Not available</p>
                        <p><b>Sick Leave:</b> Not available</p>
                        <p><b>AWOL:</b> Not available</p>
                    </div>
                </div>
                <div class="span6 box-block">
                    <div style="padding: 10px;">
                        <h4 style="margin-bottom: 10px;">Performance as a whole</h4>
                        <p><b>(assessed from&emsp;&emsp;to&emsp;&emsp;)</b></p>
                        <p><b>Punctuality:</b> Good</p>
                        <p><b>Job Knowledge:</b> Good</p>
                        <p><b>Initiative:</b> Good</p>
                        <p><b>Short coming:</b> Yes</p>
                    </div>
                </div>
            </div>
        </div>
    </div>