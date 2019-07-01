<?php
  require "header.php";
 ?>

  <main>
    <h3 id="sign-up">Sign up</h3>
    <?php
        if (isset($_GET['error'])) {
          if ($_GET['error'] == "emptyfields") {
            echo '<p class="fbms">Fill in all fields!</p>';
          } else if ($_GET['error'] == "invalidemailsid") {
            echo '<p class="fbms">Invalid UID and email!</p>';
          } else if ($_GET['error'] == "invalidemail") {
            echo '<p class="fbms">Invalid email!</p>';
          } else if ($_GET['error'] == "invalidsid") {
            echo '<p class="fbms">Invalid UID!</p>';
          } else if ($_GET['error'] == "pwdcheck") {
            echo '<p>Your password does not match!</p>';
          } else if ($_GET['error'] == "sidtaken") {
            echo '<p class="fbms">UID is already taken!</p>';
          } else if ($_GET['error'] == "sqlerror") {
            echo '<p class="fbms">sql error occured!</p>';
          } else if ($_GET['signup'] == "success") {
            echo '<p class="fbms">Signup successfully!</p>';
          }
        }

     ?>
    <form class="col-md-4 signup-form" action="signupProcessing.php" method="post">
      <div class="from-group">
        <input class="form-control" type="text" name="sid" value="" placeholder="UID"><br>
      </div>
      <div class="from-group">
        <input class="form-control" type="text" name="email" value="" placeholder="E-mail"><br>
      </div>
      <div class="from-group">
        <input class="form-control" type="text" name="fname" value="" placeholder="First Name"><br>
      </div>
      <div class="from-group">
        <input class="form-control" type="text" name="lname" value="" placeholder="Last Name"><br>
      </div>
      <div class="from-group">
        <input class="form-control" type="text" name="gender" value="" placeholder="Gender: Male or Female"><br>
      </div>
      <div class="from-group">
        <input class="form-control" type="password" name="pwd" value="" placeholder="Password"><br>
      </div>
      <div class="from-group">
        <input class="form-control" type="password" name="pwd-repeat" value="" placeholder="Repeat Password"><br>
      </div>
      <button class="btn btn-primary" type="submit" name="signup-submit">Submit</button>
    </form>


  </main>



<?php
  require "footer.php";
 ?>
