<div style="display: inline;" ><h1 style="white-space: nowrap;">User Profile</h1><hr>
		<table>
			<tr><td><a href="myprofile.php?link=myprofilecont.php" >Personal Information</a></td><td></td>
			<td><a href="myprofile.php?link=relationdet.php" style="color: #ee3a00;">Relation Information</a></td><td></td>
			<td><a href="myprofile.php?link=birthinfo.php">Birth Information</a></td><td></td>
			<td><a href="myprofile.php?link=addressinfo.php">Address Information</a></td><td></td>
        	</tr>
       </table><hr> <div>
       
       
       
       
<form action="" method="get" >
<table>
<tr><td><b>Father's Name*: </b></td><td></td><td><?php echo $relation_data['fathernamef'] . ' ' .  $relation_data['fathernamel']; ?> </td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td><input type="text" name="fathernamef" placeholder="Edit FirstName">&nbsp&nbsp<input type="text" name="fathernamel" placeholder="Edit LastName"></td></tr>
<tr><td><b>Mother's Name*: </b></td><td></td><td><?php echo $relation_data['mothernamef']  . ' ' . $relation_data['mothernamel']; ?> </td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td><input type="text" name="mothernamef" placeholder="Edit FirstName">&nbsp&nbsp<input type="text" name="mothernamel" placeholder="Edit LastName"></td></tr>
<tr><td><b>Marital Status: </b></td><td></td><td><?php echo $relation_data['maritalstat']; ?> </td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td><select name="maritalstatus"><option>Single</option><option>Married</option></select></td></tr>
<tr><td><b>Relation Name (if any): </b></td><td></td><td><?php echo $relation_data['relationnamef'] . ' ' . $relation_data['relationnamel']; ?> </td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td><input type="text" name="relationf" placeholder="Edit FirstName">&nbsp&nbsp<input type="text" name="relationl" placeholder="Edit LastName"></td></tr>
<input type="hidden" name="link" value="relationdet.php">
</table>
<input type="submit" name="submit" style="width: 5%;" value="Save">
</form>


<h6>Details marked * are mandatory. Make sure you have entered them.</h6>

<?php

if(isset($_GET['submit'])){

$fnamef = $_GET['fathernamef'];
$fnamel = $_GET['fathernamel'];
$mnamef = $_GET['mothernamef'];
$mnamel = $_GET['mothernamel'];
$mari = $_GET['maritalstatus'];
$relnamef = $_GET['relationf'];
$relnamel = $_GET['relationl'];

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

}


?>