<?php
session_start(); // start the session - required whenever session variables are defined
require('cl_Classes.php');

// user input variables have no value until form is submitted
$user_first 	= '';
$user_last 		= '';
$user_email 	= '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') { // execute following code once request method is defined as POST
	
	// user input variables assigned to populated input values
	$user_first = strip_tags(stripslashes($_POST['user_first']));
	$user_last = strip_tags(stripslashes($_POST['user_last']));
	$user_email = strip_tags(stripslashes($_POST['user_email'])); 

    $object = new cl_UserActions();
    
	if($_POST['insert']){	
		$object->fx_InstertRecord($user_first, $user_last, $user_email);
	}
	if($_POST['check']){
		list($user_first, $user_last) = $object->fx_CheckEmail($user_email);
		echo "$user_first $user_last";
	}
}
	
?>

<!doctype html>
<html>
<head></head>
<body>

<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
	<input type="text" placeholder="First" value="<?php echo $user_first; ?>" name="user_first" /><br />
	<input type="text" placeholder="Last" value="<?php echo $user_last; ?>" name="user_last" /><br />
	<input type="email" placeholder="Email" value="<?php echo $user_email; ?>" name="user_email" /><br />
	
	<input type="submit" value="Insert" name="insert" />
	<input type="submit" value="Check" name="check" />
	<a href="http://localhost/github/testing/">Reset</a>
</form>

</body>
</html>
