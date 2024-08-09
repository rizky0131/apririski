<?php 
IF(ISSET($_GET['keluar'])){
	session_start();
	session_destroy();
	header('Location:login.php');
}
?>