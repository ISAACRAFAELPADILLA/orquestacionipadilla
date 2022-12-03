<html>
<head>
    <title>Contraseña</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>  <!--Para caracteres especiales -->
    <link rel="stylesheet" type="text/css" href="crud.css" media="screen" />
    <meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>App productos</title>
	<!-- Importando estilos de bootstrap -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<script src="eventos.js"></script>
	<!-- Importando jQuery -->
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>
    <div id="barra" style="position: fixed";>
        <style type="text/css">
			a { color: black; font-family: Calibri; font-size: large; margin-left: 40%;}
		</style>
        <a href="index.php">Regresar al Registro</a>
    </div>
    <br><br><br>

	<div class="container">
		<div class="w-100">
			<div class="text-center">
				<h1>Materias</h1>
				<p class="text-center h3">Lista de Materias</p>
			</div>
			<br>
			<table class="table table-hover table-bordered table-striped">
				<thead>
					<tr class="text-center">
						<th>Id</th>
						<th>Fecha</th>
						<th>Materia</th>
						<th>Nombre Profesor</th>
						<th>Apellido Profesor</th>
						<th>Completada</th>
						<th>Semestre</th>
						<th>Calificacion</th>
					</tr>
				</thead>
				<tbody id="tbl_body">
					<tr>
						<td colspan="6" class="text-center">No se encontro registro</td>
					</tr>
				</tbody>
			</table>
			<hr>
			<div id="formulario" hidden="">
				6
				<p class="text-center h3">Formulario de Calificaciones</p>
				<form action = "modificacion.php">
					<div class="form-group">
						<label for="id">Id</label>
						<input type="text" class="form-control" id="id" name="id" required="">
					</div>
					<div class="form-group">
						<label for="fecha">Fecha</label>
						<input type="date" class="form-control" id="fecha" name="fecha" required="">
					</div>
					<div class="form-group">
						<label for="materia">Materia</label>
						<input type="text" class="form-control" id="materia" name="materia" required="">
					</div>
					<div class="form-group">
						<label for="nombreProf">Nombre Profesor</label>
						<input type="text" class="form-control" id="nombreProf" name="nombreProf" required="">
					</div>
					<div class="form-group">
						<label for="apellidoProf">Apellido Profesor</label>
						<input type="text" class="form-control" id="apellidoProf" name="apellidoProf" required="">
					</div>
					<div class="form-group">
						<label for="completada">Completada</label>
						<SELECT NAME="completada" size="1" class="form-control" id="completada">
							<OPTION VALUE="SI">SI</OPTION>
							<OPTION VALUE="NO">NO</OPTION>
						</SELECT>
					</div>
					<div class="form-group">
						<label for="semestre">Semestre</label>
						<SELECT NAME="semestre" size="1" class="form-control" id="semestre">
							<OPTION VALUE="PRIMERO">PRIMERO</OPTION>
							<OPTION VALUE="SEGUNDO">SEGUNDO</OPTION>
							<OPTION VALUE="TERCERO">TERCERO</OPTION>
							<OPTION VALUE="CUARTO">CUARTO</OPTION>
							<OPTION VALUE="QUINTO">QUINTO</OPTION>
							<OPTION VALUE="SEXTO">SEXTO</OPTION>
							<OPTION VALUE="SEPTIMO">SEPTIMO</OPTION>
							<OPTION VALUE="OCTAVO">OCTAVO</OPTION>
							<OPTION VALUE="NOVENO">NOVENO</OPTION>
							<OPTION VALUE="DECIMO O MAS">DECIMO O MAS</OPTION>
						</SELECT>
					</div>
					<div class="form-group">
						<label for="calificacion">Calificacion</label>
						<input type="text" class="form-control" id="calificacion" name="calificacion">
					</div>
					<div class="text-center">
						<button type="button" class="btn btn-success" id="btn_guardar" hidden>Registrar</button>
						<button type="submit" class="btn btn-success" id="btn_editar" hidden>Cambiar</button>
						<button type="button" class="btn btn-warning" id="btn_cancelar">Cancelar</button>
					</div>
				</form>
			</div>
		</div>
	</div>
</body>
</html>
