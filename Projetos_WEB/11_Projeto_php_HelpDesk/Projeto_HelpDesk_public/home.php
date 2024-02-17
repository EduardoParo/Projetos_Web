<!--PHP
  --------------------------------------------------------------->
<?php 
  //session_start();
  //executa o fonte e faz parte da mesma sessao
  require_once "validar_acesso.php";

    echo print_r($_SESSION);
    echo print_r($_GET); //Sem as tag <pre> imprime tudo em uma linha
  ?>
<!--HTML
  ----------------------------------------------------------------->
<html>
<!--HEAD
  ----------------------------------------------------------------->
  <head>
    <meta charset="utf-8" />
    <title>App Help Desk</title>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <!--Estilo Customizado -->
    <style>
      .card-home {
        padding: 30px 0 0 0;
        width: 100%;
        margin: 0 auto;
      }
    </style>
  </head>
<!--BODY
  ----------------------------------------------------------------->
  <body>
    <!--Header
      ------------------------------------------------------>
    <header>
      <!-- Nav Menu -->
      <nav class="navbar navbar-dark bg-dark">
        <!--Logo -->
        <a class="navbar-brand" href="index.php">
          <img src="logo.png" width="30" height="30" class="  d-inline-block align-top" alt="">
          App Help Desk
        </a>


         <a href="#" class="nav-link">
              Bem vindo , 
              <?=$_SESSION['nome']?>
          </a>


    
        <!--Menu -->
        <ul class="navbar-nav">
          <li class="navbar-item">
            <a href="logoff.php" class="nav-link">
            SAIR
            </a>
          </li> 
        </ul>

      </nav>
    </header>

    <section>
      <!--Container -->
      <div class="container">    
        <!--Roe -->
        <div class="row">
          <!--Card -->
          <div class="card-home">
            <div class="card">
              <!--Head Titulo -->
              <div class="card-header">
                Menu
              </div>
              <!--Cad Body -->
              <div class="card-body">
                <!--row-->
                <div class="row">
                  
                  <!--Col esquerda-->
                  <div class="col-6 d-flex justify-content-center">
                    <a href="abrir_chamado.php">
                      <img src="formulario_abrir_chamado.png" width="70"   height="70">
                    </a>
                  </div>

                  <!--Col Direita -->
                  <div class="col-6 d-flex justify-content-center">
                     <a href="consultar_chamado.php">
                      <img src="formulario_consultar_chamado.png" width=  "70" height="70">
                    </a>
                  </div>
                </div>
              </div>
            </div>
          </div>
      </div>
    </section>
  </body>
</html>