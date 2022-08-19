new Chart(document.getElementById("guiasProceso"), {
  type: 'doughnut',
  data: {
    labels: ["Finalizado", "Faltante"],
    datasets: [
      {
        backgroundColor: ["rgb(238, 130, 90, 0.75)",
          "rgb(240, 240, 240)"],
        data: [75, 25]
      }
    ]
  },
  options: {
    aspectRatio: 1,
    layout: {
        padding: {
            left: 0,
            right: 0,
            top: 0,
            bottom: 0,
        }
    },
    responsive: true,
    cutoutPercentage: 90,
    legend: {
        display: false,
    },
    title: {
        display: false,
    },
}
});