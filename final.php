<?php
include('conn.php');
$uname = $_POST['uname'];
$category = $_POST['category'];
$cprice = $_POST['cprice'];
$venue = $_POST['venue'];
$person = $_POST['person'];
$food = $_POST['f'];
$foodtype = $_POST['v'];
$fclass = $_POST['fclass'];
$date = $_POST['date'];
$total = $_POST['total'];
$vprice = $_POST['vprice'];
$fprice = $_POST['fprice'];
$date = $_POST['date'];
$sql = "INSERT INTO customevent (username,category,cprice,venue,vprice,person,food,foodclass,fprice,total,date,status) VALUES('".$uname."',  '".$category."', '".$cprice."', '".$venue."', '".$vprice."', '".$person."', '".$foodtype."', '".$fclass."', '".$fprice."', '".$total."', '".$date."','Waiting')";
$res = $conn->query($sql);
?>