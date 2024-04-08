<?php
  include_once './config.php';

  $titulo = 'Inscrição';
  $home = 'nav-link';
  $eventos = 'nav-link active';
  $calendario = 'nav-link';

  session_start();

    $id = $_POST['id'];
    $xml = simplexml_load_file(EVENTOS);
    foreach( $xml->evento as $evento ):
      if($id == (string) $evento->id){
        $titulo = (string) $evento->titulo;
        $descricao = (string) $evento->descricao;
        $data = (string) $evento->data;
        $inicio = (string) $evento->inicio;
        $local = (string) $evento->local;

        //$quando = date("d/m/Y", strtotime($data));
        $inicio = date("H:i", strtotime($inicio));
        break;
      }
    endforeach;

  include CABECALHO;
?>

<div class="container">
  <h1>Inscrição</h1>
  <hr>
  <form method="POST"> 
    <div class="form-row">
      <div class="form-group col">
        <label for="titulo">Título:</label>
        <input type="text" readonly class="form-control" id="titulo" name="titulo" value="<?= $titulo; ?>">
      </div>
    </div>
    <div class="form-row">
      <div class="form-group col">
        <label for="descricao">Descrição:</label>
        <textarea class="form-control" readonly id="descricao" name="descricao" rows="3" ><?= $descricao; ?></textarea>
      </div>
    </div>
    <div class="form-row">
      <div class="form-group col-md-6">
        <label for="quando">Data:</label>
        <input type="text" readonly class="form-control" id="quando" name="quando" value="<?= $data . ' às ' . $inicio; ?>">
      </div>
      <div class="form-group col-md-6">
        <label for="local">Local:</label>
        <input type="text" readonly class="form-control" id="local" name="local" value="<?= $local; ?>">
      </div>
    </div>
    <hr>
    <div class="form-row">
      <div class="form-group col-md-2">
        <label for="registro">Digite o seu Registro Funcional (RF):</label>
      </div>
      <div class="form-group col-md-3">
        <input type="text" class="form-control" id="registro" name="registro" placeholder="Registro funcional">
      </div>
      <div class="form-group col-md-3">
        <input type="hidden" class="form-control" id="id" name="id" value="<?= $id; ?>">
        <button type="submit" class="form-control btn btn-primary" name="pesquisarRF">Buscar</button>
      </div>
    </div>
    <?php
      if(isset($_POST['pesquisarRF'])){
        
        $titulo = $_POST['titulo'];
        $descricao = $_POST['descricao'];
        $quando = $_POST['quando'];
        $local = $_POST['local'];
        
        $registro = $_POST['registro'];
        
        $xml = simplexml_load_file(SERVIDORES);
        
        foreach( $xml->servidor as $servidor ):
          if($registro == (string) $servidor->registro){
            $nome = (string)$servidor->nome;
            $cargo = (string) $servidor->cargo;
            $local = (string) $servidor->local;
            break;
          }
        endforeach;

        $xml3 = simplexml_load_file(PUBLICO);
        $alvo = 'não';
        foreach( $xml3->publico as $publico ):
          if((string) $id == (string) $publico->id){
            switch($cargo){
              case 'AGENTE ADMINISTRATIVO':
                if($publico->ags == 'sim'){
                  $alvo = 'sim';
                }
                break;
              case 'AGENTE COMUNITARIO DE SAUDE':
                if($publico->acs == 'sim'){
                  $alvo = 'sim';
                }
                break;
              case 'MEDICO':
                if($publico->medic == 'sim'){
                  $alvo = 'sim';
                }
                break;
              case 'PROFISSIONAL PROGRAMA MAIS MEDICOS':
                if($publico->medic == 'sim'){
                  $alvo = 'sim';
                }
                break;
              case 'PROFISSIONAL PROGRAMA MEDICOS PELO BRASIL':
                if($publico->medic == 'sim'){
                  $alvo = 'sim';
                }
                break;
              case 'PROFISSIONAL PROGRAMA MEDICOS RESIDENTES':
                if($publico->medic == 'sim'){
                  $alvo = 'sim';
                }
                break;
              case 'TECNICO DE ENFERMAGEM':
                if($publico->enf == 'sim'){
                  $alvo = 'sim';
                }
                break;
              case 'AUXILIAR DE ENFERMAGEM 24 HS':
                if($publico->enf == 'sim'){
                  $alvo = 'sim';
                }
                break;
              case 'AUXILIAR DE ENFERMAGEM 40 HS':
                if($publico->enf == 'sim'){
                  $alvo = 'sim';
                }
                break;
              case 'ENFERMEIRO':
                if($publico->enf == 'sim'){
                  $alvo = 'sim';
                }
                break;
              case 'AUXILIAR CONS.ODONTOLOGICO':
                if($publico->dent == 'sim'){
                  $alvo = 'sim';
                }
                break;
              case 'DENTISTA-20 HS - PSF':
                if($publico->dent == 'sim'){
                  $alvo = 'sim';
                }
                break;
              case 'DENTISTA-20HS':
                if($publico->dent == 'sim'){
                  $alvo = 'sim';
                }
                break;
              case 'PSICOLOGO':
                if($publico->psico == 'sim'){
                  $alvo = 'sim';
                }
                break;
              case 'RECEPCIONISTA':
                if($publico->recep == 'sim'){
                  $alvo = 'sim';
                }
                break;
              case 'FISIOTERAPEUTA':
                if($publico->fisio == 'sim'){
                  $alvo = 'sim';
                }
                break;
              default:
                if($publico->todos == 'sim'){
                  $alvo = 'sim';
                }
                break;
            }
            if($alvo == 'sim'){
              break;
            } else {
              echo "<script type='text/javascript'>";
              echo "alert('Inscrição Invalida para este evento.'); ";
              echo "window.location = '/Calendario';</script>";
            }
          }
        endforeach;
    
        echo "<div class='form-row'>";
        echo "<div class='form-group col'>";
        echo "<label for='nome'>Nome:</label>";
        echo "<input type='text' readonly class='form-control' id='nome' name='nome' value='". $nome ."' >";
        echo "</div>";
        echo "</div>";
        echo "<div class='form-row'>";
        echo "<div class='form-group col-md-5'>";
        echo "<label for='cargo'>Cargo:</label>";
        echo "<input type='text' readonly class='form-control' id='cargo' name='cargo' value='".$cargo."'>";
        echo "</div>";
        echo "<div class='form-group col-md-7'>";
        echo "<label for='unidade'>Local:</label>";
        echo "<input type='text' readonly class='form-control' id='unidade' name='unidade' value='".$local."'>";
        echo "</div>";
        echo "</div>";
        echo "<div class='form-row'>";
        echo "<div class='form-group col-md-3'>";
        echo "<label for='quando'>Data:</label>";
        echo "<input type='date' class='form-control' id='data_nasc' name='data_nasc' placeholder='Digite a data de nascimento'>";
        echo "</div>";
        echo "<div class='form-group col-md-9'>";
        echo "<label for='contato'>E-Mail:</label>";
        echo "<input type='email' class='form-control' id='contato' name='contato'>";
        echo "</div>";
        echo "</div>";

    echo "<div class='form-row'>";
      echo "<div class='form-group col'>";
        echo "<input type='hidden' class='form-control' id='registro' name='registro' value='". $registro ."'>";
        echo "<button type='submit' name='cadastro' class='btn btn-outline-success'>Salvar</button>";
  echo "</div>";
    echo "</div>";
        }
      ?>
  </form>
</div>
<?php include RODAPE;
if(isset($_POST['cadastro'])){
  if(isset($_POST['registro']) and isset($_POST['contato']) and isset($_POST['data_nasc'])){
    $id = $_POST['id'];
    $registro = $_POST['registro'];
    $dataNasc = date("d/m/Y", strtotime($_POST['data_nasc']));
    $email = $_POST['contato'];
    $nome = $_POST['nome'];
    $cargo = $_POST['cargo'];
    $local = $_POST['unidade'];
    $quando = $_POST['quando'];

    //carrega a lista de eventos
    $xml = simplexml_load_file(INSCRICOES);
      
    //insere os dados no objeto
    $obj = $xml->addChild('inscricao');
    $obj->addChild('eventoId', $id);
    $obj->addChild('registro', $registro);
    $obj->addChild('email', $email);
    $obj->addChild('data_nasc', $dataNasc);

    $xml->asXML(INSCRICOES);

    $xml2 = simplexml_load_file(EVENTOS);
      for($i = 0; $i < count($xml2->evento); $i++){
        if(strval($xml2->evento[$i]->id) == $id){
          $qtde = (int) $xml2->evento[$i]->disponivel;
          $qtde = $qtde - 1;
          $qtde = (string) $qtde;
          $xml2->evento[$i]->disponivel = $qtde;
        }
      }

      $xml2->asXML(EVENTOS);
    
    echo "<script type='text/javascript'>alert('Inscrição com sucesso!'); window.location = '/Calendario';</script>";
  } else {
    echo  "<script>alert('Preencha os campos corretamente.');</script>";
  }
}
?>