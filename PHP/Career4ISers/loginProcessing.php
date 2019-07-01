<?php

if (isset($_POST['login-submit'])) {
  require "dbConnect.php";
  $sidmail = $_POST['sidmail'];
  $pwd = $_POST['pwd'];
  if (empty($sidmail) || empty($pwd)) {
    header("Location: main.php?error=emptyfields");
    exit();
  } else {
    $sql = "SELECT * FROM Student WHERE studentId = ? OR studentEmail = ?;";
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt,$sql)) {
      header("Location: main.php?error=sqlerror");
      exit();
  } else {
    mysqli_stmt_bind_param($stmt, "is", $sidmail, $sidmail);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);
    if ($row = mysqli_fetch_assoc($result)) {
      $pwdCheck = password_verify($pwd, $row['pwd']);
      if ($pwdCheck == false) {
        header("Location: main.php?error=wrongpwd");
        exit();
      } else if ($pwdCheck == true) {
        session_start();
        $_SESSION['studentId'] = $row['studentId'];
        header("Location: main.php?login=success");
        exit();
      }
      else {
        header("Location: main.php?error=wrongpwd");
        exit();
      }
    } else {
      header("Location: main.php?error=wrongsidmail");
      exit();
    }

  }
 }
}

?>
