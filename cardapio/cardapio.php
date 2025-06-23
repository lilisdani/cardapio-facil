<?php
    session_start(); //Iniciando a sessão
    include("../conexao.php");
    $conn=conectar();
    
    // 2 - Identificar a ID da Mesa que o cliente escaneou e clicou, através da URL, utilizando o método GET
    $id_mesa = filter_input(INPUT_GET, "id_mesa", FILTER_SANITIZE_NUMBER_INT);

    // 3 - Verificar se existe uma ID válida, caso não exista, retornar para o arquivo index.php
    if(empty($id_mesa)){
      $_SESSION['msg'] = "<p style='color:#f00;'>ERRO: Mesa não cadastrada ou o QR-Code está com problema!</p>";
      header("Location:/index.php");
    }

    // 4 - Pesquisar dados relacionados à ID da Mesa selecionada, no Banco de Dados
    $query_mesa = "SELECT id_mesa, numero_fisico FROM mesa WHERE id_mesa = $id_mesa LIMIT 1";
    // 5 - Preparando a query
    $result_mesa = $conn->prepare($query_mesa);
    // 6 - Executando a query
    $result_mesa->execute();
    // 7 - Verificar se o resultado encontrou mesas no Banco de Dados, converter o resultado para vetor de chave/valor
    if($result_mesa and ($result_mesa->rowCount()!=0)){
        $row_mesa = $result_mesa->fetch(PDO::FETCH_ASSOC);
    }
    else{
        $_SESSION['msg'] = "<p style='color:#f00;'>ERRO! Mesa não encontrada!</p>";
        header("Location:/index.php");
    }
    // Consulta as Categorias de Produto
    $queryCategorias = $conn->prepare('SELECT * FROM categoria_item');
    $queryCategorias->execute();

    // Consulta quantidade de pedidos pendentes da mesa
    $query_pedidos_mesa = "SELECT COUNT(*) AS total_pedidos_pendentes FROM pedido WHERE estatus_entrega = 'pendente' AND id_mesa_fk = :id_mesa";
    $result_pedidos_mesa = $conn->prepare($query_pedidos_mesa);
    $result_pedidos_mesa->bindParam(':id_mesa', $id_mesa);
    $result_pedidos_mesa->execute();
    if ($result_pedidos_mesa && ($result_pedidos_mesa->rowCount() != 0)) {
      $pedidos_mesa = $result_pedidos_mesa->fetch(PDO::FETCH_ASSOC);
      // Obtendo o total de pedidos pendentes como uma string
      $total_pedidos_pendentes = strval($pedidos_mesa['total_pedidos_pendentes']);
    }

    // Verifica se a largura da tela é menor que 990px
    //$is_mobile = false;
    //if(isset($_SERVER['HTTP_USER_AGENT']) && !empty($_SERVER['HTTP_USER_AGENT'])){
      //$user_agent = $_SERVER['HTTP_USER_AGENT'];
      //$is_mobile = preg_match('/(?i)msie [1-8]/',$user_agent) || 
      //preg_match('/Android|BlackBerry|iPhone|iPod|Opera Mini|IEMobile|WPDesktop/i',$user_agent);
    //}

?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="shortcut icon" href="../assets/img/logo-icone.png" />
  <!-- chama as folhas de estilos do Bootstrap e de criação da equipe -->
  <link rel="stylesheet" href="../assets/css/bootstrap.min.css" />
  <link rel="stylesheet" href="../assets/css/1.style-index.css">
  <link rel="stylesheet" href="../assets/css/3.style-cardapio.css">
  <title>Sistema Cardápio Fácil</title>
</head>
<body>
  <!-- Início do Cabeçalho -->
  <header>
    <div class="container-fluid d-flex align-items-center shadow-sm fixed-top bg-white pt-lg-3 pb-lg-3">
      <div class="container">
        <div class="row">
          <!-- Logomarca Cardápio Fácil -->
          <div class="col-lg-3 col-12 text-lg-start text-center">
            <a href="/index.php"><img class="img-fluid" src="../assets/img/Logo-Horizontal-Cardapio-Facil.png" alt="Logo Cardápio Fácil Horizontal" width="200rem"/></a>
          </div>
          <!-- Barra de Navegação -->
          <div class="col-lg-9 col-12 d-flex justify-content-lg-end justify-content-center align-items-center">
            <div>
              <nav class="navbar navbar-expand-lg nav-underline ">
                <a href="#" class="nav-link active text-light-emphasis">Início</a>
                <?php
                  if($queryCategorias->rowCount()!=0) {
                    while($categorias = $queryCategorias->fetch(PDO::FETCH_ASSOC)){
                      extract($categorias);
                      echo("<a href='#$id_categoria' class='nav-link text-light-emphasis'>" .  $categorias['nome'] . "</a>");
                    }
                  }
                  else{
                    //não existe registro na consulta
                    echo("<p align='center' style='color:red;'>Nenhum registro encontrado!</p>");
                  }
                ?>
              </nav>
            </div>
          </div>
        </div><!--Fim da Row-->
      </div>
    </div>
  </header>
  <main>
    <?php
      $query_categoria = $conn->prepare("SELECT id_categoria, nome FROM categoria_item");
      $query_categoria->execute();
      
    ?>
    <!-- Início do banner -->
    <div class="container-fluid banner p-0">
      <img class="img-fluid" src="../assets/img/banner-cardapio.png" alt="" width="100%">
      <div class="titulo-mesa"><h5>MESA <?php echo $row_mesa['numero_fisico'] ?></h5></div>
      <div class="barra-banner-vermelha"></div>
    </div><!--Fim do Banner-->
    
    
    <!-- Início da Seção de Itens do Cardápio -->
    <!-- Nome da Categoria dos produtos -->
    <?php
    if ($query_categoria->rowCount() != 0) {
      // Iniciar a contagem de cards
      $count = 0;
      
      while ($rowCategorias = $query_categoria->fetch(PDO::FETCH_ASSOC)) {
        extract($rowCategorias);
        echo("<section class='container-fluid' id=$id_categoria>");
        echo("<div class='row background-vermelho-dark'>");
        echo("<h5 class='text-white'>:: $nome</h5>");
        echo("</div>");
        echo("<div class='container-fluid itens-cardapio pt-3 pb-5'>");
        echo("<div class='container'>");
        
        // Fazendo a consulta ao banco de dados dos produtos vinculados à categoria que está ativa
        $query_item = $conn->prepare("SELECT id_item, nome, descricao, preco, imagem FROM item WHERE id_categoria_fk=$id_categoria");
        $query_item->execute();
        
        if ($query_item->rowCount() != 0) {
          echo("<div class='row'>");
          while ($rowItem = $query_item->fetch(PDO::FETCH_ASSOC)) {
            extract($rowItem);

            
            if ($count % 4 == 0 && $count != 0) {
              // Fechar a linha atual e começar uma nova linha após cada conjunto de 4 cards
              echo("</div><div class='row'>");
            }
            
            echo("<div class='col-md-3 col-12'>");
            echo("<div class='card bg-white shadow-sm card-produto carrinho'>");
            echo("<img class='card-img-top p-2' src='../$imagem' alt='' style='width: 17rem;'>");
            echo("<div class='card-body text-center'>");
            echo("<p class'color-text-cinza m-0 p-0' name='id_item' class='id_item'>$id_item</p>");
            echo("<h5 class='card-title'>$nome</h5>");
            echo("<p class='card-text'>$descricao</p>");
            echo("<div class='d-flex justify-content-center pt-0 pb-3'>");
            echo("<strong class='text-danger'>R$ $preco</strong>");
            echo("</div>");
            echo("<div class='seletores d-flex justify-content-between'>");
            echo("<input type='number' class='form-control quantity-selector seletor-quantidade text-center' value='0' min='1'>");
            echo("<button class='btn btn-success add-to-cart-button'>Adicionar <i class='fa-solid fa-cart-plus'></i></button>");
            echo("</div>");
            echo("</div>");
            echo("</div>");
            echo("</div>");
            
            // Incrementar a contagem de cards
            $count++;
          }
          echo("</div>"); // Fechar a última linha de cards
                
          
        }
        echo("</div>");
        echo("</div>");
        echo("</section>");
      }
    }
      ?>
<!-- Início dos Múltiplos Modais Bootstrap: Resumo do Pedido e Gravar Pedido -->
<!-- Modal do resumo do carrinho -->
<div class="modal fade" id="resumoCarrinhoModal" aria-hidden="true" aria-labelledby="resumoCarrinhoModalLabel" tabindex="-1">
  <div class="modal-dialog modal-lg modal-dialog-centered modal-dialog-scrollable">
    <div class="modal-content bg-white">
      <div class="modal-header d-block  text-white p-0 m-0">
        <!-- Cabeçalho do Modal -->
        <div class="row background-vermelho">
          <div class="col-12 d-flex justify-content-betweem align-items-center ">
            <h5 class="modal-title fs-4 ps-3" id="resumoCarrinhoModalLabel">Resumo do Carrinho</h5>
            <button type="button" class="btn-close me-3" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
        </div>
        <div class="row bg-white">
          <div class="col-12 ms-3 me-3 mt-3">
            <p class='color-text-cinza'>Antes de finalizar, <strong>informe seu nome e um e-mail</strong> para a identificação do seu pedido.</p>
          </div>
          <!-- Início do Formulário -->
          <form id="form-cliente" action="registrar_pedido.php" method="post">
            <div class="row">
              <div class="container">
                <input class="form-control" type="hidden" name="id_mesa" id="id_mesa" value="<?php echo $id_mesa; ?>">
                <input class="form-control" type="hidden" name="numero_fisico" id="numero_fisico" value="<?php echo $row_mesa['numero_fisico']; ?>">
              </div>
            </div>
            <div class="form-floating d-flex justify-content-center mb-3">
              <input type="text" name="nome" class="form-control" style='width:95%' id="nome" required placeholder="Nome do Cliente">
              <label for="floatingInput"><h6 class="color-text-cinza bg-transparent ps-4">Nome</h6></label>
            </div>
            <div class="form-floating d-flex justify-content-center mb-3">
              <input type="email" name="email" class="form-control" style='width:95%' id="email" required placeholder="exemplo@servidor.com.br" >
              <label for="floatingInput"><h6 class="color-text-cinza bg-transparent ps-4">Email</h6></label>
            </div>
          </div>
        </div>
        <div class="modal-body">
          <!-- Conteúdo do resumo do carrinho -->
          <!-- Tabela de resumo do carrinho -->
          <table id="tabela-carrinho" width=100%>
            <thead>
              <tr>
                <th>Id_item</th>
                <th>Item</th>
                <th>Quantidade</th>
                <th>Preço</th>
              </tr>
            </thead>
            <!-- Os itens do carrinho serão adicionados dinamicamente aqui -->
          </table>
        </div>
        <div class="modal-footer container-fluid">
          <div class="container">
            <!-- Campo para observacao-pedido -->
            <div class="form-floating pt-2 pb-2">
              <textarea class="form-control" name="observacao-pedido" id="observacao-pedido" placeholder="Ex.: Sem cebola" rows="3"></textarea>
              <label for="observacao-pedido"><h6 class="color-text-cinza">Observação:</h6></label>
            </div>
            <input type="hidden" name="id_pedido" id="id_pedido" value="">
            <input type="hidden" name="itens_carrinho" id="itens_carrinho" value="">
          </form>
          <!-- Fim do Formulário -->
          <div class="row d-flex justify-content-between align-itens-center">
            <div class="col-7 color-text-cinza"><h5 class="m-0 p-0">Total do Pedido: </h5><strong class="color-text-cinza fs-4 m-0 p-0 total-pedido-modal">R$ 0,00</strong></div>
            <div class="col-5 text-end p-0 m-0">
              <button type="button" class="btn btn-outline-success" data-bs-dismiss="modal">Continuar Comprando</button>
              <button type="submit" id="finalizar-gravar-pedido" class="btn btn-danger">Finalizar</button>
              <!-- <button type="button" class="btn btn-danger" data-bs-target="#finalizarPedidoModal" data-bs-toggle="modal">Finalizar</button> -->
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div><!--Fim do Resumo do Carrinho-->
<!-- Início do Modal de Confirmação do Pedido -->
<div class="modal" id="modalPedidoSucesso" aria-hidden="true" aria-labelledby="modalPedidoSucessoLabel" tabindex="-1">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header background-vermelho">
        <h5 class="modal-title text-white">Pedido registrado com sucesso!</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <p class="text-center"><img src="../assets/img/cozinheiro.png" alt="Cozinheiro" width=80px></p>
        <p class='lead color-text-cinza fw-bolder text-center'>Seu pedido foi enviado com sucesso!!!</p> 
        <p class='text-center'>Agora, relaxa e deixa o resto com a gente!</p>
      </div>
    </div>
  </div>
</div>
<!-- Fim do Modal de Confirmação do Pedido -->

</main>

  <footer class="container-fluid bg-rodapé-cinza pt-5 pb-5 suporte">
    <div class="container pb-5">
      <div class="row">
        <div class="col-lg-6 col-12 text-lg-start text-center">
          <img src="../assets/img/Logo-Horizontal-Branca.svg" alt="">
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
    <div class="container-fluid background-vermelho-dark fixed-bottom pt-2 pb-2">
      <div class="row">
        <div class="col-12 ">
          <div class="row d-flex justify-content-center">
            <div class="col-lg-2 col-12 d-flex align-items-center text-lg-start text-center ps-lg-5 ps-3" >
              <h1 class="text-white">Mesa <?php echo $row_mesa['numero_fisico'] ?></h1>
            </div>
            <div class="col-lg-10 col-12 d-flex justify-content-around align-items-center text-center text-lg-center">
              <h4 class="text-white m-0">Total do Pedido:</h4>
              <div class="m-0">
                <strong class="text-white fs-4 m-0 p-0 total-pedido">R$ 0,00</strong><small class="text-white m-0 quantidade-itens"> /0 itens</small>
              </div>
              <div>
                <button class="btn bg-success text-white m-0" data-bs-toggle="modal" data-bs-target="#resumoCarrinhoModal"><i class="fa-solid fa-receipt"></i><small class="d-lg-block d-none"> Ver Pedido</small></button>
                <button class="btn limpar-button bg-dark text-white m-0"><i class="fa-solid fa-trash-can"></i><small class="d-lg-block d-none"> Limpar</small></button>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </footer>
  <script src="../assets/js/jquery.min.js"></script>
  <script src="../assets/js/2.cardapio.js"></script>
  <script src="../assets/js/bootstrap.bundle.min.js"></script>
  <script src="https://kit.fontawesome.com/3f863ead0e.js" crossorigin="anonymous"></script>
</body>
</html>