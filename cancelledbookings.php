<?php
include('conn.php');
include('header.php');
?>

<div class="main">
<div class="content">
<h1>Cancelled Bookings</h1>
  <table id="c" width="100%;">
          <tr>
              <th>#</th>
              <th>Username</th>
              <th>Event Name</th>
              <th>Person</th>
              <th>Date</th>
			  <th>Status</th>
            
          </tr>
        <tr><?php 
			$sql = "SELECT * FROM booking WHERE status='Cancelled'";
			$result = $conn->query($sql);
			while($row = $result->fetch_assoc()){
		?>
            <td><?php echo $row['id']; ?></td> 
            <td><?php echo $row['username']; ?></td> 
            <td><?php echo $row['event']; ?></td> 
			<td><?php echo $row['person']; ?></td> 
            <td><?php echo $row['date']; ?></td> 
			<td><?php echo $row['status']; ?></td> 
	
        </tr>
		<?php
		}
		?>
        </table>
	   </div>
</div>	
