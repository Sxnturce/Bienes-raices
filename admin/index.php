<?php
require('../includes/funciones.php');
require('../includes/config/database.php');
$db = connectDB();

$peticion = "SELECT * FROM propiedades;";
$resultado = mysqli_query($db, $peticion);

includeTemplate('header', 'header');
if (isset($_GET['resultado'])) : ?>
    <script>
        Swal.fire({
            position: "center",
            icon: "success",
            title: "Propiedad creada correctamente!!",
            showConfirmButton: false,
            timer: 1500
        });
    </script>
<?php
endif;
?>

<main class="main">
    <div class="contenedor admin">
        <h1>Administrador</h1>
        <a href="propiedades/create.php" class="btn__admin">Nueva Propiedad</a>
    </div>

    <table class="contenedor table">
        <thead>
            <tr>
                <th colspan="1">ID</th>
                <th colspan="1">Titulo</th>
                <th colspan="1">Imagen</th>
                <th colspan="1">Precio</th>
                <th colspan="1">Acciones</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $datos = mysqli_fetch_all($resultado, MYSQLI_ASSOC);
            foreach ($datos as $data) : ?>
                <tr>
                    <td colspan="1"><?php echo $data['id'] ?></td>
                    <td colspan="1"><?php echo $data['titulo'] ?></td>
                    <td colspan="1"> <img src="../imagenes/<?php echo $data['imagen'] ?>" alt="imagen-tabla" class="img__tabla"></td>
                    <td colspan="1">S./ <?php echo $data['precio'] ?></td>
                    <td colspan="1" class="acciones">
                        <div class="container__accions">
                            <a href="./propiedades/update.php" class="update">Actualizar</a>
                            <a href="./propiedades/delete.php" class="remove">Eliminar</a>
                        </div>
                    </td>
                </tr>
            <?php endforeach ?>

        </tbody>
    </table>
</main>
<?php
includeTemplate('footer', 'footer');
?>