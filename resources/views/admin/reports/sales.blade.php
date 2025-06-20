<!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" /> -->
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<div class="container mt-4">
    <!-- Header -->
    <div class="row mb-4">
        <div class="col">
            <h2 class="fw-bold">Restaurant Sales Report</h2>
            <p class="text-muted">Gain comprehensive insight into your revenue with a detailed breakdown of sales transactions, trends, and key performance indicators.</p>
        </div>
    </div>

    <!-- Filters -->
    <div class="row mb-3 g-3">
        <div class="col-md-3">
            <select id="mainFilter" class="form-select" aria-label="Select Timeframe">
                <option value="yearly">Yearly</option>
                <option value="monthly" selected>Monthly</option>
                <option value="weekly">Weekly</option>
            </select>
        </div>
        <div class="col-md-3">
            <select id="subFilter" class="form-select" aria-label="Select Sub Timeframe">
                <!-- options added dynamically -->
            </select>
        </div>
    </div>

    <!-- KPI Cards -->
    <div class="row">
        <div class="col-md-4 mb-3">
            <div class="card shadow-sm border-start border-success border-4">
                <div class="card-body">
                    <h6 class="text-uppercase text-muted">Total Sales (ALL THE TIME)</h6>
                    <h2 class="fw-bold text-success" id="salesCount">0</h2>
                </div>
            </div>
        </div>
        <div class="col-md-4 mb-3">
            <div class="card shadow-sm border-start border-success border-4">
                <div class="card-body">
                    <h6 class="text-uppercase text-muted">Number of Transactions (ALL THE TIME)</h6>
                    <h2 class="fw-bold text-success" id="revenueCount">0</h2>
                </div>
            </div>
        </div>
        <div class="col-md-4 mb-3">
            <div class="card shadow-sm border-start border-success border-4">
                <div class="card-body">
                    <h6 class="text-uppercase text-muted">Average Sale Per Transaction (ALL THE TIME)</h6>
                    <h2 class="fw-bold text-success" id="ordersCount">$0.00</h2>
                </div>
            </div>
        </div>
    </div>

    <!-- Chart Card -->
    <div class="card shadow-sm">
        <div class="card-header bg-success text-white">
            <h5 class="mb-2 fw-bold">Sales Trend Over Time</h5>
            <div>Visualize your sales performance using the interactive chart below.</div>
        </div>
        <div class="card-body">
            <canvas id="lineChart" height="100"></canvas>
        </div>
    </div>
</div>


<script>
    const chartCtx = document.getElementById('lineChart').getContext('2d');

    // Example data structure, simulating data grouped for different filters and sub-filters
    const fullData = {
        yearly: {
            Jan: {
                labels: ['Week 1', 'Week 2', 'Week 3', 'Week 4'],
                data: [250, 300, 350, 400],
                sales: 1300,
                revenue: 45000,
                orders: 500
            },
            Feb: {
                labels: ['Week 1', 'Week 2', 'Week 3', 'Week 4'],
                data: [200, 220, 210, 230],
                sales: 860,
                revenue: 37000,
                orders: 420
            },
            Mar: {
                labels: ['Week 1', 'Week 2', 'Week 3', 'Week 4'],
                data: [300, 320, 330, 310],
                sales: 1260,
                revenue: 48000,
                orders: 510
            },
            Apr: {
                labels: ['Week 1', 'Week 2', 'Week 3', 'Week 4'],
                data: [350, 360, 370, 390],
                sales: 1470,
                revenue: 52000,
                orders: 530
            },
            May: {
                labels: ['Week 1', 'Week 2', 'Week 3', 'Week 4'],
                data: [400, 420, 410, 430],
                sales: 1660,
                revenue: 56000,
                orders: 580
            },
            Jun: {
                labels: ['Week 1', 'Week 2', 'Week 3', 'Week 4'],
                data: [380, 390, 400, 410],
                sales: 1580,
                revenue: 54000,
                orders: 560
            }
        },
        monthly: {
            'Week 1': {
                labels: ['Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat', 'Sun'],
                data: [50, 60, 70, 80, 90, 100, 110],
                sales: 560,
                revenue: 21000,
                orders: 150
            },
            'Week 2': {
                labels: ['Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat', 'Sun'],
                data: [40, 50, 60, 70, 80, 90, 100],
                sales: 490,
                revenue: 18500,
                orders: 130
            },
            'Week 3': {
                labels: ['Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat', 'Sun'],
                data: [60, 70, 80, 90, 100, 110, 120],
                sales: 630,
                revenue: 23000,
                orders: 160
            },
            'Week 4': {
                labels: ['Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat', 'Sun'],
                data: [55, 65, 75, 85, 95, 105, 115],
                sales: 595,
                revenue: 22000,
                orders: 155
            }
        },
        weekly: {
            Mon: {
                labels: ['Morning', 'Afternoon', 'Evening'],
                data: [20, 30, 25],
                sales: 75,
                revenue: 3000,
                orders: 40
            },
            Tue: {
                labels: ['Morning', 'Afternoon', 'Evening'],
                data: [25, 35, 30],
                sales: 90,
                revenue: 3500,
                orders: 45
            },
            Wed: {
                labels: ['Morning', 'Afternoon', 'Evening'],
                data: [30, 40, 35],
                sales: 105,
                revenue: 4000,
                orders: 50
            },
            Thu: {
                labels: ['Morning', 'Afternoon', 'Evening'],
                data: [22, 33, 28],
                sales: 83,
                revenue: 3200,
                orders: 42
            },
            Fri: {
                labels: ['Morning', 'Afternoon', 'Evening'],
                data: [35, 45, 40],
                sales: 120,
                revenue: 4500,
                orders: 55
            },
            Sat: {
                labels: ['Morning', 'Afternoon', 'Evening'],
                data: [40, 50, 45],
                sales: 135,
                revenue: 4800,
                orders: 60
            },
            Sun: {
                labels: ['Morning', 'Afternoon', 'Evening'],
                data: [38, 48, 43],
                sales: 129,
                revenue: 4700,
                orders: 58
            }
        }
    };

    const mainFilter = document.getElementById('mainFilter');
    const subFilter = document.getElementById('subFilter');

    // Initialize chart
    const lineChart = new Chart(chartCtx, {
        type: 'line',
        data: {
            labels: [],
            datasets: [{
                label: 'Sales',
                data: [],
                borderColor: '#198754',
                backgroundColor: 'rgba(25, 135, 84, 0.1)',
                fill: true,
                tension: 0.4
            }]
        },
        options: {
            responsive: true,
            plugins: {
                legend: {
                    labels: {
                        color: '#333'
                    }
                }
            },
            scales: {
                y: {
                    beginAtZero: true,
                    ticks: {
                        color: '#555'
                    }
                },
                x: {
                    ticks: {
                        color: '#555'
                    }
                }
            }
        }
    });

    // Helper: Populate subFilter options based on mainFilter choice
    function populateSubFilterOptions(filterType) {
        subFilter.innerHTML = ''; // Clear existing options
        let options = [];

        if (filterType === 'yearly') {
            options = Object.keys(fullData.yearly);
        } else if (filterType === 'monthly') {
            options = Object.keys(fullData.monthly);
        } else if (filterType === 'weekly') {
            options = Object.keys(fullData.weekly);
        }

        options.forEach(opt => {
            const optionEl = document.createElement('option');
            optionEl.value = opt;
            optionEl.textContent = opt;
            subFilter.appendChild(optionEl);
        });
    }

    // Update chart and KPIs based on selected filters
    function updateDashboard() {
        const mainVal = mainFilter.value;
        const subVal = subFilter.value;

        const dataset = fullData[mainVal][subVal];
        if (!dataset) return;

        lineChart.data.labels = dataset.labels;
        lineChart.data.datasets[0].data = dataset.data;
        lineChart.update();

        // Update KPI cards with correct data
        document.getElementById('salesCount').textContent = dataset.sales.toLocaleString(); // Total Sales
        document.getElementById('revenueCount').textContent = dataset.orders.toLocaleString(); // Number of Transactions
        const avgSale = dataset.orders ? dataset.revenue / dataset.orders : 0;
        document.getElementById('ordersCount').textContent = `$${avgSale.toFixed(2)}`; // Average Sale Per Transaction
    }

    // Event listeners
    mainFilter.addEventListener('change', () => {
        populateSubFilterOptions(mainFilter.value);
        updateDashboard();
    });

    subFilter.addEventListener('change', () => {
        updateDashboard();
    });

    // Initialize UI
    populateSubFilterOptions(mainFilter.value);
    updateDashboard();
</script>