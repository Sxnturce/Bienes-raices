<?php
require('../includes/funciones.php');
includeTemplate('header', 'header');
?>
<main class="main logeo">
    <div class="contenedor login">
        <h1>Administrador</h1>
        <form class="form" method="POST">
            <div class="div__login">
                <label for="email" class="form__label">Email</label>
                <input type="email" class="form__input" id="email" name="email" placeholder="example@example.com">
            </div>
            <div class="div__login">
                <label for="pass" class="form__label">Contraseña</label>
                <div class="container__pass">
                    <input type="password" class="form__input" id="pass" name="pass" placeholder="********">
                    <i class="fa-regular fa-eye" id="icon_eye"></i>
                </div>
            </div>
            <input type="submit" class="form__submit" value="Iniciar Sesion">
        </form>
    </div>
</main>


<?php
includeTemplate('footer', 'footer');
?>