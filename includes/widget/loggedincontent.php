<?php
$page = basename($_SERVER['SCRIPT_NAME'], ".php");

if($user_data['flag'] == 0){

if($page == 'appstatus'){

include 'pages/appstatuscont.php';

}else if($page == 'passport'){

include 'pages/passportcont.php';

}else if($page == 'driving'){

include 'pages/drivingcont.php';

}else if($page == 'voterid'){

include $subpage;

}else if($page == 'myprofile'){

include $subpage;

}else if($page == 'uploads'){

include 'pages/uploadscont.php';

}

}else if($user_data['flag'] == 1){

include 'pages/applications.php';

}


?>