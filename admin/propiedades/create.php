<?php
//Base de datos
require('../../includes/config/database.php');
$db = connectDB();

//Funciones
require('../../includes/funciones.php');
includeTemplate('header', 'header_admin');

$verificador = "";
$mesage = "";

$titulo = "";
$precio = "";
$imagen = "";
$descripcion = "";
$habitaciones = "";
$wc = "";
$estacionamiento = "";
$vendedores_id = "";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $titulo = $_POST['titulo'];
    $precio = $_POST['precio'];
    $imagen = $_POST['imagen'];
    $descripcion = $_POST['descripcion'];
    $habitaciones = $_POST['habitaciones'];
    $wc = $_POST['wc'];
    $estacionamiento = $_POST['estacionamiento'];
    $vendedores_id = $_POST['vendedor'];



    //Revisar que los campos no esten vacios
    if ($titulo === '' || $precio === ''  ||    $descripcion === '' || $habitaciones === '' || $wc === '' || $estacionamiento === '' || $vendedores_id === '') {
        $verificador = 'Todos los campos son obligatorios';
    }

    if (strlen($descripcion) < 50) {
        $mesage = 'Como minimo deben ser 50 caracteres en la descripción';
    }

    //Insertar datos en la db
    if (empty($verificador) && empty($mesage)) {
        $query = "INSERT INTO propiedades (titulo, precio,descripcion,vendedores_id,habitaciones,wc,estacionamiento) VALUES ('$titulo', '$precio', '$descripcion', '$vendedores_id', '$habitaciones', '$wc', '$estacionamiento');";

        $resultado = mysqli_query($db, $query);
    }
}



?>
<main class="main">
    <div class="contenedor create">
        <h1>Crear nueva propiedad</h1>
        <a href="../../admin/" class="btn__admin">Regresar</a>

        <form class="form create__form" method="POST" action="./create.php">
            <div style=" width: 100%; background-color: #993030;">
                <p style="text-align: center; width: 100%; font-weight: 500; color: white;"><?php echo $verificador ?></p>
            </div>
            <fieldset>
                <legend>Informacion general</legend>
                <div class="form__div">
                    <label for="titulo" class="form__label">Titulo: </label>
                    <input type="text" class="form__input" id="titulo" name="titulo" placeholder="Titulo de Propiedad" value="<?php echo $titulo ?>">
                </div>
                <div class="form__div">
                    <label for="precio" class="form__label">Precio: </label>
                    <input type="number" class="form__input" id="precio" name="precio" placeholder="Precio de Propiedad" value="<?php echo $precio ?>">
                </div>
                <div class="form__div">
                    <label for="imagen" class="form__label">Imagen: </label>
                    <input type="file" class="form__input" id="imagen" name="imagen" accept="image/jpeg, image/png">
                </div>
                <div class="form__div">
                    <label for="descripcion" class="form__label">Descripción: </label>
                    <textarea name="descripcion" id="descripcion" cols="30" rows="10" class="form__input"> <?php echo $descripcion ?></textarea>
                    <?php echo "<div style='color: #dd5f5f;'> $mesage </div>" ?>
                </div>
            </fieldset>
            <fieldset>
                <legend>Informacion de Propiedad</legend>
                <div class="form__div">
                    <label for="habitaciones" class="form__label">Habitaciones: </label>
                    <input type="number" class="form__input" name="habitaciones" id="habitaciones" placeholder="Ej. 3" min="1" max="9" value="<?php echo $habitaciones ?>">
                </div>
                <div class="form__div">
                    <label for="wc" class="form__label">Baños: </label>
                    <input type="number" class="form__input" id="wc" name="wc" placeholder="Ej. 3" min="1" max="9" value="<?php echo $wc ?>">
                </div>
                <div class="form__div">
                    <label for="estacionamiento" class="form__label">Estacionamiento: </label>
                    <input type="number" class="form__input" id="estacionamiento" name="estacionamiento" placeholder="Ej. 3" min="1" max="9" value="<?php echo $estacionamiento ?>">
                </div>
            </fieldset>
            <fieldset>
                <legend>Seleccione vendedor</legend>
                <div class="form__div">
                    <label for="vendedor" class="form__label">Vendedor</label>
                    <select name="vendedor" id="vendedor" class="form__input">
                        <!--<option value="" disabled selected>-- Seleccione --</option> -->
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