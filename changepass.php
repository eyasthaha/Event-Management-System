<?php
include('conn.php');
include('home-head.php');
include('usermenu.php');
include('myaccount.css');
$uname = $_SESSION['x'];
?>
<div class="content">
<div id="cp">
<form method="post">
<table id="d">
<tr><td><input type="password" name="p1" placeholder="Current Passsword"></td></tr>
<tr><td><input type="password" name="p2" placeholder="New Passsword"></td></tr>
<tr><td><input type="password" name="p3" placeholder="Confirm New Passsword"></td></tr>
<tr><td><input type="submit" name="submit" value="Update Password"></td></tr>
</table>
</form>
</div>
</div>
<?php
if($_SERVER['REQUEST_METHOD']==='POST'){
	$curr = $_POST['p1'];
	$new = $_POST['p2'];
	$cnew = $_POST['p3'];
	$sql = "SELECT password FROM users WHERE username='".$uname."'";
	$result = $conn->query($sql);
	while($row = $result->fetch_array()){
		if($curr == $row['password'] and $new == $cnew){
			$sql2 = "UPDATE users SET password='".$new."' WHERE username='".$uname."'";
			$res = $conn->query($sql2);
			if($res){
			echo "<script>alert ('Password Changed');</script>";
			}
		}else{
			echo "Invalid/Password mismatch";
		}
	}
}

?>