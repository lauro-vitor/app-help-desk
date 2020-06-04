<?php
    session_start();
    //criando um protocolo para escrita de arquivo, substituindo o # pelo -, para não quebrar a lógica
    $title = str_replace('#', '-', $_POST['title']);
    $category = str_replace('#', '-', $_POST['category']);
    $description = str_replace('#', '-', $_POST['description']);
    $user_name =  $_SESSION['USER_NAME'];
    $text = $_SESSION['ID'].'#'. $title . '#'. $category.'#'.$description.'#'.$user_name.PHP_EOL;
 
    $file = fopen('../private_app_help_desk/file.hd','a');
  
    fwrite($file, $text);

    fclose($file);
    header('Location: abrir_chamado.php');
?>