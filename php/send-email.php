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
<?php
    if ($filledForm['role'] === "Admin") {
?>
<h2>To create a new account, follow the steps below.</h2>
<?php
}
?>

<?php
    if ($filledForm['role'] === "Manager") {
?>
<h2 class="resetpw">Please check your email for a link to reset your password.</h2>
<?php
}
?>
