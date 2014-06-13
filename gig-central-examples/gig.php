<?php
//gig.php is a CodeIgniter controller

class Gig extends CI_Controller {
	private $custom_errors = array();
	function __construct()
	{
 		parent::__construct();
		$this->load->library('form_validation');
		$this->load->database();
		$this->load->helper('form');
		$this->load->helper('url');
		$this->load->model('Gig_model');
	}
	
	public function index()
	{
		$data['query'] = $this->Gig_model->get_gig();
		$data['title'] = 'Gig Central';
		$data['banner'] = 'Welcome to Gig Central';
		$data['copyright'] = '&copy; Nathaniel Cohn';
		
		$this->load->view('header', $data);
		$this->load->view('gig/view_gig', $data);
		$this->load->view('footer', $data);
	}
	
	public function add()
	{
		$this->load->helper('form');
		$data['title'] = 'Gig Central';
		$data['banner'] = 'Welcome to Gig Central';
		$data['copyright'] = '&copy; Nathaniel Cohn';
		$this->load->view('header', $data);
		$this->load->view('gig/add_gig', $data);
		$this->load->view('footer', $data);
	}
	
	public function insert()
	{
		$data['title'] = 'Gig Central';
		$data['banner'] = 'Welcome to Gig Central';
		$data['copyright'] = '&copy; Nathaniel Cohn';
		
		//form field validation
		$this->form_validation->set_rules('companyName', 'Company Name', 'required|max_length[255]');			
		$this->form_validation->set_rules('companyURL', 'Company Website', 'max_length[255]');			
		$this->form_validation->set_rules('companyEmail', 'Company Email', 'required|valid_email|max_length[255]');			
		$this->form_validation->set_rules('companyPhone', 'Phone Number', 'max_length[255]');			
		$this->form_validation->set_rules('gigType', 'Type of Gig', 'required|max_length[255]');			
		$this->form_validation->set_rules('gigLocation', 'Location', 'required|max_length[255]');			
		//$this->form_validation->set_rules('gigCategories', 'Category', 'max_length[255]');			
		$this->form_validation->set_rules('positionTitle', 'Position Title', 'required|max_length[255]');			
		$this->form_validation->set_rules('positionId', 'Position ID', 'max_length[255]');			
		$this->form_validation->set_rules('positionDesc', 'Detailed Description', 'required');
		
		//reCAPTCHA validation
		$this->form_validation->set_rules('recaptcha_challenge_field', 'Challenge', 'trim|required|callback_captcha_check');
		
		$this->form_validation->set_error_delimiters('<br /><span class="error">', '</span>');
	
		if ($this->form_validation->run() == FALSE) // validation hasn't been passed
		{
			$this->load->view('header', $data);
			$this->load->view('gig/add_gig', $data);
			$this->load->view('footer', $data);
		}
		else // passed validation proceed to post success logic
		{
		 	// build array for the model
			
			$form_data = array(
					       	'companyName' => @$this->input->post('companyName'),
					       	'companyURL' => @$this->input->post('companyURL'),
					       	'companyEmail' => @$this->input->post('companyEmail'),
					       	'companyPhone' => @$this->input->post('companyPhone'),
					       	'gigType' => @$this->input->post('gigType'),
					       	'gigLocation' => @$this->input->post('gigLocation'),
					       	//'gigCategories' => @$this->input->post('gigCategories'),
					       	'positionTitle' => @$this->input->post('positionTitle'),
					       	'positionId' => @$this->input->post('positionId'),
					       	'positionDesc' => @$this->input->post('positionDesc')
						);
			//take array out of post, implode it to a string
			//and add it to $form_data
			$categories = @$this->input->post('gigCategories');
			if(sizeof($categories) > 0) {
				$categories = implode(",",$categories);
			};
			$form_data['gigCategories'] = $categories;
					
			// run insert model to write data to db
		
			if ($this->Gig_model->SaveForm($form_data) == TRUE) // the information has therefore been successfully saved in the db
			{
				//redirect('gig/success');   // or whatever logic needs to occur
				$this->success($data);
			}
			else
			{
			echo 'An error occurred saving your information. Please try again later';
			// Or whatever error handling is necessary
			}
		}
	}
	public  function check_file($field,$field_value)
	{
		if(isset($this->custom_errors[$field_value]))
		{
			$this->form_validation->set_message('check_file', $this->custom_errors[$field_value]);
			unset($this->custom_errors[$field_value]);
			return FALSE;
		}
		return TRUE;
	}
	function upload_file($config,$fieldname)
	{
		$this->load->library('upload');
		$this->upload->initialize($config);
		$this->upload->do_upload($fieldname);
		$error = $this->upload->display_errors();
		if(empty($error))
		{
			$data = $this->upload->data();
			$this->$fieldname = $data['file_name'];
		}
		else
		{
			$this->custom_errors[$fieldname] = $error;
		}
	}
	
	function success($data)
	{
		$this->load->view("header", $data);
		$this->load->view("gig/success");
		$this->load->view("footer", $data);
	}
	
	function view($id) {
		$data['query'] = $this->Gig_model->get_id($id);
		$data['title'] = "Gig List/View";
		$data['banner'] = "Gig Detail";
		$data['copyright'] = '&copy; Nathaniel Cohn';
		
		$this->load->view("header", $data);
		$this->load->view("gig/view_gig_detail", $data);
		$this->load->view("footer", $data);
	}
	
	function captcha_check($str) {
		$this->load->helper('recaptchalib');
		//require_once(base_url() . '/public/include/recaptchalib.php');
		$privatekey = "6LfJLPUSAAAAACNyQ-aBJEidzuo9CN2L8_apbP4F";
		$resp = recaptcha_check_answer ($privatekey,
		$_SERVER["REMOTE_ADDR"],
		$_POST["recaptcha_challenge_field"],
		$_POST["recaptcha_response_field"]);
		
		if (!$resp->is_valid) {

			$this->form_validation->set_message('captcha_check', 'The reCAPTCHA wasn\?t entered correctly. Go back and try it again.');
			return FALSE;

			// What happens when the CAPTCHA was entered incorrectly
			//die (?The reCAPTCHA wasn?t entered correctly. Go back and try it again.? .
			//?(reCAPTCHA said: ? . $resp->error . ?)?);

		} else {
			return TRUE;
		}
	}
}
?>
