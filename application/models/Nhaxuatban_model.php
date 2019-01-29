<?php
Class Nhaxuatban_model extends CI_Model{
	protected $table_nxb = 'nhaxuatban';
	protected $table_tl = 'theloai';


	public function select_nxb(){
		return $this->db->get($this->table_nxb)->result_array();
	}
	public function select_nxbid($id){
		$this->db->where("manxb",$id);
		return $this->db->get($this->table_nxb)->row_array();
	}
	public function insert_nxb($arr){
		$this->db->insert($this-> table_nxb, $arr);
	}
	public function update_nxb($id,$arr){
		$this-> db-> where('manxb',$id);
		$this-> db-> update($this->table_nxb,$arr);

	}
	public function delete_nxb($id){
		$this-> db-> where('manxb',$id);
		$this-> db-> delete($this-> table_nxb);
	}
	public function check_name($arr=''){
		$this-> db->where("tennxb",$arr);
		$query= $this-> db->get($this-> table_nxb);
		if($query-> num_rows() > 0){
			return true;
		}else{
			return false;
		}
	}



}