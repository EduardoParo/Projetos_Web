<!--PHP
  ------------------------------------------------>
<?php 
//executa o fonte e faz parte da mesma sessao
  require_once "validar_acesso.php";
  print_r($_SESSION);
?>
<!--PHP
  ----------------------------------------------------------->
<?php
  //array de chamados
  $aChamados = array();
  //http://php.net/manual/pt_BR/function.fopen.php

  $cArquivo = fopen('../Diretorio_interno/backup.txt','r');

  //Ler Arquivo 
  while(!feof($cArquivo)){ //testa pelo fim do arquivo
    //linhas
    $cRegistro = fgets($cArquivo);//recupera a linha
    $aChamados[] = $cRegistro;
  }
  //fechando o arquivo.hd
  fclose($cArquivo);
?>
<!--HTML
  ----------------------------------------------------------->
<html>
<!--HEAD
  ---------------------------------------------------------->
  <head>
    <meta charset="utf-8" />
    <title>App Help Desk</title>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <!--Estilo Customizado
      ------------------------->
    <style>
      .card-consultar-chamado {
        padding: 30px 0 0 0;
        width: 100%;
        margin: 0 auto;
      }
    </style>
  </head>
<!--BODY
  ------------------------------------------------------------->
  <body>
    <!--Header -->
    <header>

      <nav class="navbar navbar-dark bg-dark">  
        <!--Logo-->
        <a class="navbar-brand" href="home.php">
          <img src="logo.png" width="30" height="30" class="  d-inline-block align-top" alt="">
          App Help Desk       
        </a>

        <!--Menus -->
        <ul class="navbar-nav">
          <li class="nav-item">
            <a href="logoff.php" class="nav-link">
            SAIR
            </a>
          </li>
        </ul>
      </nav>
    </header>

    <!--Seção Dados -->
    <section>
      <!--Container -->
      <div class="container">
      <!--Row -->    
        <div class="row">
          <!--Classe customizada estilo Col -->
          <div class="card-consultar-chamado">
            <!--Card -->
            <div class="card">
              <!-- Head titulo do Card -->
              <div class="card-header">
                Consulta de chamado
              </div>
              
              <!--Card Body -->
              <div class="card-body">
                
                <!--PHP laço para apresentas todos os chamados -->
                <?php 
                  foreach($aChamados as $cChamado){ 

                      //explode converte um array em uma string
                      $aDados = explode('#', $cChamado);
      
                      //Controle para mostrar conforme o perfil
                      if ($_SESSION['perfil'] == 2){
                        //Só mente exibir o chamado criado pelo     usuário   perfil  usuario
      
                        
                          if( trim($_SESSION['id']) != trim($aDados[0]) )    {
                             //echo '<pre>Session : ';
                             //print_r($_SESSION['id']);
                             // echo '</pre>';
                             //echo '<pre>aDados : ';
                             //print_r($aDados[0]);
                             // echo '</pre>';
                             continue;
                          }
                      }

                     if(count($aDados) < 3){
                        continue;
                      }
                      ?>
                        <!--HTML que está dentro do laço-->
                        <div class="card mb-3 bg-light">
                          <div class="card-body">
                            <h5 class="card-title"><?=$aDados[1] ?></h5>
                            <h6 class="card-subtitle mb-2 text-muted"><?=$aDados[2] ?></h6>
                            <p class="card-text"><?=$aDados[3] ?></p>
          
                          </div>
                        </div>
          
                <?php } ?>
                <!--Nova linha com Botoes -->
                <div class="row mt-5">
                  <div class="col-6">
                    <a href="home.php" class="btn btn-lg btn-warning  btn-block">Voltar</a>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    <section>
  </body>
</html>