<?php

require('../includes/funciones.php');
includeTemplate('header', 'header');
?>

<main class="main">
    <section class="contenedor houses anuncios">
        <h2>Casas y Depas en Venta</h2>
        <?php
        $limite = 10;
        include("../includes/templates/propiedades/anuncios.php");
        ?>
    </section>
</main>

<?php
includeTemplate('footer', 'footer');
?>