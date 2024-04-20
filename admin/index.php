<?php
require('../includes/funciones.php');
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
<?php endif;
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