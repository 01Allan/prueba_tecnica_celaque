<?php 
    include('../includes/db.php');

    if ($_SERVER["REQUEST_METHOD"] === "POST") {
        try {
            $monto = $_POST["monto"];
            $tasa = $_POST["tasa"];
            $plazo = $_POST["plazo"];

            if ($monto <= 0 || $tasa <= 0 || $plazo <= 0) {
                throw new Exception("Los valores deben ser mayores que cero.");
            }

            // realizando los calculos
            $tasaMensual = ($tasa / 12) / 100;
            $cuota = ($monto * $tasaMensual * pow(1 + $tasaMensual, $plazo)) / (pow(1 + $tasaMensual, $plazo) - 1);

            // llenando la base de datos
            $query = "INSERT INTO prestamos(monto, plazo_meses, tasa_anual, cuota_mensual) VALUES ($monto, $tasa, $plazo, $cuota)";

            $result = mysqli_query($conexion, $query);

            if (!$result) {
                die("Query Faild :c");
            }

            $_SESSION['message'] = '¡Cálculo realizado con éxito!';
            $_SESSION['message_type'] = 'success';
            header("Location: ../index.php");

        } catch (\Throwable $th) {
            echo "Error: " . $e->getMessage();
        }
    }
?>