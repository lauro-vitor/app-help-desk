<?php
    session_start();
    session_destroy(); // sessão será destruida
    header('Location: index.php');
?>