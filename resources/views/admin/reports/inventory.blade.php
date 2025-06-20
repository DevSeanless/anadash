<div class="container mt-4">
    <!-- Header -->
    <div class="row mb-4">
        <div class="col">
            <h2 class="fw-bold">Restaurant Inventory Report</h2>
            <p class="text-muted">Track inventory levels over time, understand usage trends, and monitor stock efficiency with detailed data breakdowns.</p>
        </div>
    </div>

    <!-- Filters -->
    <div class="row mb-3 g-3">
        <div class="col-md-3">
            <select id="mainFilterInventory" class="form-select" aria-label="Select Timeframe">
                <option value="yearly">Yearly</option>
                <option value="monthly" selected>Monthly</option>
                <option value="weekly">Weekly</option>
            </select>
        </div>
        <div class="col-md-3">
            <select id="subFilterInventory" class="form-select" aria-label="Select Sub Timeframe">
                <!-- options added dynamically -->
            </select>
        </div>
    </div>

    <!-- KPI Cards -->
    <div class="row">
        <div class="col-md-4 mb-3">
            <div class="card shadow-sm border-start border-info border-4">
                <div class="card-body">
                    <h6 class="text-uppercase text-muted">Total Inventory (ALL THE TIME)</h6>
                    <h2 class="fw-bold text-info" id="inventoryCount">0</h2>
                </div>
            </div>
        </div>
        <div class="col-md-4 mb-3">
            <div class="card shadow-sm border-start border-info border-4">
                <div class="card-body">
                    <h6 class="text-uppercase text-muted">Number of Inventory Transactions</h6>
                    <h2 class="fw-bold text-info" id="transactionsCount">0</h2>
                </div>
            </div>
        </div>
        <div class="col-md-4 mb-3">
            <div class="card shadow-sm border-start border-info border-4">
                <div class="card-body">
                    <h6 class="text-uppercase text-muted">Avg. Inventory per Transaction</h6>
                    <h2 class="fw-bold text-info" id="avgInventoryCount">$0.00</h2>
                </div>
            </div>
        </div>
    </div>

    <!-- Chart Card -->
    <div class="card shadow-sm">
        <div class="card-header bg-info text-white">
            <h5 class="mb-2 fw-bold">Inventory Trend Over Time</h5>
            <div>Visualize your inventory performance using the interactive chart below.</div>
        </div>
        <div class="card-body">
            <canvas id="lineChartInventory" height="100"></canvas>
        </div>
    </div>
</div>
<script>
    const chartCtxInventory = document.getElementById('lineChartInventory').getContext('2d');

    const fullDataInventory = {
        yearly: {
            Jan: {
                labels: ['Week 1', 'Week 2', 'Week 3', 'Week 4'],
                data: [7800, 8200, 7950, 8100],
                inventory: 32050,
                cost: 65000,
                transactions: 400
            },
            Feb: {
                labels: ['Week 1', 'Week 2', 'Week 3', 'Week 4'],
                data: [7100, 7350, 7200, 7400],
                inventory: 29050,
                cost: 58000,
                transactions: 365
            },
            Mar: {
                labels: ['Week 1', 'Week 2', 'Week 3', 'Week 4'],
                data: [8500, 8700, 8600, 8900],
                inventory: 34700,
                cost: 69000,
                transactions: 420
            },
            Apr: {
                labels: ['Week 1', 'Week 2', 'Week 3', 'Week 4'],
                data: [9000, 9200, 9100, 9400],
                inventory: 36700,
                cost: 72000,
                transactions: 440
            },
            May: {
                labels: ['Week 1', 'Week 2', 'Week 3', 'Week 4'],
                data: [9700, 9800, 9650, 9900],
                inventory: 39050,
                cost: 78000,
                transactions: 470
            },
            Jun: {
                labels: ['Week 1', 'Week 2', 'Week 3', 'Week 4'],
                data: [9300, 9450, 9350, 9500],
                inventory: 37600,
                cost: 74000,
                transactions: 455
            }
        },
        monthly: {
            'Week 1': {
                labels: ['Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat', 'Sun'],
                data: [1100, 1150, 1200, 1250, 1300, 1350, 1400],
                inventory: 8750,
                cost: 17500,
                transactions: 100
            },
            'Week 2': {
                labels: ['Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat', 'Sun'],
                data: [1050, 1100, 1130, 1170, 1200, 1250, 1280],
                inventory: 8080,
                cost: 16000,
                transactions: 95
            },
            'Week 3': {
                labels: ['Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat', 'Sun'],
                data: [1200, 1250, 1300, 1350, 1400, 1450, 1500],
                inventory: 9450,
                cost: 19000,
                transactions: 105
            },
            'Week 4': {
                labels: ['Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat', 'Sun'],
                data: [1120, 1180, 1210, 1270, 1300, 1360, 1400],
                inventory: 8840,
                cost: 17800,
                transactions: 98
            }
        },
        weekly: {
            Mon: {
                labels: ['Morning', 'Afternoon', 'Evening'],
                data: [300, 400, 450],
                inventory: 1150,
                cost: 2300,
                transactions: 15
            },
            Tue: {
                labels: ['Morning', 'Afternoon', 'Evening'],
                data: [320, 410, 470],
                inventory: 1200,
                cost: 2400,
                transactions: 16
            },
            Wed: {
                labels: ['Morning', 'Afternoon', 'Evening'],
                data: [310, 420, 460],
                inventory: 1190,
                cost: 2380,
                transactions: 15
            },
            Thu: {
                labels: ['Morning', 'Afternoon', 'Evening'],
                data: [330, 430, 480],
                inventory: 1240,
                cost: 2480,
                transactions: 17
            },
            Fri: {
                labels: ['Morning', 'Afternoon', 'Evening'],
                data: [340, 450, 500],
                inventory: 1290,
                cost: 2580,
                transactions: 18
            },
            Sat: {
                labels: ['Morning', 'Afternoon', 'Evening'],
                data: [360, 470, 520],
                inventory: 1350,
                cost: 2700,
                transactions: 20
            },
            Sun: {
                labels: ['Morning', 'Afternoon', 'Evening'],
                data: [350, 460, 510],
                inventory: 1320,
                cost: 2640,
                transactions: 19
            }
        }
    };

    const $mainFilterInventory = $('#mainFilterInventory');
    const $subFilterInventory = $('#subFilterInventory');

    const lineChartInventory = new Chart(chartCtxInventory, {
        type: 'line',
        data: {
            labels: [],
            datasets: [{
                label: 'Inventory',
                data: [],
                borderColor: '#0dcaf0',
                backgroundColor: 'rgba(13, 202, 240, 0.1)',
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

    function populateInventorySubFilterOptions(filterType) {
        $subFilterInventory.empty();

        let options = Object.keys(fullDataInventory[filterType] || {});
        $.each(options, function(index, opt) {
            $subFilterInventory.append($('<option>', {
                value: opt,
                text: opt
            }));
        });

        return options[0]; // return first option for default selection
    }

    function updateInventoryDashboard() {
        const mainVal = $mainFilterInventory.val();
        const subVal = $subFilterInventory.val();

        const dataset = fullDataInventory[mainVal]?.[subVal];
        if (!dataset) return;

        // Update Chart
        lineChartInventory.data.labels = dataset.labels;
        lineChartInventory.data.datasets[0].data = dataset.data;
        lineChartInventory.update();

        // Update KPI Cards
        $('#inventoryCount').text(dataset.inventory.toLocaleString());
        $('#transactionsCount').text(dataset.transactions.toLocaleString());
        const avg = dataset.transactions ? dataset.cost / dataset.transactions : 0;
        $('#avgInventoryCount').text(`$${avg.toFixed(2)}`);
    }

    // Event listeners
    $mainFilterInventory.on('change', function() {
        const defaultSub = populateInventorySubFilterOptions($(this).val());
        $subFilterInventory.val(defaultSub);
        updateInventoryDashboard();
    });

    $subFilterInventory.on('change', function() {
        updateInventoryDashboard();
    });

    // Initial Load
    $(document).ready(function() {
        const defaultSub = populateInventorySubFilterOptions($mainFilterInventory.val());
        $subFilterInventory.val(defaultSub);
        updateInventoryDashboard();
    });
</script>