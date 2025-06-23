
<head>
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

<script>
    // Função para enviar o pedido para a cozinha
    function enviarPedido(idPedido) {
        // Enviar uma requisição assíncrona para o servidor
        var xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                // Exibir uma mensagem de confirmação ou fazer alguma ação adicional
                alert("Pedido enviado para a cozinha com sucesso!");
            }
        };
        xhttp.open("POST", "enviar_pedido.php", true);
        xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        xhttp.send("id_pedido=" + idPedido);
    }
</script>



<?php
// Conexão com o banco de dados
$conn = new mysqli("localhost", "root", "", "cardapio_facil");

// Verificar a conexão
if ($conn->connect_error) {
    die("Erro na conexão com o banco de dados: " . $conn->connect_error);
}

// Consulta para selecionar todos os registros da tabela "pedido"
$sql = "SELECT * FROM pedido";
$result = $conn->query($sql);

// Verificar se existem registros na tabela
if ($result->num_rows > 0) {
    // Loop para exibir os 5 primeiros registros
    $count = 0;
    while($row = $result->fetch_assoc()) {
        // Incrementar o contador
        $count++;
?>
        <section id="cliente<?php echo $row['id_pedido']; ?>" class="cliente_um">
            <div class="cronometro" id="cronometro<?php echo $row['id_pedido']; ?>">00:00:00</div>
            <div class="notificacaoCozinha">
                <span class="contadorNotificacoes" id="contadorNotificacoes<?php echo $row['id_pedido']; ?>"></span>
                <span class="textoNotificacao" id="textoNotificacao<?php echo $row['id_pedido']; ?>"></span>
                <div class="sino">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512">
                        <path d="M224 0c-17.7 0-32 14.3-32 32V51.2C119 66 64 130.6 64 208v18.8c0 47-17.3 92.4-48.5 127.6l-7.4 8.3c-8.4 9.4-10.4 22.9-5.3 34.4S19.4 416 32 416H416c12.6 0 24-7.4 29.2-18.9s3.1-25-5.3-34.4l-7.4-8.3C401.3 319.2 384 273.9 384 226.8V208c0-77.4-55-142-128-156.8V32c0-17.7-14.3-32-32-32zm45.3 493.3c12-12 18.7-28.3 18.7-45.3H224 160c0 17 6.7 33.3 18.7 45.3s28.3 18.7 45.3 18.7s33.3-6.7 45.3-18.7z"/>
                    </svg>
                </div>
            </div>

            <div class="pedido">
    <h2>Pedido <?php echo $row['id_pedido']; ?></h2>
    <label for="nome_cliente<?php echo $row['id_pedido']; ?>">Nome do Cliente:</label>
    <input type="text" id="nome_cliente<?php echo $row['id_pedido']; ?>" name="nome_cliente<?php echo $row['id_pedido']; ?>" value="<?php echo $row['nome_cliente']; ?>">
    <label for="Numero_mesa<?php echo $row['id_pedido']; ?>">Número da Mesa:</label>
    <input type="text" id="Numero_mesa<?php echo $row['id_pedido']; ?>" name="Numero_mesa<?php echo $row['id_pedido']; ?>" value="<?php echo $row['Numero_mesa']; ?>">
    
    <label for="lanche<?php echo $row['id_pedido']; ?>">Pedido:</label>
    <input type="text" id="lanche<?php echo $row['id_pedido']; ?>" name="lanche<?php echo $row['id_pedido']; ?>" value="<?php echo $row['lanche']; ?>">
    
    <label for="bebida<?php echo $row['id_pedido']; ?>">Bebida:</label>
    <input type="text" id="bebida<?php echo $row['id_pedido']; ?>" name="bebida<?php echo $row['id_pedido']; ?>" value="<?php echo $row['bebida']; ?>">
     
    <label for="bebida<?php echo $row['id_pedido']; ?>">Descrição Pedido:</label>
    <input type="text" id="descricao<?php echo $row['id_pedido']; ?>" name="descricao<?php echo $row['id_pedido']; ?>" value="<?php echo $row['descricao']; ?>">

    
</div>
<button type="button" onclick="enviarPedido(<?php echo $row['id_pedido']; ?>)">Enviar Pedido</button>
            
        </section>
<?php  
       if (isset($array['chave'])) {
        // Faça algo com $array['chave']
    } else {
        // Lide com o caso em que a chave não está definida
    }

        // Verificar se já foram exibidos 5 pedidos
        if ($count >= 6) {
            break;
        }
    }
} else {
    echo "Não há pedidos.";
}

// Fechar a conexão com o banco de dados
$conn->close();
?>





