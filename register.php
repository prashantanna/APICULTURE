<?php
require_once "config.php";

$username = $password = $confirm_password = "";
$username_err = $password_err = $confirm_password_err = "";

if ($_SERVER['REQUEST_METHOD'] == "POST"){

    // Check if username is empty
    if(empty(trim($_POST["username"]))){
        $username_err = "Username cannot be blank";
    }
    else{
        $sql = "SELECT id FROM users WHERE username = ?";
        $stmt = mysqli_prepare($conn, $sql);
        if($stmt)
        {
            mysqli_stmt_bind_param($stmt, "s", $param_username);

            // Set the value of param username
            $param_username = trim($_POST['username']);

            // Try to execute this statement
            if(mysqli_stmt_execute($stmt)){
                mysqli_stmt_store_result($stmt);
                if(mysqli_stmt_num_rows($stmt) == 1)
                {
                    $username_err = "This username is already taken"; 
                }
                else{
                    $username = trim($_POST['username']);
                }
            }
            else{
                echo "Something went wrong";
            }
        }
    }

    mysqli_stmt_close($stmt);


// Check for password
if(empty(trim($_POST['password']))){
    $password_err = "Password cannot be blank";
}
elseif(strlen(trim($_POST['password'])) < 5){
    $password_err = "Password cannot be less than 5 characters";
}
else{
    $password = trim($_POST['password']);
}

// Check for confirm password field
if(trim($_POST['password']) !=  trim($_POST['confirm_password'])){
    $password_err = "Passwords should match";
}


// If there were no errors, go ahead and insert into the database
if(empty($username_err) && empty($password_err) && empty($confirm_password_err))
{
    $sql = "INSERT INTO users (username, password) VALUES (?, ?)";
    $stmt = mysqli_prepare($conn, $sql);
    if ($stmt)
    {
        mysqli_stmt_bind_param($stmt, "ss", $param_username, $param_password);

        // Set these parameters
        $param_username = $username;
        $param_password = password_hash($password, PASSWORD_DEFAULT);

        // Try to execute the query
        if (mysqli_stmt_execute($stmt))
        {
            header("location: login.php");
        }
        else{
            echo "Something went wrong... cannot redirect!";
        }
    }
    mysqli_stmt_close($stmt);
}
mysqli_close($conn);
}

?>




<!doctype html>
<html lang="en">
<head>
 
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <title>Honey Buzz - Sign-In</title>
    <style>
body{
    margin : 0px;
    background-color: #FEF7DC;
    color: #ff8200;
    background-image: url('img/bg3.jpg');
    background-repeat: no-repeat;
    background-size: 100% 100%;
    margin-bottom: 25px
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
    margin-left: 18px ;
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

</style>
</head>


<body>
  
<section id="title" >
<div class="bg-img">
  <nav class="navbar navbar-expand-lg navbar-dark">
    <a href="" class="navbar-brand">Honey Buzz</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo01"
      aria-controls="navbarTogglerDemo01" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNavDropdown">
      <ul class="navbar-nav">
        <li class="nav-item ">
          <a class="nav-link nav-item" href="#">Home</a>
        </li>
        <li class="nav-item ">
          <a class="nav-link nav-item" href="#">Products <span class="sr-only">(current)</span></a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Services</a>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link nav-item dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            More
          </a>
          <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
            <a class="dropdown-item" href="#">About Us</a>
            <a class="dropdown-item" href="#">Blog</a>
            <a class="dropdown-item" href="#">Contact Us</a>
          </div>
        </li>
       
      </ul> 
    </div>
    <a href="login.php" type="button" class="btn btn-primary nav-log-in" >Login</a>
  </nav>
</div>


<div class="container mt-4">
<h3 style="color: orange;">Sign-In</h3>

<hr>
<form action="" method="post">
    
    <div class="form-group col-md-6">
      <label for="inputName">Name</label>
      <input type="text" class="form-control" name="name"  placeholder="Enter your name">
    </div>

    <div class="form-group col-md-6">
      <label for="inputAddress2">Address </label>
      <input type="text" class="form-control" id="inputAddress2" placeholder="Address">
    </div>
  
    <div class="form-group col-md-6">
      <label for="inputCity">City</label>
      <input type="text" class="form-control" id="inputCity" placeholder = "eg. Nagpur">
    </div>

    <div class="form-group col-md-2">
      <label for="inputZip">Mobile Number</label>
      <input type="tel" class="form-control" id="inputphone" placeholder = "+91 XXXXXXXXXX" >
    </div>

    <div class="form-group col-md-4">
      <label for="inputState">State</label>
      <select id="inputState" class="form-control">
        <option selected>Choose...</option>
<option value="Andhra Pradesh">Andhra Pradesh</option>
<option value="Andaman and Nicobar Islands">Andaman and Nicobar Islands</option>
<option value="Arunachal Pradesh">Arunachal Pradesh</option>
<option value="Assam">Assam</option>
<option value="Bihar">Bihar</option>
<option value="Chandigarh">Chandigarh</option>
<option value="Chhattisgarh">Chhattisgarh</option>
<option value="Dadar and Nagar Haveli">Dadar and Nagar Haveli</option>
<option value="Daman and Diu">Daman and Diu</option>
<option value="Delhi">Delhi</option>
<option value="Lakshadweep">Lakshadweep</option>
<option value="Puducherry">Puducherry</option>
<option value="Goa">Goa</option>
<option value="Gujarat">Gujarat</option>
<option value="Haryana">Haryana</option>
<option value="Himachal Pradesh">Himachal Pradesh</option>
<option value="Jammu and Kashmir">Jammu and Kashmir</option>
<option value="Jharkhand">Jharkhand</option>
<option value="Karnataka">Karnataka</option>
<option value="Kerala">Kerala</option>
<option value="Madhya Pradesh">Madhya Pradesh</option>
<option value="Maharashtra">Maharashtra</option>
<option value="Manipur">Manipur</option>
<option value="Meghalaya">Meghalaya</option>
<option value="Mizoram">Mizoram</option>
<option value="Nagaland">Nagaland</option>
<option value="Odisha">Odisha</option>
<option value="Punjab">Punjab</option>
<option value="Rajasthan">Rajasthan</option>
<option value="Sikkim">Sikkim</option>
<option value="Tamil Nadu">Tamil Nadu</option>
<option value="Telangana">Telangana</option>
<option value="Tripura">Tripura</option>
<option value="Uttar Pradesh">Uttar Pradesh</option>
<option value="Uttarakhand">Uttarakhand</option>
<option value="West Bengal">West Bengal</option>
</select>
      </div>
    <div class="form-group col-md-6">
      <label for="inputEmail4">Email </label>
      <input type="text" class="form-control" name="username" id="inputEmail4" placeholder="Enter your email">
    </div>
    <div class="form-group col-md-6">
      <label for="inputPassword4">Password</label>
      <input type="password" class="form-control" name="password" id="inputPassword4" placeholder="Enter your password">
    </div>
  
    <div class="form-group col-md-6">
      <label for="inputPassword4">Confirm Password</label>
      <input type="password" class="form-control" name="confirm_password" id="inputPassword"  placeholder="Confirm your password">
    </div>
     
  
  <button type="submit" class="btn btn-primary">Sign in</button>
</form>
</div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>
