<div id = "content">

		<?php 
		
			
			//foreach ($results..) :for every result 
			//it will receive the result array 
			foreach ($results as $row){
				//getting values from it
				$title = $row->title;
				$text1 = $row->text1;
				$text2 = $row->text2;
			}
			
			//by using URL helper
			echo  heading($title, 1);
			
			
			$this->load->helper("form");
			echo form_label("From ", "from");
			
			//function: set_value using form library
			// for it to appear again if form is opened again
			$data = array(
					"name" => "from",
					"id" => "from",
					"value" => set_value("from")
			);
			echo form_input($data);
			
			echo form_label("Destination ", "destination");
				
			//function: set_value using form library
			// for it to appear again if form is opened again
			$data = array(
					"name" => "destination",
					"id" => "destination",
					"value" => set_value("destination")
			);
			echo form_input($data);
			?>

			
			<html lang="en">
			<head>
			  <meta charset="utf-8">
			  <title>jQuery UI Datepicker</title>
			  <link rel="stylesheet" href="//code.jquery.com/ui/1.10.4/themes/smoothness/jquery-ui.css">
			  <script src="//code.jquery.com/jquery-1.9.1.js"></script>
			  <script src="//code.jquery.com/ui/1.10.4/jquery-ui.js"></script>
			  <script>
			  $(function() {
			    $( "#datepicker" ).datepicker();
			  });
			  </script>
			</head>
			<body>
			 
			<p>Outbound <input type="text" id="datepicker"></p> 	
					 
			</body>
			
			</html>
				
			
						
				
				
				
				
				
				
				

			<?php 
			echo form_submit("search", "Search");
			
			echo form_close();
			?>
			
				
		<p><?php echo $text1?></p>
		<p><?php echo $text2?></p>
</div>
	