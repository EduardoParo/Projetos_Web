<!--PHP
  -------------------------------------------->
<?php 
  require_once "validar_acesso.php";
    echo print_r($_GET);
  ?>
  <!-- HTML
    ------------------------------------------------->
<html>
<!--Head
  ------------------------------------->
  <head>
    <meta charset="utf-8" />
    <title>App Help Desk</title>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <style>
      .card-abrir-chamado {
        padding: 30px 0 0 0;
        width: 100%;
        margin: 0 auto;
      }
    </style>
  </head>

  <!--Body
    ------------------------------------------------------>
  <body>
    <!--Header Menu -->
    <header>
      <!--Nav Menu -->
      <nav class="navbar navbar-dark bg-dark">
        <!--Logo -->
        <a class="navbar-brand" href="home.php">
          <img src="logo.png" width="30" height="30" class="d-inline-block align-top" alt="">
          App Help Desk
        </a>
           <ul class="navbar-nav">
              <li class="navbar-item">
                <a class="nav-link" href="logoff.php">Sair </a>
              </li>
          </ul>
      </nav>
    </header>
    <!--Seção -->
    <section>
      <!--Container-->
      <div class="container">    

        <!--Row Linha Principal -->
        <div class="row">

          <!--Estilo cutomizado simulando o col do Boostrap -->
          <div class="card-abrir-chamado">
            <!--Estilo card do Boostrap -->
            <div class="card">
              <!--header do Card-->
              <div class="card-header">
                Abertura de chamado
              </div>

              <!--Body Card -->
              <div class="card-body">
                <!--Row -->  
                <div class="row">
                  <!--Col -->
                  <div class="col">
                    <!--Form -->
                    <form method="post" action="registra_chamado.php">
                      <!--Titulo -->
                      <div class="form-group">
                        <label>Título</label>
                        <input name ='titulo' type="text" class="form-control" placeholder="Título">
                      </div>
                      
                      <!--Categoria -->
                      <div class="form-group">
                        <label>Categoria</label>
                        <select name ='categoria' class="form-control">
                          <option>Criação Usuário</option>
                          <option>Impressora</option>
                          <option>Hardware</option>
                          <option>Software</option>
                          <option>Rede</option>
                        </select>
                      </div>
                      
                      <!--Descrição -->
                      <div class="form-group">
                        <label>Descrição</label>
                        <textarea  name='descricao' class="form-control" rows="3"></textarea>
                      </div>
                      
                      <!-- Nova Linha -->
                      <div class="row mt-5">
                        
                        <!--Btn Voltar -->
                        <div class="col-6">
                          <a class="btn btn-lg btn-warning btn-block" href="home.php">Voltar</a>
                        </div>
                        
                        <!--Btn Abrir -->
                        <div class="col-6">
                          <button class="btn btn-lg btn-info btn-block" type="submit">Abrir</button>
                        </div>
                      </div>
                    </form>
  
                  </div>
                </div>
              </div>
            </div>
          </div>
      </div>
    </section>
  </body>
</html>