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
		?>		
		<p><?php echo $text1?></p>
		<p><?php echo $text2?></p>
</div>
	