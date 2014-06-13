<?php
//gig_student_model.php

class Gig_student_model extends CI_Model {
	function __construct()
	{
		parent::__construct();
		$this->load->database();	
		
	}
	
	
	public function get_student_list()
	{//will show all data in table named gig_student_initial
		//$query = $this->db->get('gig_student_initial');
		
		//return $query->result_array();
		return $this->db->get('gig_student_initial');
	}//end get_mailing_list()
	
	public function get_id($id)
	{//will show all data in table named mail_list
		     $this->db->select('StudentID,FirstName,LastName,EmailAddress,Password,Phone,Portfolio,LinkedIn,GitHub,Facebook,AreasInterest,EducationLevel,AdditionInfor');
		$this->db->where('StudentID',$id);
		return $this->db->get('gig_student_initial');
	}//end get_id()
	
	public function insert($row)
	{
		$this->db->insert('gig_student_initial',$row);
	return $this->db->insert_id();
	}//end insert();
	
	
	
}
?>
