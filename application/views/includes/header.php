<!DOCTYPE html> 
<html lang="en-US">
    <head>
        <title>Employee Management</title>
        <meta charset="utf-8">
        <link href="<?php echo base_url(); ?>assets/css/admin/global.css" rel="stylesheet" type="text/css">
        <link href="<?php echo base_url(); ?>assets/css/admin/bootstrap.min.css" rel="stylesheet" type="text/css">
        <!--data table css-->
<!--        <link href="<?php echo base_url(); ?>css/jquery.dataTabl.min.css" rel="stylesheet" type="text/css">-->
        <link href="<?php echo base_url(); ?>css/jquery-ui.css" rel="stylesheet" type="text/css">
        <link href="<?php echo base_url(); ?>css/datatable_page.css" rel="stylesheet" type="text/css">
        <link href="<?php echo base_url(); ?>css/datatable_table.css" rel="stylesheet" type="text/css">
        <!--link href="<?php //echo base_url();  ?>css/jquery-ui-1.8.4.custom.css" rel="stylesheet" type="text/css"-->
        <link href="<?php echo base_url(); ?>css/demo_table_jui.css" rel="stylesheet" type="text/css">
        <link href="<?php echo base_url(); ?>css/dataTables.tableTools.css" rel="stylesheet" type="text/css">
        <!--data table js-->
        <script src="<?php echo base_url(); ?>js/jquery-1.7.1.min.js" type="text/javascript"></script>
        <script src="<?php echo base_url(); ?>js/jquery.dataTables.min.js" type="text/javascript"></script>
        <script src="<?php echo base_url(); ?>js/jquery.dataTable.editable.js" type="text/javascript"></script>
        <script src="<?php echo base_url(); ?>js/jquery.dataTables.delay.min.js" type="text/javascript"></script>
        <script src="<?php echo base_url(); ?>js/jquery.jeditable.js" type="text/javascript"></script>
        <script src="<?php echo base_url(); ?>js/jquery-ui.js" type="text/javascript"></script>
       <script src="<?php echo base_url(); ?>js/jquery.dataTables.columnFilter.js" type="text/javascript"></script>>
        <script src="<?php echo base_url(); ?>js/TableTools.js" type="text/javascript"></script>
<!--        <script src="<?php echo base_url(); ?>js/dataTables.tableTools.js" type="text/javascript"></script>-->
        <script src="<?php echo base_url(); ?>js/ZeroClipboard.js" type="text/javascript"></script>


<script type="text/javascript">
        var site_url = "http://localhost/employee_management2/";

    </script>

    </head>
<body>
	<div class="navbar navbar-fixed-top">
	  <div class="navbar-inner">
	    <div class="container">
	      <ul class="nav pull-left">
                  <li <?php if($this->uri->segment(2) == 'dashboard'){echo 'class="active"';}?>>
	          <a href="<?php echo base_url(); ?>admin/dashboard">Dashboard</a>
	        </li>
	        <li <?php if($this->uri->segment(2) == 'employee'){echo 'class="active"';}?>>
	          <a href="<?php echo base_url(); ?>admin/employee">Employee</a>
	        </li>
	        <li <?php if($this->uri->segment(2) == 'department'){echo 'class="active"';}?>>
	          <a href="<?php echo base_url(); ?>admin/department">Department</a>
	        </li>
                <li <?php if($this->uri->segment(2) == 'company'){echo 'class="active"';}?>>
	          <a href="<?php echo base_url(); ?>admin/company">Company</a>
	        </li>
	        <!--li class="dropdown">
	          <a href="#" class="dropdown-toggle" data-toggle="dropdown">System <b class="caret"></b></a>
	          <ul class="dropdown-menu">
	            <li>
	              
	            </li>
	          </ul>
	        </li-->
	      </ul>
                <ul class="nav pull-right">
                    <li class="pull-right" style="float: right !important;">
                        <a style="color: red;" href="<?php echo base_url(); ?>admin/logout">Logout</a>
                    </li>
                </ul>
                
	    </div>
	  </div>
	</div>	
