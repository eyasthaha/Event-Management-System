<?php
include('conn.php');
include('header.php');
?>
<div class="main">
<div class="content">
<?php

	$sql ="SELECT * FROM users";
	$res = $conn->query($sql);

?>
<table id="d" width="100%">
          <tr>
              <th>#Id</th>
              <th>Username</th>
              <th>Name</th>
              <th>E-mail</th>
			  <th>Phone</th>
			  <th>Gender</th>
              <th>Action</th>
          </tr>
		  <?php
		  while($row = $res->fetch_assoc()){
		  ?>
          <tr>
            <td><?php echo $row['id']; ?></td> 
            <td><?php echo $row['username']; ?></td> 
            <td><?php echo $row['name']; ?></td> 
			<td><?php echo $row['email']; ?></td> 
            <td><?php echo $row['phone']; ?></td> 
			<td><?php echo $row['gender']; ?></td> 
            <td><form method='post' > 
			<input name='b1' type='submit' value='Deactivate'>
			<input name='b1' type='hidden' value='<?php echo $row['id'] ?>'>
</form>
		</td>
        </tr>
		<?php
		}
		if($_SERVER['REQUEST_METHOD'] === 'POST'){
				echo $id;
				$sql = "DELETE FROM users WHERE id=$id ";
				$res = $conn->query($sql);
				if($res){
					echo "<script> alert('Deactivated');</script>";
				}
			}
		
		
		?>

              </tr>
       </table>
	   </div>
	   </div>