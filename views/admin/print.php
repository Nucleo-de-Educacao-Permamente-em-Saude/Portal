<?php
  include_once './config.php';
  session_start();

  if(!isset($_SESSION['USER']) == true){
    header("Location: /");
  }

  $titulo = 'PAINEL';
  $home = 'nav-link';
  $eventos = 'nav-link';
  $calendario = 'nav-link';
  $class = 'class="container"';

  include CABECALHO;

  if(isset($_POST['print']) and isset($_POST['titulo']) and isset($_POST['data']) and isset($_POST['horario'])){
    $item = $_POST['print'];
    $titulo = $_POST['titulo'];
    $data = $_POST['data'];
    $horario = $_POST['horario'];

    echo "<div class='container'>";
    echo "<div class='row'>";
    echo "<div class=' text-center col'>";
    echo "<h1 class='display-1'>" . $titulo . "</h1>";
    echo "</div>";
    echo "</div>";
    echo "<div class='row'>
    <p>
      CONSIDERANDO a Portaria nº 278/GM/MS, de 27 de fevereiro de 2014, que institui diretrizes para implementação da Política de Educação Permanente em Saúde, no âmbito do Ministério da Saúde (MS);<br>
      CONSIDERANDO a Portaria MS No 2436/2017, que estabelece a revisão de diretrizes para a organização da Atenção Básica, no âmbito do Sistema Único de Saúde (SUS), onde lê-se em seu Anexo I - Capítulo I - item 4.1: <em>“...São atribuições comuns a todos os profissionais: XXII. Articular e participar das atividades de educação permanente e educação continuada;...”</em><br>
      Orientamos que a presente “Lista de Presença”,  destina-se ao controle de freqüência dos profissionais durante os períodos previamente destinados à Educação Permanente em Saúde, conforme legislação vigente.<br>
      Informamos ainda que o não comparecimento, e/ou entrada/saída discordante ao horário proposto, FRAUDES (como por exemplo assinar por outra pessoa), etc,  implicará ao(s) servidor(es), as sanções administrativas pertinentes.
    </p>
  </div>";
    echo "<hr>";
    echo "<div class='row'>";
    echo "<div class=' text-center col'>";
    echo "<h2 class='display-4'>" . $data . " às " . $horario . "</h2>";
    echo "</div>";
    echo "</div>";
    echo "<table class='table table-sm table-bordered'>";
    echo "<thead class='thead-light'>";
    echo "<tr class='text-center'>";
    echo "<th width='5%'>R.F.</th>";
    echo "<th width='20%'>Nome</th>";
    echo "<th width='20%'>Cargo</th>";
    echo "<th width='20%'>Data de Nascimento</th>";
    echo "<th width='50%'>Assinatura</th>";
    echo "</tr>";
    echo "</thead>";
    echo "<tbody>";

    $xml1 = simplexml_load_file(INSCRICOES);
    $xml2 = simplexml_load_file(SERVIDORES);

    foreach( $xml1->inscricao as $inscricao ):
      if($item == (string) $inscricao->eventoId){
        foreach( $xml2->servidor as $servidor ):
          if((string) $servidor->registro == (string) $inscricao->registro){
            echo "<tr>";
            echo "<td>" . (string) $servidor->registro . "</td>";
            echo "<td>" . (string) $servidor->nome . "</td>";
            echo "<td>" . (string) $servidor->cargo . "</td>";
            echo "<td>" . (string) $inscricao->data_nasc . "</td>";
            echo "<td></td>";
            echo "</tr>";
          }
        endforeach;
      }
    endforeach;

    echo "</tbody>";
    echo "</table>";

    echo "<div class='row'>";
    echo "<a href='javascript:window.print()' class='btn btn-outline-success'>Imprimir</a>";
    echo "<a href='/Presencas' class='btn btn-outline-danger'>Voltar</a>";
    
  } else {
    echo "<script type='text/javascript'>window.location = '/Presencas';</script>";
  }
?>