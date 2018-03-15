<div class="main_Content"><h1>Change Password</h1><hr>

<form name="change" action="forgotp.php" method="post">
<input type="email" id="ema" class="inputtext_reg" name="email" style="width: 15%;" placeholder="Email*" /><br><br><input type="text" id="mobi" class="inputtext_reg" pattern="^[0-9][0-9\-]{5,14}$" style="width: 15%;" name="mobile" placeholder="Mobile*" /><br><br>
<input type="password" id="paswd" class="inputtext_reg" name="usr_password" style="width: 15%;" placeholder="New Password*" /><br><br>
 		<input type="password" id="re" class="inputtext_reg" name="repassword" style="width: 15%;" placeholder="Re-Enter New Password*" /><br><br>
 		<button type="button" id="register" class="regButt button" onclick="checkdet()" >Change Password</button>
</form>



</div>


<script>
function checkdet(){
      var e = document.change.email.value.length;
      var m = document.change.mobile.value.length;
      var p = document.change.usr_password.value.length;
      var repa = document.change.repassword.value.length;
      
      if(e==0 && m==0 && p==0 && repa==0){
      document.getElementById("ema").style.border = "1px solid  #8b0300";
      document.getElementById("paswd").style.border = "1px solid #8b0300";
      document.getElementById("re").style.border = "1px solid #8b0300";
	  document.getElementById("mobi").style.border = "1px solid #8b0300";
      
      alert("PLEASE FILL IN ALL DETAILS.");
      }
      else if(e==0)
      document.getElementById("ema").style.border = "2px solid #8b0300";
      else if(m==0)
      document.getElementById("mobi").style.border = "2px solid #8b0300";
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

