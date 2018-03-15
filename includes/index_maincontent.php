<div class="main_Content" >
 	
 	<?php 
 		if (logged_in() === false) {	
 		include 'includes/widget/slideshow.php';
 		include 'includes/widget/register.php'; 
 		
       }  else {
       	
       	include 'includes/widget/loggedincontent.php';
       }
       
 	?>
 	  
</div>