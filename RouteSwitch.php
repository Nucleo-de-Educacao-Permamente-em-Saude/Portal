<?php
abstract class RouteSwitch {

  //rota para a home
  protected function home(){
    require __DIR__ . '/views/home.html';
  }

  //rota para eventos
  protected function Eventos(){
    require __DIR__ . '/views/evento/index.html';
  }
  protected function Eventos_cadastro(){
    require __DIR__ . '/views/evento/cadastro.php';
  }
  protected function Inscricao(){
    require __DIR__ . '/views/evento/inscricao.php';
  }
  protected function Listar(){
    require __DIR__ . '/views/evento/listar.html';
  }
  protected function Editar(){
    require __DIR__ . '/views/evento/editar.php';
  }
  protected function Liberar(){
    require __DIR__ . '/views/evento/liberar.php';
  }

  //rota para capacitações EP
  protected function Noemia(){
    require __DIR__ . '/views/capacitacoes/index.html';
  }

  //rota para capacitações no CHID
  protected function CHID(){
    require __DIR__ . '/views/chid/index.html';
  }

  //rota para capacitações no E-SUS
  protected function E_SUS(){
    require __DIR__ . '/views/e-sus/index.html';
  }

  //rota para calendario
  protected function Calendario(){
    require __DIR__ . '/calendario.php';
  }

  //rota para o CEP
  protected function Comite(){
    require __DIR__ . '/views/comite/index.html';
  }

  //rotas administrativas
  protected function Login(){
    require __DIR__ . '/views/admin/login.html';
  }
  protected function logar(){
    require __DIR__ . '/views/admin/logar.php';
  }
  protected function Logout(){
    require __DIR__ . '/views/admin/sair.php';
  }
  protected function Painel(){
    require __DIR__ . '/views/admin/painel.html';
  }
  protected function Presencas(){
    require __DIR__ . '/views/admin/presencas.html';
  }
  protected function ImprimirLista(){
    require __DIR__ . '/views/admin/print.php';
  }
  protected function CadastroServidor(){
    require __DIR__ . '/views/admin/cadastroservidor.html';
  }

  //rotas para residencia
  protected function Residencia(){
    require __DIR__ . '/views/residencia/index.html';
  }
  protected function CadastroResidente(){
    require __DIR__ . '/views/admin/cadastroresidente.html';
  }
  protected function ResidenciaMedica(){
    require __DIR__ . '/views/residencia/residencia_medica.html';
  }
  protected function ResidenciaMultiprofissional(){
    require __DIR__ . '/views/residencia/residencia_multi.html';
  }
}