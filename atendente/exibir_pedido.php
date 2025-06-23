<?php
function conectar() {
    // Tratando Exceções com Try/Catch
    try {
        $conn = new PDO("mysql:host=localhost;dbname=cardapio_facil", "root", ""); // Variável de Conexão
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); // Define o modo de erro para lançar exceções
        return $conn; // Retorna a variável de conexão se a conexão for bem-sucedida
    } catch (PDOException $e) {
        echo "Erro: " . $e->getCode() . " - ";
        echo $e->getMessage();
        return null; // Retorna null se a conexão falhar
    }
}

// Teste se a conexão foi bem-sucedida
$conn = conectar();
if ($conn) {
    echo "";
} else {
    echo "Falha na conexão!";
}

// Consulta os pedidos na tabela de pedidos
$sql = "SELECT * FROM pedido";
$resultado = $conn->query($sql);

// Loop através dos resultados e exibe cada pedido em uma linha da tabela
while ($pedido = $resultado->fetch(PDO::FETCH_ASSOC)) {
    // Consulta o nome do cliente usando a chave estrangeira id_cliente_fk
    // Preparar a consulta SQL com um placeholder para o valor da chave estrangeira
    $sql_cliente = "SELECT nome FROM cliente WHERE id_cliente = :id_cliente";

    // Preparar a declaração SQL
    $stmt_cliente = $conn->prepare($sql_cliente);

    // Vincular o valor da chave estrangeira ao placeholder na declaração SQL
    $stmt_cliente->bindValue(':id_cliente', $pedido['id_cliente_fk'], PDO::PARAM_INT);

    // Executar a declaração SQL
    $stmt_cliente->execute();

    // Verificar se a consulta foi bem-sucedida
    if ($stmt_cliente) {
        // Buscar o resultado
        $cliente = $stmt_cliente->fetch(PDO::FETCH_ASSOC);

        // Verificar se $pedido['id_mesa_fk'] não é um booleano
        if (!is_bool($pedido['id_mesa_fk'])) {
            // Atribuir o valor da mesa apenas se não for um booleano
            echo "<script>
                    document.getElementById('nomeMesa1').value = '{$pedido['id_mesa_fk']}';
                  </script>";
        }
        
      // Verificar se a consulta foi bem-sucedida e se $cliente['nome'] é um valor válido
if ($stmt_cliente && isset($cliente['nome'])) {
    // Atribuir os valores dos pedidos e informações do cliente aos campos HTML correspondentes
    echo "<script>
            document.getElementById('nomeCliente1').value = '{$cliente['nome']}';
            document.getElementById('bebidaPedido1').value = '{$pedido['bebida']}';
            document.getElementById('sanduichePedido1').value = '{$pedido['lanche']}';
            document.getElementById('descricaoPedido1').value = '{$pedido['descricao']}';
          </script>";
} else {
    // Se a consulta falhou ou $cliente['nome'] não é válido, exibir uma mensagem de erro ou lidar com a situação de outra forma
    echo "Erro ao buscar o nome do cliente.";
}

}
}
?>
