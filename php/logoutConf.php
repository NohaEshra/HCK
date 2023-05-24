<?php
    include 'header.php';
    include 'menubar.php';
    include 'footer.php';
?>

<br><p></p><br><p></p><br>

<h1 class="logoutmessage">Are you sure you want to logged out?</h1>
<a href="logout.php"><button type="button" class="yesbutton" >Yes</button></a>
<button type="button" class="Nobutton" onclick="javascript:history.go(-1)">No</button>