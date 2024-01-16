<?php
     $login=false;
     $showError=false;
    if($_SERVER['REQUEST_METHOD']=="POST"){
       
        include('partials/_dbconnect.php');
        $username=$_POST["username"];
        $password=$_POST["password"];

    
       // $sql="Select * from users where username='$username' AND password='$password'";
        $sql="Select * from users where username='$username'";  
        
        $result=mysqli_query($conn,$sql);
        $num=mysqli_num_rows($result);
        if($num == 1){
            while($row=mysqli_fetch_assoc($result)){
                if(password_verify($password,$row['password'])){
                    $login=true;
                    session_start();
                    $_SESSION['loggedin']=true;
                    $_SESSION['username']=$username;
                    header("location:welcome.php");
                }
                else{
                    $showError="Invalid credentials";
                }
            }
            
        }
        else{
            $showError="Invalid credentials";
        }
    }
    

?>



<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
    <link rel="stylesheet" href="stylesheet/style.css">
   
    <title>Login</title>
  </head>
  <body>
    <?php require 'partials/_nav.php' ?>
    <?php 
        if($login){
        echo '
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Success</strong> You are Logged In! 
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>';
     }
     if($showError){
        echo '
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong>Error!</strong> '.$showError.'
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>';
     }
    ?>
       
    <div class="container">
	<div class="d-flex justify-content-center h-100">
		<div class="card">
			<div class="card-header d-flex justify-content-center">
				<h3>Sign In</h3>
			</div>
			<div class="card-body">
                <form action="/Loginsys/login.php" method="post">
					<div class="input-group form-group">
						<div class="input-group-prepend">
							<span class="input-group-text"><i class="fas fa-user"></i></span>
						</div>
						<input type="text" class="form-control" placeholder="username" id="username" name="username">
						
					</div>
					<div class="input-group form-group">
						<div class="input-group-prepend">
							<span class="input-group-text"><i class="fas fa-key"></i></span>
						</div>
						<input type="password" class="form-control" placeholder="password" id="password" name="password">
					</div>
					<div class="d-flex justify-content-center mt-3 login_container ">
						<input type="submit" value="Login" class="btn float-left login_btn">
					</div>
				</form>
        </div>  
		</div>
	</div>
</div>



    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: jQuery and Bootstrap Bundle (includes Popper) -->
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.min.js" integrity="sha384-+sLIOodYLS7CIrQpBjl+C7nPvqq+FbNUBDunl/OZv93DB7Ln/533i8e/mZXLi/P+" crossorigin="anonymous"></script>
    -->
   
  
  