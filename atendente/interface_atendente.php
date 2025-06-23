<?php
    // Função para conectar ao banco de dados usando PDO
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


 // Consulta os pedidos pendentes
$sql = "SELECT * FROM pedido WHERE status = 'pendente'";
$resultado = $conn->query($sql);

// Verifica se há algum resultado
if ($resultado->rowCount() > 0) {
    // Exibe os pedidos pendentes em uma tabela
    echo "<h1>Pedidos Pendentes</h1>";
    echo "<table border='1'>
            <tr>
                <th>ID</th>
                <th>ID do Cliente</th>
                <th>ID da Mesa</th>
                <th>Bebida</th>
                <th>Lanche</th>
                <th>Descrição</th>
                <th>Status</th>
            </tr>";
    
    // Loop através dos resultados e exibe cada pedido em uma linha da tabela
    while ($pedido = $resultado->fetch(PDO::FETCH_ASSOC)) {
        echo "<tr>
                <td>{$pedido['id_pedido']}</td>
                <td>{$pedido['id_cliente_fk']}</td>
                <td>{$pedido['id_mesa_fk']}</td>
                <td>{$pedido['bebida']}</td>
                <td>{$pedido['lanche']}</td>
                <td>{$pedido['descricao']}</td>
                <td>{$pedido['status']}</td>
              </tr>";
    }
    
    echo "</table>";
} else {
    echo "Nenhum pedido pendente.";
}

// Fecha a conexão com o banco de dados
$conn = null;
?>









    ?>