<?php include('header.php');
include('dashboard.css');
include('conn.php');

ob_start();
 ?>

<div class="main">
<div class="content">

  <table id="d" width="80%">
          <tr>
              <th>#</th>
              <th>Name</th>
              <th>Description</th>
			  <th>Price</th>
              <th>Action</th>
          </tr>
          <tr>
              <?php
				$sql = "SELECT * FROM category";
				$result = $conn->query($sql);
				
	 
    while ($row = $result->fetch_assoc()) {
		
	    ?>
        <tr>
            <td><?php echo $row['id']; ?></td> 
            <td><?php echo $row['name']; ?></td>
			<td><?php echo $row['price']; ?></td> 
            <td><?php echo $row['description']; ?></td> 
			<td><form method='post' > 
			<input name='b1' type='submit' value='Edit' onclick="javascript: form.action='editcategory.php';">
			<input name='b2' type='submit' value='Remove'><input type='hidden' name='b1' value=<?php echo $row['id']; ?>>
			<input type='hidden' name='b2' value=<?php echo $row['id']; ?>></form>
		</td>
        </tr>
        <?php

}			
if(isset($_POST['b2'])){
	$id = $_POST['b2'];
	$sql = "DELETE FROM category WHERE id=$id";
	if ($conn->query($sql) === TRUE) {
    echo "<script> alert('Record deleted successfully');</script>";
	} else {
    echo "Error deleting record: " . $conn->error;
	}
}
                 ?>

              </tr>
       </table>
	   </div>
</div>	
