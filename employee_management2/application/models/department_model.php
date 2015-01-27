<?php
class Department_model extends CI_Model {
 
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
    public function get_department_by_id($id)
    {
		$this->db->select('*');
		$this->db->from('department');
		$this->db->where('id', $id);
		$query = $this->db->get();
		return $query->result_array(); 
    }    
    public function get_department_by_company_id($id)
    {
		$this->db->select('*');
		$this->db->from('department');
		$this->db->where('company_id', $id);
		$query = $this->db->get();
		return $query->result_array(); 
    }  
    /**
    * Fetch department data from the database
    * possibility to mix search, filter and order
    * @param string $search_string 
    * @param strong $order
    * @param string $order_type 
    * @param int $limit_start
    * @param int $limit_end
    * @return array
    */
    public function get_department($company_id=null, $search_string=null, $order=null, $order_type='Asc', $limit_start=null, $limit_end=null)
    {
	    
		$this->db->select('department.id');
                $this->db->select('department.name');
                $this->db->select('department.company_id');
		$this->db->select('company.name as company_name');
		$this->db->from('department');
                if($company_id != null && $company_id != 0){
			$this->db->where('company_id', $company_id);
		}

		if($search_string){
			$this->db->like('department.name', $search_string);
		}
                
                $this->db->join('company', 'department.company_id = company.id', 'left');
                
		$this->db->group_by('department.id');

		if($order){
			$this->db->order_by($order, $order_type);
		}else{
		    $this->db->order_by('id', $order_type);
		}

        if($limit_start && $limit_end){
          $this->db->limit($limit_start, $limit_end);	
        }

        if($limit_start != null){
          $this->db->limit($limit_start, $limit_end);    
        }
        
		$query = $this->db->get();
		
		return $query->result_array(); 	
    }

    /**
    * Count the number of rows
    * @param int $search_string
    * @param int $order
    * @return int
    */
    function count_department($company_id=null, $search_string=null, $order=null)
    {
		$this->db->select('*');
		$this->db->from('department');
		if($search_string){
			$this->db->like('name', $search_string);
		}
                if($company_id != null && $company_id != 0){
			$this->db->where('company_id', $company_id);
		}
		if($order){
			$this->db->order_by($order, 'Asc');
		}else{
		    $this->db->order_by('department.id', 'Asc');
		}
		$query = $this->db->get();
		return $query->num_rows();        
    }

    /**
    * Store the new item into the database
    * @param array $data - associative array with data to store
    * @return boolean 
    */
    function store_department($data)
    {
		$insert = $this->db->insert('department', $data);
	    return $insert;
	}

    /**
    * Update department
    * @param array $data - associative array with data to store
    * @return boolean
    */
    function update_department($id, $data)
    {
		$this->db->where('id', $id);
		$this->db->update('department', $data);
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
    * Delete department
    * @param int $id - department id
    * @return boolean
    */
	function delete_department($id){
		$this->db->where('id', $id);
		$this->db->delete('department'); 
	}
 
}
?>	
