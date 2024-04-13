<?php
include '../includes/templates/header/header.php';
?>

<main class="main">
    <section class="contenedor contacto">
        <h2>Contactanos</h2>
        <div class="contacto__content">
            <picture>
                <source srcset="../build/img/destacada3.webp" type="image/webp">
                <source srcset="../build/img/destacada3.jpg" type="image/jpg">
                <img src="../build/img/destacada3.jpg" alt="contacto">
            </picture>
            <h3>Llena el formulario de contacto</h3>
            <form action="" class="form">
                <fieldset>
                    <legend>Informacion Personal</legend>
                    <div class="form__div">
                        <label for="nombre" class="form__label">Nombre</label>
                        <input type="text" class="form__input" id="nombre" placeholder="Tu Nombre">
                    </div>
                    <div class="form__div">
                        <label for="email" class="form__label">E-mail</label>
                        <input type="email" class="form__input" id="email" placeholder="Tu correo">
                    </div>
                    <div class="form__div">
                        <label for="telefono" class="form__label">Telefono</label>
                        <input type="text" class="form__input" id="telefono" placeholder="123-456-789">
                    </div>
                    <div class="form__div">
                        <label for="mensaje" class="form__label">Mensaje</label>
                        <textarea id="mensaje" cols="30" rows="10" class="form__input"></textarea>
                    </div>
                </fieldset>
                <fieldset>
                    <legend>Informacion Sobre propiedad</legend>
                    <div class="form__div">
                        <label for="vende" class="form__label">Vende o compra</label>
                        <select name="vende" id="vende" class="form__input" id="vende">
                            <option value="" disabled selected>-- Seleccione --</option>
                            <option value="vende">Vende</option>
                            <option value="renta">Compra</option>
                        </select>
                    </div>
                    <div class="form__div">
                        <label for="presupuesto" class="form__label">Precio o presupuesto</label>
                        <input type="number" class="form__input" id="presupuesto">
                    </div>
                </fieldset>
                <fieldset>
                    <legend>Contacto</legend>
                    <div class="form__div">
                        <p>Como desea ser contactado</p>
                        <div class="form__radios">
                            <div class="form__radio">
                                <label for="radiophone">Teléfono</label>
                                <input type="radio" name="contacto" id="radiophone" class="radiophone">
                            </div>
                            <div class="form__radio">
                                <label for="radiomail">E-mail</label>
                                <input type="radio" name="contacto" id="radiomail" class="radiomail">
                            </div>
                        </div>
                    </div>
                    <div class="form__div">
                        <p>Si eligio telefono, elija la fecha y hora para ser contactado</p>
                        <div class="form__under">
                            <label for="fechadate">Fecha</label>
                            <input type="date" class="form__input" id="fechadate">
                        </div>
                    </div>
                    <div class="form__div">
                        <div class="form__under">
                            <label for="fechahora">Hora</label>
                            <input type="time" class="form__input" id="fechahora">
                        </div>
                    </div>
                </fieldset>
                <input type="submit" class="btn" value="Enviar">
            </form>
        </div>
    </section>
</main>

<?php
include '../includes/templates/footer/footer.php';
?>