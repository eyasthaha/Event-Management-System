<?php
include('conn.php');
include('home-head.php');
?>
<h1>News</h1>
<?php

$sql = "SELECT * FROM news";
$result = $conn->query($sql);
if($result){
    while($row = $result->fetch_assoc()){
?>
<div class="news">
    <div class="box">
    <h3><?php echo $row['head']; ?></h3>
    <p><?php echo $row['body']; ?></p>
    <div style="font-size:12px;">Date: <?php echo $row['date']; ?></div>
    </div>
</div>    
<?php
             }
           }
?>
<style>
    .news{
        margin-left: 20%;%;
		margin-bottom: 10px;

    }

.box{
border: 1px solid #ccc;
border-radius: 10px;
padding: 5px 20px;
width: 60%;
}
    h1{
    margin-left: 40%;
    text-decoration: underline;
    }
	body{
	background-color: #F3F3F3;
	
	}
</style>