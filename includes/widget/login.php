<!-- login widget -->

<div class="login_container" >
	<form name="login_form" action="login.php" method="POST" >
       <table>
		<tr><td><input class="inputtext" id="em" type="email" name="email" placeholder="Email" ></td>
		<td><input class="inputtext" id="pswd" type="password" name="usr_password" placeholder="Password" ></td>
		<td><button type="button" id="log_in" class="login_butt" onclick="check()">Log In</button></td>
		</tr>
		<tr><td><?php if(logged_in()){echo 'Logged In';} ?></td>
		<td><a href="forgot.php" class="_note" >Forgot Password.</a></td></tr>
       </table>
    
	</form>
</div>


<script type='text/javascript'>
      function check(){
      var e = document.login_form.email.value.length;
      var p = document.login_form.usr_password.value.length;
      
      if(e==0 && p==0){
      document.getElementById("em").style.border = "2px solid  #8b0300";
      document.getElementById("pswd").style.border = "2px solid #8b0300";
      alert("PLEASE ENTER EMAIL AND PASSWORD.");
      }
      else if(e==0)
      document.getElementById("em").style.border = "2px solid #8b0300";
      else if(p==0)
      document.getElementById("pswd").style.border = "2px solid #8b0300";
      else
      document.getElementById("log_in").type = "submit";
    }
      </script>
