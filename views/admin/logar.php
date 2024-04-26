<?php
  include_once './config.php';

  session_start();

  $login = $_POST['registro'];
  $password = $_POST['senha'];

  $xml = simplexml_load_file(ADMINS);
  $valido = false;

  foreach( $xml->user as $user ):
    if($login == (string)$user->rf and $password == (string)$user->senha){
      $valido = true;
      break;
    }   
  endforeach;

  if($valido){
    $_SESSION['USER'] = $login;
    header('location: /Painel');
  } else {
    session_destroy();
    header('location: /');
  }

?>