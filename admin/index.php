<?php
session_start();
$auth = $_SESSION['login'];
if (!$auth) {
    header('Location: ../index.php');
}

require('../includes/funciones.php');
require('../includes/config/database.php');
$db = connectDB();

$peticion = "SELECT * FROM propiedades;";
$resultado = mysqli_query($db, $peticion);

includeTemplate('header', 'header');


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = $_POST['id'];
    $id = filter_var($id, FILTER_VALIDATE_INT);


    if ($id) {
        //Eliminar imagen
        $peticionimg = "SELECT imagen FROM propiedades WHERE id = $id";

        $imagenQuery = mysqli_query($db, $peticionimg);
        $imagen = mysqli_fetch_assoc($imagenQuery);

        //Eliminar propiedad
        $peticionDelete = "DELETE FROM propiedades WHERE id = $id";

        $delete = mysqli_query($db, $peticionDelete);
        if ($delete) {
            header('Location: ../admin?resultado=3');
        }
    }
    unlink("../imagenes/" . $imagen['imagen']);
}




if (isset($_GET['resultado'])) {
    if ($_GET['resultado'] == 1) :
?>
        <script>
            Swal.fire({
                position: "center",
                icon: "success",
                title: "Propiedad creada correctamente",
                showConfirmButton: false,
                timer: 1500
            });
        </script>
    <?php
    elseif ($_GET['resultado'] == 2) :
    ?>
        <script>
            Swal.fire({
                position: "center",
                icon: "success",
                title: "Propiedad actualizada correctamente",
                showConfirmButton: false,
                timer: 1500
            });
        </script>
    <?php
    elseif ($_GET['resultado'] == 3) :
    ?>
        <script>
            Swal.fire({
                position: "center",
                icon: "success",
                title: "Propiedad eliminada correctamente",
                showConfirmButton: false,
                timer: 1500
            });
        </script>
<?php
    endif;
}
?>

<main class="main">
    <div class="contenedor admin">
        <h1>Administrador</h1>
        <a href="propiedades/create.php" class="btn__admin">Crear Propiedad</a>
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
            foreach ($datos as $index => $data) : ?>
                <tr>
                    <td colspan="1"><?php echo $index ?></td>
                    <td colspan="1"><?php echo $data['titulo'] ?></td>
                    <td colspan="1"> <img src="../imagenes/<?php echo $data['imagen'] ?>" alt="imagen-tabla" class="img__tabla"></td>
                    <td colspan="1">S./ <?php echo $data['precio'] ?></td>
                    <td colspan="1" class="acciones">
                        <div class="container__accions">
                            <a href="./propiedades/update.php?id=<?php echo $data['id'] ?>&&imagen=<?php echo $data['imagen'] ?>" class="update">Actualizar</a>
                            <form method="POST">
                                <input type="hidden" name="id" id="id" value="<?php echo $data['id'] ?>">
                                <input type="submit" class="remove" value="Eliminar" name="delete">
                            </form>
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