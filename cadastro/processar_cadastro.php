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
    echo "";
} else {
    echo "Falha na conexão!";
}
?>
<?php
// Verifica se o formulário foi submetido
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Estabelece a conexão com o banco de dados
    $conn = conectar();

    // Verifica se a conexão foi bem-sucedida
    if ($conn) {
        // Recupera os dados do formulário
        $nome = $_POST["nome"];
        $email = $_POST["email"];
        $senha = $_POST["senha"];
        $cpf = $_POST["cpf"];
        $cargo = $_POST["cargo"];
    }
    if ($cargo === '1') {
        $sql = "INSERT INTO atendente (nome, email, senha, cpf, cargo) VALUES (:nome, :email, :senha, :cpf, :cargo)";
    } elseif ($cargo === '2') {
        $sql = "INSERT INTO caixa (nome, email, senha, cpf, cargo) VALUES (:nome, :email, :senha, :cpf, :cargo)";
    } elseif ($cargo === '3') {
        $sql = "INSERT INTO administrador (nome, email, senha, cpf, cargo) VALUES (:nome, :email, :senha, :cpf, :cargo)";
    } elseif ($cargo === '4') {
        $sql = "INSERT INTO administrador_sistema (nome, email, senha, cpf, cargo) VALUES (:nome, :email, :senha, :cpf, :cargo)";
    } elseif ($cargo === '5') {
        $sql = "INSERT INTO cozinha (nome, email, senha, cpf, cargo) VALUES (:nome, :email, :senha, :cpf, :cargo)";
    } else {
        echo "Cargo inválido";
        exit;
    }
    
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(":nome", $nome);
    $stmt->bindParam(":email", $email);
    $stmt->bindParam(":senha", $senha);
    $stmt->bindParam(":cpf", $cpf);
    $stmt->bindParam(":cargo", $cargo); // Aqui está usando o parâmetro correto ":cargo"
    $stmt->execute();
    
    if ($stmt->rowCount() > 0) {
        echo "Usuário cadastrado com sucesso!";
    } else {
        echo "Erro ao cadastrar usuário.";
    }
}    

?>
