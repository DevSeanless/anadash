<div class="container-fluid py-4">
    <div class="row">
        {{-- Card 1 --}}
        <div class="col-md-3 mb-4">
            <div class="card shadow-sm border-start border-primary border-4">
                <div class="card-body">
                    <h6 class="text-uppercase text-muted">Total Sales</h6>
                    <h2 class="fw-bold text-primary">$12,340</h2>
                    <p class="mb-0 text-muted small">+9% from last month</p>
                </div>
            </div>
        </div>

        {{-- Card 2 --}}
        <div class="col-md-3 mb-4">
            <div class="card shadow-sm border-start border-success border-4">
                <div class="card-body">
                    <h6 class="text-uppercase text-muted">Total Expenses</h6>
                    <h2 class="fw-bold text-success">$45,200</h2>
                    <p class="mb-0 text-muted small">-12% from last month</p>
                </div>
            </div>
        </div>

        {{-- Card 3 --}}
        <div class="col-md-3 mb-4">
            <div class="card shadow-sm border-start border-warning border-4">
                <div class="card-body">
                    <h6 class="text-uppercase text-muted">Net Profit</h6>
                    <h2 class="fw-bold text-warning">$1,320</h2>
                    <p class="mb-0 text-muted small">+4% from last month</p>
                </div>
            </div>
        </div>

        {{-- Card 4 --}}
        <div class="col-md-3 mb-4">
            <div class="card shadow-sm border-start border-danger border-4">
                <div class="card-body">
                    <h6 class="text-uppercase text-muted">Stock Levels</h6>
                    <h2 class="fw-bold text-danger">15 Units</h2>
                    <p class="mb-0 text-muted small">3 items low on stock</p>
                </div>
            </div>
        </div>
    </div>

    {{-- Charts Section --}}
    <div class="row">
        <div class="col-lg-4 mb-4">
            <div class="card shadow-sm">
                <div class="card-header fw-bold">Sales Overview</div>
                <div class="card-body">
                    <canvas id="lineChart"></canvas>
                </div>
            </div>
        </div>

        <div class="col-lg-4 mb-4">
            <div class="card shadow-sm">
                <div class="card-header fw-bold">Expenses Overview</div>
                <div class="card-body">
                    <canvas id="barChart"></canvas>
                </div>
            </div>
        </div>

        <div class="col-lg-4 mb-4">
            <div class="card shadow-sm">
                <div class="card-header fw-bold">Profit Overview</div>
                <div class="card-body">
                    <canvas id="areaChart"></canvas>
                </div>
            </div>
        </div>
    </div>
</div>

{{-- Chart.js --}}
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<script>
    const salesData = [12340, 13400, 12800, 14000]; // Example Sales
    const expenseData = [9000, 8700, 9500, 9200]; // Example Expenses
    const profitData = [3340, 4700, 3300, 4800]; // Example Profit

    // Sales Line Chart
    new Chart(document.getElementById('lineChart'), {
        type: 'line',
        data: {
            labels: ['January', 'February', 'March', 'April'],
            datasets: [{
                label: 'Sales',
                data: salesData,
                borderColor: '#0d6efd',
                backgroundColor: 'rgba(13, 110, 253, 0.1)',
                fill: true,
                tension: 0.4,
                pointRadius: 4,
                pointHoverRadius: 6
            }]
        },
        options: {
            responsive: true,
            plugins: {
                legend: {
                    display: false
                },
                tooltip: {
                    mode: 'index',
                    intersect: false
                }
            },
            scales: {
                y: {
                    beginAtZero: false
                }
            }
        }
    });

    // Expenses Bar Chart
    new Chart(document.getElementById('barChart'), {
        type: 'bar',
        data: {
            labels: ['January', 'February', 'March', 'April'],
            datasets: [{
                label: 'Expenses',
                data: expenseData,
                backgroundColor: '#198754',
                borderRadius: 8,
                barPercentage: 0.5
            }]
        },
        options: {
            responsive: true,
            plugins: {
                legend: {
                    display: false
                },
                tooltip: {
                    mode: 'index',
                    intersect: false
                }
            },
            scales: {
                y: {
                    beginAtZero: false
                }
            }
        }
    });

    // Profit Area Chart
    new Chart(document.getElementById('areaChart'), {
        type: 'line',
        data: {
            labels: ['January', 'February', 'March', 'April'],
            datasets: [{
                label: 'Net Profit',
                data: profitData,
                borderColor: '#ffc107',
                backgroundColor: 'rgba(255, 193, 7, 0.2)',
                fill: true,
                tension: 0.4,
                pointRadius: 4,
                pointHoverRadius: 6
            }]
        },
        options: {
            responsive: true,
            plugins: {
                legend: {
                    display: false
                },
                tooltip: {
                    mode: 'index',
                    intersect: false
                }
            },
            scales: {
                y: {
                    beginAtZero: false
                }
            }
        }
    });
</script>