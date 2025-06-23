<?php
session_start(); //Iniciando a sessão

function conectar() {
    // Tratando Exceções com Try/Catch
    try {
        $conn = new PDO("mysql:host=localhost;dbname=iokimd23_cardapio_facil", "iokimd23_admin_cardapio", 'L$S.Mu3(zUDZ'); // Variável de Conexão
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

// Verificar se o formulário foi submetido
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Receber os dados do formulário
    $cpf = $_POST["cpf"];
    $senha = $_POST["senha"];

    // Conectar ao banco de dados
    $conn = conectar();
   
    // Verificar a conexão
    if (!$conn) {
        die("Erro de conexão!");
    }

    // Consultar as tabelas para encontrar o usuário
    $query = "SELECT * FROM administrador WHERE cpf = '$cpf' AND senha = '$senha'";
    $result_admin = $conn->query($query);

    $query = "SELECT * FROM administrador_sistema WHERE cpf = '$cpf' AND senha = '$senha'";
    $result_admin_sistema = $conn->query($query);

    $query = "SELECT * FROM atendente WHERE cpf = '$cpf' AND senha = '$senha'";
    $result_atendente = $conn->query($query);

    $query = "SELECT * FROM caixa WHERE cpf = '$cpf' AND senha = '$senha'";
    $result_caixa = $conn->query($query);

    $query = "SELECT * FROM cozinha WHERE cpf = '$cpf' AND senha = '$senha'";
    $result_cozinha = $conn->query($query);

    // Verificar se há correspondências e determinar o tipo de usuário
    if ($result_admin->rowCount() > 0) {
        // Usuário encontrado na tabela administrador
        $_SESSION['usuario']=$cpf;
        header("Location:../painel_adm/dashboard.php"); // Redirecionar para a interface do administrador
        exit();
    } elseif ($result_admin_sistema->rowCount() > 0) {
        // Usuário encontrado na tabela administrador_sistema
        header("Location: interface_admin_sistema.php"); // Redirecionar para a interface do administrador do sistema
        exit();
    } elseif ($result_atendente->rowCount() > 0) {
        // Usuário encontrado na tabela atendente
        header("Location:../atendente/index_atendente.html"); // Redirecionar para a interface do atendente
        exit();
    } elseif ($result_caixa->rowCount() > 0) {
        // Usuário encontrado na tabela caixa
        header("Location:../caixa/index_caixa.html"); // Redirecionar para a interface do caixa
        exit();
    } elseif ($result_cozinha->rowCount() > 0) {
        // Usuário encontrado na tabela cozinha
        header("Location:../cozinha/index_cozinha.php"); // Redirecionar para a interface da cozinha
        exit();
    } else {
        // Usuário não encontrado, exibir mensagem de erro
        echo "CPF ou senha incorretos. Por favor, tente novamente.";
    }

    // Fechar conexão com o banco de dados
    $conn = null;
}
?>
