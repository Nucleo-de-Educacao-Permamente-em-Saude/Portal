<?php
  include_once './config.php';

  session_start();

  $login = $_POST['registro'];
  $password = $_POST['senha'];

  $xml = simplexml_load_file(RESIDENTES);
  $valido = false;

  foreach( $xml->residente as $residente ):
    if($login == (string)$residente->matricula and $password == (string)$residente->senha){
      $valido = true;
      break;
    }   
  endforeach;

  if($valido){
    $_SESSION['USER'] = $login;
    header('location: /Aviso');
  } else {
    session_destroy();
    header('location: /');
  }

?>