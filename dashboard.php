<?php
//start the session ..
session_start();

 if(isset($_SESSION['currUser']))
 {

 }else{
    header("Location:/");
 }




?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="/assets/img/favicon.png"/>
    <!-- Latest compiled and minified CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="stylesheet" href="assets/css/style.css">
    <title>Dasgboard:User</title>
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">
    <img src="assets/img/logo_2.png"
                          style="width: 185px;height:50px;" alt="logo">

    </a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon accId"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="#">News</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Order Items</a>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            My Products
          </a>
          <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
            <li><a class="dropdown-item" href="#">Services</a></li>
           </ul>
        </li>
      </ul>
      <form class="d-flex">
        <!--
        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
        -->
        <button class="btn btn-outline-success accId" id="accId">MyAccount</button>
      </form>
    </div>
  </div>
</nav>
<div class="container-fluid">
    <div class="container">
        <h4 class="text-center pt-5 ">Welcome to Dashboard</h4>
        <h5 class="text-center pt-5">Soon ,Profile Data is updated!!!</h5>
    </div>
</div>

<div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvas-dash" aria-labelledby="offcanvasLabel">
  <div class="offcanvas-header">
    <h5 class="offcanvas-title" id="offcanvasLabel">Welcome ,...</h5>
    <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close" id="close-prof"></button>
  </div>
  <div class="offcanvas-body">
    <h6>All Settings Come here !!!</h6>
    <a href="/signout.php" class="btn">Sign Out</a>
</div>
</div>
<!-- OVER LAYER-->  
<div id="overlayer"></div>   
  <div id="loading"><div class="lds-ripple" style="display: inline-block;"><div></div><div></div></div> <span>Please Wait...</span></div> 

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
<script src="assets/js/main.js"></script>
</body>
</html>