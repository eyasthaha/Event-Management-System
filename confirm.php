<?php
ob_start();
include('conn.php');
include('home-head.php');
include('myaccount.css');
include('usermenu.php'); //CSS on myaccount.css
$uname = $_SESSION['x'];
if(isset($_POST['submit'])){
$id = $_POST['submit'];
?>
<div class="content">
<h1>My Bookings</h1>
<table id="d" border="0">

    <?php
  $sql = "SELECT *FROM booking WHERE id='".$id."'";
  $result = $conn->query($sql);
  if($result){
  while($row = $result->fetch_assoc()){
    ?>  
	<tr><td><b>Event Name :</b></td><td><?php echo $row['event']; ?></td><td><b>No. of Person :</b></td><td><?php echo $row['person']; ?></td></tr>
	<tr><td><b>Event Date :</b></td><td><?php echo $row['date']; ?></td><td><b>Remarks :</b></td><td><?php echo $row['remarks']; ?></td></tr>
	<tr><td><b>Status :</b></td><td style="color:#FF0000;"><?php echo $row['status']; ?></td>
	<form method="post">
	<?php
	if($row['status']!= 'Confirmed'){
	 echo'<td colspan="2" align="center">
	<input name="xx" type="submit" value="Cancel"/>';
	 }?>
	 <input name="xx" type="hidden" value="<?php echo $id; ?>"></td></form>
	<form method="post" action="ticket.php">
	<?php
	if($row['status']== 'Confirmed'){
	 echo'<td colspan="2" align="center"><input name="yy" type="submit" value="Ticket"/>';
	 }?>
	 <input name="yy" type="hidden" value="<?php echo $id; ?>"></td></form>
	 </tr>
  	<?php 
	}
	}
	}
	if(isset($_POST['xx'])){
	$id = $_POST['xx'];
	$y = "Cancelled";
	$sql2 = "UPDATE booking SET status='".$y."' WHERE id='".$id."'";
	$res = $conn->query($sql2);
	if($res){
		echo "<script>alert('Cancelled');</script>";
	}
	header("Location:./myaccount.php");
	}
	
	?>
</table>


</div>
