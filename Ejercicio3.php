<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Calculadora de IMC</title>
    <style>
        .alerta-bajo { background-color: #fff3cd; color: #856404; padding: 10px; border-left: 4px solid #ffc107; }
        .alerta-normal { background-color: #d4edda; color: #155724; padding: 10px; border-left: 4px solid #28a745; }
        .alerta-sobrepeso { background-color: #f8d7da; color: #721c24; padding: 10px; border-left: 4px solid #dc3545; }
    </style>
</head>
<body>
    <h2>Calculadora de IMC con Semaforo</h2>
    <form method="POST">
        <label>Peso (kg): 
            <input type="number" step="0.1" name="peso" min="1" value="<?php echo isset($_POST['peso']) ? $_POST['peso'] : ''; ?>" required>
        </label><br><br>
        <label>Altura (cm): 
            <input type="number" step="1" name="altura" min="50" max="250" value="<?php echo isset($_POST['altura']) ? $_POST['altura'] : ''; ?>" required>
        </label><br><br>
        <input type="submit" value="Calcular IMC">
    </form>
    <hr>
    <?php
    if ($_POST) {
        $peso = (float)($_POST['peso'] ?? 0);
        $altura_cm = (float)($_POST['altura'] ?? 0);
        if ($peso > 0 && $altura_cm > 0) {
            $altura_m = $altura_cm / 100;
            $imc = $peso / ($altura_m * $altura_m);
            if ($imc < 18.5) {
                $mensaje = "Bajo peso";
                $clase = "alerta-bajo";
            } elseif ($imc <= 24.9) {
                $mensaje = "Peso normal";
                $clase = "alerta-normal";
            } else {
                $mensaje = "Sobrepeso";
                $clase = "alerta-sobrepeso";
            }
            echo "<div class='{$clase}'>";
            echo "<p><strong>IMC: " . number_format($imc, 2) . "</strong></p>";
            echo "<p>{$mensaje}</p>";
            echo "</div>";
        }
    }
    ?>
</body>
</html>
