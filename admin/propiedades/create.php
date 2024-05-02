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

$propiedad = new Propiedad();

$tituloErr = "";
$mesage = "";
$precioErr = "";
$habiErr = "";
$wcErr = "";
$estErr = "";
$vendErr = "";
$imgErr = "";

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
            <?php include('../../includes/templates/form/form.php') ?>
            <input type="submit" class="btn__create" value="Crear propiedad">
        </form>
    </div>
</main>


<?php
includeTemplate('footer', 'footer_admin');
?>