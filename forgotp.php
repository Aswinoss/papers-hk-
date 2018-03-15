
<?php

$em = $_POST['email'];
$mobi = $_POST['mobile'];
$pswd = md5($_POST['usr_password']);
$re = $_POST['repassword'];
$userid = user_id_from_email($em);
$user_mobile = mysql_result(mysql_query("SELECT mobile FROM `users` WHERE `user_id` = $userid"), 0, 'mobile'); 

if($user_mobile == $mobi)
{
mysql_query("UPDATE `users` SET `password` = '". mysql_real_escape_string($pswd) . "' WHERE `user_id` = " . (int)$userid);

echo "<script>";
echo "alert(\"Success, SignIn.\")";
echo "</script>";
}

else 

{
echo "<script>";
echo "alert(\"Incorrect Details.\")";
echo "</script>";

}

?>