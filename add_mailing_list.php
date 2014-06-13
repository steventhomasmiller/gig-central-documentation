<?php
/**
 * 
 *
 * /views/mailing_list/add_mailing_list.php is an add form to add (sic redundant) an item to the table* the controller loads this page
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

echo '<p></p>'; //for some space at the top
echo validation_errors(); //validation errors will appear here

?>
<h1>Add to Mailing List</h1>
<?=form_open('mailing_list/insert'); // begin form; calls this from view ?>
<?php
	$first_name=array(
	'name' => 'first_name',
	'id' => 'first_name',
	'value' => set_value('first_name',''),
	//make sure all the array values match
	);
	
	$req = 'required="required"';
	echo form_label('First Name','first_name') . ': ';
	echo form_input($first_name,'',$req) . '<br />';
	//repeat this format for related data pieces
	
	$last_name=array(
	'name' => 'last_name',
	'id' => 'last_name',
	'value' => set_value('last_name',''),
	);
	echo form_label('Last Name', 'last_name') . ': ';
	echo form_input($last_name) . '<br />';
	
	$email=array(
	'name' => 'email',
	'id' => 'email',
	'value' => set_value('email',''),
	);
	echo form_label('Email', 'email') . ': ';
	echo form_input($email) . '<br />';
	
	$address=array(
	'name' => 'address',
	'id' => 'address',
	'value' => set_value('address',''),
	);
	echo form_label('Address', 'address') . ': ';
	echo form_input($address) . '<br />';
	
	$state_code=array(
	'name' => 'state_code',
	'id' => 'state_code',
	'value' => set_value('state_code',''),
	);
	echo form_label('State', 'state_code') . ': ';
	echo form_input($state_code) . '<br />';
	
	$zip_postal=array(
	'name' => 'zip_postal',
	'id' => 'zip_postal',
	'value' => set_value('zip_postal',''),
	);
	echo form_label('Zip Postal', 'zip_postal') . ': ';
	echo form_input($zip_postal) . '<br />';
	
	$username=array(
	'name' => 'username',
	'id' => 'username',
	'value' => set_value('username',''),
	);
	echo form_label('Username', 'username') . ': ';
	echo form_input($username) . '<br />';
	
	$password=array(
	'name' => 'password',
	'id' => 'password',
	'value' => set_value('password',''),
	);
	echo form_label('Password', 'password') . ': ';
	echo form_password($password) . '<br />'; //note the use of "form_password" instead of "form_input."
	
	$bio=array(
	'name' => 'bio',
	'id' => 'bio',
	'value' => set_value('bio',''),
	);
	
	echo form_label('Bio', 'bio') . ': ';
	echo form_textarea($bio) . '<br />';//note the use of "form_textarea" instead of "form_input."
	
	$interests=array(
	'backpack_cal' => 'Backpack California',
	'cycle_cal' => 'Cycle California',
	'nature_watch' => 'Nature Watch', 
	);
	
	echo form_label('Interests', 'interests') . ': ';
	echo form_multiselect('interests',$interests) . '<br />'; 
	
	$num_tours1=array(
	'name' => 'num_tours1',
	'id' => 'num_tours1',
	'value' => '0',
	'checked' => FALSE
	);
	
	$num_tours2=array(
	'name' => 'num_tours2',
	'id' => 'num_tours2',
	'value' => '1-3',
	'checked' => FALSE
	);
	
	$num_tours3=array(
	'name' => 'num_tours3',
	'id' => 'num_tours3',
	'value' => '4-6',
	'checked' => FALSE
	);
	
	//radio buttons
	
	echo form_label('None', 'num_tours1') . ': ';
	echo form_radio($num_tours1) . '<br />';
	
	echo form_label('1-3', 'num_tours2') . ': ';
	echo form_radio($num_tours1) . '<br />';
	
	echo form_label('4-6', 'num_tours3') . ': ';
	echo form_radio($num_tours1) . '<br />';

?>

<?=form_submit('submit','Add to mailing list');?>
<?=form_close(); ?>
