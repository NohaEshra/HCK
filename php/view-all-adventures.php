<?php
        include 'header.php';
        include 'menubar.php';
    
    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
      die("Connection failed: " . $conn->connect_error);
    }
?>
 <body>
 <main>
        <div class="CEC"> 
            Come Experience<br>
            Canada
        </div>
        <h1 class="mb">
           Upcoming Adventures
        </h1>
        <hr>
  
  </main>

  
<?php
    $sql = "SELECT * FROM AllAdventures";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
      while ($row = $result->fetch_assoc()) {
?>
<div class="mb">
  <h2><?php echo $row["Heading"]?></h2>
  <p>Date: <?php echo $row["TripDate"]?></p>
  <p>Duration: <?php echo $row["Duration"]?></p>
  <br>
  <h3>Summary:</h3>
  <p><?php echo $row["Summary"]?></p>
  <br>
</div>
 </body>
      
      <?php
        }
    } else {
      echo "No results found.";
    }

    // Close connection
    $conn->close();
?>