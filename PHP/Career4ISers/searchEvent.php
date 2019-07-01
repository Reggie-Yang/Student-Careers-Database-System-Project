<?php
  require "header.php";
 ?>

  <main>

      <?php
          if (!isset($_SESSION['studentId'])) {
            header("Location: main.php");
            exit();
          }
       ?>

       <form class="form-inline" action="<?php $_SERVER['PHP_SELF'] ?>" method="post">
         <p>
         <strong>Event Type</strong>
         <select name="eventType" class="custom-select my-1 mr-sm-2">
           <option value="*" selected>All</option>
           <option value="cf">Career Fair</option>
           <option value="other">Other</option>
         </select>
         <button type="submit" class="btn btn-primary my-1" name="searche-submit">Search</button>
         </p>
       </form>

       <?php
          if (isset($_POST["searche-submit"])) {
            require_once "dbConnect.php";
            if ($_POST["eventType"] == "*") {
              $sqlQuery = "SELECT * FROM CareerEvent";
              $result = mysqli_query($conn, $sqlQuery);
              if ($result) {
                $numberOfRows = mysqli_num_rows($result);
                if ($numberOfRows > 0) {
                    echo "<table border=\"1\"><tr><th>Event Name</th><th>Location</th><th>Date</th></tr>";
                    while ($recordArray = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
                      echo "<tr><td>$recordArray[eventName]</td><td>$recordArray[eventLocation]</td><td>$recordArray[eventDate]</td></tr>";
                      $sql2 = "SELECT * FROM SearchE WHERE studentId = '{$_SESSION["studentId"]}' AND eventId = '$recordArray[eventId]';";
                      $result2 = mysqli_query($conn, $sql2);
                      if ($result2) {
                        $eventRows = mysqli_num_rows($result2);
                        if ($eventRows == 0) {
                          $sqlinsert = "INSERT INTO SearchE VALUES ('{$_SESSION["studentId"]}','$recordArray[eventId]'); ";
                          $resultInsert = mysqli_query($conn, $sqlinsert);
                        }
                      }
                     }
                     echo "</table>";
                 } else {
                   echo "<h2>Can not find any result</h2>";
                 }
                 mysqli_free_result($result);
                 mysqli_free_result($result2);
              } else {
                 echo "Retrieving records failed.".mysqli_error($conn);
              }
              mysqli_close($conn);
            }
            else if ($_POST["eventType"] == "cf") {
              $sqlQuery = "SELECT * FROM CareerEvent WHERE eventName LIKE '%Career%' OR eventName LIKE '%Fair%'";
              $result = mysqli_query($conn, $sqlQuery);
              if ($result) {
                $numberOfRows = mysqli_num_rows($result);
                if ($numberOfRows > 0) {
                    echo "<table border=\"1\"><tr><th>Event Name</th><th>Location</th><th>Date</th></tr>";
                    while ($recordArray = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
                      echo "<tr><td>$recordArray[eventName]</td><td>$recordArray[eventLocation]</td><td>$recordArray[eventDate]</td></tr>";
                      $sql2 = "SELECT * FROM SearchE WHERE studentId = '{$_SESSION["studentId"]}' AND eventId = '$recordArray[eventId]';";
                      $result2 = mysqli_query($conn, $sql2);
                      if ($result2) {
                        $eventRows = mysqli_num_rows($result2);
                        if ($eventRows == 0) {
                          $sqlinsert = "INSERT INTO SearchE VALUES ('{$_SESSION["studentId"]}','$recordArray[eventId]'); ";
                          $resultInsert = mysqli_query($conn, $sqlinsert);
                        }
                      }
                     }
                     echo "</table>";
                 } else {
                   echo "<h2>Can not find any result</h2>";
                 }
                 mysqli_free_result($result);
                 mysqli_free_result($result2);
              } else {
                 echo "Retrieving records failed.".mysqli_error($conn);
              }
              mysqli_close($conn);
            }

            else if ($_POST["eventType"] == "other") {
              $sqlQuery = "SELECT * FROM CareerEvent WHERE eventName NOT LIKE '%Career%' AND eventName NOT LIKE '%Fair%'";
              $result = mysqli_query($conn, $sqlQuery);
              if ($result) {
                $numberOfRows = mysqli_num_rows($result);
                if ($numberOfRows > 0) {
                    echo "<table border=\"1\"><tr><th>Event Name</th><th>Location</th><th>Date</th></tr>";
                    while ($recordArray = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
                      echo "<tr><td>$recordArray[eventName]</td><td>$recordArray[eventLocation]</td><td>$recordArray[eventDate]</td></tr>";
                      $sql2 = "SELECT * FROM SearchE WHERE studentId = '{$_SESSION["studentId"]}' AND eventId = '$recordArray[eventId]';";
                      $result2 = mysqli_query($conn, $sql2);
                      if ($result2) {
                        $eventRows = mysqli_num_rows($result2);
                        if ($eventRows == 0) {
                          $sqlinsert = "INSERT INTO SearchE VALUES ('{$_SESSION["studentId"]}','$recordArray[eventId]'); ";
                          $resultInsert = mysqli_query($conn, $sqlinsert);
                        }
                      }
                     }
                     echo "</table>";
                 } else {
                   echo "<h2>Can not find any result</h2>";
                 }
                 mysqli_free_result($result);
                 mysqli_free_result($result2);
              } else {
                 echo "Retrieving records failed.".mysqli_error($conn);
              }
              mysqli_close($conn);
            }




          }



        ?>



  </main>



<?php
  require "footer.php";

 ?>
