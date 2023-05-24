<?php
    include "header.php";
    
    function myHtmlspecialchars($s, $flags = null) {
        if (is_string($s)) {return ($flags === null) ?
            htmlspecialchars($s) : htmlspecialchars($s, $flags);
        } else {
        return "";
            }
    }

    $formComplete = false;

    $heading = myHtmlspecialchars($_POST["heading"] ?? "", ENT_QUOTES);
    $tripDate = myHtmlspecialchars($_POST["tripDate"] ?? "", ENT_QUOTES);
    $duration = myHtmlspecialchars($_POST["duration"] ?? "", ENT_QUOTES);
    $summary= myHtmlspecialchars($_POST["summary"] ?? "", ENT_QUOTES);

    if (isset($_POST["submit"]) && $_POST["submit"] === "Submit") {

        $formComplete = true;
        $errorMessages = [];

        if (trim($heading) === "") {
            $formComplete = false;
            array_push($errorMessages, "Heading missing");
        }
        if (trim($tripDate) === "") {
            $formComplete = false;
            array_push($errorMessages, "Date missing");
        }
        if (trim($duration) === "") {
            $formComplete = false;
            array_push($errorMessages, "Duration missing");
        }
        if (trim($summary) === "") {
            $formComplete = false;
            array_push($errorMessages, "Summary missing");
        }

        if ($formComplete) {
            $_SESSION['adminAdv'] = $_POST;
            header("Location: admin-confirm.php");   

        }
        
    else {
            echo "<div class=\"errors\"><p class=\"VEbold\">Validation errors:</p><ul>";
            foreach ($errorMessages as $errorMessage) {
                echo "<li>$errorMessage</li>";
            }
            echo "</ul></div>";
    }
    
}

    if (!$formComplete) {
        include "menubar.php";
        include 'footer.php';

}        
?>

<h1 class="AAA">Admin - Add Adventure</h1>
<hr>
<h4 class="IDATT">Input details about the trip</h4>

<form class= "AAA" action="admin-add.php" method="POST">
    
    <label for="heading">Heading:</label>
    <input type="text" id="heading" name="heading"><br><br>

    <label for="tripDate">Trip Date:</label>
    <input type="date" id="tripDate" name="tripDate"><br><br>
        
    <label for="duration">Duration:</label>
    <input type="number" id="duration" name="duration"><br><br>

    <label for="summary">Summary:</label>
    <textarea id="summary" name="summary" row="5" columns="5"> </textarea><br><br>

    <input type="submit" name="submit" value="Submit">
</form>
