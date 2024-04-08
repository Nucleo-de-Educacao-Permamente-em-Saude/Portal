<?php
  require_once './config.php';

  $registro = $_POST['registro'];

  //Agora vamos pegar os dados de cada funcionario
  $xml = simplexml_load_file(SERVIDORES);
  $servidores = [];
  foreach( $xml->servidor as $servidor ):
    if($registro == (string) $servidor->registro){
      $servidores[] = [
        'nome' => (string) $servidor->nome,
        'cargo' => (string) $servidor->cargo,
        'local' => (string) $servidor->local
      ];
      break;
    }
  endforeach;

  echo json_encode($servidores);
?>