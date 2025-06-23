let intervaloCronometro; // Variável para armazenar o intervalo do cronômetro
let notificacoesPendentes = 0;

// Função para enviar o pedido
function enviarPedido1 (numeroPedido) {
    // Aqui você pode enviar o pedido para o servidor

    // Exibir mensagem de confirmação
    exibirMensagem("Pedido enviado! A contagem será iniciada.");

    // Incrementar o contador de notificações pendentes
    notificacoesPendentes++;

    // Atualizar o contador de notificações na interface
    document.getElementById(`contadorNotificacoes${numeroPedido}`).textContent = notificacoesPendentes;

    // Iniciar o cronômetro após um pequeno atraso para a mensagem ser exibida
    setTimeout(() => {
        iniciarCronometro(numeroPedido);
    }, 2000); // Aguarda 2 segundos (2000 milissegundos) antes de iniciar o cronômetro

    // Definir um tempo limite para o cronômetro (por exemplo, 30 minutos)
    const tempoLimite = 30 * 60 * 1000; // 30 minutos em milissegundos

    // Parar o cronômetro após o tempo limite
    setTimeout(() => {
        clearInterval(intervaloCronometro);
    }, tempoLimite);
}

// Função para iniciar o cronômetro
function iniciarCronometro(idCronometro) {
    let segundos = 0;
    let cronometro = document.getElementById(`cronometro${idCronometro}`);
    
    // Atualizar o texto do cronômetro a cada segundo
    intervaloCronometro = setInterval(() => {
        let horas = Math.floor(segundos / 3600);
        let minutos = Math.floor((segundos % 3600) / 60);
        let segundosRestantes = segundos % 60;

        cronometro.textContent = `${formatarTempo(horas)}:${formatarTempo(minutos)}:${formatarTempo(segundosRestantes)}`;
        
        segundos++; // Incrementar os segundos após a atualização do cronômetro
    }, 1000);
}

// Função para exibir mensagem ao atendente
function exibirMensagem(mensagem) {
    alert(mensagem); // Exibe uma caixa de diálogo com a mensagem
}

// Função auxiliar para formatar o tempo com dois dígitos
function formatarTempo(tempo) {
    return tempo < 10 ? `0${tempo}` : tempo;
}

// Função para exibir notificação
function exibirMensagemNotificacao(numeroPedido) {
    if (notificacoesPendentes > 0) {
        // Exibir a mensagem de notificação
        const mensagem = `Pedido da Mesa ${numeroPedido} está pronto`;
        document.getElementById(`textoNotificacao${numeroPedido}`).textContent = mensagem;

        // Reduzir o contador de notificações pendentes
        notificacoesPendentes--;

        // Atualizar o contador de notificações na interface
        document.getElementById(`contadorNotificacoes${numeroPedido}`).textContent = notificacoesPendentes;
    }
}
