<div id = "contact">

	<?php 
	//use form helper exclusivly for this view
	$this->load->helper("form");
	
	echo $msg;
	
	echo validation_errors();
	
	echo form_open("site/send_email");
	
	echo form_label("Full Name: ", "fullName");
	//function: set_value using form library
	// for it to appear again if form is opened again
	$data = array(
		"name" => "fullName",
		"id" => "fullName",
		"value" => set_value("fullName")
	);
	echo form_input($data);
	
	
	echo form_label("Email: ", "custemail");
	$data = array(
			"name" => "custemail",
			"id" => "custemail",
			"value" => set_value("custemail")
	);
	echo form_input($data);
	
	
	echo form_label("Message: ", "message");
	$data = array(
			"name" => "message",
			"id" => "message",
			"value" => set_value("message")
	);
	
	echo form_textarea($data);
	
	echo form_submit("contactSubmit", "Submit");
	
	echo form_close();
	
	?>
		
</div>
	