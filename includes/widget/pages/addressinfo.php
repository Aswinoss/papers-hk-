<div style="display: inline;" ><h1 style="white-space: nowrap;">User Profile</h1> <hr>
		<table>
			<tr><td><a href="myprofile.php?link=myprofilecont.php" >Personal Information</a></td><td></td>
			<td><a href="myprofile.php?link=relationdet.php">Relation Information</a></td><td></td>
			<td><a href="myprofile.php?link=birthinfo.php">Birth Information</a></td><td></td>
			<td><a href="myprofile.php?link=addressinfo.php" style="color: #ee3a00;">Address Information</a></td><td></td>
        	</tr>
       </table><hr> <div>
       
       
<form action="" method="get" >
<table>
<tr><td><b>Pincode*: </b></td><td></td><td><?php echo $address_data['pincode']; ?> </td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td><input type="text" name="pincode" pattern="^[1-8][0-9]{5}$" placeholder="Edit" ></td></tr>
<tr><td><b>Address Line 1*: </b></td><td></td><td><?php echo $address_data['addr1']; ?> </td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td><input type="text" name="addr1"  placeholder="Edit"></td></tr>
<tr><td><b>Address Line 2*: </b></td><td></td><td><?php echo $address_data['addr2']; ?> </td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td><input type="text" name="addr2"  placeholder="Edit"></td></tr>
<tr><td><b>Address Line 3: </b></td><td></td><td><?php echo $address_data['addr3']; ?> </td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td><input type="text" name="addr3"  placeholder="Edit"></td></tr>
<tr><td><b>District*: </b></td><td></td><td><?php echo $address_data['district']; ?> </td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td><input type="text" name="district"  placeholder="Edit"></td></tr>
<tr><td><b>State*: </b></td><td></td><td><?php echo $address_data['state']; ?> </td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td><select id="pob_state" name="state"><option value="">Select a State</option><option value="Andaman Nicobar">Andaman Nicobar</option><option value="Andhra Pradesh">Andhra Pradesh</option><option value="Arunachal Pradesh">Arunachal Pradesh</option><option value="Assam">Assam</option><option value="Bihar">Bihar</option><option value="Chandigarh">Chandigarh</option><option value="Chhattisgarh">Chhattisgarh</option><option value="Dadra and Nagar Haveli">Dadra and Nagar Haveli</option><option value="Daman Diu">Daman Diu</option><option value="Goa">Goa</option><option value="Gujarat">Gujarat</option><option value="Haryana">Haryana</option><option value="Himachal Pradesh">Himachal Pradesh</option><option value="Jammu Kashmir">Jammu Kashmir</option><option value="Jharkhand">Jharkhand</option><option value="Karnataka">Karnataka</option><option value="Kerala">Kerala</option><option value="Lakshadweep">Lakshadweep</option><option value="Madhya Pradesh">Madhya Pradesh</option><option value="Maharashtra">Maharashtra</option><option value="Manipur">Manipur</option><option value="Meghalaya">Meghalaya</option><option value="Mizoram">Mizoram</option><option value="Nagaland">Nagaland</option><option value="Nct Of Delhi">Nct Of Delhi</option><option value="Odisha">Odisha</option><option value="Puducherry">Puducherry</option><option value="Punjab">Punjab</option><option value="Rajasthan">Rajasthan</option><option value="Sikkim">Sikkim</option><option value="Tamil Nadu">Tamil Nadu</option><option value="Tripura">Tripura</option><option value="Uttar Pradesh">Uttar Pradesh</option><option value="Uttarakhand">Uttarakhand</option><option value="West Bengal">West Bengal</option></select></td></tr>
<tr><td><b>Post Office: </b></td><td></td><td><?php echo $address_data['postoff']; ?> </td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td><input type="text" name="postoff"  placeholder="Edit"></td></tr>
<tr><td><b>Tehsil/Taluka/Mandal: </b></td><td></td><td><?php echo $address_data['taluka']; ?> </td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td><input type="text" name="taluka"  placeholder="Edit"></td></tr>
<tr><td><b>Constituency: </b></td><td></td><td><?php echo $address_data['constituency']; ?> </td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td><input type="text" name="constituency" placeholder="Edit" ></td></tr>
<input type="hidden" name="link" value="addressinfo.php">
</table>
<input type="submit" name="submit" style="width: 5%;" value="Save">
</form>

<h6>Details marked * are mandatory. Make sure you have entered them.</h6>


<?php

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



}