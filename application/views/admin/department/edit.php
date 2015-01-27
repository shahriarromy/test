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
            <a href="#">Update</a>
        </li>
    </ul>

    <div class="page-header">
        <h2>
            Updating <?php echo ucfirst($this->uri->segment(2)); ?>
        </h2>
    </div>


    <?php
    //flash messages
    if ($this->session->flashdata('flash_message')) {
        if ($this->session->flashdata('flash_message') == 'updated') {
            echo '<div class="alert alert-success">';
            echo '<a class="close" data-dismiss="alert">×</a>';
            echo '<strong>Well done!</strong> department updated with success.';
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
    foreach ($company as $val) {
        $options_company[$val['id']] = $val['name'];
    }
    //form validation
    echo validation_errors();

    echo form_open('admin/department/update/' . $this->uri->segment(4) . '', $attributes);
    ?>
    <fieldset>
        <div class="control-group">
            <label for="company_id" class="control-label">Company</label>
            <div class="controls">
                <?php //echo form_dropdown('department_id', $options_department, '', 'class="span2"');
              
                    echo form_dropdown('company_id', $options_company, $department[0]['company_id'], 'class="span2"');
                 //echo form_dropdown('company_id', $options_company, set_value('company_id'), 'class="span2"'); ?>

            </div>
        </div>
        <div class="control-group">
            <label for="inputError" class="control-label">Description</label>
            <div class="controls">
                <input type="text" id="" name="name" value="<?php echo $department[0]['name']; ?>" >
                <!--<span class="help-inline">Woohoo!</span>-->
            </div>
        </div>
        <div class="form-actions">
            <button class="btn btn-primary" type="submit">Save</button>
            <button class="btn" type="reset" onclick="history.go(-1);
                    return true;">Cancel</button>
        </div>
    </fieldset>

    <?php echo form_close(); ?>

</div>
