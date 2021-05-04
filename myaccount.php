<?php
ob_start();
include('conn.php');
include('home-head.php');
include('myaccount.css');
include('usermenu.php');

$uname = $_SESSION['x'];
?>

<div class="content">
<h1>My Bookings</h1>
<table id="c" border="0">

    <?php
	$y="Cancelled";
  $sql = "SELECT *FROM booking WHERE username = '".$uname."' and status != '".$y."'";
  $result = $conn->query($sql);
  if($result){
  ?>  
  <tr>
    <th>Event Name</th>
    <th>No. of Person</th>
    <th>Date</th>
    <th>Status</th>
	<th>Action</th>
  </tr>
  <tr>
  <?php   
   if ($result->num_rows > 0) {
  while($row = $result->fetch_assoc()){
  $row['id'];
 ?>
    <td><?php  echo $row['event']; ?></td>
    <td><?php echo $row['person']; ?></td>
    <td><?php echo $row['date']; ?></td>
	<td><?php echo $row['status']; ?></td>
	<form method="post" action="confirm.php"><td><input name="submit" type="submit" value="View"/><input name="submit" type="hidden" value="<?php  echo $row['id']; ?>"></td></form>
  </tr>
  	<?php 
	}
	}else{
		echo "<tr><td colspan='4'>No Booking</td></tr>";
	}
	}
	?>
</table>


</div>
