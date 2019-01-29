<?php
Class Tacgia_model extends CI_Model{
	protected $table_sachtg = 'sachtacgia';
	protected $table_tacgia = 'tacgia';
	public function select_tg(){
		return $this->db->get($this-> table_tacgia)->result_array();
	}
	public function getsachtacgia($id){
		$this-> db-> where('matacgia', $id);
		return $this-> db-> get($this-> table_sachtg)-> result_array();
	}
	public function gettacgiasach($id){
		$this-> db-> where('masach', $id);
		return $this-> db-> get($this-> table_sachtg)-> result_array();
	}
	public function select_tgid($id){
		$this-> db-> where('matacgia', $id);
		return $this-> db-> get($this-> table_tacgia)-> row_array();
	}
	public function gettacgia_tg($arrmatacgia){
		$this-> db-> where_in("matacgia",$arrmatacgia);
		return $this->db->get($this->table_tacgia)->result_array();
	}
	public function insert_tacgia($arr){
		$this->db->insert($this-> table_tacgia, $arr);
	}
	public function update_tacgia($id,$arr){
		$this-> db-> where('matacgia',$id);
		$this-> db-> update($this->table_tacgia,$arr);

	}
	public function delete_tacgia($id){
		$this-> db-> where('matacgia',$id);
		$this-> db-> delete($this-> table_tacgia);
	}
	public function check_name($arr=''){
		$this-> db->where("tentacgia",$arr);
		$query= $this-> db->get($this-> table_tacgia);
		if($query-> num_rows() > 0){
			return true;
		}else{
			return false;
		}
	}

}
