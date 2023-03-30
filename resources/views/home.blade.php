@extends('adminlte::page')

@section('title', 'AdminLTE')

@section('content_header')
    <h1 class="m-0 text-dark">Dashboard</h1>
@stop

@section('content')
    @include('sweetalert::alert')
    <div class="row">
        <div class="col-12">
            <div class="card-body">
                @if (Auth::user()->role == 'superadmin')
                    <div id="chart1" style="width:100%"></div><br><br>
                    <div id="chart2" style="width:100%"></div>
                @else
                    <h1>Selamat Datang di Halaman Admin</h1>
                @endif
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
    <script>
        var options = {
            series: [{
                data: [
                    <?php echo json_encode($pointslayanan1); ?>,
                    <?php echo json_encode($pointslayanan2); ?>,
                    <?php echo json_encode($pointslayanan3); ?>,
                    <?php echo json_encode($pointslayanan4); ?>
                ]
            }],
            chart: {
                type: 'bar',
                height: 380
            },
            plotOptions: {
                bar: {
                    barHeight: '100%',
                    distributed: true,
                    horizontal: true,
                    dataLabels: {
                        position: 'bottom'
                    },
                }
            },
            colors: ['#006A71', '#2EC1AC', '#8FBDD3', '#D3DE32'],
            dataLabels: {
                enabled: true,
                textAnchor: 'start',
                style: {
                    colors: ['#fff']
                },
                formatter: function(val, opt) {
                    return opt.w.globals.labels[opt.dataPointIndex] + ":  " + val
                },
                offsetX: 0,
                dropShadow: {
                    enabled: true
                }
            },
            stroke: {
                width: 1,
                colors: ['#fff']
            },
            xaxis: {
                categories: [
                    <?php echo json_encode($layanans[0]); ?>,
                    <?php echo json_encode($layanans[1]); ?>,
                    <?php echo json_encode($layanans[2]); ?>,
                    <?php echo json_encode($layanans[3]); ?>
                ],
            },
            yaxis: {
                labels: {
                    show: false
                }
            },
            title: {
                text: 'Grafik Poin Layanan',
                // align: 'center',
                floating: true
            },
            tooltip: {
                theme: 'dark',
                x: {
                    show: false
                },
                y: {
                    title: {
                        formatter: function() {
                            return ''
                        }
                    }
                }
            }
        };

        var chart = new ApexCharts(document.querySelector("#chart1"), options);
        chart.render();

        var options = {
            series: [
                    <?php echo json_encode($pointsresponden1); ?>,
                    <?php echo json_encode($pointsresponden2); ?>,
                    <?php echo json_encode($pointsresponden3); ?>,
                    <?php echo json_encode($pointsresponden4); ?>
            ],
          chart: {
          width: 500,
          type: 'donut',
        },
        plotOptions: {
          pie: {
            startAngle: -90,
            endAngle: 270
          }
        },
        dataLabels: {
          enabled: false
        },
        fill: {
          type: 'gradient',
        },
        labels: [
            <?php echo json_encode(json_decode($responden1[0]->profil)->kategori_responden); ?>,
            <?php echo json_encode(json_decode($responden2[0]->profil)->kategori_responden); ?>,
            <?php echo json_encode(json_decode($responden3[0]->profil)->kategori_responden); ?>,
            <?php echo json_encode(json_decode($responden4[0]->profil)->kategori_responden); ?>
        ],
        title: {
          text: 'Grafik Responden'
        },
        responsive: [{
          breakpoint: 480,
          options: {
            chart: {
              width: 200
            },
            legend: {
              position: 'bottom'
            }
          }
        }]
        };

        var chart = new ApexCharts(document.querySelector("#chart2"), options);
        chart.render();
    </script>
@stop
