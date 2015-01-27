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
            echo '<strong>Well done!</strong> company updated with success.';
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

    echo form_open_multipart('admin/company/update/' . $this->uri->segment(4) . '', $attributes);
    ?>
    <fieldset>
        <div class="control-group">
            <label for="inputError" class="control-label">Description</label>
            <div class="controls">
                <input type="text" id="" name="name" value="<?php echo $company[0]['name']; ?>" >
                <!--<span class="help-inline">Woohoo!</span>-->
            </div>
        </div>
        <div class="control-group">
            <img src="<?php echo site_url(); ?>uploads/company/<?php echo $company[0]['company_logo'] ?>">
            <label for="inputError" class="control-label">Upload Logo</label>
            <div class="controls">
                <input type="hidden" name="old_file" value="<?php echo $company[0]['company_logo'] ?>"/>
                <input type="file" id="" name="company_logo" >
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
