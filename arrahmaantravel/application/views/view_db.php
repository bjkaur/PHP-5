<!DOCTYPE html>
<html lang="en">
<head>	
</head>
<body>

<div id="container">
	<h1>DB</h1>
	
	<?php 
		//returns whatever is the array in readable form
		//$results: an object in the controller (site.php-getDbValues)-$data['results'] = $this->get_db->getAllValues();
		//print_r($results);
		
		//html compatible
		foreach($results as $row){
			//id: name of the field in the db
			echo $row->id;
			echo ".";
			echo $row->name;
			echo "<br />";
		}

	?>
	
	
	
	<p class="footer">Page rendered in <strong>{elapsed_time}</strong> seconds</p>
</div>

</body>
</html>