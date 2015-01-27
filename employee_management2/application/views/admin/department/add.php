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
    <input type="hidden" name="com_dep_confirm" value="com_dep_confirm">
<button class="btn" data-dismiss="modal" aria-hidden="true">Close</button>
<button class="btn btn-primary" type="submit">Save</button>
</div>
<?php echo form_close(); ?>
</div>

<!--company Modal End-->
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
            echo '<strong>Well done!</strong> new department created with success.';
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
    <fieldset>
        <div class="control-group">
            <label for="company_id" class="control-label">Select Company</label>
            <div class="controls">
                <?php echo form_dropdown('company_id', $options_company, set_value('company_id'), 'class="span2"'); ?>
                <button class="btn btn-primary" type="button" data-toggle="modal" data-target="#comModal">Add</button>
            </div>
        </div>
        <div class="control-group">
            <label for="inputError" class="control-label">Department Name</label>
            <div class="controls">
                <input type="text" id="" name="name" value="<?php echo set_value('name'); ?>" >
                <!--<span class="help-inline">Woohoo!</span>-->
            </div>
        </div>
        <div class="form-actions">
            <button class="btn btn-primary" type="submit">Save</button>
            <button class="btn" type="reset" onclick="history.go(-1);return true;">Cancel</button>
        </div>
    </fieldset>

    <?php echo form_close(); ?>

</div>
