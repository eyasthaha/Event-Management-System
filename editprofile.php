<?php
include('conn.php');
include('home-head.php');
include('usermenu.php');
include('myaccount.css');
$uname = $_SESSION['x'];
$sql = "SELECT *FROM users WHERE username='".$uname."'";
$result = $conn->query($sql);
if($result){
	while($row =$result->fetch_assoc()){
?>
<div class="content">
<div id="cp">
<form method="post">
<table id="d">
<tr><td>Name :</td><td><input type="text" name="e1" value="<?php echo $row['name']; ?>"></td></tr>
<tr><td>Username :</td><td><input type="text" name="e2" value="<?php echo $row['username']; ?>" disabled="disabled"></td></tr>
<tr><td>Email ID :</td><td><input type="text" name="e3" value="<?php echo $row['email']; ?>"></td></tr>
<tr><td>Phone No. :</td><td><input type="text" name="e4" value="<?php echo $row['phone']; ?>"></td></tr>
<tr><td>Gender :</td><td><select name="e5"><option value="Male">Male</option><option value="Female">Female</option><option value="Others">Others</option></select></td></tr>
<tr><td colspan="2" align="center"><input type="submit" name="submit" value="Update"></td></tr>
</table>
</form>
</div>
</div>
<?php
}
}
if($_SERVER['REQUEST_METHOD']==='POST'){

		$name = $_POST['e1'];
		$email = $_POST['e3'];
		$ph = $_POST['e4'];
		$gender = $_POST['e5'];
		$sql = "UPDATE users SET name='".$name."',email='".$email."',phone='".$ph."',gender='".$gender."' WHERE username='".$uname."'";
		$result = $conn->query($sql);
			if($result){
				echo  "<script> alert('Updated'); </script>";
				header("Refresh:0");
			}else{
				echo "Failed";
			}
		}	
?>