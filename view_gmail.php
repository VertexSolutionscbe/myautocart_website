<?php
ob_start();
session_start();

echo '<div class="panel-heading">Welcome User</div><div class="panel-body">';
    echo '<img src="'.$_SESSION["user_image"].'" class="img-responsive img-circle img-thumbnail" />';
    echo '<h3><b>Name :</b> '.$_SESSION['user_first_name'].' '.$_SESSION['user_last_name'].'</h3>';
    echo '<h3><b>Email :</b> '.$_SESSION['user_email_address'].'</h3>';
	echo '<h3><b>Id :</b> '.$_SESSION['gmid'].'</h3>';
    echo '<h3><a href="logout.php">Logout</h3></div>';
 ?>