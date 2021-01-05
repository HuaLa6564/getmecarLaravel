<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
.dropbtn {
  background-color: #42A0D7;
  color: white;
  padding: 16px;
  font-size: 16px;
  border: none;
}

.dropdown {
  position: relative;
  display: inline-block;
}

.dropdown-content {
  display: none;
  position: absolute;
  background-color: #5D7ACA;
  min-width: 160px;
  box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
  z-index: 1;
}

.dropdown-content a {
  color: black;
  padding: 12px 16px;
  text-decoration: none;
  display: block;
}

.dropdown-content a:hover {background-color: #ddd;}

.dropdown:hover .dropdown-content {display: block;}

.dropdown:hover .dropbtn {background-color: #5D7ACA;}

body {
  /* margin: 0; */
  font-family: Arial, Helvetica, sans-serif;
}

.topnav {
  
  background-color: #333;
}

.topnav a {
  float: left;
  color: #f2f2f2;
  text-align: center;
  padding: 14px 16px;
  text-decoration: none;
  font-size: 17px;
}

.topnav a:hover {
  background-color: #30b9d1;
  color: black;
}

.topnav a.active {
  background-color: ##30b9d1;
  color: black;
}

.container{
  background-image: url("https://wallpaper.dog/large/10719516.png");
  /* background-color: #00BFFF; */
  height: 100%;
  width: 100%;
  background-position: center;
  background-repeat: no-repeat;
  background-size: cover;
}
</style>
</head>
<body class="container">
<!-- <div class="topnav">
  <a class="active" href="{{ url('/') }}">Get Me Car</a>
  <a href="{{ url('/admin') }}">Admin</a>
  <a href="{{ url('/employee') }}">Employee</a>
  <a href="{{ url('/customers') }}">Customers</a>
  <a href="{{ url('/booking') }}">Booking</a>
  <a href="{{ url('/map') }}">Map</a> -->
  <div class="dropdown">
  <a href="{{ url('/') }}"><button class="dropbtn" >Home</button></a>
  </div>
  <div class="dropdown">
  <a href="{{ url('/map') }}"><button class="dropbtn" >Map</button></a>
  </div>
<div class="dropdown">
  <button class="dropbtn">Admin</button>
  <div class="dropdown-content">
    <a href="{{ url('/admin/add') }}">Add Admin</a>
    <a href="{{ url('/admin/list') }}">List of Admin</a>
  </div>
</div>
<div class="dropdown">
  <button class="dropbtn">Employee</button>
  <div class="dropdown-content">
    <a href="{{ url('/employee/add') }}">Add Employee</a>
    <a href="{{ url('/employee/list') }}">List of Employee</a>
  </div>
</div>
<div class="dropdown">
  <button class="dropbtn">Customers</button>
  <div class="dropdown-content">
    <a href="{{ url('/customer/add') }}">Add Customers</a>
    <a href="{{ url('/customer/list') }}">List of Customers</a>
  </div>
</div>
<div class="dropdown">
  <button class="dropbtn">Booking</button>
  <div class="dropdown-content">
    <a href="{{ url('/booking/add') }}">Add Booking</a>
    <a href="{{ url('/booking/list') }}">List of Booking</a>
  </div>
</div>
<div class="dropdown">
  <button class="dropbtn">Cars</button>
  <div class="dropdown-content">
    <a href="{{ url('/car/add') }}">Add Cars</a>
    <a href="{{ url('/car/list') }}">List of Cars</a>
  </div>
</div>
<!-- </div> -->


</body>
</html>
