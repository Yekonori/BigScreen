@extends('layouts.master')

@section('content')

    <div class="row">
        @forelse($datas as $data)
        <div class="col-md-6">
            <canvas id="question{{$data['question_id']}}" height="400"></canvas>
        </div>
        @empty
        @endforelse
    </div>

    <script src="https://cdn.jsdelivr.net/npm/chart.js@2.8.0"></script>

    @forelse($datas as $data)
    <script>
        var ctx = document.getElementById("question" + <?= $data['question_id'] ?>).getContext('2d');
        var myChart = new Chart(ctx, {
            type: 'pie',
            data: {
                labels: @json($data['labels']),
                datasets: [{
                    label: '# of Votes',
                    data: @json($data['datas']),
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
    @empty
    @endforelse

@endsection