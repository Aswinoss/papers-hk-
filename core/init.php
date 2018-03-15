<?php
session_start();
error_reporting(0);

require 'database/connect.php';
require 'functions/general.php';
require 'functions/users.php';



if(logged_in() === true) {
    $subpage = 'pages/';
	$session_user_id = $_SESSION['user_id'];
	$user_data = user_data($session_user_id, 'user_id', 'first_Nam', 'last_Nam', 'email', 'password', 'poip1', 'poip2', 'poip3', 'poap1', 'poap2', 'poap3', 'porp1', 'porp2', 'porp3', 'podobp1', 'podobp2', 'podobp3', 'flag');
	$personal_data = user_data($session_user_id,  'gender', 'education', 'mobile');
	$relation_data = user_data($session_user_id, 'fathernamef', 'mothernamef', 'maritalstat', 'relationnamef', 'fathernamel', 'mothernamel', 'relationnamel');
	$birth_data = user_data($session_user_id, 'dob', 'mothertongue');
	$address_data = user_data($session_user_id, 'pincode', 'addr1', 'addr2', 'addr3', 'district', 'state', 'postoff', 'taluka', 'constituency');
	$addi_data = user_data($session_user_id, 'ident1', 'ident2', 'blood', 'vehicletype', 'llrno');
	$proofs = user_data($session_user_id, 'poi1', 'poi2', 'poi3', 'poa1', 'poa2', 'poa3', 'por1', 'por2', 'por3', 'podob1', 'podob2', 'podob3');
	if(user_active($user_data['email']) === false) {
		session_destroy();
		header('LOCATION: logout.php');
		die();
	}
}

?>