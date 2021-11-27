@extends('layouts.admin')

@section('js')
<script src="https://code.highcharts.com/highcharts.js"></script>
<script>
    const tournamentPlayers = '<?php echo $tournaments; ?>'
        .replace('[', '')
        .replace(']', '')
        .split(',')
        .map(player => parseInt(player));;

    Highcharts.chart('container', {
        title: {
            text: 'Races'
        },
        subtitle: {
            text: 'Source: positronx.io'
        },
        xAxis: {
            categories: [ 'North Race', 'South Race', 'Summer Race' ]
        },
        yAxis: {
            title: {
                text: 'Number of Players',
            }
        },
        legend: {
            layout: 'vertical',
            align: 'right',
            verticalAlign: 'middle'
        },
        plotOptions: {
            series: {
                allowPointSelect: true
            }
        },
        series: [{
            name: 'Players',
            data: tournamentPlayers,
        }],
        responsive: {
            rules: [{
                condition: {
                    maxWidth: 500
                },
                chartOptions: {
                    legend: {
                        layout: 'horizontal',
                        align: 'center',
                        verticalAlign: 'bottom'
                    }
                }
            }]
        }
    });
</script>
@endsection

@section('content')
    <div class="container mb-5">
        <div class="row justify-content-center">
           <div class="col-12 col-sm-12 col-md-12 col-lg-12">
            <div class="card">
                <div class="card-header">
                    Charts
                </div>
                <div id="container"></div>
            </div>
        </div>
    </div>
    <div class="container-fluid mt-5">
          <div class="card">
            <div class="card-header bg-warning">
                <h5><i class="fas fa-users fa-1x mr-3"></i>Player Lists</h5>
            </div>
            <table class="table table-hover">
                <thead class="thead-dark">
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Name</th>
                        <th scope="col">Club</th>
                        <th scope="col">Number of Tournaments Joined</th>
                        <th scope="col">Number of Won Tournaments</th>
                    </tr>
                </thead>
                <tbody>
                    @if ($users)
                        @forelse ($users as $user)
                            <tr>
                                <td>
                                    {{ $user->id }}
                                </td>
                                <td>
                                    <strong>{{ $user->name }}</strong>
                                </td>
                                <td>PIGEON SPORTS UNLIMITED (PSU)</td>
                                <td align='center'>
                                    {{ 5 + $user->id }}
                                </td>
                                <td align='center'>
                                    {{ $user->id + 1 }}
                                </td>
                            </tr>
                        @empty 
                            <h4>Empty</h4>
                        @endforelse
                    @endif
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
