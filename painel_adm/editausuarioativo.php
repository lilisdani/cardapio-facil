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
            header("Location:dashboard.php");
        }
    ?>
</head>
<body>
    <?php
        $dados = filter_input_array(INPUT_POST, FILTER_DEFAULT);

        // 9 - Verificar se o usuário clicou no Botão Atualizar
        if(!empty($dados['EditUsuario'])){
            $empty_input = false;
            //Retirando espaços em branco no início e final dos campos
            array_map('trim', $dados);

            // 10 - Verificar se há algum campo em branco no formulário
            if(in_array("", $dados)){
                $empty_input = true;
                echo("<p style='color:#f00;'>ERRO: Necessário preencher todos os campos!</p>");
            // 11 - Verificando se a estrutura do e-mail informado está em formato válido
            } elseif(!filter_var($dados['email'], FILTER_VALIDATE_EMAIL)){
                $empty_input = true;
                echo("<p style='color:#f00;'>ERRO: Necessário preencher com um e-mail válido!</p>");
            }
            // 12 - Verificar se não há erros. Se verdadeiro, atualizar o Banco de Dados
            if(!$empty_input){
                // Implementar o update no Banco de Dados
                $query_up_usuario = "UPDATE administrador SET nome=:nome, email=:email, cpf=:cpf WHERE id_administrador=:id";
                // Preparando a Query de UPDATE
                $edit_usuario = $conn->prepare($query_up_usuario);
                // 13 - Atribuindo os valores aos respectivos Pseudo-nomes
                $edit_usuario->bindParam(':nome', $dados['nome'], PDO::PARAM_STR);
                $edit_usuario->bindParam(':email', $dados['email'], PDO::PARAM_STR);
                $edit_usuario->bindParam(':cpf', $dados['cpf'], PDO::PARAM_STR);
                $edit_usuario->bindParam(':id', $row_usuario['id_administrador'], PDO::PARAM_INT);

                // 14 - Executar verificando se a execução da Query de UPDATE foi realizada com sucesso
                if($edit_usuario->execute()){
                    $_SESSION['msg'] = "<p style='color:green; text-align:center;'>Usuário atualizado com sucesso!</p>";
                    header("Location:dashboard.php");
                } else{
                    echo("<p style='color:red;'>ERRO: Usuário não atualizado!</p>"); 
                }
            }
        }
    ?>
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
                                        <a class="dropdown-item menu-painel-usuario-item align-items-center" href="altera-usuario.html"><p><i class="fa-solid fa-user"></i> Dados Pessoais</p></a>
                                        <a class="dropdown-item menu-painel-usuario-item" href="altera-senha.html"><p><i class="fa-solid fa-key"></i> Alterar a Senha</p></a>
                                        <div class="separator"></div>
                                        <h6 class="menu-painel-usuario-titulo">Acesso rápido</h6>
                                        <div class="barra-lateral-active">
                                            <a class="barra-lateral-link menu-painel-usuario-item d-flex justify-content-between align-items-center" href="dashboard.php">
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
                <a class="barra-lateral-link d-flex align-items-center" href="dashboard.php">
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
                                                <li><a class="dropdown-item menu-painel-usuario-item align-items-center" href="altera-usuario.html"><p><i class="fa-solid fa-user"></i> Dados Pessoais</p></a></li>
                                                <li><a class="dropdown-item menu-painel-usuario-item" href="altera-senha.html"><p><i class="fa-solid fa-key"></i> Alterar a Senha</p></a></li>
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
                        <h2 class="color-text-cinza">Dados Pessoais de Usuário</h2>
                        <div class="separator"></div>
                        <p class="color-text-cinza"><i class="fa-solid fa-house"></i> / Usuários / <?php echo $row_usuario['nome']; ?></p>
                    </div><!--FIm do Título da Página-->
                    <!-- Início do Formulário de Dados Pessoais do Usuário -->
                    <div class=" mt-2 card shadow-sm">
                        <form class="m-5" action="" method="POST">
                            <div class="mb-3">
                                <label for="nome" class="form-label"><h6 class="color-text-cinza">Nome</h6></label>
                                <input type="text" name="nome" class="form-control" id="nome" placeholder="Nome Completo" value="<?php
                                if(isset($dados['nome'])){
                                    echo $dados['nome'];
                                }elseif(isset($row_usuario['nome'])){
                                    echo $row_usuario['nome'];
                                }
                                ?>">
                            </div>
                            <div class="row">
                                <div class="col-lg-6 col-12">
                                    <div class="mb-3">
                                        <label for="email" class="form-label color-text-cinza"><h6 class="color-text-cinza">E-mail</h6></label>
                                        <input type="email" name="email" class="form-control" id="email" placeholder="nome@exemplo.com" value="<?php
                                        if(isset($dados['email'])){
                                            echo $dados['email'];
                                        }elseif(isset($row_usuario['email'])){
                                            echo $row_usuario['email'];
                                        }
                                        ?>">
                                    </div>
                                </div>
                                <div class="col-lg-6 col-12">
                                    <div class="mb-3">
                                        <label for="cpf" class="form-label color-text-cinza"><h6 class="color-text-cinza">CPF</h6></label>
                                        <input type="text" name="cpf" class="form-control" id="cpf" placeholder="nome@exemplo.com" value="<?php
                                        if(isset($dados['cpf'])){
                                            echo $dados['cpf'];
                                        }elseif(isset($row_usuario['cpf'])){
                                            echo $row_usuario['cpf'];
                                        }
                                        ?>">
                                    </div>
                                </div>
                            </div>
                            <div class="gravar text-lg-start text-center">
                                <input class="btn bg-danger text-white" type="submit" value="Gravar" name="EditUsuario">
                            </div>
                        </form>
                    </div><!--Fim do Formulário de Dados Pessoais do Usuário-->
                </div><!--</div> main-conteudo-->
            </div>
        </div>
    </main><!-- </main> -->
    <script src="https://kit.fontawesome.com/3f863ead0e.js" crossorigin="anonymous"></script>
    <script src="../assets/js/bootstrap.bundle.min.js"></script>
</body>
</html>  