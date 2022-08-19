new Chart(document.getElementById("ventasSemanal"), {
  type: 'line',
  data: {
    labels: [26, 14, 31, 36, 50, 43, 21, 53],
    datasets: [{ 
        data: [26, 14, 31, 36, 50, 43, 21, 53],
        label: "Ventas semanales",
        borderColor: "rgb(30, 168, 187)",
        fill: true,
        backgroundColor: "rgb(30, 168, 187, 0.25)",
      },
    ]
  },
  options: {
    title: {
      display: true,
    }
  }
});