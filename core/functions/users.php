<?php

function submitproofi($userid, $file_tmp, $file_extn, $p){

$file_name = substr(md5(time()), 0, 10) . '.' . $file_extn;
$proof_type = current(explode(" ", $p));
$proof_no = end(explode(" ", $p));
$file_path = 'uploads/' . $proof_type . '/' . $file_name;

move_uploaded_file($file_tmp, $file_path);

 if($proof_type == 'poi'){
  
  if($proof_no == 'p1'){
  
  mysql_query("UPDATE `users` SET `poip1` = '". mysql_real_escape_string($file_path) . "' WHERE `user_id` = " . (int)$userid);
  
  }else if($proof_no == 'p2'){
  
  mysql_query("UPDATE `users` SET `poip2` = '". mysql_real_escape_string($file_path) . "' WHERE `user_id` = " . (int)$userid);
  
  }else if($proof_no == 'p3'){
  
  mysql_query("UPDATE `users` SET `poip3` = '". mysql_real_escape_string($file_path) . "' WHERE `user_id` = " . (int)$userid);
  
  }
 
 }else if($proof_type == 'poa'){
 
  if($proof_no == 'p1'){
  
  mysql_query("UPDATE `users` SET `poap1` = '". mysql_real_escape_string($file_path) . "' WHERE `user_id` = " . (int)$userid);
  
  }else if($proof_no == 'p2'){
  
  mysql_query("UPDATE `users` SET `poap2` = '". mysql_real_escape_string($file_path) . "' WHERE `user_id` = " . (int)$userid);
  
  }else if($proof_no == 'p3'){
  
  mysql_query("UPDATE `users` SET `poap3` = '". mysql_real_escape_string($file_path) . "' WHERE `user_id` = " . (int)$userid);
  
  }
 
 }else if($proof_type == 'por'){
 
  if($proof_no == 'p1'){
  
  mysql_query("UPDATE `users` SET `porp1` = '". mysql_real_escape_string($file_path) . "' WHERE `user_id` = " . (int)$userid);
  
  }else if($proof_no == 'p2'){
  
  mysql_query("UPDATE `users` SET `porp2` = '". mysql_real_escape_string($file_path) . "' WHERE `user_id` = " . (int)$userid);
  
  }else if($proof_no == 'p3'){
  
  mysql_query("UPDATE `users` SET `porp3` = '". mysql_real_escape_string($file_path) . "' WHERE `user_id` = " . (int)$userid);
  
  }
 
 }else if($proof_type == 'podob'){
 
  if($proof_no == 'p1'){
  
  mysql_query("UPDATE `users` SET `podobp1` = '". mysql_real_escape_string($file_path) . "' WHERE `user_id` = " . (int)$userid);
  
  }else if($proof_no == 'p2'){
  
  mysql_query("UPDATE `users` SET `podobp2` = '". mysql_real_escape_string($file_path) . "' WHERE `user_id` = " . (int)$userid);
  
  }else if($proof_no == 'p3'){
  
  mysql_query("UPDATE `users` SET `podobp3` = '". mysql_real_escape_string($file_path) . "' WHERE `user_id` = " . (int)$userid);
  
  }
 
 }

}

function register_user($register_data){

array_walk($register_data, 'array_sanitize');
$register_data['password'] = md5($register_data['password']);

$fields = '`' . implode('`, `', array_keys($register_data)) . '`';
$data = '\'' . implode('\', \'', $register_data) . '\'';


mysql_query("INSERT INTO `users` ($fields) VALUES ($data)");
}

/*function updateuserdata($field, $data, $userid){

$data = sanitize($data);

mysql_query("UPDATE `users` SET $field = $data WHERE `user_id` = " . (int)$userid);


}*/

function user_data($user_id) {
	$data = array();
	$user_id = (int)$user_id;
	
	$func_num_args = func_num_args();
	$func_get_args = func_get_args();
	
	if ($func_num_args > 1) {
	unset($func_get_args[0]);
	
	$fields = '`' . implode('`, `', $func_get_args) . '`';
	$data = mysql_fetch_assoc(mysql_query("SELECT $fields FROM `users` WHERE `user_id` = $user_id"));
	
	return $data;
	}
}

function logged_in() {
	return (isset($_SESSION['user_id'])) ? true : false;
}

function user_exists($id) {
	$id = sanitize($id);
	$query = mysql_query("SELECT COUNT(`user_id`) FROM `users` WHERE `email` = '$id'");
	return (mysql_result($query, 0) == 1) ? true : false;

}

function user_active($id) {
	$id = sanitize($id);
	$query = mysql_query("SELECT COUNT(`user_id`) FROM `users` WHERE `email` = '$id' AND `active` = 1");
	return (mysql_result($query, 0) == 1) ? true : false;

}

function user_id_from_email($id) {
	$id = sanitize($id);
	return mysql_result(mysql_query("SELECT `user_id` FROM `users` WHERE `email` = '$id'"), 0, 'user_id');
}

function login($id, $password) {
	$user_id = user_id_from_email($id);
	
	$id = sanitize($id);
	$password = md5($password);
	
	return (mysql_result(mysql_query("SELECT COUNT(`user_id`) FROM `users` WHERE `email` = '$id' AND `password` = '$password'"), 0) == 1) ? $user_id : false;
}
?>