<?php
	class MLogin extends CI_Model{
		function __construct(){
		parent::__construct();
		}

		function GoLogin($username,$password,$level){
			$this->db->select('*');
			if($level == "member"){
				$this->db->from('tb_member');
				$this->db->where('username', $username);
				$this->db->where('password', $password);
			}else{
				$this->db->from('tb_admin');
				$this->db->where('username', $username);
				$this->db->where('password', $password);
			}
		
			$query = $this->db->get();
			if($query -> num_rows() == 1){
				$row = $query->row();
				$this->load->library('session');
				$this->session->set_userdata('id', $row->id);
				$this->session->set_userdata('username', $row->username);
				$this->session->set_userdata('nama', $row->nama);
    			return $row->id;
			}else{
				
				return false;
				
			}
		}

	}
?>