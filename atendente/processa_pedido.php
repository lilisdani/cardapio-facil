<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Atendente</title>
    <style>
        /* Estilos para a seção do cliente */
.cliente_um {
    margin-bottom: 20px;
    border: 1px solid #ccc;
    padding: 20px;
    border-radius: 5px;
}

/* Estilos para o cronômetro */
.cronometro {
    font-size: 24px;
    margin-bottom: 10px;
    position:relative;
    
}

/* Estilos para a notificação da cozinha */
.notificacaoCozinha {
    display: flex;
    align-items: right;
    margin-bottom: 10px;
    margin-right: 10px;
}

.contadorNotificacoes {
    background-color: #ff0000;
    color: #fff;
    padding: 5px 10px;
    border-radius: 50%;
    margin-right: 10px;
  
}

.textoNotificacao {
    flex-grow: 1;
}

.sino svg {
    width: 20px;
    height: 20px;
    fill: #000;
    margin-right: 10px;
}

/* Estilos para o pedido */
.pedido {
    margin-bottom: 10px;
}

.pedido h2 {
    font-size: 20px;
    margin-bottom: 10px;
}

.pedido label {
    display: block;
    margin-bottom: 5px;
}

.pedido input {
    width: 100%;
    padding: 8px;
    border: 1px solid #ccc;
    border-radius: 5px;
    margin-bottom: 10px;
}

/* Estilos para o botão de enviar pedido */
button[type="submit"] {
    background-color: #007bff;
    color: #fff;
    border: none;
    padding: 10px 20px;
    border-radius: 5px;
    cursor: pointer;
}

button[type="submit"]:hover {
    background-color: #0056b3;
}

    </style>
</head>
<body>
    <h1>Pedidos Pendentes</h1>
    <?php
// Verificar se foi recebido o ID do pedido via GET
if(isset($_GET['id_pedido'])) {
    $id_pedido = $_GET['id_pedido'];
    // Aqui você pode receber os outros dados do pedido, como nome do cliente, número da mesa, lanche, bebida e descrição
    $nome_cliente = $_GET['nome_cliente'];
    $Numero_mesa = $_GET['Numero_mesa'];
    $lanche = $_GET['lanche'];
    $bebida = $_GET['bebida'];
    $descricao = $_GET['descricao'];

    // Conexão com o banco de dados
    $conn = new mysqli("localhost", "root", "", "cardapio_facil");

    // Verificar a conexão
    if ($conn->connect_error) {
        die("Erro na conexão com o banco de dados: " . $conn->connect_error);
    }

    // Agora você pode usar os dados do pedido recebidos aqui para processá-los conforme necessário
    // Por exemplo, você pode inserir esses dados em uma tabela no banco de dados ou realizar outras operações com eles

    // Após processar os dados, você pode redirecionar para outra página ou fazer qualquer outra ação necessária
    // Redirecionar de volta para a página do atendente ou para outra página
    header("Location: ../atendente/index_atendente.php");
    exit();
} else {
    // Se não foi recebido o ID do pedido, exibir uma mensagem de erro ou redirecionar para uma página de erro
    echo "Erro: ID do pedido não recebido.";
}
?>


</body>
</html>


