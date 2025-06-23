<<<<<<< Updated upstream
<?php
// Simulação de dados do pedido recebido do cliente
$pedido_cliente = array(
    "cliente" => "Eliane Pereira Daniel",
    "mesa" => "Mesa 05",
    "pedido" => "X-Caboquinho c/ Queijo Banana",
    "quantidade" => 2
);

// Etapa 1: Cliente envia o pedido para o atendente
//  apenas passando os dados do pedido para o atendente
$pedido_atendente = $pedido_cliente;

// Etapa 2: Atendente envia o pedido para a cozinha
//  apenas passando os dados do pedido para a cozinha
$pedido_cozinha = $pedido_atendente;

// Etapa 3: Cozinha inicia a preparação e notifica o atendente e o cliente
$preparo_iniciado = true;
if ($preparo_iniciado) {
    // Simulando uma notificação para o atendente
    enviarNotificacao("O pedido de " . $pedido_cozinha['pedido'] . " foi iniciado.");

    // Simulando uma notificação para o cliente
    enviarNotificacaoCliente($pedido_cozinha['cliente'], "Seu pedido foi iniciado.");
}

// Etapa 4: Cozinha finaliza a preparação e notifica o atendente e o cliente
$preparo_finalizado = true;
if ($preparo_finalizado) {
    // Simulando uma notificação para o atendente
    enviarNotificacao("O pedido de " . $pedido_cozinha['pedido'] . " foi finalizado.");

    // Simulando uma notificação para o cliente
    enviarNotificacaoCliente($pedido_cozinha['cliente'], "Seu pedido está pronto.");
}

// Função para simular o envio de notificação para o atendente
function enviarNotificacao($mensagem) {
    echo "Notificação para o atendente: $mensagem<br>";
}

// Função para simular o envio de notificação para o cliente
function enviarNotificacaoCliente($cliente, $mensagem) {
    echo "Notificação para $cliente: $mensagem<br>";
}
?>
=======
<?php
// Simulação de dados do pedido recebido do cliente
$pedido_cliente = array(
    "cliente" => "Eliane Pereira Daniel",
    "mesa" => "Mesa 05",
    "pedido" => "X-Caboquinho c/ Queijo Banana",
    "quantidade" => 2
);

// Etapa 1: Cliente envia o pedido para o atendente
//  apenas passando os dados do pedido para o atendente

$pedido_atendente = $pedido_cliente;

// Etapa 2: Atendente envia o pedido para a cozinha
// apenas passando os dados do pedido para a cozinha
$pedido_cozinha = $pedido_atendente;

// Etapa 3: Cozinha inicia a preparação e notifica o atendente e o cliente
$preparo_iniciado = true;
if ($preparo_iniciado) {
    // Simulando uma notificação para o atendente
    enviarNotificacao("O pedido de " . $pedido_cozinha['pedido'] . " foi iniciado.");

    // Simulando uma notificação para o cliente
    enviarNotificacaoCliente($pedido_cozinha['cliente'], "Seu pedido foi iniciado.");
}

// Etapa 4: Cozinha finaliza a preparação e notifica o atendente e o cliente
$preparo_finalizado = true;
if ($preparo_finalizado) {
    // Simulando uma notificação para o atendente
    enviarNotificacao("O pedido de " . $pedido_cozinha['pedido'] . " foi finalizado.");

    // Simulando uma notificação para o cliente
    enviarNotificacaoCliente($pedido_cozinha['cliente'], "Seu pedido está pronto.");
}

// Função para simular o envio de notificação para o atendente
function enviarNotificacao($mensagem) {
    echo "Notificação para o atendente: $mensagem<br>";
}

// Função para simular o envio de notificação para o cliente
function enviarNotificacaoCliente($cliente, $mensagem) {
    echo "Notificação para $cliente: $mensagem<br>";
}
?>
>>>>>>> Stashed changes
