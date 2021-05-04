<?php 
include('conn.php');
include('home-head.php');
include('myaccount.css');
ob_start();
$uname = $_SESSION['x'];
$events = "SELECT name FROM category";
	$result = $conn->query($events);
	$options= "";
	$now = date("Y")."-".date("m")."-".date("d");
	$date = date('Y-m-d', strtotime($now. ' +15 days'));
	while ($row = $result->fetch_assoc()){
	
	$options = $options."<option value=$row[name]>$row[name]</option>";
	}

$venues = "SELECT name FROM venue";
	$result2 = $conn->query($venues);
	$options2= "";
	while ($row = $result2->fetch_assoc()){
	
	$options2 = $options2."<option value=$row[name]>$row[name]</option>";
	}
	
	$food = "SELECT name FROM food GROUP BY name";
	$result2 = $conn->query($food);
	$foodclass= "";
	while ($row = $result2->fetch_assoc()){
	
	$foodclass = $foodclass."<option value=$row[name]>$row[name]</option>";
	}
 ?>
 <h1 align="center">Book your event</h1>
 <div class="main">
 <form name="f1" method="post" action="customconfirm.php">
 <table id="d">
	 <tr><td>Username :</td><td><input name="username" type="text" value="<?php echo $uname; ?>" disabled="disabled" /></td></tr> 
	 <tr><td>Event Type :</td><td><select name="category">
	 <?php echo $options ;?>
	 </select></td></tr> 
	 <tr><td>Venue</td><td><select name="venue">
	 <?php echo $options2 ;?>
	 </select></td></tr> 
	 <tr><td>No. of Person</td><td><input name="person" type="text" /></td></tr> 
	 <tr><td>Food</td><td><input name="f" onclick="fd(1)" type="radio" value="yes" />Yes<input name="f" onclick="fd(0)" type="radio" value="no" checked="checked" />No<br>
	 <div id="food" style="display:none; padding: 10px;"><input name="v" type="radio" value="veg" />VEG<input name="v" type="radio" value="non veg"/>Non-VEG<input name="v" type="hidden" value="no" />
	 <br>
	<select name="fclass"><option value="no" selected="selected">Select</option>
	<?php echo $foodclass; ?>
	 </select>	 
	 </div>
	 </td></tr>
	 <tr><td>Date to Conduct</td><td><input name="date" type="date" min="<?php echo $date; ?>" /></td></tr> 
	 <tr><td colspan="2" align="center"><input type="submit" name="submit" value="Book" /></td></tr> 
 </table>
 </form>
 <script>
 <?php
 if(isset($_POST['submit'])){
 	$venue = $_POST['venue'];
	$date = $_POST['date'];
	$person = $_POST['person'];
$food = $_POST['f'];
$foodtype = $_POST['v'];
$fclass = $_POST['fclass'];
 	$sql = "SELECT * FROM customevent WHERE venue = '".$venue."' and date ='".$date."' ";
	echo $sql;
	$res = $conn->query($sql);
	if( $res-> num_rows > 0){
	echo "<script> alert('The date is already booked choose another date or venue');</script>";
	}else{
	header("Location:./customconfirm.php");
	}
 }
 
 ?>
 </script>
 </div>
 <script type="text/javascript">
function fd(x){
	if(x==1){
		document.getElementById('food').style.display='block';
	}
	else
		document.getElementById('food').style.display='none';
return;
	
}
</script>