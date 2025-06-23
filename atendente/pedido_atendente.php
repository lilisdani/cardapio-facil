<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Interface do Atendente</title>
    <link rel="stylesheet" href="../assets/css/bootstrap.min.css" />
    <link
      rel="shortcut icon"
      href="../assets/img/logo-icone.png"
      type="image/x-icon"
    />
   
    <link rel="stylesheet" href="../assets/css/fontawesome.css" />
    <link>
    <script src="../assets/js/bootstrap.bundle.min.js"></script>
    <script src="../assets/js/1.index.js"></script>
    <!-- Adicione qualquer folha de estilo CSS necessária -->
    <style>
      body{
        background-color: #7a0404;
      }
       @media (min-width: 999px) {
        .menu-sanduiche {
          visibility: hidden;
        }
        .menu-normal {
          visibility: visible;
        }
      }
      @media (max-width: 999px) {
        .menu-normal {
          visibility: hidden;
        }
        .menu-sanduiche {
          visibility: visible;
        }
      }
      #rodape {
    position: fixed;
    bottom: 0;
    right: 0;
    width: 100%;
    background-color: #f5f5f5; /* Cor de fundo do rodapé */
    /* Adicione estilos adicionais conforme necessário */
}

#cliente1 {
    width: 98%;
    margin-left: 1%;
    margin-top: 10%;
    border: 1px solid #cacaca;
    border-radius: 5px;
    margin-bottom: 20px; /* Remova uma das definições de margin-bottom */
    padding: 5%; /* Remova uma das definições de padding */
    display: block;
    justify-content: space-between;
    position: relative;
}

#cliente2 {
    width: 98%;
    margin-left: 1%;
    margin-top: 5%;
    border: 1px solid #cacaca;
    border-radius: 5px;
    margin-bottom: 20px; /* Remova uma das definições de margin-bottom */
    padding: 5%; /* Remova uma das definições de padding */
    display: block;
    justify-content: space-between;
    position: relative;
}

#cliente3 {
    width: 98%;
    margin-left: 1%;
    margin-top: 5%;
    border: 1px solid #cacaca;
    border-radius: 5px;
    margin-bottom: 20px; /* Remova uma das definições de margin-bottom */
    padding: 5%; /* Remova uma das definições de padding */
    display: block;
    justify-content: space-between;
    position: relative;
}

#cliente4 {
    width: 98%;
    margin-left: 1%;
    margin-top: 5%;
    border: 1px solid #cacaca;
    border-radius: 5px;
    margin-bottom: 20px; /* Remova uma das definições de margin-bottom */
    padding: 5%; /* Remova uma das definições de padding */
    display: block;
    justify-content: space-between;
    position: relative;
}

#cliente5{
    width: 98%;
    margin-left: 1%;
    margin-top: 5%;
    border: 1px solid #cacaca;
    border-radius: 5px;
    margin-bottom: 20px; /* Remova uma das definições de margin-bottom */
    padding: 5%; /* Remova uma das definições de padding */
    display: block;
    justify-content: space-between;
    position: relative;
}

.pedido{
    margin-bottom: 5%;
display:grid; /* Adicionando display flex para alinhar os itens horizontalmente */
flex-direction:row; /* Alterado para dispor os itens verticalmente */
padding: 0%;

}

h2{
  color: #413f3f;
}



input{
    margin-top: 1px;
    padding: 2%;
    background-color: #fafafa;
    border: 1px solid #ffffff;
}
label {
     font-size: 20px;
     color: #0f6e03;
}

.cliente_um{
    border-collapse: collapse;
    background-color: #ffffffbb;
    width: 0%;

}
     /* Estilo para o cronômetro */

 .cronometro {
    position:relative;
    padding: 5px;
    top: 25%;
    left: 100%;
    transform: translate(-60%, -60%);
    font-size: 35px;
    color: #e40000;
    
}


button {
position:relative;
background-color: #068611;
color: white;
padding: 1px 1px;
border: none;
border-radius: 5px;
cursor: pointer;
font-size: 16px;
margin: top -1px; /* Adicionando margem ao botão para separá-lo dos outros elementos */
margin-right: 10px;
float: right;
}   

button:hover {
background-color: #45a049;
}


/*  estilização sino de notificação*/

.notificacaoCozinha {
    position:relative;
}
/* Estilo para o ícone de sino */

.sino {
    width: 50px;
   
    padding: 5px;
    font-size: 0px;
    position: absolute; /* Posicionamento absoluto para alinhamento dentro do ícone */
   /* Ajuste do posicionamento vertical */
    right: -10px; /* Ajuste do posicionamento horizontal */
    display: block; /* Usaremos flexbox para centralizar o texto */
    justify-content: center; /* Centralizar horizontalmente */
    align-items: center; /* Centralizar verticalmente */
}

/* CSS para a notificação de pedido pronto */


.notificacaoCozinha .contadorNotificacoes {
    background-color: #e00505; /* Cor de fundo do contador */
    color: #ffffff; /* Cor do texto do contador */
    border-radius: 50%; /* Agora o border-radius será de 50% para criar um círculo */
    width: 20px; /* Largura do contador */
    height: 20px; /* Altura do contador */
    font-size: 12px; /* Tamanho do texto do contador */
    position:absolute; /* Posicionamento absoluto para alinhamento dentro do ícone */
    right: -10px; /* Ajuste do posicionamento horizontal */
    display: flex; /* Usaremos flexbox para centralizar o texto */
    justify-content: center; /* Centralizar horizontalmente */
    align-items: center; /* Centralizar verticalmente */
}

.notificacaoCozinha .textoNotificacao {
    font-size: 25px; /* Tamanho do texto da notificação */
    color: #000000; /* Cor do texto da notificação */
    margin-left: 5%; /* Espaçamento à esquerda para separar do contador */
    position:absolute; /* Posicionamento absoluto para alinhamento dentro do ícone */
    right: 20px; /* Ajuste do posicionamento horizontal */
    display:inline-block; /* Usaremos flexbox para centralizar o texto */
    justify-content: center; /* Centralizar horizontalmente */
    align-items: center; /* Centralizar verticalmente */
}



    </style>
</head>
<body>

    <header>
        <section class="container-fluid">
            <nav
              class="navbar bg-white menu-sanduiche bg-body-white shadow-sm fixed-top d-lg-none pb-3"
            >
              <div class="container-fluid">
                <a class="navbar-brand" href="../index.html"
                  ><img
                    src="../assets/img/Logo-Horizontal-Cardapio-Facil.png"
                    alt=""
                    width="200rem"
                /></a>
                <button
                  class="navbar-toggler"
                  type="button"
                  data-bs-toggle="offcanvas"
                  data-bs-target="#offcanvasNavbar"
                  aria-controls="offcanvasNavbar"
                  aria-label="Toggle navigation"
                >
                  <span class="navbar-toggler-icon"></span>
                </button>
                <div
                  class="offcanvas offcanvas-end"
                  tabindex="-1"
                  id="offcanvasNavbar"
                  aria-labelledby="offcanvasNavbarLabel"
                >
                  <div class="offcanvas-header">
                    <a
                      href="../index.html"
                      class="offcanvas-title"
                      id="offcanvasNavbarLabel"
                      >  
                      <img
                      src="../assets/img/Logo-Horizontal-Cardapio-Facil.png"
                      alt="Logo Cardápio Fácil"
                      width="98%"
                    />
                
                </a>
                    <button
                      type="button"
                      class="btn-close"
                      data-bs-dismiss="offcanvas"
                      aria-label="Close"
                    ></button>
                  </div>
                  <div class="offcanvas-body">
                    <ul
                      class="navbar-nav navbar-expand-lg justify-content-end flex-grow-1 pe-3"
                    >
                      <li class="nav-item">
                        <a class="nav-link" href="#sanduiches1">Sanduíches</a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link" href="#salgados">Salgados</a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link" href="#bebidas">Bebidas</a>
                      </li>
                    </ul>
                    <a
                      class="btn btn-danger"
                      href="../login/index_login.html"
                      role="button"
                      >Sair</a
                    >
                  </div>
                </div>
              </div>
            </nav>
          </section>
          <!-- Fim da Barra de Navegação para telas pequenas -->
    
          <!-- Início da Barra de Navegação para telas grandes -->
          <section>
            <div
              class="container-fluid menu-normal d-flex align-items-center shadow-sm fixed-top bg-white pt-3 pb-3"
              id="sanduiches"
            >
              <div class="container">
                <div class="row">
                  <!-- Logomarca Cardápio Fácil -->
                  <div class="col-lg-3 col-12 text-lg-start text-center">
                    <a href="../index.html">
                      <img
                        class="img-fluid"
                        src="../assets/img/Logo-Horizontal-Cardapio-Facil.png"
                        alt="Logo Cardápio Fácil Horizontal"
                        width="200rem"
                      />
                    </a>
                  </div>
                  <!-- Barra de Navegação -->
                  <div class="col-9 d-flex justify-content-end align-items-center">
                    <div>
                      <nav class="navbar navbar-expand-lg nav-underline">
                        <a
                          href="#sanduiches1"
                          class="nav-link text-light-emphasis"
                          >Sanduíches</a
                        >
                        <a href="#salgados" class="nav-link text-light-emphasis"
                          >Salgados</a
                        >
                        <a href="#bebidas" class="nav-link text-light-emphasis"
                          >Bebidas</a
                        >
    
                      
                      </nav>
    
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </section>
          <!-- Fim da Barra de Navegação para telas grandes -->  
        </header>
        
        




   
    
    <!-- seção pedido 1-->
    
    <!--conometro de preparo-->
  
    <!-- Exemplo para o primeiro pedido -->
<section id="cliente1" class="cliente_um">
  
        <div class="cronometro" id="cronometro1">00:00:00</div>
        <!-- Ícone do sino -->
        <!-- Notificação de pedido pronto -->
        <div class="notificacaoCozinha">
            <span class="contadorNotificacoes" id="contadorNotificacoes1"></span>
            <span class="textoNotificacao" id="textoNotificacao1"></span>
            <div class="sino">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512">
                    <path d="M224 0c-17.7 0-32 14.3-32 32V51.2C119 66 64 130.6 64 208v18.8c0 47-17.3 92.4-48.5 127.6l-7.4 8.3c-8.4 9.4-10.4 22.9-5.3 34.4S19.4 416 32 416H416c12.6 0 24-7.4 29.2-18.9s3.1-25-5.3-34.4l-7.4-8.3C401.3 319.2 384 273.9 384 226.8V208c0-77.4-55-142-128-156.8V32c0-17.7-14.3-32-32-32zm45.3 493.3c12-12 18.7-28.3 18.7-45.3H224 160c0 17 6.7 33.3 18.7 45.3s28.3 18.7 45.3 18.7s33.3-6.7 45.3-18.7z"/>
                </svg>
            </div>
        </div>
        <div class="pedido">
            <h2>Pedido 1</h2>
            <label for="nomeCliente1">Nome do Cliente:</label>
            <input type="text" id="nomeCliente1" name="nomeCliente1">
            <label for="nomeMesa1">Numero da Mesa:</label>
            <input type="text" id="nomeMesa1" name="nomeMesa1">
            <label for="bebidaPedido1">Bebida:</label>
            <input type="text" id="bebidaPedido1" name="bebidaPedido1">
            <label for="sanduichePedido1">Sanduíche:</label>
            <input type="text" id="sanduichePedido1" name="sanduichePedido1">
            <label for="descricaoPedido1">Descrição:</label>
            <input type="text" id="descricaoPedido1" name="descricaoPedido1">
            <!-- Botão de envio do formulário -->
           
        </div>
        <button type="submit" name="pedido" value="1">Enviar Pedido</button>
       
    </form>
</section>




       <!--seção de cronometro de preparo-->
        <section id="cliente2"  class="cliente_um">
          <div class="cronometro" id="cronometro2">00:00:00</div>
          <!--notificação de pedido pronto-->
          <div class="notificacaoCozinha" onclick="exibirMensagemNotificacao()">
            <span class="contadorNotificacoes" id="contadorNotificacoes2"></span>
            <span class="textoNotificacao" id="textoNotificacao1"></span>
          <div class="sino"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"><path d="M224 0c-17.7 0-32 14.3-32 32V51.2C119 66 64 130.6 64 208v18.8c0 47-17.3 92.4-48.5 127.6l-7.4 8.3c-8.4 9.4-10.4 22.9-5.3 34.4S19.4 416 32 416H416c12.6 0 24-7.4 29.2-18.9s3.1-25-5.3-34.4l-7.4-8.3C401.3 319.2 384 273.9 384 226.8V208c0-77.4-55-142-128-156.8V32c0-17.7-14.3-32-32-32zm45.3 493.3c12-12 18.7-28.3 18.7-45.3H224 160c0 17 6.7 33.3 18.7 45.3s28.3 18.7 45.3 18.7s33.3-6.7 45.3-18.7z"/></svg></div>
        </div>
            <div class="pedido">
                <h2>Pedido 2</h2>
                <label for="nomeCliente2">Nome do Cliente:</label>
                <input type="text" id="nomeCliente2" name="nomeCliente2">
                <label for="nomeMesa2">Nome da Mesa:</label>
                <input type="text" id="nomeMesa2" name="nomeMesa2">
                <label for="idPedido2">ID do Pedido:</label>
                <input type="text" id="idPedido2" name="idPedido2">
                <label for="bebidaPedido2">Bebida:</label>
                <input type="text" id="bebidaPedido2" name="bebidaPedido2">
                <label for="sanduichePedido2">Sanduíche:</label>
                <input type="text" id="sanduichePedido2" name="sanduichePedido2">
                <label for="descricaoPedido2">Descrição:</label>
                <input type="text" id="descricaoPedido2" name="descricaoPedido2">
            </div>
            <!--  botão para enviar o pedido -->
     <button onclick="enviarPedido2()">Enviar Pedido</button>
    </section>
    


     <!-- Exemplo para o segundo pedido -->
     <section id="cliente3"  class="cliente_um">
      <div class="cronometro" id="cronometro3">00:00:00</div>
      <div class="notificacaoCozinha" onclick="exibirMensagemNotificacao()">
        <span class="contadorNotificacoes" id="contadorNotificacoes3"></span>
        <span class="textoNotificacao" id="textoNotificacao3"></span>
      <div class="sino"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"><path d="M224 0c-17.7 0-32 14.3-32 32V51.2C119 66 64 130.6 64 208v18.8c0 47-17.3 92.4-48.5 127.6l-7.4 8.3c-8.4 9.4-10.4 22.9-5.3 34.4S19.4 416 32 416H416c12.6 0 24-7.4 29.2-18.9s3.1-25-5.3-34.4l-7.4-8.3C401.3 319.2 384 273.9 384 226.8V208c0-77.4-55-142-128-156.8V32c0-17.7-14.3-32-32-32zm45.3 493.3c12-12 18.7-28.3 18.7-45.3H224 160c0 17 6.7 33.3 18.7 45.3s28.3 18.7 45.3 18.7s33.3-6.7 45.3-18.7z"/></svg></div>
    </div>


        <div class="pedido">
            <h2>Pedido 3</h2>
            <label for="nomeCliente3">Nome do Cliente:</label>
            <input type="text" id="nomeCliente3" name="nomeCliente3">
            <label for="nomeMesa3">Nome da Mesa:</label>
            <input type="text" id="nomeMesa3" name="nomeMesa3">
            <label for="idPedido3">ID do Pedido:</label>
            <input type="text" id="idPedido3" name="idPedido3">
            <label for="bebidaPedido3">Bebida:</label>
            <input type="text" id="bebidaPedido3" name="bebidaPedido3">
            <label for="sanduichePedido3">Sanduíche:</label>
            <input type="text" id="sanduichePedido3" name="sanduichePedido3">
            <label for="descricaoPedido3">Descrição:</label>
            <input type="text" id="descricaoPedido3" name="descricaoPedido3">
        </div>

        <!--botão para enviar o pedido -->
     <button onclick="enviarPedido3()">Enviar Pedido</button>
    </section>
</section>


<section id="cliente4"  class="cliente_um">
  <div class="cronometro" id="cronometro4">00:00:00</div>
  <div class="notificacaoCozinha" onclick="exibirMensagemNotificacao()">
    <span class="contadorNotificacoes" id="contadorNotificacoes4"></span>
    <span class="textoNotificacao" id="textoNotificacao4"></span>
  <div class="sino"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"><path d="M224 0c-17.7 0-32 14.3-32 32V51.2C119 66 64 130.6 64 208v18.8c0 47-17.3 92.4-48.5 127.6l-7.4 8.3c-8.4 9.4-10.4 22.9-5.3 34.4S19.4 416 32 416H416c12.6 0 24-7.4 29.2-18.9s3.1-25-5.3-34.4l-7.4-8.3C401.3 319.2 384 273.9 384 226.8V208c0-77.4-55-142-128-156.8V32c0-17.7-14.3-32-32-32zm45.3 493.3c12-12 18.7-28.3 18.7-45.3H224 160c0 17 6.7 33.3 18.7 45.3s28.3 18.7 45.3 18.7s33.3-6.7 45.3-18.7z"/></svg></div>
</div>
    <div class="pedido">
        <h2>Pedido 4</h2>
        <label for="nomeCliente4">Nome do Cliente:</label>
        <input type="text" id="nomeCliente4" name="nomeCliente4">
        <label for="nomeMesa4">Nome da Mesa:</label>
        <input type="text" id="nomeMesa4" name="nomeMesa4">
        <label for="idPedido4">ID do Pedido:</label>
        <input type="text" id="idPedido4" name="idPedido4">
        <label for="bebidaPedido4">Bebida:</label>
        <input type="text" id="bebidaPedido4" name="bebidaPedido4">
        <label for="sanduichePedido4">Sanduíche:</label>
        <input type="text" id="sanduichePedido4" name="sanduichePedido4">
        <label for="descricaoPedido4">Descrição:</label>
        <input type="text" id="descricaoPedido4" name="descricaoPedido4">
    </div>
    <!--  botão para enviar o pedido -->
     <button onclick="enviarPedido4()">Enviar Pedido</button>
    </section>

     
</section>

<section id="cliente5"  class="cliente_um">
  <div class="cronometro" id="cronometro5">00:00:00</div>
  <div class="notificacaoCozinha" onclick="exibirMensagemNotificacao()">
    <span class="contadorNotificacoes" id="contadorNotificacoes5"></span>
    <span class="textoNotificacao" id="textoNotificacao5"></span>
  <div class="sino"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"><path d="M224 0c-17.7 0-32 14.3-32 32V51.2C119 66 64 130.6 64 208v18.8c0 47-17.3 92.4-48.5 127.6l-7.4 8.3c-8.4 9.4-10.4 22.9-5.3 34.4S19.4 416 32 416H416c12.6 0 24-7.4 29.2-18.9s3.1-25-5.3-34.4l-7.4-8.3C401.3 319.2 384 273.9 384 226.8V208c0-77.4-55-142-128-156.8V32c0-17.7-14.3-32-32-32zm45.3 493.3c12-12 18.7-28.3 18.7-45.3H224 160c0 17 6.7 33.3 18.7 45.3s28.3 18.7 45.3 18.7s33.3-6.7 45.3-18.7z"/></svg></div>
</div>
    <div class="pedido">
        <h2>Pedido 5</h2>
        <label for="nomeCliente5">Nome do Cliente:</label>
        <input type="text" id="nomeCliente5" name="nomeCliente5">
        <label for="nomeMesa5">Nome da Mesa:</label>
        <input type="text" id="nomeMesa5" name="nomeMesa5">
        <label for="idPedido5">ID do Pedido:</label>
        <input type="text" id="idPedido5" name="idPedido5">
        <label for="bebidaPedido5">Bebida:</label>
        <input type="text" id="bebidaPedido5" name="bebidaPedido5">
        <label for="sanduichePedido5">Sanduíche:</label>
        <input type="text" id="sanduichePedido5" name="sanduichePedido5">
        <label for="descricaoPedido5">Descrição:</label>
        <input type="text" id="descricaoPedido5" name="descricaoPedido5">
    </div>
    <!--  botão para enviar o pedido -->
     <button onclick="enviarPedido5()">Enviar Pedido</button>
    </section>

    


 
    
    <form method="post" action="exibir_pedido.php">

<script src="../assets/js/atendente_script.js"></script>
<script src="../assets/js/atendente2_script.js"></script>


</body>
</html>
