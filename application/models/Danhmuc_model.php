<?php
Class Danhmuc_model extends CI_Model{
	protected $table_tl = 'theloai';

	public function select_tl(){
		return $this->db->get($this->table_tl)->result_array();
	}
	public function select_tlid($id){
		$this->db->where("matheloai",$id);
		return $this->db->get($this->table_tl)->row_array();
	}
	public function insert_theloai($arr){
		$this->db->insert($this-> table_tl, $arr);
	}
	public function update_theloai($id,$arr){
		$this-> db-> where('matheloai',$id);
		$this-> db-> update($this->table_tl,$arr);

	}
	public function delete_theloai($id){
		$this-> db-> where('matheloai',$id);
		$this-> db-> delete($this-> table_tl);
	}
	public function check_id($arr=''){
		$this-> db->where("matheloai",$arr);
		$query= $this-> db->get($this-> table_tl);
		if($query-> num_rows() > 0){
			return true;
		}else{
			return false;
		}
	}
	public function check_name($arr=''){
		$this-> db->where("tentheloai",$arr);
		$query= $this-> db->get($this-> table_tl);
		if($query-> num_rows() > 0){
			return true;
		}else{
			return false;
		}
	}



}