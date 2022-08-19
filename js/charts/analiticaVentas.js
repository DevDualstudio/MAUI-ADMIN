const ctx = document.getElementById('analiticaVentas');
const analiticaVentas = new Chart(ctx, {
    type: 'bar',
    data: {
        labels: ['Ene', 'Feb', 'Mar', 'Abril', 'May', 'Jun', 'Jul', 'Ago', 'Sep', 'Oct', 'Nov', 'Dic'],
        datasets: [{
            label: 'Ventas',
            data: [12, 19, 13, 15, 52, 43, 45, 25, 25,23, 22, 34,],
            backgroundColor: [
                'rgb(53, 185, 203)',
            ],
           
        }]
    },
    options: {
        scales: {
            
            y: {
                beginAtZero: true
            }
        },
       
        
    }

    
});
