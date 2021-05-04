<?php
include('conn.php');
include('home-head.php');
include('myaccount.css');
$uname = $_SESSION['x'];
if(isset($_POST['p'])){
$ename = $_POST['p'];
$sql = "SELECT *FROM event WHERE name='".$ename."'";
$res = $conn->query($sql);
if($row = $res->fetch_assoc()){
?>
<div class="editprofile">
<form method="post"> 
<table id="d">
<tr><td><h2>Book event</h2></td></tr>
<input name="ename" type="hidden" value="<?php echo $ename ?>" >
<tr><td><input type="text" name="t1" placeholder="No. of person"></td></tr>
<tr><td><input type="date" name="date" min="<?php echo $row['sdate'];?>" max="<?php echo $row['edate'];?>"></td></tr>
<tr><td><textarea name="t2" placeholder="Remarks"></textarea></td></tr>
<tr><td><input name="submit" type="submit" value="Book"></td></tr>
</table>
</form>
</div>
<?php 
}
}
	if(isset($_POST['submit'])){
	$ename = $_POST['ename'];
	$no = $_POST['t1'];
	$remark = $_POST['t2'];
	$date = $_POST['date'];
	$status = "Not Confirmed" ;
	if($no != '' and $date != '' and $no!= '0'){
		$sql = "INSERT INTO booking (username,event,person,date,remarks,status) VALUES('".$uname."', '".$ename."','".$no."', '".$date."', '".$remark."','".$status."')";
		$result = $conn->query($sql);
			if($result){
				echo "<script> alert('Booked successfully');</script>";
			}
		}else{
			echo "Enter the values";
		}	

	}

?>