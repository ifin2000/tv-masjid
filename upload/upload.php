<!DOCTYPE html>
<html>
<head>
	<title>Import Excel Ke MySQL dengan PHP</title>
</head>
<body>
	<style type="text/css">
	body{
		font-family: sans-serif;
	}

	p{
		color: green;
	}
</style>
<h2>IMPORT EXCEL KE MYSQL DENGAN PHP</h2> 

<a href="index.php">Kembali</a>
<br/><br/>
<?php 
include 'koneksi.php';
?>

<form method="post" enctype="multipart/form-data" action="upload_aksi.php">
	Pilih File: 
	<input name="filejadwal" type="file" required="required"> 
	<input name="upload" type="submit" value="Import">
</form>

<br/><br/>

</body>
</html>