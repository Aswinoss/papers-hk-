<!doctype html>
<html>

<?php  
include 'core/init.php';
include 'includes/head.php';

	  
  
  
    
    if(!empty($_POST)) {

$register_data = array(

	'first_Nam' => $_POST['firstname'],
	'last_Nam'  => $_POST['lastname'],
	'email' 	=> $_POST['email'],
	'password'  => $_POST['usr_password'],
	'mobile' 	=> $_POST['mobile']

);


register_user($register_data);
}

?>

<body >

<?php include 'includes/orangebarplain.php'; ?>	    
<?php include 'includes/maincontent_fly.php'; 
  

?>
<?php include 'includes/bottombar.php' ?>

</body>
</html>