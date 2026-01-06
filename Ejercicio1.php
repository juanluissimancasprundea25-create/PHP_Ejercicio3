<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Constructor de Pizzas</title>
</head>
<body>
    <h2>El Constructor de Pizzas</h2>
    <form method="POST">
        <p><strong>Tamaño:</strong><br>
            <label><input type="radio" name="tamano" value="pequena" required> Pequeña (5€)</label><br>
            <label><input type="radio" name="tamano" value="mediana"> Mediana (10€)</label>
        </p>
        <p><strong>Ingredientes (1€ cada uno):</strong><br>
            <label><input type="checkbox" name="ingredientes[]" value="Jamón"> Jamon</label><br>
            <label><input type="checkbox" name="ingredientes[]" value="Queso"> Queso</label><br>
            <label><input type="checkbox" name="ingredientes[]" value="Champiñones"> Champiñones</label>
        </p>
        <input type="submit" value="Calcular Pizza">
    </form>
    <hr>
    <?php
    if ($_POST) {
        $tamano = $_POST['tamano'] ?? '';
        $ingredientes = $_POST['ingredientes'] ?? [];

        // Precio base
        $precio = ($tamano === 'pequena') ? 5 : 10;

        // Sumar ingredientes
        $numIng = count($ingredientes);
        $precio += $numIng;

        echo "<h3>Resumen de tu pizza:</h3>";
        echo "<ul>";
        foreach ($ingredientes as $ing) {
            echo "<li>" . htmlspecialchars($ing) . "</li>";
        }
        echo "</ul>";
        echo "<p><strong>Precio total: {$precio}€</strong></p>";
    }
    ?>
</body>
</html>
