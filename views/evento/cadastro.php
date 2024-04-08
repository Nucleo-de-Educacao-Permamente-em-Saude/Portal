<?php
  include_once './config.php';

  $titulo = 'Cadastro de Eventos';
  $home = 'nav-link';
  $eventos = 'nav-link active';
  $calendario = 'nav-link';

  session_start();
  if(!isset($_SESSION['USER']) == true){
    header('Location: /Login');
  } 

  include CABECALHO;
?>
<div class="container">
  <h1>Cadastro de Eventos</h1>
  <hr>
  <form method="POST"> 
    <div class="form-row">
      <div class="form-group col">
        <label for="titulo">Título:</label>
        <input type="text" class="form-control" id="titulo" name="titulo" placeholder="Digite o título do evento">
      </div>
    </div>
    <div class="form-row">
      <div class="form-group col">
        <label for="descricao">Descrição:</label>
        <textarea class="form-control" id="descricao" name="descricao" rows="3" placeholder="Digite a descrição do evento"></textarea>
      </div>
    </div>
    <div class="form-row">
      <div class="form-group col-md-4">
        <label for="data">Data:</label>
        <input type="date" class="form-control" id="data" name="data" placeholder="Digite a data do evento">
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
      <div class="form-group col-md-4">
        <label for="fim">Horário de Termíno:</label>
        <select class="form-control" id="fim" name="fim">
          <?php
            for($x=0;$x <= 23;$x++){
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
      <div class="form-group col-md-6">
        <label for="tipo">Tipo:</label>
        <select class="form-control" id="tipo" name="tipo">
          <option>Selecione o tipo</option>
          <option>Capacitação</option>
          <option>CHID</option>
          <option>E-SUS</option>
          <option>Outros</option>
        </select>
      </div>
      <div class="form-group col-md-6">
        <label for="local">Local:</label>
        <select class="form-control" id="local" name="local">
          <option>Selecione o local</option>
          <option>USAFA Noêmia</option>
          <option>Auditório do CHID</option>
          <option>Auditório Roberto Marinho (SEDUC)</option>
          <option>Outros</option>
        </select>
      </div>
    </div>
    <div class="form-row">
      <div class="form-group col-auto">
        <label for="qtde">Quantidade de Vagas:</label>
        <input type="number" class="form-control" id="qtde" name="qtde" placeholder="Vagas">
      </div>
      <div class="form-group col-md-6">
        <label for="publico">Público Alvo:</label>
        <div class="form-check">
          <input class="form-check-input" type="checkbox" value="true" id="todos" name="todos">
          <label class="form-check-label" for="todos">Todos</label>
        </div>
        <div class="form-check form-check-inline">
          <input class="form-check-input" type="checkbox" value="true" id="medic" name="medic">
          <label class="form-check-label" for="medic">Médicos(as)</label>
        </div>
        <div class="form-check form-check-inline">
          <input class="form-check-input" type="checkbox" value="true" id="enf" name="enf">
          <label class="form-check-label" for="enf">Enfermeiros(as) e Auxiliares</label>
        </div>
        <div class="form-check form-check-inline">
          <input class="form-check-input" type="checkbox" value="true" id="acs" name="acs">
          <label class="form-check-label" for="acs">ACS</label>
        </div>
        <div class="form-check"></div>
        <div class="form-check form-check-inline">
          <input class="form-check-input" type="checkbox" value="true" id="ags" name="ags">
          <label class="form-check-label" for="ags">Agentes Administrativos</label>
        </div>
        <div class="form-check form-check-inline">
          <input class="form-check-input" type="checkbox" value="true" id="recep" name="recep">
          <label class="form-check-label" for="recep">Recepcionistas</label>
        </div>
        <div class="form-check"></div>
        <div class="form-check form-check-inline">
          <input class="form-check-input" type="checkbox" value="true" id="dent" name="dent">
          <label class="form-check-label" for="dent">Dentistas</label>
        </div>
        <div class="form-check form-check-inline">
          <input class="form-check-input" type="checkbox" value="true" id="fisio" name="fisio">
          <label class="form-check-label" for="fisio">Fisioterapeutas</label>
        </div>
        <div class="form-check form-check-inline">
          <input class="form-check-input" type="checkbox" value="true" id="psico" name="psico">
          <label class="form-check-label" for="psico">Psicológos(as)</label>
        </div>
      </div>
      <div class="form-group col-auto">
        <button type="submit" name="cadastro" class="btn btn-outline-success">Salvar</button>
        <a href="/Painel" class="btn btn-outline-danger">Cancelar</a>
      </div>
    </div>
  </form>
</div>
<style>
  function marcarTodos(radio){
    
  }
</style>


<?php include RODAPE;
if(isset($_POST['cadastro'])){
  if(isset($_POST['titulo']) and isset($_POST['descricao']) and isset($_POST['data']) and isset($_POST['inicio']) and isset($_POST['fim']) and isset($_POST['tipo']) and isset($_POST['local']) and isset($_POST['qtde'])){
    $titulo = $_POST['titulo'];
    $descricao = $_POST['descricao'];
    $data = date("d/m/Y", strtotime($_POST['data']));
    $inicio = $_POST['inicio'];
    $fim = $_POST['fim'];
    $tipo = $_POST['tipo'];
    $local = $_POST['local'];
    $qtde = $_POST['qtde'];
    $todos = isset($_POST['todos']) ? 'sim' : 'não';
    $medic = isset($_POST['medic']) ? 'sim' : 'não';
    $enf = isset($_POST['enf']) ? 'sim' : 'não';
    $acs = isset($_POST['acs']) ? 'sim' : 'não';
    $ags = isset($_POST['ags']) ? 'sim' : 'não';
    $recep = isset($_POST['recep']) ? 'sim' : 'não';
    $dent = isset($_POST['dent']) ? 'sim' : 'não';
    $fisio = isset($_POST['fisio']) ? 'sim' : 'não';
    $psico = isset($_POST['psico']) ? 'sim' : 'não';

    if($tipo == 'Capacitação'){
      $cor = '#32CD32';
    }elseif( $tipo == 'CHID'){
      $cor = '#FF6347';
    }elseif($tipo == 'E-SUS'){
      $cor = '#808000';
    }else{
      $cor = '#1E90FF';
    }

    //carrega a lista de eventos
    $xml = simplexml_load_file(EVENTOS);
    $xml2 = simplexml_load_file(PUBLICO);

    $id = count($xml->evento) + 1;
    
     
    //insere os dados no objeto
    $obj = $xml->addChild('evento');
    $obj->addChild('id', $id);
    $obj->addChild('titulo', $titulo);
    $obj->addChild('descricao', $descricao);
    $obj->addChild('data', $data);
    $obj->addChild('inicio', $inicio);
    $obj->addChild('fim', $fim);
    $obj->addChild('tipo', $tipo);
    $obj->addChild('local', $local);
    $obj->addChild('vagas', $qtde);
    $obj->addChild('disponivel', $qtde);
    $obj->addChild('cor', $cor);
    $obj->addChild('habilitado', 'sim');

    
    $obj = $xml2->addChild('publico');
    $obj->addChild('id', $id);
    $obj->addChild('todos', $todos);
    $obj->addChild('medic', $medic);
    $obj->addChild('enf', $enf);
    $obj->addChild('acs', $acs);
    $obj->addChild('ags', $ags);
    $obj->addChild('recep', $recep);
    $obj->addChild('dent', $dent);
    $obj->addChild('fisio', $fisio);
    $obj->addChild('psico', $psico);
    
    $xml->asXML(EVENTOS);
    $xml2->asXML(PUBLICO);

    echo "<script type='text/javascript'>alert('Evento Cadastrado com sucesso!');</script>";
  } else {
    echo  "<script>alert('Preencha os campos corretamente.');</script>";
  }
}
?>