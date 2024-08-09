<?php 
session_start();
IF(ISSET($_SESSION['username'])){
	

?>
<html>
	<head>
		<title> Belajar Form  Login</title>
		<link href="css/bootstrap.min.css" rel="stylesheet">
		</head>
	<body>
		<h1> <p style="background-color:aqua">Selamat Datang   <?=$_SESSION['nama']?> </h1></p>
		<br/>
		<a href="logout.php?keluar"> Klik Disini Untuk Keluar </a>
	</body>
</html>
<?php 

}else{
	echo "<script language=\"javascript\">alert(\"Silahkan Login Terlebih Dahulu\");document.location.href='login.php';</script>";	
}
?>