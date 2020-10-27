<?php








	try{

		$conexion= new PDO ('mysql:host=localhost; dbname=pruebas', 'root', '');

			$conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

			$conexion->exec("SET CHARACTER SET UTF8");	

			echo "Conexion realizadad con exito";

			}catch(Exception $e){

				//die('Error: ' . $e->getMessage());
			  echo "linea de error <br>" . $e->getMessage();

			//finally vacia la memoria despues de crear la conexion.
		}








?>