<?php include('includes/db.php');?>

<?php include('views/header.php');?>
<section class="container p-4 mt-4">

    <div class="row d-flex justify-content-around">

        <div class="col mt-5">

            <?php
                if (isset($_SESSION['message'])) {
            ?>
                <div class="shadow alert alert-<?= $_SESSION['message_type'] ?> alert-dismissible fade show" role="alert">
                    <?= $_SESSION['message'] ?>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>

            <?php
                    session_unset();
                }
            ?>

            <div class="card card-body border border-primary shadow">
                <div class="formulario__head">
                    <h3>Ingresa los siguientes datos:</h3>
                </div>

                <form action="models/calcular.php" method="POST">
                    <div class="form-group mt-4">
                        <label for="montoPrestamo" class="form-label">Monto del préstamo:</label>
                        <input type="number" name="monto" id="monto" class="form-control" placeholder="Ingrese el monto del préstamo" autofocus require>
                    </div>

                    <div class="form-group mt-4">
                        <label for="tasa" class="form-label">Tasa de interés anual (%):</label>
                        <input type="number" name="tasa" id="tasa" step="0.01" class="form-control" placeholder="Tasa de interés" autofocus require>
                    </div>

                    <div class="form-group mt-4">
                        <label for="plazo" class="form-label">Plazo del préstamo (meses):</label>
                        <input type="number" name="plazo" id="plazo" class="form-control" placeholder="Plazo del préstamo" autofocus require>
                    </div>
                    
                    <div class="text-center">
                        <button type="submit" class="btn btn-primary w-50 mt-4" name="calcular" value="calcular">Cácular</button>
                    </div>

                </form>
            </div>
            
        </div>

        <div class="col mt-5 text-center">
            <div class="titulo">
                <h3 class="card-title mb-4 w-50 bg-warning text-white rounded-pill">Resultados</h3>
            </div>
            <table class="shadow-lg table table-bordered border border-primary">
                <thead>
                    <tr>
                    <th scope="col">Cuota Mensual</th>
                    <th scope="col">Total de meses</th>
                    <th scope="col">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        $query = "SELECT * FROM calc_data.prestamos";
                        $resultcal = mysqli_query($conexion, $query);

                        while ($row = mysqli_fetch_array($resultcal)) { 
                    ?>
                            <tr>
                                <td><?php echo "L ", $row['cuota_mensual']?></td>
                                <td><?php echo $row['plazo_meses']?></td>
                                <td>
                                    <a class="btn btn-primary" href="controllers/edit.php?id=<?php echo $row['id'] ?>">
                                        <i class="bi bi-pencil-square"></i>
                                    </a>

                                    <a class="btn btn-danger" href="controllers/delete.php?id=<?php echo $row['id'] ?>">
                                        <i class="bi bi-trash2-fill"></i>
                                    </a>
                                </td>
                            </tr>
                    
                    <?php
                        }
                    ?>
                </tbody>
            </table>
        </div>
    </div>

</section>

<?php include('views/footer.php');?>

