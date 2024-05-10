<?php
  include_once './config.php';

  $titulo = 'Calendário';
  $home = 'nav-link';
  $eventos = 'nav-link';
  $calendario = 'nav-link active';
  $residencia = 'nav-link';

  session_start();
  include CABECALHO;
?>
<link href="./css/custom.css" rel="stylesheet">
<div class="starter-template">

<div id='calendar'></div>
  
  <!-- Modal só visualização -->
  <div class="modal fade" id="visualizar" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Detalhes do Evento</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Fechar">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body" align="left">
          <dl class="row">
            <dt class="col-sm-3">Título:</dt>
            <dd class="col-sm-9" id="title"></dd>
            <dt class="col-sm-3">Descrição:</dt>
            <dd class="col-sm-9" id="descricao"></dd>
            <dt class="col-sm-3">Local:</dt>
            <dd class="col-sm-9" id="onde"></dd>
            <dt class="col-sm-3">Data:</dt>
            <dd class="col-sm-9" id="quando"></dd>
            <dt class="col-sm-6">Vagas disponíveis:</dt>
            <dd class="col-sm-6" id="vagas"></dd>
          </dl>
        </div>
        <div class="modal-footer">
          <form method="post" action="/Inscricao">
            <input type="hidden" name="id" id="id" value="">
            <button type="submit" id="inscrever"  class="btn btn-primary">Inscrever-se</button>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>

  
  <script src="https://cdn.jsdelivr.net/npm/fullcalendar@6.1.10/index.global.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/@fullcalendar/core@6.1.10/locales-all.global.min.js"></script>
  

<script src='js/custom.js'></script>



<?php include RODAPE; ?>