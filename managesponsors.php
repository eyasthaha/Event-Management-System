<?php
include('header.php'); 
include('conn.php');
ob_start();
 ?>

<div class="main">
<div class="content">

  <table id="d">
          <tr>
              <th>#</th>
              <th>Name</th>
              <th>Logo</th>
              <th>Action</th>
          </tr>
          <tr>
              <?php
				$sql = "SELECT * FROM sponsors";
				$result = $conn->query($sql);
				
	 
    while ($row = $result->fetch_assoc()) {
	    ?>
        
            <td><?php echo $row['id']; ?></td> 
            <td><?php echo $row['name']; ?></td> 
            <td><?php echo '<img src="sponsorimg/'.$row['logo'].'" width="100" height="100"/>';?></td> 
			<td><form method='post' enctype="multipart/form-data"> 
			<input name='b1' type='submit' value='Edit' onclick="javascript: form.action='editsponsor.php'">
			<input name='b2' type='submit' value='Remove'><input type='hidden' name='b1' value=<?php echo $row['id']; ?>>
			<input type='hidden' name='b2' value=<?php echo $row['id']; ?> />

        
		</form></td></tr>
        <?php
			

}	
	
if(isset($_POST['b2'])){
	$id = $_POST['b2'];
	echo $id;
	$sql = "DELETE FROM sponsors WHERE id='$id'";
	if ($conn->query($sql) === TRUE) {
    echo "deleted successfully";
	} else {
    echo "Error deleting record: " . $conn->error;
	}
}
                 ?>

              </tr>
       </table>
	   </div>
	   

</div>				
