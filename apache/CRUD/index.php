<html>
<head>
    <meta http-equiv = "Content-Type" content = "text/html; charset = utf-8"/> 
    <title>Sistema de Registro de Calificaciones</title>
    <link rel = "stylesheet" type = "text/css" href = "estilo.css" media = "screen" />
    <script>
        function validar(formulario_cal) {
            var patt = new RegExp(/^[A-Z\s]+$/g);
            var patt2 = new RegExp(/^[A-Z\s]+$/g);
            var patt3 = new RegExp(/^[A-Z\s]+$/g);
            
            if(!patt.test(formulario_cal.materia.value) || !patt2.test(formulario_cal.nombreProf.value) || 
            !patt3.test(formulario_cal.apellidoProf.value)) {
                alert("LLenar solo con letras mayusculas");
                return false;
            }
            if(formulario.calificacion.value > 100) {
                alert("Calificacion no Valida");
                return false;
            }    
            if(formulario.calificacion.value < 0) {
                alert("Calificacion no Valida");
                return false;
            }
                
            if(confirm("¿Seguro que quieres enviar tus datos?") == false) {
                return false;
            } else {
                alert("Registro exitoso");
                return true;
            }    
        }
    </script>
</head>
<body>
    <div id = "barra" style = "position: fixed";>
        <a href = "crud.php">Ver Listado de Materias</a>
    </div>
    <br>
    <center>
        <br><br>
        <font face = "Calibri"  size = "4">
            Sistema de Registro de Calificaciones <br>
            Instituto Tecologico de Leon
        </font>
        <br>
        <font face = "Calibri"  size = "3">
            <b> 
                Ingenieria en Sistemas Computacionales <br>
                Ciclo Escolar 2021 - 2022
            </b>
        </font>
    </center>
    <br><br><br>
    <form action = "alta.php" method = "POST" name = "formulario" onsubmit = "return validar(this);">
        <font face = "Calibri" size = 2>
            <table align = "right">
                <tr>
                    <td>   
                        <b>  
                            Fecha:<input class = fecha type = "date" name = "fecha" required>
                        </b>
                    </td>
                </tr>
            </table>
        </font><br><br><br>
        <center>
            <p style = "background-color: #a6a6a4">
                <font face = "Calibri" size = "3">
                    <b>
                        Datos de la Materia
                    </b>
                </font>
            </p>
        </center>
        <center>
            <font face = "Calibri" size = 3>
                <table>
                    <tr>
                        <td>
                            <input type = "text" name = "materia" size = "58" required> 
                        </td>
                        <td>
                            <input type = "text" name = "nombreProf" size = "58" required>
                        </td>
                        <td>
                            <input type = "text" name = "apellidoProf" size = "57" required>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            Materia 
                        </td>
                        <td>
                            Nombre Profesor@
                        </td>
                        <td>
                            Apellido Profesor@
                        </td>
                    </tr>
                </table>          
                <table>
                    <tr>
                        <td>
                            <input type = "radio" name = "completada" value = "SI" required>SI
                            <input type = "radio" name = "completada" value = "NO" required>NO
                        </td>
                        <td>
                            <SELECT NAME = "semestre" size = "1" required>
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
                        </td>
                        <td><input type = "number" name = "calificacion" size = "31" required></td>
                </tr> <br>
                    <tr>
                        <td>Completada</td>
                        <td>Semestre</td>
                        <td>Calificacion</td>
                    </tr>
                </table>           
            </font> 
            <p style = "background-color: #a6a6a4">
                <font face = "Calibri" size = "4">
                    <b>
                        -----
                    </b>
                </font>
            </p>
            <input class = "enviar" id = "enviar" type = "submit"><input type = "reset">
        </center>     
    </form>
</body>
</html>