<?php
    $nombre = $_POST['nombre'];
    $email = $_POST['email'];
    $telefono = $_POST['telefono'];

    $conexion = new SQLite3('agenda.db');
    $conexion->exec("CREATE TABLE personas (nombre varchar(50), email varchar(50), telefono int)");
    $conexion->exec("INSERT INTO personas VALUES('".$nombre."','".$email."','".$telefono."')");

    $consulta = $conexion->query("SELECT * FROM personas");
   
    print "<h3><center>TABLA DE REGISTROS</center></h3>";
    print "<center><table cellpadding='2' border='1'><br>\n";
    print "<tr><td><b>Nombre</b></td>
                <td><b>Email</b></td>
                <td><b>Telefono</b></td>
            </tr></center>\n";
    while($fila=$consulta->fetchArray()){

        print "<tr>"
                . "<td>".$fila['nombre']."</td>"
                . "<td>".$fila['email']."</td>"
                . "<td>".$fila['telefono']."</td>"
                . "</tr>\n";


    }


    print "</table>\n";


?>