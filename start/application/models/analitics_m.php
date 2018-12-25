<?php
	
	class Analitics_m extends CI_Model {
		
		function __construct()
    {
        parent::__construct();
        
        $this->load->database();
        $this->load->library('session');
        $this->load->library('ion_auth');
        
    }
		
		public function dataClear(){
			$user = $this->ion_auth->user()->row();
			$userID = $user->id;
			
			$query = $this->db->get_where('users', array('id' => $userID));
			return $query->result_array();
			
		}
		
		public function siteAll(){
			$user = $this->ion_auth->user()->row();
			$userID = $user->id;
			$query = $this->db->get_where('sites', array('users_id' => $userID)); 
			return $query->result_array();
		}
		
		
	}