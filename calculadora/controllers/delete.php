<?php
    include('../includes/db.php');

    if(isset($_GET['id'])) {
        $id = $_GET['id'];
        $query = "DELETE FROM prestamos WHERE id = $id";
        $result = mysqli_query($conexion, $query);
        if(!$result) {
          die("Query Failed. :C :cc");
        }
      
        $_SESSION['message'] = 'El valor ha sido removido de la lista! ^ u ^';
        $_SESSION['message_type'] = 'danger';
        header('Location: ../index.php');
    }

?>