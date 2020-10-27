<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>login_code</title>
<link rel="stylesheet" type="text/css" href="hoja.css">


</head>

<body>
<?php
	
		include("connection.php");
		
		//resulset creado
		//$sql = $conexion->query("SELECT * FROM DATOS_USUARIOS");
		//almacenar resulset - cramos un array de objetos
	//	$registros=$sql->fetchAll(PDO::FETCH_OBJ);
		
	//simplificacion del codigo //las dos ultima lineas son lo mismo pero unidas 
	//almacenado un array de objetos -- cada objeto tiene diferentes propiedades // las propiedades seran los campos de la tabla // id-nombre-apellido-direcion
		$registros=$conexion->query("SELECT * FROM DATOS_USUARIOS")->fetchAll(PDO::FETCH_OBJ);
	
	//este if: si pulsamos el boton cr 
	if(isset($_POST["cr"])){
		
		//id no es necesario al ser un cuadro autonumerico
		//se creara solo como cuando se inserta un data directamente desde mysql
		$nombre=$_POST["Nom"];
		$apellido=$_POST["Ape"];
		$direccion=$_POST["Dir"];
		
		$sql="INSERT INTO datos_usuarios (nombre, apellido, direcion) VALUES(:N, :A, :D)";
		
		$resulatdo=$conexion->prepare($sql);
		
		$resulatdo->execute(array(":N"=>$nombre,
								  ":A"=>$apellido,
								  ":D"=>$direccion));
		
		header("location:index.php");
		
		
	}
	
	
	
?>

<form action="<?php echo $_SERVER['PHP_SELF'];?>" method="POST">
	
	
<h1>CRUD<span class="subtitulo">Create Read Update Delete</span></h1>

  <table width="50%" border="0" align="center">
    <tr >
      <td class="primera_fila">Id</td>
      <td class="primera_fila">Nombre</td>
      <td class="primera_fila">Apellido</td>
      <td class="primera_fila">Dirección</td>
      <td class="sin">&nbsp;</td>
      <td class="sin">&nbsp;</td>
      <td class="sin">&nbsp;</td>
    </tr> 
   
	
	  
	<?php
	  //Loop to create as many record as there are into the array // as many record as stored into record
	  //':?' esto nos permite sustituir las llaves del loop
	  //incluyendo la line tr completa dentro del foreach y cerrandolo abajo.
	  foreach($registros as $record):?>
   	<tr>
      <td><?php echo $record->id?></td>
      <td><?php echo $record->nombre?></td>
      <td><?php echo $record->apellido?></td>
      <td><?php echo $record->direcion?></td>
		
 		<!--incluimos un link (<a href) a la pagina delete

		?Id es un marcador q puede llamarse como queramos

		ID= a un valor dinamico para poder elegir el field correspondiente // ademas pasarle el valor del id del boton q pulsamos
		
		Para lo de arriba  echo $record->Id junto a las llaves de apertura y cierre de php en definitiva 
		este codigo es igual echo $record->Id = al codigo utilizado para el td-Id de el form dentro del foreach  -->
      <td class="bot"><a href="Delete.php?A=<?php echo $record->id?>"><input type='button' name='del' id='del' value='Borrar'></a></td>
	
      <td class='bot'><a href="editar.php?
		  				A=<?php echo $record->id?> &
		  				B=<?php echo $record->nombre?> &	
		  				C=<?php echo $record->apellido?> &
		  				D=<?php echo $record->direcion?>"><input type='button' name='up' id='up' value='Actualizar'></a></td>
    </tr>       

	<?php
	endforeach;
	?>
	<tr>
	<td></td>
      <td><input type='text' name='Nom' size='10' class='centrado'></td>
      <td><input type='text' name='Ape' size='10' class='centrado'></td>
      <td><input type='text' name=' Dir' size='10' class='centrado'></td>
      <td class='bot'><input type='submit' name='cr' id='cr' value='Insertar'></td></tr>    
  </table>
	
</form>

<p>&nbsp;</p>
</body>
</html>