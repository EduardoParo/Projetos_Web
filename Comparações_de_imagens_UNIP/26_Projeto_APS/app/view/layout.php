    <!--Cabecalho-->
    <div id="cabecalho">
        <nav class="navbar navbar-expand-sm">
            <!-- Logo -->
            <a href="" class="navbar-brand">
                <p>Ministério do </p>
                <h1>Meio Ambiente</h1>  
            </a>
            <!-- Menu Hamburguer -->
            <button class="navbar-toggler" data-toggle="collapse" 
            data-target="#subMenu0">
                <span class="navbar-toggler-icon"></span>
            </button>
            <!-- subMenu -->
            <div class="collapse navbar-collapse navbar-dark" id="subMenu0">
                <ul class="navbar-nav  ml-auto">
                    <li class="nav-item">
                        <a href="#" class="nav-link">UNIP</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a href="/26_Projeto_APS/" class="nav-link dropdown-toggle" 
                        data-toggle="dropdown">Configurações</a>
                        <div class="dropdown-menu">
                            <button href="/26_Projeto_APS/" id="btnRegistrar" class="dropdown-item">Cadastrar</button>
                        </div>
                    </li>
                </ul>
            </div>
        </nav>
    </div><!--Fim Cabecalho-->

    <!--Menu-->
    <div id="menuServicos">
        <div class="container">
            <nav class="navbar navbar-expand-sm">
            
                <ul class="navbar-nav ">
                    <li class="nav-item">
                        <a href="/26_Projeto_APS/" class="nav-link">Home</a>
                    </li>
                    
                    <li class="nav-item" >
                        <a href="#" id="btnAcessar" class="nav-link">Dados Sigilosos</a>
                    </li>
               
                </ul>
            </nav>

        </div>

    </div>

    <?php
     session_start();
    if(Isset($_SESSION)){
        if($_SESSION['nId']==1 && substr($_SERVER["REQUEST_URI"],23) == "sucesso"){
             require_once "app/view/dadosSigilosos.php";   
            
        }else{
            require_once "app/view/home.php";
        }
    }else{
        require_once "app/view/home.php";
    }
        
    ?>

       
