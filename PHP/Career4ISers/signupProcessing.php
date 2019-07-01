<?php
  if (isset($_POST['signup-submit'])) {
    require 'dbConnect.php';
    $studentID = $_POST['sid'];
    $email = $_POST['email'];
    $fName = $_POST['fname'];
    $lName = $_POST['lname'];
    $gender = $_POST['gender'];
    $pwd = $_POST['pwd'];
    $pwdRepeat = $_POST['pwd-repeat'];

    if (empty($studentID) || empty($email) || empty($fName) || empty($lName) || empty($gender) || empty($pwd) || empty($pwdRepeat)) {
      header("Location: signup.php?error=emptyfields&sid=".$studentID."&email=".$email."&fname=".$fName."&lname=".$lName."&gender=".$gender);
      exit();
    }
    else if (!filter_var($email, FILTER_VALIDATE_EMAIL) && !preg_match("/^[0-9]{9}$/",$studentID)) {
      header("Location: signup.php?error=invalidemailsid&fname=".$fName."&lname=".$lName."&gender=".$gender);
      exit();

    }
    else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
      header("Location: signup.php?error=invalidemail&sid=".$studentID."fname=".$fName."&lname=".$lName."&gender=".$gender);
      exit();
    }
    else if (!preg_match("/^[0-9]{9}$/",$studentID)) {
      header("Location: signup.php?error=invalidsid&email=".$email."fname=".$fName."&lname=".$lName."&gender=".$gender);
      exit();
    }
    else if ($pwd !== $pwdRepeat) {
      header("Location: signup.php?error=pwdcheck&sid=".$studentID."&email=".$email."&fname=".$fName."&lname=".$lName."&gender=".$gender);
      exit();
    }
    else {
      $sql = "SELECT studentID FROM Student WHERE studentID=?";
      $stmt = mysqli_stmt_init($conn);
      if (!mysqli_stmt_prepare($stmt,$sql)) {
        header("Location: signup.php?error=sqlerror");
        exit();
      }
      else {
        mysqli_stmt_bind_param($stmt, "s", $studentID);
        mysqli_stmt_execute($stmt);
        mysqli_stmt_store_result($stmt);
        $resultCheck = mysqli_stmt_num_rows($stmt);
        if ($resultCheck > 0) {
          header("Location: signup.php?error=sidtaken&email=".$email."fname=".$fName."&lname=".$lName."&gender=".$gender);
          exit();
        }
        else {
          $sql = "INSERT INTO Student VALUES (?,?,?,?,?,?)";
          if (!mysqli_stmt_prepare($stmt,$sql)) {
            header("Location: signup.php?error=sqlerror");
            exit();
          }
          else {
            $hashedPwd = password_hash($pwd, PASSWORD_DEFAULT);
            mysqli_stmt_bind_param($stmt, "isssss", $studentID,$email,$fName,$lName,$gender,$hashedPwd);
            mysqli_stmt_execute($stmt);
            mysqli_stmt_store_result($stmt);
            header("Location: signup.php?signup=success");
            exit();
          }

        }
      }
    }
    mysqli_stmt_close($stmt);
    mysqli_close($conn);

  }
    else {
      header("Location: signup.php");
      exit();
    }







 ?>
