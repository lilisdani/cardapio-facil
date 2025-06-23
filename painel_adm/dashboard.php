<?php
    session_start(); //Iniciando a sessão
    include("../conexao.php");
    $conn=conectar();
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="../assets/img/logo-icone.png" />
    <!-- chama a folha de estilos do Bootstrap -->
    <link rel="stylesheet" href="../assets/css/bootstrap.min.css" />
    <link rel="stylesheet" href="../assets/css/1.style-index.css">
    <link rel="stylesheet" href="../assets/css/2.style-adm.css">
    <title>Sistema Cardápio Fácil</title>
    <!-- Descrição do site para pesquisas do GOOGLE -->
    <meta name="description" content="Cardápio Fácil! Leve seu negócio de alimentação para o próximo nível">
    <?php
        // php echo$_SESSION['usuario'];
        // Pesquisar dados relacionados ao usuário logado
        $cpf = $_SESSION['usuario'];
        $query_usuario = "SELECT id_administrador, cpf, nome, email FROM administrador WHERE cpf = $cpf LIMIT 1";
        $result_usuario = $conn->prepare($query_usuario);
        $result_usuario->execute();

        if($result_usuario and ($result_usuario->rowCount()!=0)){
            $row_usuario = $result_usuario->fetch(PDO::FETCH_ASSOC);
        }
        else {
            $_SESSION['msg'] = "<p style='color:#f00;'>ERRO! Usuário não encontrado!</p>";
            header("Location:../login/index_login.php");
        }
    ?>
</head>
<body>
    <!-- Header só aparece em Telas Pequenas -->
    <header class="container-fluid d-lg-none">
        <div class="container">
            <div class="row d-flex justify-content-end align-items-center">
                <!-- Logo -->
                <div class="col-5">
                    <div class="text-lg-start text-center"><img class="logo img-fluid" src="../assets/img/Logo-Horizontal-Cardapio-Facil.png" alt="Logo Cardápio Fácil"></div>
                </div><!--Fim da Logo-->
                <!-- Início da Barra de Navegação -->
                <div class="col-7 d-flex justify-content-end align-items-center text-end">
                    <div class="align-items-center">
                        <!-- Início da Barra de navegação para telas pequenas -->
                        <nav class="navbar menu-sanduiche bg-body-white sticky-top d-lg-none ">
                            <div class="container-fluid">
                                <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar" aria-controls="offcanvasNavbar" aria-label="Toggle navigation">
                                    <span class="navbar-toggler-icon"></span>
                                </button>
                                <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasNavbar" aria-labelledby="offcanvasNavbarLabel">
                                    <div class="offcanvas-header">
                                        <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                                    </div>
                                    <div class="offcanvas-body d-block justify-content-center text-start pt-0 mt-0">
                                        <div class="text-start pb-4 ps-2"><img class="logo img-fluid" src="../assets/img/Logo-Horizontal-Cardapio-Facil.png" alt="Logo Cardápio Fácil"></div>
                                        <small class="painel-usuario d-flex justify-content-start align-items-center m-0 p-0 pb-2" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                            <div class="foto-usuario"><img src="../assets/img/foto/iokim.png" alt=""></div>
                                            <div class="ps-2">
                                                <p class="color-text-cinza pb-0 mb-0">Olá,</p>
                                                <h6 class="nome-usuario color-text-cinza"><?php echo $row_usuario['nome']; ?></h6>
                                            </div>
                                        </small>
                                        <div class="separator"></div>
                                        <h6 class="menu-painel-usuario-titulo"><i class="fa-solid fa-id-card"></i> Sua conta</h6>
                                        <a class="dropdown-item menu-painel-usuario-item align-items-center" href="editausuarioativo.php"><p><i class="fa-solid fa-user"></i> Dados Pessoais</p></a>
                                        <a class="dropdown-item menu-painel-usuario-item" href="editasenha.php"><p><i class="fa-solid fa-key"></i> Alterar a Senha</p></a>
                                        <div class="separator"></div>
                                        <h6 class="menu-painel-usuario-titulo">Acesso rápido</h6>
                                        <div class="barra-lateral-active">
                                            <a class="barra-lateral-link menu-painel-usuario-item d-flex justify-content-between align-items-center" href="#">
                                                <div class="w-100">
                                                    <i class="fa-solid fa-chart-line"></i>
                                                    <span>Dashboard</span>
                                                </div>
                                                <i class="fa-solid fa-chevron-right flex-shrink-1 pe-3"></i>
                                            </a><!--Dashboard-->
                                        </div><!--barra-lateral-active-->
                                        <a class="barra-lateral-link menu-painel-usuario-item d-flex align-items-center" href="#">
                                            <div class="w-100">
                                                <i class="fa-solid fa-users flex-shrink-1"></i>
                                                <span>Usuários</span>
                                            </div>
                                            <i class="fa-solid fa-chevron-right pe-3"></i>
                                        </a><!--Usuários-->
                                        <a class="barra-lateral-link menu-painel-usuario-item d-flex align-items-center" href="#" href="#">
                                            <div class="w-100">
                                                <i class="fa-solid fa-burger"></i>
                                                <span>Produtos</span>
                                            </div>
                                            <i class="fa-solid fa-chevron-right flex-shrink-1 pe-3"></i>
                                        </a><!--Produtos-->
                                        <a class="barra-lateral-link menu-painel-usuario-item d-flex align-items-center" href="#">
                                            <div class="w-100">
                                                <i class="fa-solid fa-grip"></i>
                                                <span>Mesas</span>
                                            </div>
                                            <i class="fa-solid fa-chevron-right flex-shrink-1 pe-3"></i>
                                        </a><!--Mesas-->
                                        <a class="barra-lateral-link menu-painel-usuario-item d-flex align-items-center" href="#">
                                            <div class="w-100">
                                                <i class="fa-solid fa-cart-arrow-down"></i>
                                                <span>Pedidos</span>
                                            </div>
                                            <i class="fa-solid fa-chevron-right flex-shrink-1 pe-3"></i>
                                        </a><!--Pedidos-->
                                        <br>
                                        <div class="separator"></div>
                                        <a class="barra-lateral-link menu-painel-usuario-item" href="../login/scriptlogout.php"><i class="fa-solid fa-door-open"></i> Sair</a>
                                    </div>
                                </div>
                            </div>
                        </nav>
                        <!-- Fim da Barra de Navegação para telas pequenas -->
                    </div>
                </div> <!--Fim do Painel do Usuário: Telas Pequenas-->
            </div>
        </div>
    </header>
    <main class="container-fluid main-principal ">
        <div class="sidebar barra-lateral shadow-sm d-none d-lg-block">
            <div class="text-lg-start text-center pt-2 pb-3 ps-2"><img class="logo img-fluid" src="../assets/img/Logo-Horizontal-Cardapio-Facil.png" alt="Logo Cardápio Fácil"></div>
            <h6>Acesso rápido</h6>
            <div class="barra-lateral-active">
                <a class="barra-lateral-link d-flex align-items-center" href="#">
                    <div class="w-100">
                        <i class="fa-solid fa-chart-line"></i>
                        <span>Dashboard</span>
                    </div>
                    <i class="fa-solid fa-chevron-right flex-shrink-1 pe-3"></i>
                </a><!--Dashboard-->
            </div><!--barra-lateral-active-->
            <a class="barra-lateral-link d-flex align-items-center" href="#">
                <div class="w-100">
                    <i class="fa-solid fa-users flex-shrink-1"></i>
                    <span>Usuários</span>
                </div>
                <i class="fa-solid fa-chevron-right pe-3"></i>
            </a><!--Usuários-->
            <a class="barra-lateral-link d-flex align-items-center" href="#" href="#">
                <div class="w-100">
                    <i class="fa-solid fa-burger"></i>
                    <span>Produtos</span>
                </div>
                <i class="fa-solid fa-chevron-right flex-shrink-1 pe-3"></i>
            </a><!--Produtos-->
            <a class="barra-lateral-link d-flex align-items-center" href="#">
                <div class="w-100">
                    <i class="fa-solid fa-grip"></i>
                    <span>Mesas</span>
                </div>
                <i class="fa-solid fa-chevron-right flex-shrink-1 pe-3"></i>
            </a><!--Mesas-->
            <a class="barra-lateral-link d-flex align-items-center" href="#">
                <div class="w-100">
                    <i class="fa-solid fa-cart-arrow-down"></i>
                    <span>Pedidos</span>
                </div>
                <i class="fa-solid fa-chevron-right flex-shrink-1 pe-3"></i>
            </a><!--Pedidos-->
            <br>
            <div class="separator"></div>
            <a class="barra-lateral-link" href="../index.html"><i class="fa-solid fa-door-open"></i> Sair</a>
        </div> <!-- Sidebar - Barra Lateral-->
        <!-- Início do Contéudo Principal: Dashboard -->
        <div class="bg-white main-conteudo p-0 m-0">
            <div class="container-fluid p-0 m-0">
                <div class="row ps-5 m-0 bg-white d-none d-lg-block">
                    <!-- Painel de Usuários: Apenas para telas grandes -->
                    <div class="d-flex justify-content-between align-items-center pt-2 pb-2">
                        <div class="col-lg-6 col-1 d-block align-items-start titulo-area-acesso d-none d-lg-block">
                            <div class="row bg-white">
                                <p class="lead text-start color-text-cinza m-0 p-0">Área de Acesso:</p>
                                <h3 class="text-start align-self-start color-text-cinza m-0 p-0">Administrador</h3>
                            </div>
                        </div><!--titulo-area-acesso-->
                        <nav class="col-lg-2 navbar navbar-expand-lg m-0 p-0 me-4 d-none d-lg-block">
                            <div class="m-0">
                                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                                    <span class="navbar-toggler-icon"></span>
                                </button>
                                <div class="collapse navbar-collapse ps-2" id="navbarNavDropdown">
                                    <ul class=" navbar-nav">
                                        <li class="nav-item dropdown">
                                            <a class="painel-usuario nav-link dropdown-toggle d-flex justify-content-end align-items-center m-0 p-0" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                                <div class="foto-usuario"><img src="../assets/img/foto/iokim.png" alt=""></div>
                                                <div class="ola-usuario ms-2 me-3">
                                                    <p class="color-text-cinza">Olá,</p>
                                                    <h6 class="nome-usuario color-text-cinza"><?php echo $row_usuario['nome']; ?></h6>
                                                    <!-- <h6 class="nome-usuario color-text-cinza">Iokim Diego</h6> -->
                                                </div>
                                            </a>
                                            <ul class="dropdown-menu menu-painel-usuario">
                                                <li><h6 class="menu-painel-usuario-titulo"><i class="fa-solid fa-id-card"></i> Sua conta</h6></li>
                                                <li><a class="dropdown-item menu-painel-usuario-item align-items-center" href="editausuarioativo.php"><p><i class="fa-solid fa-user"></i> Dados Pessoais</p></a></li>
                                                <li><a class="dropdown-item menu-painel-usuario-item" href="editasenha.php"><p><i class="fa-solid fa-key"></i> Alterar a Senha</p></a></li>
                                                <div class="separator"></div>
                                                <li><h6 class="pt-2"><a class="dropdown-item menu-painel-usuario-sair" href="../login/scriptlogout.php"><i class="fa-solid fa-door-open"></i> Sair</a></h6></li>
                                            </ul>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </nav>
                    </div><!--painel-usuario -->
                </div><!--row-->
            </div>
            <div class="row">
                <div class="main-conteudo-dashboard">
                    <!-- Seção Título da Página -->
                    <div class="titulo-secao card">
                        <h2 class="color-text-cinza">Dashboard</h2>
                        <div class="separator"></div>
                        <p class="color-text-cinza"><i class="fa-solid fa-house"></i> / Dashboard</p>
                    </div><!--FIm do Título da Página-->
                    <!-- Banner Boas vindas -->
                    <div class="main-banner mt-2 card shadow-sm">
                        <h1 class="text-black-50 display-5">Olá, <strong class="color-text-cinza">Iokim Diego</strong></h1>
                        <p class="lead mensagem-banner d-none d-lg-block">Na área restrita de administrador, você poderá acompanhar o movimento do restaurante em tempo real, monitorar métricas importantes e tomar decisões estratégicas. Além disso, terá a capacidade de realizar cadastros e atualizações para manter nossos registros precisos e atualizados.</p>
                    </div><!--Fim do Banner de Boas Vindas-->
                    <!-- Seção de Resumos -->
                    <div class="main-card pt-2 d-flex gap-3 justify-content-around">
                        <!-- Card 1 -->
                        <div class="card" style="width: 16rem;">
                            <div class="card-body">
                                <h5 class="card-title">Pedidos do Dia</h5>
                                <div class="separator"></div>
                                <div class="card-text d-flex align-items-center justify-content-lg-between justify-content-center">
                                    <i class="fa-solid fa-receipt d-none d-lg-block"></i>
                                    <h5 class="text-lg-end texte-center">60</h5>
                                </div>
                            </div>
                        </div><!--Card 1-->
                        <!-- Card 2 -->
                        <div class="card" style="width: 16rem;">
                            <div class="card-body">
                                <h5 class="card-title">Ticket Médio</h5>
                                <div class="separator"></div>
                                <div class="card-text d-flex align-items-center justify-content-lg-between justify-content-center">
                                    <i class="fa-solid fa-chart-pie d-none d-lg-block"></i>
                                    <h5>60</h5>
                                </div>
                            </div>
                        </div><!--Card 2-->
                        <!-- Card 3 -->
                        <div class="card" style="width: 16rem;">
                            <div class="card-body">
                                <h5 class="card-title">Soma do Dia</h5>
                                <div class="separator"></div>
                                <div class="card-text d-flex align-items-center justify-content-lg-between justify-content-center">
                                    <i class="fa-solid fa-brazilian-real-sign d-none d-lg-block"></i>
                                    <h5>6.000</h5>
                                </div>
                            </div>
                        </div><!--Card 3-->
                        <!-- Card 4 -->
                        <div class="card" style="width: 16rem;">
                            <div class="card-body">
                                <h5 class="card-title">Soma do Mês</h5>
                                <div class="separator"></div>
                                <div class="card-text d-flex align-items-center justify-content-lg-between justify-content-center">
                                    <i class="fa-solid fa-brazilian-real-sign d-none d-lg-block"></i>
                                    <h5>60.000</h5>
                                </div>
                            </div>
                        </div><!--Card 4-->
                    </div><!--main-card - Fim da Seção de Resumos-->
                    <!-- Início do Relatório de Pedidos em Aberto e Concluídos -->
                    <div class="row">
                        <div class="col-lg-6 relatorio">
                            <ul class=" nav nav-tabs relatorio-links">
                                <li class="nav-item">
                                    <a class="nav-link active ativo" href="#">Pedidos em Aberto</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="#">Pedidos Concluídos</a>
                                </li>
                            </ul><!--relatorio-links-->
                            <div class="relatorio-conteudo">
                                <div class="relatorio-titulo">
                                    <p>Mesa</p>
                                    <p>Ordem</p>
                                    <p>Quant</p>
                                    <p>Tkt</p>
                                    <p>Subtotal</p>
                                </div><!--relatorio-->
                            </div><!--relatorio-titulo-->
                        </div><!--relatorio Pedidos-->
                        <div class="col-lg-6 relatorio">
                            <ul class=" nav nav-tabs relatorio-links">
                                <li class="nav-item">
                                    <a class="nav-link active ativo" href="#">Acumulado por Categoria</a>
                                </li>
                            </ul><!--relatorio-links-->
                            <!-- Início do Relatório de Acumulado por Categoria -->
                            <div class="relatorio-conteudo">
                                <div class="relatorio-titulo">
                                    <p>Mesa</p>
                                    <p>Ordem</p>
                                    <p>Quant</p>
                                    <p>Tkt</p>
                                    <p>Subtotal</p>
                                </div><!--relatorio-titulo-->
                            </div><!--relatorio-->
                        </div><!--relatorio Categorias-->
                    </div>
                </div><!--</div> main-conteudo-->
            </div>
        </div>
    </main><!-- </main> -->
    <script src="https://kit.fontawesome.com/3f863ead0e.js" crossorigin="anonymous"></script>
    <script src="../assets/js/bootstrap.bundle.min.js"></script>
</body>
</html>             