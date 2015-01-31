<?php

class Admin_employee extends CI_Controller {

    /**
     * Responsable for auto load the model
     * @return void
     */
    const VIEW_FOLDER = 'admin/employee';

    public function __construct() {
        parent::__construct();
        $this->load->model('employee_model');
        $this->load->model('department_model');
        $this->load->model('company_model');
        
        $this->load->library("Img_upload", array('path' => "uploads/employee/"));
        $this->path = "uploads/employee/";
        $this->temp_path = "images/temp/";
        $this->video_path = "images/videos/";
        ini_set('post_max_size', '1000MB');
        ini_set('upload_max_filesize', '1000MB');

        if (!$this->session->userdata('is_logged_in')) {
            redirect('admin/login');
        }
    }

    /**
     * Load the main view with all the current model model's data.
     * @return void
     */
    public function index() {
        //pagination settings
        $config['per_page'] = 5;
        $config['base_url'] = base_url() . 'admin/employee';
        $config['use_page_numbers'] = TRUE;
        $config['num_links'] = 20;
        $config['full_tag_open'] = '<ul>';
        $config['full_tag_close'] = '</ul>';
        $config['num_tag_open'] = '<li>';
        $config['num_tag_close'] = '</li>';
        $config['cur_tag_open'] = '<li class="active"><a>';
        $config['cur_tag_close'] = '</a></li>';

//        //all the posts sent by the view
//        $department_id = $this->input->post('department_id');
//        $company_id = $this->input->post('company_id');
//        $search_string = $this->input->post('search_string');        
//        $order = $this->input->post('order'); 
//        $order_type = $this->input->post('order_type'); 
//
//        //pagination settings
//        $config['per_page'] = 5;
//        $config['base_url'] = base_url().'admin/employee';
//        $config['use_page_numbers'] = TRUE;
//        $config['num_links'] = 20;
//        $config['full_tag_open'] = '<ul>';
//        $config['full_tag_close'] = '</ul>';
//        $config['num_tag_open'] = '<li>';
//        $config['num_tag_close'] = '</li>';
//        $config['cur_tag_open'] = '<li class="active"><a>';
//        $config['cur_tag_close'] = '</a></li>';
//
//        //limit end
//        $page = $this->uri->segment(3);
//
//        //math to get the initial record to be select in the database
//        $limit_end = ($page * $config['per_page']) - $config['per_page'];
//        if ($limit_end < 0){
//            $limit_end = 0;
//        } 
//
//        //if order type was changed
//        if($order_type){
//            $filter_session_data['order_type'] = $order_type;
//        }
//        else{
//            //we have something stored in the session? 
//            if($this->session->userdata('order_type')){
//                $order_type = $this->session->userdata('order_type');    
//            }else{
//                //if we have nothing inside session, so it's the default "Asc"
//                $order_type = 'Asc';    
//            }
//        }
//        //make the data type var avaible to our view
//        $data['order_type_selected'] = $order_type;        
//
//
//        //we must avoid a page reload with the previous session data
//        //if any filter post was sent, then it's the first time we load the content
//        //in this case we clean the session filter data
//        //if any filter post was sent but we are in some page, we must load the session data
//
//        //filtered && || paginated
//        if($department_id !== false && $search_string !== false && $order !== false || $this->uri->segment(3) == true){ 
//           
//            /*
//            The comments here are the same for line 79 until 99
//
//            if post is not null, we store it in session data array
//            if is null, we use the session data already stored
//            we save order into the the var to load the view with the param already selected       
//            */
//
//            if($department_id !== 0){
//                $filter_session_data['department_selected'] = $department_id;
//            }else{
//                $department_id = $this->session->userdata('department_selected');
//            }
//            $data['department_selected'] = $department_id;
//
//            if($search_string){
//                $filter_session_data['search_string_selected'] = $search_string;
//            }else{
//                $search_string = $this->session->userdata('search_string_selected');
//            }
//            $data['search_string_selected'] = $search_string;
//
//            if($order){
//                $filter_session_data['order'] = $order;
//            }
//            else{
//                $order = $this->session->userdata('order');
//            }
//            $data['order'] = $order;
//
//            //save session data into the session
//            $this->session->set_userdata($filter_session_data);
//
//            //fetch department data into arrays
//            $data['department'] = $this->department_model->get_department();
//
//            $data['count_employee']= $this->employee_model->count_employee($department_id, $search_string, $order);
//            $config['total_rows'] = $data['count_employee'];
//
//            //fetch sql data into arrays
//            if($search_string){
//                if($order){
//                    $data['employee'] = $this->employee_model->get_employee($department_id, $search_string, $order, $order_type, $config['per_page'],$limit_end);        
//                }else{
//                    $data['employee'] = $this->employee_model->get_employee($department_id, $search_string, '', $order_type, $config['per_page'],$limit_end);           
//                }
//            }else{
//                if($order){
//                    $data['employee'] = $this->employee_model->get_employee($department_id, '', $order, $order_type, $config['per_page'],$limit_end);        
//                }else{
//                    $data['employee'] = $this->employee_model->get_employee($department_id, '', '', $order_type, $config['per_page'],$limit_end);        
//                }
//            }
//
//        }else{
//
//            //clean filter data inside section
//            $filter_session_data['department_selected'] = null;
//            $filter_session_data['search_string_selected'] = null;
//            $filter_session_data['order'] = null;
//            $filter_session_data['order_type'] = null;
//            $this->session->set_userdata($filter_session_data);
//
//            //pre selected options
//            $data['search_string_selected'] = '';
//            $data['department_selected'] = 0;
//            $data['order'] = 'id';
//
//            //fetch sql data into arrays
//            $data['department'] = $this->department_model->get_department();
//            $data['count_employee']= $this->employee_model->count_employee();
//            $data['employee'] = $this->employee_model->get_employee('', '', '', $order_type, $config['per_page'],$limit_end);        
//            $config['total_rows'] = $data['count_employee'];
//
//        }//!isset($department_id) && !isset($search_string) && !isset($order)
//        

//        
//        
        //initializate the panination helper 
        $this->pagination->initialize($config);

        //load the view
        $data['main_content'] = 'admin/employee/list';
        $this->load->view('includes/template', $data);
    }
    
    function view($id,$is_pdf = false){
        $data['employee']=$this->employee_model->get_employee_by_id($id);
        $data['leave']=$this->employee_model->get_leave_info($id);
        $data['dep_com']=$this->employee_model->get_employee($data['employee'][0]['department_id'],$data['employee'][0]['company_id']);
           //load the view
        if ($is_pdf) {
            $pdfFilePath = base_url() . "downloads/reports/testing.pdf";
            $data['page_title'] = 'Employee Information'; // pass data to the view
            $data['pdf_view'] = 1;

            //if (file_exists($pdfFilePath) == FALSE) {
            ini_set('memory_limit', '32M'); // boost the memory limit if it's low <img src="https://davidsimpson.me/wp-includes/images/smilies/icon_wink.gif" alt=";)" class="wp-smiley">
            $data['main_content'] = 'admin/employee/view';
            $html = $this->load->view('v_details_pdf', $data, true); // render the view into HTML

            $this->load->library('mpdf_lib');
            $this->mpdf_lib->SetFooter($_SERVER['HTTP_HOST'] . '|{PAGENO}|' . date(DATE_RFC822)); // Add a footer for good measure <img src="https://davidsimpson.me/wp-includes/images/smilies/icon_wink.gif" alt=";)" class="wp-smiley">
            $this->mpdf_lib->WriteHTML($html); // write the HTML into the PDF
            $this->mpdf_lib->Output(); // save to file because we can
            //}
        } else {
        $data['main_content'] = 'admin/employee/view';
        $this->load->view('includes/template', $data);
        }
    }

//index

    function ajax_data() {

        $aColumns = array('company_name', 'department_name', 'employee_name', 'employee_pic', 'designation', 'contact_number','last_increment_date','increment_amount','is_active','id');
        $aColumns_temp = array('id_no','company_name', 'department_name', 'employee_name', 'employee_pic', 'designation', 'contact_number', 'last_increment_date','increment_amount','is_active','action','id');

        $sIndexColumn = "id";
        $sTable = 'v_employee';

        $iDisplayStart = $this->input->get_post('iDisplayStart', true);
        $iDisplayLength = $this->input->get_post('iDisplayLength', true);
        $iSortCol_0 = $this->input->get_post('iSortCol_0', true);
        $iSortingCols = $this->input->get_post('iSortingCols', true);
        $sSearch = $this->input->get_post('sSearch', true);
        $sEcho = $this->input->get_post('sEcho', true);

        // Paging
        if (isset($iDisplayStart) && $iDisplayLength != '-1') {
            $this->db->limit($this->db->escape_str($iDisplayLength), $this->db->escape_str($iDisplayStart));
        }

        // Ordering
        if (isset($iSortCol_0)) {
            for ($i = 0; $i < intval($iSortingCols); $i++) {
                $iSortCol = $this->input->get_post('iSortCol_' . $i, true);
                $bSortable = $this->input->get_post('bSortable_' . intval($iSortCol), true);
                $sSortDir = $this->input->get_post('sSortDir_' . $i, true);

                if ($bSortable == 'true') {
                    $this->db->order_by($aColumns[intval($this->db->escape_str($iSortCol))], $this->db->escape_str($sSortDir));
                }
            }
        }

        /*
         * Filtering
         * NOTE this does not match the built-in DataTables filtering which does it
         * word by word on any field. It's possible to do here, but concerned about efficiency
         * on very large tables, and MySQL's regex functionality is very limited
         */
        $sWhere = "";
       if ($_GET['sSearch'] != "") {
            $sWhere .= "";
            for ($i = 0; $i < count($aColumns); $i++) {
                $sWhere .= $aColumns[$i] . " LIKE '%" . $_GET['sSearch'] . "%' OR ";
            }
            $sWhere = substr_replace($sWhere, "", -3);
        }
        /* Individual column filtering */
        for ($i = 0; $i < count($aColumns); $i++) {
            if (isset($_GET['bSearchable_' . $i]) && $_GET['bSearchable_' . $i] == "true" && $_GET['sSearch_' . $i] != '') {
                if ($sWhere != "") {
                    $sWhere .= " AND ";
                }
                /* else {
                  $sWhere .= " AND ";
                  } */
                $sWhere .= $aColumns[$i] . " LIKE '%" . ($_GET['sSearch_' . $i]) . "%' "; //mysql_real_escape_string($_GET['sSearch_' . $i])
            }
        }


        // Select Data
        $this->db->select('SQL_CALC_FOUND_ROWS ' . str_replace(' , ', ' ', implode(', ', $aColumns)), false);
        $rResult = $this->employee_model->get_row_in_array_datatable($sTable, $sWhere);

        // Data set length after filtering
        $this->db->select('FOUND_ROWS() AS found_rows');
        $iFilteredTotal = $this->db->get()->row()->found_rows;

        // Total data set length
        $iTotal = $this->db->count_all($sTable);

        // Output
        $output = array(
            'sEcho' => intval($sEcho),
            'iTotalRecords' => $iTotal,
            'iTotalDisplayRecords' => $iFilteredTotal,
            'aaData' => array()
        );
        $i=1;
        foreach ($rResult as $aRow) {
            $row = array();
            foreach ($aColumns_temp as $col) {
                if ($col == "id_no") {
                    /* Special output formatting for 'id' */
                    $row[] = $i;
                    $i++;
                    continue;
                }
                
                if ($col == "employee_pic") {
                    /* Special output formatting for 'id' */
                    $row[] = "

                            
<table>
			<tr>
			
			<td>
                            <img src='".site_url()."uploads/employee/" . $aRow['employee_pic'] . "' style='height:50px; width:50px;' />
			</td>
			</tr>
			</table>

			";
                    continue;
                }
                
                
                if ($col == "action") {
                    /* Special output formatting for 'id' */
                    $row[] = "

                            
<table>
			<tr>
			
			<td>
			<a href='".site_url("admin")."/employee/view/" . $aRow['id'] . "' title='Get Information'><img  width='20' height='20' src='".site_url()."/images/show-menu.png'> </a> <a href='" . site_url("admin")."/employee/update/" . $aRow['id'] . "' title='Edit Employee'><img  width='20' height='20' src='".site_url()."images/edit.jpg'> </a>    
			</td>
			</tr>
			</table>

			";
                    continue;
                }
                $row[] = $aRow[$col];
                $row['DT_RowId'] = $aRow['id'];
            }
            $output['aaData'][] = $row;
        }
        echo json_encode($output);
    }
    
    public function add() {
        //if save button was clicked, get the data sent via post
        if ($this->input->server('REQUEST_METHOD') === 'POST') {
            //form validation
             $this->form_validation->set_rules('company_id', 'Company', 'required');
             $this->form_validation->set_rules('department_id', 'Department', 'required');
             $this->form_validation->set_rules('employee_name', 'Employee Name', 'required');

            // $this->form_validation->set_rules('designation', 'designation', 'required');
            // $this->form_validation->set_rules('qualification', 'qualification', 'required');
            // $this->form_validation->set_rules('joining_date', 'joining_date', 'required');
            // $this->form_validation->set_rules('confirmation_date', 'confirmation_date', 'required');
            // $this->form_validation->set_rules('place_of_work', 'place_of_work', 'required');
            // $this->form_validation->set_rules('present_salary', 'present_salary', 'required');
            // $this->form_validation->set_rules('last_increment_date', 'last_increment_date', 'required');
            // $this->form_validation->set_rules('permanent_address', 'permanent_address', 'required');
            // $this->form_validation->set_rules('present_address', 'present_address', 'required');
            // $this->form_validation->set_rules('contact_number', 'contact_number', 'required|numeric');
            // $this->form_validation->set_rules('voter_id', 'voter_id', 'required|numeric');
            // $this->form_validation->set_rules('bond_given', 'bond_given', 'required');
            // $this->form_validation->set_rules('guarantor', 'guarantor', 'required');
            // $this->form_validation->set_rules('relation_guarantor', 'relation_guarantor', 'required');
            // $this->form_validation->set_rules('mobile_guarantor', 'mobile_guarantor', 'required|numeric');
            // $this->form_validation->set_rules('contact_spouse', 'contact_spouse', 'numeric');
            // $this->form_validation->set_rules('children', 'children', 'numeric');
            // $this->form_validation->set_rules('father_contact', 'father_contact', 'numeric');
            $this->form_validation->set_error_delimiters('<div class="alert alert-error"><a class="close" data-dismiss="alert">×</a><strong>', '</strong></div>');

            //if the form has passed through the validation
            if ($this->form_validation->run()) {
                $config['upload_path'] = 'uploads/employee/';
                $config['allowed_types'] = 'gif|jpg|png';
                $config['max_size'] = '100';
                $config['max_width'] = '1024';
                $config['max_height'] = '768';
                $this->load->library('upload', $config);
                $data_to_store = array(
                    'company_id' => $this->input->post('company_id'),
                    'department_id' => $this->input->post('department_id'),
                    'employee_pic' => $_FILES['employee_pic']['name'],
                    'id_no' => $this->input->post('id_no'),
                    'employee_name' => $this->input->post('employee_name'),
                    'father_name' => $this->input->post('father_name') ? $this->input->post('father_name') : '',
                    'father_contact' => $this->input->post('father_contact') ? $this->input->post('father_contact') : 0,
                    'mother_name' => $this->input->post('mother_name'),
                    'contact_number' => $this->input->post('contact_number'),
                    'email' => $this->input->post('email'),
                    'd_o_b' => $this->input->post('d_o_b'),
                    'present_age' => $this->input->post('present_age'),
                    'blood_group' => $this->input->post('blood_group'),
                    'voter_id' => $this->input->post('voter_id'),
                    'permanent_address' => $this->input->post('permanent_address'),
                    'present_address' => $this->input->post('present_address'),
                    'qualification' => $this->input->post('qualification'),
                    'designation' => $this->input->post('designation'),
                    'joining_date' => $this->input->post('joining_date'),
                    'confirmation_date' => $this->input->post('confirmation_date'),
                    'place_of_work' => $this->input->post('place_of_work'),
                    'guarantor' => $this->input->post('guarantor'),
                    'show_cause' => $this->input->post('show_cause'),
                    'penalty' => $this->input->post('penalty'),
                    'consolidate_salary' => $this->input->post('consolidate_salary'),
                    'basic' => $this->input->post('basic'),
                    'dearness_allow' => $this->input->post('dearness_allow'),
                    'house_rent' => $this->input->post('house_rent'),
                    'special_allow' => $this->input->post('special_allow'),
                    'mobile_allow' => $this->input->post('mobile_allow'),
                    'heavy_duty' => $this->input->post('heavy_duty'),
                    'washing_allow' => $this->input->post('washing_allow'),
                    'conveyance_allow' => $this->input->post('conveyance_allow'),
                    'misc' => $this->input->post('misc'),
                    'total' => $this->input->post('total'),
                    'appointment_as' => $this->input->post('appointment_as'),
                    'target_given' => $this->input->post('target_given'),
                    'target_achieved' => $this->input->post('target_achieved'),
                    'liability_recovery' => $this->input->post('liability_recovery'),
                    'is_laptop' => $this->input->post('is_laptop'),
                    'is_car' => $this->input->post('is_car'),
                    'is_mc' => $this->input->post('is_mc'),
                    'is_fuel' => $this->input->post('is_fuel'),
                    'punctuality' => $this->input->post('punctuality'),
                    'job_knowledge' => $this->input->post('job_knowledge'),
                    'initiative' => $this->input->post('initiative'),
                    'short_coming' => $this->input->post('short_coming'),
                    'is_active' => $this->input->post('is_active'),
                );
                //if the insert has returned true then we show the flash message
                if (is_uploaded_file($_FILES['employee_pic']['tmp_name'])) {
                    $this->img_upload->do_upload('employee_pic');
                    //if($data)		
                    $errors = $this->img_upload->display_errors();
                    if (!empty($errors)) {
                        redirect_with_msg("user/user_edit", $errors);
                    }
                    $image_info = $this->img_upload->data();
                    $employee_pic_new = $image_info ['file_name'];
                    $data_to_store['employee_pic'] = $employee_pic_new;
                }

                    $employee_id=$this->employee_model->store_employee($data_to_store);
                if ($employee_id) {
                    $leave=array(
                        'employee_id'=>$employee_id,
                        'casual_max'=> $this->input->post('casual_max') ?$this->input->post('casual_max'):0,
                        'casual_taken'=> $this->input->post('casual_taken')?$this->input->post('casual_taken'):0,
                        'casual_balance'=> $this->input->post('casual_balance')?$this->input->post('casual_balance'):0,
                        'privileged_max'=> $this->input->post('privileged_max')?$this->input->post('privileged_max'):0,
                        'privileged_taken'=> $this->input->post('privileged_taken')?$this->input->post('privileged_taken'):0,
                        'privileged_balance'=> $this->input->post('privileged_balance')?$this->input->post('privileged_balance'):0,
                        'sick_max'=> $this->input->post('sick_max')? $this->input->post('sick_max') :0,
                        'sick_taken'=> $this->input->post('sick_taken')?$this->input->post('sick_taken'):0,
                        'sick_balance'=> $this->input->post('sick_balance')?$this->input->post('sick_balance'):0,
                    );
                    $this->employee_model->store_leave($leave);
                    $data['flash_message'] = TRUE;
                } else {
                    $data['flash_message'] = FALSE;
                }
            }
        }
        //fetch department data to populate the select field
        $data['department'] = $this->department_model->get_department();
        $data['company'] = $this->company_model->get_company();
        //load the view
        $data['main_content'] = 'admin/employee/add';
        $this->load->view('includes/template', $data);
    }

    /**
     * Update item by his id
     * @return void
     */
    public function update($id) {
        //employee id 
        //$id = $this->uri->segment(4);
        //$id="5";
        //$employee_id=$this->employee_model->get_employee_by_id($id);

        //if save button was clicked, get the data sent via post
//        if ($this->input->server('REQUEST_METHOD') === 'POST') {
//            //form validation
//            $this->form_validation->set_rules('company_id', 'company_id', 'required');
//            $this->form_validation->set_rules('department_id', 'department_id', 'required');
//            $this->form_validation->set_rules('description', 'description', 'required');
//            $this->form_validation->set_rules('stock', 'stock', 'required|numeric');
//            $this->form_validation->set_rules('cost_price', 'cost_price', 'required|numeric');
//            $this->form_validation->set_rules('sell_price', 'sell_price', 'required|numeric');
//            $this->form_validation->set_error_delimiters('<div class="alert alert-error"><a class="close" data-dismiss="alert">×</a><strong>', '</strong></div>');
//            //if the form has passed through the validation
//            if ($this->form_validation->run()) {
//
//                $data_to_store = array(
//                    'company_id' => $this->input->post('company_id'),
//                    'department_id' => $this->input->post('department_id'),
//                    'description' => $this->input->post('description'),
//                    'stock' => $this->input->post('stock'),
//                    'cost_price' => $this->input->post('cost_price'),
//                    'sell_price' => $this->input->post('sell_price')
//                );
//                //if the insert has returned true then we show the flash message
//                if ($this->employee_model->update_employee($id, $data_to_store) == TRUE) {
//                    $this->session->set_flashdata('flash_message', 'updated');
//                } else {
//                    $this->session->set_flashdata('flash_message', 'not_updated');
//                }
//                redirect('admin/employee/update/' . $id . '');
//            }//validation run
//        }

        //if we are updating, and the data did not pass trough the validation
        //the code below wel reload the current data
        //employee data
        //fetch department data to populate the select field
        $data['data'] = $this->employee_model->get_employee_by_id($id);
        $data['leave'] = $this->employee_model->get_leave_info($id);
        $data['department'] = $this->department_model->get_department();
        $data['company'] = $this->company_model->get_company();
        //load the view
        $data['main_content'] = 'admin/employee/edit';
        $this->load->view('includes/template', $data);
    }
    public function editAction(){
        if ($this->input->server('REQUEST_METHOD') === 'POST') {
            //form validation
            // $this->form_validation->set_rules('company_id', 'company_id', 'required');
            // $this->form_validation->set_rules('department_id', 'department_id', 'required');
            // $this->form_validation->set_rules('id_no', 'id_no', 'required');
            $this->form_validation->set_rules('employee_name', 'employee_name', 'required');
            // $this->form_validation->set_rules('designation', 'designation', 'required');
            // $this->form_validation->set_rules('qualification', 'qualification', 'required');
            // $this->form_validation->set_rules('joining_date', 'joining_date', 'required');
            // $this->form_validation->set_rules('confirmation_date', 'confirmation_date', 'required');
            // $this->form_validation->set_rules('place_of_work', 'place_of_work', 'required');
            // $this->form_validation->set_rules('present_salary', 'present_salary', 'required');
            // $this->form_validation->set_rules('last_increment_date', 'last_increment_date', 'required');
            // $this->form_validation->set_rules('permanent_address', 'permanent_address', 'required');
            // $this->form_validation->set_rules('present_address', 'present_address', 'required');
            // $this->form_validation->set_rules('contact_number', 'contact_number', 'required|numeric');
            // $this->form_validation->set_rules('voter_id', 'voter_id', 'required|numeric');
            // $this->form_validation->set_rules('bond_given', 'bond_given', 'required');
            // $this->form_validation->set_rules('guarantor', 'guarantor', 'required');
            // $this->form_validation->set_rules('relation_guarantor', 'relation_guarantor', 'required');
            // $this->form_validation->set_rules('mobile_guarantor', 'mobile_guarantor', 'required|numeric');
            // $this->form_validation->set_rules('contact_spouse', 'contact_spouse', 'numeric');
            // $this->form_validation->set_rules('children', 'children', 'numeric');
            // $this->form_validation->set_rules('father_contact', 'father_contact', 'numeric');
            $this->form_validation->set_error_delimiters('<div class="alert alert-error"><a class="close" data-dismiss="alert">×</a><strong>', '</strong></div>');

            //if the form has passed through the validation
            if ($this->form_validation->run()) {
                $config['upload_path'] = 'uploads/employee/';
                $config['allowed_types'] = 'gif|jpg|png';
                $config['max_size'] = '100';
                $config['max_width'] = '1024';
                $config['max_height'] = '768';
                $this->load->library('upload', $config);
                $employee_pic=$this->input->post('employee_pic');
                //$this->load->library('Img_upload');
                $data_to_store = array(
                    'company_id' => $this->input->post('company_id'),
                    'department_id' => $this->input->post('department_id'),
                    'employee_pic' => $this->input->post('employee_pic'),
                    'id_no' => $this->input->post('id_no'),
                    'employee_name' => $this->input->post('employee_name'),
                    'father_name' => $this->input->post('father_name')?$this->input->post('father_name'):'',
                    'father_contact' => $this->input->post('father_contact')?$this->input->post('father_contact'):0,
                    'mother_name' => $this->input->post('mother_name'),
                    'contact_number' => $this->input->post('contact_number'),
                    'email' => $this->input->post('email'),
                    'd_o_b' => $this->input->post('d_o_b'),
                    'present_age' => $this->input->post('present_age'),
                    'blood_group' => $this->input->post('blood_group'),
                    'voter_id' => $this->input->post('voter_id'),
                    'permanent_address' => $this->input->post('permanent_address'),
                    'present_address' => $this->input->post('present_address'),
                    'qualification' => $this->input->post('qualification'),
                    'designation' => $this->input->post('designation'),
                    'joining_date' => $this->input->post('joining_date'),
                    'confirmation_date' => $this->input->post('confirmation_date'),
                    'place_of_work' => $this->input->post('place_of_work'),
                    'guarantor' => $this->input->post('guarantor'),
                    'show_cause' => $this->input->post('show_cause'),
                    'penalty' => $this->input->post('penalty'),
                    'consolidate_salary' => $this->input->post('consolidate_salary'),
                    'basic' => $this->input->post('basic'),
                    'dearness_allow' => $this->input->post('dearness_allow'),
                    'house_rent' => $this->input->post('house_rent'),
                    'special_allow' => $this->input->post('special_allow'),
                    'mobile_allow' => $this->input->post('mobile_allow'),
                    'heavy_duty' => $this->input->post('heavy_duty'),
                    'washing_allow' => $this->input->post('washing_allow'),
                    'conveyance_allow' => $this->input->post('conveyance_allow'),
                    'misc' => $this->input->post('misc'),
                    'total' => $this->input->post('total'),
                    'increment_amount' => $this->input->post('increment_amount'),
                    'last_increment_date' => $this->input->post('last_increment_date'),
                    'appointment_as' => $this->input->post('appointment_as'),
                    'target_given' => $this->input->post('target_given'),
                    'target_achieved' => $this->input->post('target_achieved'),
                    'liability_recovery' => $this->input->post('liability_recovery'),
                    'is_laptop' => $this->input->post('is_laptop'),
                    'is_car' => $this->input->post('is_car'),
                    'is_mc' => $this->input->post('is_mc'),
                    'is_fuel' => $this->input->post('is_fuel'),
                    'punctuality' => $this->input->post('punctuality'),
                    'job_knowledge' => $this->input->post('job_knowledge'),
                    'initiative' => $this->input->post('initiative'),
                    'short_coming' => $this->input->post('short_coming'),
                    'is_active' => $this->input->post('is_active'),
                );
                
                if (is_uploaded_file($_FILES['employee_pic']['tmp_name'])) {
            $this->img_upload->do_upload('employee_pic');
            //if($data)		
            $errors = $this->img_upload->display_errors();
            if (!empty($errors)) {
               redirect_with_msg("user/user_edit", $errors);
            }
            $image_info = $this->img_upload->data();
            $employee_pic_new = $image_info ['file_name'];
           $data_to_store=array(
               'employee_pic'=>$employee_pic_new
           );
        }
                //if the insert has returned true then we show the flash message
                //if ($this->upload->do_upload('employee_pic')) {
                    if ($this->employee_model->update_employee($this->input->post('employee_id'),$data_to_store)) {
                        if(is_uploaded_file($_FILES['employee_pic']['tmp_name'])){
                        if (is_file("uploads/employee/" . $employee_pic)) {
                unlink("uploads/employee/" . $employee_pic);
               }
                //redirect_with_msg('user/user_edit', 'Profile picture updated successfully');
                        
                    }
                    $leave=array(
                        'casual_max'=> $this->input->post('casual_max') ?$this->input->post('casual_max'):0,
                        'casual_taken'=> $this->input->post('casual_taken')?$this->input->post('casual_taken'):0,
                        'casual_balance'=> $this->input->post('casual_balance')?$this->input->post('casual_balance'):0,
                        'privileged_max'=> $this->input->post('privileged_max')?$this->input->post('privileged_max'):0,
                        'privileged_taken'=> $this->input->post('privileged_taken')?$this->input->post('privileged_taken'):0,
                        'privileged_balance'=> $this->input->post('privileged_balance')?$this->input->post('privileged_balance'):0,
                        'sick_max'=> $this->input->post('sick_max')? $this->input->post('sick_max') :0,
                        'sick_taken'=> $this->input->post('sick_taken')?$this->input->post('sick_taken'):0,
                        'sick_balance'=> $this->input->post('sick_balance')?$this->input->post('sick_balance'):0,
                    );
                    $this->employee_model->update_leave($this->input->post('employee_id'),$leave);
                    $data['flash_message'] = TRUE;
                    }else {
                        $data['flash_message'] = FALSE;
                    }
//                } else {
//                    $data['flash_message'] = FALSE;
//                }
            }
        }
        $id=$this->input->post('employee_id');
        //$data['main_content'] = site_url().'admin/employee/update/'.$id;
        //$this->load->view('includes/template', $data);
        //$this->session->set_userdata('success','success');
        redirect(site_url().'admin/employee/update/'.$id);
    }
    
    function get_change_value($id){
        $data = $this->department_model->get_department_by_company_id($id);
        echo json_encode($data);
       }
        

//update

    /**
     * Delete employee by his id
     * @return void
     */
    public function delete() {
        //employee id 
        $id = $this->uri->segment(4);
        $this->employee_model->delete_employee($id);
        //redirect('admin/employee');
        echo 'success';
    }

//edit
}
