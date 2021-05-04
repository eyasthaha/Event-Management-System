<?php
include('conn.php');
include('header.php');
?>

<div class="main">
<div class="content">
<h1>All Bookings</h1>
  <table id="c" width="100%;">
          <tr>
              <th>#</th>
              <th>Username</th>
              <th>Event Name</th>
              <th>Person</th>
              <th>Date</th>
			  <th>Status</th>
              <th>Action</th>
          </tr>
        <tr><?php 
			$sql = "SELECT * FROM booking";
			$result = $conn->query($sql);
			while($row = $result->fetch_assoc()){
		?>
            <td><?php echo $row['id']; ?></td> 
            <td><?php echo $row['username']; ?></td> 
            <td><?php echo $row['event']; ?></td> 
			<td><?php echo $row['person']; ?></td> 
            <td><?php echo $row['date']; ?></td> 
			<td><?php echo $row['status']; ?></td> 
			<form method="get" action="viewbooking.php"> <td align="center">
			<input name='b2' type='submit' value='View'>
			<input type='hidden' name='b2' value=<?php echo $row['id']; ?> />
		</form>
		</td>
        </tr>
		<?php
		}
		?>
        </table>
	   </div>
</div>	
