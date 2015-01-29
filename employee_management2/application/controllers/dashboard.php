<?php

class dashboard extends CI_Controller {

    /**
     * Responsable for auto load the model
     * @return void
     */
    const VIEW_FOLDER = 'admin/dashboard';

    public function __construct() {
        parent::__construct();
        $this->load->model('employee_model');

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
        //initializate the panination helper 
        $this->pagination->initialize($config);

        //load the view
        $data['main_content'] = 'admin/v_dashboard';
        $data['leave'] = $this->employee_model->get_leave_info();
        $this->load->view('includes/template', $data);
    }
    
    public function editLeave(){
        if ($this->input->server('REQUEST_METHOD') === 'POST') {
            $data_to_store = array(
                    'privileges_leave' => $this->input->post('privileges_leave'),
                    'casual_leave' => $this->input->post('casual_leave'),
                    'sick_leave' => $this->input->post('sick_leave'),
                    'awol' => $this->input->post('awol'),
                );
                //if the insert has returned true then we show the flash message
                //if ($this->upload->do_upload('employee_pic')) {
                    if ($this->employee_model->update_leave($data_to_store)) {
                        $data['flash_message'] = TRUE;
                    }else {
                        $data['flash_message'] = FALSE;
                    }
//                } else {
//                    $data['flash_message'] = FALSE;
//                }
            
        }
        $data['main_content'] = 'admin/v_dashboard';
        $data['leave'] = $this->employee_model->get_leave_info();
        $this->load->view('includes/template', $data);
    }
    
    function get_change_value($id){
        $data = $this->department_model->get_department_by_company_id($id);
        echo json_encode($data);
       }
        

//update
}
