<?php
class Employee_model extends CI_Model {
 
    /**
    * Responsable for auto load the database
    * @return void
    */
    public function __construct()
    {
        $this->load->database();
    }

    /**
    * Get employee by his is
    * @param int $employee_id 
    * @return array
    */
    public function get_employee_by_id($id)
    {
		$this->db->select('*');
		$this->db->from('employee');
		$this->db->where('id', $id);
		$query = $this->db->get();
		return $query->result_array(); 
    }
    public function get_leave_info($id)
    {
		$this->db->select('*');
		$this->db->from('leave');
                $this->db->where('id', $id);
		//$this->db->where('id', $id);
		$query = $this->db->get();
		return $query->result_array(); 
    }

    /**
    * Fetch employee data from the database
    * possibility to mix search, filter and order
    * @param int $department_id 
    * @param string $search_string 
    * @param strong $order
    * @param string $order_type 
    * @param int $limit_start
    * @param int $limit_end
    * @return array
    */
    public function get_employee($department_id=null, $company_id=null)
    {
	    
		$this->db->select('employee.id');
		$this->db->select('employee.department_id');
		$this->db->select('employee.company_id');
		$this->db->select('department.name as department_name');
		$this->db->select('company.name as company_name');
		$this->db->from('employee');
		if($department_id != null && $department_id != 0){
			$this->db->where('department.id', $department_id);
		}
                if($company_id != null && $company_id != 0){
			$this->db->where('company.id', $company_id);
		}
//		if($search_string){
//			$this->db->like('description', $search_string);
//		}

		$this->db->join('department', 'employee.department_id = department.id', 'left');

		//$this->db->group_by('employee.id');
                
                $this->db->join('company', 'employee.company_id = company.id', 'left');

		//$this->db->group_by('employee.id');

//		if($order){
//			$this->db->order_by($order, $order_type);
//		}else{
//		    $this->db->order_by('id', $order_type);
//		}
//
//
//		$this->db->limit($limit_start, $limit_end);
		//$this->db->limit('4', '4');


		$query = $this->db->get();
		
		return $query->result_array(); 	
    }

    /**
    * Count the number of rows
    * @param int $department_id
    * @param int $search_string
    * @param int $order
    * @return int
    */
    function count_employee($department_id=null, $search_string=null, $order=null)
    {
		$this->db->select('*');
		$this->db->from('employee');
		if($department_id != null && $department_id != 0){
			$this->db->where('department_id', $department_id);
		}
		if($search_string){
			$this->db->like('description', $search_string);
		}
		if($order){
			$this->db->order_by($order, 'Asc');
		}else{
		    $this->db->order_by('id', 'Asc');
		}
		$query = $this->db->get();
		return $query->num_rows();        
    }

    /**
    * Store the new item into the database
    * @param array $data - associative array with data to store
    * @return boolean 
    */
    function store_employee($data)
    {
		$insert = $this->db->insert('employee', $data);
	    return $insert;
	}

    /**
    * Update employee
    * @param array $data - associative array with data to store
    * @return boolean
    */
    function update_employee($id, $data)
    {
		$this->db->where('id', $id);
		$this->db->update('employee', $data);
		$report = array();
		$report['error'] = $this->db->_error_number();
		$report['message'] = $this->db->_error_message();
		if($report !== 0){
			return true;
		}else{
			return false;
		}
	}
            function store_leave($data)
    {
		$insert = $this->db->insert('leave', $data);
	    return $insert;
	}
        
            function update_leave($id,$data)
    {
		$this->db->where('id', $id);
		$this->db->update('leave', $data);
		$report = array();
		$report['error'] = $this->db->_error_number();
		$report['message'] = $this->db->_error_message();
		if($report !== 0){
			return true;
		}else{
			return false;
		}
	}

    /**
    * Delete employee
    * @param int $id - employee id
    * @return boolean
    */
	function delete_employee($id){
		$this->db->where('id', $id);
		$this->db->delete('employee');
               return $this->db->affected_rows();
	}
        
        
        function get_row_in_array_datatable($table_name, $where_param) {
        if ($where_param != "") {
            $this->db->where('(' . $where_param . ')');
        }
        $result = $this->db->get($table_name);
        return $result->result_array();
    }
    function get_row($table_name, $where_param, $select_param, $group = "", $limit = "") {
        $this->db->select($select_param);
        $this->db->where($where_param);
        $this->db->group_by($group);
        if (!empty($limit))
            $this->db->limit($limit);
        $result = $this->db->get($table_name);
        return $result->result();
    }
 
}
?>	
