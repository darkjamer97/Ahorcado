<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Ahoracdo PHP</title>
    <link rel="stylesheet" href="css/style.css">
</head>

<body>
    <?php  
        /*
        Recogemos el valor oculto del formulario principal, si el valor vale 0 recoge la palabra y los intentos,
        pero si el valor es 1 recoge los parametros del segundo formulario el cual se reenvia a si mismo.
        */
        $oculto = $_REQUEST['oculto'];
    
        if ($oculto == "0")
        {
            $palabra = $_REQUEST['palabra'];
            $intentos = $_REQUEST['intentos'];
            $aste = $_REQUEST['asteris'];
            
            /*
            Ponemos oculto a 1 para que entre por el else la siguiente vez que vuelva a hacer el if y así 
            recoga las variables de si mismo y no del otro formulario.
            */
            $oculto = 1; 
            
            //Obtenemos la longitud de la palabra.
            $longitud = strlen($palabra);
            
            //Dentro de $aste se almacenan asteriscos segun el numero de letras de la palabra.
            for ($i=0;$i<$longitud;$i++)
            {
                $aste .= "*";
                
            } 
            echo "<br>";
            echo "<h1>Tu palabra tiene $longitud letras</h1>";
            echo "<br>"; 
        
        } else {
            
            $palabra = $_REQUEST['palabraO'];
            $intentos = $_REQUEST['intentosO'];
            $aste = $_REQUEST['asteris'];
            $letra = $_REQUEST['letra'];
            
            //Obtenemos la longitud de la palabra.
            $longitud = strlen($palabra);
            
            //El array tiene la longitud de la palabra . 
            $array = [$longitud];
            
            //Se inicializa intentos_menos a 1 para cuando intentos sea 1 se acabe la partida.
            $intento_menos = 1;
    
            /*
            Si los intentos_menos son menores que los intentos del usuario muestra el numero de intentos y se resta uno
            de lo contrario se acaba la partida y se redirige a una pantalla de game over.
            */
            if ($intento_menos < $intentos)
            {
                $intentos--;
                echo "<h1>Te quedan $intentos intentos</h1>";
                echo "<br>";
            } else {
                Header("Location: ahorcado_perdiste.php");
            }
            
            //Se inicia la tabla y el tr
            echo "<table><tr>";
            
            /*
                Mientras que $i sea menor que la longitud de la palabra debe comparar si la palabra que esta en el array es igual
                a la letra que introduce el usuario cambia en la posicion de $aste el * por la letra.
            */
            for ($i=0;$i<$longitud;$i++){
                 /*
                en el substr $i es la que recoge la letra y el 1 es cuantas coge,
                es decir que solo coga una letra en cada valor e la i.
                */
                $array[$i] = substr($palabra,$i,1);
                
                //si la letra es igual a la posicion $i del array cambia en la posicion $i de $aste el * por la letra.
                if ($letra == $array[$i])
                    {
                        $aste[$i] = $letra; 
                    } 
                //Dentro de cada td pinta la posicion de $aste
                echo "<td>";
                    echo $aste[$i];    
                echo "</td>";
            }
            echo "</tr></table>";
            
            //Comprobacion de si acierta la palabra, si $aste es igual a la palabra se redirecciona a una pantalla de ganador.
            if ($aste == $palabra)
            {
                Header("Location: ahorcado_ganaste.php");
            }
    }        
    ?>
    <!-- Formulario que envia la letra, se reenvia a si mismo -->
    <form action="ahorcado.php" method="post">
        <h3>Introduce la letra</h3>
        <br>
        <!-- El campo de la letra es obligatorio y debe ser de longitud 1 -->
        <input type="text" name="letra" maxlength="1" required/><br><br>
        <?php
        
            /*
                Se reenvian los campos en modo hidden para que sean invisibles al usuario
            */
            echo "<input type='hidden' name='palabraO' value='".$palabra."'>\n";
            echo "<input type='hidden' name='intentosO' value='".$intentos."'>\n";
            echo "<input type='hidden' name='oculto' value='".$oculto."'>\n";
            echo "<input type='hidden' name='asteris' value='".$aste."'>\n"; 
        ?>

            <input type="submit" value="enviar"/>
    </form>
    <form action="index.html">
        <input type="submit" value="Inicio">
    </form>
</body>

</html>
