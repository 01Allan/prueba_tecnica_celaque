<?php
    include("../includes/db.php");
    $monto = '';
    $tasa = '';
    $plazo = '';

    if  (isset($_GET['id'])) {
        $id = $_GET['id'];
        $query = "SELECT * FROM prestamos WHERE id=$id";
        $result = mysqli_query($conexion, $query);
        if (mysqli_num_rows($result) == 1) {
            $row = mysqli_fetch_array($result);
            $monto = $row['monto'];
            $tasa = $row['tasa_anual'];
            $plazo = $row['plazo_meses'];
        }
    }

    if (isset($_POST['update'])) {
        $id = $_GET['id'];
        $monto = $_POST['monto'];
        $tasa = $_POST['tasa'];
        $plazo = $_POST['plazo'];

        $query = "UPDATE prestamos set monto = '$monto', tasa_anual = '$tasa', plazo_meses = '$plazo' WHERE id=$id";
        mysqli_query($conexion, $query);

        $_SESSION['message'] = 'Los valores han sido añadidos con éxito';
        $_SESSION['message_type'] = 'warning';

        header('Location: ../index.php');
    }

?>


<?php include('../views/header.php'); ?>

<div class="container d-flex justify-content-center w-25">
    <div class="card card-body border border-primary shadow mt-5">
        <div class="formulario__head">
            <h3>Actualiza los siguientes datos:</h3>
        </div>
        <form action="../controllers/edit.php?id=<?php echo $_GET['id']; ?>" method="POST">
            <div class="form-group mt-4">
                <label for="montoPrestamo" class="form-label">Monto del préstamo:</label>
                <input type="number" name="monto" id="monto" class="form-control" placeholder="Ingrese el monto del préstamo" autofocus require value="<?php echo $monto; ?>">
            </div>

            <div class="form-group mt-4">
                <label for="tasa" class="form-label">Tasa de interés anual (%):</label>
                <input type="number" name="tasa" id="tasa" step="0.01" class="form-control" placeholder="Tasa de interés" autofocus require value="<?php echo $tasa; ?>">
            </div>

            <div class="form-group mt-4">
                <label for="plazo" class="form-label">Plazo del préstamo (meses):</label>
                <input type="number" name="plazo" id="plazo" class="form-control" placeholder="Plazo del préstamo" autofocus require value="<?php echo $plazo; ?>">
            </div>
                        
            <div class="text-center">
                <button type="submit" class="btn btn-primary w-50 mt-4" name="update" value="update">Actualizar</button>
            </div>

        </form>                    
                    
    </div>
</div>



<?php include('../views/footer.php'); ?>