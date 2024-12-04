document.addEventListener('DOMContentLoaded', function () {
    // Funciones separadas
    function initializeChart() {
        const ctx = document.getElementById('myChart').getContext('2d');
        const myChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: ['Lunes', 'Martes', 'Miércoles', 'Jueves', 'Viernes', 'Sábado', 'Domingo'],
                datasets: [{
                    label: 'Ventas Semanales ($)',
                    data: [1200, 1800, 1500, 2000, 2200, 2500, 3000],
                    backgroundColor: [
                        'rgba(75, 192, 192, 0.2)',
                        'rgba(54, 162, 235, 0.2)',
                        'rgba(255, 206, 86, 0.2)',
                        'rgba(153, 102, 255, 0.2)',
                        'rgba(255, 159, 64, 0.2)',
                        'rgba(255, 99, 132, 0.2)',
                        'rgba(75, 192, 192, 0.2)'
                    ],
                    borderColor: [
                        'rgba(75, 192, 192, 1)',
                        'rgba(54, 162, 235, 1)',
                        'rgba(255, 206, 86, 1)',
                        'rgba(153, 102, 255, 1)',
                        'rgba(255, 159, 64, 1)',
                        'rgba(255, 99, 132, 1)',
                        'rgba(75, 192, 192, 1)'
                    ],
                    borderWidth: 1
                }]
            },
            options: {
                responsive: true,
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });
    }

    function initializeCalendar() {
        const currentDate = new Date();
        document.getElementById('current-date').textContent = currentDate.toDateString();
    }

    function simulateLoading() {
        const loadingOverlay = document.getElementById('loading-overlay');
        const loadingBar = document.getElementById('loading-bar');
        const loadingText = document.getElementById('loading-text');
        const dashboardContent = document.getElementById('dashboard-content');

        const stages = [
            { width: 30, text: 'Cargando datos...' },
            { width: 60, text: 'Preparando visualizaciones...' },
            { width: 85, text: 'Casi listo...' },
            { width: 100, text: '¡Dashboard listo!' }
        ];

        stages.forEach((stage, index) => {
            setTimeout(() => {
                loadingBar.style.width = `${stage.width}%`;
                loadingText.textContent = stage.text;

                if (index === stages.length - 1) {
                    setTimeout(() => {
                        loadingOverlay.style.opacity = '0';
                        setTimeout(() => {
                            loadingOverlay.style.display = 'none';
                            dashboardContent.style.display = 'block';

                            // Inicializar gráfico y calendario después de ocultar la pantalla de carga
                            initializeChart();
                            initializeCalendar();
                        }, 500);
                    }, 500);
                }
            }, (index + 1) * 500);
        });
    }

    // Iniciar la simulación de carga
    simulateLoading();
});