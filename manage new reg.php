
<?php
include('conn.php');
include('header.php');
ob_start();
 ?>

<div class="main">
<div class="content">
<div align="center"><form method="post">
<select name="value">
  	<option>All</option>
	<option>Confirmed</option>
	<option>Cancelled</option>
	<option>Waiting</option>
</select>
<input style="border: 1px solid #F2AA4CFF;
background-color: #F2AA4CFF;
color:#101820FF;
margin: 5px;
width: 80px;
border-radius: 5px;
cursor:pointer;
padding: 5px;
font-size:14px;
font-weight: 600;" type="submit" name="go" value="Go" />
</form></div>
<?php
if(isset($_POST['go'])){
	$value = $_POST['value'];
	
	if($value == 'All' ){
		$value = 'All';
	}elseif($value == 'Waiting'){
		$value = 'Waiting';
	}elseif($value == 'Confirmed'){
		$value = 'Confirmed';
	}else{
		$value = 'Cancelled';
	}

?>
	<h1><?php echo $value; ?></h1>
  <table id="d" width="100%">
          <tr>
              <th>#</th>
              <th>Username</th>
              <th>Category</th>
              <th>Venue</th>
              <th>Person</th>
			   <th>Food</th>
              <th>Date</th>
			  <th>Action</th>
          </tr>
          <tr>
              <?php
			  	if($value != 'All'){
				$sql = "SELECT * FROM customevent WHERE status ='".$value."' ";
				$result = $conn->query($sql);
				}else{
				$sql = "SELECT * FROM customevent";
				$result = $conn->query($sql);
				}
	 
    while ($row = $result->fetch_assoc()) {
		
	    ?>
        <tr>
            <td><?php echo $row['id']; ?></td> 
            <td><?php echo $row['username']; ?></td> 
            <td><?php echo $row['category']; ?></td> 
			<td><?php echo $row['venue']; ?></td> 
            <td><?php echo $row['person']; ?></td> 
			<td><?php echo $row['food']; ?></td> 
            <td><?php echo $row['date']; ?></td> 
			<td><form method='post' > 
			<input name='b1' type='submit' value='View' onclick="javascript: form.action='eventconfirm.php';">
			<input type='hidden' name='b1' value=<?php echo $row['id']; ?>>
			</form>
		</td>
        </tr>
        <?php

}			
    
	 }            ?>

              </tr>
       </table>
	   </div>
</div>	
