<?php
Class User_model extends CI_Model{
	protected $table_kh = 'khachhang';

	public function create($arr){
		if($this-> db-> insert($this-> table_kh, $arr))
			return true;
		return false;
	}
	public function check_name($arr=''){
		$this-> db->where("email",$arr);
		$query= $this-> db->get($this-> table_kh);
		if($query-> num_rows() > 0){
			return true;
		}else{
			return false;
		}
	}
	public function check_sdt($arr=''){
		$this-> db->where("sodt",$arr);
		$query= $this-> db->get($this-> table_kh);
		if($query-> num_rows() > 0){
			return true;
		}else{
			return false;
		}
	}
	public function check_exists($email, $password){
		$this-> db-> where('email', $email);
		$this-> db-> where('matkhau', $password);
		$query = $this-> db-> get($this-> table_kh);
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
		$query = $this->db->get($this->table_kh);
		if ($query->num_rows())
		{
			return $query->row();
		}
		
		return FALSE;
	}
	
}