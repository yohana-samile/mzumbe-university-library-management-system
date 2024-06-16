@extends('layouts.app')

@section('content')
<div class="container">
    <a href="{{ route('download.report') }}" class="d-none d-sm-inline-block btn btn-primary btn-sm shadow-sm float-right">
        <i class="fas fa-download fa-sm text-white-50"></i> Download Library Report
    </a>

    <h4 class="my-4">Library Report</h4>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Unit Name</th>
                <th>Usage Count</th>
            </tr>
        </thead>
        <tbody>
            @foreach($queryResult as $row)
                <tr>
                    <td>{{ $row->unit_name }}</td>
                    <td>{{ $row->usage_count }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <canvas id="barChart" width="400" height="200"></canvas>
</div>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const ctx = document.getElementById('barChart').getContext('2d');
        const data = {
            labels: @json($data['labels']),
            datasets: [{
                label: 'Usage Count',
                data: @json($data['data']),
                backgroundColor: 'rgba(54, 162, 235, 0.2)',
                borderColor: 'rgba(54, 162, 235, 1)',
                borderWidth: 1
            }]
        };
        const config = {
            type: 'bar',
            data: data,
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        };
        const barChart = new Chart(ctx, config);
    });
</script>
@endsection
