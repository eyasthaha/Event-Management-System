<?php
ob_start();
include('conn.php');
include('home-head.php');
include('myaccount.css');
$uname = $_SESSION['x'];
?>
<div>
<div class="menu">
<h2>MY ACCOUNT</h2>
<ul>
<li><a href="myaccount.php">My Booking</a></li>
<li>Edit Profile</li>
<li>Change Password</li>
<li>Logout</li>
</ul>
</div>

<div class="content">
<h1>My Bookings</h1>
<table id="c" border="0">

    <?php
  $sql = "SELECT *FROM booking WHERE username='".$uname."'";
  $result = $conn->query($sql);
  if($result){
  ?>  
  <tr>
    <th>Event Name</th>
    <th>No. of Person</th>
    <th>Date</th>
    <th>Remarks</th>
	<th>Action</th>
  </tr>
  <tr>
  <?php   while($row = $result->fetch_assoc()){
 ?>
    <td><?php  echo $row['event']; ?></td>
    <td><?php echo $row['person']; ?></td>
    <td><?php echo $row['date']; ?></td>
    <td><?php echo $row['remarks']; ?></td>
	<form method="post" action="confirm.php"><td><input name="submit" type="submit" value="Cancel"/></td></form>
  </tr>
  	<?php 
	}
	}
	?>
</table>


</div>
