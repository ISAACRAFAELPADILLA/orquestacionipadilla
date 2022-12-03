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

    $fecha = $_POST['fecha'];
    $materia = $_POST['materia'];
    $nombreProf = $_POST['nombreProf'];
    $apellidoProf = $_POST['apellidoProf'];
    $completada = $_POST['completada'];
    $semestre = $_POST['semestre'];
    $calificacion = $_POST['calificacion'];

    function insertar($fecha, $materia, $nombreProf, $apellidoProf, $completada, $semestre, $calificacion) {
		$connect = conectar();
		$sql="INSERT INTO registroCal (fecha,materia,nombreProf,apellidoProf,completada,semestre,calificacion)
			VALUES ('$fecha','$materia','$nombreProf','$apellidoProf','$completada','$semestre','$calificacion')";
		
		$sql = $connect->prepare($sql);
		$sql->execute();

		$id_insertado = $connect->lastInsertId();

		$connect = null;

		
	}
    insertar($fecha, $materia, $nombreProf, $apellidoProf, $completada, $semestre, $calificacion);
    header("Location: crud.php");
?>

