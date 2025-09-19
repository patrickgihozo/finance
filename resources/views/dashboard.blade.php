@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <h2 class="mb-4 text-center fw-bold" style="font-size:2rem;">Dashboard Overview</h2>
    <div class="row mb-4">
        <div class="col-md-4">
            <div class="card text-success">
                <div class="card-body">
                    <h5 class="card-title">Income</h5>
                    <p class="card-text fs-3 fw-bold">+{{ number_format($income, 2) }}</p>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card text-danger">
                <div class="card-body">
                    <h5 class="card-title">Expenses</h5>
                    <p class="card-text fs-3 fw-bold">-{{ number_format($expenses, 2) }}</p>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card text-primary">
                <div class="card-body">
                    <h5 class="card-title">Total Available</h5>
                    <p class="card-text fs-3 fw-bold">{{ number_format($balance, 2) }}</p>
                </div>
            </div>
        </div>
    </div>
    <div class="row mb-4">
        <div class="col-md-6">
            <h5 class="text-center mb-3">Pie Chart</h5>
            <canvas id="pieChart" width="200" height="200" style="max-width:350px;max-height:300px; "></canvas>
        </div>
        <div class="col-md-6">
            <h5 class="text-center mb-3">Transaction Trend</h5>
            <canvas id="lineChart"></canvas>
        </div>
    </div>
</div>
<!-- Chart.js CDN -->
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    // Pie Chart
    const pieCtx = document.getElementById('pieChart').getContext('2d');
    new Chart(pieCtx, {
        type: 'pie',
        data: {
            labels: ['Income', 'Expenses'],
            datasets: [{
                data: [{{ $income }}, {{ $expenses }}],
                backgroundColor: ['#198754', '#dc3545'],
            }]
        }
    });

    // Line Chart
    const lineCtx = document.getElementById('lineChart').getContext('2d');
    const transactionData = @json($transactions);
    const dates = transactionData.map(t => t.date);
    const amounts = transactionData.map(t => t.amount);

    new Chart(lineCtx, {
        type: 'line',
        data: {
            labels: dates,
            datasets: [{
                label: 'Transaction Amount',
                data: amounts,
                borderColor: '#0d6efd',
                backgroundColor: 'rgba(13,110,253,0.1)',
                fill: true,
                tension: 0.3
            }]
        }
    });
</script>
@endsection