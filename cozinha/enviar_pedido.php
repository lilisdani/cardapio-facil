<?php
// Aqui você pode adicionar código para atualizar o estado do pedido no banco de dados para "em execução"
// Por exemplo, você pode usar SQL para atualizar o estado do pedido na tabela de pedidos

// Após atualizar o estado do pedido, você pode enviar uma resposta de confirmação
echo "Pedido iniciado com sucesso!";
?>
<?php
function conectar() {
    // Tratando Exceções com Try/Catch
    try {
        $conn = new PDO("mysql:host=localhost;dbname=cardapio_facil", "root", ""); // Variável de Conexão
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
    echo "Conexão bem-sucedida!";
} else {
    echo "Falha na conexão!";
}
?>
