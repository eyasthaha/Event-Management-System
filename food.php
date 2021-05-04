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
              <th>Type</th>
			  <th>Category</th>
              <th>Price</th>
              <th>Action</th>
          </tr>
          <tr>
              <?php
				$sql = "SELECT * FROM food";
				$result = $conn->query($sql);
				
	 
    while ($row = $result->fetch_assoc()) {
		
	    ?>
        <tr>
            <td><?php echo $row['id']; ?></td> 
            <td><?php echo $row['name']; ?></td>
			<td><?php echo $row['type']; ?></td> 
			<td><?php echo $row['price']; ?></td> 
			<td><form method='post' > 
			<input name='b1' type='submit' value='Edit Price' onclick="javascript: form.action='editfood.php';">
<input type='hidden' name='b1' value=<?php echo $row['id']; ?>>
			</form>
		</td>
        </tr>
        <?php

}			

                 ?>

              </tr>
       </table>
	   </div>
</div>	
