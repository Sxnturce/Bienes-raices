<?php
$db = connectDB();

$peticion = "SELECT * FROM propiedades LIMIT $limite;";
$resultado = mysqli_query($db, $peticion);

$propiedades = mysqli_fetch_all($resultado, MYSQLI_ASSOC);
?>

<div class="grid">
    <?php foreach ($propiedades as $propiedad) : ?>
        <div class="grid__card">
            <img loading='lazy' src='../imagenes/<?php echo $propiedad["imagen"] ?>' alt='<?php echo $propiedad["titulo"] ?>'>
            <div class="container__card">
                <div class="grid__card--text">
                    <h3><?php echo $propiedad["titulo"] ?></h3>
                    <p class="description"><?php echo $propiedad["descripcion"] ?></p>
                    <p class="price">$<?php echo $propiedad["precio"] ?></p>
                </div>
                <div class="grid__card--icon">
                    <div class="card__item">
                        <img src="../build/img/icono_wc.svg" alt="">
                        <p><?php echo $propiedad["wc"] ?></p>
                    </div>
                    <div class="card__item">
                        <img src="../build/img/icono_estacionamiento.svg" alt="">
                        <p><?php echo $propiedad["estacionamiento"] ?></p>
                    </div>
                    <div class="card__item">
                        <img src="../build/img/icono_dormitorio.svg" alt="">
                        <p><?php echo $propiedad["habitaciones"] ?></p>
                    </div>
                </div>
                <a href="../view/anuncio.php?id=<?php echo $propiedad["id"] ?>" class="btn__yellow">Ver propiedad</a>
            </div>
        </div>
    <?php endforeach; ?>
</div>