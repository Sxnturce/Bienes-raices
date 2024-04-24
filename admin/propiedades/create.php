<?php
session_start();
$auth = $_SESSION['login'];
if (!$auth) {
    header('Location: ../index.php');
}
//Base de datos
require('../../includes/config/database.php');
$db = connectDB();

//Consultar para obtener vendedores

$consulta = "SELECT * FROM vendedores;";
$resultado = mysqli_query($db, $consulta);

//Funciones
require('../../includes/funciones.php');
includeTemplate('header', 'header_admin');

$verificador = "";
$mesage = "";
$error = "";

$titulo = "";
$precio = "";
$imagen = "";
$descripcion = "";
$habitaciones = "";
$wc = "";
$estacionamiento = "";
$vendedores_id = "";


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $titulo =  mysqli_real_escape_string($db, $_POST['titulo']);
    $precio =  mysqli_real_escape_string($db, $_POST['precio']);
    $descripcion =  mysqli_real_escape_string($db, $_POST['descripcion']);
    $habitaciones =  mysqli_real_escape_string($db, $_POST['habitaciones']);
    $wc =  mysqli_real_escape_string($db, $_POST['wc']);
    $estacionamiento = mysqli_real_escape_string($db, $_POST['estacionamiento']);
    $creado = date('Y/m/d');

    //Almacenar imagen
    $imagen = $_FILES['imagen'];
    $size = 1024 * 1024 * 2;

    if ($imagen["name"] === "") {
        $error  = "Debe subir una imagen";
    }

    if ($imagen["size"] > $size) {
        $error = "La imagen es muy pesada";
    }

    //Verificar si se eligio a un vendedor
    if (isset($_POST['vendedor']) && $_POST['vendedor'] != "") {
        $vendedores_id = $_POST['vendedor'];
    }

    //Revisar que los campos no esten vacios
    if ($titulo === '' || $precio === ''  ||    $descripcion === '' || $habitaciones === '' || $wc === '' || $estacionamiento === '' || $vendedores_id === '') {
        $verificador = 'Todos los campos son obligatorios';
    }

    if (strlen($descripcion) < 50) {
        $mesage = 'Como minimo deben ser 50 caracteres en la descripción';
    } else if (strlen($descripcion) > 512) {
        $mesage = 'Como maximo pueden ser 512 caracteres en la descripción';
    }

    //Insertar datos en la db
    if (empty($verificador) && empty($mesage) && empty($error)) {

        //Crear carpeta
        $carpetaImagenes = "../../imagenes/";
        if (!is_dir($carpetaImagenes)) {
            mkdir($carpetaImagenes);
        }


        //Generar nombre de una imagen
        $nombreImagen = md5(uniqid(rand(), true)) . ".jpg";

        move_uploaded_file($imagen["tmp_name"], $carpetaImagenes  . $nombreImagen);

        //Peticion sql
        $query = "INSERT INTO propiedades (titulo, precio,descripcion,vendedores_id,habitaciones,wc,estacionamiento,creado,imagen) VALUES ('$titulo', '$precio', '$descripcion', '$vendedores_id', '$habitaciones', '$wc', '$estacionamiento', '$creado', '$nombreImagen');";

        $peticion = mysqli_query($db, $query);

        //Limpiar los inputs
        if ($peticion) {
            header("Location: ../../admin?resultado=1");
        }
    }
}
?>
<main class="main">
    <div class="contenedor create">
        <div class="text__create">
            <h1>Crear nueva propiedad</h1>
            <a href="../../admin/" class="btn__admin">Regresar</a>
        </div>

        <form class="form create__form" method="POST" action="./create.php" enctype="multipart/form-data">
            <div style=" width: 100%; background-color: #993030;">
                <p style="text-align: center; width: 100%; font-weight: 500; color: white;"><?php echo $verificador ?></p>
            </div>
            <fieldset>
                <legend>Informacion general</legend>
                <div class="form__div">
                    <label for="titulo" class="form__label">Titulo: </label>
                    <input type="text" class="form__input" id="titulo" name="titulo" placeholder="Titulo de Propiedad" value="<?php echo $titulo ?>">
                </div>
                <div class="form__div">
                    <label for="precio" class="form__label">Precio: </label>
                    <input type="number" class="form__input" id="precio" name="precio" placeholder="Precio de Propiedad" value="<?php echo $precio ?>">
                </div>
                <div class="form__div">
                    <label for="imagen" class="form__label">Imagen: </label>
                    <input type="file" class="form__input" id="imagen" name="imagen" accept="image/jpeg, image/png">
                    <?php echo "<div style='color: #dd5f5f;'> $error </div>" ?>
                </div>
                <div class="form__div">
                    <label for="descripcion" class="form__label">Descripción: </label>
                    <textarea name="descripcion" id="descripcion" cols="30" rows="10" class="form__input"> <?php echo $descripcion ?></textarea>
                    <?php echo "<div style='color: #dd5f5f;'> $mesage </div>" ?>
                </div>
            </fieldset>
            <fieldset>
                <legend>Informacion de Propiedad</legend>
                <div class="form__div">
                    <label for="habitaciones" class="form__label">Habitaciones: </label>
                    <input type="number" class="form__input" name="habitaciones" id="habitaciones" placeholder="Ej. 3" min="1" max="9" value="<?php echo $habitaciones ?>">
                </div>
                <div class="form__div">
                    <label for="wc" class="form__label">Baños: </label>
                    <input type="number" class="form__input" id="wc" name="wc" placeholder="Ej. 3" min="1" max="9" value="<?php echo $wc ?>">
                </div>
                <div class="form__div">
                    <label for="estacionamiento" class="form__label">Estacionamiento: </label>
                    <input type="number" class="form__input" id="estacionamiento" name="estacionamiento" placeholder="Ej. 3" min="1" max="9" value="<?php echo $estacionamiento ?>">
                </div>
            </fieldset>
            <fieldset>
                <legend>Seleccione vendedor</legend>
                <div class="form__div">
                    <label for="vendedor" class="form__label">Vendedor</label>
                    <select name="vendedor" id="vendedor" class="form__input">
                        <option value="" selected>-- Seleccione --</option>
                        <?php
                        $vendedores = mysqli_fetch_all($resultado, MYSQLI_ASSOC);
                        foreach ($vendedores as $vendedor) : ?>
                            <option value="<?php echo $vendedor['id'] ?>">
                                <?php echo $vendedor['nombre'] . " " . $vendedor['apellido'] ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
            </fieldset>
            <input type="submit" class="btn__create" value="Crear propiedad">
        </form>
    </div>
</main>


<?php
includeTemplate('footer', 'footer_admin');
?>