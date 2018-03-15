<h1>Uploads</h1><h5>You can submit three documents for proof of each kind. Atleast one is needed. A list of documents that can be submitted can be found <a href="images/valid_documents_list.pdf" target="_blank">here</a>.</h5><hr>

<h4> Proof of Identity (POI) </h4> &nbsp&nbsp 

<form action="" method="post" enctype="multipart/form-data"><input type="file" name="poip1"><input type="text" name="poi1" placeholder="Proof Name">&nbsp&nbsp&nbsp&nbsp<button type="submit" name="submit">p1</button> &nbsp&nbsp<?php echo $proofs['poi1']; ?> &nbsp&nbsp <?php if(empty($user_data['poip1']) === false){echo '&#9989';}else echo '&#10071';?></form> &nbsp
<form action="" method="post" enctype="multipart/form-data"><input type="file" name="poip2"><input type="text" name="poi2" placeholder="Proof Name">&nbsp&nbsp&nbsp&nbsp<button type="submit" name="submit">p2</button> &nbsp&nbsp<?php echo $proofs['poi2']; ?> &nbsp&nbsp <?php if(empty($user_data['poip2']) === false){echo '&#9989';}else echo '&#10071';?></form> &nbsp
<form action="" method="post" enctype="multipart/form-data"><input type="file" name="poip3"><input type="text" name="poi3" placeholder="Proof Name">&nbsp&nbsp&nbsp&nbsp<button type="submit" name="submit">p3</button> &nbsp&nbsp<?php echo $proofs['poi3']; ?> &nbsp&nbsp <?php if(empty($user_data['poip3']) === false){echo '&#9989';}else echo '&#10071';?></form> &nbsp 

<h4> Proof of Address (POA) </h4> &nbsp&nbsp 
<form action="" method="post" enctype="multipart/form-data"><input type="file" name="poap1"><input type="text" name="poa1" placeholder="Proof Name">&nbsp&nbsp&nbsp&nbsp<button type="submit" name="submit">p1</button> &nbsp&nbsp<?php echo $proofs['poa1']; ?> &nbsp&nbsp <?php if(empty($user_data['poap1']) === false){echo '&#9989';}else echo '&#10071';?></form> &nbsp
<form action="" method="post" enctype="multipart/form-data"><input type="file" name="poap2"><input type="text" name="poa2" placeholder="Proof Name">&nbsp&nbsp&nbsp&nbsp<button type="submit" name="submit">p2</button> &nbsp&nbsp<?php echo $proofs['poa2']; ?> &nbsp&nbsp <?php if(empty($user_data['poap2']) === false){echo '&#9989';}else echo '&#10071';?></form> &nbsp
<form action="" method="post" enctype="multipart/form-data"><input type="file" name="poap3"><input type="text" name="poa3" placeholder="Proof Name">&nbsp&nbsp&nbsp&nbsp<button type="submit" name="submit">p3</button> &nbsp&nbsp<?php echo $proofs['poa3']; ?> &nbsp&nbsp <?php if(empty($user_data['poap3']) === false){echo '&#9989';}else echo '&#10071';?></form> &nbsp

<h4> Proof of Relationship (POR) </h4> &nbsp&nbsp 

<form action="" method="post" enctype="multipart/form-data"><input type="file" name="porp1"><input type="text" name="por1" placeholder="Proof Name">&nbsp&nbsp&nbsp&nbsp<button type="submit" name="submit">p1</button> &nbsp&nbsp<?php echo $proofs['por1']; ?> &nbsp&nbsp <?php if(empty($user_data['porp1']) === false){echo '&#9989';}else echo '&#10071';?></form> &nbsp
<form action="" method="post" enctype="multipart/form-data"><input type="file" name="porp2"><input type="text" name="por2" placeholder="Proof Name">&nbsp&nbsp&nbsp&nbsp<button type="submit" name="submit">p2</button> &nbsp&nbsp<?php echo $proofs['por2']; ?> &nbsp&nbsp <?php if(empty($user_data['porp2']) === false){echo '&#9989';}else echo '&#10071';?></form> &nbsp
<form action="" method="post" enctype="multipart/form-data"><input type="file" name="porp3"><input type="text" name="por3" placeholder="Proof Name">&nbsp&nbsp&nbsp&nbsp<button type="submit" name="submit">p3</button> &nbsp&nbsp<?php echo $proofs['por3']; ?> &nbsp&nbsp <?php if(empty($user_data['porp3']) === false){echo '&#9989';}else echo '&#10071';?></form> &nbsp

<h4> Proof of Age/DOB (PODOB) </h4> &nbsp&nbsp 

<form action="" method="post" enctype="multipart/form-data"><input type="file" name="podobp1"><input type="text" name="podob1" placeholder="Proof Name">&nbsp&nbsp&nbsp&nbsp<button type="submit" name="submit">p1</button> &nbsp&nbsp<?php echo $proofs['podob1']; ?> &nbsp&nbsp <?php if(empty($user_data['podobp1']) === false){echo '&#9989';}else echo '&#10071';?></form> &nbsp
<form action="" method="post" enctype="multipart/form-data"><input type="file" name="podobp2"><input type="text" name="podob2" placeholder="Proof Name">&nbsp&nbsp&nbsp&nbsp<button type="submit" name="submit">p2</button> &nbsp&nbsp<?php echo $proofs['podob2']; ?> &nbsp&nbsp <?php if(empty($user_data['podobp2']) === false){echo '&#9989';}else echo '&#10071';?></form> &nbsp
<form action="" method="post" enctype="multipart/form-data"><input type="file" name="podobp3"><input type="text" name="podob3" placeholder="Proof Name">&nbsp&nbsp&nbsp&nbsp<button type="submit" name="submit">p3</button> &nbsp&nbsp<?php echo $proofs['podob3']; ?> &nbsp&nbsp <?php if(empty($user_data['podobp3']) === false){echo '&#9989';}else echo '&#10071';?></form> &nbsp



<?php

if(isset($_POST['submit']) && (isset($_FILES['poip1']) === true)){

if(empty($_FILES['poip1']['name']) === true){

echo "<script>";
echo "alert(\"Please choose a file.\")";
echo "</script>";

}else {

$allowed = array('jpg', 'jpeg', 'png', 'pdf');

$p = 'poi p1';
$name = $_POST['poi1'];
$file_name = $_FILES['poip1']['name'];
$file_extn = strtolower(end(explode('.', $file_name)));
$file_tmp = $_FILES['poip1']['tmp_name'];

if(in_array($file_extn, $allowed) === true) {

mysql_query("UPDATE `users` SET `poi1` = '" . mysql_real_escape_string($name) . "' WHERE `user_id` = " . (int)$session_user_id);
submitproofi($session_user_id, $file_tmp, $file_extn, $p);
header('LOCATION: uploads.php');
unset($_POST);

}else{

echo "<script>";
echo "alert(\"Invalid file type. Allowed jpg, jpeg, png.\")";
echo "</script>";

}

}

}else if(isset($_FILES['poip2']) === true){

if(empty($_FILES['poip2']['name']) === true){

echo "<script>";
echo "alert(\"Please choose a file.\")";
echo "</script>";

}else {

$allowed = array('jpg', 'jpeg', 'png', 'pdf');

$p = 'poi p2';
$name = $_POST['poi2'];
$file_name = $_FILES['poip2']['name'];
$file_extn = strtolower(end(explode('.', $file_name)));
$file_tmp = $_FILES['poip2']['tmp_name'];

if(in_array($file_extn, $allowed) === true) {

submitproofi($session_user_id, $file_tmp, $file_extn, $p);
mysql_query("UPDATE `users` SET `poi2` = '" . mysql_real_escape_string($name) . "' WHERE `user_id` = " . (int)$session_user_id);
header('LOCATION: uploads.php');
unset($_POST);

}else{

echo "<script>";
echo "alert(\"Invalid file type. Allowed jpg, jpeg, png.\")";
echo "</script>";

}

}

}else if(isset($_FILES['poip3']) === true){

if(empty($_FILES['poip3']['name']) === true){

echo "<script>";
echo "alert(\"Please choose a file.\")";
echo "</script>";

}else {

$allowed = array('jpg', 'jpeg', 'png', 'pdf');

$p = 'poi p3';
$name = $_POST['poi3'];
$file_name = $_FILES['poip3']['name'];
$file_extn = strtolower(end(explode('.', $file_name)));
$file_tmp = $_FILES['poip3']['tmp_name'];

if(in_array($file_extn, $allowed) === true) {

submitproofi($session_user_id, $file_tmp, $file_extn, $p);
mysql_query("UPDATE `users` SET `poi3` = '" . mysql_real_escape_string($name) . "' WHERE `user_id` = " . (int)$session_user_id);
header('LOCATION: uploads.php');
unset($_POST);

}else{

echo "<script>";
echo "alert(\"Invalid file type. Allowed jpg, jpeg, png.\")";
echo "</script>";

}

}

}else if(isset($_FILES['poap1']) === true){

if(empty($_FILES['poap1']['name']) === true){

echo "<script>";
echo "alert(\"Please choose a file.\")";
echo "</script>";

}else {

$allowed = array('jpg', 'jpeg', 'png', 'pdf');

$p = 'poa p1';
$name = $_POST['poa1'];
$file_name = $_FILES['poap1']['name'];
$file_extn = strtolower(end(explode('.', $file_name)));
$file_tmp = $_FILES['poap1']['tmp_name'];

if(in_array($file_extn, $allowed) === true) {

submitproofi($session_user_id, $file_tmp, $file_extn, $p);
mysql_query("UPDATE `users` SET `poa1` = '" . mysql_real_escape_string($name) . "' WHERE `user_id` = " . (int)$session_user_id);
header('LOCATION: uploads.php');
unset($_POST);

}else{

echo "<script>";
echo "alert(\"Invalid file type. Allowed jpg, jpeg, png.\")";
echo "</script>";

}

}

}else if(isset($_FILES['poap2']) === true){

if(empty($_FILES['poap2']['name']) === true){

echo "<script>";
echo "alert(\"Please choose a file.\")";
echo "</script>";

}else {

$allowed = array('jpg', 'jpeg', 'png', 'pdf');
 
$p = 'poa p2';
$name = $_POST['poa2'];
$file_name = $_FILES['poap2']['name'];
$file_extn = strtolower(end(explode('.', $file_name)));
$file_tmp = $_FILES['poap2']['tmp_name'];

if(in_array($file_extn, $allowed) === true) {

submitproofi($session_user_id, $file_tmp, $file_extn, $p);
mysql_query("UPDATE `users` SET `poa2` = '" . mysql_real_escape_string($name) . "' WHERE `user_id` = " . (int)$session_user_id);
header('LOCATION: uploads.php');
unset($_POST);

}else{

echo "<script>";
echo "alert(\"Invalid file type. Allowed jpg, jpeg, png.\")";
echo "</script>";

}

}

}else if(isset($_FILES['poap3']) === true){

if(empty($_FILES['poap3']['name']) === true){

echo "<script>";
echo "alert(\"Please choose a file.\")";
echo "</script>";

}else {

$allowed = array('jpg', 'jpeg', 'png', 'pdf');

$p = 'poa p3';
$name = $_POST['poa3'];
$file_name = $_FILES['poap3']['name'];
$file_extn = strtolower(end(explode('.', $file_name)));
$file_tmp = $_FILES['poap3']['tmp_name'];

if(in_array($file_extn, $allowed) === true) {

submitproofi($session_user_id, $file_tmp, $file_extn, $p);
mysql_query("UPDATE `users` SET `poa3` = '" . mysql_real_escape_string($name) . "' WHERE `user_id` = " . (int)$session_user_id);
header('LOCATION: uploads.php');
unset($_POST);

}else{

echo "<script>";
echo "alert(\"Invalid file type. Allowed jpg, jpeg, png.\")";
echo "</script>";

}

}

}else if(isset($_FILES['porp1']) === true){

if(empty($_FILES['porp1']['name']) === true){

echo "<script>";
echo "alert(\"Please choose a file.\")";
echo "</script>";

}else {

$allowed = array('jpg', 'jpeg', 'png', 'pdf');

$p = 'por p1';
$name = $_POST['por1'];
$file_name = $_FILES['porp1']['name'];
$file_extn = strtolower(end(explode('.', $file_name)));
$file_tmp = $_FILES['porp1']['tmp_name'];

if(in_array($file_extn, $allowed) === true) {

submitproofi($session_user_id, $file_tmp, $file_extn, $p);
mysql_query("UPDATE `users` SET `por1` = '" . mysql_real_escape_string($name) . "' WHERE `user_id` = " . (int)$session_user_id);
header('LOCATION: uploads.php');
unset($_POST);

}else{

echo "<script>";
echo "alert(\"Invalid file type. Allowed jpg, jpeg, png.\")";
echo "</script>";

}

}

}else if(isset($_FILES['porp2']) === true){

if(empty($_FILES['porp2']['name']) === true){

echo "<script>";
echo "alert(\"Please choose a file.\")";
echo "</script>";

}else {

$allowed = array('jpg', 'jpeg', 'png', 'pdf');

$p = 'por p2';
$name = $_POST['por2'];
$file_name = $_FILES['porp2']['name'];
$file_extn = strtolower(end(explode('.', $file_name)));
$file_tmp = $_FILES['porp2']['tmp_name'];

if(in_array($file_extn, $allowed) === true) {

submitproofi($session_user_id, $file_tmp, $file_extn, $p);
mysql_query("UPDATE `users` SET `por2` = '" . mysql_real_escape_string($name) . "' WHERE `user_id` = " . (int)$session_user_id);
header('LOCATION: uploads.php');
unset($_POST);

}else{

echo "<script>";
echo "alert(\"Invalid file type. Allowed jpg, jpeg, png.\")";
echo "</script>";

}

}

}else if(isset($_FILES['porp3']) === true){

if(empty($_FILES['porp3']['name']) === true){

echo "<script>";
echo "alert(\"Please choose a file.\")";
echo "</script>";

}else {

$allowed = array('jpg', 'jpeg', 'png', 'pdf');

$p = 'por p3';
$name = $_POST['por3'];
$file_name = $_FILES['porp3']['name'];
$file_extn = strtolower(end(explode('.', $file_name)));
$file_tmp = $_FILES['porp3']['tmp_name'];

if(in_array($file_extn, $allowed) === true) {

submitproofi($session_user_id, $file_tmp, $file_extn, $p);
mysql_query("UPDATE `users` SET `por3` = '" . mysql_real_escape_string($name) . "' WHERE `user_id` = " . (int)$session_user_id);
header('LOCATION: uploads.php');
unset($_POST);

}else{

echo "<script>";
echo "alert(\"Invalid file type. Allowed jpg, jpeg, png.\")";
echo "</script>";

}

}

}else if(isset($_FILES['podobp1']) === true){

if(empty($_FILES['podobp1']['name']) === true){

echo "<script>";
echo "alert(\"Please choose a file.\")";
echo "</script>";

}else {

$allowed = array('jpg', 'jpeg', 'png', 'pdf');

$p = 'podob p1';
$name = $_POST['podob1'];
$file_name = $_FILES['podobp1']['name'];
$file_extn = strtolower(end(explode('.', $file_name)));
$file_tmp = $_FILES['podobp1']['tmp_name'];

if(in_array($file_extn, $allowed) === true) {

submitproofi($session_user_id, $file_tmp, $file_extn, $p);
mysql_query("UPDATE `users` SET `podob1` = '" . mysql_real_escape_string($name) . "' WHERE `user_id` = " . (int)$session_user_id);
header('LOCATION: uploads.php');
unset($_POST);

}else{

echo "<script>";
echo "alert(\"Invalid file type. Allowed jpg, jpeg, png.\")";
echo "</script>";

}

}

}else if(isset($_FILES['podobp2']) === true){

if(empty($_FILES['podobp2']['name']) === true){

echo "<script>";
echo "alert(\"Please choose a file.\")";
echo "</script>";

}else {

$allowed = array('jpg', 'jpeg', 'png', 'pdf');

$p = 'podob p2';
$name = $_POST['podob2'];
$file_name = $_FILES['podobp2']['name'];
$file_extn = strtolower(end(explode('.', $file_name)));
$file_tmp = $_FILES['podobp2']['tmp_name'];

if(in_array($file_extn, $allowed) === true) {

submitproofi($session_user_id, $file_tmp, $file_extn, $p);
mysql_query("UPDATE `users` SET `podob2` = '" . mysql_real_escape_string($name) . "' WHERE `user_id` = " . (int)$session_user_id);
header('LOCATION: uploads.php');
unset($_POST);

}else{

echo "<script>";
echo "alert(\"Invalid file type. Allowed jpg, jpeg, png.\")";
echo "</script>";

}

}

}else if(isset($_FILES['podobp3']) === true){

if(empty($_FILES['podobp3']['name']) === true){

echo "<script>";
echo "alert(\"Please choose a file.\")";
echo "</script>";

}else {

$allowed = array('jpg', 'jpeg', 'png', 'pdf');

$p = 'podob p3';
$name = $_POST['podob3'];
$file_name = $_FILES['podobp3']['name'];
$file_extn = strtolower(end(explode('.', $file_name)));
$file_tmp = $_FILES['podobp3']['tmp_name'];

if(in_array($file_extn, $allowed) === true) {


submitproofi($session_user_id, $file_tmp, $file_extn, $p);
mysql_query("UPDATE `users` SET `podob3` = '" . mysql_real_escape_string($name) . "' WHERE `user_id` = " . (int)$session_user_id);
header('LOCATION: uploads.php');
unset($_POST);

}else{

echo "<script>";
echo "alert(\"Invalid file type. Allowed jpg, jpeg, png.\")";
echo "</script>";

}

}

}

?>