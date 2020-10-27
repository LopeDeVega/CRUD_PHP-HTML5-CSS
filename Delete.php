<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Delete</title>
</head>

<body>
	
	<?php
		
		//include connection file
		include("connection.php");
		//getting Id field from the form// los nombre pueden ser como se quieran
		$A=$_GET["A"];
		//sql query
		$conexion->query("DELETE FROM DATOS_USUARIOS WHERE id='$A'");
	
		header("location:index.php ");
	
	
	
	?>
	
	
	
	
	
</body>
</html>