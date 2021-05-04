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
<tr><td align="center"><h1 style="color:#F4B41A;">Signup</h1></td></tr>
<tr><td><input name="t1" type="text" placeholder="Name"></td></tr>
<tr><td><input name="t2" type="text" placeholder="Username"></td></tr>
<tr><td><input name="t3" type="text" placeholder="Email ID"></td></tr>
<tr><td><input name="t4" type="text" placeholder="Phone Number"></td></tr>
<tr><td><select name="t5"><option value="Male">Male</option><option value="Female">Female</option><option value="Others">Others</option></select></td></tr>
<tr><td><input id="pwd" name="t6" type="password" placeholder="Password"></td></tr>
<tr><td style="font-size:12px; color:#F4B41A;"><input type="checkbox" onClick="showpwd()">Show Password</td></tr>
<tr><td><input name="submit" type="submit" value="Sign Up"></td></tr>
</table>
</form>
</div>
</div>
<?php
if($_SERVER['REQUEST_METHOD']==='POST'){

		$name = $_POST['t1'];
		$uname = $_POST['t2'];
		$email = $_POST['t3'];
		$ph = $_POST['t4'];
		$gender = $_POST['t5'];
		$pwd = $_POST['t6'];
		$x = "SELECT *FROM users WHERE username='$uname'";
		$res = $conn->query($x);
		if($res->fetch_assoc()){
			echo "Username already exists";
		}else{
		$sql = "INSERT INTO users(name,username,email,phone,gender,password) VALUES('".$name."','".$uname."','".$email."','".$ph."','".$gender."','".$pwd."')";
		$result = $conn->query($sql);
			if($result){
				echo  "Signup Successfull";
			}else{
				echo "Sign Up Failed";
			}
		}	
}
?>