<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01//EN"
	"http://www.w3.org/TR/html4/strict.dtd">
	
<html lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<title>untitled</title>
</head>
<body>

<div id = "newsletter">

	<?php
	echo validation_errors('<p class = "error">');
	
	echo form_open('email/send_email');
	
	echo form_label("Full Name: ", "fullName");
	//function: set_value using form library
	// for it to appear again if form is opened again
	$data = array(
			"name" => "fullName",
			"id" => "fullName",
			"value" => set_value("fullName")
	);
	echo form_input($data);
	?>
	
	<p>
		<label for="name">Email: </label>
		<input type="text" name="email" id="email" value ="<?php echo set_value('email'); ?>">
	</p>
	
	
	<p><?php
	//two params: name, value
	echo form_submit("submit", "Submit");
	?></p>
	
	<p><?php echo form_close(); ?></p>
	
	

</div><!--end of newsletter-->



</body>

</html>
	