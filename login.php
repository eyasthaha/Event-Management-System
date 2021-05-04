<?php include('conn.php'); 
	  include('login.css');
?>
<script>
function showpwd() {
  var x = document.getElementById("pwd");
  if (x.type === "password") {
    x.type = "text";
  } else {
    x.type = "password";
  }
}


</script>

<div class="main">

<div class="card">
<form method="post" autocomplete="off">
<table>
<h1 style="text-align:center; color:#F4B41A;">Login</h1>
<tr><td><input name="t1" type="text" placeholder="Username"></td></tr>
<tr><td><input id="pwd" name="t2" type="password" placeholder="Password"></td></tr>
<tr><td><p style="font-size:14px; font-weight:bold; color:#F4B41A;"><input type="checkbox" onClick="showpwd()">Show Password</p></td></tr>
<tr><td><input name="submit" type="submit" value="Login"></td></tr>
<tr><td><input onclick="window.location.href = './signup.php';" name="signup" type="button" value="Signup"></td></tr>
</table>
</form>
<div class="adbtn">
<form name="ad" action="adminlogin.php">
<input type="submit" value="Admin Login" />
</form>
</div>
</div>

</div>

<?php
session_start();
if(isset($_POST['submit'])){
	$uname = $_POST['t1'];
	$pwd = $_POST['t2'];
	
	$sql = "SELECT *FROM users WHERE username = '".$uname."' and password = '".$pwd."' ";
	$result = $conn->query($sql);
			if($result){
			$row = $result->fetch_assoc();
				if($row){
				$_SESSION['y'] = $row['name'];	
				$_SESSION['x'] = $row['username'];
				header('Location:home.php');
				}else{
				echo 'Incorrect Username or Password';;
				}
			}else{
			echo "lol";
			}
}
?>