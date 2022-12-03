<?php

require_once("base_datos.php"); // se necesita un archivo externo

    // verificar si es método GET
	if($_SERVER['REQUEST_METHOD'] == 'GET') // consulta de información
	{
		// cotenido de proceso GET
		// Paso 1. Obtener pares clave valor

		// web service 1, Consultar por folio
		// isset() -> determinar si existe una variable o valor
		if(isset($_GET['id'])) {
			// buscar producto
			$id = $_GET['id'];

			// búsqueda por número de folio en base de datos
			$registroCal = buscar_id($id);

			// responder la registroCal
			if ($registroCal != null) { // si se encontró el producto
				# sí lo encontró
				header('Content-Type: application/json');
				$respuesta = [
					"registroCal" => (object)[
						"id" => $registroCal->id,
                        "fecha" => $registroCal->fecha,
						"materia" => $registroCal->materia,
						"nombreProf" => $registroCal->nombreProf,
						"apellidoProf" => $registroCal->apellidoProf,
						"completada" => $registroCal->completada,
						"semestre" => $registroCal->semestre,
                        "calificacion" => $registroCal->calificacion
					]
				];

				// enviando respuesta
				echo json_encode($respuesta);
			} else {
				// no lo encontró
				header('Content-Type: application/json');
				$respuesta = [
					"registroCal" => (object)[]
				];

				// enviando respuesta
				echo json_encode($respuesta);
			}

		} else {
			// web service 2. Consultar todo

			// obteniendo todos los productos de la base de datos
			$registroCal = buscar_todo();

			if (is_array($registroCal) && sizeof($registroCal) > 0) { // sí tiene elementos (productos)
				// sí hay elementos
				header ('Content-Type: application/json'); // la respuesta es en JSON

				$registroCal = [];
				// obtener todos los productos del resultado de la base de datos
				foreach($registroCal as $item) { 
					$array_registroCal[] = $item; // agrego cada producto al arrglo de productos
				}

				$respuesta = [
					"mensaje" => "Proceso exitoso",
					"registroCal" => $array_registroCal
				];

				echo json_encode($respuesta);
			} else {
				// no hay elementos
				header ('Content-Type: application/json'); // la respuesta es en JSON
				$respuesta = [
					"mensaje" => "Proceso exitoso",
					"registroCal" => []
				];

				echo json_encode($respuesta);
			}

		}
		

		// algoritmo o proceso
	} else if($_SERVER['REQUEST_METHOD'] == 'POST') // registrar
	{
		// contenido de proceso POST

		// Paso 1. Obtener valores de la registroCal
		$datos_recibidos = json_decode(
			file_get_contents("php://input")
		);
        
        $fecha = $datos_recibidos->fecha;
		$materia = $datos_recibidos->materia;
		$nombreProf = $datos_recibidos->nombreProf;
		$apellidoProf = $datos_recibidos->apellidoProf;
		$completada = $datos_recibidos->completada;
        $semestre = $datos_recibidos->semestre;
        $calificacion = $datos_recibidos->calificacion;

		// registrar en la base de datos
		$resultado = insertar($fecha, $materia, $nombreProf, $apellidoProf, $completada, $semestre, $calificacion);

		if ($resultado != null) { 
			# Sí se realizó
			header ('Content-Type: application/json'); // la respuesta es en JSON

			$respuesta = [
				"mensaje" => "Registro exitoso"
			];

			echo json_encode($respuesta);
		} else {
			// no se realizó
			header ('Content-Type: application/json'); // la respuesta es en JSON

			$respuesta = [
				"mensaje" => "No se pudo registar"
			];

			echo json_encode($respuesta);
		}

	} else if($_SERVER['REQUEST_METHOD'] == 'PUT') // actualizar
	{
		error_log(file_get_contents("php://input"));
		// contenido de proceso PUT
		$datos_recibidos = json_decode(
			file_get_contents("php://input")
		);

		$id = $datos_recibidos->id;
        $fecha = $datos_recibidos->fecha;
		$materia = $datos_recibidos->materia;
		$nombreProf = $datos_recibidos->nombreProf;
		$apellidoProf = $datos_recibidos->apellidoProf;
		$completada = $datos_recibidos->completada;
        $semestre = $datos_recibidos->semestre;
        $calificacion = $datos_recibidos->calificacion;

		// procesar algoritmo
		$resultado = actualizar($id, $fecha, $materia, $nombreProf, $apellidoProf, $completada, $semestre, $calificacion);
        
		if ($resultado !=null ) {
			# sí se actualizó
			header ('Content-Type: application/json'); // la respuesta es en JSON

			$respuesta = [
				"mensaje" => "Actualización correcta"
			];

			echo json_encode($respuesta);
		} else {
			// no se actualizó
			header ('Content-Type: application/json'); // la respuesta es en JSON

			$respuesta = [
				"mensaje" => "No se pudo actualizar"
			];

			echo json_encode($respuesta);
		}

	} else if($_SERVER['REQUEST_METHOD'] == 'DELETE') // eliminar
	{
		// contenido de proceso DELETE
		$id = $_GET['id'];

		$resultado = eliminar($id);

		if ($resultado != null) {
			# Sí se eliminó
			header ('Content-Type: application/json'); // la respuesta es en JSON

			$respuesta = [
				"mensaje" => "Eliminación correcta" // agregar a la cadena
			];

			echo json_encode($respuesta);
		} else {
			// no se eliminó
			header ('Content-Type: application/json'); // la respuesta es en JSON

			$respuesta = [
				"mensaje" => "No se pudo eliminar" // agregar a la cadena
			];

			echo json_encode($respuesta);
		}
	} else {
		// procesar error y responder
	}
?>
