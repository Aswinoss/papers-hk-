<div class="_register" >
   
    <div class="_registerTop" >
    	<h2>Register</h2>
    </div>
    
    <br /><br />
  


 <form name="register_form" action="registered.php" method="POST" >
 		<input type="text" id="fn" class="inputtext_reg" name="firstname" placeholder="First Name*" />
 		<input type="text" id="ln"  class="inputtext_reg" name="lastname" placeholder="Last Name*" /><br /><br />
 		<input type="email" id="ema" class="inputtext_reg" name="email" placeholder="Email*" /><input type="text" id="mobi" class="inputtext_reg" pattern="^[0-9][0-9\-]{5,14}$" name="mobile" placeholder="Mobile*" /><br /><br />
 		<input type="password" id="paswd" class="inputtext_reg" name="usr_password" placeholder="Password*" />
 		<input type="password" id="re" class="inputtext_reg" name="repassword" placeholder="Re-Enter Password*" /><br /><br />
    	<button type="button" id="register" class="regButt button" onclick="checkdet()" >Create Account</button> 
 </form>

</div>
    
<script>
function checkdet(){
      var e = document.register_form.email.value.length;
      var m = document.register_form.mobile.value.length;
      var p = document.register_form.usr_password.value.length;
      var f = document.register_form.firstname.value.length;
      var l = document.register_form.lastname.value.length;
      var repa = document.register_form.repassword.value.length;
      
      if(e==0 && p==0 && f==0 && l==0 && repa==0 && m==0){
      document.getElementById("ema").style.border = "1px solid  #8b0300";
      document.getElementById("paswd").style.border = "1px solid #8b0300";
      document.getElementById("re").style.border = "1px solid #8b0300";
	  document.getElementById("fn").style.border = "1px solid #8b0300";
	  document.getElementById("ln").style.border = "1px solid #8b0300";
	  document.getElementById("mobi").style.border = "1px solid #8b0300";
      
      alert("PLEASE FILL IN ALL DETAILS.");
      }
      else if(e==0)
      document.getElementById("ema").style.border = "2px solid #8b0300";
      else if(m==0)
      document.getElementById("mobi").style.border = "2px solid #8b0300";
      else if(p==0)
      document.getElementById("paswd").style.border = "2px solid #8b0300";
      else if(f==0)
      document.getElementById("fn").style.border = "2px solid #8b0300";
      else if(l==0)
      document.getElementById("ln").style.border = "2px solid #8b0300";
      else if(repa==0)
      document.getElementById("re").style.border = "2px solid #8b0300";
      else if(p != repa)
     	{ alert("PASSWORDS DON'T MATCH");
     	  document.getElementById("paswd").style.border = "2px solid #8b0300";
     	  document.getElementById("re").style.border = "2px solid #8b0300"; 
     	  
     	  }
     	  
      else if(p < 6) {
      	alert("PASSWORD SHOULD ATLEASE BE SIX CHARECTERS.");
      	document.getElementById("paswd").style.border = "2px solid #8b0300";
      	document.getElementById("re").style.border = "2px solid #8b0300";
      	}
     	  
      else
      document.getElementById("register").type = "submit";
    }
    
</script>