new Chart(document.getElementById("ventasAnual"), {
    type: 'bar',
    data: {
      labels: ['2015', '2016', '2017', '2018', '2019', '2020', '2021', '2022'],
      datasets: [
        {
          label: "Ventas anuales",
          backgroundColor: ["rgb(238, 130, 90, 0.75)"],
          data: [26, 14, 31, 36, 50, 43, 21, 53]
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