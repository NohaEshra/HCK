<?php
   include 'header.php';
   if (isset($_SESSION['formPostData'])) 
   {
    $filledForm = $_SESSION['formPostData']; 
   }

   else {
    header ('Location: index.php');
   }
   include 'footer.php';
   include 'menubar.php';
   include 'logout-button.php';
?>

<h1 class="hello">Hello <?=$filledForm['role']?></h1>
<hr>
<h2 class="options">Here are your options:</h2>


<?php
    if ($filledForm['role'] === "Admin") {
?>
<a href="isnt-working.php" class="link">My computer isn't working</a>
<br>
<br>
<a href="new-account.php" class="link">Create New Account</a>
<?php
}
?>

<?php
    if ($filledForm['role'] === "Manager") {
?>
<a href="isnt-working.php" class="link">My computer isn't working</a>
<br>
<br>
<a href="lost-password.php" class="link">Create New Password</a>
<?php
}
?>


<?php
    if ($filledForm['role'] === "CEO") {
?>
<a href="isnt-working.php" class="link">My computer isn't working</a>
<br>
<br>
<a href="need-help.php" class="link">I need help</a>
<?php
}
?>