<?php
include './includes/templates/header/header_index.php';
?>

<main class="main">
    <!-- About section -->
    <section class="contenedor about">
        <h1>Mas sobre Nosotros</h1>
        <div class="grid">
            <div class="grid__card">
                <img src="./build/img/icono1.svg" alt="">
                <h3>Seguridad</h3>
                <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Voluptatum fuga exercitationem maiores
                    officia dicta placeat quasi doloremque. Quos, veritatis!</p>
            </div>
            <div class="grid__card">
                <img src="./build/img/icono2.svg" alt="">
                <h3>Precio</h3>
                <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Voluptatum fuga exercitationem maiores
                    officia dicta placeat quasi doloremque. Quos, veritatis!</p>
            </div>
            <div class="grid__card">
                <img src="./build/img/icono3.svg" alt="">
                <h3>A tiempo</h3>
                <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Voluptatum fuga exercitationem maiores
                    officia dicta placeat quasi doloremque. Quos, veritatis!</p>
            </div>
        </div>
    </section>
    <!-- House section -->
    <section class="contenedor houses">
        <h2>Casas y Depas en Venta</h2>
        <div class="grid">
            <div class="grid__card">
                <picture>
                    <source srcset='./build/img/anuncio1.webp' type='image/webp'>
                    <img loading='lazy' src='./build/img/anuncio1.jpg' alt='anuncio1'>
                </picture>
                <div class="container__card">
                    <div class="grid__card--text">
                        <h3>Casa de Lujo en el Lago</h3>
                        <p>Casa en el lago con excelente vista, acabados de lujo a un excelente precio</p>
                        <p class="price">$3,000,000</p>
                    </div>
                    <div class="grid__card--icon">
                        <div class="card__item">
                            <img src="./build/img/icono_wc.svg" alt="">
                            <p>3</p>
                        </div>
                        <div class="card__item">
                            <img src="./build/img/icono_estacionamiento.svg" alt="">
                            <p>3</p>
                        </div>
                        <div class="card__item">
                            <img src="./build/img/icono_dormitorio.svg" alt="">
                            <p>4</p>
                        </div>
                    </div>
                    <a href="./view/anuncio.html" class="btn__yellow">Ver propiedad</a>
                </div>
            </div>
            <div class="grid__card">
                <picture>
                    <source srcset='./build/img/anuncio2.webp' type='image/webp'>
                    <img loading='lazy' src='./build/img/anuncio2.jpg' alt='anuncio1'>
                </picture>
                <div class="container__card">
                    <div class="grid__card--text">
                        <h3>Casa con terminados de Lujo</h3>
                        <p>Casa en el lago con excelente vista, acabados de lujo a un excelente precio</p>
                        <p class="price">$2,000,000</p>
                    </div>
                    <div class="grid__card--icon">
                        <div class="card__item">
                            <img src="./build/img/icono_wc.svg" alt="">
                            <p>3</p>
                        </div>
                        <div class="card__item">
                            <img src="./build/img/icono_estacionamiento.svg" alt="">
                            <p>3</p>
                        </div>
                        <div class="card__item">
                            <img src="./build/img/icono_dormitorio.svg" alt="">
                            <p>4</p>
                        </div>
                    </div>
                    <a href="./view/anuncio.html" class="btn__yellow">Ver propiedad</a>
                </div>
            </div>
            <div class="grid__card">
                <picture>
                    <source srcset='./build/img/anuncio3.webp' type='image/webp'>
                    <img loading='lazy' src='./build/img/anuncio3.jpg' alt='anuncio1'>
                </picture>
                <div class="container__card">
                    <div class="grid__card--text">
                        <h3>Casa con alberca</h3>
                        <p>Casa en el lago con excelente vista, acabados de lujo a un excelente precio</p>
                        <p class="price">$3,000,000</p>
                    </div>
                    <div class="grid__card--icon">
                        <div class="card__item">
                            <img src="./build/img/icono_wc.svg" alt="">
                            <p>3</p>
                        </div>
                        <div class="card__item">
                            <img src="./build/img/icono_estacionamiento.svg" alt="">
                            <p>3</p>
                        </div>
                        <div class="card__item">
                            <img src="./build/img/icono_dormitorio.svg" alt="">
                            <p>4</p>
                        </div>
                    </div>
                    <a href="./view/anuncio.html" class="btn__yellow">Ver propiedad</a>
                </div>
            </div>
        </div>
        <a href="./view/anuncios.html" class="btn__green">Ver todas</a>
    </section>
    <!-- Contact section -->
    <section class="contact">
        <div class="contenedor contact__text">
            <h2>Encuentra la casa de tus sueños</h2>
            <p>Rellena el formulario y un asesor se pondra en contacto contigo lo antes posible</p>
            <a href="./view/contacto.html">Contactanos</a>
        </div>
    </section>
    <!-- Resenas section -->
    <section class="contenedor resenas">
        <div class="grid">
            <div class="grid__item grid__item--blog">
                <h3>Nuestro Blog</h3>
                <div class="card">
                    <picture>
                        <source srcset='./build/img/blog1.webp' type='image/webp'>
                        <source srcset="./build/img/blog1.jpg" type="image/jpeg">
                        <img loading='lazy' src='./build/img/blog1.jpg' alt='anuncio1'>
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
                        <source srcset='./build/img/blog2.webp' type='image/webp'>
                        <source srcset="./build/img/blog2.jpg" type="image/jpeg">
                        <img loading='lazy' src='./build/img/blog2.jpg' alt='anuncio1'>
                    </picture>
                    <div class="card__text">
                        <h3>Guia para la decoracion de tu Hogar</h3>
                        <hr>
                        <p>Escrito el: <span>20/10/2022</span> por: <span>Admin</span></p>
                        <p>Minimizar el espacio en tu hogar con esta guia aprende a combinar muebles y colores para
                            darle vida a tu espacio</p>
                    </div>
                </div>
            </div>
            <div class="grid__item grid__item--test">
                <h3>Testimoniales</h3>
                <div class="test__container">
                    <img src="./build/img/comilla.svg" alt="comilla">
                    <div class="test__text">
                        <p>El personal se comporto de una excelente forma, muy buena atención y la casa que me
                            ofreciero cumple con todas mis expectativas.</p>
                        <p class="test__name">-Sebastian SR</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>

<?php
include './includes/templates/footer/footer_index.php';
?>