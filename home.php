
<?php
	include('conn.php');
	include('home.css');
 	include('home-head.php');
 ?>
<div class="ft">
<h1>EVENT MANAGEMENT SYSTEM</h1>
<div class="newevent"><input type="button" onclick="window.location.href = './yourevent.php'" value="Create Your Event"/></div>
</div>
<div class="event">
<h2>UPCOMING EVENTS</h2>
<?php
$uname = $_SESSION['x'];
$sql = "SELECT *FROM event";
$result = $conn->query($sql);
while($row = $result->fetch_assoc()){
	
?>
<div class="box">
<div class="img"><?php echo '<img src="eventimg/'.$row['img'].'" width="200" height="130"/>';?></div>
<div class="eventname"><p><?php echo $row['name'] ?></p></div>
<div class="type"><p><?php echo $row['category'] ?></p></div>
<div class="loc"><p><?php echo "Location : "; echo $row['location'] ?></p></div>
<div class="date">
<?php echo "From : "; echo $row['sdate'];echo " To ";; echo $row['edate'];?>
</div>
<div class="btn"><form method="post" action="viewdetails.php"><input type="submit" value="View Details" />
<input name='bb' type="hidden" value=<?php echo $row['name']; ?>></form></div>
</div>
<?php
}

?>
</div>










