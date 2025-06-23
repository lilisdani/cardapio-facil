// Função para alterar a quantidade de um item
function alterarQuantidade(btn, inputId, incremento) {
    var input = document.getElementById(inputId);
    var novaQuantidade = parseInt(input.value) + incremento;
    if (novaQuantidade >= 0) {
        input.value = novaQuantidade;
        atualizarCarrinho(); // Chama a função para atualizar o carrinho após a mudança de quantidade
    }
}

// Função para atualizar o carrinho
function atualizarCarrinho() {
    var total = 0;
    var inputsQuantidade = document.querySelectorAll('input[name="quantity"]');
    var itensCarrinho = document.getElementById('itens-carrinho');

    itensCarrinho.innerHTML = '';

    inputsQuantidade.forEach(function(input) {
        var precoUnitario = parseFloat(input.parentNode.parentNode.querySelector('.text-center > div > span').innerText.replace('R$', ''));
        var quantidade = parseInt(input.value);
        var subtotal = precoUnitario * quantidade;
        total += subtotal;

        // Obter o nome do item
        var nomeItem = input.parentNode.parentNode.querySelector('.fw-bolder').innerText.trim();
        
        // Verificar se a quantidade é válida
        if (!isNaN(quantidade)) {
            var linhaItem = document.createElement('div');
            linhaItem.innerHTML = `<p>Nome do Item: ${nomeItem}</p>
                                   <p>Preço Unitário: R$${precoUnitario.toFixed(2)}</p>
                                   <p>Quantidade: ${quantidade}</p>
                                   <p>Subtotal: R$${subtotal.toFixed(2)}</p>`;
            itensCarrinho.appendChild(linhaItem);
        }
    });

    // Atualizar o valor total na página
    document.getElementById('valor-total-numero').innerText = total.toFixed(2);
}


// Função para atualizar a quantidade de itens no carrinho
function atualizarQuantidadeItensCarrinho(quantidade) {
    var spanQuantidade = document.getElementById('quantidade-itens-carrinho');
    spanQuantidade.innerText = quantidade;
}

atualizarQuantidadeItensCarrinho(0); // Atualize com a quantidade real de itens no carrinho



