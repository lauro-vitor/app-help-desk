<?php
    session_start(); // sempre antes de qualquer print no navegador
    print_r($_SESSION);
    $user_auth = false;
    $user_id = 0;
    $user_name = '';
    $user_perfil_id = null;
    $perfis = array(1 => 'Administrativo', 2 => 'Usuário');
    $messageError = 'email inválido, tente outro email';
    //usuários do sistema
    $users_app = [
        ['id' => 1,'email' => 'adm@teste.com.br', 'password' => '1234', 'perfil_id' => 1, 'user_name'=>'adm'],
        ['id' => 2,'email' => 'user@teste.com.br', 'password' => '1234', 'perfil_id' => 1, 'user_name'=>'user'],
        ['id' => 3,'email' => 'joao@teste.com.br', 'password' => '1234', 'perfil_id' => 2, 'user_name'=>'João'],
        ['id' => 4,'email' => 'maria@teste.com.br', 'password' => '1234', 'perfil_id' => 2, 'user_name' =>'Maria'],
    ];
    //idéia é percorrer o array e verificar se o usuário é valido
    if(empty($_POST['email']) || empty($_POST['password'])){
        goIndex('email ou senha vazio(s)');
        return;
    }
    array_map(function ($user){
        global $user_auth,  $user_id, $user_perfil_id, $messageError,$user_name ;
        if($_POST['email'] == $user['email'] ) {
            if( $_POST['password'] == $user['password']){
                $user_auth = true;
                $user_id =$user['id'];
                $user_perfil_id = $user['perfil_id'];
                $user_name = $user['user_name'];
                return;
            }else {
                $messageError = 'Senha Inválida, tente novamente';
                return;
            }
        } 
    }, $users_app);

    if($user_auth){
        $_SESSION['AUTH'] = 'YES';
        $_SESSION['ID'] = $user_id;
        $_SESSION ['PERFIL_ID'] = $user_perfil_id;
        $_SESSION['USER_NAME'] =  $user_name;
        header('Location: home.php');
    } else {
         // força o redirecionamento da página, no caso index.php e mandaeremos uma mensagem de erro
        $_SESSION['AUTH'] = 'NO';
        goIndex($messageError);
    }
    function goIndex($message){
        header('Location: index.php?login=erro&message='.$message);
    }
?> 