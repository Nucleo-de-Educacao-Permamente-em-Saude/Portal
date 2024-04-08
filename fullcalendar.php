<?php
  require_once('./config.php');

  $xml = simplexml_load_file(EVENTOS);

  $eventos = [];

  foreach($xml->evento as $evento):
    $id = (string) $evento->id;
    $titulo = (string)$evento->titulo;
    $cor = (string)$evento->cor;
    $data = DateTime::createFromFormat('d/m/Y',$evento->data);
    $data = $data->format('Y-m-d');
    $inicio = $data . ' ' . (string)$evento->inicio;
    $fim = $data . ' ' . (string)$evento->fim;
    $descricao = (string)$evento->descricao;
    $local = (string)$evento->local;
    $qtde = (string)$evento->disponivel;
    $habilitado = (string)$evento->habilitado;

    $eventos[] = [
      'id' => $id,
      'title' => $titulo,
      'color' => $cor,
      'start' => $inicio,
      'end' => $fim,
      'extendedProps' => [
        'description' => $descricao,
        'local' => $local,
        'vagas' => $qtde,
        'habilitado' => $habilitado,
      ],
    ];
  endforeach;

  echo json_encode($eventos);
?>