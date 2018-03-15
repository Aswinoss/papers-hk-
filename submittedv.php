<!doctype html>
<html>

<?php  
include 'core/init.php';
include 'includes/head.php';

	  if(isset($_GET['submit'])){

$pincode = $_GET['pincode'];
$addr1 = $_GET['addr1'];
$addr2 = $_GET['addr2'];
$addr3 = $_GET['addr3'];
$district = $_GET['district'];
$state = $_GET['state'];
$postoff = $_GET['postoff'];
$taluka = $_GET['taluka'];
$constituency = $_GET['constituency'];
$dob = $_GET['dob'];
$mt = $_GET['mothertongue'];
$fnamef = $_GET['fathernamef'];
$fnamel = $_GET['fathernamel'];
$mnamef = $_GET['mothernamef'];
$mnamel = $_GET['mothernamel'];
$mari = $_GET['maritalstatus'];
$relnamef = $_GET['relationf'];
$relnamel = $_GET['relationl'];
$fname = $_GET['firstname'];
$lname = $_GET['lastname'];
$gender = $_GET['gender'];
$edu = $_GET['education'];
$mobile = $_GET['mobile'];
$date = date("Y-m-d");


if(!empty($fname)){

mysql_query("UPDATE `users` SET `first_Nam` = '" . mysql_real_escape_string($fname) . "' WHERE `user_id` = " . (int)$session_user_id);

}

if(!empty($lname)){
mysql_query("UPDATE `users` SET `last_Nam` = '" . mysql_real_escape_string($lname) . "' WHERE `user_id` = " . (int)$session_user_id);

}
if(!empty($gender)){
mysql_query("UPDATE `users` SET `gender` = '" . mysql_real_escape_string($gender) . "' WHERE `user_id` = " . (int)$session_user_id);

}
if(!empty($edu)){
mysql_query("UPDATE `users` SET `education` = '" . mysql_real_escape_string($edu) . "' WHERE `user_id` = " . (int)$session_user_id);
}
if(!empty($mobile)){
mysql_query("UPDATE `users` SET `mobile` = '" . ($mobile) . "' WHERE `user_id` = " . (int)$session_user_id);

}

if(!empty($fnamef)){

mysql_query("UPDATE `users` SET `fathernamef` = '" . mysql_real_escape_string($fnamef) . "' WHERE `user_id` = " . (int)$session_user_id);

}

if(!empty($fnamel)){
mysql_query("UPDATE `users` SET `fathernamel` = '" . mysql_real_escape_string($fnamel) . "' WHERE `user_id` = " . (int)$session_user_id);

}

if(!empty($mnamef)){

mysql_query("UPDATE `users` SET `mothernamef` = '" . mysql_real_escape_string($mnamef) . "' WHERE `user_id` = " . (int)$session_user_id);

}

if(!empty($mnamel)){
mysql_query("UPDATE `users` SET `mothernamel` = '" . mysql_real_escape_string($mnamel) . "' WHERE `user_id` = " . (int)$session_user_id);

}

if(!empty($mari)){
mysql_query("UPDATE `users` SET `maritalstat` = '" . mysql_real_escape_string($mari) . "' WHERE `user_id` = " . (int)$session_user_id);

}
if(!empty($relnamef)){
mysql_query("UPDATE `users` SET `relationnamef` = '" . mysql_real_escape_string($relnamef) . "' WHERE `user_id` = " . (int)$session_user_id);
}
if(!empty($relnamel)){
mysql_query("UPDATE `users` SET `relationnamel` = '" . ($relnamel) . "' WHERE `user_id` = " . (int)$session_user_id);

}

if(!empty($dob)){

mysql_query("UPDATE `users` SET `dob` = '" . mysql_real_escape_string($dob) . "' WHERE `user_id` = " . (int)$session_user_id);

}

if(!empty($mt)){
mysql_query("UPDATE `users` SET `mothertongue` = '" . mysql_real_escape_string($mt) . "' WHERE `user_id` = " . (int)$session_user_id);

}


if(!empty($pincode)){

mysql_query("UPDATE `users` SET `pincode` = '" . mysql_real_escape_string($pincode) . "' WHERE `user_id` = " . (int)$session_user_id);

}

if(!empty($addr1)){
mysql_query("UPDATE `users` SET `addr1` = '" . mysql_real_escape_string($addr1) . "' WHERE `user_id` = " . (int)$session_user_id);

}

if(!empty($addr2)){

mysql_query("UPDATE `users` SET `addr2` = '" . mysql_real_escape_string($addr2) . "' WHERE `user_id` = " . (int)$session_user_id);

}

if(!empty($addr3)){
mysql_query("UPDATE `users` SET `addr3` = '" . mysql_real_escape_string($addr3) . "' WHERE `user_id` = " . (int)$session_user_id);

}


if(!empty($district)){
mysql_query("UPDATE `users` SET `district` = '" . mysql_real_escape_string($district) . "' WHERE `user_id` = " . (int)$session_user_id);

}

if(!empty($state)){

mysql_query("UPDATE `users` SET `state` = '" . mysql_real_escape_string($state) . "' WHERE `user_id` = " . (int)$session_user_id);

}

if(!empty($postoff)){
mysql_query("UPDATE `users` SET `postoff` = '" . mysql_real_escape_string($postoff) . "' WHERE `user_id` = " . (int)$session_user_id);

}


if(!empty($taluka)){

mysql_query("UPDATE `users` SET `taluka` = '" . mysql_real_escape_string($taluka) . "' WHERE `user_id` = " . (int)$session_user_id);

}

if(!empty($constituency)){

mysql_query("UPDATE `users` SET `constituency` = '" . mysql_real_escape_string($constituency) . "' WHERE `user_id` = " . (int)$session_user_id);

}

mysql_query("INSERT INTO `applications` (`app_id`, `user_id`, `app_type`, `app_status`, `dates`, `comments`, `dates1`) VALUES (NULL, '$session_user_id', 'VoterId', 'Under Review', '$date', '-', '')");

}else if(isset($_GET['submit1'])){

$vehicletype = implode(', ', $_GET['vehicletype']);
$fname = $_GET['firstname'];
$lname = $_GET['lastname'];
$gender = $_GET['gender'];
$addr1 = $_GET['addr1'];
$addr2 = $_GET['addr2'];
$addr3 = $_GET['addr3'];
$district = $_GET['district'];
$state = $_GET['state'];
$edu = $_GET['education'];
$ident1 = $_GET['ident1'];
$ident2 = $_GET['ident2'];
$blood = $_GET['blood'];
$pincode = $_GET['pincode'];
$date = date("Y-m-d");


if(!empty($fname)){

mysql_query("UPDATE `users` SET `first_Nam` = '" . mysql_real_escape_string($fname) . "' WHERE `user_id` = " . (int)$session_user_id);

}

if(!empty($lname)){
mysql_query("UPDATE `users` SET `last_Nam` = '" . mysql_real_escape_string($lname) . "' WHERE `user_id` = " . (int)$session_user_id);

}
if(!empty($gender)){
mysql_query("UPDATE `users` SET `gender` = '" . mysql_real_escape_string($gender) . "' WHERE `user_id` = " . (int)$session_user_id);

}
if(!empty($edu)){
mysql_query("UPDATE `users` SET `education` = '" . mysql_real_escape_string($edu) . "' WHERE `user_id` = " . (int)$session_user_id);
}

if(!empty($pincode)){

mysql_query("UPDATE `users` SET `pincode` = '" . mysql_real_escape_string($pincode) . "' WHERE `user_id` = " . (int)$session_user_id);

}

if(!empty($addr1)){
mysql_query("UPDATE `users` SET `addr1` = '" . mysql_real_escape_string($addr1) . "' WHERE `user_id` = " . (int)$session_user_id);

}

if(!empty($addr2)){

mysql_query("UPDATE `users` SET `addr2` = '" . mysql_real_escape_string($addr2) . "' WHERE `user_id` = " . (int)$session_user_id);

}

if(!empty($addr3)){
mysql_query("UPDATE `users` SET `addr3` = '" . mysql_real_escape_string($addr3) . "' WHERE `user_id` = " . (int)$session_user_id);

}


if(!empty($district)){
mysql_query("UPDATE `users` SET `district` = '" . mysql_real_escape_string($district) . "' WHERE `user_id` = " . (int)$session_user_id);

}

if(!empty($state)){

mysql_query("UPDATE `users` SET `state` = '" . mysql_real_escape_string($state) . "' WHERE `user_id` = " . (int)$session_user_id);

}

if(!empty($ident1)){

mysql_query("UPDATE `users` SET `ident1` = '" . mysql_real_escape_string($ident1) . "' WHERE `user_id` = " . (int)$session_user_id);

}

if(!empty($ident2)){

mysql_query("UPDATE `users` SET `ident2` = '" . mysql_real_escape_string($ident1) . "' WHERE `user_id` = " . (int)$session_user_id);

}

if(!empty($blood)){

mysql_query("UPDATE `users` SET `blood` = '" . mysql_real_escape_string($blood) . "' WHERE `user_id` = " . (int)$session_user_id);

}

if(!empty($vehicletype)){

mysql_query("UPDATE `users` SET `vehicletype` = '" . mysql_real_escape_string($vehicletype) . "' WHERE `user_id` = " . (int)$session_user_id);

}

mysql_query("INSERT INTO `applications` (`app_id`, `user_id`, `app_type`, `app_status`, `dates`, `comments`, `dates1`) VALUES (NULL, '$session_user_id', 'Learner\'s Licence', 'Under Review', '$date', '-', '')");

}else if(isset($_GET['submit2'])){

$pincode = $_GET['pincode'];
$addr1 = $_GET['addr1'];
$addr2 = $_GET['addr2'];
$addr3 = $_GET['addr3'];
$district = $_GET['district'];
$state = $_GET['state'];
$dob = $_GET['dob'];
$mt = $_GET['mothertongue'];
$fnamef = $_GET['fathernamef'];
$fnamel = $_GET['fathernamel'];
$mnamef = $_GET['mothernamef'];
$mnamel = $_GET['mothernamel'];
$mari = $_GET['maritalstatus'];
$relnamef = $_GET['relationf'];
$relnamel = $_GET['relationl'];
$fname = $_GET['firstname'];
$lname = $_GET['lastname'];
$gender = $_GET['gender'];
$edu = $_GET['education'];
$mobile = $_GET['mobile'];
$date = date("Y-m-d");

if(!empty($fname)){

mysql_query("UPDATE `users` SET `first_Nam` = '" . mysql_real_escape_string($fname) . "' WHERE `user_id` = " . (int)$session_user_id);

}

if(!empty($lname)){
mysql_query("UPDATE `users` SET `last_Nam` = '" . mysql_real_escape_string($lname) . "' WHERE `user_id` = " . (int)$session_user_id);

}
if(!empty($gender)){
mysql_query("UPDATE `users` SET `gender` = '" . mysql_real_escape_string($gender) . "' WHERE `user_id` = " . (int)$session_user_id);

}
if(!empty($edu)){
mysql_query("UPDATE `users` SET `education` = '" . mysql_real_escape_string($edu) . "' WHERE `user_id` = " . (int)$session_user_id);
}
if(!empty($mobile)){
mysql_query("UPDATE `users` SET `mobile` = '" . ($mobile) . "' WHERE `user_id` = " . (int)$session_user_id);

}

if(!empty($fnamef)){

mysql_query("UPDATE `users` SET `fathernamef` = '" . mysql_real_escape_string($fnamef) . "' WHERE `user_id` = " . (int)$session_user_id);

}

if(!empty($fnamel)){
mysql_query("UPDATE `users` SET `fathernamel` = '" . mysql_real_escape_string($fnamel) . "' WHERE `user_id` = " . (int)$session_user_id);

}

if(!empty($mnamef)){

mysql_query("UPDATE `users` SET `mothernamef` = '" . mysql_real_escape_string($mnamef) . "' WHERE `user_id` = " . (int)$session_user_id);

}

if(!empty($mnamel)){
mysql_query("UPDATE `users` SET `mothernamel` = '" . mysql_real_escape_string($mnamel) . "' WHERE `user_id` = " . (int)$session_user_id);

}

if(!empty($mari)){
mysql_query("UPDATE `users` SET `maritalstat` = '" . mysql_real_escape_string($mari) . "' WHERE `user_id` = " . (int)$session_user_id);

}
if(!empty($relnamef)){
mysql_query("UPDATE `users` SET `relationnamef` = '" . mysql_real_escape_string($relnamef) . "' WHERE `user_id` = " . (int)$session_user_id);
}
if(!empty($relnamel)){
mysql_query("UPDATE `users` SET `relationnamel` = '" . ($relnamel) . "' WHERE `user_id` = " . (int)$session_user_id);

}

if(!empty($dob)){

mysql_query("UPDATE `users` SET `dob` = '" . mysql_real_escape_string($dob) . "' WHERE `user_id` = " . (int)$session_user_id);

}

if(!empty($mt)){
mysql_query("UPDATE `users` SET `mothertongue` = '" . mysql_real_escape_string($mt) . "' WHERE `user_id` = " . (int)$session_user_id);

}


if(!empty($pincode)){

mysql_query("UPDATE `users` SET `pincode` = '" . mysql_real_escape_string($pincode) . "' WHERE `user_id` = " . (int)$session_user_id);

}

if(!empty($addr1)){
mysql_query("UPDATE `users` SET `addr1` = '" . mysql_real_escape_string($addr1) . "' WHERE `user_id` = " . (int)$session_user_id);

}

if(!empty($addr2)){

mysql_query("UPDATE `users` SET `addr2` = '" . mysql_real_escape_string($addr2) . "' WHERE `user_id` = " . (int)$session_user_id);

}

if(!empty($addr3)){
mysql_query("UPDATE `users` SET `addr3` = '" . mysql_real_escape_string($addr3) . "' WHERE `user_id` = " . (int)$session_user_id);

}


if(!empty($district)){
mysql_query("UPDATE `users` SET `district` = '" . mysql_real_escape_string($district) . "' WHERE `user_id` = " . (int)$session_user_id);

}

if(!empty($state)){

mysql_query("UPDATE `users` SET `state` = '" . mysql_real_escape_string($state) . "' WHERE `user_id` = " . (int)$session_user_id);

}

mysql_query("INSERT INTO `applications` (`app_id`, `user_id`, `app_type`, `app_status`, `dates`, `comments`, `dates1`) VALUES (NULL, '$session_user_id', 'Passport', 'Under Review', '$date', '-', '')");

}else if(isset($_GET['submit3'])){

$llrno = $_GET['llrno'];
$vehicletype = implode(', ', $_GET['vehicletype']);
$fname = $_GET['firstname'];
$lname = $_GET['lastname'];
$gender = $_GET['gender'];
$addr1 = $_GET['addr1'];
$addr2 = $_GET['addr2'];
$addr3 = $_GET['addr3'];
$district = $_GET['district'];
$state = $_GET['state'];
$edu = $_GET['education'];
$ident1 = $_GET['ident1'];
$ident2 = $_GET['ident2'];
$blood = $_GET['blood'];
$pincode = $_GET['pincode'];
$date = date("Y-m-d");


if(!empty($llrno)){

mysql_query("UPDATE `users` SET `llrno` = '" . mysql_real_escape_string($llrno) . "' WHERE `user_id` = " . (int)$session_user_id);

}

if(!empty($fname)){

mysql_query("UPDATE `users` SET `first_Nam` = '" . mysql_real_escape_string($fname) . "' WHERE `user_id` = " . (int)$session_user_id);

}

if(!empty($lname)){
mysql_query("UPDATE `users` SET `last_Nam` = '" . mysql_real_escape_string($lname) . "' WHERE `user_id` = " . (int)$session_user_id);

}
if(!empty($gender)){
mysql_query("UPDATE `users` SET `gender` = '" . mysql_real_escape_string($gender) . "' WHERE `user_id` = " . (int)$session_user_id);

}
if(!empty($edu)){
mysql_query("UPDATE `users` SET `education` = '" . mysql_real_escape_string($edu) . "' WHERE `user_id` = " . (int)$session_user_id);
}

if(!empty($pincode)){

mysql_query("UPDATE `users` SET `pincode` = '" . mysql_real_escape_string($pincode) . "' WHERE `user_id` = " . (int)$session_user_id);

}

if(!empty($addr1)){
mysql_query("UPDATE `users` SET `addr1` = '" . mysql_real_escape_string($addr1) . "' WHERE `user_id` = " . (int)$session_user_id);

}

if(!empty($addr2)){

mysql_query("UPDATE `users` SET `addr2` = '" . mysql_real_escape_string($addr2) . "' WHERE `user_id` = " . (int)$session_user_id);

}

if(!empty($addr3)){
mysql_query("UPDATE `users` SET `addr3` = '" . mysql_real_escape_string($addr3) . "' WHERE `user_id` = " . (int)$session_user_id);

}


if(!empty($district)){
mysql_query("UPDATE `users` SET `district` = '" . mysql_real_escape_string($district) . "' WHERE `user_id` = " . (int)$session_user_id);

}

if(!empty($state)){

mysql_query("UPDATE `users` SET `state` = '" . mysql_real_escape_string($state) . "' WHERE `user_id` = " . (int)$session_user_id);

}

if(!empty($ident1)){

mysql_query("UPDATE `users` SET `ident1` = '" . mysql_real_escape_string($ident1) . "' WHERE `user_id` = " . (int)$session_user_id);

}

if(!empty($ident2)){

mysql_query("UPDATE `users` SET `ident2` = '" . mysql_real_escape_string($ident1) . "' WHERE `user_id` = " . (int)$session_user_id);

}

if(!empty($blood)){

mysql_query("UPDATE `users` SET `blood` = '" . mysql_real_escape_string($blood) . "' WHERE `user_id` = " . (int)$session_user_id);

}

if(!empty($vehicletype)){

mysql_query("UPDATE `users` SET `vehicletype` = '" . mysql_real_escape_string($vehicletype) . "' WHERE `user_id` = " . (int)$session_user_id);

}

mysql_query("INSERT INTO `applications` (`app_id`, `user_id`, `app_type`, `app_status`, `dates`, `comments`, `dates1`) VALUES (NULL, '$session_user_id', 'Driving Licence', 'Under Review', '$date', '-', '')");


}


?>

<body >

<?php include 'includes/orangebarplain.php'; ?>	    
<?php echo "<h1>Application submitted successfully</h1><hr>";
      echo "<h3>Redirecting you to application status page...</h3>";
echo "<script>setTimeout(\"location.href = 'myprofile.php?link=myprofilecont.php';\",1500);</script>"; 
  

?>

<?php include 'includes/bottombar.php' ?>

</body>
</html>




