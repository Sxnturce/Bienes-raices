<fieldset>
    <legend>Informacion general</legend>
    <div class="form__div">
        <label for="titulo" class="form__label">Titulo: </label>
        <input type="text" class="form__input" id="titulo" name="titulo" placeholder="Titulo de Propiedad" value="<?php echo s($propiedad->titulo) ?>">
        <?php echo "<div style='color: #dd5f5f;'> $tituloErr </div>" ?>
    </div>
    <div class="form__div">
        <label for="precio" class="form__label">Precio: </label>
        <input type="number" class="form__input" id="precio" name="precio" placeholder="Precio de Propiedad" value="<?php echo s($propiedad->precio) ?>">
        <?php echo "<div style='color: #dd5f5f;'> $precioErr </div>" ?>
    </div>
    <div class="form__div">
        <label for="imagen" class="form__label">Imagen: </label>
        <input type="file" class="form__input" id="imagen" name="imagen" accept="image/jpeg, image/png">
        <?php echo "<div style='color: #dd5f5f;'> $imgErr </div>" ?>
    </div>
    <div class="form__div">
        <label for="descripcion" class="form__label">Descripción: </label>
        <textarea name="descripcion" id="descripcion" cols="30" rows="10" class="form__input"> <?php echo s($propiedad->descripcion) ?></textarea>
        <?php echo "<div style='color: #dd5f5f;'> $mesage </div>" ?>
    </div>
</fieldset>
<fieldset>
    <legend>Informacion de Propiedad</legend>
    <div class="form__div">
        <label for="habitaciones" class="form__label">Habitaciones: </label>
        <input type="number" class="form__input" name="habitaciones" id="habitaciones" placeholder="Ej. 3" min="1" max="9" value="<?php echo s($propiedad->habitaciones) ?>">
        <?php echo "<div style='color: #dd5f5f;'> $habiErr </div>" ?>
    </div>
    <div class="form__div">
        <label for="wc" class="form__label">Baños: </label>
        <input type="number" class="form__input" id="wc" name="wc" placeholder="Ej. 3" min="1" max="9" value="<?php echo s($propiedad->wc) ?>">
        <?php echo "<div style='color: #dd5f5f;'> $wcErr </div>" ?>
    </div>
    <div class="form__div">
        <label for="estacionamiento" class="form__label">Estacionamiento: </label>
        <input type="number" class="form__input" id="estacionamiento" name="estacionamiento" placeholder="Ej. 3" min="1" max="9" value="<?php echo s($propiedad->estacionamiento) ?>">
        <?php echo "<div style='color: #dd5f5f;'> $estErr </div>" ?>
    </div>
</fieldset>
<fieldset>
    <legend>Seleccione vendedor</legend>
    <div class="form__div">
        <label for="vendedor" class="form__label">Vendedor</label>
        <select name="vendedores_id" id="vendedor" class="form__input">
            <option value="" selected>-- Seleccione --</option>
            <?php
            $vendedores = mysqli_fetch_all($resultado, MYSQLI_ASSOC);
            foreach ($vendedores as $vendedor) : ?>
                <option value="<?php echo $vendedor['id'] ?>">
                    <?php echo $vendedor['nombre'] . " " . $vendedor['apellido'] ?></option>
            <?php endforeach; ?>
        </select>
        <?php echo "<div style='color: #dd5f5f;'> $vendErr </div>" ?>
    </div>
</fieldset>