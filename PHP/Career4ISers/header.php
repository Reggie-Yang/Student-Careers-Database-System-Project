<?php
session_start();

 ?>
<!DOCTYPE html>
<html lang="en" >
  <head>
    <meta charset="utf-8">
    <meta name="view point" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
    <link rel="stylesheet" href="css/our.css">
    <title></title>
  </head>
  <body>
    <nav class="navbar navbar-dark navbar-expand-sm fixed-top">
        <div class="container">
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#Navbar">
               <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="Navbar">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item active"><a class="nav-link" href="main.php"><span class="fa fa-home fa-lg"></span>Home</a></li>
                    <li class="nav-item"><a class="nav-link" href="#"><span class="fa fa-info fa-lg"></span>About</a></li>
                    <li class="nav-item"><a class="nav-link" href="#"><span class="fa fa-address-card fa-lg"></span>Contact</a></li>
                </ul>
                <span class="navbar-text">
                  <?php
                  if (isset($_SESSION['studentId'])) {
                    echo '<a data-toggle="modal" data-target="#logoutModal" href="logoutProcessing.php">
                        <span class="fa fa-sign-out"></span>Logout
                        </a>
                          ';
                  }
                   ?>
                </span>
            </div>
        </div>
    </nav>
    <div class="container">
      <div class="jumbotron">
        <h1 id="C4I" class="display-4">Career4ISers</h1>
        <p class="lead">Help ISers to find more career opportunities</p>
      </div>

    <header>

              <?php
                // if (isset($_SESSION['studentId'])) {
                //   echo '<form class="" action="logoutProcessing.php" method="post">
                //         <button class="logout-submit" type="submit" name="logout-submit">Log out</button>
                //         </form>
                //         ';
                // } else {
                 if (!isset($_SESSION['studentId'])) {
                  echo '<form class="lginform col-md-4" action="loginProcessing.php" method="post">
                        <div class="form-group">
                          <input class="form-control" type="text" name="sidmail" value="" placeholder="UID or E-mail">
                        </div>
                        <div class="form-group">
                          <input class="form-control" type="password" name="pwd" value="" placeholder="Password">
                        </div>
                        <button class="btn btn-primary" type="submit" name="login-submit">Login</button>
                        <a href="signup.php"><button class="btn btn-primary" type="button" name="button">Sign up</button></a>
                        </form>';
                 }
               ?>




    </header>
