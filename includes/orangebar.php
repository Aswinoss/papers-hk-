<!-- Orange Bar -->
	
<div class="orange_bar" >		
 	<a class="logo_top" href="myprofile.php?link=myprofilecont.php" >Papers</a>
	<?php
	 if(logged_in() === false){
	 
	 include 'includes/widget/login.php';
	 
	 } else if((logged_in() === true) && ($user_data['flag'] == 0)) {
	 
	 include 'includes/widget/nav_menu.php';
	 
	 } else if((logged_in() === true) && ($user_data['flag'] == 1)){
	 
	 include 'includes/widget/nav_menu_ad.php';
	 
	 }
	 
		
	
	?>
</div>
</div>
	
<!-- End of orange bar -->