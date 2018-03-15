<div style="display: inline;" ><h1 style="white-space: nowrap;">User Profile</h1> <hr>
		<table>
			<tr><td><a href="myprofile.php?link=myprofilecont.php" >Personal Information</a></td><td></td>
			<td><a href="myprofile.php?link=relationdet.php">Relation Information</a></td><td></td>
			<td><a href="myprofile.php?link=birthinfo.php" style="color: #ee3a00;">Birth Information</a></td><td></td>
			<td><a href="myprofile.php?link=addressinfo.php">Address Information</a></td><td></td>
        	</tr>
       </table><hr> <div>
       
       
<form action="" method="get" >
<table>
<tr><td><b>Date Of Birth*: </b></td><td></td><td><?php echo $birth_data['dob']; ?> </td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td><input type="date" name="dob"></td></tr>
<tr><td><b>Mother Tongue*: </b></td><td></td><td><?php echo $birth_data['mothertongue']; ?> </td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td><input type="text" name="mothertongue" placeholder="Edit"></td></tr>
<input type="hidden" name="link" value="birthinfo.php">
</table>
<input type="submit" name="submit" style="width: 5%;" value="Save">
</form>

<h6>Details marked * are mandatory. Make sure you have entered them.</h6>


<?php

if(isset($_GET['submit'])){

$dob = $_GET['dob'];
$mt = $_GET['mothertongue'];


if(!empty($dob)){

mysql_query("UPDATE `users` SET `dob` = '" . mysql_real_escape_string($dob) . "' WHERE `user_id` = " . (int)$session_user_id);

}

if(!empty($mt)){
mysql_query("UPDATE `users` SET `mothertongue` = '" . mysql_real_escape_string($mt) . "' WHERE `user_id` = " . (int)$session_user_id);

}


}


?>