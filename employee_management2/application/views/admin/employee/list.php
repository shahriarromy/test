<script type="text/javascript">
    $(document).ready(function () {
        $('#employee_list').dataTable({
            "bJQueryUI": true,
            "bProcessing": true,
            "bServerSide": true,
            "sServerMethod": "GET",
            "sAjaxSource": "employee/ajax_data",
            "iDisplayLength": 10,
            "aLengthMenu": [[10, 25, 50, -1], [10, 25, 50, "All"]],
            "aaSorting": [[0, 'asc']],
            "sPaginationType": "full_numbers",
            "aoColumns": [
                {"bVisible": true, "bSearchable": true, "bSortable": true},
                {"bVisible": true, "bSearchable": true, "bSortable": true},
                {"bVisible": true, "bSearchable": true, "bSortable": true},
                {"bVisible": true, "bSearchable": true, "bSortable": true},
                {"bVisible": true, "bSearchable": true, "bSortable": true},
                {"bVisible": true, "bSearchable": true, "bSortable": true},
                {"bVisible": true, "bSearchable": true, "bSortable": true},
                {"bVisible": true, "bSearchable": true, "bSortable": true},
                {"bVisible": true, "bSearchable": true, "bSortable": true},
                {"bVisible": true, "bSearchable": true, "bSortable": false}
                


            ]
        }).columnFilter();
    });
    
    function delete_employee(item_id){
        if(!confirm("Sure to delete??")){
            return false;
        }
        url = "employee/delete/"+item_id;
        postData = {"id":item_id}
        $.post(url,postData,
        function(data){
            alert('Success');
            window.location.href = "employee";
        }
        ,"text"
        );
    }
</script>

<div class="container top">

    <ul class="breadcrumb">
        <li>
            <a href="<?php echo site_url("admin"); ?>">
                <?php echo ucfirst($this->uri->segment(1)); ?>
            </a> 
            <span class="divider">/</span>
        </li>
        <li class="active">
            <?php echo ucfirst($this->uri->segment(2)); ?>
        </li>
    </ul>

    <div class="page-header users-header">
        <h2>
            <?php echo ucfirst($this->uri->segment(2)); ?> 
            <a  href="<?php echo site_url("admin") . '/' . $this->uri->segment(2); ?>/add" class="btn btn-success">Add new Employee</a>
        </h2>
    </div>

    <div class="row">
        <div class="span12 columns">
            <!--          <div class="well">
                       
            <?php
//            $attributes = array('class' => 'form-inline reset-margin', 'id' => 'myform');
//           
//            $options_department = array(0 => "all");
//            foreach ($department as $row)
//            {
//              $options_department[$row['id']] = $row['name'];
//            }
//            //save the columns names in a array that we will use as filter         
//            $options_employee = array();    
//            foreach ($employee as $array) {
//              foreach ($array as $key => $value) {
//                $options_employee[$key] = $key;
//              }
//              break;
//            }
//
//            echo form_open('admin/employee', $attributes);
//     
//              echo form_label('Search:', 'search_string');
//              echo form_input('search_string', $search_string_selected, 'style="width: 170px;height: 26px;"');
//
//              echo form_label('Filter by department:', 'department_id');
//              echo form_dropdown('department_id', $options_department, $department_selected, 'class="span2"');
//
//              echo form_label('Order by:', 'order');
//              echo form_dropdown('order', $options_employee, $order, 'class="span2"');
//
//              $data_submit = array('name' => 'mysubmit', 'class' => 'btn btn-primary', 'value' => 'Go');
//
//              $options_order_type = array('Asc' => 'Asc', 'Desc' => 'Desc');
//              echo form_dropdown('order_type', $options_order_type, $order_type_selected, 'class="span1"');
//
//              echo form_submit($data_submit);
//
//            echo form_close();
            ?>
            
                      </div>-->
<div id="content-table-inner clearfix">

    <div id="table-content">
            <table border="0" width="100%" cellpadding="0" cellspacing="0" id="employee_list">
                <thead>
                    <tr>
                        <th>ID#</th>
                        <th>Company</th>
                        <th>Department</th>
                        <th>Name</th>
                        <th>Picture</th>
                        <th>Designation</th>
                        <th>Contact Number</th>
                        <th>Last Increment</th>
                        <th>Increment Amount</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <!--              <?php
//              foreach($employee as $row)
//              {
//                echo '<tr>';
//                echo '<td>'.$row['id'].'</td>';
//                echo '<td>'.$row['description'].'</td>';
//                echo '<td>'.$row['stock'].'</td>';
//                echo '<td>'.$row['cost_price'].'</td>';
//                echo '<td>'.$row['sell_price'].'</td>';
//                echo '<td>'.$row['department_name'].'</td>';
//                echo '<td class="crud-actions">
//                  <a href="'.site_url("admin").'/employee/update/'.$row['id'].'" class="btn btn-info">view & edit</a>  
//                  <a href="'.site_url("admin").'/employee/delete/'.$row['id'].'" class="btn btn-danger">delete</a>
//                </td>';
//                echo '</tr>';
//              }
            ?>      -->
                </tbody>
                <tfoot>
                <tr>
                    <th width="10%">ID</th>
                    <th width="10%">Company</th>
                        <th width="10%">Department</th>
                        <th width="10%">Name</th>
                        <th width="10%">Picture</th>
                        <th width="10%">Designation</th>
                        <th width="10%">Contact Number</th> 
                        <th>Last Increment</th>
                        <th>Increment Amount</th>
                        <th width="15%"></th>
                    
                </tr>
            </tfoot>
            </table>
            </div>
        </div>

<?php //echo '<div class="pagination">'.$this->pagination->create_links().'</div>';  ?>

        </div>
    </div>