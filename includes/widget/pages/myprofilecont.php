<h1>User Profile</h1> <hr>
		<table>
			<tr><td><a href="myprofile.php?link=myprofilecont.php" style="color: #ee3a00;">Personal Information</a></td><td></td>
			<td><a href="myprofile.php?link=relationdet.php">Relation Information</a></td><td></td>
			<td><a href="myprofile.php?link=birthinfo.php">Birth Information</a></td><td></td>
			<td><a href="myprofile.php?link=addressinfo.php">Address Information</a></td><td></td>
        	</tr>
       </table><hr> 
       

<form action="" method="get" >
<table>

<tr><td><b>First Name*: </b></td><td></td><td><?php echo $user_data['first_Nam']; ?> </td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td><input type="text" name="firstname" placeholder="Edit"></td></tr>
<tr><td><b>Last Name*: </b></td><td></td><td><?php echo $user_data['last_Nam']; ?> </td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td><input type="text" name="lastname" placeholder="Edit"></td></tr>
<tr><td><b>Gender*: </b></td><td></td><td><?php echo $personal_data['gender']; ?> </td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td><input type="radio" name="gender" value="Male" >Male &nbsp&nbsp<input type="radio" name="gender" value="Female" >Female</td></tr>
<tr><td><b>Education*: </b></td><td></td><td><?php echo $personal_data['education']; ?> </td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td><select name="education"><option value="">Select Education</option><option value="No Formal Education">No Formal Education</option><option value="1st - 9th Class">1st - 9th Class</option><option value="10th Class">10th Class</option><option value="Intermediate (12th class)">Intermediate (12th class)</option><option value="Bachelors Degree">Bachelors Degree</option><option value="Masters Degree">Masters Degree</option><option value="Doctorate">Doctorate</option></select></td></tr>
<tr><td><b>Mobile*: </b></td><td></td><td><?php echo $personal_data['mobile']; ?> </td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td><input type="text" name="mobile" pattern="^[0-9][0-9\-]{5,14}$" placeholder="Edit"></td></tr>
<input type="hidden" name="link" value="myprofilecont.php">
<tr></td></td></tr>
</table>
<input type="submit" name="submit" style="width: 5%;" value="Save">
</form>

<h6>Details marked * are mandatory. Make sure you have entered them.</h6>


<?php

if(isset($_GET['submit'])){

$fname = $_GET['firstname'];
$lname = $_GET['lastname'];
$gender = $_GET['gender'];
$edu = $_GET['education'];
$mobile = $_GET['mobile'];


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

}


?>