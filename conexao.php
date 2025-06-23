<?php
//CRIANDO A CONEXÃO COM O BANCO DE DADOS UTILIZANDO A API PDO
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
?>