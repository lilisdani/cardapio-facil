<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="pt-br">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="../assets/css/bootstrap.min.css" />
    <link rel="shortcut icon" href="../assets/img/logo-icone.png" />
    <link rel="stylesheet" href="../assets/css/1.style-index.css">
    <title>Login - Cardápio Fácil</title>
    <?php
        if(isset($_SESSION['msg'])){
            echo $_SESSION['msg'];
        }
        unset($_SESSION['msg']);
    ?>
  </head>
  
  <body>
    <header>
              <!-- Início da Barra de Navegação para telas grandes -->
 <div class="container-fluid d-flex align-items-center shadow-lg-sm sticky-top bg-white pt-4 pb-4" >
  <div class="container">
    <div class="row">
       <!-- Logomarca Cardápio Fácil -->
       <div class="col-lg-3 col-12 text-lg-start text-center">
            <a href="../index.html">
              <img class="img-fluid"
                src="../assets/img/Logo-Horizontal-Cardapio-Facil.png"
                alt="Logo Cardápio Fácil Horizontal" width="200rem"
              />
            </a>
          </div>
    </div>
  </div>
 </div>
      <!-- Fim da Barra de Navegação para telas grandes -->
    </header>

    <!-- Início da Seção Principal -->
    <main class="container-fluid bg-white pt-2 bg-secao-inicio">
      <!-- INÍCIO forms SEÇÃO inputs LOGIN -->
      <div class="container pt-0">
        <div class="row d-flex justify-content-center">
          <div class="card shadow-sm p-4 mb-5 bg-white rounded form-row pt-5 pb-4 col-lg-5 col-12">
            <div>
              <p class="lh-1 display-6 .color-text-cinza mb-0">Faça seu login para</p>
              <p class="lh-1 display-5 fw-bold text-danger">continuar</p>
            </div>
            <form method="post" action="script_login.php">
              <!-- Input CPF -->
              <div class="form-outline mb-2">
                <label class="form-label .color-text-cinza" for="formCPF">CPF:</label>
                <input
                type="text"
                id="formCPF"
                name="cpf" 
                class="form-control"
                placeholder="Insira CPF"
                />
                </div>
                <!-- Input Senha -->
                <div class="form-outline mb-4">
                  <label class="form-label" for="formSenha">Senha:</label>
                  <input
                  type="password"
                  id="formSenha"
                  name="senha"
                  class="form-control"
                  placeholder="Insira Senha"
                  />
                </div> 
                <!-- Grid 2 colunas para estilização inline -->
                <div class="container d-flex justify-content-center">
                  <div class="row mb-4 ">
                    <div class="col d-flex justify-content-center">
                      <!-- caixa de marcação Salvar Acesso -->
                      <div class="form-check">
                        <input
                        class="form-check-input"
                        type="checkbox"
                        value=""
                        id="formLembrarAcesso"
                        checked
                        />
                        <labe-l class="form-check-label" for="formLembrarAcesso">
                          Lembrar meu acesso
                        </labe-l>
                      </div>
                    </div>
                    <div class="col">
                      <!-- Direcionar para Recuperação de Senha -->
                      <a href="#!" class="text-reset">Esqueceu a Senha?</a>
                    </div>
                  </div>
                </div>
                <!-- </span> -->
                <!-- Botão de Submeter o formulário -->
                <div class="d-grid gap-2 col-md-12 text-center pt-0 pb-3">
                  <button
                  data-mdb-ripple-init
                  type="submit"
                  class="btn btn-danger btn-block">
                  Entrar
                </button>
                <!-- </div> -->
              </form>
              <div class="d-grid gap-2 col-md-12 text-start pt-1">
                <small
                >Primeiro acesso?
                <a href="../cadastro/index_cadastro.html" class="text-dark fw-bold">Cadastre-se aqui!</a></small
                >
              </div>
            </div>
          </div>
        </div>
      </div><!-- FIM DA SEÇÃO INPUTS LOGIN --> 
    </main>
    
    <footer>
    </footer>

    <!-- ADICIONANDO JAVASCRIPT DO BOOTSTRAP -->
    <script src="/assets/js/bootstrap.bundle.min.js"></script> 
  </body>
</html>
