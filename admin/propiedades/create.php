<?php

declare(strict_types=1);
require('../../includes/app.php');

use app\Propiedad;
use Intervention\Image\ImageManagerStatic as Imagen;



//Base de datos

$db = connectDB();

//Consultar para obtener vendedores

$consulta = "SELECT * FROM vendedores;";
$resultado = mysqli_query($db, $consulta);

//Funciones
includeTemplate('header', 'header_admin');


$tituloErr = "";
$mesage = "";
$precioErr = "";
$habiErr = "";
$wcErr = "";
$estErr = "";
$vendErr = "";
$imgErr = "";

$titulo = "";
$precio = "";
$imagen = "";
$descripcion = "";
$habitaciones = "";
$wc = "";
$estacionamiento = "";
$vendedores_id = "";


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $propiedad = new Propiedad($_POST);


    //Generar nombre de una imagen
    $nombreImagen = md5(uniqid(strval(rand()), true)) . ".jpg";

    if ($_FILES['imagen']['tmp_name']) {
        //Realiza un rezise a la imagen
        $Imagen = Imagen::make($_FILES['imagen']['tmp_name'])->fit(800, 600);
        $propiedad->setImage($nombreImagen);
    }


    $tituloErr =  $propiedad->checkTitle();
    $mesage = $propiedad->checkMessage();
    $precioErr = $propiedad->checkPrecio();
    $habiErr = $propiedad->checkRooms();
    $wcErr = $propiedad->checkWC();
    $estErr = $propiedad->checkStaiment();
    $vendErr = $propiedad->checkVendedor();
    $imgErr = $propiedad->checkImage();




    //Insertar datos en la db
    if (empty($tituloErr) && empty($mesage) && empty($precioErr) && empty($habiErr) &&  empty($wcErr) && empty($estErr) && empty($vendErr) && empty($imgErr)) {
        //Crear carpeta
        if (!is_dir(CARPETA_IMAGENES)) {
            mkdir(CARPETA_IMAGENES);
        }

        //Guardamos la imagen en el servidor
        $Imagen->save(CARPETA_IMAGENES . $nombreImagen);

        $peticion = $propiedad->saveInfo();
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
            <fieldset>
                <legend>Informacion general</legend>
                <div class="form__div">
                    <label for="titulo" class="form__label">Titulo: </label>
                    <input type="text" class="form__input" id="titulo" name="titulo" placeholder="Titulo de Propiedad" value="<?php echo ($_SERVER["REQUEST_METHOD"] === 'POST') ? $propiedad->titulo : "" ?>">
                    <?php echo "<div style='color: #dd5f5f;'> $tituloErr </div>" ?>
                </div>
                <div class="form__div">
                    <label for="precio" class="form__label">Precio: </label>
                    <input type="number" class="form__input" id="precio" name="precio" placeholder="Precio de Propiedad" value="<?php echo ($_SERVER["REQUEST_METHOD"] === 'POST') ? $propiedad->precio : "" ?>">
                    <?php echo "<div style='color: #dd5f5f;'> $precioErr </div>" ?>
                </div>
                <div class="form__div">
                    <label for="imagen" class="form__label">Imagen: </label>
                    <input type="file" class="form__input" id="imagen" name="imagen" accept="image/jpeg, image/png">
                    <?php echo "<div style='color: #dd5f5f;'> $imgErr </div>" ?>
                </div>
                <div class="form__div">
                    <label for="descripcion" class="form__label">Descripción: </label>
                    <textarea name="descripcion" id="descripcion" cols="30" rows="10" class="form__input"> <?php echo ($_SERVER["REQUEST_METHOD"] === 'POST') ? $propiedad->descripcion : "" ?></textarea>
                    <?php echo "<div style='color: #dd5f5f;'> $mesage </div>" ?>
                </div>
            </fieldset>
            <fieldset>
                <legend>Informacion de Propiedad</legend>
                <div class="form__div">
                    <label for="habitaciones" class="form__label">Habitaciones: </label>
                    <input type="number" class="form__input" name="habitaciones" id="habitaciones" placeholder="Ej. 3" min="1" max="9" value="<?php echo ($_SERVER["REQUEST_METHOD"] === 'POST') ? $propiedad->habitaciones : "" ?>">
                    <?php echo "<div style='color: #dd5f5f;'> $habiErr </div>" ?>
                </div>
                <div class="form__div">
                    <label for="wc" class="form__label">Baños: </label>
                    <input type="number" class="form__input" id="wc" name="wc" placeholder="Ej. 3" min="1" max="9" value="<?php echo ($_SERVER["REQUEST_METHOD"] === 'POST') ? $propiedad->wc : "" ?>">
                    <?php echo "<div style='color: #dd5f5f;'> $wcErr </div>" ?>
                </div>
                <div class="form__div">
                    <label for="estacionamiento" class="form__label">Estacionamiento: </label>
                    <input type="number" class="form__input" id="estacionamiento" name="estacionamiento" placeholder="Ej. 3" min="1" max="9" value="<?php echo ($_SERVER["REQUEST_METHOD"] === 'POST') ? $propiedad->estacionamiento : "" ?>">
                    <?php echo "<div style='color: #dd5f5f;'> $estErr </div>" ?>
                </div>
            </fieldset>
            <fieldset>
                <legend>Seleccione vendedor</legend>
                <div class="form__div">
                    <label for="vendedor" class="form__label">Vendedor</label>
                    <select name="vendedores_id" id="vendedor" class="form__input">
                        <option value="" selected>-- Seleccione --</option>
                        <?php
                        $vendedores = mysqli_fetch_all($resultado, MYSQLI_ASSOC);
                        foreach ($vendedores as $vendedor) : ?>
                            <option value="<?php echo $vendedor['id'] ?>">
                                <?php echo $vendedor['nombre'] . " " . $vendedor['apellido'] ?></option>
                        <?php endforeach; ?>
                    </select>
                    <?php echo "<div style='color: #dd5f5f;'> $vendErr </div>" ?>
                </div>
            </fieldset>
            <input type="submit" class="btn__create" value="Crear propiedad">
        </form>
    </div>
</main>


<?php
includeTemplate('footer', 'footer_admin');
?>