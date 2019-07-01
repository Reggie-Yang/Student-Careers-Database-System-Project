<?php
  require "header.php";
 ?>

  <main>

      <?php
          if (isset($_SESSION['studentId'])) {
            echo '
            <hr>
            <div class="searchb">
            <a href="searchJob.php"><button type="button" class="btn btn-success btn-lg" name="button">Search Job</button></a>
            <a href="searchEvent.php"><button type="button" class="btn btn-danger btn-lg" name="button">Search Event</button></a>
            </div>';
          }
       ?>



  </main>



<?php
  require "footer.php";

 ?>
