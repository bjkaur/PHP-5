<?php include_once 'site_header.php';?>

<?php include_once 'site_nav.php';?>

<!DOCTYPE html>
	<html lang="en">
	<head>
		<title>Get access..!</title>		
	</head>
	<body>
		<h1>Login</h1>	
		
		<?php echo validation_errors(); ?>
		
		<?php echo form_open("login/checkLogin"); ?>
		
		Username: <br/>
		<input type="text" name="username"/><br/>
		
		Password: <br/>
		<input type="text" name="password"/>
		
		<input type="submit" value="Login" name="submit"/>
		
		</form>
		
	</body>
	</html>

<?php include_once 'site_footer.php';?>