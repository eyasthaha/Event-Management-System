
<style>
body{
font-family: 'Josefin Sans', sans-serif;
margin:0;
}
div.head{
position:relative;
width: 100%;
height: 50px;
background-color:#143D59;
margin: 0;
}

.head li{
list-style-type:none;
display: inline;
padding: 10px;
color: #FFFFFF;
cursor:pointer;
font-weight:700;
}

.head li:hover{
color: #CCCCCC;
}

.head ul{
float:right;
margin-right: 20px;
}

.head h3{
color: #F4B41A;
padding: 15px;
}
a{
color:#fff;
text-decoration: none;
}
a:hover{
color:#F4B41A;
}
</style>

<div class="head">
<ul>
<li><a href="home.php">Home</a></li>
<li><a href="news.php">News</a></li>
<li><a href="about.php">About</a></li>
<li><a href="myaccount.php">My Account</a></li>
<li style="color:#F4B41A; font-weight:700;"><?php	
	session_start();
	$name = $_SESSION['y'];
	echo "Hi, $name";
	?></li>
	<li><a href="logout.php">Logout</a></li>
</ul>
<a href="home.php"><h3>Event Management</h3></a>

</div>