<?php
require('../includes/funciones.php');
includeTemplate('header', 'header');
?>
<main class="main">
    <div class="contenedor admin">
        <h1>Administrador</h1>
        <a href="propiedades/create.php" class="btn__admin">Nueva Propiedad</a>
    </div>
</main>
<?php
includeTemplate('footer', 'footer');
?>