
<style>
body{
position:relative;
margin: 0;
}

.ft{
background-image: url(bg/hbg.jpg);
position: relative;
width: 100%;
height: 300px;
overflow:hidden;
}
h1{
color:#FFFFFF;
text-align:center;
margin-top: 10%;
font-size:36px;
font-weight: bolder;
text-shadow: 4px 2px 4px #000;
}

.name{
margin-left: 60px;
padding-top: 20px;
font-size: 36px;
color: #143D59;
font-weight:bold;
text-decoration:underline;
}

.desc{
position:relative;
margin-left: 60px;
margin-top: 20px;
font-size: 20px;
color: #143D59;
width: 50%;
}

.img{
position: absolute;
margin-left: 10%;
background-color: #fff;
padding: 20px;
border-radius: 5px;
border: 2px solid #143D59;

}
.img p{
text-align:center;
font-weight:bold;
font-size:20px;
color:#999999;
}

.btn{
position:relative;
float:right;
margin-right: 15%; 
}
.btn input[type=submit]{
color:#FFFFFF;
background-color:#FF6633;
border: 2px solid #FF6633;
padding: 30px;
border-radius: 50px;
font-size: 24px;
font-weight:bold;
outline:none;
}
.btn input[type=submit]:hover{
color: #FF6633;
background-color:#FFFFFF;
}
</style>
 <?php
include('conn.php');
include('home-head.php');
$uname = $_SESSION['x'];
if(isset($_POST['bb'])){
$ename = $_POST['bb'];
$sql = "SELECT *FROM event WHERE name='".$ename."' ";
$result = $conn->query($sql);
	if($result){
		$row = $result->fetch_assoc();
 ?>
<div class="ft">
<h1>Event Details</h1>
</div>
<div class="content">
	<div class="name"><?php echo $row['name']; ?></div>
	<div class="desc"><?php echo $row['description']; ?></div>
		  <div class="btn"><form method="post" action="booking.php" ><input type="submit" name="p" value="Book Now">
	  <input name="p" type="hidden" value=<?php echo $row['name'];}} ;?>></form></div>
	<div class="img"><p>SPONSOR</p><?php
	$sql2 = "SELECT * FROM sponsors WHERE name='".$row['sponsor']."' ";
	$res = $conn->query($sql2);
	if($res){
	$row = $res->fetch_assoc();
	 echo '<img src="sponsorimg/'.$row['logo'].'" width="400" height="260"/>';
	 }
	 ?>
	 	 <h3 align="center"><?php echo $row['name']; ?></h3>

	 </div>
</div>

<?php

?>