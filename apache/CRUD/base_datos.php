<?php
    define('DB_HOST','database');
    define('DB_USER','isaac');
    define('DB_PASS','padilla321');
    define('DB_NAME','formulario_cal');

function conectar() {
	try {
		return new PDO("mysql:host=".DB_HOST.";dbname=".DB_NAME,DB_USER, DB_PASS,
		array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES 'utf8'"));
	} catch (PDOException $e) {
		exit("Error: " . $e->getMessage());
	}
}

	function buscar_todo() {
		$connect = conectar();
		$sql = "SELECT * FROM registroCal"; 
		$query = $connect -> prepare($sql); 
		$query -> execute(); 
		$results = $query -> fetchAll(PDO::FETCH_OBJ); 
		
		if (is_array($results)) {
			return $results;
		} else {
			return false;
		}
	}

	function buscar_id($id) {
		$connect = conectar();
		$sql = "SELECT * FROM registroCal where id = :id"; 
		$query = $connect->prepare($sql);
		$query->bindParam(':id', $id);
		$query->execute();
		$results = $query -> fetchAll(PDO::FETCH_OBJ); 

		if (isset($results[0]) && is_array($results)) {
			return $results[0];
		} else {
			return false;
		}
	}

	function insertar($fecha, $materia, $nombreProf, $apellidoProf, $completada, $semestre, $calificacion) {
		$connect = conectar();
		$sql="INSERT INTO registroCal (fecha,materia,nombreProf,apellidoProf,completada,semestre,calificacion)
			VALUES ('$fecha','$materia','$nombreProf','$apellidoProf','$completada','$semestre','$calificacion')";
		
		$sql = $connect->prepare($sql);
		$sql->execute();

		$id_insertado = $connect->lastInsertId();

		$connect = null;

		return ($id_insertado) ? true : false;
	}

	function actualizar($id, $fecha, $materia, $nombreProf, $apellidoProf, $completada, $semestre, $calificacion) {
		$connect = conectar();
	
		$sql="Update registroCal SET fecha='$fecha', materia = '$materia', nombreProf = '$nombreProf', 
		apellidoProf = '$apellidoProf', completada = '$completada', semestre = '$semestre', calificacion = '$calificacion' where id = '$id'";
	
		echo $sql;
		$sql = $connect->prepare($sql);
		$sql->execute();

		$connect = null;

		return ($sql->rowCount() > 0) ? true : false;
	}

	function eliminar($id) {
		$connect = conectar();
		$sql="delete from registroCal where id = :id";

		$sql = $connect->prepare($sql);
		$sql->bindParam(':id', $id);

		$sql->execute();

		$connect = null;

		return ($sql->rowCount() > 0) ? true : false;
	}
?>
