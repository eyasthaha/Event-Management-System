<?php
include('conn.php');
include('login.css');
?>
<style>

</style>
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
<form method="post">
<table>
<tr><td align="center"><h1 style="color:#F4B41A;">Admin Login</h1></td></tr>
<tr><td><input name="t2" type="text" placeholder="Username"></td></tr>
<tr><td><input id="pwd" name="t6" type="password" placeholder="Password"></td></tr>
<tr><td style="font-size:12px; color:#F4B41A;"><input type="checkbox" onClick="showpwd()">Show Password</td></tr>
<tr><td><input name="submit" type="submit" value="Login"></td></tr>
</table>
</form>
</div>
</div>
<?php
if($_SERVER['REQUEST_METHOD']==='POST'){

		$uname = $_POST['t2'];
		$pwd = $_POST['t6'];
		if($uname=='admin' && $pwd=='admin'){
				header("Location:dashboard.php");
			}else{
				echo "<script> alert('Incorrect');</script>";
			}
		}	

?>