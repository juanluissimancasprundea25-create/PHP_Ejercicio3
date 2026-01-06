<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Analizador de Texto</title>
</head>
<body>
    <h2>Analizador de Texto</h2>
    <form method="POST">
        <label>Escribe un texto para analizar:</label><br>
        <textarea name="texto" rows="6" cols="60" placeholder="Escribe algo..."><?php 
            echo isset($_POST['texto']) ? htmlspecialchars($_POST['texto']) : '';
        ?></textarea><br><br>
        <input type="submit" value="Analizar">
    </form>
    <hr>
    <?php
    if ($_POST && isset($_POST['texto'])) {
        $texto = $_POST['texto'];
        $caracteres = strlen($texto);
        $palabras = str_word_count($texto);
        $reverso = strrev($texto);
        $tienePHP = stripos($texto, 'PHP') !== false; // insensible a mayúsculas
        echo "<h3>Ficha Estadistica:</h3>";
        echo "<p><strong>Caracteres:</strong> {$caracteres}</p>";
        echo "<p><strong>Palabras:</strong> {$palabras}</p>";
        echo "<p><strong>Texto al reves:</strong> " . htmlspecialchars($reverso) . "</p>";
        echo "<p><strong>¿Contiene 'PHP'?</strong> " . ($tienePHP ? 'Si' : 'No') . "</p>";
    }
    ?>
</body>
</html>
