new Chart(document.getElementById("estadisticas"), {
  type: 'bar',
  data: {
    labels: ["> 20", "25", "35", "45", "50", "55", "60", "65", "70", "75", "80", "90 <" ],
    datasets: [
      {
        label: "Estadísticas",
        backgroundColor: ["rgb(238, 130, 90, 0.75)"],
        data: [20, 25, 35, 45, 50, 55, 60, 65, 70, 75, 80, 90]
      }
    ]
  },
  options: {
    legend: { display: false },
    title: {
      display: true,
    }
  }
});