<div id = "">

		<?php 
				
			foreach($result  as $r):
		        echo $r[0]->airline;
		        
		    endforeach;
		    
			$this->load->helper("form");
			
			echo form_open("site/flights");
				
			
			echo form_label("From ", "from");
			//function: set_value using form library
			// for it to appear again if form is opened again
			
			/**
			 * @var data holding an array of name, 
			 */
			$data = array(
					"name" => "from",
					"id" => "from",
					"value" => set_value("from")
			);
			echo form_input($data);

			echo form_submit("search", "Search");

			echo form_close();
		?>
</div>
	