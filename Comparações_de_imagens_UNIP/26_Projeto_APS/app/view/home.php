<!--Sliders-->
<div class="container" >
        <div class="row" style="width: 100%;">

            <div id="carousel-legenda" class="carousel slide" data-ride="carousel"><!--Carousel -->

                <!-- Indicadores -->
                <ol class="carousel-indicators">

                  <li class="active" data-target="#carousel-legenda" data-slide-to="0"></li>

                  <li data-target="#carousel-legenda" data-slide-to="1"></li>

                  <li data-target="#carousel-legenda" data-slide-to="2"></li>

                </ol>

                <div class="carousel-inner "><!--Inner -->
                
                    <div class="carousel-item active">
                        <img src="public/_img/imagem1.jpeg" class="img-corusel">
                        <div class="carousel-caption">
                            <div style="background: black; padding: 10px;">
                                <h3>Cidades mais verdes</h3>
                                <p>
                                Ao longo dos anos, inúmeras cidades brasileiras cresceram rapidamente e sem planejamento adequado, o que levou ao mau uso, degradação e redução das áreas verdes, contribuindo para enchentes, deslizamentos de terra e outros problemas urbanos.
                                </p>
                            </div>
                        </div>
                    </div>

                    <div class="carousel-item">
                        <img src="public/_img/imagem2.jpeg" class="img-corusel">
                        <div class="carousel-caption">
                            <h3>Reciclagem é meio ambiente</h3>
                            <p>
                            As maiores vantagens da reciclagem são a minimização da utilização de fontes naturais, muitas vezes não renováveis; e a minimização da quantidade de resíduos que necessita de tratamento final, como aterramento, ou incineração, contribuindo para a preservação do meio ambiente..
                            </p>
                        </div>
                    </div>

                    <div class="carousel-item">
                        <img src="public/_img/imagem3.jpeg" class="img-corusel" >
                        <div class="carousel-caption">
                             <div style="background: black; padding: 10px;">
                                <h3>Poluição</h3>
                                <p>
                                O que coloca o Brasil como um país poluidor de primeiro mundo é a queima de combustível fóssil. No Brasil isso ocorre por causa das termelétricas a diesel e devido ao aumento da frota veicula
                                </p>
                             </div>
                        </div>
                    </div>

                </div><!--/Inner -->

                <!-- Controles -->
                <a href="#carousel-legenda" class="carousel-control-prev" data-slide="prev">
                  <span class="carousel-control-prev-icon"></span>
                </a>

                <a href="#carousel-legenda" class="carousel-control-next" data-slide="next">
                  <span class="carousel-control-next-icon"></span>
                </a>

            </div><!--/Carousel -->
        </div>
    </div>

    <!--Conteudo-->
    <div class="container fundo mt-5">
        <div  id='Cardes' class="row"> 
            
            <div class="col-md-4 mt-2">
                <div class="card">
                    <div class="card-header" style="background-color: #007FFF;">Número de agrotóxicos liberados no Brasil é o maior dos últimos dez anos.</div> 
                    
                    <ul class="list-group list-group-flush">
                        <li id="numero" class="list-group-item"> 
                            <p>
                            O número de agrotóxicos liberados para o uso em lavouras em 2019, primeiro ano do governo Jair Bolsonaro (sem partido), é o maior dos últimos dez anos. O levantamento é do Greenpeace com base em dados do Ministério da Agricultura.        
                        </p>
                        </li>
                        <li id="Aprovar" class="list-group-item"> 
                           <a> Veja Mais</a>
                        
                        </li>
                    </ul>
                </div>
            </div>

            <div class="col-md-4 mt-2">
                <div class="card">
                    <div class="card-header" style="background-color: #87CEFA;">Pantanal e Amazônia registram recorde de queimadas em outubro</div> 
                    
                    <ul class="list-group list-group-flush">
                        <li id="numero" class="list-group-item"> 
                            <p>
                            Faltando dois meses para o ano terminar, dois dos biomas mais importantes do Brasil já registram recordes de queimadas. No Pantanal, este já é o pior ano desde que o Instituto Nacional de Pesquisas Espaciais (Inpe) começou a registrar os focos ativos de fogo, em 1998. Já na Amazônia, o número de ocorrências entre janeiro e outubro já supera o total de 2019.... 
                            </p>
                        </li>
                        <li id="Aprovar" class="list-group-item"> 
                           <a> Veja mais</a>
                        
                        </li>
                    </ul>
                </div>
            </div>

            <div class="col-md-4 mt-2">
                <div class="card">
                    <div class="card-header" style="background-color: #40E0D0;">Produção de biocombustíveis para transporte cairá pela primeira vez em duas décadas</div> 
                    
                    <ul class="list-group list-group-flush">
                        <li id="numero" class="list-group-item"> 
                            <p>
                            A produção mundial de biocombustíveis para transportes, como o biodiesel, o etanol celulósico e o óleo vegetal hidratado (HVO, na sigla em inglês), deve cair este ano pela primeira vez em duas décadas por força do impacto da pandemia da COVID-19 na atividade econômica, na circulação de pessoas e no preço do petróleo.        
                            </p>
                        </li>
                        <li id="Aprovar" class="list-group-item"> 
                           <a> Veja mais</a>
                        
                        </li>
                    </ul>
                </div>
            </div>

        </div>
    </div>

    <?php
            require_once "app/view/modal.php";
        
    ?>