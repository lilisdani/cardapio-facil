<?php
    session_start();
    //1º Criando a conexão com o Banco de Dados
    include("conexao.php");
    $conn=conectar();
?>
<!DOCTYPE html>
<html lang="pt-br">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="shortcut icon" href="assets/img/logo-icone.png" />
    <!-- chama a folha de estilos do Bootstrap -->
    <link rel="stylesheet" href="assets/css/bootstrap.min.css" />
    <link rel="stylesheet" href="assets/css/1.style-index.css">
    <title>Sistema Cardápio Fácil</title>
    <!-- Descrição do site para pesquisas do GOOGLE -->
    <meta name="description" content="Cardápio Fácil! Leve seu negócio de alimentação para o próximo nível">
    <?php
        if(isset($_SESSION['msg'])){
            echo $_SESSION['msg'];
        }
        unset($_SESSION['msg']);
    ?>
  </head>
  <body>
    <header>
      <!-- Início da Barra de navegação para telas pequenas -->
      <nav class="navbar menu-sanduiche bg-body-white shadow-sm sticky-top d-lg-none">
        <div class="container-fluid">
          <a class="navbar-brand" href="index.html"><img src="assets/img/Logo-Horizontal-Cardapio-Facil.png" alt="" width="200rem"></a>
          <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar" aria-controls="offcanvasNavbar" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasNavbar" aria-labelledby="offcanvasNavbarLabel">
            <div class="offcanvas-header">
              <a href="index.html" class="offcanvas-title" id="offcanvasNavbarLabel"><img src="assets/img/Logo-Horizontal-Cardapio-Facil.png" alt="" width="200rem"></a>
              <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
            </div>
            <div class="offcanvas-body">
              <ul class="navbar-nav navbar-expand-lg justify-content-end flex-grow-1 pe-3">
                <li class="nav-item">
                  <a class="nav-link active" aria-current="page" href="#">Início</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="#funciona">Como funciona?</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="#clientes">Clientes</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="#beneficios">Por que escolher?</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="#estatistica">Benefícios</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="#depoimentos">Depoimentos</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="#suporte">Suporte</a>
                </li>
              </ul>
              <a class="btn btn-danger" href="login/index_login.php" role="button">Login</a>
            </div>
          </div>
        </div>
      </nav>
      <!-- Fim da Barra de Navegação para telas pequenas -->
      <!-- Início da Barra de Navegação para telas grandes -->
      <div class="container-fluid menu-normal d-flex align-items-center shadow-sm sticky-top bg-white pt-lg-3 pb-lg-3 .d-none .d-lg-block .d-xl-none">
      <div class="container">
        <div class="row ">
          <!-- Logomarca Cardápio Fácil -->
          <div class="col-lg-3 col-12 text-lg-start text-center">
            <a href="/index.html">
              <img class="img-fluid"
                src="assets/img/Logo-Horizontal-Cardapio-Facil.png"
                alt="Logo Cardápio Fácil Horizontal" width="200rem"
              />
            </a>
          </div>
          <!-- Barra de Navegação -->
          <div class="col-lg-9 col-12 d-flex justify-content-end align-items-center">
            <div>
              <nav class="navbar navbar-expand-lg nav-underline ">
                <a href="#" class="nav-link active text-light-emphasis">Início</a>
                <a href="#funciona" class="nav-link text-light-emphasis">Como funciona?</a>
                <a href="#clientes" class="nav-link text-light-emphasis">Clientes</a>
                <a href="#beneficios" class="nav-link text-light-emphasis">Por que escolher?</a>
                <a href="#estatistica" class="nav-link text-light-emphasis">Benefícios</a>
                <a href="#depoimentos" class="nav-link text-light-emphasis">Depoimentos</a>
                <a href="#suporte" class="nav-link text-light-emphasis">Suporte</a>
              </nav>
            </div>
             <!-- Botões de Login e Cadastro -->
            <div class="ps-4">
              <a class="btn btn-danger" href="login/index_login.php" role="button">Login</a>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- Fim da Barra de Navegação para telas grandes -->
    </header>
    <main>
      <!-- Início da Seção Início: Slogan e a Ilustração de um atendimento -->
      <section class="container-fluid text-center bg-secao-inicio pt-lg-5 pt-0 pb-5" id="inicio">
        <div class="container">
          <div class="row">
            <div class="col-lg-6 col-12">
              <h2 class="col-8 fw-normal display-2 color-text-cinza pb-0 mb-0">Simplifique</h2>
              <h4 class="col-8 fw-normal display-6 color-text-cinza text-end pt-0 pb-0 mb-0">Atenda</h4>
              <h1 class="col-12 display-1 color-text-vermelho fw-bolder pt-0 mt-0">Conquiste</h1>
              <p class="h5 fw-normal p-inicio"><strong>Cardápio Fácil:</strong> A Receita do Sucesso</p>
            </div>
            <div class="col-lg-6 col-12">
              <img class="img-inicio img-fluid" src="assets/img/atendimento.svg" alt="Ilustração de um atendimento" width="414px"/>
            </div>
          </div>
        </div>
      </section>
      <!-- Fim da Seção Início -->
      <!-- Início da Seção Funciona: Mão segurando celular e instrução de uso -->
      <section class="container-fluid bg-funciona pt-5 pb-5" id="funciona">
        <div class="container">
          <div class="row">
            <div class="container ">
              <div class="row me-0 pt-lg-5 pb-5 justify-content-center justify-content-start">
                <div class="col-lg-4 col-0  me-0 pt-lg-5"></div>
                <div class="col-lg-6 col-10 me-0 pt-lg-5 pb-5">
                  <p class="lead text-light display-6 text-lg-start text-center">Seu cliente faz o pedido direto pelo celular</p>
                  <h2 class="col-12 text-light display-5 fw-normal p-lg-0 p-3 text-lg-start text-center">É só digitalizar o QR-CODE</h2>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="container m-0  pb-lg-0 pb-5">
          <div class="row pb-lg-0 pb-5 m-0 ">
            <div class="col-lg-12 pb-5">
              <img class="foto-celular img-fluid" src="assets/img/celular-mao.svg" alt="">
            </div>
          </div>
        </div>
      </section>
      <!-- Fim da Seção Funciona -->
      <!-- Início da Seção Clientes: Público Alvo do sistema -->
      <section class="container-fluid pt-5 pb-lg-5 pb-5" id="clientes">
        <div class="container">
          <!-- Título da Seção -->
          <div class="row">
            <div class="col-12 text-lg-end text-center">
              <h2 class="fw-bolder color-text-cinza mb-0 display-4">Feito na medida</h2>
              <h1 class="fw-bolder color-text-vermelho mt-0 display-3">para o seu negócio</h1>
            </div>
          </div>
          <div class="row d-flex justify-content-end pt-5">
            <div class="col-12 d-flex flex-lg-nowrap flex-wrap justify-content-lg-between justify-content-center row-gap-3">
              <!-- Card 1: Food Trucks -->
              <div class="card" style="width: 18rem;">
                <img src="assets/img/food-truck.svg" class="card-img-top" alt="Ilustração de um food-truck" width="250px">
                <div class="card-body text-center">
                  <h5 class="card-title text-center">Food Trucks</h5>
                </div>
              </div>
              <!-- Card 2: Cafeterias -->
              <div class="card" style="width: 18rem;">
                <img src="assets/img/cafeteria.svg" class="card-img-top" alt="Ilustração de um food-truck" width="250px">
                <div class="card-body text-center">
                  <h5 class="card-title text-center">Cafeterias</h5>
                </div>
              </div>
              <!-- Card 3: Lanchonetes -->
              <div class="card" style="width: 18rem;">
                <img src="assets/img/lanchonetes.svg" class="card-img-top" alt="Ilustração de um food-truck" width="250px">
                <div class="card-body text-center">
                  <h5 class="card-title text-center">Lanchonetes</h5>
                </div>
              </div>
            </div>
          </div>
          <div class="row pt-5">
            <h4 class="col-12 lead text-center fw-normal display-6">Ideal para pequenos e médios negócios de comida.</h4>
          </div>
        </div>
      </section>
      <!-- Fim da Seção Clientes -->
      <!-- Início da Seção Benefícios: Por que escolher o sistema -->
      <section class="container-fluid pt-lg-5 pt-0 pb-lg-5 pb-5" id="beneficios">
        <div class="container">
          <div class="row">
            <div class="col-12 pb-5 text-lg-start text-center">
              <h2 class="fw-bolder color-text-cinza m-0 display-4">Por que escolher o <small class="color-text-laranja">Cardápio Fácil?</small></h2>
            </div>
          </div>
          <div class="row d-flex justify-content-center">
            <div class="col-lg-6 col-12 text-center"><img class="img-fluid img-beneficios" src="assets/img/funcionaria-feliz.svg" alt="Ilustração de uma funcionária feliz"></div>
            <div class="col-lg-5 col-12 align-self-center">
              <div class="beneficios">
                <h3>Atendimento Ágil e Conveniente</h3>
                <img src="assets/img/seta-prabaixo.svg" alt="">
                <p class="paragrafo">Adeus aos antigos menus impressos e às esperas prolongadas! Com o Cardápio Fácil, seus clientes podem simplesmente escanear um QR-Code em suas mesas e acessar instantaneamente o cardápio em seus próprios dispositivos móveis, permitindo que façam pedidos com rapidez e facilidade.</p>
              </div>
              <div class="beneficios">
                <h3>Personalização e Flexibilidade</h3>
                <img src="assets/img/seta-prabaixo.svg" alt="">
                <p class="paragrafo">Nosso sistema é totalmente adaptável às necessidades únicas do seu estabelecimento. Desde a personalização do cardápio até a integração com sistemas de pagamento online, garantimos uma solução que se encaixa perfeitamente na sua operação.</p>
              </div>
              <div class="beneficios">
                <h3>Maior Satisfação do Cliente</h3>
                <img src="assets/img/seta-prabaixo.svg" alt="">
                <p class="paragrafo">Ao oferecer aos seus clientes uma experiência de pedido simplificada e conveniente, você estará elevando a satisfação e fidelidade do cliente. Pedidos precisos e atendimento ágil levarão a avaliações positivas e recomendações boca a boca, impulsionando o crescimento do seu negócio.</p>
              </div>
              <div class="beneficios">
                <h3>Eficiência Operacional</h3>
                <img src="assets/img/seta-prabaixo.svg" alt="">
                <p class="paragrafo">Com o Cardápio Fácil, você não apenas melhora a experiência do cliente, mas também otimiza a eficiência operacional do seu estabelecimento. Nossa solução simplifica o processo de pedidos, reduzindo erros e aumentando a produtividade da sua equipe.</p>
              </div>
            </div>
          </div>
          <!-- fim da cópia -->
        </div>
      </section>
      <!-- Fim da Seção Benefícios -->
      <!-- Início da Seção Estatística -->
      <section class="container-fluid pt-lg-5 pt-3 pb-lg-5" id="estatistica">
        <div class="container text-lg-end text-center">
          <div class="row pb-4">
            <h2 class="color-text-cinza display-4 fw-bolder">Não deixe para depois!</h2>
            <h3 class="color-text-amarelo fw-bolder display-5">Comece HOJE mesmo a ter esses ganhos</h3>
          </div>
        </div>
        <div class="container-fluid p-relative pt-1">
          <div class="row pb-lg-0 pb-5">
            <div class="col-lg-3 col-12 text-center"><img class="img-fluid" src="assets/img/lucros.svg" alt="" width="320rem"></div>
            <div class="col-lg-9 col-12 bg-estatistica pt-5 pb-3">
              <div class="d-flex flex-lg-nowrap flex-wrap justify-content-lg-between justify-content-center row-gap-3 gap-3">
                <!-- Card 1 -->
                <div class="card" style="width: 18rem;">
                  <img src="assets/img/cliente-satisfeito.svg" class="img-fluid card-img-top p-4" alt="">
                  <div class="card-body text-center">
                    <h5 class="card-title">+30%</h5>
                    <p class="card-text">da satisfação do cliente</p>
                  </div>
                </div>
                <!-- Card 2 -->
                <div class="card" style="width: 18rem;">
                  <img src="assets/img/faturamento.svg" class="card-img-top p-4" alt="">
                  <div class="card-body text-center">
                    <h5 class="card-title">+2,5K</h5>
                    <p class="card-text">de faturamento no mês</p>
                  </div>
                </div>
                <!-- Card 3 -->
                <div class="card" style="width: 18rem;">
                  <img src="assets/img/reducao-erro.svg" class="card-img-top p-4" alt="">
                  <div class="card-body text-center">
                    <h5 class="card-title">-40%</h5>
                    <p class="card-text">redução de erros de pedido</p>
                  </div>
                </div>
                <!-- Card 4 -->
                <div class="card" style="width: 18rem;">
                  <img src="assets/img/tempo.svg" class="card-img-top p-4" alt="">
                  <div class="card-body text-center">
                    <h5 class="card-title">-300h</h5>
                    <p class="card-text">de tempo de espera no ano</p>
                  </div>
                </div>
              </div>
              <div class="col-12 pt-lg-5 pt-0">
                <p class="lead fw-normal color-text-cinza pt-lg-0 pt-5 text-center">Junte-se a milhares de estabelecimentos de comida que já estão colhendo os benefícios do Cardápio Fácil e <strong>eleve sua operação para o próximo nível!</strong></p>
              </div>
              </div>
            </div>
          </div>
        </div>
      </section>
        <!-- Fim da Seção Estatística -->
      <!-- Início da Seção Depoimentos -->
      <section class="container-fluid bg-light pt-lg-5" id="depoimentos">
        <div class="container">
          <!-- Título da Seção Depoimentos -->
          <div class="row text-start align-items-end pb-5">
            <div class="col-2"><img src="assets/img/aspas.svg" alt="" width="100rem"></div>
            <div class="col-10 ps-lg-0 ps-5"><h1 class="display-4">O que os clientes <small class="color-text-laranja display-4 fw-semibold">contam?</small></h1></div>
          </div>
          <!-- Carrossel apenas para telas pequenas -->
          <div class="row d-lg-none">
            <div class="col-12 d-flex justify-content-center">
              <!-- Início do Carousel -->
              <div id="carouselDepoimentos" class="carousel carousel-dark slide">
                <div class="carousel-indicators">
                  <button type="button" data-bs-target="#carouselDepoimentos" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                  <button type="button" data-bs-target="#carouselDepoimentos" data-bs-slide-to="1" aria-label="Slide 2"></button>
                  <button type="button" data-bs-target="#carouselDepoimentos" data-bs-slide-to="2" aria-label="Slide 3"></button>
                </div>
                <div class="carousel-inner">
                  <!-- Card 1: Depoimento da Cliente Maria Silva -->
                  <div class="carousel-item active">
                    <div class="col-12 bg-primary card shadow-sm p-3 mb-5 bg-body-tertiary rounded d-block w-100">
                      <!-- Corpo do Card -->
                      <div class="card-body">
                        <!-- Cabeçalho do Card -->
                        <div class="row">
                          <div class="col-2"><img src="assets/img/foto-maria.svg" alt="" width="45rem"></div>
                          <!-- Título e Subtítulo -->
                          <div class="col-9">
                            <h5 class="card-title color-text-laranja pb-0 mb-0">Maria Silva</h5>
                            <p class="card-text fw-semibold pb-3">Restaurante Cantinho da Vovó</p>
                          </div>
                          <!-- Fim do Título e Subtítulo -->
                        </div>
                        <!-- Fim do Cabeçalho do Card -->
                        <!-- Parágrafo -->
                        <div class="row">
                          <div class="col-12">
                            <p class="p-depoimento">Desde que implementamos o Cardápio Fácil em nosso restaurante, nossa vida mudou completamente. Agora, nossos clientes podem fazer pedidos de forma rápida e conveniente usando seus próprios dispositivos, o que nos permitiu atender mais mesas e aumentar nossas vendas. Além disso, a equipe adorou a facilidade de gerenciar os pedidos e a integração perfeita com nosso sistema de pagamento. O Cardápio Fácil não é apenas uma ferramenta, é uma verdadeira revolução para o nosso negócio!</p>
                          </div>
                        </div>
                        <!-- Fim do Parágrafo -->
                      </div>
                      <!-- Fim do Corpo do Card -->
                    </div>
                  </div>
                  <!-- Fim do Card 1 -->
                  <!-- Card 2: Depoimento do Cliente Pedro Gonçalves -->
                  <div class="carousel-item">
                    <div class="col-12 bg-primary card shadow-sm p-3 mb-5 bg-body-tertiary rounded d-block w-100">
                      <!-- Corpo do Card -->
                      <div class="card-body">
                        <!-- Cabeçalho do Card -->
                        <div class="row">
                          <div class="col-2"><img src="assets/img/foto-pedro.svg" alt="" width="45rem"></div>
                          <!-- Título e Subtítulo -->
                          <div class="col-9">
                            <h5 class="card-title color-text-laranja pb-0 mb-0">Maria Silva</h5>
                            <p class="card-text fw-semibold pb-3">Restaurante Cantinho da Vovó</p>
                          </div>
                          <!-- Fim do Título e Subtítulo -->
                        </div>
                        <!-- Fim do Cabeçalho do Card -->
                        <!-- Parágrafo -->
                        <div class="row">
                          <div class="col-12">
                            <p class="p-depoimento">Desde que implementamos o Cardápio Fácil em nosso restaurante, nossa vida mudou completamente. Agora, nossos clientes podem fazer pedidos de forma rápida e conveniente usando seus próprios dispositivos, o que nos permitiu atender mais mesas e aumentar nossas vendas. Além disso, a equipe adorou a facilidade de gerenciar os pedidos e a integração perfeita com nosso sistema de pagamento. O Cardápio Fácil não é apenas uma ferramenta, é uma verdadeira revolução para o nosso negócio!</p>
                          </div>
                        </div>
                        <!-- Fim do Parágrafo -->
                      </div>
                      <!-- Fim do Corpo do Card -->
                    </div>
                  </div>
                  <!-- Fim do Card 2 -->
                  <!-- Card 3: Depoimento da Cliente Carla Oliveira -->
                  <div class="carousel-item">
                    <div class="col-12 bg-primary card shadow-sm p-3 mb-5 bg-body-tertiary rounded d-block w-100">
                      <!-- Corpo do Card -->
                      <div class="card-body">
                        <!-- Cabeçalho do Card -->
                        <div class="row">
                          <div class="col-2"><img src="assets/img/foto-carla.svg" alt="" width="45rem"></div>
                          <!-- Título e Subtítulo -->
                          <div class="col-9">
                            <h5 class="card-title color-text-laranja pb-0 mb-0">Maria Silva</h5>
                            <p class="card-text fw-semibold pb-3">Restaurante Cantinho da Vovó</p>
                          </div>
                          <!-- Fim do Título e Subtítulo -->
                        </div>
                        <!-- Fim do Cabeçalho do Card -->
                        <!-- Parágrafo -->
                        <div class="row">
                          <div class="col-12">
                            <p class="p-depoimento">Desde que implementamos o Cardápio Fácil em nosso restaurante, nossa vida mudou completamente. Agora, nossos clientes podem fazer pedidos de forma rápida e conveniente usando seus próprios dispositivos, o que nos permitiu atender mais mesas e aumentar nossas vendas. Além disso, a equipe adorou a facilidade de gerenciar os pedidos e a integração perfeita com nosso sistema de pagamento. O Cardápio Fácil não é apenas uma ferramenta, é uma verdadeira revolução para o nosso negócio!</p>
                          </div>
                        </div>
                        <!-- Fim do Parágrafo -->
                      </div>
                      <!-- Fim do Corpo do Card -->
                    </div>
                  </div>
                  <!-- Fim do Card 3 -->
                </div>
                <button class="carousel-control-prev" type="button" data-bs-target="#carouselDepoimentos" data-bs-slide="prev">
                  <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                  <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#carouselDepoimentos" data-bs-slide="next">
                  <span class="carousel-control-next-icon" aria-hidden="true"></span>
                  <span class="visually-hidden">Next</span>
                </button>
              </div>
            </div>
          </div>
          <!-- Fim do Carousel -->
          <!-- Grid de Cards apenas para telas grandes -->
          <div class="row d-none d-lg-block">
            <!-- d-flex justify-content-between pt-5  -->
            <div class="col-lg-12 d-flex justify-content-around">
              <!-- Card 1: Depoimento da Cliente Maria Silva -->
              <div class="col-4 card shadow-sm p-3 mb-5 bg-body-tertiary rounded">
                <!-- Corpo do Card -->
                <div class="card-body">
                  <!-- Cabeçalho do Card -->
                  <div class="row">
                    <div class="col-2"><img src="assets/img/foto-maria.svg" alt="" width="45rem"></div>
                    <!-- Título e Subtítulo -->
                    <div class="col-9">
                      <h5 class="card-title color-text-laranja pb-0 mb-0">Maria Silva</h5>
                      <p class="card-text fw-semibold pb-3">Restaurante Cantinho da Vovó</p>
                    </div>
                    <!-- Fim do Título e Subtítulo -->
                  </div>
                  <!-- Fim do Cabeçalho do Card -->
                  <!-- Parágrafo -->
                  <div class="row">
                    <div class="col-12">
                      <p class="p-depoimento">Desde que implementamos o Cardápio Fácil em nosso restaurante, nossa vida mudou completamente. Agora, nossos clientes podem fazer pedidos de forma rápida e conveniente usando seus próprios dispositivos, o que nos permitiu atender mais mesas e aumentar nossas vendas. Além disso, a equipe adorou a facilidade de gerenciar os pedidos e a integração perfeita com nosso sistema de pagamento. O Cardápio Fácil não é apenas uma ferramenta, é uma verdadeira revolução para o nosso negócio!</p>
                    </div>
                  </div>
                  <!-- Fim do Parágrafo -->
                </div>
                <!-- Fim do Corpo do Card -->
              </div>
              <!-- Fim do Card 1 -->
              <!-- Card 2: Depoimento do Cliente Pedro Gonçalves -->
              <div class="col-4 card shadow-sm p-3 mb-5 bg-body-tertiary rounded">
                <!-- Corpo do Card -->
                <div class="card-body">
                  <!-- Cabeçalho do Card -->
                  <div class="row">
                    <div class="col-2"><img src="assets/img/foto-pedro.svg" alt="" width="45px"></div>
                    <!-- Título e Subtítulo -->
                    <div class="col-9">
                      <h5 class="card-title color-text-laranja">Pedro Gonçalves</h5>
                      <p class="card-text fw-semibold pb-3">Food Truck Sabor de Verão</p>
                    </div>
                    <!-- Fim do Título e Subtítulo -->
                  </div>
                  <!-- Fim do Cabeçalho do Card -->
                  <!-- Parágrafo -->
                  <div class="row">
                    <div class="col-12">
                      <p class="p-depoimento">O Cardápio Fácil trouxe uma nova energia para o meu food truck. Antes, eu me preocupava com a longa fila de clientes esperando para fazer pedidos, mas agora, com o sistema de pedidos online, tudo ficou mais fácil. Os clientes adoram a conveniência de fazer seus pedidos pelo celular, e eu adoro a facilidade de gerenciar os pedidos e manter meu estoque atualizado. O Cardápio Fácil realmente transformou a maneira como opero meu negócio!</p>
                    </div>
                  </div>
                  <!-- Fim do Parágrafo -->
                </div>
                <!-- Fim do Corpo do Card -->
              </div>
              <!-- Fim do Card 2 -->
              <!-- Card 3: Depoimento da Cliente Carla Oliveira -->
              <div class="col-4 card shadow-sm p-3 mb-5 bg-body-tertiary rounded">
                <!-- Corpo do Card -->
                <div class="card-body">
                  <!-- Cabeçalho do Card -->
                  <div class="row">
                    <div class="col-2"><img src="assets/img/foto-carla.svg" alt="" width="45px"></div>
                    <!-- Título e Subtítulo -->
                    <div class="col-9">
                      <h5 class="card-title color-text-laranja">Carla Oliveira</h5>
                      <p class="card-text fw-semibold pb-3">Restaurante Sabores do Brasil</p>
                    </div>
                    <!-- Fim do Título e Subtítulo -->
                  </div>
                  <!-- Fim do Cabeçalho do Card -->
                  <!-- Parágrafo -->
                  <div class="row">
                    <div class="col-12">
                      <p class="p-depoimento">Como cliente frequente do Restaurante Sabores do Brasil, fiquei impressionada com a introdução do Cardápio Fácil. Agora, posso escanear o QR-Code em minha mesa e acessar o cardápio em segundos, sem precisar esperar por um garçom. Além disso, a opção de personalizar meu pedido de acordo com minhas preferências é um grande diferencial. O Cardápio Fácil tornou minha experiência de jantar mais conveniente e agradável, e mal posso esperar para voltar!</p>
                    </div>
                  </div>
                  <!-- Fim do Parágrafo -->
                </div>
                <!-- Fim do Corpo do Card -->
              </div>
              <!-- Fim do Card 3 -->
            </div>
          </div>
        </div>
        </div>
      </section>
      <!-- Fim da Seção Depoimentos -->
      <!-- Início da Seção Suporte -->
      <section class="container-fluid pt-3 pb-5" id="suporte">
        <div class="container pb-5">
          <div class="row">
            <h1 class="color-text-cinza text-lg-start text-center pb-5 display-4">Suporte ao <small class="color-text-verde display-4 fw-semibold">Cliente</small></h1>
          </div>
          <div class="row">
            <div class="col-lg-5 col-12"><img class="img-fluid" src="assets/img/suporte.svg" alt=""></div>
            <div class="col-lg-7 col-12 align-self-center text-suporte pt-lg-0 pt-3">
              <h3 class="color-text-cinza text-lg-start text-center">Nossa equipe de suporte está aqui para ajudar você a aproveitar ao máximo o <strong>Cardápio Fácil.</strong></h3>
              <h3 class="color-text-verde text-lg-start text-center">Entre em contato conosco se tiver alguma dúvida, problema ou se apenas precisar de assistência.</h3>
              <div class="row justify-content-center align-items-center">
                <!-- Horário -->
                <div class="col-10 pt-5 color-text-cinza text-start">
                  <strong>Horário de Atendimento:</strong>
                  <p style="margin: 0;">Segunda a Sexta:</p>
                  <p>8h às 18h</p>
                  <!-- <p>Sábado e Domingo: Fechado</p> -->
                </div>
                <!-- Canais -->
                <div class="col-10 pt-4 color-text-cinza text-start">
                  <strong>Canais de Comunicação:</strong>
                  <ul class=" text-start">
                    <li>E-mail: <a class="link-suporte" href="mailto:suporte@cardapiofacil.com.br" target="_blank">suporte@cardapiofacil.com.br</a></li>
                    <li>Whatsapp: <a class="link-suporte" href="https://wa.me/559299112-2405" target="_blank">(92) 99112-2405</a></li>
                    <li>Chat ao Vivo: Disponível durante o horário de atendimento</li>
                  </ul>
                </div>
              </div>
            </div>
          </div>
          <div class="row text-center pt-5">
            <p class="h3 color-text-cinza">Nosso objetivo é responder a todas as consultas dentro de <strong>24 horas úteis</strong>. Se você precisar de assistência urgente, <strong class="color-text-verde">entre em contato conosco por telefone ou chat ao vivo para obter suporte imediato.</strong></p>
          </div>
        </div>
      </section>
      <!-- Fim da Seção Suporte -->
    </main>
    <footer class="container-fluid bg-rodapé-cinza pt-5 pb-5 suporte">
      <div class="container">
        <div class="row">
          <div class="col-lg-6 col-12 text-lg-start text-center">
            <img src="assets/img/Logo-Horizontal-Branca.svg" alt="">
            <p class="lead text-light mt-3">A Receita do Sucesso!</p>
          </div>
          <div class="col-lg-3 col-6 p-lg-0 p-1">
            <strong class="color-text-laranja">Links Rápidos</strong>
            <nav class="mt-3">
              <a href="#">Início</a>
              <a href="#funciona">Como Funciona?</a>
              <a href="#clientes">Clientes</a>
              <a href="#depoimentos">Depoimentos</a>
              <a href="#suporte">Suporte</a>
            </nav>
          </div>
          <div class="col-lg-3 col-6 p-lg-0 p-1 ">
            <strong class="color-text-laranja">Entre em contato</strong>
            <p class="mb-0 mt-3">Whatsapp: <a href="https://wa.me/559299112-2405" target="_blank">(92) 99112-2405</a></p>
            <p class="mb-0">E-mail: <a href="mailto:suporte@cardapiofacil.com.br" target="_blank">suporte@cardapiofacil.com.br</a></p>
            <p><a href="https://maps.app.goo.gl/xugGbecBxGQBuctSA" target="_blank">Av. Darcy Vargas, 288 - Chapada, Manaus - AM, 69050-020</a></p>
          </div>
        </div>
      </div>
    </footer>
    <div class="d-flex justify-content-center align-items-center direitos bg-dark">
      <p class="text-white-50">&copy; Todos os direitos reservados Cardápio Fácil - 2024.</p>
    </div>
     <!-- Bloco de Adição do Javascript do Bootstrap -->
     <script src="assets/js/bootstrap.bundle.min.js"></script>
     <script src="assets/js/1.index.js"></script>
     <!-- Fim do bloco do Javascript do Bootstrap -->
  </body>
</html>
