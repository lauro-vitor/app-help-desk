<?php
    session_start();
    if (isset($_SESSION['AUTH']) && $_SESSION['AUTH'] == 'NO') {
        header('Location: index.php?login=erro&message=Usuário não autenticado, faça login');
    }
?>