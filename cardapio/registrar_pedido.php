<?php
session_start();
include("../conexao.php");
$conn = conectar();

$dados = filter_input_array(INPUT_POST, FILTER_DEFAULT);

if ($dados) {
    // Recuperar os dados básicos do pedido do formulário
    $nome_cliente = $dados['nome'];
    $email_cliente = $dados['email'];
    $observacoes = $dados['observacao-pedido'];
    $id_mesa = $dados['id_mesa'];
    $numero_mesa = $dados['numero_fisico'];
    
    // Codificar os itens do carrinho em JSON
    $id_pedido = $dados['id_pedido'];
    $itens_carrinho = json_decode($dados['itens_carrinho'], true);
    
    // Inserir os dados básicos do pedido na tabela 'pedido'
    $query_insert_pedido = "INSERT INTO pedido (estatus_entrega, nome_cliente, email_cliente, id_mesa_fk, numero_mesa, observacoes) VALUES (:estatus, :nome_cliente, :email_cliente, :id_mesa_fk, :numero_mesa, :observacoes)";
    $stmt_pedido = $conn->prepare($query_insert_pedido);
    $stmt_pedido->bindValue(':estatus', 'pendente', PDO::PARAM_STR);
    $stmt_pedido->bindParam(':nome_cliente', $nome_cliente);
    $stmt_pedido->bindParam(':email_cliente', $email_cliente);
    $stmt_pedido->bindParam(':id_mesa_fk', $id_mesa);
    $stmt_pedido->bindParam(':numero_mesa', $numero_mesa);
    $stmt_pedido->bindParam(':observacoes', $observacoes);
    $stmt_pedido->execute();
    
    // Verificar se o pedido foi inserido com sucesso
    if ($stmt_pedido->rowCount() > 0) {
        // Obter o ID do pedido recém-inserido
        $id_pedido = $conn->lastInsertId();
        
        // Iterar sobre os itens do carrinho
        foreach ($itens_carrinho as $item) {
            $id_item = $item['idItem'];
            $quantidade = $item['quantidade'];
    
            // Inserir o item na tabela 'item_pedido'
            $query_insert_item_pedido = "INSERT INTO item_pedido (id_pedido_fk, id_item_fk, quantidade) VALUES (:id_pedido_fk, :id_item_fk, :quantidade)";
            $stmt_insert_item_pedido = $conn->prepare($query_insert_item_pedido);
            $stmt_insert_item_pedido->bindParam(':id_pedido_fk', $id_pedido);
            $stmt_insert_item_pedido->bindParam(':id_item_fk', $id_item);
            $stmt_insert_item_pedido->bindParam(':quantidade', $quantidade);
            $stmt_insert_item_pedido->execute();
        }
    
        // Verificar se todos os itens foram inseridos com sucesso
        if ($stmt_insert_item_pedido->rowCount() > 0) {
            // Todos os itens do pedido foram salvos com sucesso
            // echo "Pedido registrado com sucesso!";
            // Chamar a função para limpar o carrinho e a memória local
            // echo "<script>limparCarrinhoEMemoriaLocal();</script>";
            // Redirecionar de volta para a página cardapio.php com a mensagem como parâmetro na URL
            header("Location: cardapio.php?id_mesa=$id_mesa&pedido_sucesso=true");
            exit();
        } else {
            // Ocorreu algum erro ao salvar os itens do pedido
            echo "Erro ao registrar os itens do pedido. Por favor, tente novamente.";
        }
    } else {
        // Ocorreu algum erro ao salvar o pedido
        echo "Erro ao registrar o pedido. Por favor, tente novamente.";
    }
} else {
    // Se os itens do carrinho não existirem na sessão ou não forem um array válido
    echo "Erro: Itens do carrinho não encontrados ou em um formato inválido.";
}

// Encerrar a conexão com o banco de dados
$conn = null;
?>
