<?php
  include_once './config.php';

  $id = $_POST['id'];
  $habilitado = $_POST['habilitado'];
  
  if((string)$habilitado == 'sim'){
    $habilitado = 'não';
  } else {
    $habilitado = 'sim';
  }

  $xml = simplexml_load_file(EVENTOS);
  for($i = 0; $i < count($xml->evento); $i++){
    if(strval($xml->evento[$i]->id) == $id){
      $xml->evento[$i]->habilitado = $habilitado;
    }
  }

  $xml->asXML(EVENTOS);

  header("Location: /Listar");
?>