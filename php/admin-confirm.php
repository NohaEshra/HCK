<?php
    include 'header.php';
    include 'menubar.php';
       if (isset($_SESSION['adminAdv'])) {
        $filledAdminForm = $_SESSION['adminAdv'];
        $conn = new mysqli($servername, $username, $password, $dbname);
        if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
        }

        $stmt = $conn->prepare("INSERT INTO AllAdventures (Heading, TripDate, Duration, Summary) VALUES (?, ?, ?, ?)");
        $stmt->bind_param("ssis", $filledAdminForm['heading'], $filledAdminForm['tripDate'], $filledAdminForm['duration'], $filledAdminForm['summary']);
        if ($stmt->execute()) {
?>

<h1 class="AAA">Admin - Confirm</h1>
<hr>
<h4 class="IDATT">Data has been added successfully to the Database.</h4>
<br>
<br>
<a href="view-all-adventures.php" class="VAA">View All Adventures</a>

<?php
        } else {
        echo "Error: " . $stmt->error;
        }

        $stmt->close();
        $conn->close();
       
       }
    
       else {
        echo "<script>window.location.href='admin-add.php'</script>";

       }
       
       include 'footer.php';
?>

