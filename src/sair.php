<?php
session_start();
if (isset($_SESSION['logado']) && $_SESSION['logado'] == true) {

    session_destroy();
    header('Location: ./view/index.php');

}

?>