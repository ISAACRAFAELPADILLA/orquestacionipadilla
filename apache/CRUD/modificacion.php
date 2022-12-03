<?php
error_reporting(0);
    define('DB_HOST','database');
    define('DB_USER','isaac');
    define('DB_PASS','isaac321');
    define('DB_NAME','formulario_cal');
	 
	 function conectar() {
		 try {
			 return new PDO("mysql:host=".DB_HOST.";dbname=".DB_NAME,DB_USER, DB_PASS,
			 array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES 'utf8'"));
		 } catch (PDOException $e) {
			 exit("Error: " . $e->getMessage());
		 }
	 }	
	
	$id = ($_GET['id']);
    $fecha = ($_GET['fecha']);
	$materia = ($_GET['materia']);
	$nombreProf = ($_GET['nombreProf']);
    $apellidoProf = ($_GET['apellidoProf']);
    $completada = ($_GET['completada']);
    $semestre = ($_GET['semestre']);
	$calificacion = ($_GET['calificacion']);
	
	function actualizar($id, $fecha, $materia, $nombreProf, $apellidoProf, $completada, $semestre, $calificacion) {
		$connect = conectar();
	
		$sql="Update registroCal SET fecha='$fecha', materia = '$materia', nombreProf = '$nombreProf', 
		apellidoProf = '$apellidoProf', completada = '$completada', semestre = '$semestre', calificacion = '$calificacion' where id = '$id'";
	
		
		$sql = $connect->prepare($sql);
		$sql->execute();

		$connect = null;

	}
	actualizar($id, $fecha, $materia, $nombreProf, $apellidoProf, $completada, $semestre, $calificacion);
	header("Location: crud.php");
?>