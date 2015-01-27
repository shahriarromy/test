<?php

class Admin_company extends CI_Controller {

    /**
     * name of the folder responsible for the views 
     * which are manipulated by this controller
     * @constant string
     */
    const VIEW_FOLDER = 'admin/company';

    /**
     * Responsable for auto load the model
     * @return void
     */
    public function __construct() {
        parent::__construct();
        $this->load->model('company_model');

        if (!$this->session->userdata('is_logged_in')) {
            redirect('admin/login');
        }
        $this->load->helper('form');
    }

    /**
     * Load the main view with all the current model model's data.
     * @return void
     */
    public function index() {

        //all the posts sent by the view
        $search_string = $this->input->post('search_string');
        $order = $this->input->post('order');
        $order_type = $this->input->post('order_type');
        //pagination settings
        $config['per_page'] = 20;

        $config['base_url'] = base_url() . 'admin/company';
        $config['use_page_numbers'] = TRUE;
        $config['num_links'] = 20;
        $config['full_tag_open'] = '<ul>';
        $config['full_tag_close'] = '</ul>';
        $config['num_tag_open'] = '<li>';
        $config['num_tag_close'] = '</li>';
        $config['cur_tag_open'] = '<li class="active"><a>';
        $config['cur_tag_close'] = '</a></li>';

        //limit end
        $page = $this->uri->segment(3);

        //math to get the initial record to be select in the database
        $limit_end = ($page * $config['per_page']) - $config['per_page'];
        if ($limit_end < 0) {
            $limit_end = 0;
        }

        //if order type was changed
        if ($order_type) {
            $filter_session_data['order_type'] = $order_type;
        } else {
            //we have something stored in the session? 
            if ($this->session->userdata('order_type')) {
                $order_type = $this->session->userdata('order_type');
            } else {
                //if we have nothing inside session, so it's the default "Asc"
                $order_type = 'Asc';
            }
        }
        //make the data type var avaible to our view
        $data['order_type_selected'] = $order_type;


        //we must avoid a page reload with the previous session data
        //if any filter post was sent, then it's the first time we load the content
        //in this case we clean the session filter data
        //if any filter post was sent but we are in some page, we must load the session data
        //filtered && || paginated
        if ($search_string !== false && $order !== false || $this->uri->segment(3) == true) {

            /*
              The comments here are the same for line 79 until 99

              if post is not null, we store it in session data array
              if is null, we use the session data already stored
              we save order into the the var to load the view with the param already selected
             */
            if ($search_string) {
                $filter_session_data['search_string_selected'] = $search_string;
            } else {
                $search_string = $this->session->userdata('search_string_selected');
            }
            $data['search_string_selected'] = $search_string;

            if ($order) {
                $filter_session_data['order'] = $order;
            } else {
                $order = $this->session->userdata('order');
            }
            $data['order'] = $order;

            //save session data into the session
            if (isset($filter_session_data)) {
                $this->session->set_userdata($filter_session_data);
            }

            //fetch sql data into arrays
            $data['count_employee'] = $this->company_model->count_company($search_string, $order);
            $config['total_rows'] = $data['count_employee'];

            //fetch sql data into arrays
            if ($search_string) {
                if ($order) {
                    $data['company'] = $this->company_model->get_company($search_string, $order, $order_type, $config['per_page'], $limit_end);
                } else {
                    $data['company'] = $this->company_model->get_company($search_string, '', $order_type, $config['per_page'], $limit_end);
                }
            } else {
                if ($order) {
                    $data['company'] = $this->company_model->get_company('', $order, $order_type, $config['per_page'], $limit_end);
                } else {
                    $data['company'] = $this->company_model->get_company('', '', $order_type, $config['per_page'], $limit_end);
                }
            }
        } else {

            //clean filter data inside section
            $filter_session_data['company_selected'] = null;
            $filter_session_data['search_string_selected'] = null;
            $filter_session_data['order'] = null;
            $filter_session_data['order_type'] = null;
            $this->session->set_userdata($filter_session_data);

            //pre selected options
            $data['search_string_selected'] = '';
            $data['order'] = 'id';

            //fetch sql data into arrays
            $data['count_employee'] = $this->company_model->count_company();
            $data['company'] = $this->company_model->get_company('', '', $order_type, $config['per_page'], $limit_end);
            $config['total_rows'] = $data['count_employee'];
        }//!isset($search_string) && !isset($order)
        //initializate the panination helper 
        $this->pagination->initialize($config);

        //load the view
        $data['main_content'] = 'admin/company/list';
        $this->load->view('includes/template', $data);
    }

//index

    public function add() {
        //if save button was clicked, get the data sent via post
        if ($this->input->server('REQUEST_METHOD') === 'POST') {

            //form validation
            $this->form_validation->set_rules('name', 'name', 'required');
            //$this->form_validation->set_rules('company_logo', 'company_logo', 'required');
            $this->form_validation->set_error_delimiters('<div class="alert alert-error"><a class="close" data-dismiss="alert">×</a><strong>', '</strong></div>');


            //if the form has passed through the validation
            if ($this->form_validation->run()) {
                $config['upload_path'] = 'uploads/company/';
                $config['allowed_types'] = 'gif|jpg|png';
                $config['max_size'] = '100';
                $config['max_width'] = '1024';
                $config['max_height'] = '768';
                $this->load->library('upload', $config);
                if ($this->upload->do_upload('company_logo')) {
                    $data_to_store = array(
                        'name' => $this->input->post('name'),
                        'company_logo' => $_FILES['company_logo']['name'],
                    );
                    if ($this->company_model->store_company($data_to_store)) {
                        $data['flash_message'] = TRUE;
                    } else {
                        $data['flash_message'] = FALSE;
                    }
                } else {
                    $data['flash_message'] = FALSE;
                }

            }
            if(!empty($_POST['com_confirm'])){
                redirect('admin/employee/add');
            }
            if(!empty($_POST['com_dep_confirm'])){
                redirect('admin/department/add');
            }
        }
        //load the view
        $data['main_content'] = 'admin/company/add';
        $this->load->view('includes/template', $data);
    }

    /**
     * Update item by his id
     * @return void
     */
    public function update() {
        //employee id 
        $id = $this->uri->segment(4);

        //if save button was clicked, get the data sent via post
        if ($this->input->server('REQUEST_METHOD') === 'POST') {
            //form validation
            $this->form_validation->set_rules('name', 'name', 'required');
            $this->form_validation->set_error_delimiters('<div class="alert alert-error"><a class="close" data-dismiss="alert">×</a><strong>', '</strong></div>');
            //if the form has passed through the validation
            if ($this->form_validation->run()) {
                $config['upload_path'] = 'uploads/';
                $config['allowed_types'] = 'gif|jpg|png';
                $config['max_size'] = '100';
                $config['max_width'] = '1024';
                $config['max_height'] = '768';
                $this->load->library('upload', $config);
                $data_to_store = array(
                    'name' => $this->input->post('name'),
                    'company_logo' => $_FILES['company_logo']['name'],
                );
               
                if ($this->upload->do_upload('company_logo')) {
                    if ($this->company_model->update_company($id, $data_to_store) == TRUE) {
                        $this->session->set_flashdata('flash_message', 'updated');
                        @unlink('uploads/'.$this->input->post('old_file'));
                    } else {
                        $this->session->set_flashdata('flash_message', 'not_updated');
                    }
                } else {
                    $this->session->set_flashdata('flash_message', 'not_updated');
                }
                redirect('admin/company/update/' . $id . '');
                //if the insert has returned true then we show the flash message
                
            }//validation run
        }

        //if we are updating, and the data did not pass trough the validation
        //the code below wel reload the current data
        //employee data 
        $data['company'] = $this->company_model->get_company_by_id($id);
        //load the view
        $data['main_content'] = 'admin/company/edit';
        $this->load->view('includes/template', $data);
    }

//update

    /**
     * Delete employee by his id
     * @return void
     */
    public function delete() {
        //employee id 
        $id = $this->uri->segment(4);
        $this->company_model->delete_company($id);
        redirect('admin/company');
    }

//edit
}
