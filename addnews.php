<?php 
include('conn.php');
include('header.php');

?>
<div class="main">
    <div class="content">
    <form method="post">
        <h1>Add News</h1>
        <table id="c">
            <tr><td>Headlines</td><td><input type="text" name="n1"></td></tr>
            <tr><td>Description</td><td><textarea name="n2"></textarea></td></tr> 
            <tr><td align="center" colspan="2"><input type="submit" name="submit" value="Add"></td></tr> 
        </table>
    </form>
    </div>
</div>
<?php
if(isset($_POST['submit'])){
    $head = $_POST['n1'];
    $body = $_POST['n2'];
    $date = date("Y")."-".date("m")."-".date("d");
    $sql ="INSERT INTO news (head,body,date) VALUES('".$head."','".$body."','".$date."')";
    $result = $conn->query($sql);
    if($result){
        echo "<script> alert('News added'); </script>";
    }
    
}
?>