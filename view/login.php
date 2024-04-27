<?php
require('../includes/app.php');
$db = connectDB();

$verifiemail = "";
$verifpass = "";
$email  = "";
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email =  mysqli_real_escape_string($db, $_POST['email']);
    $email = filter_var($email, FILTER_VALIDATE_EMAIL);
    $pass =  mysqli_real_escape_string($db, $_POST['pass']);

    if (!$email) {
        $verifiemail = 'El email no es valido';
    }

    if ($pass === '') {
        $verifpass = 'La contraseña es obligatoria';
    }

    if (empty($verificador) && empty($verifpass)) {
        //Peticion sql para obtener el email
        $peticion = "SELECT email FROM usuarios;";
        $query = mysqli_query($db, $peticion);
        $usuario = mysqli_fetch_assoc($query);

        if ($usuario['email'] !== $email) {
            $verifiemail = 'Email incorrecto';
        } else {
            //Peticion sql para obtener la contraseña
            $peticion = "SELECT pass FROM usuarios;";
            $query = mysqli_query($db, $peticion);
            $password = mysqli_fetch_assoc($query);

            //Verificar la contraseña
            $auth = password_verify($pass, $password['pass']);
            //Verificar la autenticacion
            if ($auth) {
                session_start();

                $_SESSION['usuario'] = $usuario['email'];
                $_SESSION['login'] = true;

                header('Location: ../admin/');
            } else {
                $verifpass = 'La contraseña es incorrecta';
            }
        }
    }
}


includeTemplate('header', 'header');
?>
<main class="main logeo">
    <div class="contenedor login">
        <h1>Administrador</h1>
        <form class="form" method="POST" novalidate>
            <div class="div__login">
                <label for="email" class="form__label">Email</label>
                <input type="email" class="form__input" id="email" name="email" placeholder="example@example.com" value="<?php echo $email ?>">
                <p class="error"><?php echo $verifiemail ?></p>
            </div>
            <div class="div__login">
                <label for="pass" class="form__label">Contraseña</label>
                <div class="container__pass">
                    <input type="password" class="form__input" id="pass" name="pass" placeholder="********">
                    <i class="fa-regular fa-eye-slash" id="icon_eye"></i>
                </div>
                <p class="error"><?php echo $verifpass ?></p>
            </div>
            <input type="submit" class="form__submit" value="Iniciar Sesion">
        </form>
    </div>
</main>


<?php
includeTemplate('footer', 'footer');
?>