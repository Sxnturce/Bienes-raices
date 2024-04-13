<?php
include '../includes/templates/header/header.php';
?>
<main class="main">
    <div class="grid__item grid__item--blog contenedor blog">
        <h3>Nuestro Blog</h3>
        <div class="card">
            <picture>
                <source srcset='../build/img/blog1.webp' type='image/webp'>
                <source srcset="../build/img/blog1.jpg" type="image/jpeg">
                <img loading='lazy' src='../build/img/blog1.jpg' alt='anuncio1'>
            </picture>
            <div class="card__text">
                <h3>Terraza en el techo de tu casa</h3>
                <hr>
                <p>Escrito el: <span>20/10/2022</span> por: <span>Admin</span></p>
                <p>Consejos para construir una terraza en tu hogar con los mejores materiales ahorrando
                    dinero</p>
            </div>
        </div>
        <div class="card">
            <picture>
                <source srcset='../build/img/blog2.webp' type='image/webp'>
                <source srcset="../build/img/blog2.jpg" type="image/jpeg">
                <img loading='lazy' src='../build/img/blog2.jpg' alt='anuncio1'>
            </picture>
            <div class="card__text">
                <h3>Construye una alberca en tu hogar</h3>
                <hr>
                <p>Escrito el: <span>20/10/2022</span> por: <span>Admin</span></p>
                <p>Minimizar el espacio en tu hogar con esta guia aprende a combinar muebles y colores para
                    darle vida a tu espacio</p>
            </div>
        </div>
        <div class="card">
            <picture>
                <source srcset='../build/img/blog3.webp' type='image/webp'>
                <source srcset="../build/img/blog3.jpg" type="image/jpeg">
                <img loading='lazy' src='../build/img/blog3.jpg' alt='anuncio1'>
            </picture>
            <div class="card__text">
                <h3>Guia para la decoracion de tu Hogar</h3>
                <hr>
                <p>Escrito el: <span>20/10/2022</span> por: <span>Admin</span></p>
                <p>Minimizar el espacio en tu hogar con esta guia aprende a combinar muebles y colores para
                    darle vida a tu espacio</p>
            </div>
        </div>
        <div class="card">
            <picture>
                <source srcset='../build/img/blog4.webp' type='image/webp'>
                <source srcset="../build/img/blog4.jpg" type="image/jpeg">
                <img loading='lazy' src='../build/img/blog4.jpg' alt='anuncio1'>
            </picture>
            <div class="card__text">
                <h3>Guia para la decoracion de tu habitacion</h3>
                <hr>
                <p>Escrito el: <span>20/10/2022</span> por: <span>Admin</span></p>
                <p>Minimizar el espacio en tu hogar con esta guia aprende a combinar muebles y colores para
                    darle vida a tu espacio</p>
            </div>
        </div>
    </div>
</main>

<?php
include '../includes/templates/footer/footer.php';
?>