<?php

require_once '../controller/controllerCrud.php';

?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../assets/css/style.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <title>CRUD - SOLATI S.A.S</title>
    <script>

        function confirmarEliminacion(event, id) {
            if (confirm("¿Estás seguro de eliminar este registro?")) {
                document.getElementById('eliminar-form-' + id).submit();
            } else {
                event.preventDefault();
            }
        }
    </script>
</head>
<body>
    <div class="texto">
        <h1>CRUD - SOLATI S.A.S </h1>
        <h3>Ingreso de datos</h3>
    </div>
    <div class="contenedor">

    <!-- Hacer el llamado a ObtenerRegistro para mostrar los datos en el formulario y posteriormente actualizarlos -->
        <?php
        $id = '';
        $nombre = '';
        $edad = '';
        
        if (isset($_GET['id'])) {
            $id = $_GET['id'];
            $registro = $objeto->obtenerRegistro($id);
            if ($registro) {
                $nombre = $registro['nombre'];
                $edad = $registro['edad'];
            }
        }
        ?>

        <!-- Formulario para Insertar los Datos -->
        <form action="<?php echo $id ? '../model/modelUpdate.php' : '../model/modelInsert.php'; ?>" method="POST" onsubmit="confirmarActualizacion(event)">
            <input type="hidden" name="id" value="<?php echo $id; ?>">
            <div class="form_space">
                <label for="nombre">Nombres: </label>
                <input type="text" name="nombre" id="nombre" placeholder="Ingrese sus nombres" value="<?php echo $nombre; ?>" required>
            </div>
            <div class="form_space">
                <label for="edad">Edad: </label>
                <input type="text" name="edad" id="edad" placeholder="Ingrese su edad" value="<?php echo $edad; ?>" required>
            </div>

            
            <input class="guardar" type="submit" value="GUARDAR">
        </form>
    </div>
    <!-- Tabla para Mostrar los Datos -->
    <table border="1" cellpadding="5" cellspacing="0">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Edad</th>
                <th>Editar</th>
                <th>Eliminar</th>
            </tr>
        </thead>
        <tbody>
            <!-- Bucle Foreach para recorrer la tabla y sus columnas -->
            <?php foreach($registros as $registro){ ?>
            <tr>
                <td><?php echo $registro['id'];?></td>
                <td><?php echo $registro['nombre'];?></td>
                <td><?php echo $registro['edad'];?></td>
                <td><a href="?id=<?php echo $registro['id']; ?>"><i class='bx bxs-edit'></i></a></td>
                <td>
                    <form id="eliminar-form-<?php echo $registro['id']; ?>" action="../model/modelDelete.php" method="POST" style="display: none;">
                        <input type="hidden" name="id" value="<?php echo $registro['id']; ?>">
                    </form>
                    <i class='bx bxs-x-circle' style='color:#ff0000' onclick="confirmarEliminacion(event, <?php echo $registro['id']; ?>)"></i>
                </td>
            </tr>
            <?php } ?>
        </tbody>
    </table>
</body>
</html>
