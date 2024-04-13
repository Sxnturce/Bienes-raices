<?php
include '../includes/templates/header/header.php';
?>

<main class="main">
    <section class="contenedor anuncio">
        <h2>Casa frente al bosque</h2>
        <picture>
            <source srcset="../build/img/destacada.webp" type="image/webp">
            <source srcset="../build/img/destacada.jpg" type="image/jpeg">
            <img loading="lazy" src="../build/img/destacada.jpg" alt="imagen anuncio">
        </picture>
        <div class="anuncio__text">
            <p class="anuncio__text--bold">U$D 360.000</p>
            <div class="anuncio__icon">
                <div class="card__item">
                    <img src="../build/img/icono_wc.svg" alt="">
                    <p>3</p>
                </div>
                <div class="card__item">
                    <img src="../build/img/icono_estacionamiento.svg" alt="">
                    <p>3</p>
                </div>
                <div class="card__item">
                    <img src="../build/img/icono_dormitorio.svg" alt="">
                    <p>4</p>
                </div>
            </div>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Ipsa placeat qui corporis, assumenda
                quisquam laboriosam, cumque officiis ab quae delectus dicta mollitia provident? Voluptatibus odio
                distinctio asperiores autem error ducimus.
                Voluptatem delectus quod aut rem nemo, autem maxime impedit doloremque. Recusandae, hic doloribus
                voluptatum suscipit porro quod illo perferendis necessitatibus sunt laboriosam aspernatur possimus
                magni quisquam? Ut, dolorem illum. Consdae, hic doloribus
                voluptatum suscipit porro quod illo perferendis necessitatibus sunt laboriosam aspernatur possimus
                magni quisquam? Ut, dolorem illum. Consectetur?</p>
        </div>
    </section>
</main>

<?php
include '../includes/templates/footer/footer.php';
?>