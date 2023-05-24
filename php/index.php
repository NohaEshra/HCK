<?php
    include "header.php";
    
    function myHtmlspecialchars($s, $flags = null) {
        if (is_string($s)) {
        return ($flags === null) ?
            htmlspecialchars($s) :
            htmlspecialchars($s, $flags);
        } else {
        return "";
            }
    }

    $formComplete = false;

    $theTitle = myHtmlspecialchars($_POST["theTitle"] ?? "", ENT_QUOTES);
    $firstName = myHtmlspecialchars($_POST["firstName"] ?? "", ENT_QUOTES);
    $lastName = myHtmlspecialchars($_POST["lastName"] ?? "", ENT_QUOTES);
    $role= myHtmlspecialchars($_POST["role"] ?? "", ENT_QUOTES);

    if (isset($_POST["submit"]) && $_POST["submit"] === "Submit") {

        $formComplete = true;
        $errorMessages = [];

        if (!in_array($theTitle, ["Mr", "Mrs", "Ms", "Mx"])) {
            $formComplete = false;
            array_push($errorMessages, "Title missing");
        }
        if (trim($firstName) === "") {
            $formComplete = false;
            array_push($errorMessages, "First Name missing");
        }
        if (trim($lastName) === "") {
            $formComplete = false;
            array_push($errorMessages, "Last Name missing");
        }
        if (!in_array($role, ["Admin", "Manager", "CEO"])) {
            $formComplete = false;
            array_push($errorMessages, "Role missing");
        }

        if ($formComplete) {
            $_SESSION['formPostData'] = $_POST;
            header('Location: problem.php');
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
?>
<div id="welcomeBox">

    <h1 class="middleText">Welcome to IT Support System</h1>
    <br>

    <form action="index.php" method="POST">
        <div class="whiteBg">
            <div class="boxDesign"> 
                <select title="theTitle" name="theTitle" class="firstFormField inARow">
                    <option value="">Select</option>
                    <option value="Mr">Mr</option>
                    <option value="Mrs">Mrs</option>
                    <option value="Ms">Ms</option>
                    <option value="Mx">Mx</option>
                </select>
                <input title="firstName" name="firstName" type="text" class="inARow" placeholder="First Name">
                <input title="lastName"  name="lastName" type="text" class="inARow" placeholder="Last Name">
                <select title="role" name="role" class="inARow">
                    <option value="">Select</option>
                    <option value="Admin">Admin</option>
                    <option value="Manager">Manager</option>
                    <option value="CEO">CEO</option>
                </select>
            </div>
        </div>
        <br>
        <br>
        <input type="submit" name="submit" value="Submit" class="lastFormField blueButton"> 
    </form>
    <br>
</div>

<?php
    }
?>