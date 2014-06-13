<?php
//views/gig/add_gig.php
//a form to create a new gig
/*
	string companyName
	string companyURL (optional)
	string companyEmail
	string companyPhone (optional)
	string gigType (can be full-time, part-time, volunteer, contract or internship)
	string gigLocation
	array gigCategories (can include art, design, development, programming, mobile, front-end, back-end and other)
	string positionTitle
	string positionId (optional)
	string positionDesc
*/
echo '<p></p>';
echo validation_errors();

?>
<h1><?php echo $title; ?></h1>
<fieldset><legend>Create a new Gig</legend>
 <?php     
$attributes = array('class' => 'form-horizontal', 'id' => '');
echo form_open('gig/insert', $attributes); ?>
<div class="control-group">
    <label for="companyName" class="control-label">Company Name <span class="required">*</span></label>
	<div class='controls'>
       <input id="companyName" type="text" name="companyName" maxlength="255" value="<?php echo set_value('companyName'); ?>"  />
		 <?php echo form_error('companyName'); ?>
	</div>
</div><div class="control-group">
    <label for="companyURL" class="control-label">Company Website</label>
	<div class='controls'>
       <input id="companyURL" type="text" name="companyURL" maxlength="255" value="<?php echo set_value('companyURL'); ?>"  />
		 <?php echo form_error('companyURL'); ?>
	</div>
</div><div class="control-group">
    <label for="companyEmail" class="control-label">Company Email <span class="required">*</span></label>
	<div class='controls'>
       <input id="companyEmail" type="text" name="companyEmail" maxlength="255" value="<?php echo set_value('companyEmail'); ?>"  />
		 <?php echo form_error('companyEmail'); ?>
	</div>
</div><div class="control-group">
    <label for="companyPhone" class="control-label">Phone Number</label>
	<div class='controls'>
       <input id="companyPhone" type="text" name="companyPhone" maxlength="255" value="<?php echo set_value('companyPhone'); ?>"  />
		 <?php echo form_error('companyPhone'); ?>
	</div>
</div><div class="control-group">
    <label for="gigType" class="control-label">Type of Gig <span class="required">*</span></label>
		<div class="controls">
        <?php // Change or Add the radio values/labels/css classes to suit your needs ?>
            
            <label for="gigType-1" class="radio">
			<input id="gigType-1" name="gigType" type="radio" class="" value="full-time" 
			<?php echo $this->form_validation->set_radio('gigType', 'full-time'); ?> />
    		Full-Time
			</label>
			
			<label for="gigType-2" class="radio">
			<input id="gigType-2" name="gigType" type="radio" class="" value="part-time" 
			<?php echo $this->form_validation->set_radio('gigType', 'part-time'); ?> />
    		Part-Time
			</label>
			
			<label for="gigType-3" class="radio">
			<input id="gigType-3" name="gigType" type="radio" class="" value="volunteer" 
			<?php echo $this->form_validation->set_radio('gigType', 'volunteer'); ?> />
    		Volunteer
			</label>
			
			<label for="gigType-4" class="radio">
			<input id="gigType-4" name="gigType" type="radio" class="" value="contract" 
			<?php echo $this->form_validation->set_radio('gigType', 'contract'); ?> />
    		Contract
			</label>
			
			<label for="gigType-5" class="radio">
			<input id="gigType-5" name="gigType" type="radio" class="" value="intern" 
			<?php echo $this->form_validation->set_radio('gigType', 'intern'); ?> />
    		Internship
    		</label>
    		
			<?php echo form_error('gigType'); ?>
	</div>
</div>
 
<div class="control-group">
    <label for="gigLocation" class="control-label">Location <span class="required">*</span>
</label>
<div class="controls"><?php $options = array(
		''  => 'Please Select',
		'greater-seattle'    => 'Greater Seattle Area',
		'seattle' => 'Seattle'
		); ?>
 
<?php echo form_dropdown('gigLocation', $options, $this->input->post('gigLocation'))?>
		<?php echo form_error('gigLocation'); ?>
	</div>
</div>

<div class="control-group">
<label for="gigCategories" class="control-label">Categories <span class="required">*</span></label>	
<div class='controls'>
<?php
	
	$art_work = array(
		'name'		=>	'gigCategories[]',
		'id'		=>	'gigCategories-1',
		'value'		=>	'art-work',
		'checked'	=>	FALSE,
	);
	
	echo '<label for="gigCategories-1" class="checkbox">' . 
			form_checkbox($art_work) .
			'Art Work</label>';
			
	$design = array(
		'name'		=>	'gigCategories[]',
		'id'		=>	'gigCategories-2',
		'value'		=>	'design',
		'checked'	=>	FALSE,
	);
	
	echo '<label for="gigCategories-2" class="checkbox">' . 
			form_checkbox($design) .
			'Design</label>';
	
	$development = array(
		'name'		=>	'gigCategories[]',
		'id'		=>	'gigCategories-3',
		'value'		=>	'development',
		'checked'	=>	FALSE,
	);
	
	echo '<label for="gigCategories-3" class="checkbox">' . 
			form_checkbox($development) .
			'Development</label>';
			
	$programming = array(
		'name'		=>	'gigCategories[]',
		'id'		=>	'gigCategories-4',
		'value'		=>	'programming',
		'checked'	=>	FALSE,
	);
	
	echo '<label for="gigCategories-4" class="checkbox">' . 
			form_checkbox($programming) .
			'Programming</label>';
?>
	
<!--
<label for="gigCategories-1" class="checkbox">
		<input type="checkbox" id="gigCategories-1" name="gigCategories" value="art-work" class="" <?php echo form_checkbox('gigCategories', 'art-work'); ?>>
		Art Work</label>
		
<label for="gigCategories-2" class="checkbox">
		<input type="checkbox" id="gigCategories-2" name="gigCategories" value="design" class="" <?php echo form_checkbox('gigCategories', 'design'); ?>>
		Design</label>
		
<label for="gigCategories-3" class="checkbox">
		<input type="checkbox" id="gigCategories-3" name="gigCategories" value="web-development" class="" <?php echo form_checkbox('gigCategories', 'web-development'); ?>>
		Web Development</label>
		
<label for="gigCategories-4" class="checkbox">
		<input type="checkbox" id="gigCategories-4" name="gigCategories" value="programming" class="" <?php echo form_checkbox('gigCategories', 'programming'); ?>>
		Programming</label>
		
<label for="gigCategories-5" class="checkbox">
		<input type="checkbox" id="gigCategories-5" name="gigCategories" value="mobile" class="" <?php echo form_checkbox('gigCategories', 'mobile'); ?>>
		Mobile</label>

<label for="gigCategories-6" class="checkbox">
		<input type="checkbox" id="gigCategories-6" name="gigCategories" value="front-end" class="" <?php echo form_checkbox('gigCategories', 'front-end'); ?>>
		Front End</label>
		
<label for="gigCategories-7" class="checkbox">
		<input type="checkbox" id="gigCategories-7" name="gigCategories" value="back-end" class="" <?php echo form_checkbox('gigCategories', 'back-end'); ?>>
		Back End</label>
	-->
                   </div>
	
	<?php echo form_error('gigCategories'); ?>
</div> <div class="control-group">
    <label for="positionTitle" class="control-label">Position Title <span class="required">*</span></label>
	<div class='controls'>
       <input id="positionTitle" type="text" name="positionTitle" maxlength="255" value="<?php echo set_value('positionTitle'); ?>"  />
		 <?php echo form_error('positionTitle'); ?>
	</div>
</div><div class="control-group">
    <label for="positionId" class="control-label">Position ID</label>
	<div class='controls'>
       <input id="positionId" type="text" name="positionId" maxlength="255" value="<?php echo set_value('positionId'); ?>"  />
		 <?php echo form_error('positionId'); ?>
	</div>
</div><div class="control-group">
    <label for="positionDesc" class="control-label">Detailed Description <span class="required">*</span></label>
<div class='controls'>
	<?php echo form_textarea( array( 'name' => 'positionDesc', 'rows' => '5', 'cols' => '80', 'value' => set_value('positionDesc') ) )?>
	<?php echo form_error('positionDesc'); ?>
</div>
</div>
<div class="control-group">
<?php 
	$this->load->helper('recaptchalib_helper.php');
	//require_once('include/recaptchalib.php');
	$publickey = "6LfJLPUSAAAAACldGDFaAgY7iviqSRgT2ElI1UaP"; // you got this from the signup page
	echo recaptcha_get_html($publickey); 
	echo form_error('recaptcha_challenge_field');
?>
</div>
<div class="control-group">
	<label></label>
	<div class='controls'>
        <?php echo form_submit( 'submit', 'Submit'); ?>
	</div>
</div>
<?php echo form_close(); ?></fieldset>
