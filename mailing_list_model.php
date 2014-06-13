<?php
/**

* 
 * Mailing_list_model.php works directly with the database. It will be loaded within and called from the controller functions (but correct me if I'm wrong).
 * @package Mailing_List
 * @author Steve Miller
 * @version 1.0 2014/06/12
 * @link https://github.com/steventhomasmiller/
 * @license http://opensource.org/licenses/MIT
 * @see mailing_list_model.php
 * @todo none
*/



class Mailing_list_model extends CI_Model //the model name MUST be capitalized.
{//beginning of model
	
	/**
	* constructor function
	* creates active connection to DB
	* @todo none(?)
	* @returns none
	*/
	
	public function __construct() //remember: precede a constructor with a space and two underscores
		{
			$this->load->database(); //loading the database
		}	
		
	/**
	* get mailing list function
	* @todo none(?)
	* @returns mailing_list from index function in the controller
	*/
	
	public function get_mailing_list()
		{	
			return $this->db->get('mailing_list'); //retrieves mailing list from database
		}	
		
	/**
	* get id function
	* @param $id is for the page identifier (or the userid; I could use some clarification on this point.)
	* @return mailing list
	* @todo none(?)
	*/
		
	public function get_id($id)
		{
			$this->db->where('userid',$id);
			return $this->db->get('mailing_list');	//retrieves mailing list from database.
		}

	/**
	* insert row function
	* @param $row is for database row
	* @todo none(?)
	* @returns the inserted id
	*/
		
	public function insert($row)
	{
		$this->db->insert('mailing_list',$row); //inserts the mailing list into the database (I think)
		return $this->db->insert_id();
	}

} //end of the model

?>
