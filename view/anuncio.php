<?php
require('../includes/app.php');
includeTemplate('header', 'header');
?>

<main class="main">
    <section class="contenedor anuncio">
        <h2>Casa frente al bosque</h2>
        <?php
        include("../includes/templates/propiedades/anuncio.php");
        ?>
    </section>
</main>

<?php
includeTemplate('footer', 'footer');
?>