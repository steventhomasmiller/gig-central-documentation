<?php
/**

* 
 * mailing_list.php determines how the HTTP requests will be handled. It will be named in such a way as to be called by a URI, for our purposes, "Mailing_list."
 *
 *
 *
 * @package Mailing_List
 * @author Steve Miller
 * @version 1.0 2014/06/12
 * @link https://github.com/steventhomasmiller/
 * @license http://opensource.org/licenses/MIT
 * @see mailing_list_model.php
 * @todo none
*/
*

*/

class Mailing_list extends CI_Controller { //begin class. Also, make sure to capitalize the first word.

	function __construct(){
		parent::__construct();
		$this->load->model('Mailing_list_model'); //loads from the model; make sure it matches the class name exactly.
	}
	
	/**
	* index function
	* variable $data is an array(?) with different properties we will load.
	* we are making data available to our header and footer
	* @return none
	* @param integer $id The unique ID number of the Survey (fix this)
	* @todo none(?)
	*/

	public function index(){ 
  
        $data['query'] = $this->Mailing_list_model->get_mailing_list();
        $this->config->set_item('style', 'amelia.css'); //sets the style of the page. Make sure the .css theme is supported by CI.
		$data['title'] = "Here is the title tag.";
        $data['banner'] = "Here is our website";
        $data['copyright'] = "Copyright and such";
        $this->load->view('header',$data);
        $this->load->view('mailing_list/view_mailing_list',$data);  //calling from the view     
        $this->load->view('footer',$data);         //current running object
    } //end index()
	
	/**
	* view function
	* variable $data is an array(?) with different properties we will load.
	* @param $id calls the page id
	* this will show us the data from a single page
	* @return none
	* @todo none(?)
	*/
	
	public function view($id){ 
        $data['query'] = $this->Mailing_list_model->get_id($id);        
        $data['title'] = "Here is the title tag.";
        $data['banner'] = $id; 
        $data['copyright'] = "Copyright and such";    
        $this->load->view('header',$data);
        $this->load->view('mailing_list/view_mailing_list_detail',$data);        
        $this->load->view('footer',$data);  //current running object
    } //end view()
	
	/**
	* add function
	* variable $data is an array(?) with different properties we will load.
	* this is a form to add a new record
	* @returns none
	* @todo none(?)
	*/

	public function add()
	{
		$this->load->helper('form');
        $data['title'] = "Here is the title tag.";
        $data['banner'] = "Add a record, NOW!";
        $data['copyright'] = "Copyright and such";
		$this->load->view('header',$data);
        $this->load->view('mailing_list/add_mailing_list',$data); //calls from view
        $this->load->view('footer',$data);         //current running object
	} //end add()
	
	/**
	* insert function
	* variable $data is an array(?) with different properties we will load (do I still need to include this?).
	* this will insert the data entered via add()
	* @todo none(?)
	* @returns none
	*/
	
	public function insert()
	{
		$this->load->library('form_validation');
		//must have at least one validation rule to insert
		$this->form_validation->set_rules('email','Email','trim|required|valid_email');
		$this->form_validation->set_rules('first_name','First Name','trim|required');
		$this->form_validation->set_rules('last_name','Last Name','trim|required');
		$this->form_validation->set_rules('address','Address','trim|required');
		$this->form_validation->set_rules('state_code','State','trim|required');
		$this->form_validation->set_rules('zip_postal','Zip Code','trim|required');
		$this->form_validation->set_rules('username','Username','trim|required');
		$this->form_validation->set_rules('password','Password','trim|required');
		
		if($this->form_validation->run() == FALSE)
		{//failed validation; send back to form
			//VIEW DATA ON FAILURE GOES HERE
			$this->load->helper('form');
			$data['title'] = "AHHHHHHH.";
			$data['banner'] = "Data entry error. Sorry.";
			$data['copyright'] = "Copyright and such";
			$this->load->view('header',$data);
			$this->load->view('mailing_list/add_mailing_list',$data);
			$this->load->view('footer',$data);

		}else{//insert data
			$post=array(
				'first_name' => $this->input->post('first_name'),
				'last_name' => $this->input->post('last_name'),
				'email' => $this->input->post('email'),
				'address' => $this->input->post('address'),
				'state_code' => $this->input->post('state_code'),
				'zip_postal' => $this->input->post('zip_postal'),
				'username' => $this->input->post('username'),
				'password' => $this->input->post('password'),
				'bio' => $this->input->post('bio'),
				'interests' => $this->input->post('interests'),
				'num_tours' => $this->input->post('num_tours'),
			);
			
			$id = $this->Mailing_list_model->insert($post);
			
			echo 'id is: ' . $id; // as in "page id"
			//die;
			
			redirect('/mailing_list/view/' . $id); //takes you to the appropriate page
			
		}
	}
	
} //end class

 //classes extend complex code (wrote that during class; perhaps it's relevant here).


 
?>
