<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>¿Que dia naciste?</title>
</head>
<body>
    <h2>¿Que dia naciste?</h2>
    <form method="POST">
        <label>Selecciona tu fecha de nacimiento:
            <input type="date" name="fecha" value="<?php echo isset($_POST['fecha']) ? $_POST['fecha'] : ''; ?>" required>
        </label><br><br>
        <input type="submit" value="Ver día">
    </form>
    <hr>
    <?php
    if ($_POST && isset($_POST['fecha'])) {
        $fecha = $_POST['fecha'];
        $timestamp = strtotime($fecha);
        $diaIngles = date('l', $timestamp);
        $dias = [
            'Monday' => 'Lunes',
            'Tuesday' => 'Martes',
            'Wednesday' => 'Miercoles',
            'Thursday' => 'Jueves',
            'Friday' => 'Viernes',
            'Saturday' => 'Sabado',
            'Sunday' => 'Domingo'
        ];
        $diaEspanol = $dias[$diaIngles] ?? 'Fecha inválida';
        echo "<p><strong>Naciste un {$diaEspanol}.</strong></p>";
    }
    ?>
</body>
</html>
