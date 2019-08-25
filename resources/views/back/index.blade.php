@extends('layouts.master')

@section('content')

    <div class="row">
        @forelse($pieDatas as $pieData)
        <div class="col-md-6 mt-6">
            <p class="question">{{ $pieData['question'] }}</p>
            <canvas id="question{{$pieData['question_id']}}" height="360"></canvas>
        </div>
        @empty
        @endforelse

        <div class="col-md-6 mt-6">
            <p class="question"></p>
            <canvas id="questionRadar" height="360"></canvas>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/chart.js@2.8.0"></script>

    @forelse($pieDatas as $pieData)
    <script>
        var ctx = document.getElementById("question" + <?= $pieData['question_id'] ?>).getContext('2d');
        var myChart = new Chart(ctx, {
            type: 'pie',
            data: {
                labels: @json($pieData['labels']),
                datasets: [{
                    data: @json($pieData['datas']),
                    backgroundColor: @json($pieData['colors'])
                }]
            }
        });
    </script>
    @empty
    @endforelse

    <script>
        var ctx = document.getElementById("questionRadar").getContext('2d');
        var myChart = new Chart(ctx, {
            type: 'radar',
            data: {
                /**
                 * labels = ID de la Question
                 * data = Moyenne obtenue par la question
                 */
                labels: @json($radarDatas['labels']),
                datasets: [
                    {
                        label: "Moyenne",
                        data: @json($radarDatas['datas']),
                        backgroundColor: "rgba(179,181,198,0.2)",
                        borderColor: "rgba(179,181,198,1)",
                        pointBackgroundColor: "rgba(179,181,198,1)",
                        pointBorderColor: "#fff",
                        pointHoverBackgroundColor: "#fff",
                        pointHoverBorderColor: "rgba(179,181,198,1)",
                    }
                ]
            },
            options: {
                scale: {
                    ticks: {
                        beginAtZero: true,
                        max: 5,
                        stepSize: 1
                    }
                }
            }
        });
    </script>

@endsection