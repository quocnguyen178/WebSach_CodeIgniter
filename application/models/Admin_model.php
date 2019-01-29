<?php
Class Admin_model extends CI_Model{

	protected $table = 'khachhang';
	protected $table_admin = 'admin';
	public function insert($data){
		$this->db->insert($this->table,$data);
	}

	public function check_exists($username, $password){
		$this-> db-> where('taikhoan', $username);
		$this-> db-> where('matkhau', $password);
		$query = $this-> db-> get($this-> table_admin);
		if( $query->num_rows() > 0 ){
			return true;
		}else{
			return false;
		}
	}
	function get_info_rule($where = array(), $field= '')
	{
	    if($field)
	    {
	        $this->db->select($field);
	    }
		$this->db->where($where);
		$query = $this->db->get($this-> table_admin);
		if ($query->num_rows())
		{
			return $query->row();
		}
		
		return FALSE;
	}

}