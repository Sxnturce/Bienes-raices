<?php
session_start();
$auth = $_SESSION['login'];
if (!$auth) {
    header('Location: ../index.php');
}
require('../../includes/funciones.php');
includeTemplate('header', 'header_admin');
?>
<h1>Eliminar una propiedad</h1>
<?php
includeTemplate('footer', 'footer_admin');
?>