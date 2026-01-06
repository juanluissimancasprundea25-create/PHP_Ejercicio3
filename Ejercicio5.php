<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Ordenador de Listas</title>
</head>
<body>
    <h2>Ordenador de Listas</h2>
    <form method="POST">
        <label>Introduce numeros separados por comas:</label><br>
        <input type="text" name="numeros" size="50" value="<?php echo isset($_POST['numeros']) ? htmlspecialchars($_POST['numeros']) : ''; ?>" required><br><br>
        <input type="submit" value="Ordenar">
    </form>
    <hr>
    <?php
    if ($_POST && isset($_POST['numeros'])) {
        $texto = trim($_POST['numeros']);
        if ($texto !== '') {

            // Dividir por comas y limpiar espacios
            $numeros = array_map('trim', explode(',', $texto));

            // Convertir a numeros y filtrar no numericos
            $numeros = array_filter($numeros, 'is_numeric');
            $numeros = array_map('floatval', $numeros);
            sort($numeros);
            echo "<h3>Numeros ordenados:</h3>";
            echo "<ol>";
            foreach ($numeros as $n) {

                // Mostrar como entero si no tiene decimales
                $mostrar = (floor($n) == $n) ? (int)$n : $n;
                echo "<li>{$mostrar}</li>";
            }
            echo "</ol>";
        }
    }
    ?>
</body>
</html>
