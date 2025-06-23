
function iniciarPedido() {
  // Iniciar a contagem regressiva
  var tempoRestante = 60; // Defina o tempo restante em segundos (por exemplo, 60 segundos)
  var contagemRegressiva = setInterval(function() {
    if (tempoRestante <= 0) {
      clearInterval(contagemRegressiva); // Parar a contagem regressiva quando atingir zero
      // Se necessário, adicione código aqui para lidar com o término da contagem regressiva
    } else {
      // Atualizar a interface do usuário para mostrar o tempo restante (opcional)
      console.log("Tempo restante: " + tempoRestante + " segundos");
      tempoRestante--;
    }
  }, 1000); // Atualizar a contagem regressiva a cada segundo

  // Enviar solicitação AJAX para iniciar o pedido no backend
  var xhr = new XMLHttpRequest();
  xhr.open("POST", "iniciar_pedido.php", true);
  xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
  xhr.onreadystatechange = function() {
    if (xhr.readyState === 4 && xhr.status === 200) {
      // Processar a resposta do backend, se necessário
      console.log(xhr.responseText); // Exemplo de resposta do backend
    }
  };
  xhr.send();
}

