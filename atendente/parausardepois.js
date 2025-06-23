<script>
// Função para enviar os pedidos para a interface da cozinha
function enviarPedidos() {
    // Iterar sobre os cinco pedidos
    for (let i = 1; i <= 5; i++) {
        // Obter os dados do pedido atual
        let nomeCliente = document.getElementById(`nomeCliente${i}`).value;
        let nomeMesa = document.getElementById(`nomeMesa${i}`).value;
        let idPedido = document.getElementById(`idPedido${i}`).value;
        let bebida = document.getElementById(`bebida${i}`).value;
        let sanduiche = document.getElementById(`sanduiche${i}`).value;
        let descricao = document.getElementById(`descricao${i}`).value;
        let preparoCozinha = document.getElementById(`preparoCozinha${i}`).checked;

        // Verificar se o pedido precisa ser preparado na cozinha
        if (preparoCozinha) {
            // Enviar os dados do pedido para a interface da cozinha (simulado aqui com um console.log)
            console.log(`Pedido ${i}:`);
            console.log("Nome do Cliente:", nomeCliente);
            console.log("Nome da Mesa:", nomeMesa);
            console.log("ID do Pedido:", idPedido);
            console.log("Bebida:", bebida);
            console.log("Sanduíche:", sanduiche);
            console.log("Descrição do Pedido:", descricao);
            console.log("Preparo na Cozinha: Sim");
        }
    }
    
    // Você pode enviar os pedidos para a interface da cozinha aqui usando AJAX, WebSocket, ou outra forma de comunicação
}



// Função para iniciar o cronômetro
function iniciarCronometro(idCronometro) {
    let segundos = 0;
    let cronometro = document.getElementById(`cronometro${idCronometro}`);
    
    // Atualizar o texto do cronômetro a cada segundo
    setInterval(() => {
        segundos++;
        let horas = Math.floor(segundos / 3600);
        let minutos = Math.floor((segundos % 3600) / 60);
        let segundosRestantes = segundos % 60;

        cronometro.textContent = `${formatarTempo(horas)}:${formatarTempo(minutos)}:${formatarTempo(segundosRestantes)}`;
    }, 1000);
}
// Função para enviar o pedido e iniciar o cronômetro
function enviarPedido(numeroPedido) {
    iniciarCronometro(numeroPedido);
    // Aqui você pode adicionar a lógica para enviar o pedido para a cozinha
}

</script>s