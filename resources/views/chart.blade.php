@extends('layout.index')

@section('content')
<div class="section-title">
    <span>Grafik Data Peminat Ekstrakurikuler</span>
    <h2>Grafik Data Peminat Ekstrakurikuler</h2>
    <p>Grafik Data Peminat Ekstrakurikuler.</p>
</div>

<div class="chart-container">
    <canvas id="myChart"></canvas>
</div>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    var pendaftaran = @json($pendaftaran);
    var labels = [];
    var data = [];

    // Menghitung jumlah peminat untuk setiap ekstrakurikuler
    pendaftaran.forEach(function(p) {
        var ekstra = p.ekstra.nama_ekstra;
        var index = labels.indexOf(ekstra);

        if (index === -1) {
            labels.push(ekstra);
            data.push(1);
        } else {
            data[index]++;
        }
    });

    var ctx = document.getElementById('myChart').getContext('2d');
    var myChart = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: labels,
            datasets: [{
                label: 'Jumlah Peminat Ekstrakurikuler',
                data: data,
                backgroundColor: '#9DC08B',
                borderColor: '#A4BC92',
                borderWidth: 1
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            scales: {
                y: {
                    beginAtZero: true,
                    stepSize: 1
                }
            }
        }
    });
</script>

<style>
    .chart-container {
        display: flex;
        justify-content: center;
        align-items: center;
        height: 100vh;
        margin: 60px;
    }

    @media (max-width: 768px) {
        .chart-container {
            height: 60vh;
            width: 80vw;
            margin-left: 20px;
            margin-right: 20px;
        }
    
    }
</style>
@endsection
