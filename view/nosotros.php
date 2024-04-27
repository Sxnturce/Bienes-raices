<?php
require('../includes/app.php');
includeTemplate('header', 'header');
?>
<main class="main">
    <section class="contenedor aboutus">
        <h2>Sobre nosotros</h2>
        <div class="content">
            <picture>
                <source srcset="../build/img/nosotros.webp" type="image/webp">
                <source srcset="../build/img/nosotros.jpg" type="image/jpeg">
                <img src="../build/img/nosotros.jpg" alt="">
            </picture>
            <div class="content__text">
                <h3>25 Años de Experiencia</h3>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Commodi quisquam incidunt iusto.
                    Voluptate, debitis quaerat sint tempora fuga sed ducimus enim eligendi? Itaque tenetur esse,
                    odit reprehenderit inventore corrupti distinctio!
                    Magni odit esse, dicta delectus placeat ipsam maxime laboriosam praesentium distinctio quisquam
                    exercitationem eum quos nulla doloribus explicabo officia, numquam minima commodi perferendis
                    voluptates totam. Vitae, vel quaerat. Nesciunt, cumque.</p>
            </div>
        </div>
    </section>
    <section class="contenedor about">
        <h1>Mas sobre Nosotros</h1>
        <div class="grid">
            <div class="grid__card">
                <img src="../build/img/icono1.svg" alt="">
                <h3>Seguridad</h3>
                <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Voluptatum fuga exercitationem maiores
                    officia dicta placeat quasi doloremque. Quos, veritatis!</p>
            </div>
            <div class="grid__card">
                <img src="../build/img/icono2.svg" alt="">
                <h3>Precio</h3>
                <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Voluptatum fuga exercitationem maiores
                    officia dicta placeat quasi doloremque. Quos, veritatis!</p>
            </div>
            <div class="grid__card">
                <img src="../build/img/icono3.svg" alt="">
                <h3>A tiempo</h3>
                <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Voluptatum fuga exercitationem maiores
                    officia dicta placeat quasi doloremque. Quos, veritatis!</p>
            </div>
        </div>
    </section>
</main>

<?php
includeTemplate('footer', 'footer');
?>