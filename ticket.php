<style>

.tkt{
position:absolute;
margin: 5% 10%;
border:1px solid #999999;
padding: 50px;
width:auto;
}

button{
border: 1px solid #143D59;
background: #143D59;
color: #FFFFFF;
font-weight:700;
width: 100px;
padding: 8px 16px;
border-radius: 5px;
margin-left: 40%;
margin-top: 20px;
cursor: pointer;
}

button:hover{
border: 1px solid #143D59;
background: #fff;
color: #143D59;
}

.name{
position:absolute;
font-size:70px;
font-weight:bolder;
color:#FFF;
margin-left: 35%;
margin-top: 7%;
}
.id{
position:absolute;
padding-left: 30px;
padding-top: 30px;
font-size:20px;
font-weight:700;
color:#FFFFFF;
}
.admit{
position:absolute;
}

</style>
<head>
<title>Pass</title>
</head>
<?php include('conn.php');
include('home-head.php'); 
if(isset($_POST['yy'])){
$id = $_POST['yy'];
$sql = "SELECT * FROM booking WHERE id='".$id."'";
$result = $conn->query($sql);
if($row = $result->fetch_assoc()){
$tktid = '#EMS'.$row['id'].$row['username'];
?>
<div id="tkt" class="tkt">
<div class="name"><?php echo $row['event']; ?></div>
<div class="id">Ticket No: <?php echo $tktid; ?></div>
<img src="bg/tkt.png" width="960" height="360" />
<div class="admit">Admit: <?php echo $row['person']; ?></div>
</div>
<button onClick="printDiv('tkt')" name="b1">Print</button>
<?php
}
}
?>
<script>
function printDiv(tkt) {
     var printContents = document.getElementById(tkt).innerHTML;
     var originalContents = document.body.innerHTML;

     document.body.innerHTML = printContents;

     window.print();

     document.body.innerHTML = originalContents;
}
</script>