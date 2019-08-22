@extends('layouts.master')

@section('content')

    <div class="row">
        <div class="col-md-6">
            <canvas id="question6" width="400" height="400"></canvas>
        </div>
        <div class="col-md-6">
            <canvas id="question6" width="400" height="400"></canvas>
        </div>
        <div class="col-md-6">
            <canvas id="question6" width="400" height="400"></canvas>
        </div>
        <div class="col-md-6">
            <canvas id="question6" width="400" height="400"></canvas>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/chart.js@2.8.0"></script>
    <script>
        let ctx = document.getElementById('question6').getContext('2d');
        let myChart = new Chart(ctx, {
            type: 'pie',
            data: {
                labels: @json($labels),
                datasets: [{
                    label: '# of Votes',
                    data: @json($datas),
                    backgroundColor: [
                        'rgba(255, 99, 132, 0.2)',
                        'rgba(54, 162, 235, 0.2)',
                        'rgba(255, 206, 86, 0.2)',
                        'rgba(75, 192, 192, 0.2)'
                    ],
                    borderColor: [
                        'rgba(255, 99, 132, 1)',
                        'rgba(54, 162, 235, 1)',
                        'rgba(255, 206, 86, 1)',
                        'rgba(75, 192, 192, 1)'
                    ],
                    borderWidth: 1
                }]
            }
        });
    </script>

@endsection