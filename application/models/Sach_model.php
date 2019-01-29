<?php
Class Sach_model extends CI_Model{
	protected $table_sach = 'sach';
	protected $table_nxb = 'nhaxuatban';

	public function getsach(){
		return $this->db->get($this->table_sach)->result_array();
	}
	public function getsachall(){
		$this->db->select('*');
		$this->db->from('sach');
		$this->db->join('nhaxuatban', 'nhaxuatban.manxb = sach.manxb');
		$this->db->join('theloai', 'theloai.matheloai = sach.matheloai');
		$this->db->join('sachtacgia', 'sachtacgia.masach = sach.masach');
		$this->db->join('tacgia', 'tacgia.matacgia = sachtacgia.matacgia');
		return $this->db->get()->result_array();
		//return $this->db->get($this->table_sach)->result_array();
	}

	public function getsachid($id){
		$this-> db-> where('masach',$id);
		return $this->db->get($this-> table_sach)->row_array();
	}

	public function getsach_sach($arrmasach){
		$this-> db-> where_in("masach",$arrmasach);
		return $this->db->get($this-> table_sach)->result_array();
	}

	public function getsach_tl($matl){
		$this->db->where("matheloai",$matl);
		return $this->db->get($this-> table_sach)->result_array();
	}

	public function getsachlimit_tl($matl,$masach){
		$this->db->where("matheloai",$matl);
		$this->db->limit(5,0);
		return $this->db->get($this-> table_sach)->result_array();
	}

	public function getsachlimit_gia(){
		$this->db->where("giagiam",null);
		$this->db->limit(5,0);
		return $this->db->get($this-> table_sach)->result_array();
	}

	public function getsach_giamgia(){
		$this->db->where("giagiam",null);
		return $this->db->get($this-> table_sach)->result_array();
	}

	public function getsach_nxb($manxb){
		$this->db->where("manxb",$manxb);
		return $this->db->get($this-> table_sach)->result_array();
	}

	public function insert_sach($arr){
		$this->db->insert($this-> table_sach, $arr);
	}

	public function update_sach($id,$arr){
		$this-> db-> where('masach',$id);
		$this-> db-> update($this-> table_sach,$arr);

	}

	public function delete_sach($id){
		$this-> db-> where('masach',$id);
		$this-> db-> delete($this-> table_sach);
	}

	public function check_name($arr=''){
		$this-> db->where("tensach",$arr);
		$query= $this-> db->get($this-> table_sach);
		if($query-> num_rows() > 0){
			return true;
		}else{
			return false;
		}
	}
	public function search($input = array()){
		$this-> db->like($input['giagoc'][0],$input['giagoc'][1]);
		$this-> db-> or_like($input['giagiam'][0],$input['giagiam'][1]);
		$this->db-> or_like($input['like'][0], $input['like'][1]);
		return $this-> db-> get($this-> table_sach)->result_array();
	}


}