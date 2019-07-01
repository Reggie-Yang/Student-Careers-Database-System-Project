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
           <strong>Job Title</strong>
           <select name="jobTitle" class="custom-select my-1 mr-sm-2">
             <option value="*" selected>All</option>
             <option value="Data Analyst">Data Analyst</option>
             <option value="Data Scientist">Data Scientist</option>
             <option value="Business Development Specialist">Business Development</option>
             <option value="Systems Analyst">Systems Analyst</option>
             <option value="Software Engineer">Software Engineer</option>
           </select>

           <strong>Job Type</strong>
           <select name="jobType" class="custom-select my-1 mr-sm-2">
             <option value="*" selected>All</option>
             <option value="full-time">Full-time</option>
             <option value="part-time">Part-time</option>
           </select>

           <strong>Location</strong>
           <select name="jobLocation" class="custom-select my-1 mr-sm-2">
             <option value="*" selected>All</option>
             <option value="MD">MD</option>
             <option value="D.C.">D.C.</option>
             <option value="VA">VA</option>
           </select>
           <button type="submit" class="btn btn-primary my-1" name="searchj-submit">Search</button>
         </p>

       </form>

       <?php
            if (isset($_POST["searchj-submit"])) {
              if ($_POST["jobTitle"] == "*" && $_POST["jobType"] == "*" && $_POST["jobLocation"] == "*" ) {
                require_once "dbConnect.php";
                $sqlQuery = "SELECT  j.jobTitle, j.jobType, j.jobDescription, j.jobRequirement, j.jobLocation, c.companyName, s.sourceName, j.jobId
                        FROM Job j, Company c, Source s
                        WHERE j.companyId = c.companyId AND j.sourceId = s.sourceId;";
                $result = mysqli_query($conn, $sqlQuery);
                if ($result) {
                  $numberOfRows = mysqli_num_rows($result);
   	 	            if ($numberOfRows > 0) {
                      echo "<table border=\"1\"><tr><th>Title</th><th>Type</th><th>Description</th><th>Requirement</th><th>Location</th><th>Company</th><th>Source</th></tr>";
  			              while ($recordArray = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
                        echo "<tr><td>$recordArray[jobTitle]</td><td>$recordArray[jobType]</td><td>$recordArray[jobDescription]</td><td>$recordArray[jobRequirement]</td><td>$recordArray[jobLocation]</td>
                        <td>$recordArray[companyName]</td><td>$recordArray[sourceName]</td></tr>";
                        $sql2 = "SELECT * FROM SearchJ WHERE studentId = '{$_SESSION["studentId"]}' AND jobId = '$recordArray[jobId]';";
                        $result2 = mysqli_query($conn, $sql2);
                        if ($result2) {
                          $jobRows = mysqli_num_rows($result2);
                          if ($jobRows == 0) {
                            $sqlinsert = "INSERT INTO SearchJ VALUES ('{$_SESSION["studentId"]}','$recordArray[jobId]'); ";
                            $resultInsert = mysqli_query($conn, $sqlinsert);
                          }
                        }
                       }
                       echo "</table>";
  		             } else {
                     echo "<h2>Can not find any result</h2>";
                   }
                   mysqli_free_result($result);
                } else {
                   echo "Retrieving records failed.".mysqli_error($conn);
                }
                mysqli_close($conn);
              }

              else if ($_POST["jobType"] == "*" && $_POST["jobLocation"] == "*" ) {
                require_once "dbConnect.php";
                $sqlQuery = "SELECT  j.jobTitle, j.jobType, j.jobDescription, j.jobRequirement, j.jobLocation, c.companyName, s.sourceName, j.jobId
                        FROM Job j, Company c, Source s
                        WHERE j.companyId = c.companyId AND j.sourceId = s.sourceId AND j.jobTitle = '{$_POST["jobTitle"]}';";
                $result = mysqli_query($conn, $sqlQuery);
                if ($result) {
                  $numberOfRows = mysqli_num_rows($result);
   	 	            if ($numberOfRows > 0) {
                      echo "<table border=\"1\"><tr><th>Title</th><th>Type</th><th>Description</th><th>Requirement</th><th>Location</th><th>Company</th><th>Source</th></tr><tr>";
  			              while ($recordArray = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
                        echo "<td>$recordArray[jobTitle]</td><td>$recordArray[jobType]</td><td>$recordArray[jobDescription]</td><td>$recordArray[jobRequirement]</td><td>$recordArray[jobLocation]</td>
                        <td>$recordArray[companyName]</td><td>$recordArray[sourceName]</td></tr>";
                        $sql2 = "SELECT * FROM SearchJ WHERE studentId = '{$_SESSION["studentId"]}' AND jobId = '$recordArray[jobId]';";
                        $result2 = mysqli_query($conn, $sql2);
                        if ($result2) {
                          $jobRows = mysqli_num_rows($result2);
                          if ($jobRows == 0) {
                            $sqlinsert = "INSERT INTO SearchJ VALUES ('{$_SESSION["studentId"]}','$recordArray[jobId]'); ";
                            $resultInsert = mysqli_query($conn, $sqlinsert);
                          }
                        }
                       }
                       echo "</table>";
  		             } else {
                     echo "<h2>Can not find any result</h2>";
                   }
                   mysqli_free_result($result);
                } else {
                   echo "Retrieving records failed.".mysqli_error($conn);
                }
                mysqli_close($conn);
              }

              else if ($_POST["jobTitle"] == "*" && $_POST["jobLocation"] == "*" ) {
                require_once "dbConnect.php";
                $sqlQuery = "SELECT  j.jobTitle, j.jobType, j.jobDescription, j.jobRequirement, j.jobLocation, c.companyName, s.sourceName, j.jobId
                        FROM Job j, Company c, Source s
                        WHERE j.companyId = c.companyId AND j.sourceId = s.sourceId AND j.jobType = '{$_POST["jobType"]}';";
                $result = mysqli_query($conn, $sqlQuery);
                if ($result) {
                  $numberOfRows = mysqli_num_rows($result);
   	 	            if ($numberOfRows > 0) {
                      echo "<table border=\"1\"><tr><th>Title</th><th>Type</th><th>Description</th><th>Requirement</th><th>Location</th><th>Company</th><th>Source</th></tr><tr>";
  			              while ($recordArray = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
                        echo "<td>$recordArray[jobTitle]</td><td>$recordArray[jobType]</td><td>$recordArray[jobDescription]</td><td>$recordArray[jobRequirement]</td><td>$recordArray[jobLocation]</td>
                        <td>$recordArray[companyName]</td><td>$recordArray[sourceName]</td></tr>";
                        $sql2 = "SELECT * FROM SearchJ WHERE studentId = '{$_SESSION["studentId"]}' AND jobId = '$recordArray[jobId]';";
                        $result2 = mysqli_query($conn, $sql2);
                        if ($result2) {
                          $jobRows = mysqli_num_rows($result2);
                          if ($jobRows == 0) {
                            $sqlinsert = "INSERT INTO SearchJ VALUES ('{$_SESSION["studentId"]}','$recordArray[jobId]'); ";
                            $resultInsert = mysqli_query($conn, $sqlinsert);
                          }
                        }
                       }
                       echo "</table>";
  		             } else {
                     echo "<h2>Can not find any result</h2>";
                   }
                   mysqli_free_result($result);
                } else {
                   echo "Retrieving records failed.".mysqli_error($conn);
                }
                mysqli_close($conn);
              }

              else if ($_POST["jobTitle"] == "*" && $_POST["jobType"] == "*" ) {
                require_once "dbConnect.php";
                $sqlQuery = "SELECT  j.jobTitle, j.jobType, j.jobDescription, j.jobRequirement, j.jobLocation, c.companyName, s.sourceName, j.jobId
                        FROM Job j, Company c, Source s
                        WHERE j.companyId = c.companyId AND j.sourceId = s.sourceId AND j.jobLocation LIKE '%{$_POST["jobLocation"]}';";
                $result = mysqli_query($conn, $sqlQuery);
                if ($result) {
                  $numberOfRows = mysqli_num_rows($result);
   	 	            if ($numberOfRows > 0) {
                      echo "<table border=\"1\"><tr><th>Title</th><th>Type</th><th>Description</th><th>Requirement</th><th>Location</th><th>Company</th><th>Source</th></tr><tr>";
  			              while ($recordArray = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
                        echo "<td>$recordArray[jobTitle]</td><td>$recordArray[jobType]</td><td>$recordArray[jobDescription]</td><td>$recordArray[jobRequirement]</td><td>$recordArray[jobLocation]</td>
                        <td>$recordArray[companyName]</td><td>$recordArray[sourceName]</td></tr>";
                        $sql2 = "SELECT * FROM SearchJ WHERE studentId = '{$_SESSION["studentId"]}' AND jobId = '$recordArray[jobId]';";
                        $result2 = mysqli_query($conn, $sql2);
                        if ($result2) {
                          $jobRows = mysqli_num_rows($result2);
                          if ($jobRows == 0) {
                            $sqlinsert = "INSERT INTO SearchJ VALUES ('{$_SESSION["studentId"]}','$recordArray[jobId]'); ";
                            $resultInsert = mysqli_query($conn, $sqlinsert);
                          }
                        }
                       }
                       echo "</table>";
  		             } else {
                     echo "<h2>Can not find any result</h2>";
                   }
                   mysqli_free_result($result);
                } else {
                   echo "Retrieving records failed.".mysqli_error($conn);
                }
                mysqli_close($conn);
              }

              else if ($_POST["jobLocation"] == "*" ) {
                require_once "dbConnect.php";
                $sqlQuery = "SELECT  j.jobTitle, j.jobType, j.jobDescription, j.jobRequirement, j.jobLocation, c.companyName, s.sourceName, j.jobId
                        FROM Job j, Company c, Source s
                        WHERE j.companyId = c.companyId AND j.sourceId = s.sourceId AND j.jobTitle = '{$_POST["jobTitle"]}' AND j.jobType = '{$_POST["jobType"]}';";
                $result = mysqli_query($conn, $sqlQuery);
                if ($result) {
                  $numberOfRows = mysqli_num_rows($result);
   	 	            if ($numberOfRows > 0) {
                      echo "<table border=\"1\"><tr><th>Title</th><th>Type</th><th>Description</th><th>Requirement</th><th>Location</th><th>Company</th><th>Source</th></tr><tr>";
  			              while ($recordArray = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
                        echo "<td>$recordArray[jobTitle]</td><td>$recordArray[jobType]</td><td>$recordArray[jobDescription]</td><td>$recordArray[jobRequirement]</td><td>$recordArray[jobLocation]</td>
                        <td>$recordArray[companyName]</td><td>$recordArray[sourceName]</td></tr>";
                        $sql2 = "SELECT * FROM SearchJ WHERE studentId = '{$_SESSION["studentId"]}' AND jobId = '$recordArray[jobId]';";
                        $result2 = mysqli_query($conn, $sql2);
                        if ($result2) {
                          $jobRows = mysqli_num_rows($result2);
                          if ($jobRows == 0) {
                            $sqlinsert = "INSERT INTO SearchJ VALUES ('{$_SESSION["studentId"]}','$recordArray[jobId]'); ";
                            $resultInsert = mysqli_query($conn, $sqlinsert);
                          }
                        }
                       }
                       echo "</table>";
  		             } else {
                     echo "<h2>Can not find any result</h2>";
                   }
                   mysqli_free_result($result);
                } else {
                   echo "Retrieving records failed.".mysqli_error($conn);
                }
                mysqli_close($conn);
              }

              else if ($_POST["jobTitle"] == "*" ) {
                require_once "dbConnect.php";
                $sqlQuery = "SELECT  j.jobTitle, j.jobType, j.jobDescription, j.jobRequirement, j.jobLocation, c.companyName, s.sourceName, j.jobId
                        FROM Job j, Company c, Source s
                        WHERE j.companyId = c.companyId AND j.sourceId = s.sourceId AND j.jobLocation LIKE '%{$_POST["jobLocation"]}' AND j.jobType = '{$_POST["jobType"]}';";
                $result = mysqli_query($conn, $sqlQuery);
                if ($result) {
                  $numberOfRows = mysqli_num_rows($result);
   	 	            if ($numberOfRows > 0) {
                      echo "<table border=\"1\"><tr><th>Title</th><th>Type</th><th>Description</th><th>Requirement</th><th>Location</th><th>Company</th><th>Source</th></tr><tr>";
  			              while ($recordArray = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
                        echo "<td>$recordArray[jobTitle]</td><td>$recordArray[jobType]</td><td>$recordArray[jobDescription]</td><td>$recordArray[jobRequirement]</td><td>$recordArray[jobLocation]</td>
                        <td>$recordArray[companyName]</td><td>$recordArray[sourceName]</td></tr>";
                        $sql2 = "SELECT * FROM SearchJ WHERE studentId = '{$_SESSION["studentId"]}' AND jobId = '$recordArray[jobId]';";
                        $result2 = mysqli_query($conn, $sql2);
                        if ($result2) {
                          $jobRows = mysqli_num_rows($result2);
                          if ($jobRows == 0) {
                            $sqlinsert = "INSERT INTO SearchJ VALUES ('{$_SESSION["studentId"]}','$recordArray[jobId]'); ";
                            $resultInsert = mysqli_query($conn, $sqlinsert);
                          }
                        }
                       }
                       echo "</table>";
  		             } else {
                     echo "<h2>Can not find any result</h2>";
                   }
                   mysqli_free_result($result);
                } else {
                   echo "Retrieving records failed.".mysqli_error($conn);
                }
                mysqli_close($conn);
              }

              else if ($_POST["jobType"] == "*" ) {
                require_once "dbConnect.php";
                $sqlQuery = "SELECT  j.jobTitle, j.jobType, j.jobDescription, j.jobRequirement, j.jobLocation, c.companyName, s.sourceName, j.jobId
                        FROM Job j, Company c, Source s
                        WHERE j.companyId = c.companyId AND j.sourceId = s.sourceId AND j.jobLocation LIKE '%{$_POST["jobLocation"]}' AND j.jobTitle = '{$_POST["jobTitle"]}';";
                $result = mysqli_query($conn, $sqlQuery);
                if ($result) {
                  $numberOfRows = mysqli_num_rows($result);
   	 	            if ($numberOfRows > 0) {
                      echo "<table border=\"1\"><tr><th>Title</th><th>Type</th><th>Description</th><th>Requirement</th><th>Location</th><th>Company</th><th>Source</th></tr><tr>";
  			              while ($recordArray = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
                        echo "<td>$recordArray[jobTitle]</td><td>$recordArray[jobType]</td><td>$recordArray[jobDescription]</td><td>$recordArray[jobRequirement]</td><td>$recordArray[jobLocation]</td>
                        <td>$recordArray[companyName]</td><td>$recordArray[sourceName]</td></tr>";
                        $sql2 = "SELECT * FROM SearchJ WHERE studentId = '{$_SESSION["studentId"]}' AND jobId = '$recordArray[jobId]';";
                        $result2 = mysqli_query($conn, $sql2);
                        if ($result2) {
                          $jobRows = mysqli_num_rows($result2);
                          if ($jobRows == 0) {
                            $sqlinsert = "INSERT INTO SearchJ VALUES ('{$_SESSION["studentId"]}','$recordArray[jobId]'); ";
                            $resultInsert = mysqli_query($conn, $sqlinsert);
                          }
                        }
                       }
                       echo "</table>";
  		             } else {
                     echo "<h2>Can not find any result</h2>";
                   }
                   mysqli_free_result($result);
                } else {
                   echo "Retrieving records failed.".mysqli_error($conn);
                }
                mysqli_close($conn);
              }

              else {
                require_once "dbConnect.php";
                $sqlQuery = "SELECT  j.jobTitle, j.jobType, j.jobDescription, j.jobRequirement, j.jobLocation, c.companyName, s.sourceName, j.jobId
                        FROM Job j, Company c, Source s
                        WHERE j.companyId = c.companyId AND j.sourceId = s.sourceId AND j.jobTitle = '{$_POST["jobTitle"]}' AND j.jobType = '{$_POST["jobType"]}' AND j.jobLocation LIKE '%{$_POST["jobLocation"]}';";
                $result = mysqli_query($conn, $sqlQuery);
                if ($result) {
                  $numberOfRows = mysqli_num_rows($result);
   	 	            if ($numberOfRows > 0) {
                      echo "<table border=\"1\"><tr><th>Title</th><th>Type</th><th>Description</th><th>Requirement</th><th>Location</th><th>Company</th><th>Source</th></tr><tr>";
  			              while ($recordArray = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
                        echo "<td>$recordArray[jobTitle]</td><td>$recordArray[jobType]</td><td>$recordArray[jobDescription]</td><td>$recordArray[jobRequirement]</td><td>$recordArray[jobLocation]</td>
                        <td>$recordArray[companyName]</td><td>$recordArray[sourceName]</td></tr>";
                        $sql2 = "SELECT * FROM SearchJ WHERE studentId = '{$_SESSION["studentId"]}' AND jobId = '$recordArray[jobId]';";
                        $result2 = mysqli_query($conn, $sql2);
                        if ($result2) {
                          $jobRows = mysqli_num_rows($result2);
                          if ($jobRows == 0) {
                            $sqlinsert = "INSERT INTO SearchJ VALUES ('{$_SESSION["studentId"]}','$recordArray[jobId]'); ";
                            $resultInsert = mysqli_query($conn, $sqlinsert);
                          }
                        }

                       }
                       echo "</table>";
  		             } else {
                     echo "<h2>Can not find any result</h2>";
                   }
                   mysqli_free_result($result);
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
