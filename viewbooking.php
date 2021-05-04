<?php
include('conn.php');
include('header.php');
if(isset($_GET['b2'])){
$id = $_GET['b2'];
$sql = "SELECT *FROM booking WHERE id='".$id."'";
$result = $conn->query($sql);
if($result){
	while($row =$result->fetch_assoc()){
?>
<div class="main">
<div class="content">
<div id="cp">
<form method="post">
<table id="c">
<tr><td>Username :</td><td><?php echo $row['username'] ?></td><td><b>Event Name :</b></td><td><?php echo $row['event']; ?></td></tr>
	<tr><td><b>No. of Person :</b></td><td><?php echo $row['person']; ?></td><td><b>Event Date :</b></td><td><?php echo $row['date']; ?></td></tr>
	<tr><td><b>Remarks :</b></td><td><?php echo $row['remarks']; ?></td><td><b>Status :</b></td><td style="color:#FF0000;"><?php echo $row['status']; ?></td>
	<tr><form method="post"><td colspan="4" align="center"><input name="xx" type="submit" value="Confirm"/><input name="xx" type="hidden" value="<?php  echo $id; ?>"></td></form></tr>
</table>
</form>
</div>
</div>
</div>
<?php
}
}
}
if($_SERVER['REQUEST_METHOD']==='POST'){
$id = $_POST['xx'];
$y = 'Confirmed';
$sql2 = "UPDATE booking SET status='".$y."' WHERE id='".$id."'";
$res = $conn->query($sql2);
if($res){
	echo "<script>alert('Confirmed'); </script>";
}
}

?>