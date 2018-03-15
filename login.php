<?php
include 'core/init.php';

if (!empty($_POST)) {
	$id = htmlentities($_POST['email']);
	$password = htmlentities($_POST['usr_password']);
	
	if(user_exists($id) === false) {
	echo '<script language="javascript" >';
	echo 'alert("WE COULDN\'T FIND THE EMAIL YOU JUST ENTERED. PLEASE ENTER CORRECT EMAIL or REGISTER");';	
	echo '</script>';
	header('LOCATION: usernotfound.php');
	} else if (user_active($id) === false) {
	echo '<script language="javascript" >';
	echo 'alert("PLEASE ACTIVATE YOUR ACCOUNT. AN ACTIVATION MAIL HAS BEEN SENT TO YOUR EMAIL.")';
	echo '</script>';
	echo '<a href="index.php" >Click Here</a> To Redirect to main page';
	} else {
	
	$login = login($id, $password);
	if ($login === false) {
		
		echo '<script language="javascript" >';
		echo 'alert("INCORRECT, PLEASE CHECK THE DETAILS YOU\'VE PROVIDED.")';
		echo '</script>';
		echo "<script>setTimeout(\"location.href = 'myprofile.php?link=myprofilecont.php';\",10);</script>"; 
	} else {
		$_SESSION['user_id'] = $login;
		header('LOCATION: myprofile.php?link=myprofilecont.php');
		exit();
		
	}
	
	}
	
}
?>
