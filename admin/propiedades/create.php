<?php
require('../../includes/funciones.php');
includeTemplate('header', 'header_admin');
?>
<main class="main">
    <div class="contenedor create">
        <h1>Crear nueva propiedad</h1>
        <a href="../../admin/" class="btn__admin">Regresar</a>

        <form class="form create__form">
            <fieldset>
                <legend>Informacion general</legend>
                <div class="form__div">
                    <label for="titulo" class="form__label">Titulo: </label>
                    <input type="text" class="form__input" id="titulo" placeholder="Titulo de Propiedad">
                </div>
                <div class="form__div">
                    <label for="precio" class="form__label">Precio: </label>
                    <input type="number" class="form__input" id="precio" placeholder="Precio de Propiedad">
                </div>
                <div class="form__div">
                    <label for="file" class="form__label">Imagen: </label>
                    <input type="file" class="form__input" id="file" accept="image/jpeg, image/png">
                </div>
                <div class="form__div">
                    <label for="descripcion" class="form__label">Descripción:</label>
                    <textarea name="description" id="description" cols="30" rows="10" class="form__input"></textarea>
                </div>
            </fieldset>
            <fieldset>
                <legend>Informacion de Propiedad</legend>
                <div class="form__div">
                    <label for="habitaciones" class="form__label">Habitaciones: </label>
                    <input type="number" class="form__input" id="habitaciones" placeholder="Ej. 3" min="1" max="9">
                </div>
                <div class="form__div">
                    <label for="bano" class="form__label">Baños: </label>
                    <input type="number" class="form__input" id="bano" placeholder="Ej. 3" min="1" max="9">
                </div>
                <div class="form__div">
                    <label for="estacion" class="form__label">Estacionamiento: </label>
                    <input type="number" class="form__input" id="estacion" placeholder="Ej. 3" min="1" max="9">
                </div>
            </fieldset>
            <fieldset>
                <legend>Seleccione vendedor</legend>
                <div class="form__div">
                    <label for="vendedor" class="form__label">Vendedor</label>
                    <select name="vendedor" id="vende" class="form__input" id="vendedor">
                        <option value="" disabled selected>-- Seleccione --</option>
                        <option value="1">Sebastian</option>
                        <option value="2">Cristian</option>
                    </select>
                </div>
            </fieldset>
            <input type="submit" class="btn__create" value="Crear propiedad">
        </form>
    </div>
</main>
<?php
includeTemplate('footer', 'footer_admin');
?>