// 1. Carrinho de Pedidos: Manipulação de Itens do Carrinho

// Variável para armazenar os itens do carrinho
let itensCarrinho = [];
// Variável para armazenar o total do pedido
let totalPedido = 0;
// Variável para armazenar a quantidade de itens no carrinho
let quantidadeItens = 0;

// Função para carregar o carrinho do localStorage
function carregarCarrinhoDoLocalStorage() {
  const carrinhoSalvo = localStorage.getItem("carrinho");
  if (carrinhoSalvo) {
    return JSON.parse(carrinhoSalvo);
  } else {
    return [];
  }
}

// Função para salvar o carrinho no localStorage
function salvarCarrinhoNoLocalStorage(carrinho) {
  localStorage.setItem("carrinho", JSON.stringify(carrinho));
}

// Função para adicionar um item ao carrinho
function adicionarAoCarrinho(botao) {
  // Obter o nome, preço e ID do item a partir do botão clicado
  const nomeItem =
    botao.parentElement.parentElement.querySelector(".card-title").textContent;
  const idItemPedido =
    botao.parentElement.parentElement.querySelector(".id_item").textContent; // Adicionado para obter o ID do item
  const precoItem = parseFloat(
    botao.parentElement.parentElement
      .querySelector(".text-danger")
      .textContent.slice(3)
  );

  // Obter a quantidade selecionada
  const quantidadeSelecionada = parseInt(
    botao.parentElement.parentElement.querySelector(".quantity-selector").value
  );

  // Verificar se a quantidade selecionada é válida
  if (quantidadeSelecionada <= 0 || isNaN(quantidadeSelecionada)) {
    alert("Selecione uma quantidade válida.");
    return;
  }

  // Adicionar o item ao array de itens do carrinho
  const item = {
    idItem: idItemPedido,
    nome: nomeItem,
    preco: precoItem,
    quantidade: quantidadeSelecionada,
  }; // Modificado para incluir idItem
  itensCarrinho.push(item);

  // Salvar o carrinho atualizado no localStorage
  salvarCarrinhoNoLocalStorage(itensCarrinho);

  // Adicionar o preço do item ao total do pedido
  totalPedido += precoItem * quantidadeSelecionada;
  // Incrementar a quantidade de itens no carrinho
  quantidadeItens += quantidadeSelecionada;

  // Atualizar o texto do total do pedido no footer do modal
  const totalPedidoFooterElement = document.querySelector(
    ".total-pedido-modal"
  );
  totalPedidoFooterElement.textContent = `R$ ${totalPedido.toFixed(2)}`;

  // Atualizar o texto do total do pedido no resumo do carrinho
  const totalPedidoElement = document.querySelector(".total-pedido");
  totalPedidoElement.textContent = `R$ ${totalPedido.toFixed(2)}`;

  // Atualizar o texto da quantidade de itens
  const quantidadeItensElement = document.querySelector(".quantidade-itens");
  quantidadeItensElement.textContent = `/ ${quantidadeItens} itens`;

  // mostrarItensDoCarrinho();
}

// Função para mostrar uma pop-up com os itens do carrinho em uma tabela
// function mostrarItensDoCarrinho() {
//     // Criar uma tabela HTML para os itens do carrinho
//     var tabela = "<table border='1'><tr><th>Id_item</th><th>nomeItem</th><th>precoItem</th><th>quantidade</th></tr>";

//     // Iterar sobre os itens do carrinho e adicionar cada um à tabela
//     for (var i = 0; i < item.length; i++) {
//         tabela += "<tr>";
//         tabela += "<td>" + item[i].idItemPedido + "</td>";
//         tabela += "<td>" + item[i].nomeItem + "</td>";
//         tabela += "<td>" + item[i].precoItem + "</td>";
//         tabela += "<td>" + item[i].quantidadeSelecionada + "</td>";
//         tabela += "</tr>";
//     }

//     // Fechar a tabela HTML
//     tabela += "</table>";

//     // Mostrar a pop-up com a tabela de itens do carrinho
//     alert(tabela);
// }

// Função para limpar o carrinho
function limparCarrinho() {
  // Limpar o carrinho
  itensCarrinho.length = 0;

  // Resetar o total do pedido e a quantidade de itens
  totalPedido = 0;
  quantidadeItens = 0;

  // Salvar o carrinho vazio no localStorage
  salvarCarrinhoNoLocalStorage([]);

  // Atualizar o texto do total do pedido no footer do modal
  const totalPedidoFooterElement = document.querySelector(
    ".total-pedido-modal"
  );
  totalPedidoFooterElement.textContent = `R$ ${totalPedido.toFixed(2)}`;

  // Atualizar o texto do total do pedido no resumo do carrinho
  const totalPedidoElement = document.querySelector(".total-pedido");
  totalPedidoElement.textContent = `R$ ${totalPedido.toFixed(2)}`;

  // Atualizar o texto da quantidade de itens
  const quantidadeItensElement = document.querySelector(".quantidade-itens");
  quantidadeItensElement.textContent = "/0 itens";
}

// Carregar o carrinho do localStorage quando a página é carregada
document.addEventListener("DOMContentLoaded", () => {
  itensCarrinho = carregarCarrinhoDoLocalStorage();
  // Atualizar o resumo do carrinho
  atualizarResumoCarrinho();
});

// Evento de clique no botão de adicionar
const botoesAdicionar = document.querySelectorAll(".add-to-cart-button");
botoesAdicionar.forEach((botao) => {
  botao.addEventListener("click", () => {
    adicionarAoCarrinho(botao);
  });
});

// Evento de clique no botão de limpar
const botaoLimpar = document.querySelector(".limpar-button");
botaoLimpar.addEventListener("click", limparCarrinho);

// 2. Pedido: Manipulação e Gravação dos itens do carrinho em um Pedido

// Função para atualizar o resumo do carrinho
function atualizarResumoCarrinho() {
  // Limpar a lista de itens do carrinho
  document.getElementById("tabela-carrinho").innerHTML = "";

  // Variável para armazenar a quantidade total de itens
  let quantidadeTotal = 0;

  // Adicionar cabeçalho da tabela se não estiver presente
  let thead = document.querySelector("#tabela-carrinho thead");
  if (!thead) {
    thead = document.createElement("thead");
    thead.innerHTML = `
        <tr>
            <th><p class='color-text-cinza text-center p-0 m-0'>Id_item</p></th>
            <th><p class='color-text-cinza fw-bolder ps-3 m-0'>Item</p></th>
            <th><p class='color-text-cinza text-center p-0 m-0'>Quant</p></th>
            <th><p class='color-text-cinza text-start p-0 m-0'>Preço</p></th>
            <th><p class='color-text-cinza text-center p-0 m-0'>Ações</p></th>
        </tr>
    `;
    document.getElementById("tabela-carrinho").prepend(thead);
  }

  // Verificar se o tbody existe, se não, criá-lo
  let tbody = document.querySelector("#tabela-carrinho tbody");
  if (!tbody) {
    tbody = document.createElement("tbody");
    document.getElementById("tabela-carrinho").appendChild(tbody);
  }

  // Adicionar cada item do carrinho ao modal
  itensCarrinho.forEach((item, index) => {
    const tr = document.createElement("tr"); // Criar uma linha de tabela ao invés de um item de lista
    if (index % 2 === 0) {
      // Verificar se o índice é par
      tr.style.backgroundColor = "#f2f2f2"; // Adicionar background cinza claro a cada dois itens
    }
    tr.innerHTML = `
        <td><p class='color-text-cinza text-center fw-bolder p-0 m-0'>${
          item.idItem
        }</p></td>
        <td><p class='color-text-cinza fw-bolder ps-3 m-0'>${item.nome}</p></td>
        <td><p class='color-text-cinza text-center p-0 m-0'>${
          item.quantidade
        }</p></td>
        <td><p class='color-text-cinza p-0 m-0'>${item.preco.toLocaleString(
          "pt-BR",
          { minimumFractionDigits: 2, maximumFractionDigits: 2 }
        )}</p></td>
        <td>
            <!-- Botões para aumentar/diminuir quantidade, excluir item -->
            <div class='text-end'>
                <button class="btn btn-outline-secondary color-text-cinza btn-sm mx-1 aumentar"><i class="fa-solid fa-circle-plus aumentar"></i></button>
                <button class="btn btn-outline-secondary color-text-cinza btn-sm mx-1 diminuir"><i class="fa-solid fa-circle-minus diminuir"></i></button>
                <button class="btn btn-outline-danger btn-sm mx-1 excluir"><i class="fa-solid fa-trash-can excluir"></i></button>
            </div>
        </td>
    `;

    // Adicionar a linha à tabela (dentro do tbody)
    tbody.appendChild(tr);
    // Adicionar a quantidade do item à quantidade total
    quantidadeTotal += item.quantidade;
  });

  // Atualizar o texto da quantidade de itens no carrinho
  const quantidadeItensElement = document.querySelector(".quantidade-itens");
  quantidadeItensElement.textContent = `/ ${quantidadeTotal} itens`;

  // Recalcular o total do pedido após a atualização do carrinho
  totalPedido = itensCarrinho.reduce(
    (total, item) => total + item.preco * item.quantidade,
    0
  );

  // Atualizar o texto do total do pedido
  const totalPedidoModalElement = document.querySelector(".total-pedido-modal");
  totalPedidoModalElement.textContent = `R$ ${totalPedido.toFixed(2)}`;

  // Atualizar o texto do total do pedido
  const totalPedidoElement = document.querySelector(".total-pedido");
  totalPedidoElement.textContent = `R$ ${totalPedido.toFixed(2)}`;
}

// Chame a função para exibir o resumo do carrinho quando o modal for mostrado
$("#resumoCarrinhoModal").on("show.bs.modal", function (e) {
  atualizarResumoCarrinho();
});

// Manipulador de eventos para aumentar quantidade
document
  .getElementById("tabela-carrinho")
  .addEventListener("click", function (e) {
    if (e.target.classList.contains("aumentar")) {
      const itemIndex = [...e.target.closest("tr").parentNode.children].indexOf(
        e.target.closest("tr")
      );
      itensCarrinho[itemIndex].quantidade++;
      atualizarResumoCarrinho();
    }
  });

// Manipulador de eventos para diminuir quantidade
document
  .getElementById("tabela-carrinho")
  .addEventListener("click", function (e) {
    if (e.target.classList.contains("diminuir")) {
      const itemIndex = [...e.target.closest("tr").parentNode.children].indexOf(
        e.target.closest("tr")
      );
      if (itensCarrinho[itemIndex].quantidade > 1) {
        itensCarrinho[itemIndex].quantidade--;
        atualizarResumoCarrinho();
      }
    }
  });

// Manipulador de eventos para excluir item
document
  .getElementById("tabela-carrinho")
  .addEventListener("click", function (e) {
    if (e.target.classList.contains("excluir")) {
      const itemIndex = [...e.target.closest("tbody").children].indexOf(
        e.target.closest("tr")
      ); // Obter o índice do item na lista de itens do carrinho
      itensCarrinho.splice(itemIndex, 1);
      atualizarResumoCarrinho();
      salvarCarrinhoNoLocalStorage(itensCarrinho); // Salvar o carrinho atualizado no localStorage
    }
  });

// Função para preparar os dados do pedido e preencher os campos ocultos do formulário
function prepararDadosDoPedido() {
  const observacaoPedido = $("#observacao-pedido").val();
  const idMesa = $("#id_mesa").val();
  const numeroFisico = $("#numero_fisico").val();

  // Preencher o campo oculto 'itens_carrinho' com os itens do carrinho em formato JSON
  $("#itens_carrinho").val(JSON.stringify(itensCarrinho));

  // Outras informações podem ser adicionadas conforme necessário

  // Exemplo de preenchimento do campo observacao-pedido
  $("#observacao-pedido").val(observacaoPedido);

  // Exemplo de preenchimento do campo id_mesa
  $("#id_mesa").val(idMesa);

  // Exemplo de preenchimento do campo numero_fisico
  $("#numero_fisico").val(numeroFisico);
}

// Evento de envio do formulário
document.addEventListener("DOMContentLoaded", function () {
  // Função para finalizar e gravar o pedido
  function finalizarGravarPedido() {
    // Verificar se há itens no carrinho
    if (itensCarrinho.length === 0) {
      alert("Erro: Nenhum item no carrinho.");
      return;
    }

    // Preparar os dados do pedido
    prepararDadosDoPedido();

    // Submeter o formulário ao servidor
    document.getElementById("form-cliente").submit();
  }

  // Adiciona o evento de clique ao botão "Finalizar"
  document
    .getElementById("finalizar-gravar-pedido")
    .addEventListener("click", finalizarGravarPedido);
});

// // Função para limpar o carrinho e a memória local
// function limparCarrinhoEMemoriaLocal() {
//   // Limpar o carrinho na página
//   itensCarrinho = [];
//   atualizarResumoCarrinho(); // Se necessário
//   // Limpar o carrinho na memória local
//   localStorage.removeItem("carrinho");
// }

// Verificar se o parâmetro pedido_sucesso está presente na URL
const urlParams = new URLSearchParams(window.location.search);
if (
  urlParams.has("pedido_sucesso") &&
  urlParams.get("pedido_sucesso") === "true"
) {
  // Mostrar um modal com a mensagem "Pedido registrado com sucesso!"
  $(document).ready(function () {
    $("#modalPedidoSucesso").modal("show");
    limparCarrinho();
  });
}
