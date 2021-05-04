<?php include('header.php'); ?>
<?php
include('conn.php');
ob_start();
 ?>

<div class="main">
<div class="content">

  <table id="d" width="100%">
          <tr>
              <th>#</th>
              <th>Category</th>
              <th>Sponsor</th>
              <th>Name</th>
              <th>Start date</th>
              <th>End date</th>
			   <th>Location</th>
              <th>Action</th>
          </tr>
          <tr>
              <?php
				$sql = "SELECT * FROM event";
				$result = $conn->query($sql);
				
	 
    while ($row = $result->fetch_assoc()) {
		
	    ?>
        <tr>
            <td><?php echo $row['id']; ?></td> 
            <td><?php echo $row['category']; ?></td> 
            <td><?php echo $row['sponsor']; ?></td> 
			<td><?php echo $row['name']; ?></td> 
            <td><?php echo $row['sdate']; ?></td> 
			<td><?php echo $row['edate']; ?></td> 
            <td><?php echo $row['location']; ?></td> 
			<td><form method='post' > 
			<input name='b1' type='submit' value='Edit' onclick="javascript: form.action='editevent.php';">
			<input name='b2' type='submit' value='Remove'><input type='hidden' name='b1' value=<?php echo $row['id']; ?>>
			<input type='hidden' name='b2' value=<?php echo $row['id']; ?>></form>
		</td>
        </tr>
        <?php

}			
if(isset($_POST['b2'])){
	$id = $_POST['b2'];
	$sql = "DELETE FROM event WHERE id=$id";
	if ($conn->query($sql) === TRUE) {
    echo "Record deleted successfully";
	} else {
    echo "Error deleting record: " . $conn->error;
	}
}
                 ?>

              </tr>
       </table>
	   </div>
</div>	
