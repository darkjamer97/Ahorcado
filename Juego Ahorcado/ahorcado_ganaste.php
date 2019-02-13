<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Ahorcado PHP</title>
    <link rel="stylesheet" href="css/style.css">
</head>

<body>
    <?php
        echo "<h1>Enhorabuena, ¿quieres volver a jugar?</h1>";
        echo "<img src=\"img\ganador.gif\" alt=\"Smiley face\" height=\"300\" width=\"300\">";
        echo "<img src=\"img\ganador2.gif\" alt=\"Smiley face\" height=\"300\" width=\"300\">";
        echo "<br>";
    ?>
    
    <form action="index.html" method="post">
        <input type="submit" value="Inicio">
    </form>
</body>

</html>
