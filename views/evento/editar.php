<?php
include_once './config.php';

  $titulo = 'Inscrição';
  $home = 'nav-link';
  $eventos = 'nav-link';
  $calendario = 'nav-link';

  session_start();
  if(!isset($_SESSION['USER']) == true){
    header('Location: /Login');
  }
  include CABECALHO;

  $id = $_POST['id'];
  $xml = simplexml_load_file(EVENTOS);
  foreach( $xml->evento as $evento ):
    if($id == (string) $evento->id){
      $titulo = (string) $evento->titulo;
      $descricao = (string) $evento->descricao;
      $qndo = $evento->data;
      $inicio = (string) $evento->inicio;
      $fim = (string) $evento->fim;
      $tipo = (string) $evento->tipo;
      $local = (string) $evento->local;
      $qtde = (string) $evento->vagas;
      $habilitado = (string) $evento->habilitado;

      
      break;
    }
  endforeach;
?>
<div class="container">
  <h1>Editar Evento/Capacitação</h1>
  <hr>
  <form method="POST">
    <div class="form-row">
      <div class="form-group col-sm-1">
        <label for="titulo">Título:</label>
      </div>
      <div class="form-group col-sm-11">
        <input type="text" class="form-control" id="titulo" name="titulo" value=<?php echo $titulo;?>>
      </div>
    </div>
    <div class="form-row">
      <div class="form-group col">
        <label for="descricao">Descrição:</label>
        <textarea class="form-control" id="descricao" name="descricao" rows="3"><?php echo $descricao;?></textarea>
      </div>
    </div>
    <div class="form-row">
      <div class="form-group col-md-4">
        <label for="qndo">Data: <i>Originalmente em <?php echo $qndo;?> </i></label>
        
        <input type="date" class="form-control" id="qndo" name="qndo" >
      </div>
      <div class="form-group col-md-4">
        <label for="inicio">Horário de Início:</label>
        <select class="form-control" id="inicio" name="inicio">
          <?php
            for($x=8;$x <= 19;$x++){
              if($x <= 9){
                echo '<option>0' . $x . ':00</option>';
                echo '<option>0' . $x . ':30</option>';
              } else {
                echo '<option>' . $x . ':00</option>';
                echo '<option>' . $x . ':30</option>';
              }
            }
          ?>
        </select>
      </div>
    </div>
    <div class="form-row">
      <div class="form-group col">
      
      </div>
    </div>
  </form>
</div>