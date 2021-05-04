<?php
include('conn.php');
include('myaccount.css');
session_start();
$uname = $_SESSION['x'];
$category = $_POST['category'];
$venue = $_POST['venue'];
$person = $_POST['person'];
$food = $_POST['f'];
$foodtype = $_POST['v'];
$fclass = $_POST['fclass'];
$date = $_POST['date'];
$c = "SELECT price FROM category WHERE name = '".$category."' ";
$r = $conn->query($c);
	if($row = $r->fetch_assoc()){
		$cprice = $row['price'];
	}
 ?>
<form method="post" action="final.php">
<table id='d'>
<tr><td>Username</td><td><input readonly type="text" name="uname" value="<?php echo $uname ?>" /></td></tr>
<tr><td>Category</td><td><input readonly type="text" name="category" value="<?php echo $category ?>" /></td></tr>
<tr><td>Category Price</td><td><input readonly type="text" name="cprice" value="<?php echo $cprice ?>"  /></td></tr>
<tr><td>Venue</td><td><input readonly type="text" name="venue" value="<?php echo $venue ?>"  /></td></tr>
<tr><td>Event Date</td><td><input readonly type="text" name="date" value="<?php echo $date ?>"  /></td></tr>
<tr><td>No. of Person</td><td><input readonly type="text" name="person" value="<?php echo $person ?>" /></td></tr>
<tr><td>Food</td><td><input readonly type="text" name="f" value="<?php echo $food ?>" /></td></tr>
<tr><td>Food Type</td><td><input readonly type="text" name="v" value="<?php echo $foodtype ?>" /></td></tr>
<tr><td>Food Class</td><td><input readonly type="text" name="fclass" value="<?php echo $fclass ?>" /></td></tr>
<tr><td>Total Amount</td><td>
<?php
	$v = "SELECT price from venue WHERE name = '".$venue."' ";
	$res1 = $conn->query($v);
	if($row = $res1->fetch_assoc()){
		$vprice = $row['price'];
	}
	$fprice = '0';
	if($food == 'yes'){
		$f = "SELECT type,price FROM food WHERE type = '".$foodtype."' and name = '".$fclass."'  ";
				$res2 = $conn->query($f);
		if($row = $res2->fetch_assoc()){
			$fprice = $row['price'];
		}
		
	}
	$total = $vprice + ($fprice * $person) + $cprice;
	echo $total;
	
?><input name="total" type="hidden" value="<?php echo $total ?>"  />
<input name="vprice" type="hidden" value="<?php echo $vprice ?>"  />
<input name="fprice" type="hidden" value="<?php echo $fprice ?>"  />
</td></tr>
<tr><td align="center" colspan="2"><input type="submit" value="Confirm" name="submit" /></td></tr>
</table>
</form>

