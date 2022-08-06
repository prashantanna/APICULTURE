<?php

session_start();

if(!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !==true)
{
    header("location: login.php");
}


?>


<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <title>Honey Buzz - Welcome!</title>
    <style>
      body{
    margin: 0px;
    background-color: #FEF7DC;
    color: #ff8200;
    background-image: url('img/bg3.jpg');
    background-repeat: no-repeat;
    background-attachment: fixed;
    background-size: 100% 100%;
    text-align: center;
    }

.navbar-brand {
    display: inline-block;
    padding-top: .9125rem;
    padding-bottom: .3125rem;
    margin-right: 11rem;
    font-size: 2.5rem;
    line-height: inherit;
    white-space: nowrap;
}

.navbarNavDropdown{
  color : #000;
}

.navbar-nav {
    display: -webkit-box;
    display: -ms-flexbox;
    display: flex;
    -webkit-box-orient: vertical;
    -webkit-box-direction: normal;
    -ms-flex-direction: column;
    flex-direction: column;
    padding-left: 0;
    margin-bottom: 0;
    /* margin-right: 19.5rem; */
    list-style: none;
}
.cart{
    position:absolute;
    right: 20px;
}
#title .btn-primary {
    color: #fff;
    background-color:rgb(243, 183, 71);
    border-color: rgb(243, 183, 71);
    margin-right: 16px;
}
.product-heading{
    text-align: center;
    color: white;
    position: relative;
    top: 145px;
    font-size: 4rem;
        font-family: 'Montserrat', sans-serif;
  font-weight: bolder;
}
.fa-cart-plus{
    color: #000;
}

.form-control{
  width: 400px;
  height: 35px;
  border: 1px solid blue;
}
span{
  color: #fff;
  text-decoration: none;
  font-size: small;
}
#title .btn-primary:hover {
    color: #fff;
    background-color: rgb(248, 164, 9);
    border-color: rgb(248, 164, 9);
}

.btn-primary:hover {
    color: #fff;
    background-color: rgb(248, 164, 9);
    border-color: rgb(248, 164, 9);
}
    </style>
  </head>

  <body>
  <nav class="navbar navbar-expand-lg navbar-dark">
    <a href="" class="navbar-brand">Honey Buzz</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo01"
      aria-controls="navbarTogglerDemo01" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNavDropdown">
      <ul class="navbar-nav">
        <li class="nav-item ">
          <a class="nav-link nav-item" href="index.html">Home</a>
        </li>
        <li class="nav-item ">
          <a class="nav-link nav-item" href="products.html">Products <span class="sr-only">(current)</span></a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Services</a>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link nav-item dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            More
          </a>
          <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
            <a class="dropdown-item" href="about.html">About Us</a>
            <a class="dropdown-item" href="#">Blog</a>
            <a class="dropdown-item" href="contact.html">Contact Us</a>
          </div>
        </li>
          <li class="nav-item">
          <a class="nav-link" href="logout.php">Logout</a>
        </li>
      </ul> 
    </div>
    <div class="navbar-collapse collapse">
    <ul class="navbar-nav ml-auto">
      <li class="nav-item active">
        <a class="nav-link" href="#"> <img width = "25px" src="https://img.icons8.com/office/2x/user.png"> <?php echo "". $_SESSION['username']?></a>
      </li>
    </ul>
  </div>
  </nav>

<div class="container mt-4">
<h3 ><?php echo "Welcome ". $_SESSION['username']?>! You can now use this website</h3>
<hr>

<div>
  <h4>Click Here to go to home page</h4>
  <a href="index.html" type="button" class="btn btn-primary nav-log-in" >Home Page</a>
</div>
</div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>
