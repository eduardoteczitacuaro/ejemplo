<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
  <title>ECG</title>
</head>

<body style="background-color: black;">
  <canvas id="grafica" style="height: 50%;"></canvas>

  <script>
    // Función que actualiza la gráfica
function actualizarGrafica() {
  maximo_datos = 18
  // Obtener los últimos datos del servidor PHP
  fetch('obtener_datos.php')
    .then(response => response.json())
    .then(data => {
      // Agregar los nuevos datos al principio de la gráfica
      data.forEach(d => {
        chart.data.labels.unshift(d.timestamp);
        chart.data.datasets[0].data.unshift(d.valor);
      });
      // Eliminar los datos más antiguos de la gráfica si hay demasiados
      while (chart.data.labels.length > maximo_datos) {
        chart.data.labels.pop();
        chart.data.datasets[0].data.pop();
      }
      // Actualizar la gráfica con los nuevos datos utilizando Chart.js
      chart.update({duration: 500});
    });
}

// Crear la gráfica utilizando Chart.js
var ctx = document.getElementById('grafica').getContext('2d');
var chart = new Chart(ctx, {
  type: 'line',
  data: {
    labels: [],
    datasets: [{
      label: 'Datos del sensor ECG',
      data: [],
      borderColor: 'green',
      backgroundColor: 'green',
      fill: false
    }]
  },
  options: {
    responsive: true,
    title: {
      display: true,
      text: 'Gráfica de datos del sensor ECG'
    },
    scales: {
      xAxes: [{
        type: 'time',
        time: {
          unit: 'second'
        }
      }]
    },
    animation: {
      duration: 0
    }
  }
});
actualizarGrafica();

// Actualizar la gráfica cada 5 segundos
setInterval(actualizarGrafica, 1000);

  </script>
</body>

</html>