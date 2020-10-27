<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Documento sin título</title>
<link rel="stylesheet" type="text/css" href="hoja.css">
</head>

<body>

<h1>ACTUALIZAR</h1>
	
	<?php
	//incluir conexion	
	include("connection.php");
	
	//this if: if the bottom have not been pressed get the information from $_Get 
	if(!isset($_POST["bot_actualizar"])){
	//get for the first time the form get the information
		$A=$_GET["A"];
		$B=$_GET["B"];
		$C=$_GET["C"];
		//$D=$_GET["D"];
	
		//if buttom is pressed then 
	}else{
		//
		$A=$_POST["id"];
		$B=$_POST["nom"];
		$C=$_POST["ape"];
		$D=$_POST["dir"];
		
		//sql sentence to  update table
		$sql="UPDATE DATOS_USUARIOS SET nombre=:myName , apellido=:myApellido , direcion=:myDireccion Where id=:myId ";
		
		//preparar la sentencia
		$resultado=$conexion->prepare($sql);
		
			//execute the array
		//myId from the condition where
		//:myName from sql sentence
		//$A from $_Post
		$resultado->execute(array(":myId"=>$A,
								  ":myName"=>$B, 
								  ":myApellido"=>$C ,
								  ":myDireccion"=>$D ));
		
		header("location:index.php");
	
		
	}
	
	?>
	

<p>
 
</p>
<p>&nbsp;</p>
<form name="form1" method="post" action="<?php echo $_SERVER['PHP_SELF'];?>">
  <table width="25%" border="0" align="center">
    <tr>
      <td></td>
      <td><label for="id"></label>
		  <!--type hidden aculta el campo-->
      <input type="hidden" name="id" id="id" value="<?php echo $A?>"></td>
    </tr>
    <tr>
      <td>Nombre</td>
      <td><label for="nom"></label>
      <input type="text" name="nom" id="nom" value="<?php echo $B ?>"></td>
    </tr>
    <tr>
      <td>Apellido</td>
      <td><label for="ape"></label>
      <input type="text" name="ape" id="ape" value="<?php echo $C ?>">
    </tr>
    <tr>
      <td>Dirección</td>
      <td><label for="dir"></label>
      <input type="text" name="dir" id="dir" value="<?php echo $C ?>"></td>
    </tr>
    <tr>
      <td colspan="2"><input type="submit" name="bot_actualizar" id="bot_actualizar" value="Actualizar"></td>
    </tr>
  </table>
</form>
<p>&nbsp;</p>
</body>
</html>