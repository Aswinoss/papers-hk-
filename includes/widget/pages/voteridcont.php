<center><img src="images/icon3.png" height="100px" width="150px" ></center><center><h1>Voter Id</h1></center><p><b>**This application may requier the applicant to enclose various types of proofs. Please ensure that you have uploaded proofs of all kind in the 'My Uploads' section of the site before submitting the application.</b><p><h6>Note*: Make any changes in your details for the application before submission. The changes you make here are also reflected to your profile.</h6><hr>

       
    
<form action="submittedv.php" method="get" >
<table>
<tr><h3>Personal Information</h3></tr>
<tr><td><b>First Name*: </b></td><td></td><td><?php echo $user_data['first_Nam']; ?> </td><td></td><td></td><td></td><td></td><td></td><td></td><td>|</td><td></td><td><input type="text" name="firstname" placeholder="Edit"></td></tr>
<tr><td><b>Last Name*: </b></td><td></td><td><?php echo $user_data['last_Nam']; ?> </td><td></td><td></td><td></td><td></td><td></td><td></td><td>|</td><td></td><td><input type="text" name="lastname" placeholder="Edit"></td></tr>
<tr><td><b>Gender*: </b></td><td></td><td><?php echo $personal_data['gender']; ?> </td><td></td><td></td><td></td><td></td><td></td><td></td><td>|</td><td></td><td><input type="radio" name="gender" value="Male" >Male &nbsp&nbsp<input type="radio" name="gender" value="Female" >Female</td></tr>
<tr><td><b>Education*: </b></td><td></td><td><?php echo $personal_data['education']; ?> </td><td></td><td></td><td></td><td></td><td></td><td></td><td>|</td><td></td><td><select name="education"><option value="">Select Education</option><option value="No Formal Education">No Formal Education</option><option value="1st - 9th Class">1st - 9th Class</option><option value="10th Class">10th Class</option><option value="Intermediate (12th class)">Intermediate (12th class)</option><option value="Bachelors Degree">Bachelors Degree</option><option value="Masters Degree">Masters Degree</option><option value="Doctorate">Doctorate</option></select></td></tr>
<tr><td><b>Mobile*: </b></td><td></td><td><?php echo $personal_data['mobile']; ?> </td><td></td><td></td><td></td><td></td><td></td><td></td><td>|</td><td></td><td><input type="text" name="mobile" pattern="^[0-9][0-9\-]{5,14}$" placeholder="Edit"></td></tr>
</table><br><table>
<tr><h3>Birth Information</h3></tr>
<tr><td><b>Date Of Birth*: </b></td><td></td><td><?php echo $birth_data['dob']; ?> </td><td></td><td></td><td></td><td></td><td></td><td></td><td>|</td><td></td><td><input type="date" name="dob"></td></tr>
<tr><td><b>Mother Tongue*: </b></td><td></td><td><?php echo $birth_data['mothertongue']; ?> </td><td></td><td></td><td></td><td></td><td></td><td></td><td>|</td><td></td><td><input type="text" name="mothertongue" placeholder="Edit"></td></tr>
</table><br>
<table><tr><h3>Address Information</h3></tr>
<tr><td><b>Pincode*: </b></td><td></td><td><?php echo $address_data['pincode']; ?> </td><td></td><td></td><td></td><td></td><td></td><td></td><td>|</td><td></td><td><input type="text" name="pincode" pattern="^[1-8][0-9]{5}$" placeholder="Edit" ></td></tr>
<tr><td><b>Address Line 1*: </b></td><td></td><td><?php echo $address_data['addr1']; ?> </td><td></td><td></td><td></td><td></td><td></td><td></td><td>|</td><td></td><td><input type="text" name="addr1"  placeholder="Edit"></td></tr>
<tr><td><b>Address Line 2*: </b></td><td></td><td><?php echo $address_data['addr2']; ?> </td><td></td><td></td><td></td><td></td><td></td><td></td><td>|</td><td></td><td><input type="text" name="addr2"  placeholder="Edit"></td></tr>
<tr><td><b>Address Line 3: </b></td><td></td><td><?php echo $address_data['addr3']; ?> </td><td></td><td></td><td></td><td></td><td></td><td></td><td>|</td><td></td><td><input type="text" name="addr3"  placeholder="Edit"></td></tr>
<tr><td><b>District*: </b></td><td></td><td><?php echo $address_data['district']; ?> </td><td></td><td></td><td></td><td></td><td></td><td></td><td>|</td><td></td><td><input type="text" name="district"  placeholder="Edit"></td></tr>
<tr><td><b>State*: </b></td><td></td><td><?php echo $address_data['state']; ?> </td><td></td><td></td><td></td><td></td><td></td><td></td><td>|</td><td></td><td><select id="pob_state" name="state"><option value="">Select a State</option><option value="Andaman Nicobar">Andaman Nicobar</option><option value="Andhra Pradesh">Andhra Pradesh</option><option value="Arunachal Pradesh">Arunachal Pradesh</option><option value="Assam">Assam</option><option value="Bihar">Bihar</option><option value="Chandigarh">Chandigarh</option><option value="Chhattisgarh">Chhattisgarh</option><option value="Dadra and Nagar Haveli">Dadra and Nagar Haveli</option><option value="Daman Diu">Daman Diu</option><option value="Goa">Goa</option><option value="Gujarat">Gujarat</option><option value="Haryana">Haryana</option><option value="Himachal Pradesh">Himachal Pradesh</option><option value="Jammu Kashmir">Jammu Kashmir</option><option value="Jharkhand">Jharkhand</option><option value="Karnataka">Karnataka</option><option value="Kerala">Kerala</option><option value="Lakshadweep">Lakshadweep</option><option value="Madhya Pradesh">Madhya Pradesh</option><option value="Maharashtra">Maharashtra</option><option value="Manipur">Manipur</option><option value="Meghalaya">Meghalaya</option><option value="Mizoram">Mizoram</option><option value="Nagaland">Nagaland</option><option value="Nct Of Delhi">Nct Of Delhi</option><option value="Odisha">Odisha</option><option value="Puducherry">Puducherry</option><option value="Punjab">Punjab</option><option value="Rajasthan">Rajasthan</option><option value="Sikkim">Sikkim</option><option value="Tamil Nadu">Tamil Nadu</option><option value="Tripura">Tripura</option><option value="Uttar Pradesh">Uttar Pradesh</option><option value="Uttarakhand">Uttarakhand</option><option value="West Bengal">West Bengal</option></select></td></tr>
<tr><td><b>Post Office: </b></td><td></td><td><?php echo $address_data['postoff']; ?> </td><td></td><td></td><td></td><td></td><td></td><td></td><td>|</td><td></td><td><input type="text" name="postoff"  placeholder="Edit"></td></tr>
<tr><td><b>Tehsil/Taluka/Mandal: </b></td><td></td><td><?php echo $address_data['taluka']; ?> </td><td></td><td></td><td></td><td></td><td></td><td></td><td>|</td><td></td><td><input type="text" name="taluka"  placeholder="Edit"></td></tr>
</table><br>
<table><tr><h3>Assembly Constituency</h3></tr>
<tr><td><b>Constituency: </b></td><td></td><td><?php echo $address_data['constituency']; ?> </td></td><td></td><td></td><td></td><td></td><td></td><td></td><td>|</td><td></td><td><input type="text" name="constituency" placeholder="Edit" ></td></tr>
</table><br>
<table><tr><h3>Relation Details</h3></tr>
<tr><td><b>Father's Name*: </b></td><td></td><td><?php echo $relation_data['fathernamef'] . ' ' .  $relation_data['fathernamel']; ?> </td><td></td><td></td><td></td><td></td><td></td><td></td><td>|</td><td></td><td><input type="text" name="fathernamef" placeholder="Edit FirstName">&nbsp&nbsp<input type="text" name="fathernamel" placeholder="Edit LastName"></td></tr>
<tr><td><b>Mother's Name*: </b></td><td></td><td><?php echo $relation_data['mothernamef']  . ' ' . $relation_data['mothernamel']; ?> </td><td></td><td></td><td></td><td></td><td></td><td></td><td>|</td><td></td><td><input type="text" name="mothernamef" placeholder="Edit FirstName">&nbsp&nbsp<input type="text" name="mothernamel" placeholder="Edit LastName"></td></tr>
<tr><td><b>Marital Status: </b></td><td></td><td><?php echo $relation_data['maritalstat']; ?> </td><td></td><td></td><td></td><td></td><td></td><td></td><td>|</td><td></td><td><select name="maritalstatus"><option>Single</option><option>Married</option></select></td></tr>
<tr><td><b>Relation Name (if any): </b></td><td></td><td><?php echo $relation_data['relationnamef'] . ' ' . $relation_data['relationnamel']; ?> </td><td></td><td></td><td></td><td></td><td></td><td></td><td>|</td><td></td><td><input type="text" name="relationf" placeholder="Edit FirstName">&nbsp&nbsp<input type="text" name="relationl" placeholder="Edit LastName"></td></tr>
</table><br>
<tr></td></td></tr>
</table>
<input type="submit" name="submit" class="regButt button" value="Submit Application">
</form>







