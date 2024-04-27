<?php
$db = connectDB();

//Obtener el id de la ultima propiedad
$id = $_GET['id'];
$id = filter_var($id, FILTER_VALIDATE_INT);

if (!$id) {
    header('Location: ../index.php');
} else {
    $peticion = "SELECT * FROM propiedades WHERE id = $id;";
    $result = mysqli_query($db, $peticion);
    if ($result->num_rows === 0) {
        header('Location: ../index.php');
    } else {
        $propiedad = mysqli_fetch_assoc($result);
    }
}
?>

<img loading="lazy" src="../imagenes/<?php echo $propiedad['imagen'] ?>" alt="imagen anuncio">
<div class="anuncio__text">
    <p class="anuncio__text--bold">$<?php echo $propiedad['precio'] ?></p>
    <div class="anuncio__icon">
        <div class="card__item">
            <img src="../build/img/icono_wc.svg" alt="">
            <p><?php echo $propiedad['wc'] ?></p>
        </div>
        <div class="card__item">
            <img src="../build/img/icono_estacionamiento.svg" alt="">
            <p><?php echo $propiedad['estacionamiento'] ?></p>
        </div>
        <div class="card__item">
            <img src="../build/img/icono_dormitorio.svg" alt="">
            <p><?php echo $propiedad['habitaciones'] ?></p>
        </div>
    </div>
    <p><?php echo $propiedad['descripcion'] ?></p>
</div>