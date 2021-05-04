

<?php
include('dashboard.css');
?>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<style>
body {
  font-family: 'Josefin Sans', sans-serif;
}

.sidenav {
float:left;
  height: 100%;
  width: 200px;
  position: fixed;
  z-index: 1;
  top: 0;
  left: 0;
  background-color: #101820FF;
  overflow-x: hidden;
}

.sidenav h1{
font-size: 24px;
color: #F2AA4CFF;
padding-left: 15px;
}

.sidenav a, .dropdown-btn {
  padding: 10px 8px 10px 16px;
  text-decoration: none;
  font-size: 15px;
  color: #F2AA4CFF;
  display: block;
  border: none;
  background: none;
  width: 100%;
  text-align: left;
  cursor: pointer;
  outline: none;

}

.sidenav a:hover, .dropdown-btn:hover {
  color: #F2AA4CFF;
  background-color:#000;
}

.main {
  margin-left: 200px; /* Same as the width of the sidenav */
  font-size: 20px; /* Increased text to enable scrolling */
  padding: 0px 10px;
}

.content{
margin-top: 5%;
margin-left: 5%;
}

.active {
  background-color: #000;
  color: #F2AA4CFF;
}

.dropdown-container {
  display: none;
  background-color: #000;
  padding-left: 8px;
}

.dropdown-container a:hover{
color: #999;
}
.sidenav a,.sidenav button{
border-bottom: 1px solid #CCCCCC;
border-bottom: 1px solid rgba(0,0,0,0.05);
border-top: 1px solid rgba(255,255,255,0.05);
}

.fa-caret-down {
  float: right;
  padding-right: 8px;
}
</style>
</head>
<body>

<div class="sidenav">
	<h1>DASHBOARD</h1>
  <a href="dashboard.php">Home</a>
  <button class="dropdown-btn">Category 
    <i class="fa fa-caret-down"></i>
  </button>
  <div class="dropdown-container">
    <a href="addcategory.php">Add</a>
    <a href="managecategory.php">Manage</a>
  </div>
    <a href="managesponsors.php">Manage Sponsors</a>
	<button class="dropdown-btn">Events 
    <i class="fa fa-caret-down"></i>
  </button>
  <div class="dropdown-container">
    <a href="addevent.php">Add</a>
    <a href="manageevent.php">Manage</a>
  </div>
  <button class="dropdown-btn">Venue 
    <i class="fa fa-caret-down"></i>
  </button>
  <div class="dropdown-container">
    <a href="addvenue.php">Add</a>
    <a href="managevenue.php">Manage</a>
  </div>
  <a href="manage new reg.php">New Event Registration</a>
    <a href="food.php">Food</a>
    <a href="manageusers.php">Manage Users</a>
  	<button class="dropdown-btn">Manage Bookings 
    <i class="fa fa-caret-down"></i>
  </button>
  <div class="dropdown-container">
    <a href="allbookings.php">All Bookings</a>
    <a href="newbookings.php">New Bookings</a>
	<a href="cancelledbookings.php">Cancelled Bookings</a>
    <a href="confirmedbookings.php">Confirmed Bookings</a>
  </div>
  <a href="addnews.php">Add News</a>
</div>
<script>
var dropdown = document.getElementsByClassName("dropdown-btn");
var i;

for (i = 0; i < dropdown.length; i++) {
  dropdown[i].addEventListener("click", function() {
  this.classList.toggle("active");
  var dropdownContent = this.nextElementSibling;
  if (dropdownContent.style.display === "block") {
  dropdownContent.style.display = "none";
  } else {
  dropdownContent.style.display = "block";
  }
  });
}
</script>

</body>
</html> 
