<?php

if(!empty($_POST)){

if(!empty($_POST['firstname'])){
updateuserdata('first_Nam', $_POST['firstname'], $user_data['user_id']);
}

if(!empty($_POST['lastname'])){
updateuserdata('last_Nam', $_POST['lastname'], $user_data['user_id']);
}
if(!empty($_POST['gender'])){
updateuserdata('gender', $_POST['gender'], $user_data['user_id']);
}
if(!empty($_POST['education'])){
updateuserdata('education', $_POST['education'], $user_data['user_id']);
}
if(!empty($_POST['mobile'])){
updateuserdata('mobile', $_POST['mobile'], $user_data['user_id']);

echo "<h3>Changes Saved</h3>";
}

else 
echo 'not ok';


}

?>