<?php include('db.php');?>

<?php include('includes/header.php');?>
<section class="container p-4 mt-4">

    <div class="row d-flex justify-content-around">

        <div class="col mt-5">

            <div class="card card-body border border-primary">
                <div class="formulario__head">
                    <h3>Ingresa los siguientes datos:</h3>
                </div>

                <form action="calcular.php" method="POST">
                    <div class="form-group mt-4">
                        <label for="montoPrestamo" class="form-label">Monto del préstamo:</label>
                        <input type="number" name="monto" id="monto" class="form-control" placeholder="Ingrese el monto del préstamo" autofocus require>
                    </div>

                    <div class="form-group mt-4">
                        <label for="tasa" class="form-label">Tasa de interés anual (%):</label>
                        <input type="number" name="tasa" id="tasa" class="form-control" placeholder="Tasa de interés" autofocus require>
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
            <table class="table table-bordered border border-primary">
                <thead>
                    <tr>
                    <th scope="col">Cuota Mensual</th>
                    <th scope="col">Total de meses</th>
                    <th scope="col">Acciones</th>
                    </tr>
                </thead>
                <tbody>

                </tbody>
            </table>
        </div>
    </div>

</section>

<?php include('includes/footer.php');?>

